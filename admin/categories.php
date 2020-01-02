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



    $slider = R::dispense('categories');
    $slider->title = $_POST['title'];
    $slider->date = date('d-m-y');
    R::store($slider);

    print ("<script>window.alert('Successfully added!!!')</script>");
    print ("<script>window.location.assign('categories.php')</script>");
}


?>
    <div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>Categories</h4>
                <p class="mg-b-0">All Categories</p>
            </div>
        </div>

        <div class="br-pagebody">

            <div class="br-section-wrapper">
                <h6 class="br-section-label">Current Categories</h6>
                <p class="br-section-text">Add, Edit, Update and Delete News Categories
                    <a class="btn btn-success" style="color: #FFF; float: right" data-toggle="modal"
                       data-target="#modaldemo1">Add News Categories </a>
                </p>


                <!-- BASIC MODAL -->
                <div id="modaldemo1" class="modal fade">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bd-0 tx-14">
                            <div class="modal-header pd-y-20 pd-x-25">
                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New Category</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pd-25">

                                <form method="post" action="categories" enctype="multipart/form-data">

                                    <div class="row mg-b-25">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Category Title: <span
                                                            class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="title"
                                                       placeholder="Enter a title here">
                                            </div>
                                        </div><!-- col-4 -->
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
                            <th class="wd-15p">Category Title</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $sliders = R::findAll('categories');

                        foreach ($sliders as $slider) {
                            $id=$slider->id;
                            ?>
                            <tr>
                                <td><?php echo $slider->title ?></td>
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
								                            <a href="delete-category.php<?php echo '?id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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