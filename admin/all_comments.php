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

//$c_id= $_GET['id'];
?>
    <div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>Comments</h4>
                <p class="mg-b-0">all comments</p>
            </div>
        </div>

        <div class="br-pagebody">

            <div class="br-section-wrapper">
                <h6 class="br-section-label">Current Comments</h6>
                <p class="br-section-text">Add, Edit, Update and Delete comments
                </p>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                           <!-- <th class="wd-15p">Slider Name</th>-->
                            <th class="wd-15p">Name Of Commenter</th>
                            <th class="wd-20p">SongName</th>
                            <th class="wd-20p">Email</th>
                            <th class="wd-15p">Comment</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $comments= R::findAll('comments');

                        foreach ($comments as $slider) {
                        	$id= $slider->id;
                        	$c_id= $slider->lyric_id;
                            $user = R::findOne('lyrics', 'id=?',[$c_id]);
                            $l_id= $user->id;

                            ?>
                            <tr>
	                            <td><?php echo $slider->name ?></td>
	                            <td><a href="single_lyric<?php echo '?id='.$l_id; ?>"><?php echo $user->name; ?></a></td>
	                            <td><?php echo $slider->email; ?></td>
	                            <td><?php echo $slider->comment; ?></td>
	                            <td><a class="pull-right" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
			                            <b> <p>Delete</p></b></a>


		                            <!-- delete modal user -->
		                            <div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			                            <div class="modal-dialog">
				                            <div class="modal-content">
					                            <div class="modal-header">
						                            <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Comment</h4>
					                            </div>
					                            <div class="modal-body">
						                            <div class="alert alert-danger">
							                            Are you sure you want to delete?
						                            </div>
						                            <div class="modal-footer">
							                            <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
							                            <a href="delete-comment.php<?php echo '?id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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