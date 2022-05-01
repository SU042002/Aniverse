<?php
/*These are all functions used by the login and logout system.*/

/*This function checks if there are any empty fields and if anything needs to be filled. It returns a variable called
return depending on if the fields are empty or not. If anything is empty, it returns as true and makes the user fill in
information again*/
function emptyInputs($userName, $email, $password, $passwordCheck, $userType) {
    $result;
    if (empty($userName) || empty($email) || empty($password) || empty($passwordCheck) || empty($userType)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

/*this makes sure that the user is not using any invalid characters to sign up to the website using preg match.
it will return a result variable true if the user uses any invalid characters*/
function invalidUser($userName) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

/*this functions uses a builtin php function to check if the email that the user entered is a valid email*/
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

/*this function takes in two variables called password and password check from the two input fields from the sign up
form. The two parameters are checked to confirm if the user correctly entered the passwords two times. This helps the user
make sure they entered the correct password that they want to use. If the passwords do not match result returns as true,
thus failing the check.*/
function passwordMatch($password, $passwordCheck) {
    $result;
    if ($password !== $passwordCheck) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

/*This function checks for if the username already exists in the database using a sql statement and initializing it
against the database. If the sql statement returns and does find something then this test will fail.*/
function userNameExists($connectAniverse, $userName, $email) {
    /*the sql statement uses placeholders for the username or for the email. If any of them are in the database then
    the test fails.*/
    /*the placeholders are filled in later by the user submitted username or email*/
    $sql = "SELECT * FROM users WHERE userName = ? OR userEmail = ?;";
    /*this is used to initialize the statement that is being sent to the database.*/
    $stmt = mysqli_stmt_init($connectAniverse);
    /*the sql statement is prepared using the statement below, this takes in two parameters. the $sql is tied to the
    prepared statement to prevent sql injections*/

    /*if the statement fails then this will run and return an error.*/
    /*this will run the sql statement inside the database to check for any errors, if there are any then this will run*/
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=sqlStatementFailed");
        exit();
    }

    /*this is also used by the login function or loginUser function*/

    /*If nothing is wrong, this is then used to bind the user data to the sql statement. this takes in two string
    of username and email*/
    /*the function binds the parameters to the prepared statement*/
    mysqli_stmt_bind_param($stmt, "ss", $userName, $email);
    /*then the statement is executed in the database*/
    mysqli_stmt_execute($stmt);

    /*the result that is then fetched from the $stmt and stored in a variable called $resultdata*/
    $resultData = mysqli_stmt_get_result($stmt);

    /*this is used by the login, everything is returned as an associative array meaning that the loginFunction can
    reference any column like the password and compare it with the hashed password to check if the user entered the
    correct password.*/
    /*if data is returned from the database then this will be true*/
    if($row = mysqli_fetch_assoc($resultData)) {
        /*this returns the row of data as an associative array that can be used by other functions like the login.*/
        /*if the user does exist, this row is returned and now can be used by the login function*/
        return $row;
    } else {
        /*if the $row is false then the user does not exist in the database and the signup can proceed as planned*/
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


/*This is used to create the user in the database*/
/*this takes in values from all the fields, it also connects to the database*/
function createUser($connectAniverse, $userName, $email, $password, $userType) {
    /*prepared statements are used here again*/
    /*data is inserted into the database*/

    $sql = "INSERT INTO users (userName, userEmail, userPassword, userType) VALUES (?, ?, ?, ?);";
    /*initializes the prepared statement*/
    $stmt = mysqli_stmt_init($connectAniverse);

    /*if the initialization fails then an error is presented*/
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=sqlStatementFailed");
        exit();
    }

    /*the password is also hashed before its inserted into the database*/
    /*this can be un-hashed later using a built in php method*/
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    /*if nothing is wrong all the variables are user parameters are bound to the sql statement*/
    mysqli_stmt_bind_param($stmt, "ssss", $userName, $email, $hashedPassword, $userType);
    /*once this is done, the statement is executed*/
    mysqli_stmt_execute($stmt);
    /*the prepared statement is then closed*/
    mysqli_stmt_close($stmt);
    /*the user is has then successfully signed up to the website*/
    header("location: ../signup.php?error=none");
    exit();
}

/*this checks if any of the inputs are empty*/
function emptyInputsLogin($userName, $password) {
    $result;
    if (empty($userName) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

/*this function is used to login the user*/
function loginUser($connectAniverse, $userName, $password) {
    /*the method above is used to check if the user exists*/
    /*if they do this is returned as true*/
    $userExists = userNameExists($connectAniverse, $userName, $userName);

    /*if the user does not exist in the database then the login will be invalid*/
    if ($userExists === false) {
        header("location: ../login.php?error=invalidLogin");
        exit();
    }

    /*the hashed password is then checked with the one that the user submitted*/
    $passwordHash = $userExists["userPassword"];
    $passwordCheck = password_verify($password, $passwordHash);

    /*if the hashed password is then checked with the one by the user, and it is incorrect then an error is returned*/
    if ($passwordCheck === false) {
        header("location: ../login.php?error=wrongPassword");
        exit();
    } elseif ($passwordCheck === true) {
        /*if the password is correct, a session is started for that user and user type depending on if they are an admin
        or not.*/
        session_start();
        $_SESSION["userName"] = $userExists["userName"];
        $_SESSION["userType"] = $userExists["userType"];

        header("location: ../index.php");
        exit();
    }


}
