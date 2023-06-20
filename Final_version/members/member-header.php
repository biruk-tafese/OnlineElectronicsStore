<?php
 include "../connect.php";
 
 // Retrieve the user's name and email from the session if available
  $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
  $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Css/style.css">
    <script>
      function showTooltip(element, text) {
        element.title = text;
      }

      function hideTooltip(element) {
        element.title = '';
      }

      var isPopupVisible = false; // Track the visibility state of the popup

      function togglePopup() {
        let popup = document.getElementById("popup");
        let overlay = document.getElementById("overlay");
        isPopupVisible = !isPopupVisible; // Toggle the visibility state
        
        if (isPopupVisible) {
          popup.style.display = "none"; // Show the popup
          overlay.style.display = "none"; // Show the overlay
        } else {
          popup.style.display = "block"; // Hide the popup
          overlay.style.display = "block"; // Hide the overlay
        }
      }

      document.addEventListener("DOMContentLoaded", function() {
        var popupButton = document.getElementById("overlay"); // Get the account button by its ID
        popupButton.addEventListener("click", togglePopup);

        var closeButton = document.querySelector(".popup");
        closeButton.addEventListener("click", togglePopup);
      });
    </script>
    <style> 
      .popup {
        display: none;
        position: fixed;
        margin-top:70px;
        top: 30px;
        right: 30px;
        background-color: #fff;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        z-index: 9999;
      }
      .user-info {
       margin-top: 20px;
     }

   .user-info h3 {
     font-size: 20px;
     font-weight: bold;
     margin-bottom: 10px;
     margin-left:25px;
    }

    .user-info p {
     font-size: 15px;
     color: #000000;
     padding-bottom: 20px;
   }
      .popup-text {
        color: #333;
      }

      .popup-buttons {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 10px;
      }

      .popup-buttons button {
        margin-bottom: 10px;
        padding: 10px 20px;
        background-color: #13385e;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      .popup-buttons button:hover {
        background-color: #002872;
      }

      #overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 9998;
      }
    </style>
    <title>Header</title>
</head>
<body>
  <nav>
    <div class="logo">
       <h2>Zemen<span>Electronics</span></h2>
    </div>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fa fa-bars" onmouseover="showTooltip(this, 'Menu')" onmouseout="hideTooltip(this)"></i>
    </label>
    <ul>
      <li>
      <button class="acc" id="account" onclick="togglePopup()">
          <i class="fa fa-user" aria-hidden="true" onmouseover="showTooltip(this, 'Account')" onmouseout="hideTooltip(this)"></i>
        </button>
      </li>
      <li><a href="add-product.php" onclick="uncheckCheckbox()">Add product</a></li>
      <li><a href="member-index.php#footer" onclick="uncheckCheckbox()">Contact</a></li>
      <li><a href="member-index.php#footer" onclick="uncheckCheckbox()">About</a></li>
      <li><a href="member-products.php" onclick="uncheckCheckbox()">Products</a></li>
      <li><a href="member-index.php#image-slider" onclick="uncheckCheckbox()">Home</a></li>
    </ul>
  </nav>
  <div id="popup" class="popup">
    <div class="popup-buttons">
     <p>Admin Account</p>
       <div class="user-info">
          <h3> Bill Gates</h3>
          <p> billmela23@gmail.com</p>
       </div>
       <button onclick="location.href='../index.php'">
            <i class="fas fa-sign-out-alt"></i> Logout
          </button>
        <button onclick="location.href='../register.php'">
            <i class="fas fa-user-minus"></i> Remove account
        </button>
    </div>
  </div>

  
  <div id="overlay"></div>
</body>
</html>
