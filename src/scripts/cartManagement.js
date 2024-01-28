// { id: { quantity: itemQuantity, totalPrice: totalPriceOfItems }, ...}

function updateCartValue(cart, value) {
    cart.textContent = parseInt(cart.textContent) + value;
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

function updateCart(cart, product, price, action, in_cart = true) {
    fetch("../src/controllers/cart_manager_controller.php?id=" + product + "&price=" + price + "&action=" + action).then((response) => {
        response.json().then((data) => {
            // format of data : { id: { quantity: itemQuantity, totalPrice: totalPriceOfItems }, ...}

            cart.textContent = 0;
            for (const itemKey in data["cart"]) {
                let item = data["cart"][itemKey];

                updateCartValue(cart, item["quantity"]);

                if (in_cart) {
                    updateItemValue(document.getElementById("item-quantity-" + itemKey), item["quantity"]);
                    updateTotalPriceItemValue(document.getElementById("item-total-price-" + product), item["quantity"]);
                    updateTotalPriceValue(document.getElementById("total-price"), item["totalPrice"]);
                    getTotalCartValue(document.getElementById("total-price"));

                    if (!Object.keys(data["cart"]).includes(product)) {
                        document.getElementById("item-" + product).remove();
                        updateTotalPriceValue(document.getElementById("total-price"), item["totalPrice"]);
                    }
                }
            }

            // si panier vide -> redirection vers la page d'accueil
            console.log(data["cart"])
            if (data["cart"].length === 0) {
                window.location.href = "?page=homepage";
            }
        });
    });
}

function buttonListener(product, price, button, cart, in_cart = true) {
    button.addEventListener("click", () => {
        let action = button.getAttribute("data-action") ? button.getAttribute("data-action") : "add";
        updateCart(cart, product, price, action, in_cart);
    });
}

function initializeCart(productId, price, buttonId, cart, in_cart = true) {
    const product = productId;
    const button = document.getElementById(buttonId);
    buttonListener(product, price, button, cart, in_cart);
}

// PAYMENT
function validateOrder() {
    // TODO: Implement this function
    // check if delivery is checked -> if it is, make a form appear to fill in the address
    // check if the cart is empty
    // check if the user is logged in
    // if all is good, redirect to the payment page
    // else, display an error message

    fetch("../src/controllers/payment_controller.php?action=validate_order").then((response) => {
        response.json().then((data) => {
            console.log(data);
        });
    });
}

function setDeliveryStatus() {
    fetch("../src/controllers/cart_manager_controller.php?action=set_delivery").then((response) => {
        response.json().then((data) => {
            console.log(data);
        });
    });
}

function initializePayment() {
    let paymentButton = document.getElementById("payment-button");
    paymentButton.addEventListener("click", () => {
        validateOrder();
    });
}

function initializeDelivery() {
    let delivery = document.getElementById("delivery");
    delivery.addEventListener("change", (event) => {
        console.log("delivery");
        let deliveryPrice = document.getElementById("delivery-price");
        let addressForm = document.getElementById("address-form");

        setDeliveryStatus();

        if (!event.target.checked) {
            updateTotalPriceValue(document.getElementById("total-price"), parseInt(document.getElementById("total-price").textContent) - 5);
            updateItemValue(deliveryPrice, 0);
            addressForm.classList.add("address-hidden");

        } else {
            updateTotalPriceValue(document.getElementById("total-price"), parseInt(document.getElementById("total-price").textContent) + 5);
            updateItemValue(deliveryPrice, 5);
            addressForm.classList.remove("address-hidden");
        }
    });
}

function initializeEmptyCart() {
    let emptyCartButton = document.getElementById("emptyCart");
    emptyCartButton.addEventListener("click", () => {
        fetch("../src/controllers/cart_manager_controller.php?action=clear").then((response) => {
            response.json().then((data) => {
                let itemsEle = document.getElementsByClassName("items-list");
                for (const itemEle of itemsEle) {
                    itemEle.remove()
                }
                window.location.href = "?page=homepage";

            });
        });
    });
}