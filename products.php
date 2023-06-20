<?php
require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="Css/style.css">
    <title>Display products</title>
    
</head>
<body>
     <header class="header">
         <!--  header -->
      <?php include "header.php" ?>
     </header>
    <?php

    try {
        echo '
        </section>
        <section id="products">
            <div class="container">
                <div class="products-header">
                    <h2>All electronics Products</h2>
                    <p>We have quality products available for you here!</p>
                </div>
        ';
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
           <a href="product-landing.php?name=' . urlencode($name) . '&image=' . urlencode($image) . '&price=' . urlencode($price) . '&description=' . urlencode($description) . '&id=' . urlencode($productId) . '">
             <div class="product">
                <figure>
                    <img src="'.$image.'" alt="product-image">
                    <figcaption id="Name"><b>'.$name.'</b></figcaption>
                    <figcaption>'.$price.'</figcaption>
                    <figcaption>'.$description.'</figcaption>
                </figure>
            </div>
             </a>';
        }
        echo '
        </div>
        </section>
        ';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the connection (optional if we're not using the connection again)
    $conn = null;
    ?>
    <div id="footer">
     <?php
     include "footer.php";
    ?>
    </div>
</body>
</html>
