<?php if (isset($products)) { ?>
    <div class="container">
        <?php foreach ($products as $product) { ?>
            <div class="card">
                <?php $images = $productImageManager->getImagesByProductId($product['id']); ?>
                <div class="card-header">
                    <section class="slider-wrapper">
                        <button class="slide-arrow slide-arrow-prev">
                            <i class="fa-solid fa-arrow-left first-carousel-arrows"></i>
                        </button>

                        <button class="slide-arrow slide-arrow-next">
                            <i class="fa-solid fa-arrow-right first-carousel-arrows"></i>

                        </button>

                        <ul class="slides-container" id="slides-container1">
                            <?php foreach ($images as $image) { ?>

                                <li class="slide slideFirst"><img src="<?= $image['image'] ?>" alt="pizza_<?= $image['id'] ?>">
                                </li>
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
        <?php }
} ?>
</div>
<script src="../src/scripts/carousel.js"></script>