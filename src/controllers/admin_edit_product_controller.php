<?php

if (!isset($_SESSION["is_admin"])) {
    header('location: index.php');
    exit(0);
}

print_r($_POST);

$product = $productManager->getOne($_POST['id']);

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
        $product = new Product($_POST);
        $productId = $productManager->createOne($product);

        foreach ($_POST["foodList"] as $item) {
            $food = new ProductFood([
                'productId' => $productId,
                'foodId' => $item
            ]);
            $productFoodManager->createOne($food);
        }
        foreach ($_FILES["image"]["name"] as $key => $value) {
            if ($_FILES['image']['error'][$key] === 0) {
                $targetDir = '../public/assets/product_images/';
                $targetFile = $targetDir . basename($_FILES['image']['name'][$key]);

                if (move_uploaded_file($_FILES['image']['tmp_name'][$key], $targetFile)) {
                    $productPicture = $targetFile;

                    $image = new ProductImage([
                        'productId' => $productId,
                        'image' => $productPicture
                    ]);
                    $productImageManager->createOne($image);
                    echo "Image ajoutée avec succès";
                }
            }
        }
        echo "Product created with id: " . $productId . "<br>";
    }
}

require PATH_VIEWS . 'admin_edit_product.php';