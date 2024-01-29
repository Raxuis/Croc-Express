<h3>Modifier le produit</h3>
<div class="container">
    <form action="" method="post" class="form" enctype='multipart/form-data'>

        <input type="hidden" name="id" value="<?= $product["id"] ?>">
        <input type="text" name="name" placeholder="Nom du produit" value="<?= $product["name"] ?>">
        <textarea type="text" name="description" placeholder="Description"><?= $product["description"] ?></textarea>
        <input type="number" min="1" name="price" placeholder="Prix de vente" value="<?= $product["price"] ?>">
        <input type="number" min="1" name="buyingPrice" placeholder="Coût de production"
            value="<?= $product["buying_price"] ?>">

        <select name="categoryId" id="categoryId">
            <?php foreach ($categories as $category) { ?>
                <?php if ($category["id"] === $product["category_id"]) { ?>
                    <option value="<?= $category["id"] ?>" selected>
                    <?php } else { ?>
                    <option value="<?= $category["id"] ?>">
                    <?php } ?>
                    <?= $category["name"] ?>
                </option>
            <?php } ?>
        </select>

        <select name="foodList[]" id="foodList" multiple>
            <?php foreach ($allFood as $food) { ?>
                <?php $foodSelected = false;
                foreach ($allFoodInProduct as $item) {
                    if ($item["food_id"] === $food["id"]) {
                        $foodSelected = true;
                    }
                }
                if ($foodSelected) { ?>
                    <option value="<?= $food["id"] ?>" selected>
                    <?php } else { ?>
                    <option value="<?= $food["id"] ?>">
                    <?php } ?>

                    <?= $food["name"] ?>
                </option>
            <?php } ?>
        </select>

        <div class="hidden">
            <label for="isHidden">Produit caché du public</label>
            <?php if ($product["is_hidden"]) { ?>
                <input type="checkbox" name="isHidden" checked>
            <?php } else { ?>
                <input type="checkbox" name="isHidden">
            <?php } ?>
        </div>
        <div class="file">
            <label for="image">Ajouter une image</label>
            <input type="file" name="image[]" id="image" value="" multiple>
        </div>

        <button type="submit" class="submit">Modifier ce produit</button>

    </form>
</div>
<script>
    $(document).ready(function () {
        $('#foodList').select2();
    });
</script>