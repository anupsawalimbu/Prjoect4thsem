<?php

require_once 'connection.php';
$username = $password = "";
$username_err = $password_err = $login_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    
    if (empty($username_err) && empty($password_err)) {
        
        $sql = "SELECT id, username, password FROM user WHERE username = ?";

        if ($stmt = $conn->prepare($sql)) {
             
            $stmt->bind_param("s", $param_username);
 
            $param_username = $username;

             
            if ($stmt->execute()) {
                
                $stmt->store_result();

                
                if ($stmt->num_rows == 1) {
                     
                    $stmt->bind_result($id, $username, $db_password);
                    if ($stmt->fetch()) {
                        if ($password === $db_password) {
                            
                            session_start();

                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                          
                            header("location: dashboard.php");
                        } else {
                           
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                  
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

          
            $stmt->close();
        }
    }


    $conn->close();
}
?>
    <?php include 'Site/navbar.php'; ?> <!-- Include the navbar.php file -->

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-e1ikE5/ib+3h3zcpJPLM2tBJ4jv77R5wfOAXQ+6GX9CxgSR1B5Uz2b0mDBxuO3qFZyg8A2U+pq6C1NQqiLcvDw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    justify-content: center; /* Center content horizontally */
    align-items: center; /* Center content vertically */
}

.container {
    background-color: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: center;
}

.container .icon {
    margin-bottom: 20px;
}

.container h2 {
    margin-bottom: 20px;
}

.container p {
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input[type="text"],
.form-group input[type="password"],
.form-group input[type="submit"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    width: calc(100% - 20px); /* Adjusted width to accommodate padding */
    box-sizing: border-box; /* Ensures padding is included in width calculation */
}

.error-message {
    color: red;
    font-size: 14px;
    margin-top: -10px; /* Adjust spacing for error messages */
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

.signup-link {
    color: #007bff;
    text-decoration: none;
    margin-top: 10px;
    display: block;
}

.signup-link:hover {
    color: #0056b3;
}

</style>
<body>
    <div class="container">
        <div class="icon">
            <i class="fas fa-user-circle fa-5x"></i> <!-- Font Awesome user circle icon -->
        </div>
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>">
                <span class="error-message"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span class="error-message"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
            <p class="error-message"><?php echo $login_err; ?></p>
            <a href="signup.php" class="signup-link">Create Account</a>
        </form>
    </div>
</body>

</html>
