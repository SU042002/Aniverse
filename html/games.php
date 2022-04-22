<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aniverse</title>
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/banner.css">
    <link rel="stylesheet" href="../css/main%20footer.css">
    <link rel="stylesheet" href="../css/products%20display.css">
    <?php require_once "../php/database_connection.php"; ?>

</head>
<body>

<?php require "header.php"; ?>

<div id="container">
    <div id="main">
        <div class="banner" id="games">
            <h1>Games</h1>
            <p>Stop playing Genshin Impact.</p>
        </div>

        <!--PRODUCTS-->
        <div class="products_gallery">
            <?php
            // setting connection to the database
            $sql = "SELECT * FROM products WHERE product_category = 'Games';";
            $res = mysqli_query($connectAniverse, $sql);
            // fetches all rows
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