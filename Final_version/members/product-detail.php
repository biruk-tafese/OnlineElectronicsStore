<?php
// Include the database connection file (connect.php)
require '../connect.php';

// Retrieve the product details from the query parameters
$name = $_GET['name'];
$image = $_GET['image'];
$price = $_GET['price'];
$description = $_GET['description'];

// Get the product ID you want to delete
$productId = $_GET['id'];

// Handle the remove button click
if (isset($_POST['remove'])) {
    try {
        // Prepare the DELETE statement
        $stmt = $conn->prepare("DELETE FROM products WHERE ID = :productId");

        // Bind the parameter
        $stmt->bindParam(':productId', $productId);

        // Execute the DELETE statement
        $stmt->execute();

        // Check if any rows were affected
        if ($stmt->rowCount() > 0) {
            // Item deleted successfully
            header('Location: ../members/member-products.php'); // Redirect to the products page
            exit();
        }
    } catch (PDOException $e) {
        echo 'Error removing product: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .product-details {
            display: flex;
            flex-direction: column;
            margin-left: 30%;
        }

        .product {
            display: flex;
            align-items: center;
            margin: 0 auto;
            align-items: center;
        }

        .product img {
            width: 30%;
            height: auto;
            float: left;
            margin-right: 40px;
            margin-left: 0px;
        }

        .product #Name {
            font-weight: bold;
            font-style: italic;
        }

        .product figcaption {
            padding-top: 30px;
        }
        form {
            display:flex;
            flex-direction: row;
        }
        .remove {
            margin-top: 20px;
            color: white;
            font-weight: bold;
            font-size: 15px;
            background-color: red;
            border: none;
            border-radius: 5px;
            height: 40px;
            width: 140px;
            margin-bottom:30px;
            cursor: pointer;
            margin-left: 30%;
            transition: all 0.3s ease-in-out;
        }

        .remove:hover {
            background-color: #13385e;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
        }
       
       
        /* .edit {
            margin-top: 20px;
            color: white;
            font-weight: bold;
            font-size: 15px;
            background-color: green;
            border: none;
            border-radius: 5px;
            height: 40px;
            width: 140px;
            cursor: pointer;
            margin-bottom: 30px;
            margin-left: 50%;
            transition: all 0.3s ease-in-out;
        }
        .edit:hover {
            background-color: #13385e;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
        } */


    </style>
    <title>Product Details</title>
</head>
<body>
    <div class="header">
        <?php include "member-header.php"; ?>
    </div>

    <section id="product-details">
    <div class="container">
        <div class="product">
            <figure>
                <img src="<?php echo $image; ?>" alt="product-image">
                <figcaption><strong>Model: </strong><?php echo $_GET['name']; ?></figcaption>
                <figcaption> <Strong>Price: </strong><?php echo $price; ?></figcaption>
                <figcaption><strong>Short description: </strong><?php echo $description; ?></figcaption>
                <form action="" method="POST">
                 <label for="remove-button">
                <input type="submit" name="remove" value="Remove product" class="remove" onclick="confirmDeletion()">
               </label>
            </figure>
            
    
        </div>
    </div>
</section>


    <!-- <label for="edit-button">
        <input type="button" name="edit" value="Edit product" class="edit" onclick="window.location.href = 'edit-product.php';">
    </label> -->


</form>

    <footer id="footer">
        <?php include "../footer.php"; ?>
    </footer>
    <script>
        // Function to handle confirmation prompt
        function confirmDeletion() {
            var confirmation = confirm("Are you sure you want to delete this product?");
            if (confirmation) {
                // Continue with form submission
            } else {
                // Prevent form submission
                event.preventDefault();
            }
        }
    </script>
</body>
</html>
