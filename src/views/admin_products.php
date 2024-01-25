<h3>Produits</h3>

<table class='table-cart'>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>Prix de vente</td>
        <td>Prix d'achat</td>
        <td>Calories</td>
        <td>Aliments</td>
        <td>Ventes</td>
        <td>Publier</td>
        <td><a href="?page=admin_add_product" title="Add product admin">Nouveau produit</a></td>
    </tr>
    <?php foreach ($allProducts as $product) { ?>
        <?php

        $food = $productFoodManager->getAllFoodOfProduct($product['id']);
        $sales = $orderProductManager->getProductSales($product['id']);

        ?>
        <tr>
            <td>
                <?= $product['id'] ?>
            </td>
            <td>
                <?= $product['name'] ?>
            </td>
            <td>
                <?= $product['price'] ?>
            </td>
            <td>
                <?= $product['buying_price'] ?>
            </td>
            <td>
                <?= "CALCUL CAL " ?>cal
            </td>
            <td>
                <?= count($food) ?>
            </td>
            <td>
                <?= count($sales) ?>
            </td>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <button name="show_hide" type="submit" class="submit pay orange-button">
                        <?= $product['is_hidden'] ? "Afficher" : "Masquer" ?>
                    </button>
                </form>
            </td>
            <td id="delete-edit">
                <form method="post" action="?page=admin_edit_product">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <button type="submit" class="submit pay orange-button">Modifier</button>
                </form>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <button name="delete" type="submit" class="submit pay orange-button">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php } ?>

</table>