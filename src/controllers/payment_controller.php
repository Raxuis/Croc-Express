<?php

if (!isset($_SESSION["user_id"])) {
    header('location: index.php');
    exit(0);
}

if (!empty($_POST) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['address'] && !empty($_POST['city']) && !empty($_POST['zip']) && !empty($_POST['country']))) {
    if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token']) {
        $cart = $_SESSION['cart'];
        $totalPrice = 0;
        foreach ($cart as $key => $value) {
            $totalPrice += $value["totalPrice"];
        }

        $inDelivery = $_SESSION['inDelivery'] ?? false;
        $addressId = null;

        if (isset($_SESSION['inDelivery']) && $_SESSION['inDelivery'] === true) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $street = $_POST['address'];
            $city = $_POST['city'];
            $zipCode = $_POST['zip'];
            $country = $_POST['country'][0];

            $address = new Address([
                'userId' => $_SESSION['user_id'],
                'street' => $street,
                'city' => $city,
                'zip' => $zipCode,
                'country' => $country
            ]);
            $addressId = $addressManager->createOne($address);
        }

        var_dump($_POST['coupon']);

        $coupon = null;
        if (!empty($_POST['coupon'])) {
            $coupon = $couponManager->getOneByName($_POST['coupon']);

            if ($coupon) {
                $totalPrice -= $totalPrice * ($coupon['reduction'] / 100);
            } else {
                $_SESSION['status'] = "error";
                $_SESSION['message'] = "Le coupon n'existe pas";
                ob_clean();
                header("location: index.php?page=cart");
                exit;
            }
        }

        $order = new Order([
            'userId' => $_SESSION['user_id'],
            'price' => $totalPrice,
            'couponId' => $coupon ? $coupon['id'] : null,
            'addressId' => $addressId,
            'isInDelivery' => $inDelivery,
            'isValidated' => true
        ]);
        $orderId = $orderManager->createOne($order);

        foreach ($cart as $key => $value) {
            $orderProduct = new OrderProduct([
                'orderId' => $orderId,
                'productId' => $key,
                'price' => $value['totalPrice'],
                'quantity' => $value['quantity']
            ]);
            $orderProductManager->createOne($orderProduct);
        }

        $_SESSION['cart'] = [];
        $_SESSION['inDelivery'] = false;

        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Commande validée ! Vous avez payé " . $totalPrice . "€";
        ob_clean();
        header("location: index.php?page=homepage");
        exit;
    }
} else {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "Veuillez remplir tous les champs";
    ob_clean();
    header("location: index.php?page=cart");
    exit;
}
