<?php

$dbHost = 'localhost'; // Usually 'localhost'
$dbUsername = 'root'; // Your MySQL username
$dbPassword = ''; // Your MySQL password
$dbName = 'beauty'; // Your MySQL database name

// Create a database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$conn->set_charset("utf8mb4");

?>