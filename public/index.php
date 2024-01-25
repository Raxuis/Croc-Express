<?php
global $bdd;
require "../config/config.php";
require PATH_TO_PRIVATE . "core/DBconnection.php";
require PATH_TO_PRIVATE . 'classes/managers/UserManager.class.php';
require PATH_TO_PRIVATE . 'classes/User.class.php';

session_start();
if (isset($_GET['page']) && $_GET['page'] == "disconnect") {
    session_destroy();
    header("Location: " . BASE_PATH);

}
$availableRoutes = ['homepage', 'register', 'login', 'cart', 'show_products', 'admin_add_food', 'admin_add_product', 'admin_edit_product', 'admin_add_menu', 'contact', 'admin_messages', 'admin_products', 'edit_profile', 'admin_orders', 'admin_bestsellers', 'admin_turnover', 'admin_deliver', 'admin_add_category', 'orders'];
$route = 'homepage';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}


// NE PAS SUPPRIMER : TESTS POUR VERIFIER QUE L'ARCHITECTURE BDD FONCTIONNE
require "tests.temp.php";
$userManager = new UserManager($bdd, "users");
$foodManager = new FoodManager($bdd, "foods");
$productManager = new ProductManager($bdd, "products");
require PATH_VIEWS . 'layout.php';
