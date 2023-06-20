<?php
include "connect.php";
session_start(); // Start the session

$username = $password = "";
$usernameErr = $passwordErr = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input and process form submission
    if (empty($_POST['username'])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input($_POST['username']);
    }

    if (empty($_POST['password'])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST['password']);
    }

    // Only proceed if there are no validation errors
    if (empty($usernameErr) && empty($passwordErr)) {
        try {
            // Prepare and execute the query
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            
            // Fetch the user record
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user['password'])) {
                // Authentication successful, set session variables
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;

                // Redirect to the member-index.php page
                header("Location: members/member-index.php");
                exit; // Stop further execution after redirect
            } else {
                // Authentication failed
                $errorMessage = "Invalid username or password";
            }
        } catch (PDOException $e) {
            // Handle database connection error
            $errorMessage = "Database connection error: " . $e->getMessage();
        }
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .login-form {
            background-color: #ffffff;
            padding: 20px;
            margin: 10% 30%;
            width: 40%;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .login-form h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-form label {
            display: block;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: all .3s ease-in-out;
        }

        .login-form input[type="text"]:hover,
        .login-form input[type="password"]:hover {
            box-shadow: 1px 1px 2px rgba(0,0,0,.3) inset;
        } 

        .login-form button[type="submit"] {
            display: block;
            width: 50%;
            padding: 14px;
            background-color: #13385e;
            color: #fff;
            border: none;
            margin-top: 17px;
            margin-left: 20%;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-form button[type="submit"]:hover {
            background-color: #002872;
        }
        
        p {
            font-size: 15px;
            text-align: center;
        }

        p a {
            text-decoration: none;
            color: blue;
        }
        
        small {
            color: black;
        }

        span {
            color: red;
            font-style: italic;
        }

    </style>
    <title>Login-zemenElec</title>
</head>
<body>
    <div class="login-form">
        <small>zemen<span>Electronics</span></small>
        <h1>Login</h1>
        <?php
        if (!empty($errorMessage)) {
            // Display error message if login failed
            echo '<p style="color: red;">' . $errorMessage . '</p>';
        }
        ?>
        <form method="POST" action="">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <?php if (!empty($usernameErr)) { echo '<span>' . $usernameErr . '</span>'; } ?>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <?php if (!empty($passwordErr)) { echo '<span>' . $passwordErr . '</span>'; } ?>
            </div>
            <div>
                <button type="submit">Log In</button>
            </div>
            <p>Do you want to register? <a href="register.html">Register</a></p>
        </form>
    </div>
</body>
</html>
