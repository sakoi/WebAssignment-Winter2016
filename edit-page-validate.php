<?php ob_start();

//variables
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['id'];
    $ok = true;

//validation

//empty title
    if (empty($title)) {
        echo '<h3><i class="icon-exclamation-sign"></i> Title is required</h3><br />';
        $ok = false;
    }

//empty content
    if (empty($content)) {
        echo '<h3><i class="icon-exclamation-sign"></i> Content is required</h3><br />';
        $ok = false;
    }

//error handler
try{

//pass validation
    if ($ok) {

        //connect
        require_once('db.php');

        //query
        $sql = "UPDATE pages SET title = :title, content = :content WHERE id = :id";

        //collect and store
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
        $cmd->bindParam(':content',$content, PDO::PARAM_STR, 255);
        $cmd->bindParam(':id', $id, PDO::PARAM_INT);
        $cmd->execute();

        //disconnect
        $conn = null;

        //redirect
        header('location:pages.php');
    }//end if

}catch(Exception $e){

//send email when error
    mail('muyx@live.com', 'Admin Error - Assign 2', $e); //includes error variable

//redirect

    header('location:error.php');
}

ob_flush();
?>