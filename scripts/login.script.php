<?php

if(isset($_POST["loginSubmit"])){

    require_once 'dbconnection.script.php'; //db connection script
    require_once 'functions.script.php';    //functions

    $userId = sanitiseInputs($_POST["name"]);               //sanitise Inputs from /scripts/functions.scripts.php file.
    $userPassword = sanitiseInputs($_POST["password"]);

    //errror handlers from /scripts/functions.script.php file
    if (emptyInputLogin($userId, $userPassword) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    };

    loginUser($connection, $userId, $userPassword);
    mysqli_close($connection);
    exit();

}else{
    header("location: ../login.php");
    exit();
};