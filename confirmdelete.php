<?php
include_once 'navbar.php';
include_once 'scripts/deletepost.script.php'; //delete post script to delete the posts when user clicks yes.
?>

<body>
    <!--BODY-->
    <main role="main" class="container">
        <div class="row">
            <!--MAIN CONTENT-->
            <div class="col">
            </div>
            <div class="col-md-8 mt-5">
                <div class="form-horizontal p-3 mb-2 bg-light text-dark text-center" >
                        <h3>Are You Sure You Want to Delete This Post?</h3>
                        <!-- confirm delete Button -->
                        <form action="scripts/deletepost.script.php" method="post">
                            <fieldset class="content-section">
                                <!-- Id hidden so the delete script can get the id to delete the right post -->
                                <input type="hidden" class="form-control" name="deleteId" value="<?php echo $id; ?>">
                                <div class="controls">
                                    <button class="btn btn-danger" type="submit" name="deleteSubmit">Yes</button>
                                    <a class="btn btn-success" href="manageposts.php">No</a>
                                </div>
                            </fieldset>
                        </form>
                </div>
            </div>
            <div class="col">
            </div>
        </div>

<?php
include_once 'footer.php';
?>