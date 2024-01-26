<h3>Page de modification du menu</h3>
<div class="container">
    <form action="" method="post" class="form" enctype='multipart/form-data'>

        <input type="hidden" name="id" value="<?= $menu["id"] ?>">
        <input type="text" name="name" placeholder="Nom du produit" value="<?= $menu["name"] ?>">
        <input type="number" min="1" name="price" placeholder="Prix de vente" value="<?= $menu["price"] ?>">

        <select name="productList[]" id="productList" multiple="multiple">
            <?php foreach ($products as $product) { ?>
                <?php if ($product["id"] === $product["category_id"]) { ?>
                    <option value="<?= $product["id"] ?>" selected>
                    <?php } else { ?>
                    <option value="<?= $product["id"] ?>">
                    <?php } ?>
                    <?= $product["name"] ?>
                </option>
            <?php } ?>
        </select>
        <div class="hidden">
            <label for="isHidden">Menu caché du public</label>
            <?php if ($menu["is_hidden"]) { ?>
                <input type="checkbox" name="isHidden" checked>
            <?php } else { ?>
                <input type="checkbox" name="isHidden">
            <?php } ?>
        </div>

        <button type="submit" class="submit">Modifier ce menu</button>

    </form>
</div>
<script>
    $(document).ready(function () {
        $('#productList').select2();
    });
</script>