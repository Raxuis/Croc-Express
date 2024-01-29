<?php

require PATH_TO_PRIVATE . 'classes/managers/UserManager.class.php';
require PATH_TO_PRIVATE . 'classes/User.class.php';

require PATH_TO_PRIVATE . "classes/managers/FoodManager.class.php";
require PATH_TO_PRIVATE . "classes/Food.class.php";

require PATH_TO_PRIVATE . "classes/managers/ProductManager.class.php";
require PATH_TO_PRIVATE . "classes/Product.class.php";

require PATH_TO_PRIVATE . "classes/managers/ProductFoodManager.class.php";
require PATH_TO_PRIVATE . "classes/ProductFood.class.php";

require PATH_TO_PRIVATE . "classes/managers/CouponsManager.class.php";
require PATH_TO_PRIVATE . "classes/Coupons.class.php";

require PATH_TO_PRIVATE . "classes/managers/CategoryManager.class.php";
require PATH_TO_PRIVATE . "classes/Category.class.php";

require PATH_TO_PRIVATE . "classes/managers/MessageManager.class.php";
require PATH_TO_PRIVATE . "classes/Message.class.php";

require PATH_TO_PRIVATE . "classes/managers/MenuManager.class.php";
require PATH_TO_PRIVATE . "classes/Menu.class.php";

require PATH_TO_PRIVATE . "classes/managers/AddressManager.class.php";
require PATH_TO_PRIVATE . "classes/Address.class.php";

require PATH_TO_PRIVATE . "classes/managers/OrderManager.class.php";
require PATH_TO_PRIVATE . "classes/Order.class.php";

require PATH_TO_PRIVATE . "classes/managers/ProductImageManager.class.php";
require PATH_TO_PRIVATE . "classes/ProductImage.class.php";

require PATH_TO_PRIVATE . "classes/managers/OrderProductManager.class.php";
require PATH_TO_PRIVATE . "classes/OrderProduct.class.php";

require PATH_TO_PRIVATE . "classes/managers/MenuProductManager.class.php";
require PATH_TO_PRIVATE . "classes/MenuProduct.class.php";

$userManager = new UserManager($bdd, "users");
$foodManager = new FoodManager($bdd, "foods");
$productManager = new ProductManager($bdd, "products");

$foodManager = new FoodManager($bdd, "foods");
$productFoodManager = new ProductFoodManager($bdd, "products_foods");
$couponManager = new CouponsManager($bdd, "coupons");
$categoryManager = new CategoryManager($bdd, "categories");
$messageManager = new MessageManager($bdd, "messages");
$menuManager = new MenuManager($bdd, "menus");
$addressManager = new AddressManager($bdd, "address");
$orderManager = new OrderManager($bdd, "orders");
$productImageManager = new ProductImageManager($bdd, "products_images");
$orderProductManager = new OrderProductManager($bdd, "orders_products");
$menuProductManager = new MenuProductManager($bdd, "menus_products");