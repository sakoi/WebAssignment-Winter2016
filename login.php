<?php
//title
    $page_title = 'Log In';

//header
    require_once('header.php');
?>
<!-- end php -->
<!-- html -->

 <div class="banner">
        <img src="assets/img/coverImage13.jpg" alt="cover image" width="100%"/>
    </div>


<div class="content">
    <h1>Log In</h1>
    <form method="post" action="validate.php" class="form-horizontal">
        <div class="form-group">
            <label for="username" class="col-sm-2">Username:</label>
            <input name="username" />
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2">Password:</label>
            <input type="password" name="password" />
        </div>
        <div class="col-sm-offset-2">
            <input type="submit" value="Login" class="btn btn-success" />
        </div>
    </form>
</div>

<!-- end html -->
<!-- php -->
<?php
//footer
    require_once('footer.php');
?>