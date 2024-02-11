<?php

if (!empty($_POST)) {
    if (!empty($_POST['token']) && $_POST['token'] != $_SESSION['token']) {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Erreur de vérification du formulaire";
        header('Location: ?page=homepage');
        exit;
    }
    if (isset($_POST['name']) && isset($_POST['lipid']) && isset($_POST['carbohydrate']) && isset($_POST['protein'])) {

        $dbFood = $foodManager->getOne($_POST['id']);
        $foodObject = new Food($_POST);
        $foodManager->editOne($foodObject);

        ob_clean();
        header('location: index.php?page=admin_food');
        exit(0);
    }
}

$food = $foodManager->getOne($_POST['id']);

require PATH_VIEWS . 'admin/admin_edit_food.php';
