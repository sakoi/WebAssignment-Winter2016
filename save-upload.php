<?php ob_start();
//authentication
    require_once('auth.php');

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
    $ok = true;

//error handler
try{

// image validation
    if (!empty($_FILES['cover_image']['name'])) {
        $cover_image = $_FILES['cover_image']['name'];
        $type = $_FILES['cover_image']['type'];
        $tmp_name = $_FILES['cover_image']['tmp_name'];

// validate file type

//empty title
        if ($type != 'image/jpeg') {
            echo '<h3><i class="icon-exclamation-sign"></i> Image must be a JPG</h3><br />';
            $ok = false;
        }else{
            if($ok) {
                // save the image if no validation errors found
                $final_image = session_id() . "-" . $cover_image;
                move_uploaded_file($tmp_name, "assets/img/$final_image");
                echo $final_image;

        }
    }
}//end if

    //validate
        if (empty($_FILES['cover_image']['name'])) {
            echo '<h3><i class="icon-exclamation-sign"></i>Image is required</h3><br />';
            $ok = false;
        }

// save ONLY IF the form is complete
if ($ok) {
    // connecting to the database
        require_once('db.php');

    //query
        $sql = "UPDATE images SET cover_image = :cover_image WHERE id=1";

    //execute
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':cover_image', $final_image, PDO::PARAM_STR, 255);
        $cmd->execute();

    // disconnecting
        $conn = null;

    //redirect
    header('Location:upload.php');

}//end if

}catch(Exception $e){

//send email when error
    mail('muyx@live.com', 'Admin Error - Assign 2', $e); //includes error variable

//redirect

    header('location:error.php');
}

ob_flush();
?>
