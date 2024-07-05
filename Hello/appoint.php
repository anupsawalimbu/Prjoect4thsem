<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 300px;
            width: 100%;
            max-width: 1200px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

    form {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 400px;
            
        }

        label {
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="tel"],
        input[type="datetime-local"],
        input[type="submit"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
</style>
<body>
    <div class="container">

    <h2>Book an Appointment</h2>
        <form action="process_form.php" method="POST">
            <label for="appointment_datetime">Appointment Date and Time:</label>
            <input type="datetime-local" id="appointment_datetime" name="appointment_datetime" required>
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="number">Contact Number:</label>
            <input type="tel" id="number" name="number" required>
            <input type="submit" value="Book Appointment">
        </form>
    </div>

</body>
</html>