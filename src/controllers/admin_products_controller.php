<?php

if (isset($_POST['show_hide'])) {
    $productManager->toggleHide($_POST['id']);
    $_SESSION['status'] = 'info';
    $_SESSION['message'] = 'Visibilité du produit modifiée avec succès';
    ob_clean();
    header('Location:?page=admin_products');
    exit();
} else if (isset($_POST['delete'])) {
    $productManager->deleteOne($_POST['id']);
}

$allProducts = $productManager->getAll();

require PATH_VIEWS . 'admin_products.php';