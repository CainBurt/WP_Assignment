<?php
//register script
if(isset($_POST["registerSubmit"])){
    require_once 'dbconnection.script.php'; //db connection script
    require_once 'functions.script.php';    //error handlers functions

    $name = sanitiseInputs($_POST["name"]);
    $userId = sanitiseInputs($_POST["username"]);
    $email = sanitiseInputs($_POST["email"]);
    $userPassword = sanitiseInputs($_POST['password']);
    $confirmPassword = sanitiseInputs($_POST['confirmPassword']);

    //ERROR handlers from functions.scripts.php
    if (emptyInput($name, $userId, $email, $userPassword, $confirmPassword) !== false){
        header("location: ../register.php?error=emptyinput");
        exit();
    };

    if (invalidUsername($userId) !== false){
        header("location: ../register.php?error=invalidusername");
        exit();
    };

    if (invalidEmail($email) !== false){
        header("location: ../register.php?error=invalidemail");
        exit();
    };

    if (passwordMatch($userPassword, $confirmPassword) !== false){
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    };

    if (securePassword($userPassword) !== false){
        header("location: ../register.php?error=passwordunsecure");
        exit();
    };

    if (usernameExists($connection, $userId, $email) !== false){
        header("location: ../register.php?error=usernameoremailtaken");
        exit();
    };

    //add user into the data base
    createUser($connection, $name, $userId, $email, $userPassword);

    mysqli_close($connection);
    exit();

}else{

    header("location: ../register.php");
    exit;

};
