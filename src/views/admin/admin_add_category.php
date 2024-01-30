<h3>Catégories</h3>

<div class="container">
    <form action="?page=admin_add_category" method="post" class="form" enctype="multipart/form-data">
        <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>"/>
        <input type="text" name="name" placeholder="Nom de la catégorie">
        <input type="text" name="description" placeholder="Description de la catégorie">
        <label for="isHidden">Cacher la catégorie</label>
        <input type="checkbox" name="isHidden" id="isHidden">
        <div class="file">
            <label for="image">Ajouter une image</label>
            <input type="file" name="image" id="image">
        </div>

        <button class="submit" type="submit">Ajouter cette catégorie</button>
    </form>
</div>