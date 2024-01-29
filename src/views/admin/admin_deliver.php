<h3>Mes commandes à livrer</h3>
<div class="container">
    <table>
        <thead>
            <tr>
                <th>Référence</th>
                <th>Commandée le</th>
                <th>Livrable</th>
                <th>Livrée le</th>
                <th>Tax</th>
                <th>Prix</th>
                <!-- <th>Consulter</th>
            <th>PDF</th> -->
            </tr>
        </thead>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td>
                    <?= $order['id'] ?>
                </td>
                <td>
                    <?= $order['created_at'] ?>
                </td>
                <td>
                    <?= $order['address_id'] && $order['is_in_delivery'] ? 'Oui' : 'Non' ?>
                </td>
                <td>
                    <?php if ($order['address_id'] && $order['is_in_delivery']) { ?>
                        <form method="post" action=''>
                            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                            <button type="submit" name="mark-delivered" class="submit pay">
                                Marquer Livrée
                            </button>
                        </form>
                    <?php } else if ($order['address_id'] && !$order['is_in_delivery']) { ?>
                        <?= $order['validated_at'] ?>
                    <?php } else { ?>
                            Commande non faite pour être livrée
                    <?php } ?>
                </td>
                <td>
                    1€
                </td>
                <td>
                    <?= $order['price'] . '€' ?>
                </td>
                <!-- <td>
                <a href="order.php?id=<?= $order['id'] ?>" class="btn btn-primary">Consulter la commande</a>
            </td>
            <td>
                <form method="post" action=''>
                    <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                    <input type="submit" value="PDF" class="submit pay">
                </form>
            </td> -->
            </tr>
        <?php endforeach; ?>
    </table>
</div>