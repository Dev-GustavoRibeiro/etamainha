document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function() {
        const cakeId = this.getAttribute('data-id');
        fetch('/pages/cart.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'add_to_cart=' + cakeId
        }).then(response => response.json())
          .then(data => {
              alert(data.message);
          });
    });
});
