<?php

session_start();

$itemTotal = 0;
if (!empty($_GET["action"])) {
    if (empty($_SESSION["cart"])) {
        $_SESSION["cart"] = [
            $_GET["id"] => 1
        ];
    } else {
        $id = $_GET["id"];
        if (array_key_exists($_GET["id"], $_SESSION["cart"])) {
            if ($_GET["action"] === "remove") {
                if ($_SESSION["cart"][$id] > 1)
                    $_SESSION["cart"][$id] = $_SESSION["cart"][$id] - 1;
                else
                    unset($_SESSION["cart"][$id]);
            } else if ($_GET["action"] === "add") {
                $_SESSION["cart"][$id] = $_SESSION["cart"][$id] + 1;
            }
        } else {
            $_SESSION["cart"][$id] = 1;
        }
    }

}
$total = 0;
foreach ($_SESSION["cart"] as $key => $value) {
    $total += $value;
    if ($key == $_GET["id"]) {
        $itemTotal = $value;
    }
}

echo '{ "total": "' . $total . '", "cart": ' . json_encode($_SESSION["cart"]) . ', "itemTotal": "' . $itemTotal . '" }';