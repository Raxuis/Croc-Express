<?php
$menusManager = new MenuManager($bdd, "menus");
$menus = $menusManager->getAll();
require PATH_VIEWS . 'admin_menus.php';