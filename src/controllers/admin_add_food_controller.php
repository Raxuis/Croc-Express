<?php

if (!empty($_POST)) {
    if (!empty($_POST['name']) && !empty($_POST['lipid']) && !empty($_POST['protein']) && !empty($_POST['carbohydrate']) && !empty($_POST['weight'])) {
        $food = new Food($_POST);
        $foodId = $foodManager->createOne($food);
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Food created with id: " . $foodId;
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Veuillez remplir tous les champs";
    }
}

require PATH_VIEWS . 'admin_add_food.php';