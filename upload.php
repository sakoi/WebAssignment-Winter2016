<?php
// authentication
    require_once('auth.php');

//title
    $page_title = null;
    $page_title = 'Upload Logo';

//header
    require_once ('header.php');
?>
<!-- end php -->
<!-- HTML -->

    <div class="banner">
        <img src="assets/img/coverImage9.jpg" alt="cover image" width="100%"/>
    </div>

    <div class="content">
        <h1>Upload Logo</h1>

        <form method="post" action="save-upload.php" enctype="multipart/form-data">
            <input type="file" id="cover_image" name="cover_image" />
            <div class="col-sm-offset-2">
                <input type="submit" value="Upload" class="btn btn-info" />
            </div>
        </form>
    </div>

<!-- end html -->
<!-- php -->
<?php

//Footer
    require_once ('footer.php');

?>