<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aniverse</title>
    <!--all the css below is used for styling each component of the website-->
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/main%20footer.css">
    <link rel="stylesheet" href="css/products%20display.css">
    <!--this connection is required to connect to the database. Any page that fetches information dynamically needs
this file so that the connection can be performed.-->
    <?php require_once "php/database_connection.php"; ?>

</head>
<body>
<!--this stores all the components of the header in a php file. This is done so the same code can be reused throughout
the website-->
<?php require "header.php"; ?>
<div id="container">
    <div id="main">
        <div class="banner" id="accessories">
            <h1>Accessories</h1>
            <p>The best anime accessories!</p>
        </div>

        <!--PRODUCTS-->
        <div class="products_gallery">
            <!--This div is used to find all the products in the database with the category that is specified by the
            webpage. The sql statement is used to fetch products where the category is equal to the theme of the page.-->
            <?php
            // setting connection to the database
            $sql = "SELECT * FROM products WHERE product_category = 'Accessories';";
            $res = mysqli_query($connectAniverse, $sql);
            // fetches all rows
            /*a similar process to what was done in the index page is performed here, the only thing that has changed is
            the sql statement so that the appropriate information is fetched*/
            while ($row = mysqli_fetch_array($res)) // if row is fetched while code is executed
            {
                ?>
                <div class="content" id="<?php echo $row["product_name"]; ?>">
                    <!-- html and php used together so that products from the database are displayed -->
                    <img src="<?php echo $row["product_image"]; ?>" alt="<?php echo $row["product_name"]; ?>" height="150px" class="product-img"/>
                    <!-- image source is fetched from the database, the location of the file is fetched and put inside the quotation marks -->
                    <h2 class="product-h2">£<?php echo $row["product_price"]; ?></h2>
                    <!-- product price is grabbed from the column -->
                    <p class="product-p"><?php echo $row["product_name"]; ?></p>
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
    </div>
</div>
<!--This is included in most of the pages and is the footer of the webpage, it is in a separate file because it is a
piece of code that is reused often-->
<?php require "footer.php"; ?>

</body>
</html>