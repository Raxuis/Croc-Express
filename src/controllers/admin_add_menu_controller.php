<?php

if (!isset($_SESSION["is_admin"])) {
    header('location: index.php');
    exit(0);
}

$allProducts = $productManager->getAll();

if (!empty($_POST)) {
    if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['productList'])) {
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

require PATH_VIEWS . 'admin_add_menu.php';