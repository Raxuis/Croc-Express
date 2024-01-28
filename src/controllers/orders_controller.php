<?php
$orders = $orderManager->getOrdersByUserId($_SESSION['user_id']);

if (count($orders) < 1) {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Vous n\'avez pas encore de commandes';
    header('Location:index.php');
    exit();
}

require PATH_VIEWS . 'orders.php';