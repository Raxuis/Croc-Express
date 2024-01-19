<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Croc Express</title>
    <link rel="stylesheet" href="../src/styles/style.css">
</head>

<body>
    <main>
        <?php require '../src/controllers/' . $route . '_controller.php'; ?>
    </main>
    <footer>
        <div id="footer-container">
            <p id="copyrights">© 2024 Raphaël | Benoît CODA, Orléans. All Rights Reserved</p>
        </div>
    </footer>
</body>

</html>