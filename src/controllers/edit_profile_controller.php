<?php
require PATH_VIEWS . 'edit_profile.php';
$user = $userManager->getOne($_SESSION['user_id']);
var_dump($user);