<h3>Modifier une catégorie</h3>

<div class="container">
    <form action="?page=admin_edit_category" method="post" class="form" enctype="multipart/form-data">
        <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>"/>

        <input type="hidden" name="id" value="<?= $category["id"] ?>">
        <input type="text" name="name" placeholder="Nom de la catégorie" value="<?= $category["name"] ?>">
        <input type="text" name="description" placeholder="Description de la catégorie"
               value="<?= $category["description"] ?>">

        <label for="isHidden">Cacher la catégorie</label>
        <?php if ($category["is_hidden"]) { ?>
            <input type="checkbox" name="isHidden" id="isHidden" checked>
        <?php } else { ?>
            <input type="checkbox" name="isHidden" id="isHidden">
        <?php } ?>
        <div class="current-image">
            <input type="hidden" name="currentImage" value="<?= $category['image'] ?>">
            <p>Image actuelle:
            </p>
            <img src="<?= PATH_IMAGES . $category['image'] ?>" alt="category image" style="
    width: 20em;
    object-fit: cover;
">
        </div>
        <div class="file">
            <label for="image">Ajouter une image</label>
            <input type="file" name="image" id="image">
        </div>

        <button class="submit" type="submit">Modifier cette catégorie</button>
    </form>
</div>