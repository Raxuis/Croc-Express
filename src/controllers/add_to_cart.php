<?php

session_start();

if(empty($_SESSION["cart"])) {
    $_SESSION["cart"] = [
        $_GET["id"] => 1
    ];
} else {

    $id = $_GET["id"];
    if (array_key_exists($_GET["id"], $_SESSION["cart"])) {
        $_SESSION["cart"][$id] = $_SESSION["cart"][$id] + 1;
    } else {
        $_SESSION["cart"][$id] = 1;
    }
}

$total = 0;
foreach ($_SESSION["cart"] as $key => $value) {
    $total += $value;
}

echo '{ "total": "' . $total . '", "cart": ' . json_encode($_SESSION["cart"]) . ' }';