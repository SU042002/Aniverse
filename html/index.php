<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aniverse</title>
    <link rel="stylesheet" href="../css/default.css">
    <script src="../js/slideshow.js" defer></script>
    <link rel="stylesheet" href="../css/slideshow.css">

    <!--If defer is not used, the JavaScript function will run before everything
    is loaded and this will in turn make the slideshow not work as intended.
    It will not load the first Image properly. By using defer it loads all the HTML
    and then executes the Javascript so everything works as intended-->
</head>
<body>

<?php require "header.php"; ?>

<div class="slideshow">
    <div class="slides">
        <a href="figures.php" target="_blank">
            <img src="../img/promotions/promotion 1.jpg" style="width:100%">
        </a>
    </div>

    <div class="slides">
        <a href="dvd.php" target="_blank">
            <img src="../img/promotions/promotion 2.jpg" style="width:100%">
        </a>
    </div>

    <div class="slides">
        <a href="accessories.php" target="_blank">
            <img src="../img/promotions/promotion 3.jpg" style="width:100%">
    </div>
    <!-- Next and previous buttons -->
    <div class="buttons">
        <a class="prev" onclick="plusSlides(-1)">&#8617;</a>
        <a class="next" onclick="plusSlides(1)">&#8618;</a>
    </div>
</div>

    <?php require "footer.php"; ?>

</body>
</html>