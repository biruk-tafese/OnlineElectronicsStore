<?php
include "connect.php";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all fields are set
    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        // Handle image upload
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];
        
        // Move the uploaded image to a desired location
        $target_dir = "img/";  // Specify the directory where you want to save the images
        $target_file = $target_dir . basename($image);
        
        // Check if the file is a valid image
        $allowed_types = array("image/jpeg", "image/png", "image/jpg");
        
        if (in_array($image_type, $allowed_types)) {
            move_uploaded_file($image_tmp, $target_file);
            
            // Prepare and execute the SQL query to insert data into the "products" table
            $stmt = $conn->prepare("INSERT INTO products (pName, pImage, price, description) VALUES (:name, :image, :price, :description)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':image', $target_file);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':description', $description);
            
            if ($stmt->execute()) {
                
                 header("location: member-index.php");
            } else {
                echo "Error inserting data.";
            }
        } else {
            //echo "<p>Invalid image format. Please upload a JPEG, PNG, or GIF image.</p>";
        }
    } else {
        //echo "<p>Please fill in all the fields.</p>";
    }
}

// Close the database connection
$conn = null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

         .header {
            padding-bottom:100px;
            margin-bottom:10px;

         }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding:20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="file"] {
            display: block;
            margin-top: 5px;
            font-size: 14px;
        }

        .form-group textarea {
            height: 100px;
        }

        .btn-submit {
            display: block;
            width: 50%;
            margin-left: 30%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            color: #fff;
            background-color:#13385e;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="header">
    <?php  include "member-header.php"; ?>
    </div>
    <div class="container">
        <h2>Product Upload</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" name="price" id="price">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <button type="submit" class="btn-submit">Upload</button>
        </form>
    </div>

    <script>
        document.getElementById("productForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission
        
    // Get the form data
    var form = event.target;
    var formData = new FormData(form);

    // Create the XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure the request
    xhr.open("POST", "add-product.php", true);

    // Set the onload callback function
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert(xhr.responseText); // Display the response message
            // Reset the form after successful submission if needed
            form.reset();
        } else {
            alert("Error: " + xhr.status);
        }
    };

    // Send the form data
    xhr.send(formData);
});

    </script>
    <?php
    include "../footer.php";
   ?>
</body>
</html>
