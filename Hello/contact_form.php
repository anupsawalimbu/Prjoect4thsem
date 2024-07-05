<?php
// Include connection.php to establish database connection
require_once 'connection.php';

// Initialize variables to store form data
$name = $email = $message = '';
$errors = array();

// Validate and sanitize input data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Validate name
    if (empty($name)) {
        $errors['name'] = "Name is required";
    }

    // Validate email
    if (empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    // Validate message
    if (empty($message)) {
        $errors['message'] = "Message is required";
    }

    // If no errors, insert into database
    if (empty($errors)) {
        $insert_sql = "INSERT INTO contact_form (name, email, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo "<script>alert('Message sent successfully');</script>";
        } else {
            echo "<script>alert('Error sending message: " . $conn->error . "');</script>";
        }

        $stmt->close();
    }
}

// Close database connection
$conn->close();
?>
