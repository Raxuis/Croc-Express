<?php

if (!isset($_SESSION["is_admin"])) {
    header('location: index.php');
    exit(0);
}

$categoriesManager = new CategoryManager($bdd, "categories");
$categories = $categoriesManager->getAll();
$productImageManager = new ProductImageManager($bdd, "images");

$allFood = $foodManager->getAll();

if (!empty($_POST)) {
    if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['buyingPrice']) && !empty($_POST['categoryId'])) {
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
                    $productPicture = basename($_FILES['image']['name'][$key]);

                    $image = new ProductImage([
                        'productId' => $productId,
                        'image' => $productPicture
                    ]);
                    $productImageManager->createOne($image);
                    echo "Image ajoutée avec succès";
                }
            }
        }
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Product created with id: " . $productId;
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Veuillez remplir tous les champs";
    }
}

require PATH_VIEWS . 'admin_add_product.php';