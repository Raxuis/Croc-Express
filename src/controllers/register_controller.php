<?php
require '../src/views/register.php';
require '../src/classes/Verify.class.php';
if (!empty($_POST)) {
    $verif = new Verify();
    if ($userManager->getOneByEmail($_POST['email']) == null && $verif->verifyPassword($_POST['password']) && $verif->verifyFirstname($_POST['firstname']) && $verif->verifyLastname($_POST['lastname']) && $verif->verifyEmail($_POST['email'])) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Vous êtes maintenant connecté";
        $user = new User([
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'isAdmin' => false,
        ]);

        $userId = $userManager->createOne($user);
    }
}
