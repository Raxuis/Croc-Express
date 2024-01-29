<?php
$orderManager = new OrderManager($bdd, 'orders');
$orders = $orderManager->getAll();
$productSold = [];
$quantitySold = [];

foreach ($orders as $order) {
    $products = $orderProductManager->getProductsOfOrder($order['id']);

    foreach ($products as $product) {
        if (!in_array($product["name"], $productSold)) {
            $productSold[] = $product["name"];
        }

        if (isset($benef[$product["name"]])) {
            $quantitySold[$product["name"]] = $quantitySold[$product["name"]] + $product["quantity"];
        } else {
            $quantitySold[$product["name"]] = $product["quantity"];
        }
    }
}

$productSold = json_encode(array_keys($quantitySold));
$quantitySold = json_encode(array_values($quantitySold));

require PATH_VIEWS . 'admin_bestsellers.php';