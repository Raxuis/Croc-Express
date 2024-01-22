<?php

if(!isset($_SESSION["is_admin"])) {
    header('location: index.php');
    exit(0);
}

$categoriesManager = new CategoryManager($bdd, "categories");
$categories = $categoriesManager->getAll();

$allFood = $foodManager->getAll();

if (!empty($_POST)) {
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['buyingPrice']) && isset($_POST['categoryId'])) {
        if ($_POST["categoryId"] === "") {
            echo "Veuillez séléctionner une catégorie";
            exit;
        }

        $_POST['isHidden'] = isset($_POST['isHidden']) ? 1 : 0;
        $product = new Product($_POST);
        $productId = $productManager->createOne($product);

        foreach ($_POST["foodList"] as $item) {
            $food = new ProductFood([
                'productId' => $productId,
                'foodId' => $item
            ]);
            $productFoodManager->createOne($food);
        }

        echo "Product created with id: " . $productId . "<br>";
    }
}

require '../src/views/admin_add_product.php';