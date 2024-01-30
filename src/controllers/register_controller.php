<?php
require PATH_VIEWS . 'register.php';
require PATH_CLASSES . 'Verify.class.php';

if (isset($_SESSION["user_id"])) {
    header('Location: index.php');
    exit();
}

if (!empty($_POST)) {
    if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token']) {
        if ($userManager->getOneByEmail($_POST['email']) == null && Verify::verifyPassword($_POST['password'], $_POST['password_confirmation']) && Verify::verifyFirstname($_POST['firstname']) && Verify::verifyLastname($_POST['lastname']) && Verify::verifyEmail($_POST['email'])) {
            $user = new User([
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'isAdmin' => false,
            ]);
            $userId = $userManager->createOne($user);
            $userInfos = $userManager->getOneByEmail($_POST['email']);
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Vous avez créé un compte avec succès";
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['name'] = $userInfos[0]['firstname'];
            $_SESSION['user_id'] = $userInfos[0]['id'];
            $_SESSION['is_admin'] = $userInfos[0]['is_admin'];
            $_SESSION['logged'] = true;
            ob_clean();
            header('Location:index.php');
            exit();
        } else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Les données saisies sont invalides ou un compte existe déjà avec cette email";
        }
    }
}
