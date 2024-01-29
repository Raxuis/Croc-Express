<?php
$orderManager = new OrderManager($bdd, 'orders');
$orders = json_encode($orderManager->getAll());

require PATH_VIEWS . 'admin_bestsellers.php';