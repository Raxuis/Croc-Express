<h3>Ajouter un produit à la carte</h3>
<div class="container">
    <form action="" method="post" class="form">

        <input type="text" name="name" placeholder="Nom du produit">
        <textarea type="text" name="description" placeholder="Description"></textarea>
        <input type="number" name="price" placeholder="Prix de vente">
        <input type="number" name="buyingPrice" placeholder="Cout de production">

        <select name="categoryId" id="categoryId">
            <option value="">-- Séléctionnez une catégorie --</option>
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

<<<<<<< HEAD
    <select name="foodList[]" id="foodList" multiple >
        <?php foreach ($allFood as $food) { ?>
            <option value="<?= $food["id"] ?>"><?= $food["name"] ?></option>
        <?php } ?>
    </select>

    <label for="isHidden">Produit caché du public</label>
    <input type="checkbox" name="isHidden">

    <button type="submit" class="submit">Ajouter ce produit</button>

</form>
=======
        <button type="submit" class="submit">Ajouter ce produit</button>
>>>>>>> a191fedc8ae70193ee1d5ab40a78433e3b68e865

    </form>
</div>
<script>
    $(document).ready(function () {
        $('#foodList').select2();
    });
</script>