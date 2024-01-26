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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body>
    <header>
        <nav>
            <a href="?page=homepage"><img src="./assets/favicon.ico" alt='favicon'></a>
            <ul class="nav-menu">
                <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true): ?>
                    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1): ?>
                        <li class="dropdown-main">
                            <p>Administration<i class="fa-solid fa-caret-down"></i></p>
                            <ul class="dropdown-menu">
                                <li><a href="?page=admin_deliver" class="nav-links" title="Commands To Deliver">Mes commandes à
                                        livrer</a>
                                </li>
                                <li><a href="?page=admin_orders" class="nav-links" title="Every Commands">Toutes mes
                                        commandes</a>
                                </li>
                                <li><a href="?page=admin_turnover" class="nav-links" title="Turnover">Chiffres d'affaire</a>
                                </li>
                                <li><a href="?page=admin_bestsellers" class="nav-links" title="Bestsellers">Meilleures
                                        ventes</a>
                                </li>
                                <li><a href="?page=admin_categories" class="nav-links" title="Admin Add Category">Catégories</a>
                                </li>
                                <li><a href="?page=admin_menus" class="nav-links" title="Admin Menus">Menus</a>
                                </li>
                                <li><a href="?page=admin_products" class="nav-links" title="Admin Add Product">Produits</a>
                                </li>
                                <li><a href="?page=admin_add_food" class="nav-links" title="Admin Add Food">Aliments</a>
                                </li>
                                <li><a href="?page=admin_coupons" class="nav-links" title="Coupons">Bons de
                                        Réduction</a></li>
                                <li><a href="?page=admin_messages" class="nav-links" title="Admin Messages">Messages</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li class="dropdown-main"><a href="?page=edit_profile" class="nav-links" title="Edit Profile">
                            <?= isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'Anonymous' ?><i
                                class="fa-solid fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="?page=edit_profile" class="nav-links" title="Edit Profile">Profil</a></li>
                            <li><a href="?page=orders" class="nav-links" title="Orders">Commandes</a>
                            </li>
                            <li><a href="?page=disconnect" class="nav-links" title="Log out">Se déconnecter</a></li>
                        </ul>
                    </li>
                    <li><a href="?page=contact" class="nav-links" title="Contact">Contactez-nous</a></li>
                    <div class="burger-menu">
                        <a href="javascript:void(0);" class="icon" onclick="myFunction()" title="Burger">
                            <i class="fa-solid fa-bars" id="burger-icon"></i>
                        </a>
                    </div>
                <?php else: ?>
                    <li><a href="?page=login" class="nav-links not-logged" title="Log">Se connecter</a></li>
                    <li><a href="?page=register" class="nav-links not-logged" title="Register">S'inscrire</a></li>
                    <div class="burger-menu">
                        <a href="javascript:void(0);" class="icon" onclick="myFunction()" title="Burger Menu">
                            <i class="fa-solid fa-bars" id="burger-icon"></i>
                        </a>
                    </div>
                <?php endif; ?>
                <li><a href="?page=cart" class="nav-links"><i class="fa-solid fa-cart-shopping" title="Cart"></i>
                        <?php
                        $total = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $total += $value["quantity"];
                            }
                        } ?>
                        <sup class="commands">
                            <?= $total ?>
                        </sup>
                    </a></li>
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
    <script src="../src/scripts/burgerMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../src/scripts/sweetAlert.js"></script>
    <!-- <script>
        document.querySelector('button[data-swal-template="#my-template"]').addEventListener('click', function () {
            Swal.fire({
                template: '#my-template',
                allowEscapeKey: false,
                customClass: {
                    popup: 'my-popup'
                },
                didOpen: function (popup) {
                    console.log(popup);
                }
            }).then(function (result) {
                if (result.isConfirmed) {
                    console.log("User clicked Confirm");
                } else {
                    console.log("User clicked Denied");
                }
            }
            )
        });
    </script> -->

    <script>
        <?php if (!empty($_SESSION['status'])) { ?>
            toastr.<?= $_SESSION['status'] ?>("<?= $_SESSION['message'] ?>")
        <?php }
        unset($_SESSION['status']);
        unset($_SESSION['message']);
        ?>
    </script>
</body>

</html>