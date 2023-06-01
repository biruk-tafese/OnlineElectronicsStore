<?php
        require_once('connect.php');
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/style.css">
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const icon = document.getElementById("icon");
        const menu = document.querySelector(".menu_bar ul");

        icon.addEventListener("click", function() {
            menu.classList.toggle("show");
        });

        const menuItems = document.querySelectorAll(".menu_bar ul li a");

        menuItems.forEach(function(item) {
            item.addEventListener("click", function() {
                menu.classList.remove("show");
            });
        });
    });
</script>

    <title>ZemenElectronics</title>
</head>
<body>
     <nav class="menu_bar">
         <h1 class="logo">Zemen<span>Electronics.</span></h1>

         <ul id="container">
             <li><a class ="active" href="#">Home</a></li>
    <li><a href="#products">Products<i class="fas fa-caret-down"></i></a>
      <div class="dropdown_menu">
        <ul>
            <li><a href="#">Computers</a></li>
            <li><a href="#">Phones</a></li>
             <li>
                <a href="#">Others <i class="fas fa-caret-right"></i></a>
                <div class="dropdown_menu-1">
                    <ul>
                        <li><a href="">Tablets</a></li>
                        <li><a href="">Pc RAMs</a></li>
                        <li><a href="">Routers</a></li>
                        <li><a href="">Pc parts</a></li>
                    </ul>
                </div>
            </li>
        </ul>
       </div>
     </li>
             <li><a href="#">About</a></li>
             <li><a href="#">Blogs</a></li>
             <li><a href="#">Contact us</a></li>
             <li><a href="#"><i class="fas fa-shopping-cart"></i></a> </li>
             <li><a href="#"><i class="fas fa-user"></i></a></li>
         </ul>
         <i id="icon" class="fas fa-bars"></i>      
    </nav>
   <section class="image-slider">
      <div class="arrow-left" >
        <i class="fas fa-arrow-left"></i>
      </div>
      <div class="arrow-right">
        <i class="fas fa-arrow-right"></i>
      </div>
      <div class="caption">
      <h1>Zemen Electronics</h1>
      <p>Live futuristic life here</p>
      </div>
    </section>
    <section id="products">
        <div class="container">
            <div class="products-header">
                <h2>All electronics Products</h2>
                <p>We have quality products available for you here!</p>
            </div>
            <?php
            require_once "display_products.php";
            ?>
        </div>
</section>
   <script src="Javascript/main.js"></script>
</body>
</html>