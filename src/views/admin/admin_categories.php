<h3>Toutes les catégories</h3>

<table class="table-coupons">

    <thead>
    <th>ID</th>
    <th>Nom</th>
    <th>Description</th>
    <th>Visibilité</th>
    <th><a href="?page=admin_add_category" title="Add category admin">Nouvelle catégorie</a></th>
    </thead>

    <?php foreach ($allCategories as $category) { ?>
        <tr>
            <td>
                <?= $category['id'] ?>
            </td>
            <td>
                <?= $category['name'] ?>
            </td>
            <td>
                <?= $category['description'] ?>
            </td>

            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $category['id'] ?>">
                    <button name="show_hide" type="submit" class="submit pay orange-button">
                        <?= $category['is_hidden'] ? "Afficher" : "Masquer" ?>
                    </button>
                </form>
            </td>
            <td id="delete-edit">
                <form method="post" action="?page=admin_edit_category">
                    <input type="hidden" name="id" value="<?= $category['id'] ?>">
                    <button type="submit" class="submit pay orange-button">Modifier</button>
                </form>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $category['id'] ?>">
                    <button id="delete-<?= $category['id'] ?>" name="delete" type="submit"
                            class="delete submit pay orange-button">Supprimer
                    </button>
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
