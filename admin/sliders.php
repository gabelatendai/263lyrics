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

if (isset($_POST['caption'])) {
    require 'smart_image_resize_function.php';

    $slider = R::dispense('slider');

    $slider->caption = $_REQUEST['caption'];
    $slider->tag = $_REQUEST['tag'];

    if ($_REQUEST['imagesize'] == 'large') {
        //process upload and save it as a large picture
        $error = FALSE;
        $stamp = time();
        $uploaddir = 'uploads/sliders/';

        $uploadfile = $uploaddir . '-' . $stamp . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            $baseimage = $uploadfile;
            smart_resize_image($baseimage, 619, 518, false, $baseimage, true, false);
        } else {
            $baseimage = "images/placeholder.png";
        }
        $slider->type = $_POST['imagesize'];
        $slider->imagepath = $baseimage;
        $slider->description = $_REQUEST['description'];
    } else if ($_REQUEST['imagesize'] == 'small') {
        //process image small and save
        $error = FALSE;
        $stamp = time();
        $uploaddir = 'uploads/sliders/';

        $uploadfile = $uploaddir . '-' . $stamp . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            $baseimage = $uploadfile;
            smart_resize_image($baseimage, 269, 256, false, $baseimage, true, false);
        } else {
            $baseimage = "images/placeholder.png";
        }

        $slider->type = $_POST['imagesize'];
        $slider->imagepath = $baseimage;
        $slider->description = $_REQUEST['description'];
    }

    R::store($slider);
}


?>
    <div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>Add Homepage Sliders</h4>
                <p class="mg-b-0">Add Sliders to your homepages</p>
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
                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New Slider</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pd-25">

                                <form method="post" action="sliders" enctype="multipart/form-data">

                                    <div class="row mg-b-25">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Slider Tag: <span
                                                            class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="tag"
                                                       placeholder="Enter a tag here">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Image Title/Caption: <span
                                                            class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="caption"
                                                       placeholder="Enter Image caption here">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Select Image: <span class="tx-danger">*</span></label>
                                                <input style="height: auto!important" class="form-control" type="file"
                                                       name="image" placeholder="Pick your file">
                                            </div>
                                        </div><!-- col-4 -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Choose image size:</label><br/>
                                                <input style="margin: 10px" type="radio" checked name="imagesize"
                                                       value="large">Image Large<br/>
                                                <input style="margin: 10px" type="radio" name="imagesize" value="small">Image
                                                Small<br/>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mg-b-10-force">
                                                <label class="form-control-label">Slider Desciption/Highlight: <span
                                                            class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="description"
                                                       placeholder="Enter description or highlights">
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