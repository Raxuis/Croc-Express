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

function updateTotalPriceValue(item, value) {
    item.textContent = value;
}

function updateCartTotalValue(cart, value) {
    cart.textContent = value;
}

function getTotalCartValue(cart) {
    fetch("../src/controllers/cart_manager_controller.php?action=get_all_articles").then((response) => {
        response.json().then((data) => {
            let allArticlesId = data;
            let total = 0;
            for (let i = 0; i < allArticlesId.length; i++) {
                let item = document.getElementById("item-total-price-" + allArticlesId[i]);
                total += parseInt(item.textContent);
            }
            updateCartTotalValue(cart, total);
        });
    });
}

function updateCart(cart, product, action) {
    fetch("../src/controllers/cart_manager_controller.php?id=" + product + "&action=" + action).then((response) => {
        response.json().then((data) => {
            updateCartValue(cart, data.total);
            updateItemValue(document.getElementById("item-quantity-" + product), data["itemTotal"]);
            updateTotalPriceItemValue(document.getElementById("item-total-price-" + product), data["itemTotal"]);
            updateTotalPriceValue(document.getElementById("total-price"), data["totalPrice"]);
            getTotalCartValue(document.getElementById("total-price"));

            if(!data["cart"].includes(product)) {
                document.getElementById("item-" + product).remove();
            }
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

let livery = document.getElementById("livery");
livery.addEventListener("change", (event) => {
    let deliveryPrice = document.getElementById("delivery-price");
    if(!event.target.checked) {
        updateTotalPriceValue(document.getElementById("total-price"), parseInt(document.getElementById("total-price").textContent) - 5);
        updateItemValue(deliveryPrice, 0);
    } else {
        updateTotalPriceValue(document.getElementById("total-price"), parseInt(document.getElementById("total-price").textContent) + 5);
        updateItemValue(deliveryPrice, 5);
    }
});