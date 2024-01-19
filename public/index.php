<?php
global $bdd;
require "../src/core/DBconnection.php";

require "../src/classes/managers/UserManager.class.php";
require "../src/classes/User.class.php";

if (isset($_GET['kill']) && $_GET['kill'] == "all") {
    echo "Successfully deleted all session datas";
    session_start();
    session_destroy();
}
$availableRoutes = ['homepage', 'register', 'login'];
$route = 'homepage';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}

require '../src/views/layout.php';