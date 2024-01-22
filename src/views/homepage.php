<h3>Page d'accueil</h3>
<div class="container">
    <?php foreach ($categories as $category): ?>
        <div class="card">
            <div class="card-header">
                <img src="./assets/burgers/burger_1.jpg" alt="burger_1">
            </div>
            <div class="card-body">
                <h3>
                    <?= $category['name'] ?>
                </h3>
                <p>
                    <?= $category['description'] ?>
                </p>
                <button class="other-products">Tous nos produits<i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<script src="../src/scripts/carousel.js"></script>