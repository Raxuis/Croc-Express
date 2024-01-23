<?php
if (!empty($_POST)) {
    if (!empty($_POST['email'] && !empty($_POST['password']))) {
        $userInfos = $userManager->getOneByEmail($_POST['email']);
        if ($userInfos) {
            if (password_verify($_POST['password'], $userInfos[0]['password'])) {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['name'] = $userInfos[0]['firstname'];
                $_SESSION['user_id'] = $userInfos[0]['id'];
                $_SESSION['is_admin'] = $userInfos[0]['is_admin'];
                $_SESSION['logged'] = true;
                header('Location:../public/index.php');
                $_SESSION['status'] = "success";
                $_SESSION['message'] = "Vous êtes connecté avec succès";
            } else {
                $_SESSION['status'] = "error";
                $_SESSION['message'] = "L'adresse e-mail et le mot de passe ne correspondent pas";
            }
        } else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Identifiants invalides";
        }
    }
}
require PATH_VIEWS . 'login.php';