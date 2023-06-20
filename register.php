<?php
session_start();

include "connect.php";

// Check if the user is already logged in, redirect to the home page if true
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: index.php');
    exit;
}

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form values
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform validation on the form data (you can add more validation rules as needed)

    // Check if the username or email already exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        
        .registration-form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            align-items: center;
        }
        
        .registration-form small {
            display: block;
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
        }
        
        .registration-form h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .registration-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .registration-form input[type="text"],
        .registration-form input[type="email"],
        .registration-form input[type="password"],
        .registration-form input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        
        .registration-form input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            color: #fff;
            background-color: #4267B2; /* Use a color similar to Facebook's primary color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .registration-form input[type="submit"]:hover {
            background-color: #3b5998; /* Darken the color on hover */
        }
        .error {
            margin-top:0;
            color:red;
            text-align:center;
        }
        .header {
            margin-top:0;
        }
    </style>
</head>
<body>
     <div class="header">
     <?php
      include "header.php";?>
     </div>
    <div class="registration-form">
        <small>zemen<span>Electronics</span></small>
        <h1>Membership Registration</h1>
        <form method="POST" action="<?php  echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>
 ?>">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>
    
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
    
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
    
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" pattern=".{6,}" required>
             
            <label for="photo">Admin Photo:</label>
            <input type="file" class="photo" id="photo">
              
            <input type="submit" value="Register">
        </form>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
    </div>
    <?php
    include "footer.php";
    ?>
</body>
</html>
