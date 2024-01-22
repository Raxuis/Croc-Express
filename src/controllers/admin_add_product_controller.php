<?php

$categoriesManager = new CategoryManager($bdd, "categories");
$categories = $categoriesManager->getAll();

if (!empty($_POST)) {
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['buyingPrice']) && isset($_POST['categoryId'])) {
        $_POST['isHidden'] = isset($_POST['isHidden']) ? 1 : 0;
        $product = new Product($_POST);
        $productId = $productManager->createOne($product);
        echo "Product created with id: " . $productId . "<br>";
    }
}

require '../src/views/admin_add_product.php';