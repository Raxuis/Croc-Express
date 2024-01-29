<?php
require PATH_CLASSES . 'Verify.class.php';
$userInfos = $userManager->getOne($_SESSION['user_id']);

if (empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if (!empty($_POST)) {
    if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token']) {
        if (Verify::verifyFirstname($_POST['firstname']) && Verify::verifyLastname($_POST['lastname']) && Verify::verifyEmail($_POST['email'])) {

            $userPassword = $userInfos["password"];
            if (isset($_POST["password"]) && isset($_POST['password_confirmation']) && isset($_POST['password_old'])) {

                if (Verify::verifyPassword($_POST['password'], $_POST['password_confirmation'])) {
                    if (password_verify($_POST["password_old"], $userInfos["password"])) {
                        if ($_POST['password'] !== $_POST['password_old']) {
                            echo "Password modif";
                            $userPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        } else {
                            $_SESSION['status'] = "error";
                            $_SESSION['message'] = "Votre nouveau mot de passe doit être différent de votre dernier mot de passe";
                        }
                    } else {
                        $_SESSION['status'] = "error";
                        $_SESSION['message'] = "Votre ancien mot de passe est incorrect";
                    }
                } else {
                    $_SESSION['status'] = "error";
                    $_SESSION['message'] = "Le nouveau mot de passe est incorrect";
                }
            }

            $user = new User([
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'password' => $userPassword,
                'id' => $_POST['id'],
            ]);
            $userManager->editOne($user);

            if (empty($_SESSION['status'])) {
                $_SESSION['status'] = "success";
                $_SESSION['message'] = "Vous avez modifié votre compte avec succès";
            }
        } else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Veuillez remplir tous les champs";
        }
    }
}

require PATH_VIEWS . 'edit_profile.php';