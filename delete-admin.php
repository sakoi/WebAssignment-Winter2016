<?php ob_start();
//read selected game id
    $user_id = $_GET['user_id'];

//if number
    if(is_numeric($user_id)) {
        //connect
            require_once ('db.php');

        //delete query
        $sql = "DELETE FROM users WHERE user_id= :user_id";

        //execture query
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $cmd->execute();

        //disconnect
        $conn = null;

        //redirect
        header('location:admin.php');

    }//end if

ob_flush();
?>
