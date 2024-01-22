<h3>Nous contacter</h3>

<form action="" method="post" class="form">

    <label for="title">Titre de votre message</label>
    <input type="text" name="title" placeholder="Titre">

    <label for="content">Votre message</label>
    <textarea name="content" placeholder="Contenu"></textarea>

    <input type="hidden" name="userId" value="<?= $_SESSION["user_id"] ?>">
    <input type="hidden" name="ip" value="<?= $_SERVER["REMOTE_ADDR"] ?>">

    <?php if(isset($_SESSION["user_id"])) { ?>
        <button type="submit" class="submit">Envoyer</button>
    <?php } else { ?>
        <p>Connectez-vous pour envoyer ce message</p>
    <?php } ?>
</form>