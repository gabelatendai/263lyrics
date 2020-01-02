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
if (isset($_POST['send'])) {

    $name= $_POST['name'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];

    mysqli_query ($db,"UPDATE `admin` SET `name`='$name',`email`='$email',`pnumber`='$pnumber' WHERE `id`='$id'");

    print ("<script>window.alert('Successfully updated!!!')</script>");
    print ("<script>window.location.assign('updateprofile')</script>");

}

if (isset($_POST['update'])) {

    $filetmp= $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['tmp_name'];
    $filepath= "uploads/images/".$filename;
    move_uploaded_file( $filetmp,$filepath);

    mysqli_query ($db,"UPDATE `admin` SET `image`='$filepath' WHERE `id`='$id'");

    print ("<script>window.alert('Successfully updated!!!')</script>");
    print ("<script>window.location.assign('about.php')</script>");

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
				<p class="br-section-text">Update Information
				</p>



				<div class="table-wrapper">
					<div class="modal-body">
                        <?php
                        // $id = $_GET['id'];
                        if (isset($_GET['id']))
                        {
                            $init = R::load('admin', $id);
                            $username =$init->name;
                            $number =$init->pnumber;
                            $email =$init->email;
                            $image =$init->image;

                        }
                        ?>

						<form method="post" action="users" enctype="multipart/form-data">

							<div class="row mg-b-25">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label"> Name <span
													class="tx-danger">*</span></label>
										<input class="form-control" type="text" name="name" value="<?php echo  $username; ?>"
										       placeholder="Enter your name" required>
									</div>
								</div><!-- col-4 -->
								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label">Phone Number: <span
													class="tx-danger">*</span></label>
										<input class="form-control" type="text" name="pnumber" value="<?php echo  $number; ?>"
										       placeholder="Enter Contact Number">
									</div>
								</div><!-- col-4 -->

								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label">Email<span
													class="tx-danger">*</span></label>
										<input class="form-control" type="email" name="email" value="<?php echo  $email; ?>"
										       placeholder="Enter email Address" required>
									</div>
								</div>

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

	<div class="br-mainpanel">

		<div class="br-pagebody">

			<div class="br-section-wrapper">
				<p class="br-section-text">Change Image
				</p>



				<div class="table-wrapper">
					<div class="modal-body">


						<form method="post" action="" enctype="multipart/form-data">


							<div class="row mg-b-25">
								<img src="<?php echo $image;?>" width="200px" height="200px">
							</div>

							<div class="row mg-b-25">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label">Select Image: <span class="tx-danger">*</span></label>
										<input style="height: auto!important" class="form-control" type="file"
										       name="image" placeholder="Pick your file">
									</div>
								</div><!-- col-4-->
							</div>

							<div class="modal-footer">
								<button type="submit" name="update"
								        class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">
									Change Picture
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

	</div>
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