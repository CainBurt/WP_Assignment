<?php
//creates a post when post button is pressed on create post page

if(isset($_POST["postSubmit"])){
    
    require_once 'dbconnection.script.php'; //db connection script
    require_once 'functions.script.php';    //functions file

    session_start();
    $postsUserId = $_SESSION["userid"];
    $title= sanitiseInputs($_POST["title"]);    // sanitise inputs function from /scripts/functions.scripts.php
    $body= sanitiseInputs($_POST["body"]);
    $topic= sanitiseInputs($_POST["topics"]);

    //error handlers from functions.scripts.php
    if (emptyInputPost($title, $body, $topic) !== false){
        header("location: ../createpost.php?error=emptyinput");
        exit();
    };

    post($connection, $postsUserId, $title, $body, $topic);
    mysqli_close($connection);
    exit();

}else{
    header("location: ../createpost.php");
    exit();
};
