<?php
//title
    $page_title = null;
    $page_title = 'Register';

//header
    require_once('header.php');
?>
<!-- end php -->
<!-- html -->

    <div class="banner">
        <img src="assets/img/coverImage12.jpg" alt="cover image" width="100%"/>
    </div>

<div class="content">
    <h1>User Registration</h1>

    <form method="post" action="save-registration.php" class="form-horizontal">
        <div class="form-group">
            <label for="username" class="col-sm-2">Username:</label>
            <input name="username"  placeholder="name@domain.com" />
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2">Password:</label>
            <input type="password" name="password" />
        </div>
        <div class="form-group">
            <label for="confirm" class="col-sm-2">Confirm Password:</label>
            <input type="password" name="confirm" />
        </div>

        <div class="col-sm-offset-2">
            <input type="submit" value="Register" class="btn btn-warning" />
        </div>


    </form>
</div>

<!-- end html -->
<!-- php -->
<?php
//footer
    require_once('footer.php');
?>