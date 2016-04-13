<?php ob_start();
//title
    $page_title = null;
    $page_title = 'Validating';

//header
    require_once ('header.php');
?>
<!-- end php -->
<!-- html -->

    <div class="banner">
        <img src="assets/img/coverImage5.jpg" alt="cover image" width="100%"/>
    </div>

<!-- end html -->
<!-- php -->
<?php

//variables
    $username = $_POST['username'];
    $password = hash('sha512', $_POST['password']);

//error handler
try{

//connect
    require_once ('db.php');

//query
    $sql = "SELECT user_id FROM users WHERE username = :username AND password = :password";

//collect and store
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->bindParam(':password', $password, PDO::PARAM_STR, 128);
    $cmd->execute();
    $users = $cmd->fetchAll();

    $count = $cmd->rowCount();

    if ($count == 0) {
        echo '<h3><i class="icon-exclamation-sign"></i> Invalid Login</h3><br />';
        exit();
    }else {
        session_start(); //access the existing session
        foreach  ($users as $user) {
            $_SESSION['user_id']=$user['user_id'];
        }
}//end if

//disconnect
    $conn = null;

//redirect
    header('location:content.php');

}catch(Exception $e){

//send email when error
    mail('muyx@live.com', 'Admin Error - Assign 2', $e); //includes error variable

//redirect
    header('location:error.php');
}

//footer
require_once ('footer.php');

ob_flush();
?>
