<?php
$orders = $orderManager->getAll();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mark-delivered'])) {
    $orderManager->markDelivered($_POST['order_id']);
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Commande marquée comme livrée';
    header('Location:?page=admin_deliver');
    exit;
}
require PATH_VIEWS . 'admin/admin_deliver.php';