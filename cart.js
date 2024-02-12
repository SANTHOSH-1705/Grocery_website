document.addEventListener('DOMContentLoaded', function() {
    loadCart();

    document.getElementById('New').addEventListener('click', function() {
        clearCart();
    });
});

function loadCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartItemsElement = document.getElementById('cartItems');
    const totalPriceElement = document.getElementById('totalPrice');
    let totalPrice = 0;

    // Clear previous cart items
    cartItemsElement.innerHTML = '';

    cart.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.productName}</td>
            <td>${item.quantity} KG</td>
            <td>₹${item.price.toFixed(2)}</td>`;
        cartItemsElement.appendChild(row);

        totalPrice += item.price * item.quantity;
    });

    totalPriceElement.textContent = totalPrice.toFixed(2);
}

function clearCart() {
    localStorage.removeItem('cart');
    loadCart();
}
