<?php
include_once 'navbar.php';
?>

<body>
  <!--BODY-->
  <main role="main" class="container">
    <div class="row">

      <!--MAIN CONTENT-->
      <!--LEFT SIDE - POSTS-->
      <div class="col-9 mt-5">
        <?php 
        //success messages
        if (isset($_GET["message"])) {
          if ($_GET["message"] == "createsuccess") {
            echo "<div class='alert alert-success mt-2 text-center' role='alert'>";
            echo "<p> Post Successfully Created!</p>";
            echo "</div>";
          };

          if ($_GET["message"] == "editsuccess") {
            echo "<div class='alert alert-success mt-2 text-center' role='alert'>";
            echo "<p> Post Successfully Edited!</p>";
            echo "</div>";
          };

          if ($_GET["message"] == "loggedout") {
            echo "<div class='alert alert-success mt-2 text-center' role='alert'>";
            echo "<p> Successfully Logged Out!</p>";
            echo "</div>";
          };
        };

        //sends error message if user trys to edit or delete a post that isnt theirs using the id in the url
        if(isset($_GET["error"])){
          if ($_GET["error"] == "invaliduser") {
            echo "<div class='alert alert-danger mt-2 text-center' role='alert'>";
            echo "<p> You did not create this post!</p>";
            echo "</div>";
          };
        }
        ?>
        <?php include_once 'scripts/allposts.script.php'; ?> <!--script to bring back all the posts-->
      </div>
      <!--RIGHT SIDE - SIDEBAR-->
      <div class="col-3 mt-5">
        <a class='btn btn-success mb-2 btn-block' href="createpost.php" name='newPost'>New Post</a>
        <!--Search-->
        <div class="form-horizontal p-3 mb-2 bg-light text-dark" >
          <form action="" method="GET">
            <fieldset class="content-section">
              <div id="legend">
                <h3>Search<h3>
              </div>
              <!--Search Box -->
              <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Search...">
              </div>
            </fieldset>
          <form>
        </div>
        <div class="form-horizontal p-3 mb-2 bg-light text-dark">
          <div id="legend">
            <h3>Select Topic:<h3>
          </div>
          <div class="content-section"> 
            <hr>
            <a href="?topic=computing" >Computing</a><hr>
            <a href="?topic=information" >Information Technology</a><hr>
            <a href="?topic=software" >Software Engineering</a><hr>
            <a href="?topic=cybersecurity" >Cyber Security</a><hr>
            <a href="?topic=other" >Other</a><hr>
            <a href="index.php" >All Topics</a><hr>
          </div>
        </div>

      </div>

<?php
include_once 'footer.php';
?>