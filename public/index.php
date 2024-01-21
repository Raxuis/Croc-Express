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

require "../src/classes/managers/CouponsManager.class.php";
require "../src/classes/Coupons.class.php";

require "../src/classes/managers/CategoryManager.class.php";
require "../src/classes/Category.class.php";

require "../src/classes/managers/MessageManager.class.php";
require "../src/classes/Message.class.php";

require "../src/classes/managers/MenuManager.class.php";
require "../src/classes/Menu.class.php";

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


//$couponManager = new CouponsManager($bdd, "coupons");
//$coupon = new Coupons([
//    'name' => "TEST",
//    'reduction' => 10,
//]);
//$couponManager->createOne($coupon);

//$categoryManager = new CategoryManager($bdd, "categories");
//$category = new Category([
//    'name' => "TEST",
//    'description' => 'TEST',
//    'isHidden' => null
//]);
//$categoryManager->createOne($category);

//$messageManager = new MessageManager($bdd, "messages");
//$message = new Message([
//    'title' => "TEST",
//    'content' => 'TEST',
//    'userId' => 1,
//    'ip' => $_SERVER['REMOTE_ADDR'],
//]);
//$messageManager->createOne($message);

$menuManager = new MenuManager($bdd, "menus");
$menu = new Menu([
    'name' => "Formule Midi",
    'price' => 10,
    'isHidden' => null
]);
$menuManager->createOne($menu);


require '../src/views/layout.php';