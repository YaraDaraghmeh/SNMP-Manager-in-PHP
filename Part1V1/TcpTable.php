<?php

$ip = "127.0.0.1:161";

//$tcpTable=snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13");
//print_r($tcpTable);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCP Table</title>
	
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
        <h1>TCP Group</h1>
		<h2>TCP Table</h2>
		 <div class="back-button">
            <a href="manager.php">Back to Manager</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Index</th>
					<th>TCP Connection State</th>
					<th>TCP Connection Local Address</th>
                    <th>TCP Connection Local Port</th>
                    <th>TCP Connection Remote Address</th>
					<th>TCP Connection Remote Port</th>
                </tr>
            </thead>
            <tbody>
               
                   <?php
				   
                    $ConnectionState = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.1");
                    $ConnectionLocalAddress = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.2");
                    $ConnectionLocalPort = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.3");
                    $RemoteAddress = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.4");//Remote
                    $RemotePort = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.5");

				    $i=0;
                    foreach ($ConnectionState as $k=>$val) {
					echo "<tr>";
                    echo "<td>".$i."</td>";
					echo "<td>".$ConnectionState[$i]."</td>";
                    echo "<td>".$ConnectionLocalAddress[$i]."</td>";
					echo "<td>".$ConnectionLocalPort[$i]."</td>";
					echo "<td>".$RemoteAddress[$i]."</td>";
					echo "<td>".$RemotePort[$i]."</td>";
	                $i++;
					echo "</tr>";
                }
					
					?>
                    
               
           
            </tbody>
        </table>

       
    </div>
</body>
</html>
