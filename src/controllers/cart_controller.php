<?php
$productsManager = new ProductManager($bdd, 'products');
$productImageManager = new ProductImageManager($bdd, 'product_image');
$_SESSION['inDelivery'] = false;
if (!empty($_POST)) {
    if (!(isset($_POST['token']) && $_POST['token'] == $_SESSION['token'])) {
        exit;
    }
}

require PATH_VIEWS . "cart.php";
