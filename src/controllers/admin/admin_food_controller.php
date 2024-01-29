<?php

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $foodManager->deleteOne($id);
    header('Location: ?page=admin_food');
}

$allFood = $foodManager->getAll();

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

require PATH_VIEWS . 'admin/admin_food.php';
