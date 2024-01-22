<h3>Ajouter un menu à la carte</h3>

<form action="" method="post" class="form">

    <input type="text" name="name" placeholder="Nom du menu">
    <input type="number" name="price" placeholder="Prix de vente">

    <select name="productList[]" id="productList" multiple >
        <?php foreach ($allProducts as $product) { ?>
            <option value="<?= $product["id"] ?>"><?= $product["name"] ?></option>
        <?php } ?>
    </select>

    <label for="isHidden">Menu caché du public</label>
    <input type="checkbox" name="isHidden">

    <button type="submit" class="submit">Ajouter ce menu</button>

</form>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () {
        $('#productList').select2();
    });
</script>