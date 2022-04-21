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
    <?php require_once "../php/database_connection.php"; ?>
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


<?php
// setting connection to the database
$sql = "SELECT * FROM products;";
$res=mysqli_query($connectAniverse, $sql);
// fetches all rows
while($row=mysqli_fetch_array($res))
// if row is fetched while code is executed
{
?>

    <?php require "footer.php"; ?>

<div class="product-grid" id="<?php echo $row["product_name"]; ?>">
    <!-- html and php used together so that products from the data base are displayed -->
    <img src="<?php echo $row["product_image"]; ?>" alt="" width=10% height=10% class="product-img" />
    <!-- image source is fetched from the database, the location of the file is fetched and put inside the quotation marks -->
    <h2 class="product-h2">£<?php echo $row["product_price"]; ?></h2>
    <!-- product price is grabbed from the column -->
    <p class="product-p"><?php echo $row["product_name"]; ?></p>
    <!-- as well as the product name, for now I am not displaying the product description but just the information required for the display -->
</div>
<?php
}
?>

</body>
</html>