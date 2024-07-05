<?php
require_once 'connection.php';
session_start();
 
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$username = $_SESSION["username"];

 
$sql = "SELECT * FROM user WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_email'])) {
    $new_email = $_POST['email'];
    $update_sql = "UPDATE user SET email = ? WHERE username = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ss", $new_email, $username);
    if ($update_stmt->execute()) {
        echo "Email updated successfully.";
    } else {
        echo "Error updating email: " . $conn->error;
    }
}

 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_password'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if ($new_password === $confirm_password) {
        $update_password_sql = "UPDATE user SET password = ? WHERE username = ?";
        $update_password_stmt = $conn->prepare($update_password_sql);
        $update_password_stmt->bind_param("ss", $new_password, $username);
        if ($update_password_stmt->execute()) {
            echo "Password changed successfully.";
        } else {
            echo "Error changing password: " . $conn->error;
        }
    } else {
        echo "Passwords do not match.";
    }
}
?>

<?php
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
        }

        .profile-info, .update-form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: calc(100% - 24px);
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

        .profile-info div {
            margin-bottom: 10px;
        }

        .profile-info span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Profile</h2>
        <div class="profile-info">
            <div><span>Username:</span> <?php echo htmlspecialchars($user['username']); ?></div>
            <div><span>Full Name:</span> <?php echo htmlspecialchars($user['fullname']); ?></div>
            <div><span>Location:</span> <?php echo htmlspecialchars($user['location']); ?></div>
            <div><span>Age:</span> <?php echo htmlspecialchars($user['age']); ?></div>
            <div><span>Email:</span> <?php echo htmlspecialchars($user['email']); ?></div>
        </div>

        <div class="update-form">
            <h3>Update Email</h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="email">New Email</label>
                <input type="email" name="email" required>
                <input type="submit" name="update_email" value="Update Email">
            </form>
        </div>

        <div class="update-form">
            <h3>Change Password</h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" required>
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" name="confirm_password" required>
                <input type="submit" name="change_password" value="Change Password">
            </form>
        </div>
    </div>
</body>
</html>
