<?php
require_once 'connection.php';
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        h2 {
            text-align: center;
        }
        .card-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 25px;
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 400px;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card img {
            width: 300px;
            height: 200px;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .card h3 {
            margin: 0 0 10px;
            text-align: center;
        }
        .card p {
            flex-grow: 1;
            text-align: center;
        }
        .card a {
            text-decoration: none;
        }
        .card button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 15px;
            width: 100%;
        }
        .card button:hover {
            background-color: #0056b3;
        }
        .history-link {
            text-align: center;
            margin: 20px;
        }
        .history-link a {
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .history-link a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="card-container">
        <?php
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="card">
                    <img src="product/<?php echo $row["image"]; ?>" alt="<?php echo $row["product_name"]; ?> Image">
                    <h3><?php echo $row["product_name"]; ?></h3>
                    <p><?php echo $row["description"]; ?></p>
                    <a href="appoint.php"><button>Book Now</button></a>
                </div>
                <?php
            }
        } else {
            echo "No products available";
        }
        ?>
    </div>

</body>
</html>
