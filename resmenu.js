document.addEventListener('DOMContentLoaded', function() {
    var icon = document.getElementById('icon');
    var ul = document.querySelector('ul');
    
    icon.addEventListener('click', function() {
      ul.classList.toggle('show');
    });
  });
  
