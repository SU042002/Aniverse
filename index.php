<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aniverse</title>
    <link rel="stylesheet" href="css/default.css">
    <script src="js/slideshow.js" defer></script>
    <!--If defer is not used, the JavaScript function will run before everything
is loaded and this will in turn make the slideshow not work as intended.
It will not load the first Image properly. By using defer it loads all the HTML
and then executes the Javascript so everything works as intended-->
    <link rel="stylesheet" href="css/slideshow.css">
    <link rel="stylesheet" href="css/main%20footer.css">
    <link rel="stylesheet" href="css/products%20display.css">
    <link rel="stylesheet" href="css/search%20bar.css">
    <?php require_once "php/database_connection.php"; ?>
</head>
<body>

<?php require "header.php"; ?>

<!--SLIDESHOW-->
<div id="container">
    <div id="main">
        <div class="slideshow">
            <div class="slides">
                <a href="figures.php" target="_blank">
                    <img src="img/promotions/promotion%201.jpg" style="width:100%">
                </a>
            </div>

            <div class="slides">
                <a href="dvd.php" target="_blank">
                    <img src="img/promotions/promotion%202.jpg" style="width:100%">
                </a>
            </div>

            <div class="slides">
                <a href="accessories.php" target="_blank">
                    <img src="img/promotions/promotion%203.jpg" style="width:100%">
            </div>

            <div class="slides">
                <a href="games.php" target="_blank">
                    <img src="img/promotions/promotion%204.jpg" style="width:100%">
            </div>

            <div class="slides">
                <a href="manga.php" target="_blank">
                    <img src="img/promotions/promotion%205.jpg" style="width:100%">
            </div>
            <!-- Next and previous buttons -->
            <div class="buttons">
                <a class="prev" onclick="plusSlides(-1)">&#8617;</a>
                <a class="next" onclick="plusSlides(1)">&#8618;</a>
            </div>
        </div>
        <!--SLIDESHOW-->

        <!--SEARCH BAR-->
        <form id="search" action="" method="get">
            <input id="search_bar" type="text" name="search" placeholder="Search for Item">
            <input id="search_submit" type="submit" value="Search">
        </form>

        <div class="search_gallery">
        <?php
        if(isset($_GET['search'])) {
            $searchQuery = $_GET['search'];

            // setting connection to the database
            $sql = "SELECT * FROM products WHERE product_name LIKE'%$searchQuery%' or id LIKE '$searchQuery' or product_category LIKE '$searchQuery';";
            $res = mysqli_query($connectAniverse, $sql);
            // fetches all rows
            while ($row = mysqli_fetch_array($res)) // if row is fetched while code is executed
            {
                ?>
                        <div class="content" id="<?php echo $row["product_name"]; ?>">
                            <!-- html and php used together so that products from the data base are displayed -->
                            <img src="<?php echo $row["product_image"]; ?>" alt="<?php echo $row["product_name"]; ?>"
                                 height="150px" class="product_img"/>
                            <!-- image source is fetched from the database, the location of the file is fetched and put inside the quotation marks -->
                            <h2 class="product_h2">£<?php echo $row["product_price"]; ?></h2>
                            <!-- product price is grabbed from the column -->
                            <p class="product_p"><?php echo $row["product_name"]; ?></p>
                            <!-- as well as the product name, for now I am not displaying the product description but just the information required for the display -->
                            <button type="submit" class="add-button" name="submission">Add Product</button>
                            <!-- add to basket button -->
                        </div>
                <?php
            }
            ?>
            <?php
            }
        ?>
        </div>
        <!--SEARCH BAR-->

        <!--PRODUCTS-->
        <div class="products_gallery">
            <?php
            // setting connection to the database
            $sql = "SELECT * FROM products;";
            $res = mysqli_query($connectAniverse, $sql);
            // fetches all rows
            while ($row = mysqli_fetch_array($res)) // if row is fetched while code is executed
            {
                ?>
                <div class="content" id="<?php echo $row["product_name"]; ?>">
                    <!-- html and php used together so that products from the data base are displayed -->
                    <img src="<?php echo $row["product_image"]; ?>" alt="<?php echo $row["product_name"]; ?>"
                         height="150px" class="product_img"/>
                    <!-- image source is fetched from the database, the location of the file is fetched and put inside the quotation marks -->
                    <h2 class="product_h2">£<?php echo $row["product_price"]; ?></h2>
                    <!-- product price is grabbed from the column -->
                    <p class="product_p"><?php echo $row["product_name"]; ?></p>
                    <!-- as well as the product name, for now I am not displaying the product description but just the information required for the display -->
                    <button type="submit" class="add-button" name="submission">Add Product</button>
                    <!-- add to basket button -->
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<!--PRODUCTS-->

<?php require "footer.php"; ?>

</body>
</html>