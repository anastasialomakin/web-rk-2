import LocalStorageService from './storage.js';

document.addEventListener('DOMContentLoaded', async function () {
    const cartPanel = document.getElementById('cart-panel');
    const cartTotalPriceElement = document.getElementById('cart-total-price');
    const cartTotalQtyElement = document.getElementById('cart-total-qty');
    const categories = ['outerwear', 'pants', 'tshirts', 'hats'];
    let products = LocalStorageService.getProducts();
    let cart = LocalStorageService.getCart();
    console.log('Начало загрузки страницы shop.js');
    if(products.length === 0){
        try{
            const response = await fetch('data.json');
            if(!response.ok){
                 console.error('Ошибка при загрузке JSON:', response.status, response.statusText);
                 throw new Error('Ошибка загрузки данных');
            }
            products = await response.json();
           LocalStorageService.saveProducts(products);
           console.log('Данные успешно загружены и сохранены в localStorage:', products);
        } catch (error) {
           console.error('Ошибка:', error);
          const errorMessage = document.createElement('p');
                errorMessage.textContent = 'Не удалось загрузить данные. Попробуйте позже.';
                document.body.appendChild(errorMessage);
        }
     } else{
         console.log('Данные из localStorage:', products);
     }
    renderProducts();
    updateCartDisplay();
    function renderProducts() {
          categories.forEach(category => {
             const container = document.getElementById(`${category}-container`);
            if(container){
              const categoryProducts = products.filter(product => product.category === category);
              console.log(`Товары категории ${category}:`, categoryProducts);
                categoryProducts.forEach(product => {
                  const productCard = document.createElement('div');
                    productCard.classList.add('product-card');

                    productCard.innerHTML = `
                        <a href="product.php?id=${product.id}">
                            <img src="${product.image}" alt="${product.name}">
                        </a>
                        <h3 class="product-card-title">${product.name}</h3>
                        <p class="product-card-price">${product.price} руб.</p>
                         ${product.isNew ? '<span class="new-tag">Новинка</span>' : ''}
                        <button class="add-to-cart-btn"  style="font-family: 'Poiret One', serif; font-size:18px;" data-product-id="${product.id}">Добавить в корзину</button>
                    `;
                  container.appendChild(productCard);
               });
           }
        });
   }

    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            const product = products.find(item => item.id === parseInt(productId));
             if (product) {
                 addToCart(product);
                 updateCartDisplay();
            }
       });
    });

    function addToCart(product) {
         if (!cart[product.id]) {
            cart[product.id] = {
                 ...product,
                quantity: 1
              };
           }
         LocalStorageService.saveCart(cart);
       }
    const clearCartButton = document.querySelector('.clear-cart-btn');
    clearCartButton.addEventListener('click', () => {
        clearCart();
        updateCartDisplay();
   });

   function clearCart() {
         cart = {};
         LocalStorageService.clearCart();
    }

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
        if(Object.keys(cart).length > 0){
            cartPanel.classList.add('open');
       } else{
          cartPanel.classList.remove('open');
        }
    }
    const checkoutButton = document.querySelector('.checkout-btn');
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