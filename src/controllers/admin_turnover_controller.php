<?php
$orderManager = new OrderManager($bdd, 'orders');
$orders = $orderManager->getAll();
$date = [];
$price = [];
$benef = [];
foreach ($orders as $order) {
    $products = $orderProductManager->getProductsOfOrder($order['id']);
    $dateOfOrder = date("d/m/y", strtotime($order['created_at']));

    if (!in_array($dateOfOrder, $date)) {
        $date[] = $dateOfOrder;
    }

    if (isset($price[$dateOfOrder])) {
        $price[$dateOfOrder] = $price[$dateOfOrder] + $order['price'];
    } else {
        $price[$dateOfOrder] = $order['price'];
    }

    foreach ($products as $product) {
        $marge = ($product["price"] - $product["buying_price"]) * $product["quantity"];

        if (isset($benef[$dateOfOrder])) {
            $benef[$dateOfOrder] = $benef[$dateOfOrder] + $marge;
        } else {
            $benef[$dateOfOrder] = $marge;
        }
    }
}

$totalPrice = array_sum($price);
$totalBenef = array_sum($benef);

$date = json_encode($date);
$price = json_encode($price);
$benef = json_encode($benef);
require PATH_VIEWS . 'admin_turnover.php';