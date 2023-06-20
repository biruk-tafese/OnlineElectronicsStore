<?php
include "connect.php";
error_reporting(E_ALL);
ini_set('display_errors', true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <title>Display products</title>
</head>
<body>
    <div class="header">
        <?php include "member-header.php"; ?>
    </div>
    <section id="products">
        <div class="container">
            <div class="products-header">
                <h2>All electronics Products</h2>
                <p>We have quality products available for you here!</p>
            </div>
            
            <?php
            try {
                $sql = "SELECT ID, pName, pImage, price, description FROM products";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $row) {
                    $productId = $row['ID'];
                    $name = $row['pName'];
                    $image = $row['pImage'];
                    $price = $row['price'];
                    $description = $row['description'];
                    
                    echo '<a href="product-detail.php?name='. urlencode($name) . '&image=' . urlencode($image) . '&price=' . urlencode($price) . '&description=' . urlencode($description) . '&id=' . urlencode($productId) . '">';
                    echo '<div class="product">';
                    echo '<figure>';
                    echo "<img src='$image' alt='product-img'>";
                    echo '<figcaption id="Name"><b>' . $name . '</b></figcaption>';
                    echo '<figcaption>' . $price . '</figcaption>';
                    echo '<figcaption>' . $description . '</figcaption>';
                    echo '</figure>';
                    echo '</div>';
                    echo '</a>';
                    
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </div>
    </section>

    <footer id="footer">
        <?php include "../footer.php"; ?>
    </footer>
</body>
</html>
