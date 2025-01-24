
<?php
header('Content-Type: application/json');

function getSystemGroup() {
    $ip = "127.0.0.1:161";

    $data = [
        'sysDescr' => snmp2_get($ip, "public", ".1.3.6.1.2.1.1.1.0"),
        'sysObjectID' => snmp2_get($ip, "public", ".1.3.6.1.2.1.1.2.0"),
        'sysUpTime' => snmp2_get($ip, "public", ".1.3.6.1.2.1.1.3.0"),
        'sysContact' => snmp2_get($ip, "public", ".1.3.6.1.2.1.1.4.0"),
        'sysName' => snmp2_get($ip, "public", ".1.3.6.1.2.1.1.5.0"),
        'sysLocation' => snmp2_get($ip, "public", ".1.3.6.1.2.1.1.6.0")
    ];

    echo json_encode($data);
}

function updateSystemValue() {
    $ip = "127.0.0.1:161";
    $data = json_decode(file_get_contents('php://input'), true);

    $oidMap = [
        'sysContact' => '.1.3.6.1.2.1.1.4.0',
        'sysName' => '.1.3.6.1.2.1.1.5.0',
        'sysLocation' => '.1.3.6.1.2.1.1.6.0',
    ];

    if (isset($data['property']) && isset($data['value'])) {
        $property = $data['property'];
        $value = $data['value'];

        if (isset($oidMap[$property])) {
            $result = snmpset($ip, "public", $oidMap[$property], "s", $value);
            echo json_encode(['success' => $result]);
            return;
        }
    }

    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}

function getArpTable() {
    $ip = "127.0.0.1:161";

    $physicalAddresses = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.2");
    $ipAddresses = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.3");
    $types = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.4");

    $arpTable = [];
    for ($i = 0; $i < count($physicalAddresses); $i++) {
        $arpTable[] = [
            'index' => $i,
            'ipAddress' => $ipAddresses[$i],
            'physicalAddress' => $physicalAddresses[$i],
            'type' => $types[$i]
        ];
    }

    echo json_encode($arpTable);
}

function getTcpTable() {
    $ip = "127.0.0.1:161";

    $states = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.1");
    $localAddresses = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.2");
    $localPorts = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.3");
    $remoteAddresses = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.4");
    $remotePorts = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.5");

    $tcpTable = [];
    for ($i = 0; $i < count($states); $i++) {
        $tcpTable[] = [
            'index' => $i,
            'state' => $states[$i],
            'localAddress' => $localAddresses[$i],
            'localPort' => $localPorts[$i],
            'remoteAddress' => $remoteAddresses[$i],
            'remotePort' => $remotePorts[$i]
        ];
    }

    echo json_encode($tcpTable);
}

// Route the request
$route = $_GET['route'] ?? '';

switch ($route) {
    case 'system':
        getSystemGroup();
        break;
    case 'system/update':
        updateSystemValue();
        break;
    case 'arp':
        getArpTable();
        break;
    case 'tcp':
        getTcpTable();
        break;
    default:
        http_response_code(404);
        echo json_encode(['error' => 'Route not found']);
}