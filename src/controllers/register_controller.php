<?php
require '../src/views/register.php';
require '../src/classes/Verify.class.php';
if (!empty($_POST)) {
    $verif = new VerifyClass($_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
    if ($verif->setPassword($_POST['password']) && $verif->setFirstname($_POST['firstname']) && $verif->setLastname($_POST['lastname']) && $verif->setEmail($_POST['email'])) {
        $database = new Manager($bdd);

        $user = new User([
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'isAdmin' => null,
        ]);

        $database->createUser($user);
        $_SESSION['logged'] = true;
    }
}
/*
Condition for Benoît :
    strcmp($_POST['password'], $_POST['password_confirmation']) !== 0 
*/