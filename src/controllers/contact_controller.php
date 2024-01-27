<?php

if (!isset($_SESSION["user_id"])) {
    ob_clean();
    header('location: index.php');
    exit(0);
}
$maxTitleLength = 50;

if (!empty($_POST)) {
    if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['userId']) && !empty($_POST['ip'])) {
        if (strlen($_POST['title']) > $maxTitleLength) {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Votre titre est trop long";
        } else {
            $message = new Message($_POST);
            $messageManager->createOne($message);
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Vous avez bien envoyé votre message";
        }
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Vous devez remplir tous les champs";
        ob_clean();
        header('location: index.php');
        exit(0);
    }
}

require PATH_VIEWS . 'contact.php';