<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Here!!</title>
    <style>
        body {
            background-color: #007bff;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #007bff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
        }
        .navbar ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
            margin: 0 20px;
            padding: 0;
        }
        .navbar ul li {
            display: inline;
        }
        .navbar ul li a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-radius: 5px;
        }
        .navbar ul li a:hover {
            background-color: #ffffff;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">Cosmetic Service's</div>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="../about.php">About</a></li>
            <li><a href="../service.php">Service</a></li>
            <li><a href="../login.php">Login</a></li>
        </ul>
    </div>
</body>
</html>
