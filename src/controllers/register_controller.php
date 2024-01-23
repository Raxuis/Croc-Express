<?php
require PATH_VIEWS . 'register.php';
require PATH_CLASSES . 'Verify.class.php';
if (!empty($_POST)) {
    if ($userManager->getOneByEmail($_POST['email']) == null && Verify::verifyPassword($_POST['password']) && Verify::verifyFirstname($_POST['firstname']) && Verify::verifyLastname($_POST['lastname']) && Verify::verifyEmail($_POST['email'])) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Vous avez créé un compte avec succès";
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
