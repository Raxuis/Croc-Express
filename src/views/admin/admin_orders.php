<h3>Toutes mes commandes</h3>
<div class="container">
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
                                <?php if ($product['type'] == 'product') { ?>
                                    <img src="<?= PATH_IMAGES . $product['image'] ?>" alt="" class='cart-images'>
                                <?php } else { ?>
                                    <span>Menu</span>
                                <?php } ?>
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
</div>