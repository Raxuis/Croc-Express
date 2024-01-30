// { id: { quantity: itemQuantity, totalPrice: totalPriceOfItems }, ...}

function updateCartValue(value) {
    let cartEle = document.getElementById("cart-quantity");
    cartEle.textContent = parseInt(cartEle.textContent) + value;
}

function updateItemValue(item, value) {
    item.textContent = value;
}

function updateTotalPriceItemValue(item, value, price) {
    item.textContent = value * parseInt(price);
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

function updateCart(productId, price, action, type, in_cart = true) {
    let cartEle = document.getElementById("cart-quantity");

    fetch("../src/controllers/cart_manager_controller.php?id=" + productId + "&price=" + price + "&action=" + action + "&type=" + type).then((response) => {
        response.json().then((data) => {
            // format of data : { id: { quantity: itemQuantity, totalPrice: totalPriceOfItems }, ...}

            let empty = true;

            cartEle.textContent = 0;
            for (const itemType in data["cart"]) {
                for (const itemId in data["cart"][itemType]) {
                    if (itemType === type) {
                        let item = data["cart"][itemType][itemId];

                        updateCartValue(item["quantity"]);

                        if (itemId === productId) {
                            if (in_cart) {
                                updateItemValue(document.getElementById("item-quantity-" + type + "-" + itemId), item["quantity"]);
                                updateTotalPriceItemValue(document.getElementById("item-total-price-" + type + "-" + productId), item["quantity"], price);
                                updateTotalPriceValue(document.getElementById("total-price"), item["totalPrice"]);
                                getTotalCartValue(document.getElementById("total-price"));

                                if (item["quantity"] === 0) {
                                    document.getElementById("item-" + type + "-" + productId).remove();
                                    updateTotalPriceValue(document.getElementById("total-price"), item["totalPrice"]);

                                }
                            }
                        }
                    }

                    if (data["cart"][itemType][itemId]["quantity"] !== 0) {
                        empty = false;
                    }
                }

                if (data["cart"][itemType] === {}) {
                    empty = false;
                }
            }

            if (empty) {
                window.location.href = "?page=homepage";
            }
        });
    });
}

function buttonListener(product, price, button, in_cart = true) {
    button.addEventListener("click", () => {
        let action = button.getAttribute("data-action") ? button.getAttribute("data-action") : "add";
        let type = button.getAttribute("data-type") ? button.getAttribute("data-type") : "product";
        updateCart(product, price, action, type, in_cart);
    });
}

function initializeCart(productId, price, buttonId, in_cart = true) {
    const button = document.getElementById(buttonId);
    buttonListener(productId, price, button, in_cart);
}

// PAYMENT
function validateOrder() {
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