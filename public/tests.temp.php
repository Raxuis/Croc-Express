<?php

// NE PAS SUPPRIMER CE FICHIER : TESTS POUR VERIFIER QUE L'ARCHITECTURE BDD FONCTIONNE

require "../src/classes/managers/FoodManager.class.php";
require "../src/classes/Food.class.php";

require "../src/classes/managers/ProductManager.class.php";
require "../src/classes/Product.class.php";

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

require "../src/classes/managers/AddressManager.class.php";
require "../src/classes/Address.class.php";

require "../src/classes/managers/OrderManager.class.php";
require "../src/classes/Order.class.php";

require "../src/classes/managers/ProductImageManager.class.php";
require "../src/classes/ProductImage.class.php";

require "../src/classes/managers/OrderProductManager.class.php";
require "../src/classes/OrderProduct.class.php";

require "../src/classes/managers/MenuProductManager.class.php";
require "../src/classes/MenuProduct.class.php";

//$foodManager = new FoodManager($bdd, "foods");
//$food = new Food([
//    'name' => "Pain",
//    'lipid' => 5,
//    'protein' => 5,
//    'carbohydrate' => 5,
//    'weight' => 10,
//    'isHidden' => null
//]);
//$foodManager->createOne($food);

$productFoodManager = new ProductFoodManager($bdd, "products_foods");
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

$categoryManager = new CategoryManager($bdd, "categories");
//$category = new Category([
//    'name' => "Burgers",
//    'description' => 'Nos délicieux burgers',
//    'isHidden' => false
//]);
//$categoryManager->createOne($category);

$messageManager = new MessageManager($bdd, "messages");
//$message = new Message([
//    'title' => "TEST",
//    'content' => 'TEST',
//    'userId' => 1,
//    'ip' => $_SERVER['REMOTE_ADDR'],
//]);
//$messageManager->createOne($message);

$menuManager = new MenuManager($bdd, "menus");
//$menu = new Menu([
//    'name' => "Formule Midi",
//    'price' => 10,
//    'isHidden' => null
//]);
//$menuManager->createOne($menu);

$addressManager = new AddressManager($bdd, "address");
//$address = new Address([
//    'userId' => 1,
//    'street' => "Rue de la Paix",
//    'city' => 'Sougy',
//    'zip' => '45410',
//    'country' => 'France',
//]);
//$addressManager->createOne($address);

$orderManager = new OrderManager($bdd, "orders");
//$order = new Order([
//    'userId' => 1,
//    'price' => 25,
//    'couponId' => null,
//    'addressId' => null,
//    'isInDelivery' => null,
//    'isValidated' => null
//]);
//$orderManager->createOne($order);

$productImageManager = new ProductImageManager($bdd, "products_images");
//$productImage = new ProductImage([
//    'productId' => 1,
//    'image' => "image.png"
//]);
//$productImageManager->createOne($productImage);

$orderProductManager = new OrderProductManager($bdd, "orders_products");
//$orderProduct = new OrderProduct([
//    'orderId' => 1,
//    'productId' => 1,
//    'price' => 10,
//    'quantity' => 1
//]);
//$orderProductManager->createOne($orderProduct);

$menuProductManager = new MenuProductManager($bdd, "menus_products");
//$menuProduct = new MenuProduct([
//    'menuId' => 1,
//    'productId' => 1,
//    'price' => 10,
//]);
//$menuProductManager->createOne($menuProduct);