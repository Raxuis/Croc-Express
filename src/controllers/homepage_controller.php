<?php
$managerCategories = new CategoryManager($bdd, 'categories');
$categories = $managerCategories->getAll();
require PATH_VIEWS . 'homepage.php';