<?php
$menusManager = new MenuManager($bdd, "menus");
$menus = $menusManager->getAll();
if (isset($_POST['delete']) && $_POST['delete'] === 'true') {
    $id = $_POST['id'];
    $menusManager->deleteOne($id);
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Menu supprimé avec succès';
    ob_clean();
    header('Location:?page=admin_menus');
    exit();
}
if (isset($_POST['show_hide'])) {
    $menusManager->toggleHide($_POST['id']);
    $_SESSION['status'] = 'info';
    $_SESSION['message'] = 'Visibilité du menu modifiée avec succès';
    ob_clean();
    header('Location:?page=admin_menus');
    exit();
}
require PATH_VIEWS . 'admin/admin_menus.php';