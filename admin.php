<?php ob_start();

//authentication
    require_once('auth.php');

//title
    $page_title = null;
    $page_title = 'Admin List';

//header
    require_once ('header.php');
?>
<!-- end php -->
<!-- html -->

<div class="table">
<h2>Administrators</h2>

<!--end html -->
<!-- php -->
<?php

//error handler
    try {
//connect
    require_once('db.php');

//query
    $sql = "SELECT * FROM users ORDER BY username";

//collect and store
    $cmd = $conn->prepare($sql);
    $cmd->execute();
    $users = $cmd->fetchAll();

//set table
    echo '<table class="table table-striped"><thread><th>Email</th><th>Edit</th><th>Delete</th></thread>
    <tbody>';

//loop
    foreach ($users as $user) {

    echo '<tr><td>' . $user['username'] . '</td>

    <td><form action="edit-admin.php?user_id=' . $user['user_id'] . '" method="post">
                <input type="hidden" name="edit" value="">
                <input type="submit" name="edit" value="Edit"></form></td>
    <td><form action="delete-admin.php?user_id=' . $user['user_id'] . '" method="post" onSubmit="return confirm(\'Are you sure?\')">
                <input type="hidden" name="delete" value="">
                <input type="submit" name="delete" value="Delete"></form></td></tr>';
    }

//end table
    echo '</tbody></table>';

//disconnect
    $conn = null;

}catch(Exception $e){

//send email when error
    mail('muyx@live.com', 'Admin Error - Assign 2', $e); //includes error variable

//redirect
    header('location:error.php');
    }

?>
<!-- end php -->
<!-- html -->

</div>

<!-- end html -->
<!-- php -->
<?php
//footer
    require_once ('footer.php');

ob_flush();
?>