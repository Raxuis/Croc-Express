<h3>Page de modification de profil</h3>
<div class="container">
    <form action="" method="post" class="form">
        <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>"/>
        <label for="firstname">Prénom : </label>
        <input type="text" class="form-control" id="firstname" name="firstname"
               value="<?= htmlspecialchars($userInfos['firstname']) ?>">
        <label for="lastname">Nom : </label>
        <input type="text" class="form-control" id="lastname" name="lastname"
               value="<?= htmlspecialchars($userInfos['lastname']) ?>">
        <label for="email">Email : </label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($userInfos['email']) ?>">
        <label for="password">Ancien mot de passe : </label>
        <input type="password" id="password-old" name="password_old">
        <label for="password">Modifier votre mot de passe : </label>
        <input type="password" id="password" name="password">
        <label for="password-confirmation">Mot de passe de confirmation : </label>
        <input type="password" id="password-confirmation" name="password_confirmation">
        <input type="hidden" id="id" name="id" value="<?= $userInfos['id'] ?>">
        <button type="submit" class="submit">Valider</button>
    </form>
</div>