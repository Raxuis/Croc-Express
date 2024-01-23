function getCart(cart) {
    const cartValue = parseInt(cart.innerHTML) || 0;
    return cartValue;
}
function updateCartValue(cart) {
    cart.innerHTML = getCart(cart) + 1;
}

function addToCart(product) {
    let currentCart = JSON.parse(localStorage.getItem('currentCart'));
    if (currentCart === null) {
        currentCart = [];
    }
    currentCart.push(product);
    localStorage.setItem("currentCart", JSON.stringify(currentCart));
}
function buttonListener(product, button, cart) {
    button.addEventListener("click", () => {
        updateCartValue(cart);
        addToCart(product);
    });
}

function initializeCart(productId, buttonId, cart) {
    const product = productId;
    const button = document.getElementById(buttonId);
    buttonListener(product, button, cart);
}