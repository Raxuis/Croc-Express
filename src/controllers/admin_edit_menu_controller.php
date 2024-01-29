<?php
global $productManager, $productFoodManager, $foodManager, $bdd;
$menuManager = new MenuManager($bdd, 'menus');
$menu = $menuManager->getOne($_POST['id']);
$allProducts = $productManager->getAll();
$products = $menuManager->getAllProductsFromMenu($menu['id']);
$categoriesManager = new CategoryManager($bdd, "categories");
$categories = $categoriesManager->getAll();
$menuProductManager = new MenuProductManager($bdd, "menus_products");

function findObjectById($id, $arrayList): bool
{
    foreach ($arrayList as $element ) {
        if ($id == $element["id"]) {
            return true;
        }
    }
    return false;
}

if (!empty($_POST)) {
    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['productList'])) {
        if ($_POST["productList"] === "") {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = "Veuillez sélectionner une catégorie";

            header('Location:?page=admin_menus');
            exit();
        }

        $_POST['isHidden'] = isset($_POST['isHidden']) ? 1 : 0;

        $dbMenu = $menuManager->getOne($_POST["id"]);
        $menuObject = new Menu($_POST);
        $menuManager->editOne($menuObject);

        if (count($products) === 0) {
            foreach ($_POST["productList"] as $item) {
                $product = new MenuProduct([
                    'menuId' => $_POST["id"],
                    'productId' => $item
                ]);
                $menuProductManager->createOne($product);
            }
        }

        foreach ($_POST["productList"] as $value) {
            if (!findObjectById($value, $products)) {
                $product = new MenuProduct([
                    'menuId' => $_POST["id"],
                    'productId' => $value
                ]);
                $menuProductManager->createOne($product);
            }
        }

        // Delete unused products
        foreach ($products as $product) {
            var_dump($product);
            if (!in_array($product["id"], $_POST["productList"])) {
                $menuProductManager->deleteOneByProductId($product["id"], $_POST["id"]);
            }
        }

        header('location: index.php?page=admin_menus');
        exit(0);
    }
}

require '../src/views/admin_edit_menu.php';
