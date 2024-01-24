<?php
$productsManager = new ProductManager($bdd, 'products');
$productImageManager = new ProductImageManager($bdd, 'product_image');


require PATH_VIEWS . "cart.php";
