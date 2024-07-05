<?php
 
require_once 'connection.php';
session_start(); 
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Redirect to login page if not logged in
    header("location: login.php");
    echo "ananda";
    exit;  
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $appointmentDateTime = $_POST['appointment_datetime'];
    $name = $_POST['name'];
    $contactNumber = $_POST['number'];

     
    if (empty($appointmentDateTime) || empty($name) || empty($contactNumber)) {
        echo "All fields are required.";
    } else {
         
        $sql = "INSERT INTO appointments (appointment_datetime, name, contact_number) VALUES ('$appointmentDateTime', '$name', '$contactNumber')";

       
        if ($conn->query($sql) === TRUE) {
             
            echo '<script>alert("Appointment booked successfully"); window.location.href = "booknow.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
