let cart = [];

document.addEventListener("DOMContentLoaded", function() {
    const addToCartButtons = document.querySelectorAll(".add-to-cart");

    addToCartButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            const item = button.dataset.item;
            const price = button.dataset.price;

            cart.push({ item, price });

            updateCart();
        });
    });
});

function updateCart() {
    const cartTotal = cart.reduce(function(acc, current) {
        return acc + current.price;
    }, 0);

    document.getElementById("cart-total").innerText = `Cart Total: $${cartTotal.toFixed(2)}`;
    document.getElementById("item-count").innerText = `Item Count: ${cart.length}`;
}

document.getElementById("payment-form").addEventListener("submit", function(event) {
    event.preventDefault();

    const cardNumber = document.getElementById("card-number").value;
    const expirationDate = document.getElementById("expiration-date").value;
    const cvv = document.getElementById("cvv").value;

    if (!cardNumber || !expirationDate || !cvv) {
        alert("Please fill in all payment information.");
        return;
    }

    // submit payment information to payment gateway
    // ...
});
          
