<?php
require_once '../src/classes/managers/ProductManager.class.php';
require_once '../src/classes/managers/ProductImageManager.class.php';

$productsManager = new ProductManager($bdd, 'products');
$productImageManager = new ProductImageManager($bdd, 'product_image');
if (!empty($_GET['category_id']) && is_numeric($_GET['category_id'])) {
    $products = $productsManager->getProductsByCategoryId($_GET['category_id']);
}
require '../src/views/show_products.php';