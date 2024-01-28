<?php
$managerCategories = new CategoryManager($bdd, 'categories');
$categories = $managerCategories->getAll();
$menus = $menuManager->getAll();
require PATH_VIEWS . 'homepage.php';