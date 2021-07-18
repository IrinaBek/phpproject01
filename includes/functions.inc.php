<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdConfirm) {
    $result = 0;

    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdConfirm)) {
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}


function invalidUid($username) {
    $result = 0;

    if (!preg_match("/^[a-zA-Z0-9]*$/",$username) ) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}


function invalidEmail($email) {
    $result = 0;

    if (!filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}


function pwdMatch($pwd, $pwdConfirm) {

    $result = 0;

    if ($pwd !== $pwdConfirm) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}


function uidExists($conn, $username) {
    $sql  = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $username, $username);
    
    mysqli_stmt_execute($stmt);

    
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd){
   
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header("location: ../login.php?signup=success");
    exit();

}

function  emptyInputLogin($username,$pwd) {
    $result = 0;
    if (empty($username) ||empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn,$username,$pwd) {
    $uidExists = uidExists($conn, $username);

    if($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true ) {
        session_start();
        $_SESSION["userid"] = $uidExists["userId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php?error=none");
        exit();
    }

}