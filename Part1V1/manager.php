

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNMP Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .navbar {
            display: none;
        }
        .container {
            max-width: 800px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .button-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            margin: 2rem 0;
        }
        .button-group a {
            display: block;
            text-align: center;
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            background: #4CAF50;
            width: 200px;
            font-weight: bold;
        }
        .button-group a:hover {
            background-color: #45a049;
        }
        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <p><h1>Welcome to SNMP Manager</h1>
        <h2>Please choose one of the options below!</h2></p>
        <div class="button-group">
            <a href="SystemGroup">System Group</a>
            <a href="ArpTable">ARP Table</a>
            <a href="TcpTable">TCP Table</a>
        </div>
    </div>
</body>
</html>
