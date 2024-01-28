<h3>Page d'accueil</h3>
<div class="container" id='homepage-container'>
    <div class="row">
        <h4 class="row-title">Nos catégories</h4>
        <div class="row-body">
            <?php foreach ($categories as $category): ?>
                <?php if ($category['is_hidden'] === 0) { ?>
                    <div class="card">
                        <div class="card-body">
                            <h3>
                                <?= $category['name'] ?>
                            </h3>
                            <p>
                                <?= $category['description'] ?>
                            </p>
                            <button class="orange-button"
                                onclick="window.location.href='?page=show_products&category_id=<?= $category['id'] ?>'">Tous les
                                produits<i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                <?php } ?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row">
        <h4 class="row-title">Nos menus</h4>
        <div class="row-body">
            <?php foreach ($menus as $menu): ?>
                <?php if ($menu['is_hidden'] === 0) { ?>
                    <div class="card">
                        <div class="card-body">
                            <h3>
                                <?= $menu['name'] ?>
                            </h3>
                            <button class="orange-button"
                                onclick="window.location.href='?page=show_products&menu_id=<?= $menu['id'] ?>'">Tous les
                                produits<i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                <?php } ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>