<?php

$productsManager = new ProductManager($bdd, 'products');
$productImageManager = new ProductImageManager($bdd, 'product_image');

$totalCalories = 0;

if (!empty($_GET['category_id']) && is_numeric($_GET['category_id'])) {
    $products = $productsManager->getProductsByCategoryId($_GET['category_id'], true);
}
if (!empty($_GET['menu_id']) && is_numeric($_GET['menu_id'])) {
    $menuProducts = $menuManager->getAllProductsFromMenu($_GET['menu_id']);
}

require PATH_VIEWS . 'show_products.php';