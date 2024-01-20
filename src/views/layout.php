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
            <ul class="nav-menu">
                <?php if (isset($_SESSION['logged'])): ?>
                    <li class="dropdown-main"><a href="?page=admin">Administration<i class="fa-solid fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="?page=admin&action=deliver" class="nav-links">Mes commandes à livrer</a></li>
                            <li><a href="?page=admin&action=commands" class="nav-links">Toutes mes commandes</a></li>
                            <li><a href="?page=admin&action=turnover" class="nav-links">Chiffres d'affaire</a></li>
                            <li><a href="?page=admin&action=bestseller" class="nav-links">Meilleures ventes</a></li>
                            <li><a href="?page=admin&action=categories" class="nav-links">Catégories</a></li>
                            <li><a href="?page=admin&action=products" class="nav-links">Produits</a></li>
                            <li><a href="?page=admin&action=food" class="nav-links">Aliments</a></li>
                            <li><a href="?page=admin&action=messages" class="nav-links">Messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-main"><a href="?page=profile" class="nav-links">User<i
                                class="fa-solid fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="?page=profile&action=profile" class="nav-links">Profil</a></li>
                            <li><a href="?page=profile&action=commands" class="nav-links">Commandes</a></li>
                            <li><a href="?page=profile&action=logout" class="nav-links">Se déconnecter</a></li>
                        </ul>
                    </li>
                    <li><a href="?page=contact" class="nav-links">Contactez-nous</a></li>
                    <li><a href="?page=cart" class="nav-links"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <div class="burger-menu">
                        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                            <i class="fa-solid fa-bars" id="burger-icon"></i>
                        </a>
                    </div>
                <?php else: ?>
                    <li><a href="?page=login" class="nav-links not-logged">Se connecter</a></li>
                    <li><a href="?page=register" class="nav-links not-logged">S'inscrire</a></li>
                    <div class="burger-menu">
                        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                            <i class="fa-solid fa-bars" id="burger-icon"></i>
                        </a>
                    </div>
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
    <script src="../src/scripts/burgermenu.js"></script>
</body>

</html>