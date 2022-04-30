<?php

if (isset($_POST["submit"])) {

    $userName = $_POST["user_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordCheck = $_POST["password_check"];
    $userType = $_POST["user_type"];

    require_once "database_connection.php";
    require_once "functions.php";

    if (emptyInputs($userName, $email, $password, $passwordCheck, $userType) !== false) {
        header("location: ../signup.php?error=emptyFields");
        exit();
    }

    if (invalidUser($userName) !== false) {
        header("location: ../signup.php?error=invalidUser");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }

    if (passwordMatch($password, $passwordCheck) !== false) {
        header("location: ../signup.php?error=passwordsMatchInvalid");
        exit();
    }

    if (userNameExists($connectAniverse, $userName, $email, $userType) !== false) {
        header("location: ../signup.php?error=userNameExists");
        exit();
    }

    createUser($connectAniverse, $userName, $email, $password, $userType);

} else {
    header("location: ../signup.php");
    exit();
}