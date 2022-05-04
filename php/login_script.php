<?php
/*if the user submit button is pressed*/
if (isset($_POST["submit"])) {

    /*this stores the information the user entered into variables for ease of use later*/
    $userName = $_POST["user_name"];
    $password = $_POST["password"];

    /*all of these functions are required by the website, so they are initiated*/
    require_once "database_connection.php";
    /*the database connection is needed so the user information can be verified*/
    require_once "functions.php";
    /*these functions are for all the user signup or login functions. This helps to prevent errors and other functions
    needed for the user to login. For example, if the user logins in, the username/email and password needs to be verified
    with the data that is actually stored in the database table entitled "users". If confirmed to be true, another
    function will log the user in and actually start the session that is needed for that individual user.*/

    if (emptyInputsLogin($userName, $password) !== false) {
        /*this is a function that we created in the functions.php. This makes sure no field is empty. We also can do this
        via html "required" but this just adds an extra layer of security.*/
        header("location: ../login.php?error=fillAllFields");
        /*this is used to redirect the user and to tell them the error. It also allows to use the url and display an
        appropriate message so that the user knows what went wrong.*/
        exit();
        /*this is used to terminate the script so nothing else is carried out. */
    }

    loginUser($connectAniverse, $userName, $password);
    /*this method is used to sign in the user using the method in functions*/

} else {
    header("location: ../login.php");
    /*this is used so if the user accessed the script using the url they are redirected again. The user should only
    be able to access this php script via the submit button, not the url*/
    exit();
    /*the php script is terminated*/
}