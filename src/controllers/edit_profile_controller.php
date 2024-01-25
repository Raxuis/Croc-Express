<?php
require PATH_CLASSES . 'Verify.class.php';
$userInfos = $userManager->getOne($_SESSION['user_id']);

if (!empty($_POST)) {
    if (Verify::verifyPassword($_POST['password']) && Verify::verifyFirstname($_POST['firstname']) && Verify::verifyLastname($_POST['lastname']) && Verify::verifyEmail($_POST['email'])) {
        $user = new User([
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'id' => $_POST['id'],
        ]);
        ;
        $userManager->editOne($user);
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Vous avez modifié votre compte avec succès";
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Veuillez remplir tous les champs";
    }
}

require PATH_VIEWS . 'edit_profile.php';