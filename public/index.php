<?php
global $bdd;
require "../src/core/DBconnection.php";
require "../src/classes/managers/UserManager.class.php";
require "../src/classes/User.class.php";

session_start();
if (isset($_GET['page']) && $_GET['page'] == "disconnect") {
    session_destroy();
    header('Location:../public/index.php');
}
$availableRoutes = ['homepage', 'register', 'login', 'cart', 'show_products', 'admin_add_food', 'admin_add_product', 'admin_add_menu', 'contact', 'admin_messages'];
$route = 'homepage';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}

// NE PAS SUPPRIMER : TESTS POUR VERIFIER QUE L'ARCHITECTURE BDD FONCTIONNE
require "tests.temp.php";
$userManager = new UserManager($bdd, "users");
$foodManager = new FoodManager($bdd, "foods");
$productManager = new ProductManager($bdd, "products");

require '../src/views/layout.php';
