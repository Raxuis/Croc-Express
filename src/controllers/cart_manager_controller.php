<?php

// $_SESSION["cart"] = { id: { quantity: itemQuantity, totalPrice: totalPriceOfItems }, ...}
// $_SESSION["inDelivery"] = true|false
// actions possibles : add, remove, set_price get_all, set_delivery ($_SESSION["inDelivery"] = !$_SESSION["inDelivery"]), get_total_price
// $_GET : "action", "id", "price"

session_start();

if (!empty($_GET["action"])) {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }
    if ($_GET["action"] === "add" && !empty($_GET["price"])) {
        if (empty($_SESSION["cart"][$_GET["id"]])) {
            $_SESSION["cart"][$_GET["id"]] = [
                "quantity" => 1,
                "totalPrice" => $_GET["price"]
            ];
        } else {
            $_SESSION["cart"][$_GET["id"]] = [
                "quantity" => $_SESSION["cart"][$_GET["id"]]["quantity"] + 1,
                "totalPrice" => $_SESSION["cart"][$_GET["id"]]["totalPrice"] + $_GET["price"]
            ];
        }
    } else if ($_GET["action"] === "remove" && !empty($_GET["price"])) {

        if (empty($_SESSION["cart"][$_GET["id"]])) {
            $_SESSION["cart"][$_GET["id"]] = [
                "quantity" => 0,
                "totalPrice" => 0
            ];
        }

        if ($_SESSION["cart"][$_GET["id"]]["quantity"] > 1) {
            $_SESSION["cart"][$_GET["id"]] = [
                "quantity" => $_SESSION["cart"][$_GET["id"]]["quantity"] - 1,
                "totalPrice" => $_SESSION["cart"][$_GET["id"]]["totalPrice"] - $_GET["price"]
            ];
        } else {
            unset($_SESSION["cart"][$_GET["id"]]);
        }
    } else if ($_GET["action"] === "set_price" && !empty($_GET["price"])) {
        $_SESSION["cart"][$_GET["id"]] = [
            "quantity" => $_SESSION["cart"][$_GET["id"]]["quantity"],
            "totalPrice" => $_GET["price"]
        ];
    } else if ($_GET["action"] === "set_delivery") {
        if (isset($_SESSION["inDelivery"])) {
            $_SESSION["inDelivery"] = !$_SESSION["inDelivery"];
        } else {
            $_SESSION["inDelivery"] = false;
        }
    }
}

$totalPrice = 0;
foreach ($_SESSION["cart"] as $key => $value) {
    $totalPrice += $value["totalPrice"];
}
if (isset($_SESSION["inDelivery"]) && $_SESSION["inDelivery"] === true) {
    $totalPrice += 5;
}

$cartData = [
    "cart" => $_SESSION["cart"],
    "inDelivery" => $_SESSION["inDelivery"] ?? false,
    "totalPrice" => $totalPrice
];

echo json_encode($cartData);