<?php

$orders = $orderManager->getOrdersByUserId($_SESSION['user_id']);

//print_r($orders);

require PATH_VIEWS . 'orders.php';