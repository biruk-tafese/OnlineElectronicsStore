
<?php
 include "connect.php";
// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form values
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Prepare and execute the query
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Fetch the user record
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify the password
        if ($user && password_verify($password, $user['password'])) {
            // Authentication successful, set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;

            // Return success response
            $response = array('success' => true);
        } else {
            // Authentication failed, display error message
            $response = array('success' => false, 'message' => 'Invalid username or password');
        }
    } catch (PDOException $e) {
        // Handle database connection error
        $response = array('success' => false, 'message' => 'Database connection error: ' . $e->getMessage());
    }

    // Return the JSON response
    echo json_encode($response);
    exit;
}

?>