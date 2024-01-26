<h3>Mon panier</h3>
<div class="container">
    <?php
    if (!empty($_SESSION["cart"])) { ?>
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
            <?php $productsInCart = [];
            foreach ($_SESSION["cart"] as $key => $value) { ?>
                <?php
                $product = $productsManager->getOne($key);
                $productImage = $productImageManager->getImagesByProductId($key);
                $productsInCart[] = $product
                    ?>
                <tr id="<?= 'item-' . $product['id'] ?>">
                    <td class="td-images">
                        <img src="<?= PATH_IMAGES . $productImage[0]['image'] ?>" alt="" class='cart-images'>
                    </td>
                    <td>
                        <?= $product['name'] ?>
                    </td>
                    <td>
                        <?= $product['price'] . '€' ?>
                    </td>
                    <td id="<?= 'item-quantity-' . $product['id'] ?>">
                        <?= $value["quantity"] ?>
                    </td>
                    <td id="<?= 'item-total-price-' . $product['id'] ?>" data-price="<?= $product['price'] ?>">
                        <?= $product['price'] * $_SESSION["cart"][$product['id']]["quantity"] ?>
                    </td>
                    <td>
                        <button class="remove-cart" data-action="remove" id="<?= 'button-remove-' . $product['id'] ?>">
                            <i class="fa-solid fa-circle-minus"></i></button>
                        <button class="add-cart" data-action="add" id="<?= 'button-add-' . $product['id'] ?>"><i
                                class="fa-solid fa-circle-plus"></i></button>
                    </td>
                </tr>

            <?php } ?>

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

            <button type="submit" class="submit pay">Payer</button>
        </form>
    </div>
<?php } else { ?>
    <?php
    ob_end_clean();
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
        <?php foreach ($productsInCart as $product) { ?>
            initializeDelivery();
            initializeCart("<?= $product['id'] ?>", "<?= $product['price'] ?>", 'button-add-<?= $product['id'] ?>', document.getElementsByClassName("commands")[0]);
            initializeCart("<?= $product['id'] ?>", "<?= $product['price'] ?>", 'button-remove-<?= $product['id'] ?>', document.getElementsByClassName("commands")[0]);
            getTotalCartValue(document.getElementById("total-price"));
        <?php } ?>
    });
</script>