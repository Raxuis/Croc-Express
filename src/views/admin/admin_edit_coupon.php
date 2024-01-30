<h3>Modifier un bon de réduction</h3>

<div class="container">
    <form action="" method="post" class="form">

        <input type="hidden" name="id" value="<?= $coupon["id"] ?>">

        <label for="code">Code de réduction</label>
        <input type="text" name="name" id="name" value="<?= $coupon["name"] ?>">

        <label for="value">Taux de remise (%)</label>
        <input type="number" name="reduction" id="reduction" value="<?= $coupon["reduction"] ?>">

        <button class="submit">Modifier</button>
    </form>
</div>