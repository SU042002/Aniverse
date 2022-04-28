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

<form class="login_form" action="../php/Signup_Script.php" method="post"> <!-- hides text in url -->

    <h1>Sign Up</h1>
    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyInputs") {
                echo "<p>You forgot to fill in all the fields!</p>";
            } else if ($_GET["error"] == "invalidUser") {
                echo "<p>There are invalid characters in your username!</p>";
        } else if (_GET["error"] == "invalidEmail") {
                echo "<p>Please enter a valid email address!</p>";
            }
        } else if ($_GET["error"] == "passwordMatch") {
                echo "<p>Your passwords do not match!</p>";
        }
    ?>

    <div class="login_fields">
        <input type="text" name="user_name" placeholder="Username" required autocomplete="off">
    </div>

    <div class="login_fields">
        <input type="email" name="email" placeholder="Email" required autocomplete="off"> <!-- takes the users email -->
    </div>

    <div class="login_fields">
        <input type="password" name="password" placeholder="Password" required autocomplete="off"> <!-- input type hides
        password -->
    </div>

    <div class="login_fields">
        <input type="password" name="password_check" placeholder="Repeat your password" required autocomplete="off">
    </div>

    <div class="login_fields">
        <select name="user_type" required>
            <option value="User">User</option>
            <option value="Admin">Admin</option>
        </select> <!-- drop down menu so that the user can put items into
      different categories -->
    </div>

    <button type="submit" name="submit" class="login_button">Signup</button> <!-- button to submit info -->
</form>



</body>