<?php
require_once PATH_CLASSES_MANAGERS . 'ProductManager.class.php';
require_once PATH_CLASSES_MANAGERS . 'ProductImageManager.class.php';

$productsManager = new ProductManager($bdd, 'products');
$productImageManager = new ProductImageManager($bdd, 'product_image');
if (!empty($_GET['category_id']) && is_numeric($_GET['category_id'])) {
    $products = $productsManager->getProductsByCategoryId($_GET['category_id'], true);
}
require PATH_VIEWS . 'show_products.php';