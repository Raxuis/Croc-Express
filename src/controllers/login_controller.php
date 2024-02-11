<?php

if (isset($_SESSION["user_id"])) {
    header('Location: index.php');
    exit();
}


if (!empty($_POST)) {
    if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token']) {
        if (!empty($_POST['email'] && !empty($_POST['password']))) {
            $userInfos = $userManager->getOneByEmail($_POST['email']);
            if ($userInfos) {
                if (password_verify($_POST['password'], $userInfos[0]['password'])) {
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['name'] = $userInfos[0]['firstname'];
                    $_SESSION['user_id'] = $userInfos[0]['id'];
                    $_SESSION['is_admin'] = $userInfos[0]['is_admin'];
                    $_SESSION['logged'] = true;
                    $_SESSION['status'] = "success";
                    $_SESSION['message'] = "Vous êtes connecté avec succès";
                    ob_clean();
                    header('Location:index.php');
                    exit();
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
}
require PATH_VIEWS . 'login.php';
