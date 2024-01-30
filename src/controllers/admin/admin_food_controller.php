<?php

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $foodManager->deleteOne($id);
    header('Location: ?page=admin_food');
}

$allFood = $foodManager->getAll();

require PATH_VIEWS . 'admin/admin_food.php';
