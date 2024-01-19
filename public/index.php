<?php
global $bdd;
require "../src/core/DBconnection.php";

require "../src/classes/Manager.class.php";
require "../src/classes/User.class.php";

$availableRoutes = ['homepage'];
$route = 'homepage';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}

$database = new Manager($bdd);

$user = new User([
    'firstname' => 'Tom',
    'lastname' => 'Cruise',
    'email' => 'tom@mail.com',
    'password' => 'toto',
    'isAdmin' => null,
]);

$database->createUser($user);

require '../src/views/layout.php';