<?php

$productsManager = new ProductManager($bdd, 'products');
$productImageManager = new ProductImageManager($bdd, 'product_image');

$totalCalories = 0;
$totalWeight = 0;

if (!empty($_GET['category_id']) && is_numeric($_GET['category_id'])) {
    $products = $productsManager->getProductsByCategoryId($_GET['category_id'], true);
}
function calculateCalories($grams, $caloriesPerGram)
{
    return $grams * $caloriesPerGram;
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