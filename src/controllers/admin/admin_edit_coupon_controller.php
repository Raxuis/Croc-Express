<?php

if (!empty($_POST)) {

    if (isset($_POST['name']) && isset($_POST['reduction'])) {
        $couponObject = new Coupon($_POST);
        $couponManager->editOne($couponObject);
        header("Location: ?page=admin_coupons");
        exit();
    }
}

$coupon = $couponManager->getOne($_POST["id"]);

require PATH_VIEWS . 'admin/admin_edit_coupon.php';