<?php

if (isset($_POST["submit"])) {

    $userName = $_POST["user_name"];
    $password = $_POST["password"];

    require_once "database_connection.php";
    require_once "functions.php";

    if (emptyInputsLogin($userName, $password) !== false) {
        header("location: ../login.php?error=fillAllFields");
        exit();
    }

    loginUser($connectAniverse, $userName, $password);

} else {
    header("location: ../login.php");
    exit();
}