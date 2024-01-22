<?php
global $bdd;
require "../src/core/DBconnection.php";

require "../src/classes/managers/UserManager.class.php";
require "../src/classes/User.class.php";

session_start();
if (isset($_GET['kill']) && $_GET['kill'] == "all") {
    session_destroy();
}
$availableRoutes = ['homepage', 'register', 'login', 'cart'];
$route = 'homepage';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}

// NE PAS SUPPRIMER : TESTS POUR VERIFIER QUE L'ARCHITECTURE BDD FONCTIONNE
require "tests.temp.php";

$userManager = new UserManager($bdd, "users");
require '../src/views/layout.php';
