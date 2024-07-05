<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eme Cosmetic and  Service</title>
    <style>
        .navbar {
            background-color: #007bff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 20px;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: #ecf0f1;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .navbar ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        .navbar ul li {
            display: inline;
        }

        .navbar ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-radius: 5px;
        }

        .navbar ul li a:hover {
            background-color: #34495e;
            color: #1abc9c;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">EME MAKEUP SERVICE'S</div>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="bookhistory.php">Book History</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>
