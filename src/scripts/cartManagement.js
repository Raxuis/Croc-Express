function updateCartValue(cart, value) {
    cart.innerHTML = value;
}

function updateItemValue(item, value) {
    item.textContent = value;
}

function updateTotalPriceItemValue(item, value) {
    let price = item.getAttribute("data-price");
    item.textContent = value * price;
}

function updateCart(cart, product, action) {
    fetch("../src/controllers/cart_manager_controller.php?id=" + product + "&action=" + action).then((response) => {
        response.json().then((data) => {
            updateCartValue(cart, data.total);
            updateItemValue(document.getElementById("item-quantity-" + product), data.itemTotal);
            updateTotalPriceItemValue(document.getElementById("item-total-price-" + product), data.itemTotal);
        });
    });
}

function buttonListener(product, button, cart) {
    button.addEventListener("click", () => {
        updateCart(cart, product, button.getAttribute("data-action"));
    });
}

function initializeCart(productId, buttonId, cart) {
    const product = productId;
    const button = document.getElementById(buttonId);
    buttonListener(product, button, cart);
}
