<?php
global $bdd;
require "../src/core/DBconnection.php";

require "../src/classes/managers/UserManager.class.php";
require "../src/classes/User.class.php";

if (isset($_GET['kill']) && $_GET['kill'] == "all") {
    session_start();
    session_destroy();
}
$availableRoutes = ['homepage', 'register', 'login', 'cart'];
$route = 'homepage';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}

// NE PAS SUPPRIMER : TESTS POUR VERIFIER QUE L'ARCHITECTURE BDD FONCTIONNE

require "../src/classes/managers/FoodManager.class.php";
require "../src/classes/Food.class.php";

require "../src/classes/managers/ProductFoodManager.class.php";
require "../src/classes/ProductFood.class.php";

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

//$productFoodManager = new ProductFoodManager($bdd, "products_foods");
//$productFood = new ProductFood([
//    'productId' => 1,
//    'foodId' => 1
//]);
//$productFoodManager->createOne($productFood);


require '../src/views/layout.php';