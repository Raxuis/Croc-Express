<?php

// $_SESSION["cart"] = { type(product|menu) : { id: { quantity: itemQuantity, totalPrice: totalPriceOfItems }, ... }}
// $_SESSION["inDelivery"] = true|false
// actions possibles : add, remove, set_price get_all, set_delivery ($_SESSION["inDelivery"] = !$_SESSION["inDelivery"]), get_total_price
// $_GET : "action", "id", "price", "type"

session_start();

if (!empty($_GET["action"])) {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }
    if ($_GET["action"] === "add" && !empty($_GET["price"])) {
        if (empty($_SESSION["cart"][$_GET["type"]][$_GET["id"]])) {
            $_SESSION["cart"][$_GET["type"]][$_GET["id"]] = [
                "quantity" => 1,
                "totalPrice" => $_GET["price"]
            ];
        } else {
            $_SESSION["cart"][$_GET["type"]][$_GET["id"]] = [
                "quantity" => $_SESSION["cart"][$_GET["type"]][$_GET["id"]]["quantity"] + 1,
                "totalPrice" => $_SESSION["cart"][$_GET["type"]][$_GET["id"]]["totalPrice"] + $_GET["price"]
            ];
        }
    } else if ($_GET["action"] === "remove" && !empty($_GET["price"])) {

        if (empty($_SESSION["cart"][$_GET["type"]][$_GET["id"]])) {
            $_SESSION["cart"][$_GET["type"]][$_GET["id"]] = [
                "quantity" => 0,
                "totalPrice" => 0
            ];
        }

        if ($_SESSION["cart"][$_GET["type"]][$_GET["id"]]["quantity"] > 0) {
            $_SESSION["cart"][$_GET["type"]][$_GET["id"]] = [
                "quantity" => $_SESSION["cart"][$_GET["type"]][$_GET["id"]]["quantity"] - 1,
                "totalPrice" => $_SESSION["cart"][$_GET["type"]][$_GET["id"]]["totalPrice"] - $_GET["price"]
            ];
        }
    } else if ($_GET["action"] === "set_price" && !empty($_GET["price"])) {
        $_SESSION["cart"][$_GET["type"]][$_GET["id"]] = [
            "quantity" => $_SESSION["cart"][$_GET["type"]][$_GET["id"]]["quantity"],
            "totalPrice" => $_GET["price"]
        ];
    } else if ($_GET["action"] === "set_delivery") {
        if (isset($_SESSION["inDelivery"])) {
            $_SESSION["inDelivery"] = !$_SESSION["inDelivery"];
        } else {
            $_SESSION["inDelivery"] = true;
        }
    } else if ($_GET["action"] === "clear") {
        unset($_SESSION["cart"]);
        unset($_SESSION["inDelivery"]);
    }
}

$totalPrice = 0;
if (isset($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $type => $items) {
        foreach ($items as $key => $value) {
            $totalPrice += $value["totalPrice"];
        }
    }
    if (isset($_SESSION["inDelivery"]) && $_SESSION["inDelivery"] === true) {
        $totalPrice += 5;
    }

    $cartData = [
        "cart" => $_SESSION["cart"],
        "inDelivery" => $_SESSION["inDelivery"] ?? false,
        "totalPrice" => $totalPrice
    ];
} else {
    $cartData = [];
}

echo json_encode($cartData);

if (isset($_GET["type"]) && isset($_GET["id"])) {
    if ($_GET["action"] === "remove" && $_SESSION["cart"][$_GET["type"]][$_GET["id"]]["quantity"] === 0) {
        unset($_SESSION["cart"][$_GET["type"]][$_GET["id"]]);
    }

    if (empty($_SESSION["cart"][$_GET["type"]])) {
        unset($_SESSION["cart"][$_GET["type"]]);
    }

    if (empty($_SESSION["cart"])) {
        unset($_SESSION["cart"]);
    }
}
