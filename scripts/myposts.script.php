<?php
//gets all the posts for the current logged in user on the manageposts.php page

require_once 'dbconnection.script.php'; //db connection script

session_start();
$userid = $_SESSION["userid"];
$sql = "SELECT posts.postsId, posts.postsTitle, users.usersUid, posts.postsDate FROM posts INNER JOIN users ON posts.usersId = users.usersId WHERE users.usersId = '$userid' ORDER BY posts.postsDate DESC;";

$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td scope='row'>".$row["postsTitle"]."</td>";
    echo "<td>".$row["postsDate"]."</td>";
    echo "<td>".$row["usersUid"]."    "."</td>";
    echo "<td><a href='editpost.php?id=".$row["postsId"]."'>Edit</a></td>";
    echo "<td><a href='confirmdelete.php?id=".$row["postsId"]."'>Delete</a></td>";
    echo "</tr>";
};

mysqli_close($connection);