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

    $filetmp= $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['tmp_name'];
    $filepath= "uploads/images/".$filename;
    move_uploaded_file( $filetmp,$filepath);

    $slider = R::dispense('contactus');
    $slider->email = $_POST['email'];
    $slider->adress = $_POST['address'];
    $slider->pnumber = $_POST['pnumber'];
    $slider->date = date('d-m-y');
    $slider->image = $filepath;
    $slider->motto = $_POST['motto'];
    R::store($slider);

    print ("<script>window.alert('Successfully added!!!')</script>");
    print ("<script>window.location.assign('contact.php')</script>");
}

?>
    <div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>Company Information</h4>
                <p class="mg-b-0">Add Company Information</p>
            </div>
        </div>

        <div class="br-pagebody">

            <div class="br-section-wrapper">
                <h6 class="br-section-label">Current Company Information</h6>
                <p class="br-section-text">Add, Edit, Update and Delete Company Information
                </p>



                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Logo</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-15p">Phone Number</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $sliders = R::findAll('contactus');

                        foreach ($sliders as $slider) {
                        	$id= $slider->id;
                            ?>
                            <tr>
                                <td><img src="<?php echo $slider->image ?>" width="70px" height="80px"></td>
                                <td><?php echo $slider->email ?></td>
                                <td><?php echo $slider->pnumber ?></td>
	                            <td><a class="pull-right" href="edit-contact.php ?id=<?php echo $id;?>">
			                            <b> <p>Edit</p></b></a>
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