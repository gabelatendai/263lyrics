<?php
include 'includes/header.php';
include 'rb.php';


 $db= R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB
$conn = mysqli_connect("localhost", "root", "", "java");

if (isset($_POST['save'])) {

    $pass =$_POST['password'] ;
   // $passconfrm = $_POST['passconfirm'];


    $email = $_POST['email'];

    $pass= mysqli_real_escape_string($conn,$pass);
    //$passconfrm= mysqli_real_escape_string($conn,$passconfrm);
    $email= mysqli_real_escape_string($conn,$email);

    $hashFormat="$2y$10@";

    $salt="iusesomecrazystrings22";

    $hash_and_salt=$hashFormat.$salt;

    $password= crypt($pass, $hash_and_salt);

    	$query= "INSERT INTO users(email,password)";
    	$query.="VALUES('$email','$password')";
    	 mysqli_query($conn,$query);
        print ("<script>window.alert('Successfully added!!!')</script>");
        print ("<script>window.location.assign('sign-up_security.php')</script>");

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
                        <h3>Register with 263Lyrics</h3>
                        <p>Create an account today and enjoy our service even more</p>
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
                        <h3 style="margin-left: 15px">Sign up here</h3>
                        <form  action="" method="post" enctype="multipart/form-data">

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Username *" name="email"
                                       id="input_name" required=""/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" placeholder="Enter password*" name="password"
                                       id="input_email" required=""/>
                            </div>
                            <button  class="pull-right" type="submit" id="" name="save">
                                Sign Up
                            </button>
                        </form>
                    </div>
                </div><!-- Contact Form /- -->
                <!-- Contact Details -->
            </div><!-- Row /- -->
        </div><!-- Container -->

    </main>

</div>

<?php
include 'includes/footer.php';

?>