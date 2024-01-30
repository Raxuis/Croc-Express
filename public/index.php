<?php
global $bdd;
require "../config/config.php";
require PATH_TO_PRIVATE . "core/DBconnection.php";


session_start();
ob_start();
if (isset($_GET['page']) && $_GET['page'] == "disconnect") {

    unset($_SESSION['email']);
    unset($_SESSION['name']);
    unset($_SESSION['user_id']);
    unset($_SESSION['is_admin']);
    unset($_SESSION['logged']);

//    ob_clean();
    header("Location: " . BASE_PATH);
    exit();
} else if (isset($_GET['page']) && $_GET['page'] == "killall") {
    session_destroy();
//    ob_clean();
    header("Location: " . BASE_PATH);
    exit();
}

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
}

$availableRoutes = ['homepage', 'register', 'login', 'cart', 'show_products', 'contact', 'edit_profile', 'orders', 'admin_messages', 'admin_add_food', 'admin_add_product', 'admin_edit_product', 'admin_add_menu', 'admin_products', 'admin_orders', 'admin_bestsellers', 'admin_turnover', 'admin_deliver', 'admin_add_category', 'admin_coupons', 'admin_menus', 'payment', 'admin_add_coupon', 'admin_categories', 'admin_edit_menu', 'admin_edit_category', 'admin_food', 'admin_edit_food', 'admin_edit_coupon'];
$route = 'homepage';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
    if (str_starts_with($route, 'admin_')) {
        if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== 1) {
//            ob_clean();
            header('Location: index.php');
            exit();
        }
    }
}

require "imports.php";

require PATH_VIEWS . 'layout.php';
