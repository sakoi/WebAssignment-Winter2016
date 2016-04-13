<?php
session_start();

if (empty($_SESSION['user_id'])) {

//redirect
    header('location:login.php');

    exit();
    }
?>