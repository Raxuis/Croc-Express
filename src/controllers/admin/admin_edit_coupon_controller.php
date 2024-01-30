<?php

if (!empty($_POST)) {
    if (!isset($_POST['token']) || $_POST['token'] != $_SESSION['token']) {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Erreur de vérification du formulaire";
        header('Location: ?page=homepage');
        exit;
    }

    if (isset($_POST['name']) && isset($_POST['reduction'])) {
        $couponObject = new Coupon($_POST);
        $couponManager->editOne($couponObject);
        header("Location: ?page=admin_coupons");
        exit();
    }
}

$coupon = $couponManager->getOne($_POST["id"]);

require PATH_VIEWS . 'admin/admin_edit_coupon.php';