<?php
require '../src/views/register.php';
require '../src/classes/Verify.class.php';
if (!empty($_POST)) {
    $verif = new Verify();
    if ($verif->verifyPassword($_POST['password']) && $verif->verifyFirstname($_POST['firstname']) && $verif->verifyLastname($_POST['lastname']) && $verif->verifyEmail($_POST['email'])) {
        // TODO : Move this in index.php
        $database = new UserManager($bdd, "users");

        $user = new User([
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'isAdmin' => null,
        ]);

        $database->createOne($user);
        $_SESSION['logged'] = true;
    }
}