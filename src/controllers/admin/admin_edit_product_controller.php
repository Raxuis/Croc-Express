<?php

global $productManager, $productFoodManager, $foodManager, $bdd;
$product = $productManager->getOne($_POST['id']);

$allFoodInProduct = $productFoodManager->getAllFoodOfProduct($_POST['id']);
$allImages = $productImageManager->getAllImagesOfProduct($_POST['id']);

$categories = $categoryManager->getAll();
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

        foreach ($_FILES["image"]["name"] as $key => $value) {
            if ($_FILES['image']['error'][$key] === 0) {
                $targetDir = '../public/assets/product_images/';
                $targetFile = $targetDir . basename($_FILES['image']['name'][$key]);

                if (move_uploaded_file($_FILES['image']['tmp_name'][$key], $targetFile)) {
                    $productPicture = basename($_FILES['image']['name'][$key]);

                    $image = new ProductImage([
                        'productId' => $_POST["id"],
                        'image' => $productPicture
                    ]);
                    $productImageManager->createOne($image);
                    $_SESSION['status'] = 'success';
                    $_SESSION['message'] = 'Image ajoutée avec succès';
                }
            }
        }

        if (isset($_POST["imageToDelete"])) {

            foreach ($_POST["imageToDelete"] as $image) {
                echo $image . "<br>";
                $productImageManager->deleteOne($image);
            }
        }

        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Modifications enregistrées avec succès";

        //        ob_clean();
        header('location: index.php?page=admin_products');
        exit(0);
    }
}

require PATH_VIEWS . 'admin/admin_edit_product.php';
