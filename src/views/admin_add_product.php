<h3>Ajouter un produit à la carte</h3>
<div class="container">
    <form action="" method="post" class="form" enctype='multipart/form-data'>

        <input type="text" name="name" placeholder="Nom du produit">
        <textarea type="text" name="description" placeholder="Description"></textarea>
        <input type="number" name="price" placeholder="Prix de vente">
        <input type="number" name="buyingPrice" placeholder="Coût de production">

        <select name="categoryId" id="categoryId">
            <option value="">-- Sélectionnez une catégorie --</option>
            <?php foreach ($categories as $category) { ?>
                <option value="<?= $category["id"] ?>">
                    <?= $category["name"] ?>
                </option>
            <?php } ?>
        </select>

        <select name="foodList[]" id="foodList" multiple>
            <option value="">-- Sélectionnez des aliments --</option>
            <?php foreach ($allFood as $food) { ?>
                <option value="<?= $food["id"] ?>">
                    <?= $food["name"] ?>
                </option>
            <?php } ?>
        </select>
        <div class="hidden">
            <label for="isHidden">Produit caché du public</label>
            <input type="checkbox" name="isHidden">
        </div>
        <div class="file">
            <label for="image">Ajouter une image</label>
            <input type="file" name="image[]" id="image" multiple>
        </div>

        <button type="submit" class="submit">Ajouter ce produit</button>

    </form>
</div>
<script>
    $(document).ready(function () {
        $('#foodList').select2();
    });
</script>