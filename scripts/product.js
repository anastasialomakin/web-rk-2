import LocalStorageService from './storage.js';

document.addEventListener('DOMContentLoaded', async function() {
    const productDetailsContainer = document.getElementById('product-details');
    const productImage = document.getElementById('product-image');
    const productActions = document.getElementById('product-actions');

    if(!productDetailsContainer || !productImage || !productActions){
        console.error('Не удалось найти все необходимые элементы на странице');
    return;
    }

    const productId = new URLSearchParams(window.location.search).get('id');
    let products = [];
    let cart = LocalStorageService.getCart();
        try {
           const response = await fetch('data.json');
            if (!response.ok) {
                 throw new Error('Ошибка загрузки данных');
           }
            products = await response.json();
        } catch (error) {
           console.error('Ошибка:', error);
          const errorMessage = document.createElement('p');
         errorMessage.textContent = 'Не удалось загрузить данные. Попробуйте позже.';
           document.body.appendChild(errorMessage);
         return;
        }
        const product = products.find(item => item.id === parseInt(productId));
        if (!product) {
        productDetailsContainer.innerHTML = '<p>Товар не найден.</p>';
         return;
     }
     productDetailsContainer.innerHTML = `
        <h2>${product.name}</h2>
        <p class="product-price">${product.price} руб.</p>
        <p class="product-description">${product.description}</p>
        <p class="product-composition"><strong>Состав:</strong> ${product.composition.join(', ')}</p>
        <p class="product-stock"><strong>В наличии:</strong> ${product.stock}</p>
     `;

    productImage.src = product.image;
    productImage.alt = product.name;

     let isInCart = cart.hasOwnProperty(product.id);
     renderButton(product, isInCart);
      function renderButton(product, isInCart){
         productActions.innerHTML = '';
          const button = document.createElement('button');
          button.classList.add('btn', 'btn-primary');
          button.style.fontFamily = 'Poiret One, serif';
          button.style.fontSize = '18px';
          button.textContent = isInCart ? "Удалить из корзины" : "Добавить в корзину";

            button.addEventListener('click', () => {
             if(isInCart){
                removeFromCart(product);
                   isInCart = false;
                  renderButton(product, isInCart);
             } else{
                 addToCart(product)
                 isInCart = true;
                renderButton(product, isInCart);
            }
        });
       productActions.appendChild(button);
   }
   function addToCart(product) {
      let updatedCart = LocalStorageService.getCart();
        if (!updatedCart[product.id]) {
            updatedCart[product.id] = {
                ...product,
                quantity: 1
           };
        }
       LocalStorageService.saveCart(updatedCart);
   }

   function removeFromCart(product){
        let updatedCart = LocalStorageService.getCart();
        delete updatedCart[product.id];
       LocalStorageService.saveCart(updatedCart);
   }
});