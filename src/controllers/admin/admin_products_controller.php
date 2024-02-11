<?php
$totalCalories = 0;

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
function calculateCalories($grams, $caloriesPer100g): float|int
{
    return $grams * $caloriesPer100g;
}
function calculateTotalCaloriesPerAliment($data): float|int
{
    $lipidCalories = calculateCalories($data["lipid"], 9);
    $carboCalories = calculateCalories($data["carbohydrate"], 4);
    $proteinCalories = calculateCalories($data["protein"], 4);
    $totalCalories = $lipidCalories + $carboCalories + $proteinCalories;
    return $totalCalories;
}
require PATH_VIEWS . 'admin/admin_products.php';
