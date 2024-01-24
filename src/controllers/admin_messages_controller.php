<?php

if (!isset($_SESSION["is_admin"])) {
    header("location: index.php");
    exit(0);
}

$allMessages = $messageManager->getAll();

require PATH_VIEWS . 'admin_message.php';
