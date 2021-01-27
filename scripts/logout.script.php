<?php
//logout script
session_start();
session_unset();
session_destroy();

header("location: ../index.php?error=none&message=loggedout");