<?php ob_start();
//title
    $page_title=null;
    $page_title = 'Saving page';
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

//variables
    $title = $_POST['title'];
    $content = $_POST['content'];
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

    //sql
        $sql = "INSERT INTO pages (title, content) VALUES (:title, :content)";


    //collect and store
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
        $cmd->bindParam(':content',$content, PDO::PARAM_STR, 255);
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

//footer
require_once ('footer.php');

    ob_flush();
?>