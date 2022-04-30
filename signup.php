<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aniverse</title>
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/signup.css">
    <?php require_once "php/database_connection.php"; ?>
</head>
<body>

<?php require "header.php"; ?>

<form class="login_form" action="php/Signup_Script.php" method="post"> <!-- hides text in url -->

    <h1>Sign Up</h1>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyInputs") {
            echo "<p class='messages'>You forgot to fill in all the fields!</p>";
        } elseif ($_GET["error"] == "invalidUser") {
            echo "<p class='messages'>There are invalid characters in your username!</p>";
        } elseif ($_GET["error"] == "invalidEmail") {
            echo "<p class='messages'>Please enter a valid email address!</p>";
        } elseif ($_GET["error"] == "passwordsMatchInvalid") {
            echo "<p class='messages'>Your passwords do not match!</p>";
        } elseif ($_GET["error"] == "userNameExists") {
            echo "<p class='messages'>This user already exists (try using a different email or username)!</p>";
        } elseif ($_GET["error"] == "none") {
            echo "<p class='messages'>You signed up successfully!</p>";
        } elseif ($_GET["error"] == "sqlStatementFailed") {
            echo "<p class='messages'>There was an error during the signup process!</p>";
        }
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

        <select name="user_type" required>
            <option value="User">User</option>
            <option value="Admin">Admin</option>
        </select> <!-- drop down menu so that the user can put items into
      different categories -->

    <button type="submit" name="submit" class="login_button">Signup</button> <!-- button to submit info -->
</form>


</body>