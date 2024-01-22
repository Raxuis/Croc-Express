<h3>Page de connexion</h3>
<div class="container">
    <form action="" method="post" class="form">
        <label for="email">Entrez votre email : </label>
        <input type="email" id="email" name="email" autofocus placeholder="Email" id="email" required />

        <label for="password">Entrez votre mot de passe : </label>
        <input type="password" id="password" name="password" placeholder="Password" id="password" required />
        <!-- <input type="hidden" name="token" value="php echo $_SESSION['token'] ?? '' "> -->
        <button type="submit" value="login" class="submit">Se connecter</button>
    </form>
</div>