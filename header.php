<?php
    require_once "php/basket_functions.php";
?>
<header>
    <div class="navigation_container">
        <div class="navigation">

            <!--this code is used to change the links based on what user type is present.
            For example, if the admin session is started then the user can see the admin section.
            If the user is logged in this is shows so that the user can log out.-->
            <?php
            if (isset($_SESSION["userType"])) {
                if ($_SESSION["userType"] == "Admin") {
                    echo '<a class="nav" href="admin.php">Admin
                          <img src="img/icons/basic_gear.png" class="home">
                          </a>';
                    echo '<a class="nav" href="php/logout.php">Logout</a>';
                } else if ($_SESSION["userType"] == "User") {
                    echo '<a class="nav" href="php/logout.php">Logout</a>';
                }
            } else {
                echo '<a class="nav" href="login.php">Login
                          <img src="img/icons/login.png" class="home">
                          </a>';
            }
            ?>

            <!--The other links include basics like baskets and homepages etc...-->

            <a class="nav" href="basket.php">Basket <?php echo array_sum($_SESSION["basket"])?>
                <!--this is used to add an image to the left of each link-->
                <img src="img/icons/cart%20(2).png" class="home">
            </a>

            <a class="nav" href="help.php">Help
                <img src="img/icons/help.png" class="home">
            </a>

            <a class="nav" href="index.php">Home
                <img src="img/icons/home.png" class="home">
            </a>

            <a href="index.php">
                <img src="img/logo%20aniverse.png" class="logo" width=165px alt="Logo"/>
            </a>
        </div>

        <!--This is the second header below the main header, this allows the user to browse the subsections
        of the website-->
        <div class="second_navigation">
            <ul id="second_nav">
                <li><a href="dvd.php">DVD</a></li>
                <li><a href="manga.php">Manga</a></li>
                <li><a href="figures.php">Figures</a></li>
                <li><a href="games.php">Games</a></li>
                <li><a href="accessories.php">Accessories</a></li>
            </ul>
        </div>
</header>

