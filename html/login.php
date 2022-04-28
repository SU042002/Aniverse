<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aniverse</title>
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/login.css">
    <?php require_once "../php/database_connection.php"; ?>
</head>
<body>

<?php require "header.php"; ?>

<form class="login_form" action="" method="post">
    <h1>Login</h1>

    <div class="login_fields">
        <input type="text" name="uid" placeholder="Username" required autocomplete="off">
    </div>

    <div class="login_fields">
        <input type="password" name="pass" placeholder="Password" required autocomplete="off"> <!-- input type hides
        password -->
    </div>

    <button type="submit" class="login_button">Login</button> <!-- button to submit info -->
    <div class="bottom_text">
        <p>Don't have an account? <a href="signup.php">Sign Up</p>
    </div>

</form>

</body>