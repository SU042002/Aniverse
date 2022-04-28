<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aniverse</title>
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/signup.css">
    <?php require_once "../php/database_connection.php"; ?>
</head>
<body>

<?php require "header.php"; ?>

<form class="login_form" action="includes/SignupScript.php" method="post"> <!-- hides text in url -->

    <h1>Sign Up</h1>

    <div class="login_fields">
        <input type="text" name="uid" placeholder="Username" required autocomplete="off">
    </div>

    <div class="login_fields">
        <input type="email" name="mail" placeholder="Email" required autocomplete="off"> <!-- takes the users email -->
    </div>

    <div class="login_fields">
        <input type="password" name="pass" placeholder="Password" required autocomplete="off"> <!-- input type hides
        password -->
    </div>

    <div class="login_fields">
        <input type="password" name="passcheck" placeholder="Repeat your password" required autocomplete="off"> <!-- forces the user to
    re enter password so it can be checked for errors -->
    </div>

    <button type="submit" class="login_button">Signup</button> <!-- button to submit info -->
</form>

</body>