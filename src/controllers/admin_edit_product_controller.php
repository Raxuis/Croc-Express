<?php

global $productManager, $productFoodManager, $foodManager, $bdd;
if (!isset($_SESSION["is_admin"])) {
    header('location: index.php');
    exit(0);
}

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
            echo "Veuillez sélectionner une catégorie";
            exit;
        }

        $_POST['isHidden'] = isset($_POST['isHidden']) ? 1 : 0;

        $dbProduct = $productManager->getOne($_POST["id"]);
        $productObject = new Product($_POST);
        $productManager->editOne($productObject);

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



//        foreach ($_FILES["image"]["name"] as $key => $value) {
//            if ($_FILES['image']['error'][$key] === 0) {
//                $targetDir = '../public/assets/product_images/';
//                $targetFile = $targetDir . basename($_FILES['image']['name'][$key]);
//
//                if (move_uploaded_file($_FILES['image']['tmp_name'][$key], $targetFile)) {
//                    $productPicture = $targetFile;
//
//                    $image = new ProductImage([
//                        'productId' => $productId,
//                        'image' => $productPicture
//                    ]);
//                    $productImageManager->createOne($image);
//                    echo "Image ajoutée avec succès";
//                }
//            }
//        }

            header('location: index.php?page=admin_products');
            exit;
    }
}

require '../src/views/admin_edit_product.php';