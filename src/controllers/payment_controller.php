<?php

session_start();

var_dump($_SESSION);

$cart = $_SESSION['cart'];
$totalPrice = 0;
foreach ($cart as $key => $value) {
    $totalPrice += $value["totalPrice"];
}

$inDelivery = $_SESSION['inDelivery'] ?? false;



