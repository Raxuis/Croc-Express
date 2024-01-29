<h3>Mon panier</h3>
<div class="container">
    <?php if (!empty($_SESSION["cart"])) { ?>
    <table class='table-cart'>
        <thead>
        <tr>
            <th></th>
            <th>Produit</th>
            <th>Prix Unitaire</th>
            <th>Quantité</th>
            <th>Prix Total</th>
            <th><i class="fa-solid fa-bag-shopping"></i></th>
        </tr>
        </thead>
        <!--            --><?php //$productsInCart = [];
        //            foreach ($_SESSION["cart"] as $key => $value) { ?>
        <!--                --><?php
        //                $product = $productsManager->getOne($key);
        //                $productImage = $productImageManager->getImagesByProductId($key);
        //                $productsInCart[] = $product
        //                    ?>
        <!--                <tr class="items-list" id="--><?php //= 'item-' . $product['id'] ?><!--">-->
        <!--                    <td class="td-images">-->
        <!--                        <img src="-->
        <?php //= PATH_IMAGES . $productImage[0]['image'] ?><!--" alt="" class='cart-images'>-->
        <!--                    </td>-->
        <!--                    <td>-->
        <!--                        --><?php //= $product['name'] ?>
        <!--                    </td>-->
        <!--                    <td>-->
        <!--                        --><?php //= $product['price'] . '€' ?>
        <!--                    </td>-->
        <!--                    <td id="--><?php //= 'item-quantity-' . $product['id'] ?><!--">-->
        <!--                        --><?php //= $value["quantity"] ?>
        <!--                    </td>-->
        <!--                    <td id="--><?php //= 'item-total-price-' . $product['id'] ?><!--" data-price="-->
        <?php //= $product['price'] ?><!--">-->
        <!--                        --><?php //= $product['price'] * $_SESSION["cart"][$product['id']]["quantity"] ?>
        <!--                    </td>-->
        <!--                    <td>-->
        <!--                        <button class="remove-cart" data-action="remove" id="-->
        <?php //= 'button-remove-' . $product['id'] ?><!--">-->
        <!--                            <i class="fa-solid fa-circle-minus"></i></button>-->
        <!--                        <button class="add-cart" data-action="add" id="-->
        <?php //= 'button-add-' . $product['id'] ?><!--"><i-->
        <!--                                class="fa-solid fa-circle-plus"></i></button>-->
        <!--                    </td>-->
        <!--                </tr>-->
        <!---->
        <!--            --><?php //} ?>

        <?php $dataInCart = [];
        foreach ($_SESSION["cart"] as $type => $items) {
            foreach ($items as $id => $value) { ?>
                <?php

                if ($type === 'product') {
                    $data = $productsManager->getOne($id);
                    $dataImage = $productImageManager->getImagesByProductId($id);
                } else if ($type === 'menu') {
                    $data = $menuManager->getOne($id);
                    $dataImage = null;
                }

                $data['type'] = $type;
                $dataInCart[] = $data;

                ?>
                <tr class="items-list" id="<?= 'item-' . $type . '-' . $data['id'] ?>">

                    <input type="hidden" name="type" value="<?= $type ?>">

                    <td class="td-images">
                        <?php if($dataImage) { ?>
                            <img src="<?= PATH_IMAGES . $dataImage[0]['image'] ?>" alt="" class='cart-images'>
                        <?php } ?>
                    </td>
                    <td>
                        <?= $data['name'] ?>
                    </td>
                    <td>
                        <?= $data['price'] . '€' ?>
                    </td>
                    <td id="<?= 'item-quantity-' . $type . '-' . $data['id'] ?>">
                        <?= $value["quantity"] ?>
                    </td>
                    <td id="<?= 'item-total-price-' . $type . '-' . $data['id'] ?>" data-price="<?= $data['price'] ?>">
                        <?= $data['price'] * $value["quantity"] ?>
                    </td>
                    <td>
                        <button class="remove-cart" data-action="remove" data-type="<?= $type ?>" id="<?= 'button-remove-' . $type . '-' . $data['id'] ?>">
                            <i class="fa-solid fa-circle-minus"></i></button>
                        <button class="add-cart" data-action="add" data-type="<?= $type ?>" id="<?= 'button-add-' . $type . '-' . $data['id'] ?>"><i
                                    class="fa-solid fa-circle-plus"></i></button>
                    </td>
                </tr>
            <?php }
        } ?>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Livraison</td>
            <td id="delivery-price">0</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Tax</td>
            <td>1.00</td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="checkbox" name="livery" id="delivery">
                <label for="livery">Livrer cette commande pour
                    5€</label>
            </td>
            <td></td>
            <td>Total</td>
            <td id="total-price">0</td>
            <td>
                <button type="button" class="submit pay emptyCart" id="emptyCart">Vider le panier</button>
                <!--                <button type="button" class="submit pay">Payer</button>-->
            </td>
        </tr>
    </table>
    <form action="?page=payment" method="post" class="form" style="margin-bottom : 10vh;">

        <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>"/>

        <div id="address-form" class="address-hidden">
            <h3>Adresse de livraison</h3>
            <label for="firstname">Prénom</label>
            <input type="text" name="firstname" id="firstname">

            <label for="lastname">Nom</label>
            <input type="text" name="lastname" id="lastname">

            <label for="address">Rue</label>
            <input type="text" name="address" id="address">

            <label for="city">Ville</label>
            <input type="text" name="city" id="city">
            <label for="zip">Code postal</label>
            <input type="text" name="zip" id="zip">

            <label for="country">Pays</label>
            <select id="country" name="country[]" style="width: 100%;"></select>
        </div>

        <label for="coupon">Coupon de réduction</label><input type="text" name="coupon" id="coupon">
        <?php if (isset($_SESSION['logged'])): ?>
            <button type="submit" class="submit pay">Payer</button>
        <?php else: ?>
            <p>Vous n'êtes pas connecté</p>
            <p>Veuillez vous connecter ou créer un compte pour payer</p>
            <button type="button" class="submit pay" onclick="window.location.href='?page=login'">Se connecter</button>
            <button type="button" class="submit pay" onclick="window.location.href='?page=register'">S'inscrire</button>
        <?php endif; ?>
    </form>
</div>
<?php } else { ?>
    <?php
    header("Location: " . BASE_PATH);
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Votre panier est vide';
    exit();
    ?>
<?php } ?>
<script src="<?= PATH_PRIVATE . 'scripts/cartManagement.js' ?>"></script>
<script src="<?= PATH_PRIVATE . 'scripts/countriesAPI.js' ?>"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        <?php foreach ($dataInCart as $product) { ?>
        initializeDelivery();
        initializeCart("<?= $product['id'] ?>", "<?= $product['price'] ?>", 'button-add-<?= $product['type'] ?>-<?= $product['id'] ?>', document.getElementsByClassName("commands")[0]);
        initializeCart("<?= $product['id'] ?>", "<?= $product['price'] ?>", 'button-remove-<?= $product['type'] ?>-<?= $product['id'] ?>', document.getElementsByClassName("commands")[0]);
        getTotalCartValue(document.getElementById("total-price"));
        <?php } ?>
        initializeEmptyCart();
    });
</script>