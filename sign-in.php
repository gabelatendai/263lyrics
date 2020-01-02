<?php
include 'includes/header.php';
?>
<?php
include "rb.php";


R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB


if (isset($_POST['send'])) {
    $_SESSION['last_login_timestamp'] = time();
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $activity = "Log in";
    $Time = time();
    /*
    ---------------------------- gabela ---------------------------------------------*/

    $init = R::findOne('users', 'email = ? AND password = ?', [$email, $password]);


    if ($init == null) {
        //   $message = "invalid details";
        print ("<script>window.alert('invalid details')</script>");
        print ("<script>window.location.assign('login.php')</script>");

    } else {
       @session_start();
        $_SESSION['role'] = $init->type;
        $_SESSION['email'] = $init->email;
        $_SESSION['user_id'] = $init->id;
        $_SESSION['sess_user'] = $email;


        // $fixture_id = $fixture;
        $email = $_POST['email'];
        $act = $activity;
        $Time = time();

        if ( $init->type == 'client') {

            echo '<div class="alert alert-success" role="alert" style="background-color:transparent">...<h2  style="color:white"> <img src="images/492.png" />
!login successfull ' . $_SESSION['role'] . ' </h2></div>';


            echo '  <h2 align="center">
          <meta content="2;user-map.php" http-equiv="refresh" />
        </h2> ';
        }else{
            echo '<div class="alert alert-success" role="alert" style="background-color:transparent">...<h2  style="color:white"> <img src="images/492.png" />
!login successfull ' . $_SESSION['role'] . ' </h2></div>';


            echo '  <h2 align="center">
          <meta content="2;index.php" http-equiv="refresh" />
        </h2> ';
        }
        //  print ("<script>window.location.assign('index.php')</script");
    }
}
?>
<div class="main-container">

    <main class="site-main">

        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Map Section -->
                <div class="col-sm-6 col-xs-12">
                    <div class="contact-detail">
                        <h3>Log In</h3>
                        <p>If you already have an existing account with us log in to access tools that enable you to
                            share lyrics and to make content.</p>
                        <div class="detail-box">
                            <p><i class="fa fa-check"></i> Share your lyrics</p>
                            <p><i class="fa fa-check"></i> Like and bookmark content</p>
                            <p><i class="fa fa-check"></i> Access our programs</p>
                        </div>
                    </div>
                </div><!-- Contact Details /- -->
                <!-- Contact Form -->
                <div class="col-sm-6 col-xs-12">
                    <div class="contact-form">
                        <h3>Sign in here</h3>
	                    <form  action="sign-in.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter email *" name="email"
                                       id="input_name" required=""/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Enter password*" name="password"
                                       id="input_email" required=""/>
                            </div>
                            <button title="SEND MESSAGE" class="pull-right" type="submit" id="" name="send">
                                LOG IN
                            </button>
                            <div id="alert-msg" class="alert-msg"></div>
                        </form>
                    </div>
                </div><!-- Contact Form /- -->
                <!-- Contact Details -->
            </div><!-- Row /- -->
        </div><!-- Container -->

    </main>

</div>

<?php
include 'includes/footer.php'
?>
