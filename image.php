<?php
include 'includes/header.php';
include 'rb.php';

R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB

$db = mysqli_connect("localhost", "root", "", "263lyrics");

if (isset($_POST['send'])) {

    $slider = R::dispense('image');
    if ($_REQUEST['imagesize'] == 'large') {

        $error = FALSE;
        $stamp = time();
        $uploaddir = 'uploads/sliders/';
        $uploadfile = $uploaddir . '-' . $stamp . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            $baseimage = $uploadfile;
            smart_resize_image($baseimage, 619, 518, false, $baseimage, true, false);
        }else {
            $baseimage = "images/placeholder.png";
        }
        $slider->imagepath = $baseimage;
        R::store($slider);
    }
    /*
     *

            $filetmp= $_FILES['image']['tmp_name'];
        $filename = $_FILES['image']['name'];
        $filetype = $_FILES['image']['tmp_name'];
        $filepath= "uploads/images/".$filename;

        move_uploaded_file( $filetmp,$filepath);
    */

   // mysqli_query ($db,"UPDATE `users` SET `image`='$baseimage' WHERE `id`='$id'");

    ?>
	<script>
		alert('Profile Successfully Updated');
		window.location = "image.php";
	</script>
    <?php

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
                        <h3>Update Your Profile</h3>
                        <p>Create an account today and enjoy our service even more</p>
                        <div class="detail-box">
                            <p><i class="fa fa-check"></i> Share your lyrics</p>
                            <p><i class="fa fa-check"></i> Like and bookmark content</p>
                            <p><i class="fa fa-check"></i> Access our programs</p>
	                        <form  action="" method="POST" enctype="multipart/form-data">
		                        <div class="form-group col-md-6">
		                        </div>
                                    <input type="file" class="form-control" placeholder="Profile picture*" name="image"
                                           id="input_email" required=""/>
		                        <button  class="pull-right" type="submit" id="" name="send">
			                        Change Profile Picture
		                        </button>
	                        </form>
                        </div>
                    </div>
                </div><!-- Contact Details /- -->
                <!-- Contact Form -->
                <div class="col-sm-6 col-xs-12">
                    <div class="contact-form">
                        <h3 style="margin-left: 15px">Update Profile here</h3>
                        <?php
                        // $id = $_GET['id'];

                        ?>
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