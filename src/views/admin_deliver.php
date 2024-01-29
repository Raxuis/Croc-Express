<h3>Mes commandes à livrer</h3>
<div class="container">
    <table>
        <thead>
            <tr>
                <th>Référence</th>
                <th>Commandé le</th>
                <th>Livrable</th>
                <th>Livré le</th>
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
                    <?= $order['is_in_delivery'] ? 'Oui' : 'Non' ?>
                </td>
                <td>
                    <?php if ($order['is_in_delivery']): ?>
                        <form method="post" action=''>
                            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                            <button type="button" class="submit pay">Test</button>
                        </form>
                    <?php endif ?>
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