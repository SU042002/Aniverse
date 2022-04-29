<?php
    session_start();
?>

<header>
    <div class="navigation_container">
        <div class="navigation">

            <?php
            if (isset($_SESSION["userType"]) == "Admin") {
                echo '<a class="nav" href="admin.php">Admin
                      <img src="../img/icons/basic_gear.png" class="home">
                      </a>';
                echo '<a class="nav" href="../php/logout.php">Logout</a>';
            } elseif (isset($_SESSION["userType"]) == "User") {
                echo '<a class="nav" href="../php/logout.php">Logout</a>';
            } else {
                echo '<a class="nav" href="login.php">Login
                      <img src="../img/icons/login.png" class="home">
                      </a>';
            }
            ?>

            <a class="nav" href="#">Basket
                <img src="../img/icons/cart%20(2).png" class="home">
            </a>

            <a class="nav" href="help.php">Help
                <img src="../img/icons/help.png" class="home">
            </a>

            <a class="nav" href="index.php">Home
                <img src="../img/icons/home.png" class="home">
            </a>

            <a href="index.php">
                <img src="../img/logo%20aniverse.png" class="logo" width=165px alt="Logo"/>
            </a>
        </div>

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

