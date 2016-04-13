<?php ob_start();
//title
    $page_title = null;
    $page_title = 'Saving your Registration';

//header
    require_once ('header.php');
?>
<!-- end php -->
<!-- html -->

    <div class="banner">
        <img src="assets/img/coverImage.jpg" alt="cover image" width="100%"/>
    </div>

<!-- end html -->
<!-- php -->
<?php

//variables
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
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

//passwords must match
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

//if email is already saved
    require_once('db.php');

    if(isset($username)) {
        $sql = "SELECT * FROM users where username='$username'";
        $cmd = $conn->prepare($sql);
        $cmd->execute();
        $user = $cmd->fetchColumn();

            if (!empty($user)) {
                echo '<h3><i class="icon-exclamation-sign"></i> Email is already registered</h3><br />';
                $ok = false;
            }

    }

//pass validation
if ($ok) {

    //sql
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

    //hash the password
        $hashed_password = hash('sha512', $password);

    //execute
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
        $cmd->bindParam(':password',$hashed_password, PDO::PARAM_STR, 128);
        $cmd->execute();

    //disconnect
        $conn = null;

    //display success
        echo '<h3>Your registration was successful! Click to <a href="login.php">Log In</a></h3>';
}

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