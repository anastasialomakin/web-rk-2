const LocalStorageService = {
    ORDER_KEY: 'cart',
    PRODUCTS_KEY: 'products_data',
    saveCart(cart) {
        localStorage.setItem(this.ORDER_KEY, JSON.stringify(cart));
    },
    getCart() {
        const cart = localStorage.getItem(this.ORDER_KEY);
        return cart ? JSON.parse(cart) : {};
    },
    clearCart() {
        localStorage.removeItem(this.ORDER_KEY);
    },
     saveProducts(products){
        localStorage.setItem(this.PRODUCTS_KEY, JSON.stringify(products));
    },
    getProducts() {
        const products = localStorage.getItem(this.PRODUCTS_KEY);
        return products ? JSON.parse(products) : [];
    }
};
export default LocalStorageService;