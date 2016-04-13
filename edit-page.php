<?php ob_start();
// authentication
    require_once('auth.php');

//title
    $page_title = null;
    $page_title = 'Edit Page';

//header
    require_once ('header.php');

//variables
    $id = null;
    $title = null;
    $content = null;

//error handler
try{

//if id is number
    if (!empty($_GET['id']) && (is_numeric($_GET['id']))) {

        $id = $_GET['id'];

        //connect
        require_once ('db.php');

        //query
        $sql = "SELECT * FROM pages WHERE id = :id";

        //collect and store
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':id', $id, PDO::PARAM_INT);
        $cmd->execute();
        $pages = $cmd->fetchAll();

        //loop through data
        foreach ($pages as $page){
            $title = $page['title'];
            $content = $page['content'];
        }

        //disconnect
        $conn = null;
    }//end if

?>
<!-- end php -->
<!-- html -->

    <div class="banner">
        <img src="assets/img/coverImage11.jpg" alt="cover image" width="100%"/>
    </div>

    <div class="content">
        <h1>Edit Page</h1>

        <form method="post" action="edit-page-validate.php" class="form-horizontal">
            <div class="form-group">
                <label for="title" class="col-sm-2">Title:</label>
                <input name="title"  value="<?php echo $title?>" />
            </div>
            <div class="form-group">
                <label for="content" class="col-sm-2">Content:</label>
                <textarea name="content" style="width:70em" rows="3"><?php echo $content ?></textarea>
            </div>
                <input  name="id" type="hidden" value="<?php echo $id; ?>" />
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