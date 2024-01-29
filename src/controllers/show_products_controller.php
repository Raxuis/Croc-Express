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
function calculateCalories($grams, $caloriesPer100g)
{
    return $grams * $caloriesPer100g;
}
function calculateTotalCaloriesPerAliment($data)
{
    $lipidCalories = calculateCalories($data["lipid"], 9);
    $carboCalories = calculateCalories($data["carbohydrate"], 4);
    $proteinCalories = calculateCalories($data["protein"], 4);
    $totalCalories = $lipidCalories + $carboCalories + $proteinCalories;
    return $totalCalories;
}
require PATH_VIEWS . 'show_products.php';