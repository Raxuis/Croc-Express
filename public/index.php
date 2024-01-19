<?php
global $bdd;
require "../src/core/DBconnection.php";

require "../src/classes/Manager.class.php";
require "../src/classes/User.class.php";

$availableRoutes = ['homepage', 'register', 'login'];
$route = 'homepage';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}

require '../src/views/layout.php';