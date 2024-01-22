<h3>Ajouter un produit à la carte</h3>

<form action="" method="post" class="form">

    <input type="text" name="name" placeholder="Nom du produit">
    <textarea type="text" name="description" placeholder="Description"></textarea>
    <input type="number" name="price" placeholder="Prix de vente">
    <input type="number" name="buyingPrice" placeholder="Cout de production">

    <select name="categoryId" id="">
        <option value="">-- Séléctionnez une catégorie --</option>
        <?php foreach ($categories as $category) { ?>
            <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
        <?php } ?>
    </select>

    <label for="isHidden">Produit caché du public</label>
    <input type="checkbox" name="isHidden">

    <button type="submit" class="submit">Ajouter ce produit</button>

</form>