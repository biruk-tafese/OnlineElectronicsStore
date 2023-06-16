<?php
// Retrieve the product details from the query parameters
$name = $_GET['name'];
$image = $_GET['image'];
$price = $_GET['price'];
$description = $_GET['description'];

// Handle the remove button click
if (isset($_POST['remove'])) {
    // Perform the necessary tasks and remove the row from the MySQL database
    // Add your code here to handle the removal process
    // This can involve executing a DELETE query or performing other actions
    // based on your specific implementation
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

        .remove{
            margin-top: 20px;
            color:white;
            font-weight:bold;
            font-size:15px;
            background-color:red;
            border:none;
            border-radius:5px;
            height:40px;
            width:140px;
            cursor:pointer;
            margin-bottom: 30px;
            margin-left: 30%;
            transition: all .3s ease-in-out;
        }
        .remove:hover {
            background-color:#13385e;
            box-shadow: 2px 2px 6px rga(0,0,0,.3);
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
                <input type="submit" name="remove" value="Remove product" class="remove">
            </label>

    <footer id="footer">
        <?php include "../footer.php"; ?>
    </footer>
</body>
</html>
