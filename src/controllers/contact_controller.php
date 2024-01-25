<?php

if (!isset($_SESSION["user_id"])) {
    header('location: index.php');
    exit(0);
}

if (!empty($_POST)) {
    if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['userId']) && isset($_POST['ip'])) {
        $message = new Message($_POST);
        $messageManager->createOne($message);
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Vous avez créé un compte avec succès";
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Vous devez remplir tous les champs";
    }
}

require PATH_VIEWS . 'contact.php';