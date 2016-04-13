<?php ob_start();
//title
$page_title = null;
$page_title = 'Sending you message';

//header
require_once ('header.php');
?>
<!-- end php -->
<!-- html -->

<div class="banner">
    <img src="assets/img/coverImage8.jpg" alt="cover image" width="100%"/>
</div>

<!-- end html -->
<!-- php -->
<?php

//save information
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];

//send mail
mail("muyx@live.com",$email.': '.$subject, $message);

//display success
        echo '<h3>Your message has been sent</h3>';

//footer
    require_once ('footer.php');

ob_flush();
?>
