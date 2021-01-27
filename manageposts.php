<?php
include_once 'navbar.php';
require_once 'scripts/authenticate.script.php'; //checks if any user is logged in 
?>

<body>
    <!--BODY-->
    <main role="main" class="container">
        <div class="row">
            <!--MAIN CONTENT-->
            <div class="col">
            </div>

            <div class="col-md-8 mt-5">
                <?php
                    //show sucess messages to the user
                    if (isset($_GET["message"])) {
                        if ($_GET["message"] == "deletesuccess") {
                            echo "<div class='alert alert-success mt-2 text-center' role='alert'>";
                            echo "<p> Post Successfully Deleted!</p>";
                            echo "</div>";
                        }elseif ($_GET["message"] == "editsuccess") {
                            echo "<div class='alert alert-success mt-2 text-center' role='alert'>";
                            echo "<p> Post Successfully Edited!</p>";
                            echo "</div>";
                        };
                    };
                ?>
                <div class="mt-5 form-horizontal p-3 mb-2 bg-light text-dark">
                    <h3>Manage Posts</h3>
                    <table class="table">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                            <th scope="col">Author</th>
                            <th scope="col">Action</th>
                            <th></th>
                        </tr>
                        <?php include_once 'scripts/myposts.script.php'; ?>  <!--This script gets back the data for the posts the user has made.-->
                    </table>
                </div>
            </div>

            <div class="col">
            </div>
            
        </div>

<?php
include_once 'footer.php';
?>