<?php
include_once 'navbar.php';
include_once 'scripts/editpost.script.php'; //script to allow the post to be edited and the variables to be accessed so they can be auto inputted.
include_once 'scripts/authenticate.script.php'; //makes sure there is a valid session before the user can access this page.
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
                 if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<div class='alert alert-danger mt-2 text-center' role='alert'>";
                        echo "<p> An input field was left empty!</p>";
                        echo "</div>";
                    };

                    if ($_GET["error"] == "postnotupdated") {
                        echo "<div class='alert alert-danger mt-2 text-center' role='alert'>";
                        echo "<p> Unable to update post!</p>";
                        echo "</div>";
                    };
                };
                ?>
                <form class="form-horizontal p-3 mb-2 bg-light text-dark" action="scripts/editpost.script.php" method="post">
                    <fieldset class="content-section">
                        <div id="legend">
                            <h3>Edit Post<h3>
                        </div>
                        <!-- Id hidden so the variable can be assigned using post to make changes via the id with the id in the database -->
                        <input type="hidden" class="form-control" name="editId" value="<?php echo $id; ?>">

                        <!-- Title -->
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" class="form-control" name="editTitle" value="<?php echo $postTitle; ?>">
                        </div>

                        <!-- Body -->
                        <div class="form-group">
                            <label>Body:</label>
                            <textarea type="textarea" class="form-control" name="editBody"><?php echo $postBody; ?></textarea>
                        </div>

                        <!-- Topic -->
                        <div class="form-group">
                            <label>Topic:</label>
                            <select class="form-control" name="editTopic">
                                <option selected="<?php echo $postTopic; ?>"><?php echo $postTopic; ?></option>
                                <option value="Computing">Computing</option>
                                <option value="Information Technology" >Information Technology</option>
                                <option value="Software Engineering">Software Engineering</option>
                                <option value="Cyber Security">Cyber Security</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Save Edits Button -->
                            <div class="controls">
                                <button class="btn btn-success" type="submit" name="editSubmit">Save Edits</button>
                                <a class="btn btn-danger" href="manageposts.php">Go Back</a>
                            </div>
                    </fieldset>
                </form>
            </div>
            <div class="col">
            </div>
        </div>

<?php
include_once 'footer.php';
?>