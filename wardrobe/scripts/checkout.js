import LocalStorageService from './storage.js';

document.addEventListener('DOMContentLoaded', function() {
    const deliveryMethodSelect = document.getElementById('delivery-method');
    const addressGroup = document.getElementById('address-group');
     const cartTotalPriceElement = document.getElementById('checkout-total-price');
    const cartTotalQtyElement = document.getElementById('checkout-total-qty');
     let cart = LocalStorageService.getCart();
    updateCartDisplay();

    deliveryMethodSelect.addEventListener('change', function() {
        if (this.value === 'courier') {
            addressGroup.style.display = 'block';
        } else {
            addressGroup.style.display = 'none';
        }
    });
   function updateCartDisplay() {
        let totalPrice = 0;
        let totalQuantity = 0;
        for (const productId in cart) {
            const item = cart[productId];
            totalPrice += item.price * item.quantity;
            totalQuantity += item.quantity;
        }
        cartTotalPriceElement.textContent = totalPrice;
       cartTotalQtyElement.textContent = totalQuantity;
   }
   const checkoutForm = document.getElementById('checkout-form');
   checkoutForm.addEventListener('submit', function(event) {
      event.preventDefault();
      alert('Заказ оформлен!');
      LocalStorageService.clearCart();
        window.location.href = 'index.php';
});

});