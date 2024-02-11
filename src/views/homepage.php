<h3>Page d'accueil</h3>
<div id='homepage-container'>
    <div class="row">
        <h4 class="row-title">Nos catégories</h4>
        <div class="row-body">
            <?php foreach ($categories as $category) : ?>
                <?php if ($category['is_hidden'] === 0) { ?>
                    <div class="card">
                        <div class="card-header"><img src="<?= PATH_IMAGES . $category['image'] ?>" alt="category image"></div>
                        <div class="card-body">

                            <h3>
                                <?= $category['name'] ?>
                            </h3>
                            <p>
                                <?= $category['description'] ?>
                            </p>
                            <button class="orange-button" onclick="window.location.href='?page=show_products&category_id=<?= $category['id'] ?>'">
                                Tous les
                                produits<i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                <?php } ?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row" style="padding-bottom: 5vh;">
        <h4 class="row-title">Nos menus</h4>
        <div class="row-body">
            <?php foreach ($menus as $menu) : ?>
                <?php if ($menu['is_hidden'] === 0) { ?>
                    <div class="card">
                        <?php
                        $menuProducts = $menuManager->getAllProductsFromMenu($menu['id']); ?>
                        <div class="card-body">
                            <h3>
                                <?= $menu['name'] ?>
                            </h3>
                            <?php
                            $i = 0;
                            foreach ($menuProducts as $menuProduct) { ?>
                                <?php /* $productImage = $productImageManager->getImagesByProductId($menuProduct); */ ?>
                                <?php echo ('Produit  ' . $i + 1 . ' : ' . $menuProduct['name'] . '<br>');
                                $i++; ?>

                            <?php } ?>
                            <button class="orange-button" onclick="window.location.href='?page=show_products&menu_id=<?= $menu['id'] ?>'">Tous
                                les
                                produits<i class="fa-solid fa-arrow-right"></i></button>
                            <button type="button" class="orange-button" id="<?= 'button-' . $menu['id'] ?>" data-action="add" data-type="menu">Ajouter au panier<i class="fa-solid fa-cart-plus"></i></button>
                        </div>
                    </div>
                <?php } ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script src="<?= PATH_PRIVATE . 'scripts/cartManagement.js' ?>"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php if (!empty($menus)) {
            foreach ($menus as $menu) {
                if (!$menu["is_hidden"]) { ?>
                    initializeCart("<?= $menu['id'] ?>", <?= $menu['price'] ?>, 'button-<?= $menu['id'] ?>', false);
        <?php }
            }
        } ?>
    });
</script>