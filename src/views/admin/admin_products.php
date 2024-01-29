<h3>Produits</h3>

<table class='table-cart'>
    <thead>
        <th>ID</th>
        <th>Nom</th>
        <th>Prix de vente</th>
        <th>Prix d'achat</th>
        <th>Calories</th>
        <th>Aliments</th>
        <th>Ventes</th>
        <th>Publier</th>
        <th><a href="?page=admin_add_product" title="Add product admin">Nouveau produit</a></th>
    </thead>
    <?php foreach ($allProducts as $product) { ?>
        <?php

        $food = $productFoodManager->getAllFoodOfProduct($product['id']);
        $sales = $orderProductManager->getProductSales($product['id']);
        $foods = $productFoodManager->getAllFoodDatasOfProduct($product['id']);

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
                <?php foreach ($foods as $food) { ?>
                    <?php
                    $calories = calculateTotalCaloriesPerAliment($food);
                    $totalCalories += $calories * ($food["weight"] / 100); ?>
                <?php } ?>
                <?= $totalCalories ?>
            </td>
            <?php
            $totalCalories = 0;
            ?>
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