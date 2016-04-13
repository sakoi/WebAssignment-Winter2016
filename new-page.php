<?php
//authentication
    require_once ('auth.php');

//title
    $page_title = null;
    $page_title = 'New Page';

//header
    require_once ('header.php');
?>
<!-- end php -->
<!-- html -->

    <div class="banner">
        <img src="assets/img/coverImage10.jpg" alt="cover image" width="100%"/>
    </div>

    <div class="content">
        <h1>New Page</h1>

        <form method="post" action="save-page.php" class="form-horizontal">
            <div class="form-group">
                <label for="title" class="col-sm-2">Title:</label>
                <input id="title" name="title" />
            </div>
            <div class="form-group">
                <label for="content" class="col-sm-2">Content:</label>
                <textarea name="content" style="width:70em" rows="3"></textarea>

            </div>
             <div class="col-sm-offset-2">
                <input type="submit" value="Save" class="btn btn-danger" />
            </div>
        </form>
    </div>

<!-- end html -->
<!-- php -->
<?php
//footer
    require_once ('footer.php');
?>