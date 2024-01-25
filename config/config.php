<?php
define('SERVER', 'localhost');
define('DATABASE', 'croc_express');
define('PORT', 3306);
define('USER', 'root');
switch (PHP_OS) {
    case 'WINNT':
        define('PASSWORD', '');
        break;
    case 'Darwin':
        define('PASSWORD', 'root');
        break;
    case 'Linux':
        define('PASSWORD', '');
        break;
    default:
        define('PASSWORD', '');
        break;
}
;
define('DNS', 'http://localhost:8888/');
define('PATH', 'Croc-Express/public/');
define('BASE_PATH', DNS . PATH);
define('PATH_IMAGES', BASE_PATH . 'assets/product_images/');
define('PATH_PRIVATE', DNS . 'Croc-Express/src/');
define('PATH_TO_PRIVATE', '../src/');
define('PATH_SCRIPTS', PATH_PRIVATE . 'scripts/');
define('PATH_VIEWS', PATH_TO_PRIVATE . 'views/');
define('PATH_CLASSES', PATH_TO_PRIVATE . 'classes/');
define('PATH_CLASSES_MANAGERS', PATH_TO_PRIVATE . 'classes/managers/');
define('ENVIRONMENT', 'development');