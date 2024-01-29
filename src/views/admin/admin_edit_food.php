<h3>Modifier un ingrédient</h3>

<div class="container">
    <form action="" method="post" class="form">
        <input type="hidden" name="id" value="<?= $food['id'] ?>">
        <input type="text" name="name" placeholder="Nom de l'ingrédient" value="<?= $food['name'] ?>">
        <input type="number" name="lipid" min="0" placeholder="Lipides" value="<?= $food['lipid'] ?>">
        <input type="number" name="protein" min="0" placeholder="Protéines" value="<?= $food['protein'] ?>">
        <input type="number" name="carbohydrate" min="0" placeholder="Carbohydrate" value="<?= $food['carbohydrate'] ?>">
        <input type="number" name="weight" min="0" placeholder="Poids (grammes)" value="<?= $food['weight'] ?>">

        <button class="submit" type="submit">Modifier cet ingrédient</button>
    </form>
</div>