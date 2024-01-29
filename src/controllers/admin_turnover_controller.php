<?php
$orderManager = new OrderManager($bdd, 'orders');
$orders = $orderManager->getAll();
$date = [];
$price = [];
foreach ($orders as $order) {
    $products = $orderProductManager->getProductsOfOrder($order['id']);
    array_push($date, $order['created_at']);
    array_push($price, $order['price']);
}
$date = json_encode($date);
$price = json_encode($price);
require PATH_VIEWS . 'admin_turnover.php';