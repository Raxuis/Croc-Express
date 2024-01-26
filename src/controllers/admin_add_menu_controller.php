<?php
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
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Menu created with id: " . $menuId;
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = "Veuillez remplir tous les champs";
    }
}

require PATH_VIEWS . 'admin_add_menu.php';