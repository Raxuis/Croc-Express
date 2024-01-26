<?php

if (isset($_POST['show_hide'])) {
    $productManager->toggleHide($_POST['id']);
} else if (isset($_POST['delete'])) {
    $productManager->deleteOne($_POST['id']);
}

$allProducts = $productManager->getAll();

require PATH_VIEWS . 'admin_products.php';