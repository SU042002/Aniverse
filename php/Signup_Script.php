<?php

if (isset($_POST["submit"])) {
    /*if the user presses the signup button*/

    $userName = $_POST["user_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordCheck = $_POST["password_check"];
    $userType = $_POST["user_type"];
    /*all the variables are stored for ease of access by the functions*/
    /*these variables are assigned values via super global post that the user submitted in the form*/

    require_once "database_connection.php";
    /*the database connection is required for the signup process*/
    require_once "functions.php";
    /*all the functions that are used below are stored in this file*/

    /*these functions will return true or false*/

    /*if these functions return false then no error is present, on the other hand if they return anything else, there is
    an error*/

    /*if anything besides false is returned then an error has occurred*/

    /*all the functions have an exit so that if an error does occur, the script is terminated*/

    if (emptyInputs($userName, $email, $password, $passwordCheck, $userType) !== false) {
        /*!== is done so that if the functions for whatever reason does return anything other than true or false, it will
        still fail.*/
        header("location: ../signup.php?error=emptyFields");
        exit();
    }
    /*this checks if any of the fields are empty*/

    if (invalidUser($userName) !== false) {
        header("location: ../signup.php?error=invalidUser");
        exit();
    }
    /*this function makes sure no invalid characters are used during the signup process*/

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    /*function to check the validity of the email address used*/

    if (passwordMatch($password, $passwordCheck) !== false) {
        header("location: ../signup.php?error=passwordsMatchInvalid");
        exit();
    }
    /*checks if the password was entered correctly two times, this helps makes the user entered whatever password they
    had in mind correctly*/

    if (userNameExists($connectAniverse, $userName, $email, $userType) !== false) {
        header("location: ../signup.php?error=userNameExists");
        exit();
    }
    /*this checks if the username already exists in the database*/

    createUser($connectAniverse, $userName, $email, $password, $userType);
    /*if all the functions are passed and no error has occurred the user is created using a function*/

} else {
    header("location: ../signup.php");
    /*if the page is accessed via the url they are redirected*/
    exit();
}
