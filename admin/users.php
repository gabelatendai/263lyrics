<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header('Location: index');
}

require '../vendor/autoload.php';
require '../includes/functions.php';

use \RedBeanPHP\R as R;

R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

include 'includes/header.php';

if (isset($_POST['save'])) {

    $pass =mysqli_real_escape_string($db,$_POST['password']) ;
    $passconfrm =mysqli_real_escape_string($db, $_POST['passconfirm']);


    $email = $_POST['email'];
    $init = R::findOne('users', 'email = ? ', [$email]);
    if($pass != $passconfrm){
        print ("<script>window.alert('Your password doesnt match please retype your password!!!')</script>");
        print ("<script>window.location.assign('users')</script>");
    }
	elseif($init> 0 ){
        print ("<script>window.alert('Email address already registered with another user!!!')</script>");
        print ("<script>window.location.assign('users')</script>");
    }
    else{

        $filetmp= $_FILES['image']['tmp_name'];
        $filename = $_FILES['image']['name'];
        $filetype = $_FILES['image']['tmp_name'];
        $filepath= "uploads/images/".$filename;

        move_uploaded_file( $filetmp,$filepath);

        $admin = R::dispense('admin');
        $admin->name = $_POST['name'];
         $admin->email = $_POST['email'];$admin->type = $_POST['type'];
        $admin->image = $filepath;
        $admin->pnumber = $_POST['pnumber'];
        $admin->password =$pass;
        R::store($admin);

        print ("<script>window.alert('Successfully added!!!')</script>");
        print ("<script>window.location.assign('users')</script>");
    }

}

?>
    <div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>Administrators</h4>
                <p class="mg-b-0">Add System Admin</p>
            </div>
        </div>

        <div class="br-pagebody">

            <div class="br-section-wrapper">
                <h6 class="br-section-label">Current Sliders</h6>
                <p class="br-section-text">Add, Edit, Update and Delete Sliders Homepage Sliders

                    <a class="btn btn-success" style="color: #FFF; float: right" data-toggle="modal"
                       data-target="#modaldemo1">Add New</a>
                </p>


                <!-- BASIC MODAL -->
                <div id="modaldemo1" class="modal fade">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bd-0 tx-14">
                            <div class="modal-header pd-y-20 pd-x-25">
                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New Admin</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pd-25">

                                <form method="post" action="users" enctype="multipart/form-data">

                                    <div class="row mg-b-25">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label"> Name <span
                                                            class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="name"
                                                       placeholder="Enter your name" required>
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Phone Number: <span
                                                            class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="pnumber"
                                                       placeholder="Enter Contact Number">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Select Image: <span class="tx-danger">*</span></label>
                                                <input style="height: auto!important" class="form-control" type="file"
                                                       name="image" placeholder="Pick your file" required>
                                            </div>
                                        </div><!-- col-4 -->
	                                    <div class="col-lg-6">
		                                 <div class="form-group">
			                                <label class="form-control-label">Email<span
						                                class="tx-danger">*</span></label>
			                                <input class="form-control" type="text" name="email"
			                                       placeholder="Enter email Address" required>
		                                   </div>
	                                     </div>
	                                    <div class="col-lg-6">
		                                     <div class="form-group">
			                                <label class="form-control-label">Password <span
						                                class="tx-danger">*</span></label>
			                                <input class="form-control" type="password" name="password"
			                                       placeholder="Enter user password" required>
		                                        </div>
	                                    </div>
	                                <div class="col-lg-6">
		                                <div class="form-group">
			                                <label class="form-control-label">Confirm Password <span
						                                class="tx-danger">*</span></label>
			                                <input class="form-control" type="password" name="passconfirm"
			                                       placeholder="Enter user password" required>
		                                </div>
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
                    </div><!-- modal-dialog -->
                </div><!-- modal -->
            </div>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                           <!-- <th class="wd-15p">Slider Name</th>-->
                            <th class="wd-15p">Slider Image</th>
                            <th class="wd-20p">Slider Caption</th>
                            <th class="wd-15p">Slider type</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $sliders = R::findAll('slider');

                        foreach ($sliders as $slider) {
                        	$id= $slider->id;
                            ?>
                            <tr>
	                            <td><img src="<?php echo $slider->imagepath ?>" height="70px" width="100px"></td>
                                <td><?php echo $slider->tag; ?></td>

                                <td><?php echo $slider->type; ?></td>
	                            <td><a class="pull-right" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
			                            <b> <p>Delete</p></b></a>


		                            <!-- delete modal user -->
		                            <div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			                            <div class="modal-dialog">
				                            <div class="modal-content">
					                            <div class="modal-header">
						                            <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Slider</h4>
					                            </div>
					                            <div class="modal-body">
						                            <div class="alert alert-danger">
							                            Are you sure you want to delete?
						                            </div>
						                            <div class="modal-footer">
							                            <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
							                            <a href="delete-slider.php<?php echo '?id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
						                            </div>
					                            </div>
				                            </div>
			                            </div>
		                            </div>
	                            </td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
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