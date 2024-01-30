<?php

if (!empty($_POST)) {
    if (!empty($_POST['token']) && $_POST['token'] != $_SESSION['token']) {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Erreur de vérification du formulaire";
        header('Location: ?page=homepage');
        exit;
    }
    if (!empty($_POST['name']) && !empty($_POST['reduction'])) {
        $coupon = new Coupon($_POST);
        $couponId = $couponManager->createOne($coupon);
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Coupon créé avec l'id: " . $couponId;
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Veuillez remplir tous les champs";
    }
//    ob_clean();
    header("location: index.php?page=admin_coupons");
    exit;
}

require PATH_VIEWS . 'admin/admin_add_coupon.php';