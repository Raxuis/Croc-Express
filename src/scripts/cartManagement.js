function updateCartValue(cart, value) {
    cart.innerHTML = value;
}

function addToCart(cart, product) {
    // TODO : Modifier ça

    fetch("../src/controllers/add_to_cart.php?id="+product).then((response) => {
        // return response.json();
        response.json().then((data) => {
            console.log(data);
            updateCartValue(cart, data.total)
        });
    });
}
function buttonListener(product, button, cart) {
    button.addEventListener("click", () => {
        addToCart(cart, product);
    });
}

function initializeCart(productId, buttonId, cart) {
    const product = productId;
    const button = document.getElementById(buttonId);
    buttonListener(product, button, cart);
}