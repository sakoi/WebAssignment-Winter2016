<?php ob_start();
//title
    $page_title = null;
    $page_title = 'Assigment 2 - Web Programming';


//require header
    require_once('header.php');

$info = $_SERVER['QUERY_STRING'];
$info = ltrim($info, 'id=');

    if(empty($info)){
    $info = 1;
    }

//error handler
try{

//connect
    require_once ('db.php');

//query
    $sql= "SELECT title, content FROM pages WHERE id = :id";

//collect and store
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':id', $info, PDO::PARAM_INT);
    $cmd->execute();
    $page = $cmd->fetchAll();

?>
<!-- end php -->
<!-- html -->

    <div class="banner">
        <img src="assets/img/coverImage<?php echo $info ?>.jpg" alt="cover image" width="100%"/>
    </div>

    <div class="content">

<!-- end html -->
<!-- php -->
<?php

// if id = 1, post this html
    if($info <= 1) {
?>
<!-- end php -->
<!-- html -->

        <div class="center">

    <!-- row -->
    <div class="row">


        <div class="col-md-2">
            <a href="login.php">
                <img class="login" src="assets/img/loginbutton.jpg" alt="Log in" width="300" height="300"/>
            </a>
        </div>

        <div class="col-sm-3"></div>

        <div class="col-md-2">
            <a href="register.php">
                <img class="register" src="assets/img/registerbutton.jpg" alt="Register" width="300" height="300"/>
            </a>
        </div>

        <div class="col-md-1"></div>

    </div>
    <!--end row -->



        <div class="padding"></div>
            <div class="padding"></div>


<!-- end html -->
<!-- php -->
<?php

//end if
    }

//loop info
        foreach($page as $p){
            echo '<h1>'.$p['title']. '</h1>';
            echo '<p>'.$p['content']. '</p><br />';
        }
?>
<!-- end php -->
<!-- html -->

       </div>
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
    require_once('footer.php');
ob_flush();
?>