<?php if (!isset($_POST['getPdf'])) { ?>
    <h3>Mes commandes</h3>
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
                    <h3>Produits</h3>
                    <table class='table-cart'>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Produit</th>
                                <th>Prix Unitaire</th>
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
                                <td class="td-images">
                                    <img src="<?= PATH_IMAGES . $product['image'] ?>" alt="" class='cart-images'>
                                </td>
                                <td>
                                    <?= $product['name'] ?>
                                </td>
                                <td>
                                    <?= $product['price'] . '€' ?>
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
                    <a href="index.php?page=orders&order_id=<?= $order['id'] ?>">Plus d'informations<i
                            class="fa-solid fa-circle-info"></i></a>
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
                <h3>Produits : </h3>
                <table class='table-cart'>
                    <thead>
                        <tr>
                            <?php if (!isset($_POST['getPdf'])) { ?>
                                <th></th>
                            <?php } ?>
                            <th>Produit</th>
                            <th>Prix Unitaire</th>
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
                    <button type="submit pay" name="getPdf" class="submit" id='pdf'>Télécharger la facture en PDF</button>
                </form>
            </div>
        <?php }
    } ?>
</div>