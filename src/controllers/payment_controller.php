<?php

$cart = $_SESSION['cart'];
$totalPrice = 0;
foreach ($cart as $key => $value) {
    $totalPrice += $value["totalPrice"];
}

$inDelivery = $_SESSION['inDelivery'] ?? false;
$addressId = null;

if ($_SESSION['inDelivery'] === true) {
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

$coupon = null;
if (!empty($_POST['coupon'])) {
    $coupon = $couponManager->getOneByName($_POST['coupon']);

    if ($coupon) {
        $totalPrice -= $totalPrice * ($coupon['reduction'] / 100);
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

header("location: index.php?page=homepage");
exit;
