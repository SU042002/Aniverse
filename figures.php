<!--this connection is required to connect to the database. Any page that fetches information dynamically needs
this file so that the connection can be performed.-->
<?php require_once "php/database_connection.php"; ?>

<?php
/*starts a session in every window*/
session_start();


/*this is used to start a session on every page. This is done
so that users can create an account and save what ever they are doing.
Sessions also allow us to check for admin privileges. They allow
us to use other super globals that we can use to make each user session
personal.*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aniverse</title>
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/main%20footer.css">
    <link rel="stylesheet" href="css/products%20display.css">
    <?php require_once "php/database_connection.php"; ?>

</head>
<body>

<?php require "header.php"; ?>

<div id="container">
    <div id="main">
        <div class="banner" id="figures">
            <h1>Figures</h1>
            <p><q>This is the best place to buy figures!</q> - said no one... ever...</p>
        </div>

        <!--PRODUCTS-->
        <div class="products_gallery">
            <!--This div is used to find all the products in the database with the category that is specified by the
            webpage. The sql statement is used to fetch products where the category is equal to the theme of the page.-->
            <?php
            // setting connection to the database
            $sql = "SELECT * FROM products WHERE product_category = 'Figures';";
            $res = mysqli_query($connectAniverse, $sql);
            // fetches all rows
            /*a similar process to what was done in the index page is performed here, the only thing that has changed is
            the sql statement so that the appropriate information is fetched*/
            while ($row = mysqli_fetch_array($res)) // if row is fetched while code is executed
            {
                ?>
                <div class="content" id="<?php echo $row["product_name"]; ?>">
                    <!-- html and php used together so that products from the data base are displayed -->
                    <img src="<?php echo $row["product_image"]; ?>" alt="<?php echo $row["product_name"]; ?>" height="150px" class="product-img"/>
                    <!-- image source is fetched from the database, the location of the file is fetched and put inside the quotation marks -->
                    <h2 class="product-h2">£<?php echo $row["product_price"]; ?></h2>
                    <!-- product price is grabbed from the column -->
                    <p class="product-p"><?php echo $row["product_name"]; ?></p>
                    <!-- as well as the product name, for now I am not displaying the product description but just the information required for the display -->
                    <form id="addBasket" action="" method="get">
                        <!--hidden input field so when the user adds something to basket the product id for that
                        individual product can be used.-->
                        <input type="hidden" name="prodQuantity" id="prodQuantity" value="1">
                        <input type="hidden" name="prodID" id="prodID" value="<?php echo $row["id"]; ?>">
                        <button type="basket" class="add-button">Add Product</button>
                    </form>
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

<?php require "footer.php"; ?>

</body>
</html>