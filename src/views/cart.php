<h3>Votre panier</h3>
<div class="container">

    <table id='table-cart'>
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
        <?php foreach ($_SESSION["cart"] as $key => $value) { ?>
            <?php
            $product = $productsManager->getOne($key);
            $productImage = $productImageManager->getImagesByProductId($key);
            ?>
            <tr>
                <td class="td-images">
                    <img src="<?= PATH_IMAGES . $productImage[0]['image'] ?>" alt="" class='cart-images'>
                </td>
                <td>
                    <?= $product['name'] ?>
                </td>
                <td>
                    <?= $product['price'] ?>
                </td>
                <td>
                    <?= $value ?>
                </td>
                <td>
                    <?= $product['price'] * $value ?>
                </td>
                <td>
                    <i class="fa-solid fa-circle-minus"></i>
                    <i class="fa-solid fa-circle-plus"></i>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Livraison</td>
            <td>0</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Tax</td>
            <td>1.00</td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="livery"> <label for="livery">Livrer cette commande pour 5€</label>
            </td>
            <td></td>
            <td></td>
            <td>Total</td>
            <td>1.00</td>
            <td>
                <button type="button" class="submit" id='pay'>Payer</button>
            </td>
        </tr>
    </table>
</div>