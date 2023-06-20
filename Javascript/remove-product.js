// Function to handle the removal process
function removeProduct() {
    // Get the product ID from the data attribute
    var productId = this.getAttribute('data-id');
    
    // Send an asynchronous request to the server
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../members/remove-product.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
    // Define the data to be sent in the request body
    var data = 'id=' + encodeURIComponent(productId);
    
    // Handle the response from the server
    xhr.onload = function() {
        if (xhr.status === 200) {
            // If the removal process was successful, display the success message
            var successMessage = document.getElementById('success-message');
            successMessage.style.display = 'block';
            successMessage.textContent = xhr.responseText;
            
            // For example, you can redirect the user to a different page
            window.location.href = '../members/member-products.php';
        } else {
            // If there was an error, you can handle it here
            alert('Error removing product. Please try again.');
        }
    };
    
    // Send the request
    xhr.send(data);
}

// Attach the event listener to the "Remove product" button
var removeButton = document.querySelector('.remove');
removeButton.addEventListener('click', removeProduct);
