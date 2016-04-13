<?php       session_start(); ?>
<!-- end php -->
<!-- html -->

<!DOCTYPE html>
<html>
<head>
    <meta content="text/html" charset="utf-8" http-equiv="Content-Type">

<!-- title -->
    <title><?php echo $page_title; ?></title>

    <link rel="icon" href="assets/img/favicon.png">

<!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="main.css">

</head>
<body>
<div id="container">
<header>
    <nav>
<!-- end html -->
<!-- php -->
<?php
//connect
    require_once ('db.php');
//query
    $sql = "SELECT cover_image FROM images";

//collect image
    $cmd = $conn->prepare($sql);
    $cmd->execute();
    $logo = $cmd->fetchColumn(0);

//display image
    echo '<a href="default.php" title="Index page"><img src="assets/img/'.$logo.'" height="50px" /></a>';
?>
<!-- end php -->
<!-- html -->

        <ul class="nav navbar-nav navbar-right">

<!-- end html -->
<!-- html -->
<?php

  //session links
      if (!empty($_SESSION['user_id'])) {
?>
<!-- end php -->
<!-- html -->

     <li><a href="admin.php" title="Admin">Admistration</a></li>
     <li><a href="pages.php" title="View Pages">Pages</a></li>
     <li><a href="upload.php" title="Upload Logo">Upload Logo</a></li>
     <li><a href="logout.php" title="Logout">Logout</a> </li>

<!-- end html -->
<!-- php -->
<?php
      }else { //end if

      //query
        $sql2 = "SELECT id, title FROM pages";

      //execute
        $cmd2 = $conn->prepare($sql2);
        $cmd2->execute();
        $pages = $cmd2->fetchAll();

      //loop through data
         foreach($pages as $page){
                echo '<li><a href="default.php?id='.$page['id']. '">'. $page['title']. '</a></li>';
         }

?>
<!-- end php -->
<!-- html -->

        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>

<!-- end html -->
<!-- php -->
<?php
      }//end else
?>
<!-- end php -->
<!-- html -->
        </ul>
    </nav>
</header>

<!-- body starts -->