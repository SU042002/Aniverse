<?php
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

function userNameExists($connectAniverse, $userName, $email) {
    $sql = "SELECT * FROM users WHERE userName = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($connectAniverse);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../html/signup.php?error=sqlStatementFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $userName, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($connectAniverse, $userName, $email, $password, $userType) {
    $sql = "INSERT INTO users (userName, userEmail, userPassword, userType) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connectAniverse);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../html/signup.php?error=sqlStatementFailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $userName, $email, $hashedPassword, $userType);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../html/signup.php?error=none");
    exit();
}
