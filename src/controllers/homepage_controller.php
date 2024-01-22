<?php
$managerCategories = new CategoryManager($bdd, 'categories');
$categories = $managerCategories->getAll();
require '../src/views/homepage.php';