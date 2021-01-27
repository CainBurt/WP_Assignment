<?php

if(isset($_GET["id"])){ //seting the id for confirm delete.php to use

    session_start();
    $id = $_GET["id"];
    $userId = $_SESSION['userid'];

    require_once 'dbconnection.script.php'; //db connection script
    require_once 'functions.script.php';    //error handlers functions

    if(authenticate($connection, $id, $userId) === false){                  //authenticate function in /scripts/functions.scripts.php
        header("location: /wpassignment/index.php?error=invaliduser");
        exit();
    };
};

if(isset($_POST["deleteSubmit"])){ //if delete button is pressed the post will be deleted.

    require_once 'dbconnection.script.php'; //db connection script
    require_once 'functions.script.php';    //error handlers functions
    
    $deleteId = $_POST["deleteId"];

    deletePost($connection, $deleteId);
    mysqli_close($connection);
    exit();
};