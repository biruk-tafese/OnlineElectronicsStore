 // JavaScript code to handle form submission
 const form = document.getElementById('login-form');
 const errorMessage = document.getElementById('error-message');

 form.addEventListener('submit', function(e) {
     e.preventDefault(); // Prevent form submission

     // Get form data
     const username = document.getElementById('username').value;
     const password = document.getElementById('password').value;

     // Create a new XMLHttpRequest object
     const xhr = new XMLHttpRequest();
     xhr.open('POST', form.action, true);
     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
     xhr.onload = function() {
         if (xhr.status === 200) {
             const response = JSON.parse(xhr.responseText);

             if (response.success) {
                 // Authentication successful, redirect to the home page or any other authenticated page
                 window.location.href = 'members/member-index.php';
             } else {
                 // Authentication failed, display error message
                 errorMessage.style.color = "red";
                 errorMessage.textContent = response.message;
             }
         }
     };

     // Prepare data to send
     const data = 'username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password);

     // Send the request
     xhr.send(data);
 });