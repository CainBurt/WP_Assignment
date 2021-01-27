<?php
//if youre not logged in it will redirect to the login page if you try to go to any page that has this script included.
if (!isset($_SESSION['userid'])){
    header("Location: login.php");
    die();
}

//authentication to check what user is logged in for edit and delete in /scripts/functions.script.php