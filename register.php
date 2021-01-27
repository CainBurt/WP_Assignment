<?php
include_once 'navbar.php';
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
                    //show error messages to the user after submit
                    if (isset($_GET["error"])) {

                        if ($_GET["error"] == "emptyinput") {
                            echo "<div class='alert alert-danger mt-2 text-center' role='alert'>";
                            echo "<p> An input field was left empty!</p>";
                            echo "</div>";
                        };

                        if ($_GET["error"] == "invalidusername") {
                            echo "<div class='alert alert-danger mt-2 text-center' role='alert'>";
                            echo "<p> Username is Invalid!</p>";
                            echo "</div>";
                        };

                        if ($_GET["error"] == "invalidemail") {
                            echo "<div class='alert alert-danger mt-2 text-center' role='alert'>";
                            echo "<p> Email is Invalid!</p>";
                            echo "</div>";
                        };

                        if ($_GET["error"] == "passwordsdontmatch") {
                            echo "<div class='alert alert-danger mt-2 text-center' role='alert'>";
                            echo "<p> The passwords dont match!</p>";
                            echo "</div>";
                        };


                        if ($_GET["error"] == "passwordunsecure") {
                            echo "<div class='alert alert-danger mt-2 text-center' role='alert'>";
                            echo "<p> Password must contain at least 1 capital letter, 1 number and be over 8 characters!</p>";
                            echo "</div>";
                        };

                        if ($_GET["error"] == "stmtfailed") {
                            echo "<div class='alert alert-danger mt-2 text-center' role='alert'>";
                            echo "<p> Something went wrong. Try Again.</p>";
                            echo "</div>";
                        };

                        if ($_GET["error"] == "usernameoremailtaken") {
                            echo "<div class='alert alert-danger mt-2 text-center' role='alert'>";
                            echo "<p> The Username or Email is already in use.</p>";
                            echo "</div>";
                        };

                        if ($_GET["error"] == "none") {
                            echo "<div class='alert alert-success mt-2 text-center' role='alert'>";
                            echo "<p> You have signed up!</p>";
                            echo "</div>";
                        };
                    };
                    ?>
                </div>
                <form class="form-horizontal p-3 mb-2 bg-light text-dark" id="form" action="scripts/register.script.php" method="post">
                    <fieldset class="content-section">
                        <div id="legend">
                            <h3>Register<h3>
                        </div>

                        <!-- Name -->
                        <div class="form-group">
                            <label>Name:</label>
                            <input id="name" type="text" class="form-control" name="name" required>
                            <p id="nameError"></p>
                        </div>

                        <!-- Username -->
                        <div class="form-group">
                            <label>Username:</label>
                            <input id="username" type="text" class="form-control" name="username" onkeyup="validateUsername(); return false;" required>
                            <p id="usernameError"></p>
                        </div>

                        <!-- E-mail -->
                        <div class="form-group">
                            <label>E-mail:</label>
                            <input id="email" type="text" class="form-control" name="email" onkeyup="validateEmail(); return false;" required >
                            <p id="emailError"></p>
                        </div>

                        <!-- Password-->
                        <div class="form-group">
                            <label>Password:</label>
                            <input for="password" id="password" type="password" class="form-control" name="password" onkeyup="validatePass(); return false;" required>
                            <p id="passwordError"></p>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label>Password (Confirm):</label>
                            <input id="confirmPassword" type="password" class="form-control" name="confirmPassword" onkeyup="validatePass(); return false;" required>
                            <p id="confirmPasswordError"></p>
                        </div>

                        <!-- Register Button -->
                        <div class="control-group">
                            <div class="controls">
                                <button class="btn btn-success" type="submit" name="registerSubmit">Register</button>
                            </div>
                    </fieldset>

                </form>
            </div>
            <div class="col">
            </div>
        </div>

<!-- JS validation - shows errors before submit -->
<script src = "/wpassignment/js/registerValidate.js"></script>

<?php
include_once 'footer.php';
?>