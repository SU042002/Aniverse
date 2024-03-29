<?php
session_start();
require_once "php/database_connection.php";
require_once "php/basket_functions.php";
/*starts a session in every window*/
/*this is used to start a session on every page. This is done
so that users can create an account and save what ever they are doing.
Sessions also allow us to check for admin privileges. They allow
us to use other super globals that we can use to make each user session
personal.*/
?>


<!--this connection is required to connect to the database. Any page that fetches information dynamically needs
this file so that the connection can be performed.-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aniverse</title> <!--This sets the title of the website.-->
    <link rel="stylesheet" href="css/default.css"> <!--this links to the default style sheet that is needed to style the website.
    This is used throughout the website.-->
    <script src="js/slideshow.js" defer></script>
    <!--If defer is not used, the JavaScript function will run before everything
is loaded and this will in turn make the slideshow not work as intended.
It will not load the first Image properly. By using defer it loads all the HTML
and then executes the Javascript so everything works as intended-->

    <!--all the css below is used for styling each component of the website-->
    <link rel="stylesheet" href="css/slideshow.css">
    <link rel="stylesheet" href="css/main%20footer.css">
    <link rel="stylesheet" href="css/products%20display.css">
    <link rel="stylesheet" href="css/search%20bar.css">
</head>
<body>

<!--this stores all the components of the header in a php file. This is done so the same code can be reused throughout
the website-->
<?php require "header.php"; ?>

<!--SLIDESHOW-->
<div id="container">
    <div id="main">
        <!--All the images used for the slideshow are put in separate divs so that they can be rotated through-->
        <!--They all contain their individual anchor links so that when they are pressed, they open new links-->
        <!--They also have a width of 100% so that they can stretch across the entire website-->
        <!--An external javascript file is used to controll the files-->
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

            <!-- Next and previous buttons used to control the slides -->
            <!--The prev button has a method on click that has a parameter of -1 which goes back to a previous image-->
            <!--The next button has a method on click that has a parameter of +1 which goes to the next image-->
            <div class="buttons">
                <a class="prev" onclick="plusSlides(-1)">&#8617;</a>
                <a class="next" onclick="plusSlides(1)">&#8618;</a>
            </div>
        </div>
        <!--SLIDESHOW-->

        <!--SEARCH BAR-->
        <!--This is used to search for products-->
        <form id="search" action="" method="get">
            <!--creates a search bar, the action is empty because the php code needed is in this file right below-->
            <input id="search_bar" type="text" name="search" placeholder="Search for Item">
            <input id="search_submit" type="submit" value="Search">
        </form>
        <!--this div is used to output all the products and to style them using css-->
        <div class="search_gallery">
            <!--if the used presses the search button then the information is taken from the search bar and that is
            used to search the database for products.-->
            <?php
            if (strpos($_SERVER['REQUEST_URI'], "search") !== false) {
                /*if the url contains search then this is executed, if = to true*/
                /*if the url contains a search query this is executed*/
                /*if the url does not contain a search in the url then all the products are shown using an else*/
                if (isset($_GET['search'])) {
                    $searchQuery = $_GET['search'];

                    // setting connection to the database
                    /*the sql query is stored in a variable and all the user input is searched in the database using the LIKE
                    keyword which is built into sql. This returns anything related to the word that was entered by the user*/
                    $sql = "SELECT * FROM products WHERE product_name LIKE'%$searchQuery%' or id LIKE '$searchQuery' or product_category LIKE '$searchQuery';";
                    /*this performs the query on the database, the first argument is the connection to the database and the
                    second is the actual statement to be performed*/
                    $res = mysqli_query($connectAniverse, $sql);
                    // fetches all rows
                    while ($row = mysqli_fetch_array($res))
                        /*initializes new variable and assigns a value to it*/
                        /*this helps fetch one of the rows of data and returns it as an associative array*/
                        /*the while loop means that every row will eventually be fetched until there are none left*/
                        /*this array does not only store the numeric indices but also the names, so they be targeted more easily*/ // if row is fetched while code is executed
                    {
                        ?>
                        <!--this while loop is what outputs all the products in the database. Using php statements all the
                        products are output using echo. All the products are fetched as an associative array so everything
                        can be fetched using names rather than numbers-->
                        <!--All the information fetched from the individual row from the array is output or echoed-->
                        <!--This is done for all the products that where searched for-->
                        <div class="content" id="<?php echo $row["product_name"]; ?>">
                            <!-- html and php used together so that products from the database are displayed -->
                            <!--the product name of the row is fetched and used here-->
                            <img src="<?php echo $row["product_image"]; ?>" alt="<?php echo $row["product_name"]; ?>"
                                 height="150px" class="product_img"/>
                            <!--the product image path of the row is fetched and used here-->
                            <!-- image source is fetched from the database, the location of the file is fetched and put inside the quotation marks -->
                            <h2 class="product_h2">£<?php echo $row["product_price"]; ?></h2>
                            <!-- product price is grabbed from the column -->
                            <p class="product_p"><?php echo $row["product_name"]; ?></p>
                            <!-- as well as the product name, for now I am not displaying the product description but just the information required for the display -->
                            <form id="addBasket" action="" method="get">
                                <!--hidden input field so when the user adds something to basket the product id for that
                                individual product can be used.-->
                                <input type="hidden" name="prodID" id="prodID" value="<?php echo $row["id"]; ?>">
                                <input type="hidden" name="prodQuantity" id="prodQuantity" value="1">
                                <button type="basket" class="add-button">Add Product</button>
                            </form>
                            <!-- add to basket button -->
                        </div>
                        <?php
                    }
                    ?>
            <div class="products_gallery">
                    <?php
                }
            } else {
                    // setting connection to the database
                    /*the sql query is stored in a variable and all the user input is searched in the database using the LIKE
                    keyword which is built into sql. This returns anything related to the word that was entered by the user*/
                    $sql = "SELECT * FROM products;";
                    $res = mysqli_query($connectAniverse, $sql);
                    // fetches all rows
                    while ($row = mysqli_fetch_array($res))
                        /*initializes new variable and assigns a value to it*/
                        /*this helps fetch one of the rows of data and returns it as an associative array*/
                        /*the while loop means that every row will eventually be fetched until there are none left*/
                        /*this array does not only store the numeric indices but also the names, so they be targeted more easily*/ // if row is fetched while code is executed
                    {
                        ?>
                        <!--this while loop is what outputs all the products in the database. Using php statements all the
                        products are output using echo. All the products are fetched as an associative array so everything
                        can be fetched using names rather than numbers-->
                        <!--All the information fetched from the individual row from the array is output or echoed--><!---->
                        <div class="content" id="<?php echo $row["product_name"]; ?>">
                            <!-- html and php used together so that products from the database are displayed -->
                            <!--the product name of the row is fetched and used here-->
                            <img src="<?php echo $row["product_image"]; ?>" alt="<?php echo $row["product_name"]; ?>"
                                 height="150px" class="product_img"/>
                            <!--the product image path of the row is fetched and used here-->
                            <!-- image source is fetched from the database, the location of the file is fetched and put inside the quotation marks -->
                            <h2 class="product_h2">£<?php echo $row["product_price"]; ?></h2>
                            <!-- product price is grabbed from the column -->
                            <p class="product_p"><?php echo $row["product_name"]; ?></p>
                            <!-- as well as the product name, for now I am not displaying the product description but just the information required for the display -->
                            <form id="addBasket" action="" method="get">
                                <!--hidden input field so when the user adds something to basket the product id for that
                                individual product can be used.-->
                                <input type="hidden" name="prodID" id="prodID" value="<?php echo $row["id"]; ?>">
                                <input type="hidden" name="prodQuantity" id="prodQuantity" value="1">
                                <button type="basket" class="add-button">Add Product</button>
                            </form>
                        </div>
                        <?php
                    }
                    }
                    ?>

        </div>
        </div>
    </div>
</div>
        <!--SEARCH BAR-->

        <!--PRODUCTS-->




<!--PRODUCTS-->

<?php require "footer.php"; ?>
<!--This is included in most of the pages and is the footer of the webpage, it is in a separate file because it is a
piece of code that is reused often-->

</body>
</html>