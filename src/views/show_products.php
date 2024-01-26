<?php
if (isset($products)) { ?>
    <div class="container">
        <?php foreach ($products as $product) { ?>
            <div class="card-products">
                <?php
                $images = $productImageManager->getImagesByProductId($product['id']);
                $foods = $productFoodManager->getAllFoodDatasOfProduct($product['id']);
                ?>
                <div class="card-header">
                    <?php if (count($images) > 1) { ?>
                        <section class="slider-wrapper">
                            <button class="slide-arrow slide-arrow-prev">
                                <i class="fa-solid fa-arrow-left carousel-arrows" id="arrow-left<?= $product['id'] ?>"></i>
                            </button>

                            <button class="slide-arrow slide-arrow-next">
                                <i class="fa-solid fa-arrow-right carousel-arrows" id="arrow-right<?= $product['id'] ?>"></i>
                            </button>

                            <ul class="slides-container" id="slides-container-<?= $product['id'] ?>">
                                <?php foreach ($images as $image) { ?>
                                    <li class="slide slide-<?= $product['id'] ?>"><img src="<?= PATH_IMAGES . $image['image'] ?>"
                                            alt="product_<?= $product['id'] ?>"></li>
                                <?php } ?>
                            </ul>
                        </section>

                    <?php } else { ?>
                        <?php if (count($images) === 0) { ?>
                            <h2>Aucune image pour ce produit</h2>
                        <?php } else { ?>
                            <img src="<?= PATH_IMAGES . $image['image'] ?>" alt="product_<?= $product['id'] ?>">
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <h3>
                        <?= $product['name'] ?>
                    </h3>
                    <p>
                        <?= $product['description'] ?>
                    </p>
                    <p>
                        <?= $product['price'] ?> €
                    </p>
                    <?php if (count($foods) > 0) { ?>
                        <p class="grey-text">Composition :</p>
                        <p>
                            <?php foreach ($foods as $food) { ?>
                                <?php
                                $totalCalories += calculateTotalCaloriesPerAliment($food);
                                $calories = calculateTotalCaloriesPerAliment($food); ?>
                                <?= $food['name'] . '-' ?>
                                <?= $food['weight'] . 'g -' ?>
                                <?= $calories . ' cal' ?> <br>
                            <?php } ?>
                            Total :
                            <?= $totalCalories . ' cal' ?>
                        </p>
                        <?php
                        $totalCalories = 0;
                        ?>
                    <?php } ?><button type="button" class="add-cart-button" id="<?= 'button-' . $product['id'] ?>">Ajouter au
                        panier</button>
                </div>
            </div>
        <?php } ?>

    </div>
<?php } ?>
<script src="<?= PATH_PRIVATE . 'scripts/carousel.js' ?>"></script>
<script src="<?= PATH_PRIVATE . 'scripts/cartManagement.js' ?>"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        <?php foreach ($products as $product) { ?>
            initializeSlider("slides-container-<?= $product['id'] ?>", "slide-<?= $product['id'] ?>", "arrow-left<?= $product['id'] ?>", "arrow-right<?= $product['id'] ?>");
            initializeCart("<?= $product['id'] ?>", <?= $product['price'] ?>, 'button-<?= $product['id'] ?>', document.getElementsByClassName("commands")[0], false);
        <?php } ?>
    });
</script>