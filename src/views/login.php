<h3>Page de connexion</h3>
<div class="container">
    <form action="" method="post" class="form">
        <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>" />
        <label for="email" id="email-label">Entrez votre email : </label>
        <input type="email" id="email" name="email" autofocus placeholder="Email" id="email" required />

        <label for="password" id="password-label">Entrez votre mot de passe : </label>
        <input type="password" name="password" placeholder="Password" id="password" required />
        <!-- <input type="hidden" name="token" value="php echo $_SESSION['token'] ?? '' "> -->
        <button type="submit" value="login" id="submit" class="submit" hidden>Se connecter</button>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        verify();
    });
</script>