<?php

if (!empty($_POST)) {
    if (isset($_POST['name']) && isset($_POST['description'])) {
        $_POST['isHidden'] = isset($_POST['isHidden']) ? 1 : 0;

        $dbCategory = $categoryManager->getOne($_POST['id']);
        $categoryObject = new Category($_POST);
        $categoryManager->editOne($categoryObject);

        ob_clean();
        header('location: index.php?page=admin_categories');
        exit(0);
    }
}

$category = $categoryManager->getOne($_POST['id']);

require PATH_VIEWS . 'admin/admin_edit_category.php';