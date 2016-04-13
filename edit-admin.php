<?php ob_start();
// authentication
    require_once('auth.php');

//title
    $page_title = null;
    $page_title = 'Edit Admin';

//header
    require_once ('header.php');

//error handler
try{

//if user_id is a number
    if (!empty($_GET['user_id']) && (is_numeric($_GET['user_id']))) {

        //if we do, store in a variable
        $user_id = $_GET['user_id'];

        //connect
        require_once ('db.php');

        //query
        $sql = "SELECT * FROM users WHERE user_id = :user_id";

        //collect data and stroe
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $cmd->execute();
        $users = $cmd->fetchAll();

        foreach ($users as $user){
            $username = $user['username'];
        }

        //disconnect
        $conn = null;
    }//end if
?>
<!-- end php -->
<!-- html -->


    <div class="banner">
        <img src="assets/img/coverImage6.jpg" alt="cover image" width="100%"/>
    </div>

<div class="content">
    <h1>Edit Admin</h1>

    <form method="post" action="edit-validate.php" class="form-horizontal">
        <div class="form-group">
            <label for="username" class="col-sm-2">Username:</label>
            <input name="username"  value="<?php echo $username ?>" />
        </div>
            <div class="form-group">
                <label for="password" class="col-sm-2">Password:</label>
                <input type="password" name="password" />
            </div>
            <div class="form-group">
                <label for="confirm" class="col-sm-2">Confirm Password:</label>
                <input type="password" name="confirm" />
            </div>
        <input  name="user_id" type="hidden" value="<?php echo $user_id; ?>" />
            <div class="col-sm-offset-2">
                <input type="submit" value="Submit" class="btn btn-warning" />
            </div>
    </form>
</div>

<!-- end html -->
<!-- php -->
<?php

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