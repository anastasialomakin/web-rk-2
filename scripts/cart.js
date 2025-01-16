import LocalStorageService from './storage.js';

document.addEventListener('DOMContentLoaded', function() {
    const cartItemsContainer = document.getElementById('cart-items-container');
    const clearCartButton = document.querySelector('.clear-cart-btn');
    const checkoutButton = document.querySelector('.checkout-btn');
    const cartTotalPriceElement = document.getElementById('cart-total-price');
    const cartTotalQtyElement = document.getElementById('cart-total-qty');
    let cart = LocalStorageService.getCart();

    renderCart();
    updateCartDisplay();
    
    function renderCart(){
    cartItemsContainer.innerHTML = '';
    if (Object.keys(cart).length === 0) {
        cartItemsContainer.innerHTML = `
        <div style="display: block; text-align: center;">
            <p style="font-size: 18px;">Ваша корзина пуста.</p>
            <a href="shop.php" class="btn btn-primary">Перейти к покупкам</a>
        </div>`;
        clearCartButton.style.display = 'none';
        checkoutButton.style.display = 'none';
        return;
      }
        clearCartButton.style.display = 'block';
        checkoutButton.style.display = 'block';

    for (const productId in cart) {
        const item = cart[productId];
        const cartItem = document.createElement('div');
          cartItem.classList.add('cart-item');
          cartItem.innerHTML = `
            <div class="cart-item-info">
                <div class="cart-item-image"><img src="${item.image}" alt="${item.name}"></div>
                <a href="product.php?id=${item.id}" class="cart-item-name">${item.name}</a>
                </div>
                <p class="cart-item-price">${item.price} руб.</p>
                <p class="cart-item-quantity">Кол-во: ${item.quantity}</p>
                <button class="remove-from-cart-btn" data-product-id="${item.id}"><img src="img/delete.png"></button>
         `;
        cartItemsContainer.appendChild(cartItem);
    }
        const removeFromCartButtons = document.querySelectorAll('.remove-from-cart-btn');
         removeFromCartButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                removeFromCart(productId);
                 renderCart();
                   updateCartDisplay();
             });
      });
  }

  function removeFromCart(productId) {
        let updatedCart = LocalStorageService.getCart();
        delete updatedCart[productId];
        LocalStorageService.saveCart(updatedCart);
        updateCartDisplay();
   }

  clearCartButton.addEventListener('click', () => {
        clearCart();
        renderCart();
        updateCartDisplay();
    });

    function clearCart() {
       LocalStorageService.clearCart();
       updateCartDisplay();
    }

   function updateCartDisplay() {
        let totalPrice = 0;
        let totalQuantity = 0;
        cart = LocalStorageService.getCart();
        for (const productId in cart) {
            const item = cart[productId];
            totalPrice += item.price * item.quantity;
            totalQuantity += item.quantity;
        }
       cartTotalPriceElement.textContent = totalPrice;
        cartTotalQtyElement.textContent = totalQuantity;
     }
       checkoutButton.addEventListener('click', () => {
            if(hasItemsInCart()){
              window.location.href = 'checkout.php';
            } else{
                 window.location.href = 'login.php';
            }
        });

 function hasItemsInCart() {
       return Object.keys(cart).length > 0;
   }
});