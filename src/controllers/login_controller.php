<?php
if (!empty($_POST)) {
    if (!empty($_POST['email'] && !empty($_POST['password']))) {
        $userInfos = $userManager->getOneByEmail($_POST['email']);
        if (password_verify($_POST['password'], $userInfos['password'])) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['name'] = $userInfos['firstname'];
            $_SESSION['user_id'] = $userInfos['id'];
            $_SESSION['is_admin'] = $userInfos['is_admin'];
            $_SESSION['logged'] = true;
            echo "ok";
            header('Location:../public/index.php');
        } else {
            echo "password incorrect";
        }
    } else {
        echo "email or password empty";
    }
}
require '../src/views/login.php';