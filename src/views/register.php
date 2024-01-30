<h3>Page de création de compte</h3>
<div class="container">
    <form action="" method="post" class="form">
        <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>" />
        <label for="firstname">
            Prénom:
        </label>
        <input type="text" name="firstname" id="firstname" placeholder="Elliot">
        <label for="lastname">Nom :</label>
        <input type="text" name="lastname" id="lastname" placeholder="Alderson">
        <label for="email" id='email-label'>Email: </label>
        <input type="email" name="email" id="email" placeholder="elliot@fsociety.com">
        <label for="password" id='password-label'>Mot de passe: </label>
        <input type="password" name="password" id="password" placeholder="darlene1234">
        <label for="password-confirmation" id='password-confirmation-label'>Mot de passe de confirmation: </label>
        <input type="password" name="password_confirmation" id="password-confirmation" placeholder="darlene1234">
        <button type="submit" value="register" id="submit" class="submit" hidden>Créer un compte</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        verify(document.getElementById("password-confirmation"), document.getElementById("password-confirmation-label"));
    });
</script>