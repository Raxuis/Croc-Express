<h3>Nous contacter</h3>

<form action="" method="post" class="form">

    <input type="text" name="title" placeholder="Titre">
    <textarea name="content" placeholder="Contenu"></textarea>

    <input type="hidden" name="userId" value="<?= $_SESSION["user_id"] ?>">
    <input type="hidden" name="ip" value="<?= $_SERVER["REMOTE_ADDR"] ?>">

    <?php if(isset($_SESSION["user_id"])) { ?>
        <button type="submit" class="submit">Envoyer</button>
    <?php } else { ?>
        <p>Connectez vous pour envoyer ce messages</p>
    <?php } ?>
</form>