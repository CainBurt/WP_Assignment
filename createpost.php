<?php
include_once 'navbar.php';
include_once 'scripts/authenticate.script.php'; //makes sure there is a valid session before the user can access this page
?>


<body>
    <!--BODY-->
    <main role="main" class="container">
        <div class="row">
            <!--MAIN CONTENT-->
            <div class="col">
            </div>
            <div class="col-md-8 mt-5">
                <div class=text-center>
                    <?php
                        //show error messages to the user
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                                echo "<div class='alert alert-danger mt-2 text-center' role='alert'>";
                                echo "<p> An input field was left empty!</p>";
                                echo "</div>";
                            };
                        };
                    ?>
                </div>
                <form class="form-horizontal p-3 mb-2 bg-light text-dark" action="scripts/createpost.script.php" method="post">
                    <fieldset class="content-section">
                        <div id="legend">
                            <h3>Create Post<h3>
                        </div>

                        <!-- Title -->
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" class="form-control" name="title">
                        </div>

                        <!-- Body -->
                        <div class="form-group">
                            <label>Body:</label>
                            <textarea type="textarea" class="form-control" name="body"></textarea>
                        </div>

                        <!-- Topic -->
                        <div class="form-group">
                            <label>Topic:</label>
                            <select class="form-control" name="topics">
                                <option value="Computing">Computing</option>
                                <option value="Information Technology" >Information Technology</option>
                                <option value="Software Engineering">Software Engineering</option>
                                <option value="Cyber Security">Cyber Security</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Post Button -->
                        <div class="control-group">
                            <div class="controls">
                                <button class="btn btn-success" type="submit" name="postSubmit">Post</button>
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