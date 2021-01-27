<?php //script to get single post when title is clicked

if(isset($_GET["id"])){

    include_once 'scripts/dbconnection.script.php';

    $id = $_GET["id"];
    $sql = "SELECT * FROM posts INNER JOIN users ON posts.usersId = users.usersId WHERE postsId = '$id';";

    $result = mysqli_query($connection, $sql);
    while($post = mysqli_fetch_assoc($result)){
        echo "<div class='form-horizontal p-3 mb-2 bg-light text-dark'>";
        echo "<h3>".$post['postsTitle']."</h3>";
        echo "<small><b>Author: </b>".$post["usersUid"]."</small><br>";
        echo "<small><b>Date Posted: </b>".$post["postsDate"]."</small><br>";
        echo "<small><b>Body: </b></small><br>";
        echo "<div>".$post['postsBody']."</div>";
        echo "<small><b>Topic: </b>".$post['postsTopic']."</small>";
        echo "</div>";
        echo "<a class='btn btn-success' href='index.php'>Back</a>";
    };

    mysqli_close($connection);
    exit();

};

