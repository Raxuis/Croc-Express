<?php
if (!empty($_POST)) {

    if (!isset($_POST['token']) || $_POST['token'] != $_SESSION['token']) {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Erreur de vérification du formulaire";
        header('Location: ?page=homepage');
        exit;
    }

    if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_FILES['image'])) {
        $_POST['isHidden'] = isset($_POST['isHidden']) ? 1 : 0;
        $_FILES["image"]["name"];
        if ($_FILES['image']['error'] === 0) {
            $targetDir = '../public/assets/product_images/';
            $targetFile = $targetDir . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            } else {
                $_SESSION['status'] = "error";
                $_SESSION['message'] = "Failed to move uploaded file to the target directory.";
                header('Location: ?page=admin_categories');
                exit;
            }
        }
        $category = new Category(
            [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'image' => $_FILES['image']["full_path"],
                'isHidden' => $_POST['isHidden'],
            ]
        );
        $categoryManager->createOne($category);
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "La catégorie a bien été ajoutée";
        //    ob_clean();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Veuillez remplir tous les champs";
        //    ob_clean();
        header('Location: ?page=admin_categories');
        exit;

    }
}

require PATH_VIEWS . 'admin/admin_add_category.php';
