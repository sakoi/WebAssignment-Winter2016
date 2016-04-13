<?php ob_start();
//title
    $page_title = 'Saving your Edit';

//header
    require_once ('header.php');
?>
<!-- end php -->
<!-- html -->

    <div class="banner">
        <img src="assets/img/coverImage6.jpg" alt="cover image" width="100%"/>
    </div>

<!-- end html -->
<!-- php -->
<?php

//variables
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $user_id = $_POST['user_id'];
    $ok = true;

//validation

//empty username
    if (empty($username)) {
        echo '<h3><i class="icon-exclamation-sign"></i> Username is required</h3><br />';
        $ok = false;
    }

//empty password
    if (empty($password)) {
        echo '<h3><i class="icon-exclamation-sign"></i> Password is required</h3><br />';
        $ok = false;
    }

//passwords match
    if ($password != $confirm) {
        echo '<h3><i class="icon-exclamation-sign"></i> Password must match</h3><br />';
        $ok = false;
    }

//username is in email format
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        echo '<h3><i class="icon-exclamation-sign"></i> Invalid email format</h3><br />';
        $ok = false;
    }

//error handler
    try{

//pass validation
    if ($ok) {

        //connect
            require_once('db.php');

        //sql
            $sql = "UPDATE users SET username = :username, password = :password WHERE user_id = :user_id";

        //hash the password
            $hashed_password = hash('sha512', $password);

        //fill the params and execute
            $cmd = $conn->prepare($sql);
            $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
            $cmd->bindParam(':password',$hashed_password, PDO::PARAM_STR, 128);
            $cmd->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $cmd->execute();

        //disconnect
            $conn = null;

        //redirect
        header('location:admin.php');
    }//end if

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