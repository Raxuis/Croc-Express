<?php

if(!isset($_SESSION["is_admin"])) {
    header('location: index.php');
    exit(0);
}

if (!empty($_POST)) {
    if (isset($_POST['name']) && isset($_POST['lipid']) && isset($_POST['protein']) && isset($_POST['carbohydrate']) && isset($_POST['weight'])) {
        $food = new Food($_POST);
        $foodId = $foodManager->createOne($food);
        echo "Food created with id: " . $foodId . "<br>";
    }
}

require '../src/views/admin_add_food.php';