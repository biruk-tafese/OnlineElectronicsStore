<?php
   include "../connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       footer {
    background-color: #13385e;
    color: white;
    padding: 30px;
  }
  
  .footer-content {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .footer-columns {
    width: 100%;
    text-align: center; 
    display: flex;
    justify-content: space-between;
    padding-bottom: 20px;
  }
  .footer-column {
    flex: 1;
  }

  .footer-column h3 {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    margin-top: 20px; /* Add top margin */
  }

  .footer-column p {
    font-size: 14px;
    line-height: 1.5;
    margin-top: 10px; /* Add top margin */
  }

  .footer-column ul li{
     padding: 10px;
  }
  .footer-column ul li a {
    color: wheat;
    transition: all .3s ease-in-out;
  }
  .footer-column ul li a:hover {
       background-color: #12e856;
  }
  form {
    margin-top: 10px;
  }
  
  form div {
    margin-bottom: 10px;
  }
  
  
  .footer-divider {
    margin: 40px 0;
    border: none;
    border-top: 1px solid white;
    width: 100%;
  }
  
  .footer-bottom {
    margin-top: auto;
    text-align: center;
  }
  
  p {
    margin: 0;
  }
  
  .footer-column form {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .footer-column form label {
    font-size: 16px;
    margin-bottom: 8px;
  }
  
  .footer-column form input[type="email"],
  .footer-column form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
  }
  
  .footer-column form input[type="submit"] {
    background-color: #2afd00;
    color: white;
    border: 2px solid darkorchid;
    padding: 10px 16px;
    font-size: 14px;
    cursor: pointer;
  }
  
  .footer-column form input[type="submit"]:hover {
    background-color: #0b2041;
  }
  
    </style>
</head>
<body>
<footer>
  <div class="footer-content">
    <div class="footer-columns">
      <div class="footer-column">
        <h3>About Us</h3>
        <p>Zemen Electronics is an electronics shop that provides different quality products available now!</p>
      </div>
      <div class="footer-column">
        <h3>Contact</h3>
        <p>Email: info@example.com<br>Phone: +1 123 456 7890<br>Address: 123 Main Street, City, Country</p>
        <ul>
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-telegram"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Complaints</h3>
        <form  action="cstafesebiruk23@gmail.com">
          <div>
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>
          </div>
          <br>
          Your complaint:<br>
          <textarea name="text" id="text" cols="30" rows="5"></textarea>
          <br>
          <input type="submit" value="Submit" id="submit">
        </form>
      </div>
    </div>
    <hr class="footer-divider">
    <div class="footer-bottom">
      <p>&copy; Zemen Electronics</p>
    </div>
  </div>
</footer>

</body>
</html>