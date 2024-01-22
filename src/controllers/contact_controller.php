<?php

if(!isset($_SESSION["user_id"])) {
    header('location: index.php');
    exit(0);
}

if (!empty($_POST)) {
    if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['userId']) && isset($_POST['ip'])) {
        $message = new Message($_POST);
        $messageManager->createOne($message);
        echo "Message sent";
    } else {
        echo "Missing parameters";
    }
}

require '../src/views/contact.php';