<?php
if(isset($_GET["id"])){ //gets the data for the selected post. used by editpost.php to fill the form
    include_once 'dbconnection.script.php'; //db connection script
    require_once 'functions.script.php';    //error handlers functions

    session_start();
    $id = $_GET["id"];
    $userId = $_SESSION['userid'];

    if(authenticate($connection, $id, $userId) === false){                  //authenticate function in functions.scripts.php
        header("location: /wpassignment/index.php?error=invaliduser");
        exit();
    }else{
        $sql = "SELECT * FROM posts WHERE postsId = '$id';";

        $result = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $postTitle = $row['postsTitle'];
            $postBody = $row['postsBody'];
            $postTopic = $row['postsTopic'];
        };
        mysqli_close($connection);
    };

    
};

if(isset($_POST["editSubmit"])){ //updates the post after the button is pressed.

    require_once 'dbconnection.script.php'; //db connection script
    require_once 'functions.script.php';    //functions

    $updateId = $_POST["editId"];
    $updateTitle = sanitiseInputs($_POST["editTitle"]);     //sanitise inputs in functions.script.php file
    $updateBody = sanitiseInputs($_POST["editBody"]);
    $updateTopic = sanitiseInputs($_POST["editTopic"]);

    //addd error handlers
    if (emptyUpdatePost($updateId, $updateTitle, $updateBody, $updateTopic) !== false){
        header("location: ../editpost.php?id=$updateId&error=emptyinput");
        exit();
    };

    updatePost($connection, $updateId, $updateTitle, $updateBody, $updateTopic);
};