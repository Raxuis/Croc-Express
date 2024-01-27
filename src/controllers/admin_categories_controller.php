<?php

if (isset($_POST['delete'])) {
    $categoryManager->deleteOne($_POST['id']);
}
if (isset($_POST['show_hide'])) {
    $categoryManager->toggleHide($_POST['id']);
    $_SESSION['status'] = 'info';
    $_SESSION['message'] = 'Visibilité de la catégorie modifiée avec succès';
    ob_clean();
    header('Location:?page=admin_categories');
    exit();
}

$allCategories = $categoryManager->getAll();

require PATH_VIEWS . 'admin_categories.php';