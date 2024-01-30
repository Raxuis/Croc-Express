<?php
$productsManager = new ProductManager($bdd, 'products');
$productImageManager = new ProductImageManager($bdd, 'product_image');

if (!empty($_POST)) {
    if (!(isset($_POST['token']) && $_POST['token'] == $_SESSION['token'])) {
        exit;
    }
} else {
    $_SESSION['inDelivery'] = false;
}

require PATH_VIEWS . "cart.php";
