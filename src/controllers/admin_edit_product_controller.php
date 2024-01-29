<?php

global $productManager, $productFoodManager, $foodManager, $bdd;
$product = $productManager->getOne($_POST['id']);
$allFoodInProduct = $productFoodManager->getAllFoodOfProduct($_POST['id']);
$allImages = $productImageManager->getAllImagesOfProduct($_POST['id']);

$categoriesManager = new CategoryManager($bdd, "categories");
$categories = $categoriesManager->getAll();
$productImageManager = new ProductImageManager($bdd, "images");

$allFood = $foodManager->getAll();

if (!empty($_POST)) {
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['buyingPrice']) && isset($_POST['categoryId'])) {
        if ($_POST["categoryId"] === "") {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Veuillez sélectionner une catégorie";
            header("Location: ?page=admin_products");
            exit;
        }

        $_POST['isHidden'] = isset($_POST['isHidden']) ? 1 : 0;

        $dbProduct = $productManager->getOne($_POST["id"]);
        $productObject = new Product($_POST);
        $productManager->editOne($productObject);

        if(count($_POST["foodList"]) < 3) {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Le produit doit avoir au moins 3 ingrédients";
            header("Location: ?page=admin_products");
            exit;
        }

        if (count($allFoodInProduct) === 0) {
            foreach ($_POST["foodList"] as $item) {
                $food = new ProductFood([
                    'productId' => $_POST["id"],
                    'foodId' => $item
                ]);
                $productFoodManager->createOne($food);
            }
        }

        foreach ($_POST["foodList"] as $item) {
            echo $item . "<br>";
            if (!in_array($item, $allFoodInProduct)) {
                $food = new ProductFood([
                    'productId' => $_POST["id"],
                    'foodId' => $item
                ]);
                $productFoodManager->createOne($food);
            }
        }

        foreach ($allFoodInProduct as $foodInProd) {
            if (!in_array($foodInProd, $_POST["foodList"])) {
                $productFoodManager->deleteOne($foodInProd["id"]);
            }
        }

        ob_clean();
        header('location: index.php?page=admin_products');
        exit(0);
    }
}

require '../src/views/admin_edit_product.php';
