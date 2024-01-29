<h3>Catégories</h3>

<div class="container">
    <form action="?page=admin_add_category" method="post" class="form">
        <input type="text" name="name" placeholder="Nom de la catégorie">
        <input type="text" name="description" placeholder="Description de la catégorie">

        <label for="isHidden">Cacher la catégorie</label>
        <input type="checkbox" name="isHidden" id="isHidden">

        <button class="submit" type="submit">Ajouter cette catégorie</button>
    </form>
</div>