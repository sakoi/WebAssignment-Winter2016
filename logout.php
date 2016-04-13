<?php

    session_start();
    session_unset();
    session_destroy();

    //redirect
    header("location:default.php")

?>

