<?php
include_once 'navbar.php';
?>

<body>
    <!--BODY-->
    <main role="main" class="container">
        <div class="row">
            <div class="col">
            </div>
            <!--MAIN CONTENT-->
            <div class="col-6 mt-5">
                <div class=text-center>
                        <?php
                        //show error messages to the user
                        if (isset($_GET["error"])) {

                            if ($_GET["error"] == "emptyinput") {
                                echo "<div class='alert alert-danger mt-2 text-center' role='alert'>";
                                echo "<p> An input field was left empty!</p>";
                                echo "</div>";
                            };

                            if ($_GET["error"] == "wronglogin") {
                                echo "<div class='alert alert-danger mt-2 text-center' role='alert'>";
                                echo "<p> Incorrect login details!</p>";
                                echo "</div>";
                            };

                            if ($_GET["error"] == "none") {
                                echo "<div class='alert alert-success mt-2 text-center' role='alert'>";
                                echo "<p> You have registered!</p>";
                                echo "</div>";
                            };
                            
                        };
                        ?>
                </div>
                <form class="form-horizontal p-3 mb-2 bg-light text-dark" action="scripts/login.script.php" method="POST">
                    <fieldset class="content-section">
                        <div id="legend">
                            <h3>Login<h3>
                        </div>
                        <!-- E-mail -->
                        <div class="form-group">
                            <label>Username/E-mail:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <!-- Password-->
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <!-- Login Button -->
                        <div class="control-group">
                            <div class="controls">
                                <button class="btn btn-success" name="loginSubmit">Login</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
            <div class="col">
            </div>



<?php
include_once 'footer.php';
?>