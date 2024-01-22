<?php ini_set('display_errors', 1);
if (isset($products)) { ?>
    <div class="container">
        <?php foreach ($products as $product) { ?>
            <div class="card">
                <?php $images = $productImageManager->getImagesByProductId($product['id']); ?>
                <div class="card-header">
                    <section class="slider-wrapper">
                        <button class="slide-arrow slide-arrow-prev">
                            <i class="fa-solid fa-arrow-left first-carousel-arrows" id="arrow-left<?= $product['id'] ?>"></i>
                        </button>

                        <button class="slide-arrow slide-arrow-next">
                            <i class="fa-solid fa-arrow-right first-carousel-arrows" id="arrow-right<?= $product['id'] ?>"></i>
                        </button>

                        <ul class="slides-container" id="slides-container-<?= $product['id'] ?>">
                            <?php foreach ($images as $image) { ?>
                                <li class="slide slide-<?= $product['id'] ?>"><img src="<?= $image['image'] ?>"
                                        alt="pizza_<?= $image['id'] ?>"></li>
                            <?php } ?>
                        </ul>
                    </section>
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
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>
<script src="../src/scripts/carousel.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        <?php foreach ($products as $product) { ?>
            initializeSlider("slides-container-<?= $product['id'] ?>", "slide-<?= $product['id'] ?>", "arrow-left<?= $product['id'] ?>", "arrow-right<?= $product['id'] ?>");
        <?php } ?>
    });
</script>