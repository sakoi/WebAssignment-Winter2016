<?php ob_start();
//read selected game id
    $id = $_GET['id'];

//if number
    if(is_numeric($id)) {
        //connect
        require_once ('db.php');

        //delete query
        $sql = "DELETE FROM pages WHERE id= :id";

        //execute query
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':id', $id, PDO::PARAM_INT);
        $cmd->execute();

        //disconnect
        $conn = null;

        //redirect
        header('location:pages.php');
    }//end if

ob_flush();
?>