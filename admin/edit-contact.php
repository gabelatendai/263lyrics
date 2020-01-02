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
$db = mysqli_connect("localhost", "root", "", "263lyrics");

$id = $_GET['id'];
if (isset($_POST['save'])) {

    $email = $_POST['email'];
    $adress = $_POST['address'];
    $pnumber = $_POST['pnumber'];
    $motto = $_POST['motto'];

    mysqli_query ($db,"UPDATE `contactus` SET `email`='$email',`adress`='$adress',`pnumber`='$pnumber',`motto`='$motto' WHERE `id`='$id'");

    print ("<script>window.alert('Successfully updated!!!')</script>");
    print ("<script>window.location.assign('contact.php')</script>");

}

?>
    <div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>Company Information</h4>
                <p class="mg-b-0">Update Company Information</p>
            </div>
        </div>

        <div class="br-pagebody">

            <div class="br-section-wrapper">
                <h6 class="br-section-label">Current Company Information</h6>
                <p class="br-section-text">Update Company Information
                </p>



                <div class="table-wrapper">
	                <div class="modal-body">
							                            <?php
                                                       // $id = $_GET['id'];
                                                        if (isset($_GET['id']))
                                                        {
                                                            $init = R::load('contactus', $id);
															$mail =$init->email;
															$number =$init->pnumber;
															$mott=$init->motto;
															$address =$init->adress;
                                                        }
							                            ?>
			                <form method="post" action="" enctype="multipart/form-data">
								                            <div class="row mg-b-25">
									                            <div class="col-lg-6">
										                            <div class="form-group">
											                            <label class="form-control-label">Email: <span
														                            class="tx-danger">*</span></label>
											                            <input class="form-control" type="email" value="<?php echo $mail ?>" name="email"
											                                   placeholder="Enter a tag here">
										                            </div>
									                            </div><!-- col-4 -->
									                            <div class="col-lg-6">
										                            <div class="form-group">
											                            <label class="form-control-label">Phone Number: <span
														                            class="tx-danger">*</span></label>
											                            <input class="form-control" type="text" value="<?php echo $number ?>" name="pnumber"
											                                   placeholder="Enter Phone Number">
										                            </div>
									                            </div><!-- col-4 -->
									                            <div class="col-lg-12">
										                            <div class="form-group mg-b-10-force">
											                            <label class="form-control-label">About: <span
														                            class="tx-danger">*</span></label>
											                            <input class="form-control" type="text" value="<?php echo $mott ?>" name="motto"
											                                   placeholder="Enter Company Motto">
										                            </div>
									                            </div><!-- col-8 -->
									                            <div class="col-lg-12">
										                            <div class="form-group mg-b-10-force">
											                            <label class="form-control-label">Company Address: <span
														                            class="tx-danger">*</span></label>
											                            <textarea class="form-control" type="text" name="address" value="<?php echo $address ?>"
											                                      placeholder="Enter address"><?php echo $address ?></textarea>
										                            </div>
									                            </div><!-- col-8 -->
								                            </div>

								                            <div class="modal-footer">
									                            <button type="submit" name="save"
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