<?php
session_start();
if (isset($_SESSION['auth'])) {
    header('Location: sliders');
}
require '../vendor/autoload.php';
require '../includes/functions.php';
require '../rb.php';

//use \RedBeanPHP\R as R;

R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB


if (isset($_POST['login'])) {
    $_SESSION['last_login_timestamp'] = time();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $activity = "Log in";
    $Time = time();
    /*
    ----------------------------    gabela ---------------------------------------------*/

    $init = R::findOne('admin', 'email = ? AND password = ?', [$email, $password]);


    if ($init == null) {
        //   $message = "invalid details";
        print ("<script>window.alert('invalid details')</script>");
        print ("<script>window.location.assign('login.php')</script>");


    } else {
        @session_start();
       // $_SESSION['role'] = $init->type;
        $_SESSION['email'] = $init->email;
        $_SESSION['username'] = $init->email;
        $_SESSION['auth'] = $init->id;
        $_SESSION['sess_user'] = $email;


        // $fixture_id = $fixture;
        $email = $_POST['email'];
        $act = $activity;
        $Time = time();


            echo '<div class="alert alert-success" role="alert" style="background-color:transparent">...<h2  style="color:white"> <img src="images/492.png" />
!login successfull ' . $_SESSION['role'] . ' </h2></div>';


            echo '  <h2 align="center">
          <meta content="2;dashboard" http-equiv="refresh" />
        </h2> ';
        }
        //  print ("<script>window.location.assign('index.php')</script"
}
include 'includes/header.php';

?>


    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
        <form method="post" action="index" enctype="multipart/form-data">
            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
                <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> 263 <span
                            class="tx-info">Lyrics</span> <span class="tx-normal">]</span></div>
                <div class="tx-center mg-b-60">263Lyrics Admin Dashboard</div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter your email">
                </div><!-- form-group -->
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Enter your password">
                    <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                </div><!-- form-group -->
                <input type="submit" name="login" class="btn btn-info btn-block" value="Log in"/>
            </div><!-- login-wrapper -->
        </form>
    </div><!-- d-flex -->

<?php
include 'includes/footer.php';
?>