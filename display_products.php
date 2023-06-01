<?php
require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="CSS/style.css">
    <title>Display products</title>
    
</head>
<body>
    <?php
    try {
        $sql = "SELECT * FROM products";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $name = $row['pName'];
            $image = $row['pImage'];
            $price = $row['price'];
            $description = $row['description'];
            // Display the values
            echo '
            <div class="product">
                <figure>
                    <img src="'.$image.'" alt="product-image">
                    <figcaption id="Name"><b>'.$name.'</b></figcaption>
                    <figcaption>'.$price.'</figcaption>
                    <figcaption>'.$description.'</figcaption>
                </figure>
                <button id="cart-btn">Add to Cart<i class="fas fa-shopping-cart"></i></button>
            </div>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the connection (optional if we're not using the connection again)
    $conn = null;
    ?>
</body>
</html>
