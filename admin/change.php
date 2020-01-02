<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 30/3/2019
 * Time: 19:45
 */
?>
<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header('Location: index');
}

require '../vendor/autoload.php';
require '../includes/functions.php';
include 'includes/header.php';
use \RedBeanPHP\R as R;

R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
//R::setup('mysql:host=localhost;dbname=wwwlyric_db', 'wwwlyric_user', 'r3kmD0].l1wO'); //for both mysql or mariaDB
$db = mysqli_connect("localhost", "root", "", "263lyrics");

$id =$_SESSION['auth'];
//$init= mysqli_query($db,"SELECT * FROM admin WHERE id='$id'");
//$member = mysqli_fetch_assoc($init);

if (isset($_POST['send'])) {




$oldpass=$_POST['oldpass'];

$password= $_POST['password'];


if($password != $oldpass){
    print ("<script>window.alert('Your old password doesnt match please retype your password!!!')</script>");
    print ("<script>window.location.assign('admins.php')</script>");
}

    $pass=md5($password);
   mysqli_query ($db,"UPDATE `admin` SET `password`='$pass' WHERE `id`='$id'");
    print ("<script>window.alert('Password Successfully changed!!!')</script>");
 print ("<script>window.location.assign('logout')</script>");

}

?>
<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Admin Profile</h4>
            <p class="mg-b-0">Update Profile</p>
        </div>
    </div>

    <div class="br-pagebody">

        <div class="br-section-wrapper">
            <h6 class="br-section-label">Admin Information</h6>
            <p class="br-section-text">Change Password
            </p>



            <div class="table-wrapper">
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label"> Old Password  <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="password" name="oldpass"
                                           placeholder="Enter your old password" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">New Password <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="password" name="password"
                                           placeholder="Enter New Password">
                                </div>
                            </div><!-- col-4 -->
                            <div class="modal-footer">
                                <button type="submit" name="send"
                                        class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">
                                    Save changes
                                </button>
                                <button type="button"
                                        class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                                        data-dismiss="modal">Close
                                </button>
                            </div>

                    </form>
                </div>
            </div>
        </div>

    </div><!-- table-wrapper -->

</div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->

<footer class="br-footer">
    <div class="footer-left">
        <div class="mg-b-2">Copyright &copy; 2019. All Rights Reserved.</div>
        <div>263Lyrics.</div>
    </div>
    <div class="footer-right d-flex align-items-center">
        <span class="tx-uppercase mg-r-10">Share:</span>
        <a target="_blank" class="pd-x-5"
           href="#"><i
                class="fab fa-facebook tx-20"></i></a>
        <a target="_blank" class="pd-x-5"
           href="#"><i
                class="fab fa-twitter tx-20"></i></a>
    </div>
</footer>
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php
include 'includes/footer.php';
?>
