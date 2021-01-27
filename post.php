<?php
include_once 'navbar.php';
?>
<main role="main" class="container">
    <div class="row">

        <div class="col-2">
        </div>

        <div class="col-8 mt-5">
        <!--Gets back the post the user clicks-->
        <?php include_once 'scripts/singlepost.script.php'; ?>
        </div>

        <div class="col-2">
        </div>


    </div>

<?php
include_once 'footer.php';
?>