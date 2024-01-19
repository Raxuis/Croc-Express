<?php
global $bdd;
require "../src/core/DBconnection.php";

require "../src/classes/managers/UserManager.class.php";
require "../src/classes/User.class.php";

if (isset($_GET['kill']) && $_GET['kill'] == "all") {
    session_start();
    session_destroy();
}
$availableRoutes = ['homepage', 'register', 'login'];
$route = 'homepage';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}

require "../src/classes/managers/FoodManager.class.php";
require "../src/classes/Food.class.php";

/* $foodManager = new FoodManager($bdd, "foods");
$food = new Food([
    'name' => "Pain",
    'lipid' => 5,
    'protein' => 5,
    'carbohydrate' => 5,
    'weight' => 10,
    'isHidden' => null
]);
$foodManager->createOne($food); */

require '../src/views/layout.php';