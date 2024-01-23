<h3>Produits</h3>

<table>
    <tr>
        <td><b>ID</b></td>
        <td><b>Nom</b></td>
        <td><b>Prix de vente</b></td>
        <td><b>Prix d'achat</b></td>
        <td><b>Calories</b></td>
        <td><b>Aliments</b></td>
        <td><b>Ventes</b></td>
        <td><b>Publier</b></td>
        <td><b><a href="?page=admin_add_product">Nouveau produit</a></b></td>
    </tr>
    <?php foreach ($allProducts as $product) { ?>
        <?php

        $food = $productFoodManager->getAllFoodOfProduct($product['id']);
        $sales = $orderProductManager->getProductSales($product['id']);

        ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['buying_price'] ?></td>
            <td><?= "CALCUL CAL " ?>cal</td>
            <td><?= count($food) ?></td>
            <td><?= count($sales) ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <button name="show_hide" type="submit"><?= $product['is_hidden'] ? "Afficher" : "Masquer" ?></button>
                </form>
            </td>
            <td>
                <form method="post" action="?page=admin_edit_product">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <button type="submit">Modifier</button>
                </form>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <button name="delete" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php } ?>

</table>