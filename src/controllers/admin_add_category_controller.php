<?php

if (isset($_POST['name'])) {
    $_POST['isHidden'] = isset($_POST['isHidden']) ? 1 : 0;
    $category = new Category($_POST);
    $categoryManager->createOne($category);

    $_SESSION['status'] = "success";
    $_SESSION['message'] = "La catégorie a bien été ajoutée";
    ob_clean();
    header('Location: ?page=admin_categories');
    exit;
}

require PATH_VIEWS . 'admin_add_category.php';
