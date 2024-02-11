<h3>Ingrédients</h3>

<table class='table-cart'>

    <thead>
        <th>ID</th>
        <th>Nom</th>
        <th>Lipides</th>
        <th>Glucides</th>
        <th>Proteines</th>
        <th><a href="?page=admin_add_food" title="Add food admin">Nouvel ingrédient</a></th>
    </thead>

    <?php foreach ($allFood as $food) { ?>
        <tr>
            <td>
                <?= $food['id'] ?>
            </td>
            <td>
                <?= $food['name'] ?>
            </td>
            <td>
                <?= $food['lipid'] ?>
            </td>
            <td>
                <?= $food['carbohydrate'] ?>
            </td>
            <td>
                <?= $food['protein'] ?>
            </td>
            <td id="delete-edit">
                <form method="post" action="?page=admin_edit_food">
                    <input type="hidden" name="id" value="<?= $food['id'] ?>">
                    <button type="submit" class="submit pay orange-button">Modifier</button>
                </form>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $food['id'] ?>">
                    <button name="delete" type="submit" class="submit pay orange-button">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>