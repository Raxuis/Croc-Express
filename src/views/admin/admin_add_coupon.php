<h3>Ajouter un coupon de réduction</h3>

<div class="container">
    <form action="" method="post" class="form">
        <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>" />
        <input type="text" name="name" placeholder="Nom du coupon">
        <input type="number" name="reduction" min="0" placeholder="Réduction">
        <button class="submit" type="submit">Ajouter ce coupon</button>
    </form>
</div>