<?php



$ip = "127.0.0.1:161";

$sysDescr=snmp2_get($ip, "public", ".1.3.6.1.2.1.1.1.0");
$sysObjectID=snmp2_get($ip, "public", ".1.3.6.1.2.1.1.2.0");
$sysUpTime=snmp2_get($ip, "public", ".1.3.6.1.2.1.1.3.0");

$sysContact=snmp2_get($ip, "public", ".1.3.6.1.2.1.1.4.0");
$sysName=snmp2_get($ip, "public", ".1.3.6.1.2.1.1.5.0");
$sysLocation=snmp2_get($ip, "public", ".1.3.6.1.2.1.1.6.0");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $property = $_POST['property'] ?? '';
    $value = $_POST['value'] ?? '';

    if ($property && $value) {
        $oidMap = [
            'sysContact' => '.1.3.6.1.2.1.1.4.0',
            'sysName' => '.1.3.6.1.2.1.1.5.0',
            'sysLocation' => '.1.3.6.1.2.1.1.6.0',
        ];

        if (array_key_exists($property, $oidMap)) {
            $oid = $oidMap[$property];
           
		    snmpset($ip, "public", $oid, "s", $value);
         
			
			
        }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Group</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .form-group {
            margin-top: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
        }
        .form-group input {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
        }
        .form-group button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #45a049;
        }
        .back-button {
            margin-top: 2rem;
            text-align: center;
        }
        .back-button a {
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }
        .back-button a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>System Group</h1>
        <table>
            <thead>
                <tr>
                    <th>Property</th>
                    <th>Value</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>sysDescr</td>
                    <td><?php echo htmlspecialchars($sysDescr); ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>sysObjectID</td>
                    <td><?php echo htmlspecialchars($sysObjectID); ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>sysUpTime</td>
                    <td><?php echo htmlspecialchars($sysUpTime); ?></td>
                    <td></td>
                </tr>
               

                <!-- Editable rows -->
                <tr>
                    <td>sysContact</td>
                    <td><?php echo htmlspecialchars($sysContact); ?></td>
                    <td>
                        <form method="POST">
						    <input type="hidden" name="property" value="sysContact">
                            <input type="text" name="value" placeholder="New sysContact" required>
                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>sysName</td>
                    <td><?php echo htmlspecialchars($sysName); ?></td>
                    <td>
                        <form method="POST">
					    	<input type="hidden" name="property" value="sysName">
                            <input type="text" name="value" placeholder="New sysName" required>
                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>sysLocation</td>
                    <td><?php echo htmlspecialchars($sysLocation); ?></td>
                    <td>
                        <form method="POST">
						    <input type="hidden" name="property" value="sysLocation">
                            <input type="text" name="value" placeholder="New sysLocation" required>
                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="back-button">
            <a href="manager.php">Back to Manager</a>
        </div>
    </div>
</body>
</html>
