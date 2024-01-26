<h3>Gestion bons de réduction</h3>

<table class="table-coupons">

    <thead>
    <th>ID</th>
    <th>Nom</th>
    <th>Réduction</th>
    <th><a href="?page=admin_add_coupon" title="Add coupon admin">Nouvelle réduction</a></th>
    </thead>

    <?php foreach ($allCoupons as $coupon) { ?>
        <tr>
            <td>
                <?= $coupon['id'] ?>
            </td>
            <td>
                <?= $coupon['name'] ?>
            </td>
            <td>
                <?= $coupon['reduction'] ?>
            </td>
            <td id="delete-edit">
                <form method="post" action="?page=admin_edit_coupon">
                    <input type="hidden" name="id" value="<?= $coupon['id'] ?>">
                    <button type="submit" class="submit pay orange-button">Modifier</button>
                </form>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $coupon['id'] ?>">
                    <button name="delete" type="submit" class="submit pay orange-button">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

