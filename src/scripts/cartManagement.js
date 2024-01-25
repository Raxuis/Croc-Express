// { id: { quantity: itemQuantity, totalPrice: totalPriceOfItems }, ...}

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
    // fetch("../src/controllers/cart_manager_controller.php?action=set_total_price&total=" + value).then(r =>
    //     r.json().then(data => {
    //         console.log(data);
    //     })
    // );
    cart.textContent = value;
}

function getTotalCartValue(cart) {
    fetch("../src/controllers/cart_manager_controller.php").then((response) => {
        response.json().then((data) => {
            updateCartTotalValue(cart, data["totalPrice"]);
        });
    });
}

function updateCart(cart, product, price, action) {
    fetch("../src/controllers/cart_manager_controller.php?id=" + product + "&price=" + price + "&action=" + action).then((response) => {
        response.json().then((data) => {

            // format of data : { id: { quantity: itemQuantity, totalPrice: totalPriceOfItems }, ...}

            for (const itemKey in data["cart"]) {
                let item = data["cart"][itemKey];

                updateCartValue(cart, item["quantity"]);
                updateItemValue(document.getElementById("item-quantity-" + product), item["quantity"]);
                updateTotalPriceItemValue(document.getElementById("item-total-price-" + product), item["quantity"]);
                updateTotalPriceValue(document.getElementById("total-price"), item["totalPrice"]);
                getTotalCartValue(document.getElementById("total-price"));

                if (!data["cart"].includes(product)) {
                    document.getElementById("item-" + product).remove();
                    updateTotalPriceValue(document.getElementById("total-price"), item["totalPrice"]);
                }
            }
        });
    });
}

function buttonListener(product, price, button, cart) {
    button.addEventListener("click", () => {
        updateCart(cart, product, price, button.getAttribute("data-action"));
    });
}

function initializeCart(productId, price, buttonId, cart) {
    const product = productId;
    const button = document.getElementById(buttonId);
    buttonListener(product, price, button, cart);
}

// PAYMENT
function validateOrder() {
    // TODO: Implement this function
}


let livery = document.getElementById("livery");
livery.addEventListener("change", (event) => {
    let deliveryPrice = document.getElementById("delivery-price");
    if (!event.target.checked) {
        updateTotalPriceValue(document.getElementById("total-price"), parseInt(document.getElementById("total-price").textContent) - 5);
        updateItemValue(deliveryPrice, 0);
    } else {
        updateTotalPriceValue(document.getElementById("total-price"), parseInt(document.getElementById("total-price").textContent) + 5);
        updateItemValue(deliveryPrice, 5);
    }
});