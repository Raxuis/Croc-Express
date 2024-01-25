<h3>Mon panier</h3>
<div class="container">
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
        if (isset($_SESSION["cart"])) {
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
                        <?= $product['price'] ?>
                    </td>
                    <td id="<?= 'item-quantity-' . $product['id'] ?>">
                        <?= $value["quantity"] ?>
                    </td>
                    <td id="<?= 'item-total-price-' . $product['id'] ?>" data-price="<?= $product['price'] ?>">
                        <?= $product['price'] * $_SESSION["cart"][$product['id']]["quantity"] ?>
                    </td>
                    <td>
                        <button class="remove-cart" data-action="remove" id="<?= 'button-remove-' . $product['id'] ?>"><i
                                class="fa-solid fa-circle-minus"></i></button>
                        <button class="add-cart" data-action="add" id="<?= 'button-add-' . $product['id'] ?>"><i
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
                <input type="checkbox" name="livery" id="livery"><label for="livery">Livrer cette commande pour
                    5€</label>
            </td>
            <td></td>
            <td>Total</td>
            <td id="total-price">0</td>
            <td>
                <button type="button" class="submit pay">Payer</button>
            </td>
        </tr>
    </table>
</div>

<script src="<?= PATH_PRIVATE . 'scripts/cartManagement.js' ?>"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        <?php foreach ($productsInCart as $product) { ?>
            initializeCart("<?= $product['id'] ?>", "<?= $product['price'] ?>", 'button-add-<?= $product['id'] ?>', document.getElementsByClassName("commands")[0]);
            initializeCart("<?= $product['id'] ?>", "<?= $product['price'] ?>", 'button-remove-<?= $product['id'] ?>', document.getElementsByClassName("commands")[0]);
            getTotalCartValue(document.getElementById("total-price"));
        <?php } ?>
    });
</script>