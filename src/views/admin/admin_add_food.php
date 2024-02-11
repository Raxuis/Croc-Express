<h3>Aliments</h3>
<div class="container">
    <form action="" method="post" class="form">
        <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>" />
        <input type="text" name="name" placeholder="Nom de l'ingrédient">
        <input type="number" name="lipid" min="0" placeholder="Lipides (en grammes)">
        <input type="number" name="protein" min="0" placeholder="Protéines (en grammes)">
        <input type="number" name="carbohydrate" min="0" placeholder="Carbohydrate (en grammes)">
        <input type="number" name="weight" min="0" placeholder="Poids (en grammes)">
        <input type="hidden" name="isHidden" value="false">
        <button class="submit" type="submit">Ajouter cet ingrédient</button>
    </form>
</div>