<?php
require "../src/core/DBconnection.php";

$availableRoutes = ['homepage'];
$route = 'homepage';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}
require '../src/views/layout.php';