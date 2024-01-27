<?php
global $productManager, $productFoodManager, $foodManager, $bdd;
$menuManager = new MenuManager($bdd, 'menus');
$menu = $menuManager->getOne($_POST['id']);
$products = $menuManager->getAllProductsFromMenu($menu['id']);
$categoriesManager = new CategoryManager($bdd, "categories");
$categories = $categoriesManager->getAll();
$menuProductManager = new MenuProductManager($bdd, "menus_products");

if (!empty($_POST)) {
    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['productList'])) {
        if ($_POST["productList"] === "") {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = "Veuillez sélectionner une catégorie";
            ob_clean();
            header('Location:?page=admin_menus');
            exit();
        }

        $_POST['isHidden'] = isset($_POST['isHidden']) ? 1 : 0;
        if (empty($products)) {
            foreach ($_POST["productList"] as $item) {
                $product = new MenuProduct([
                    'menuId' => $_POST["id"],
                    'productId' => $item
                ]);
                $menuProductManager->createOne($product);
            }
        }

        foreach ($_POST["productList"] as $item) {
            if (!in_array($item, $products)) {
                $product = new MenuProduct([
                    'menuId' => $_POST["id"],
                    'productId' => $item
                ]);
                $menuProductManager->createOne($product);
            }
        }

        // Delete unused products
        foreach ($products as $product) {
            if (!in_array($product["productId"], $_POST["productList"])) {
                $menuProductManager->deleteOne($product["id"]);
            }
        }

        ob_clean();
        header('location: index.php?page=admin_menus');
        exit(0);
    }
}

require '../src/views/admin_edit_menu.php';
