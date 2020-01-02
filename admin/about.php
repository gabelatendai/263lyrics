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


    $about = R::dispense('about');

    $about->description = $_POST['description'];
    R::store($about);

    print ("<script>window.alert('Successfully added!!!')</script>");
    print ("<script>window.location.assign('about.php')</script>");
}

if (isset($_POST['send'])) {


    $filetmp= $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['tmp_name'];
    $filepath= "uploads/images/".$filename;
    move_uploaded_file( $filetmp,$filepath);


    $slider = R::dispense('aboutslide');
    $slider->image = $filepath;
    R::store($slider);

    print ("<script>window.alert('Successfully added!!!')</script>");
    print ("<script>window.location.assign('about.php')</script>");
}

if (isset($_POST['add'])) {


    $filetmp= $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['tmp_name'];
    $filepath= "uploads/images/".$filename;
    move_uploaded_file( $filetmp,$filepath);


    $members = R::dispense('members');
    $members->name =  $_POST['name'];;
    $members->about =  $_POST['description'];;
    $members->image = $filepath;
    R::store($members);

    print ("<script>window.alert('Successfully added!!!')</script>");
    print ("<script>window.location.assign('about.php')</script>");
}
?>
    <div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>About us</h4>
                <p class="mg-b-0">What We Do</p>
            </div>
        </div>

        <div class="br-pagebody">

            <div class="br-section-wrapper">
                <h6 class="br-section-label">About Us</h6>
                <p class="br-section-text">Update
                    <a class="btn btn-success" style="color: #FFF; float: right" data-toggle="modal"
                       data-target="#modaldemo1">About Us</a>
                </p>


                <!-- BASIC MODAL -->
                <div id="modaldemo1" class="modal fade">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bd-0 tx-14">
                            <div class="modal-header pd-y-20 pd-x-25">
                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New Article</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pd-25">

                                <form method="post" action="about" enctype="multipart/form-data">

                                    <div class="row mg-b-25">
                                        <div class="col-lg-12">
                                            <div class="form-group mg-b-10-force">
                                                <label class="form-control-label"> Desciption: <span
                                                            class="tx-danger">*</span></label>
                                                <textarea class="form-control" type="text" name="description"
                                                          placeholder="Enter description or highlights"></textarea>
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
                    </div><!-- modal-dialog -->
                </div><!-- modal -->
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
							<th class="wd-20p"> Description</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $about = R::findAll('about');

                        foreach ($about as $slid) {
                            $id=$slid->id;
                            ?>
                            <tr>
                                <td width="200px"><?php
$new_description= $slid->description;
                                    if (strlen($new_description) > 20) {

                                        // truncate string
                                        $stringCut = substr($new_description, 0, 40);
                                        $new_description = substr($stringCut, 0, strrpos($stringCut, ' ')).'..........  ';
                                    }
                                    echo $new_description; ?></td>
	                            <td><a class="pull-right" href="edit-about.php ?id=<?php echo $id;?>">
			                            <b> <p>Edit</p></b></a>
	                            </td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->

            </div>
	        <!-- br-section-wrapper -->

        </div><!-- br-pagebody -->

	    <div class="br-pagebody">

		    <div class="br-section-wrapper">
			    <h6 class="br-section-label">About Us</h6>
			    <p class="br-section-text">Update
				    <a class="btn btn-success" style="color: #FFF; float: right" data-toggle="modal"
				       data-target="#modaldemo">Add About Slide Images</a>
			    </p>


			    <!-- BASIC MODAL -->
			    <div id="modaldemo" class="modal fade">
				    <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content bd-0 tx-14">
						    <div class="modal-header pd-y-20 pd-x-25">
							    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add About Slide Images</h6>
							    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
							    </button>
						    </div>
						    <div class="modal-body pd-25">

							    <form method="post" action="about" enctype="multipart/form-data">

								    <div class="row mg-b-25">
									    <div class="col-lg-12">
										    <div class="form-group">
											    <label class="form-control-label">Select Image: <span class="tx-danger">*</span></label>
											    <input style="height: auto!important" class="form-control" type="file"
											           name="image" placeholder="Pick your file">
										    </div>
									    </div><!-- col-4 -->
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
				    </div><!-- modal-dialog -->
			    </div><!-- modal -->
			    <div class="table-wrapper">
				    <table id="datatable1" class="table display responsive nowrap">
					    <thead>
					    <tr>
						    <th class="wd-15p"> Image</th>
						    <th class="wd-10p">Action</th>
					    </tr>
					    </thead>
					    <tbody>

                        <?php

                        $sliders = R::findAll('aboutslide');

                        foreach ($sliders as $slider) {
                            $id=$slider->id;
                            ?>
						    <tr>
							    <td><img src="<?php echo $slider->image ?>" height="70px" width="100px"></td>
							    <td><a class="pull-right" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
									    <b> <p>Delete</p></b></a>


								    <!-- delete modal user -->
								    <div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									    <div class="modal-dialog">
										    <div class="modal-content">
											    <div class="modal-header">
												    <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Article</h4>
											    </div>
											    <div class="modal-body">
												    <div class="alert alert-danger">
													    Are you sure you want to delete?
												    </div>
												    <div class="modal-footer">
													    <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
													    <a href="delete-aboutslider.php<?php echo '?id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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

		    </div>
		    <!-- br-section-wrapper -->

	    </div>
	    <div class="br-pagebody">

		    <div class="br-section-wrapper">
			    <h6 class="br-section-label">About Us</h6>
			    <p class="br-section-text">Update
				    <a class="btn btn-success" style="color: #FFF; float: right" data-toggle="modal"
				       data-target="#modalteam">Add Our Team</a>
			    </p>


			    <!-- BASIC MODAL -->
			    <div id="modalteam" class="modal fade">
				    <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content bd-0 tx-14">
						    <div class="modal-header pd-y-20 pd-x-25">
							    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Team Member</h6>
							    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
							    </button>
						    </div>
						    <div class="modal-body pd-25">

							    <form method="post" action="about" enctype="multipart/form-data">
								    <div class="row mg-b-25">
									    <div class="col-lg-12">
										    <div class="form-group mg-b-10-force">
											    <label class="form-control-label"> Name: <span
														    class="tx-danger">*</span></label>
											    <input class="form-control" type="text" name="name"
											              placeholder="Enter Name"/>
										    </div>
									    </div><!-- col-8 -->
								    </div>

								    <div class="row mg-b-25">
									    <div class="col-lg-12">
										    <div class="form-group mg-b-10-force">
											    <label class="form-control-label"> Desciption: <span
														    class="tx-danger">*</span></label>
											    <textarea class="form-control" type="text" name="description"
											              placeholder="Enter description or highlights"></textarea>
										    </div>
									    </div><!-- col-8 -->
								    </div>

								    <div class="row mg-b-25">
									    <div class="col-lg-12">
										    <div class="form-group">
											    <label class="form-control-label">Select Image: <span class="tx-danger">*</span></label>
											    <input style="height: auto!important" class="form-control" type="file"
											           name="image" placeholder="Pick your file">
										    </div>
									    </div><!-- col-4 -->
								    </div>

								    <div class="modal-footer">
									    <button type="submit" name="add"
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
			    <div class="table-wrapper">
				    <table id="datatable1" class="table display responsive nowrap">
					    <thead>
					    <tr>
						    <th class="wd-15p"> Image</th>
						    <th class="wd-15p"> Name</th>
						    <th class="wd-15p"> About</th>
						    <th class="wd-10p">Action</th>
					    </tr>
					    </thead>
					    <tbody>

                        <?php

                        $sliders = R::findAll('members');

                        foreach ($sliders as $slider) {
                            $id=$slider->id;
                            ?>
						    <tr>

							    <td><img src="<?php echo $slider->image ?>" height="70px" width="100px"></td>
							    <td><?php echo $slider->name; ?></td>
							    <td><?php echo $slider->about; ?></td>
							    <td><a class="pull-right" href="edit-member.php ?id=<?php echo $id;?>">
									    <b> <p>Edit</p></b></a>
							    <a class="pull-right" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
									    <b> <p>Delete</p></b></a>


								    <!-- delete modal user -->
								    <div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									    <div class="modal-dialog">
										    <div class="modal-content">
											    <div class="modal-header">
												    <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Article</h4>
											    </div>
											    <div class="modal-body">
												    <div class="alert alert-danger">
													    Are you sure you want to delete?
												    </div>
												    <div class="modal-footer">
													    <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
													    <a href="delete-member.php<?php echo '?id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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

		    </div>
		    <!-- br-section-wrapper -->

	    </div>
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