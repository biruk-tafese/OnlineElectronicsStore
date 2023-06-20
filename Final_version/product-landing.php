<?php
// Include the database connection file (connect.php)
require 'connect.php';

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
            header('Location:products.php'); // Redirect to the products page
            exit();
        } else {
            // No rows were affected, product not found or already deleted
            echo 'Product not found or already deleted.';
        }
    } catch (PDOException $e) {
        echo 'Error removing product: ' . $e->getMessage();
    }}
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
        

        .product figcaption a {
            color: black;
            text-decoration: underline;
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
            cursor: pointer;
            margin-bottom: 30px;
            margin-left: 30%;
            transition: all 0.3s ease-in-out;
        }
    </style>
    <title>Product Landing</title>
</head>
<body>
    <div class="header">
        <?php include "header.php"; ?>
    </div>

    <section id="product-details" style="margin-top: 50px; margin-bottom: 50px;">
        <div class="container">
            <div class="product">
                <figure>
                    <img src="<?php echo $image; ?>" alt="product-image">
                    <figcaption><strong>MODEL: </strong><?php echo $name; ?></figcaption>
                    <figcaption><strong>PRICE: </strong><?php echo $price; ?></figcaption>
                    <figcaption><strong>SHORT DESCRIPTION: </strong><?php echo $description; ?></figcaption>
                    <figcaption><strong>CALL US ON : </strong> <a href="tel:+1234567890">123-456-7890</a><span> OR </span><a href="tel:+251964377216">0964377216</a></figcaption>
                </figure>
            </div>
        </div>
    </section>
    <footer id="footer">
        <?php include "footer.php"; ?>
    </footer>
    
</body>
</html>
