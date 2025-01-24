<?php

$ip = "127.0.0.1:161";

//$arpTable=snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.2.0");
//print_r($arpTable);


$a = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.2");
$b = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.3");
$c = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.4");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARP Table</title>
	
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
        <h1>IP Group</h1>
		<h2>ARP Table</h2>
		 <div class="back-button">
            <a href="manager.php">Back to Manager</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Index</th>
                    <th>IP Address</th>
                    <th>Physical Address (MAC)</th>
					<th>Type</th>
                </tr>
            </thead>
            <tbody>
               
                   <?php
				   
                    $a = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.2");
                    $b = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.3");
                    $c = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.4");


				    $i=0;
                    foreach ($a as $k=>$val) {
					echo "<tr>";
                    echo "<td>".$i."</td>";
					echo "<td>".$b[$i]."</td>";
                    echo "<td>".$a[$i]."</td>";
					echo "<td>".$c[$i]."</td>";
	                $i++;
					echo "</tr>";
                }
					
					?>
                    
               
           
            </tbody>
        </table>

       
    </div>
</body>
</html>
