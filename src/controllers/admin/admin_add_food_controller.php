<?php

if (!empty($_POST)) {
    if (!isset($_POST['token']) || $_POST['token'] != $_SESSION['token']) {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Erreur de vérification du formulaire";
        header('Location: ?page=homepage');
        exit;
    }
    if (!empty($_POST['name']) && (!empty($_POST['lipid']) || $_POST['lipid'] >= 0) && (!empty($_POST['protein']) || $_POST['protein'] >= 0) && (!empty($_POST['carbohydrate']) || $_POST['carbohydrate'] >= 0) && !empty($_POST['weight'])) {
        $food = new Food($_POST);
        $foodId = $foodManager->createOne($food);
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Aliment créé avec l'id: " . $foodId;
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Veuillez remplir tous les champs";
    }
}

require PATH_VIEWS . 'admin/admin_add_food.php';