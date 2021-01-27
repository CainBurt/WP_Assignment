<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="information management system">
  <meta name="keywords" content="computing software engineering blog">
  <meta name="author" content="Cain Burt">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<header class="site-header">
  <!--NAV BAR-->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark static-top">
    <div class="container">
      <button class="navbar-toggler" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggle">
        <div class="navbar-nav mr-auto">
          <a class="nav-item nav-link" href="/wpassignment/index.php">Home</a>
        </div>
        <!-- Navbar Right Side -->
        <div class="navbar-nav">
          <?php
          //changes navbar if user is logged in
            if(isset($_SESSION["username"])){
              echo "<a class='nav-item nav-link' href='/wpassignment/manageposts.php'>My Posts</a>";
              echo "<a class='nav-item nav-link' href='/wpassignment/scripts/logout.script.php'>Log Out</a>";
            }else{
              echo "<a class='nav-item nav-link' href='/wpassignment/login.php'>Login</a>";
              echo "<a class='nav-item nav-link' href='/wpassignment/register.php'>Register</a>";
            }
          ?>
        </div>
      </div>
    </div>
  </nav>
</header>