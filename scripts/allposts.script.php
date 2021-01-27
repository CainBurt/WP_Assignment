<?php
// DISPLAYS ALL POSTS ON THE INDEX.HTML PAGE, SELECTS POSTS BY CATEGORTY AND SEARCHING.

require_once 'dbconnection.script.php'; //db connection script
require_once 'functions.script.php';    //functions


if(isset($_GET["topic"])){
    //only return if topic is computing
    if($_GET["topic"] == "computing"){
        $sql = "SELECT posts.postsId, posts.postsTitle, users.usersUid, posts.postsDate, posts.postsBody, posts.postsTopic FROM posts INNER JOIN users ON posts.usersId = users.usersId WHERE posts.postsTopic='Computing' ORDER BY posts.postsDate DESC;";
    }
    //only return if topic is information technology
    else if($_GET["topic"] == "information"){
        $sql = "SELECT posts.postsId, posts.postsTitle, users.usersUid, posts.postsDate, posts.postsBody, posts.postsTopic FROM posts INNER JOIN users ON posts.usersId = users.usersId WHERE posts.postsTopic='Information Technology' ORDER BY posts.postsDate DESC;";
    }
    //only return if topic is software engineering
    else if($_GET["topic"] == "software"){
        $sql = "SELECT posts.postsId, posts.postsTitle, users.usersUid, posts.postsDate, posts.postsBody, posts.postsTopic FROM posts INNER JOIN users ON posts.usersId = users.usersId WHERE posts.postsTopic='Software Engineering' ORDER BY posts.postsDate DESC;";
    }
    //only return if topic is cyber security
    else if($_GET["topic"] == "cybersecurity"){
        $sql = "SELECT posts.postsId, posts.postsTitle, users.usersUid, posts.postsDate, posts.postsBody, posts.postsTopic FROM posts INNER JOIN users ON posts.usersId = users.usersId WHERE posts.postsTopic='Cyber Security' ORDER BY posts.postsDate DESC;";
    }
    //only return if topic is other
    else if($_GET["topic"] == "other"){
        $sql = "SELECT posts.postsId, posts.postsTitle, users.usersUid, posts.postsDate, posts.postsBody, posts.postsTopic FROM posts INNER JOIN users ON posts.usersId = users.usersId WHERE posts.postsTopic='other' ORDER BY posts.postsDate DESC;";
    }

}elseif(isset($_GET["search"])){

    $search = sanitiseInputs($_GET["search"]);

    //searches body or title for what the user searches.
    $sql = "SELECT * FROM posts INNER JOIN users ON posts.usersId = users.usersId WHERE postsTitle LIKE '%$search%' OR postsBody LIKE '%$search%';";

}else{
    //if all posts are selected
    $sql = "SELECT posts.postsId, posts.postsTitle, users.usersUid, posts.postsDate, posts.postsBody, posts.postsTopic FROM posts INNER JOIN users ON posts.usersId = users.usersId ORDER BY posts.postsDate DESC;";
}

$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='form-horizontal p-3 mb-2 bg-light text-dark'>";
    echo "<h3><a href='post.php?id=".$row["postsId"]."'>".$row["postsTitle"]."</a></h3>";
    echo "<small><b>Author: </b>".$row["usersUid"]."    "."</small><br>";
    echo "<small><b>Date Posted: </b>".$row["postsDate"]."</small><br>";
    echo "<small><b>Topic: </b>".$row["postsTopic"]."</small>";
    echo "</div>";
}

mysqli_close($connection);