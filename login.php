<?php
session_start();

require_once "php/basket functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aniverse</title>
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/login.css">
    <?php require_once "php/database_connection.php"; ?>
</head>
<body>

<?php require "header.php"; ?>

<form class="login_form" action="php/login_script.php" method="post">
    <!--When this form is submitted the data is sent to the login script-->
    <h1>Login</h1>
    <!--this php code makes sure the user knows what the error or what they did wrong if the login fails-->
    <!--the superglobal is used to check the url and depending on the header, the appropriate message is displayed-->
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "fillAllFields") {
            echo "<p class='messages'>You forgot to fill in all the fields!</p>";
        } elseif ($_GET["error"] == "invalidLogin") {
            echo "<p class='messages'>That user does not exist.</p>";
        } elseif ($_GET["error"] == "wrongPassword") {
            echo "<p class='messages'>You entered the wrong password.</p>";
        }
    }
    ?>

    <div class="login_fields">
        <input type="text" name="user_name" placeholder="Username or Email" required autocomplete="off">
    </div>

    <div class="login_fields">
        <input type="password" name="password" placeholder="Password" required autocomplete="off"> <!-- input type hides
        password -->
    </div>

    <button type="submit" name="submit" class="login_button">Login</button> <!-- button to submit info -->
    <div class="bottom_text">
        <p>Don't have an account? <a href="signup.php">Sign Up</p>
    </div>

</form>

</body>