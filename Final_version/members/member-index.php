<?php
   include "../connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Css/style.css">
    <title>Main Page</title>
</head>

<body>
          <!-- Add your header content here -->
          <?php include "member-header.php" ?>
         
          <!--  main content here -->
        <main>
        <section class="image-slider" id="image-slider">
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
          
      <!-- Products to be displayed-->
      <main>
       <?php
             include "member-products.php";
        ?>
        </main>
         
        <script src="../Javascript/main.js"></script>
 </body>
</html>