<?php
// authentication
    require_once('auth.php');

//title
    $page_title = null;
    $page_title = 'Content Management';

//header
    require_once ('header.php');
?>
<!-- end php -->
<!-- html -->

<div class="content">
    <button type="button" class="btn btn-default btn-lg btn-block pad"><a href="admin.php">Administration List</a></button> <br />
    <button type="button" class="btn btn-default btn-lg btn-block pad"><a href="pages.php">Page Management</a></button> <br />
    <button type="button" class="btn btn-default btn-lg btn-block pad"><a href="upload.php"> Logo Management</a></button> <br />
</div>

<!-- end html -->
<!-- php -->
<?php
//footer
    require_once ('footer.php');
?>