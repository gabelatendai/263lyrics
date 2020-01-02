<?php
include 'includes/header.php';
include 'rb.php';


 $db= R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB

$init = R::findOne('users', 'email = ? ', [$email]);
if (isset($_POST['save'])) {

    $pass =$_POST['password'] ;
    $passconfrm = $_POST['passconfirm'];


    $email = $_POST['email'];
    $init = R::findOne('users', 'email = ? ', [$email]);
    if($pass != $passconfrm){
        print ("<script>window.alert('Your password doesnt match please retype your password!!!')</script>");
        print ("<script>window.location.assign('signup.php')</script>");
    }
	elseif($init> 0 ){
        print ("<script>window.alert('Email address already registered with another user!!!')</script>");
        print ("<script>window.location.assign('signup.php')</script>");
    }
    else{

    	//$hashFormat ="$2y$10$";
    	//$salt="iusesomecrazystrings22";
    	//$hashFor_salt = $hashFormat.$salt;

    	//$encript_password =crypt($pass,$hashFor_salt);

        $filetmp= $_FILES['image']['tmp_name'];
        $filename = $_FILES['image']['name'];
        $filetype = $_FILES['image']['tmp_name'];
        $filepath= "uploads/images/".$filename;

        move_uploaded_file( $filetmp,$filepath);

        $admin = R::dispense('users');
        $admin->fname = $_POST['fname'];
        $admin->sname = $_POST['sname'];
        $admin->email = $_POST['email'];
        $admin->type = $_POST['type'];
        $admin->image = $filepath;
        $admin->about = $_POST['about'];
        $admin->address = $_POST['address'];
        $admin->pnumber = $_POST['pnumber'];
        $admin->password =md5($pass);
        $admin->admin =0;
        R::store($admin);

        print ("<script>window.alert('Successfully added!!!')</script>");
        print ("<script>window.location.assign('account.php')</script>");
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
                        <form  action="sign-up.php" method="post" enctype="multipart/form-data">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="First Name *" name="fname"
                                       id="input_name" required=""/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Surname *" name="sname"
                                       id="input_name" required=""/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Email Address *" name="email"
                                       id="input_name" required=""/>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="type"   class="form-control">
                                    <option>Select Account Type</option>
                                    <option value="regular">Regular</option>
                                    <option value="artist">Artist</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="files" class="form-control">Select Profile Image</label>
                                <input type="file" class="form-control" placeholder="Profile picture*" name="image"
                                       id="input_email" required=""/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" placeholder="Enter password*" name="password"
                                       id="input_email" required=""/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" placeholder="Confirm password*" name="passconfirm"
                                       id="input_email" required=""/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Phone Number*" name="pnumber"
                                       id="input_number" required=""/>
                            </div>
                           <div class="form-group col-md-12">
                                <textarea type="text" class="form-control" placeholder="Enter tour address*" name="address"
                                       id="input_address" required=""></textarea>
                            </div>
                           <div class="form-group col-md-12">
                                <textarea type="text" class="form-control" placeholder="About me*" name="about"
                                       id="input_about" required=""></textarea>
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