<?php
$menusManager = new MenuManager($bdd, "menus");
$menus = $menusManager->getAll();
if (isset($_POST['delete']) && $_POST['delete'] === 'true') {
    $id = $_POST['id'];
    $menusManager->deleteOne($id);
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Menu supprimé avec succès';
    header('Location:?page=admin_menus');
    exit();
}
require PATH_VIEWS . 'admin_menus.php';