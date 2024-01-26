<h3>Gestions des menus à la carte</h3>
<?= var_dump($_POST) ?>
<table class='table-cart'>
    <thead>
        <th>ID</th>
        <th>Nom</th>
        <th>Prix de vente</th>
        <th>Produits</th>
        <th>Ventes</th>
        <th>Publier</th>
        <th><a href="?page=admin_add_menu" title="Add menu admin">Nouveau menu</a></th>
    </thead>
    <?php foreach ($menus as $menu) { ?>
        <?php $products = $menusManager->getAllProductsFromMenu($menu['id']) ?>
        <tr>
            <td>
                <?= $menu['id'] ?>
            </td>
            <td>
                <?= $menu['name'] ?>
            </td>
            <td>
                <?= $menu['price'] . '€' ?>
            </td>
            <td>
                <?php
                if ($products) {
                    foreach ($products as $product) { ?>
                        <?= $product['name'] . '<br>' ?>
                    <?php } ?>
                <?php } else {
                    echo 'Aucun produit';
                } ?>
            </td>
            <td></td>

            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $menu['id'] ?>">
                    <button name="show_hide" type="submit" class="submit pay orange-button">
                        <?= $menu['is_hidden'] ? "Afficher" : "Masquer" ?>
                    </button>
                </form>
            </td>
            <td id="delete-edit">
                <form method="post" action="?page=admin_edit_menu">
                    <input type="hidden" name="id" value="<?= $menu['id'] ?>">
                    <button type="submit" class="submit pay orange-button">Modifier</button>
                </form>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $menu['id'] ?>">
                    <button name="delete" type="submit" class="submit pay orange-button" value='true'>Supprimer</button>
                </form>
            </td>
        </tr>
    <?php } ?>

</table>