<h3>Page de modification de profil</h3>
<div class="container">
    <form action="" method="post" class="form">
        <label for="firstname">Prénom : </label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $userInfos['firstname'] ?>">
        <label for="lastname">Nom : </label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $userInfos['lastname'] ?>">
        <label for="email">Email : </label>
        <input type="email" id="email" name="email" value="<?= $userInfos['email'] ?>">
        <label for="password">Modifier votre mot de passe : </label </form>
        <input type="password" id="password" name="password">
        <label for="password-confirmation">Mot de passe de confirmation : </label>
        <input type="password" id="password-confirmation" name="password_confirmation">
        <input type="hidden" id="id" name="id" value="<?= $userInfos['id'] ?>">
        <button type="submit" class="submit">Valider</button>
    </form>
</div>