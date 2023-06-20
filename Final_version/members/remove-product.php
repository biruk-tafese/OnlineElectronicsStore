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
try {
    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM products WHERE pId = :productId");
    
    // Bind the parameter
    $stmt->bindParam(':productId', $productId);
    
    // Execute the DELETE statement
    $stmt->execute();

    // Check if any rows were affected
    if ($stmt->rowCount() > 0) {
        // Item deleted successfully
        echo 'Product removed successfully!';
    } else {
        // No rows were affected, product not found or already deleted
        echo 'Product not found or already deleted.';
    }
} catch (PDOException $e) {
    echo 'Error removing product: ' . $e->getMessage();
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

        /* Your existing CSS styles */
        
        .success-message {
            color: green;
            font-weight: bold;
        }
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
                    <figcaption id="Name"><b><?php echo $name; ?></b></figcaption>
                    <figcaption><?php echo $price; ?></figcaption>
                    <figcaption><?php echo $description; ?></figcaption>
                </figure>
            </div>
        </div>
    </section>
    
    <label for="edit-button">
        <input type="submit" name="edit" value="Edit product" class="edit">
    </label>
    <label for="remove-button">
        <input type="submit" name="remove" value="Remove product" class="remove" data-id="<?php echo $pId; ?>">
    </label>

    <footer id="footer">
        <?php include "../footer.php"; ?>
    </footer>

    <!-- Success message paragraph -->
    <p id="success-message" class="success-message" style="display: none;"></p>

    <script src="../Javascript/remove-product.php"></script>
</body>
</html>
