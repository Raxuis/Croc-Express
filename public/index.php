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
    exit();
}
$availableRoutes = ['homepage', 'register', 'login', 'cart', 'show_products', 'contact', 'edit_profile', 'orders', 'admin_messages', 'admin_add_food', 'admin_add_product', 'admin_edit_product', 'admin_add_menu', 'admin_products', 'admin_orders', 'admin_bestsellers', 'admin_turnover', 'admin_deliver', 'admin_add_category', 'admin_coupons', 'admin_menus', 'payment', 'admin_add_coupon', 'admin_categories', 'admin_edit_menu'];
$route = 'homepage';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
    if (strpos($route, 'admin_') === 0) {
        if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== 1) {
            header('Location: index.php');
            exit();
        }
    }
}


// NE PAS SUPPRIMER : TESTS POUR VERIFIER QUE L'ARCHITECTURE BDD FONCTIONNE
require "tests.temp.php";
$userManager = new UserManager($bdd, "users");
$foodManager = new FoodManager($bdd, "foods");
$productManager = new ProductManager($bdd, "products");
require PATH_VIEWS . 'layout.php';
