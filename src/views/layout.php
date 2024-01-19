<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Croc Express</title>
    <link rel="stylesheet" href="../src/styles/style.css">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <header>
        <nav>
            <a href="?page=homepage"><img src="./assets/favicon.ico"></a>
            <ul>
                <?php if (isset($_SESSION['logged'])): ?>
                    <li class="dropdown-main"><a href="?page=admin">Administration<i class="fa-solid fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="?page=admin&action=deliver">Mes commandes à livrer</a></li>
                            <li><a href="?page=admin&action=commands">Toutes mes commandes</a></li>
                            <li><a href="?page=admin&action=turnover">Chiffres d'affaire</a></li>
                            <li><a href="?page=admin&action=bestseller">Meilleures ventes</a></li>
                            <li><a href="?page=admin&action=categories">Catégories</a></li>
                            <li><a href="?page=admin&action=products">Produits</a></li>
                            <li><a href="?page=admin&action=food">Aliments</a></li>
                            <li><a href="?page=admin&action=messages">Messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-main"><a href="?page=profile">User<i class="fa-solid fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="?page=profile&action=profile">Profil</a></li>
                            <li><a href="?page=profile&action=commands">Commandes</a></li>
                            <li><a href="?page=profile&action=logout">Se déconnecter</a></li>
                        </ul>
                    </li>
                    <li><a href="?page=contact">Contactez-nous</a></li>
                    <li><a href="?page=cart"></a></li>
                <?php else: ?>
                    <li><a href="?page=login">Se connecter</a></li>
                    <li><a href="?page=register">S'inscrire</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <?php require '../src/controllers/' . $route . '_controller.php'; ?>
    </main>
    <footer>
        <div id="footer-container">
            <p id="copyrights">© 2024 Raphaël | Benoît, CODA-Orléans. All Rights Reserved</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>