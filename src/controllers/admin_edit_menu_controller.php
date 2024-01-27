<?php

global $productManager, $productFoodManager, $foodManager, $bdd;
$menuManager = new MenuManager($bdd, 'menus');
$menu = $menuManager->getOne($_POST['id']);
$products = $productManager->getAll();
$allFoodInProduct = $productFoodManager->getAllFoodOfProduct($_POST['id']);

$categoriesManager = new CategoryManager($bdd, "categories");
$categories = $categoriesManager->getAll();

$menuProductManager = new MenuProductManager($bdd, "menus_products");

if (!empty($_POST)) {
    echo 'belek';
    print_r($_POST);
    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['productList'])) {
        echo 'tg';
        if ($_POST["productList"] === "") {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = "Veuillez sélectionner une catégorie";
        }

        $_POST['isHidden'] = isset($_POST['isHidden']) ? 1 : 0;

        if (count($allFoodInProduct) === 0) {
            foreach ($_POST["productList"] as $item) {
                $menu = new Menu([
                    'productId' => $_POST["id"],
                    'foodId' => $item
                ]);
                $menuProductManager->createOne($menu);
            }
        }

        foreach ($_POST["productList"] as $item) {
            echo $item . "<br>";
            if (!in_array($item, $allFoodInProduct)) {
                $menu = new Menu([
                    'productId' => $_POST["id"],
                    'foodId' => $item
                ]);
                $menuProductManager->createOne($menu);
            }
        }

        /*  foreach ($allFoodInProduct as $foodInProd) {
             if (!in_array($foodInProd, $_POST["productList"])) {
                 $productFoodManager->deleteOne($foodInProd["id"]);
             }
         } */
        ob_clean();
        header('location: index.php?page=admin_menus');
        exit(0);
    }
}

require '../src/views/admin_edit_menu.php';