<?php
  
include "connect.php";

function updatePasswordsToHashed()
{
    global $conn;
   
    try {
        // Retrieve all user records from the database
        $stmt = $conn->query('SELECT id, password FROM users');
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
        // Update each user's password to be hashed
        foreach ($users as $user) {
            $hashedPassword = password_hash($user['password'], PASSWORD_DEFAULT);

            // Update the hashed password in the database
            $updateStmt = $conn->prepare('UPDATE users SET password = :hashedPassword WHERE id = :userId');
            $updateStmt->bindParam(':hashedPassword', $hashedPassword);
            $updateStmt->bindParam(':userId', $user['id']);
            $updateStmt->execute();
        }

        echo 'Passwords have been updated successfully!';
    } catch (PDOException $e) {
        echo 'Error updating passwords: ' . $e->getMessage();
    }
}

// Call the function to update the passwords
updatePasswordsToHashed();


?>

