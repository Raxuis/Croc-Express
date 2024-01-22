<?php

if(!isset($_SESSION["is_admin"])) {
    header('location: index.php');
    exit(0);
}

$allProducts = $productManager->getAll();

if (!empty($_POST)) {
    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['productList'])) {
        $_POST['isHidden'] = isset($_POST['isHidden']) ? 1 : 0;
        $menu = new Menu($_POST);
        $menuId = $menuManager->createOne($menu);

        foreach ($_POST["productList"] as $item) {
            $menuProduct = new MenuProduct([
                'menuId' => $menuId,
                'productId' => $item
            ]);
            $menuProductManager->createOne($menuProduct);
        }

        echo "Product created with id: " . $menuId . "<br>";
    } else {
        echo "Missing parameters";
    }
}

require '../src/views/admin_add_menu.php';