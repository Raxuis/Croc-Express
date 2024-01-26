<?php

if (isset($_POST['delete'])) {
    $categoryManager->deleteOne($_POST['id']);
}
if (isset($_POST['show_hide'])) {
    $categoryManager->toggleHide($_POST['id']);
}

$allCategories = $categoryManager->getAll();

require PATH_VIEWS . 'admin_categories.php';