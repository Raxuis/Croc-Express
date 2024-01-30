<?php if (!isset($_POST['getPdf'])) { ?>
    <h3>Toutes mes commandes</h3>
<?php } ?>
<div class="container">
    <?php if (!isset($_GET['order_id'])) { ?>
        <?php foreach ($orders as $order) {
            $coupon = $orderManager->getCouponOfOrder($order["id"]);
            $coupon = $coupon ? $coupon[0] : null;
            ?>
            <div class="card-orders">
                <div class="card-header">
                    <h3>Commande n°
                        <?= $order['id'] ?>
                    </h3>
                    <p>Passée le
                        <?= $order['created_at'] ?>
                    </p>
                    <p>Montant total :
                        <?= $order['price'] ?> €
                    </p>
                    <p>En livraison :
                        <?= $order['is_in_delivery'] ? "Oui" : "Non" ?>
                    </p>
                </div>
                <div class="card-body">
                    <table class='table-cart order-cart'>
                        <thead>
                            <tr>
                                <th>
                                    <form method='post' action='?page=orders&order_id=<?= $order['id'] ?>'>
                                        <button type="submit" id='pdf' name="getPdf" class='submit pay'><i
                                                class="fa-solid fa-file-pdf"></i></button>
                                    </form>
                                </th>
                                <th>Produit</th>
                                <th>Prix Unitaire</th>
                                <th>Calories</th>
                                <th>Quantité</th>
                                <th>Prix Total</th>
                            </tr>
                        </thead>
                        <?php
                        $products = $orderProductManager->getProductsOfOrder($order['id']);
                        $productsIds = [];
                        foreach ($products as $product) {
                            if (!in_array($product['type'] . "-" . $product['id'], $productsIds)) {
                                $productsIds[] = $product['type'] . "-" . $product['id'];
                            } else {
                                continue;
                            } ?>
                            <tr>
                                <td class="td-images">
                                    <?php if ($product['type'] === "product") { ?>
                                        <a href="index.php?page=product&id=<?= $product['id'] ?>">
                                            <img src="<?= PATH_IMAGES . $product['image'] ?>" alt="" class='cart-images'>
                                        </a>
                                    <?php } else { ?>
                                        <p>Menu</p>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?= $product['name'] ?>
                                </td>
                                <td>
                                    <?= $product['price'] . '€' ?>
                                </td>
                                <td>
                                    <?php
                                    $foods = $productFoodManager->getAllFoodDatasOfProduct($product['id']);
                                    foreach ($foods as $food) { ?>
                                        <?php
                                        $calories = Calories::calculateTotalCaloriesPerAliment($food);
                                        $totalCalories += $calories * ($food["weight"] / 100); ?>
                                    <?php } ?>
                                    <?= $totalCalories . ' cal' ?>
                                    <?php
                                    $totalCalories = 0;
                                    ?>
                                </td>
                                <td>
                                    <?= $product['quantity'] ?>
                                </td>
                                <td>
                                    <?= $product['total_price'] . "€" ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <p>Code promotionnel :
                        <?= $coupon ? $coupon["name"] . " (-" . $coupon["reduction"] . "%)" : "Aucun code utilisé" ?>
                    </p>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <?php
        $coupon = $orderManager->getCouponOfOrder($order["id"]);
        $coupon = $coupon ? $coupon[0] : null;
        if (!isset($_POST['getPdf'])) { ?>
            <a href="index.php?page=orders"><i class="fa-solid fa-backward"></i>Retour à mes commandes</a>
        <?php } ?>
        <div class="card-orders" id="order">
            <div class="card-header">
                <h3>Commande n°
                    <?= $order['id'] ?>
                </h3>
                <p>Passée le
                    <?= $order['created_at'] ?>
                </p>
                <p>Montant total :
                    <?= $order['price'] ?> €
                </p>
                <p>En livraison :
                    <?= $order['is_in_delivery'] ? "Oui" : "Non" ?>
                </p>
            </div>
            <div class="card-body">
                <table class='table-cart order-cart'>
                    <thead>
                        <tr>
                            <?php if (!isset($_POST['getPdf'])) { ?>
                                <th></th>
                            <?php } ?>
                            <th>Produit</th>
                            <th>Prix Unitaire</th>
                            <th>Calories</th>
                            <th>Quantité</th>
                            <th>Prix Total</th>
                        </tr>
                    </thead>
                    <?php
                    $products = $orderProductManager->getProductsOfOrder($order['id']);
                    $productsIds = [];
                    foreach ($products as $product) {
                        if (!in_array($product['id'], $productsIds)) {
                            $productsIds[] = $product['id'];
                        } else {
                            continue;
                        }
                        ?>
                        <tr>
                            <?php if (!isset($_POST['getPdf'])) { ?>
                                <td class="td-images">
                                    <img src="<?= PATH_IMAGES . $product['image'] ?>" alt="" class='cart-images'>
                                </td>
                            <?php } ?>
                            <td>
                                <?= $product['name'] ?>
                            </td>
                            <td>
                                <?= $product['price'] . '€' ?>
                            </td>
                            <td>
                                <?php
                                $foods = $productFoodManager->getAllFoodDatasOfProduct($product['id']);
                                foreach ($foods as $food) { ?>
                                    <?php
                                    $calories = Calories::calculateTotalCaloriesPerAliment($food);
                                    $totalCalories += $calories * ($food["weight"] / 100); ?>
                                <?php } ?>
                                <?= $totalCalories . ' cal' ?>
                                <?php
                                $totalCalories = 0;
                                ?>
                            </td>
                            <td>
                                <?= $product['quantity'] ?>
                            </td>
                            <td>
                                <?= $product['total_price'] . "€" ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <p>Code promotionnel :
                    <?= $coupon ? $coupon["name"] . " (-" . $coupon["reduction"] . "%)" : "Aucun code utilisé" ?>
                </p>
            </div>
        </div>
        <?php if (!isset($_POST['getPdf'])) { ?>
            <div>
                <form method='post' action=''>
                    <button type="submit" name="getPdf" id='pdf' class='submit pay'>Télécharger la facture en PDF
                    </button>
                </form>
            </div>
        <?php }
    } ?>
</div>