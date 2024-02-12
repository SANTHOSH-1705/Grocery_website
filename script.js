function addToCart(button) {
    const productBox = button.closest('.product-box');
    const productName = productBox.querySelector('strong').textContent;
    const priceText = productBox.querySelector('.price').textContent;
    const priceNumericPart = priceText.replace(/[^\d.]/g, '').trim();
    const price = parseFloat(priceNumericPart);

    if (!isNaN(price)) {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        let productExists = false;

        cart.forEach(item => {
            if (item.productName === productName) {
                item.quantity = (item.quantity || 1) + 1; 
                productExists = true;
            }
        });

        if (!productExists) {
            cart.push({ productName, price, quantity: 1 });
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        alert('Item added to cart!'); 
    } else {
        console.error("Failed to parse the price:", priceText);
    }
}
