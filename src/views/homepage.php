<h3>Page d'accueil</h3>
<div class="container">
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
                        onclick="window.location.href='?page=show_products&category_id=<?= $category['id'] ?>'">Tous nos
                        produits<i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        <?php } ?>
    <?php endforeach; ?>
</div>