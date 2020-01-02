<?php
include 'includes/header.php';
include 'rb.php';

R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB

$db = mysqli_connect("localhost", "root", "", "263lyrics");

$id = $_GET['id'];
if (isset($_POST['update'])) {


    $name = $_POST['fname'];
    $sername = $_POST['sname'];
    $email = $_POST['email'];
    $des = $_POST['about'];
    $typ = $_POST['type'];
    $adress = $_POST['address'];
    $pnumber = $_POST['pnumber'];

    mysqli_query ($db,"UPDATE `users` SET `type`='$typ',`email`='$email',`address`='$adress',`pnumber`='$pnumber',`fname`='$name',`about`='$des',`sname`='$sername' WHERE `id`='$id'");

    ?>
	<script>
		alert('Record Successfully Updated');
		window.location = "account.php?id=<?php echo $id;?>";
	</script>
    <?php

}
if (isset($_POST['send'])) {


    $filetmp= $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['tmp_name'];
    $filepath= "uploads/images/".$filename;

    move_uploaded_file( $filetmp,$filepath);


    mysqli_query ($db,"UPDATE `users` SET `image`='$filepath' WHERE `id`='$id'");

    ?>
	<script>
		alert('Profile Successfully Updated');
		window.location = "edit_profile.php?id=<?php echo $id;?>";
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
			                       <?php
                                   if (isset($_GET['id']))
                                   {
                                       $user = R::load('users', $id);
                                       $fname =$user->fname;
                                       $sname =$user->sname;
                                       $email =$user->email;
                                       $pnumber =$user->pnumber;
                                       $address =$user->address;
                                       $about =$user->about;
                                       $image =$user->image;
                                   }
			                      ?><img src="<?php echo $image; ?>" >
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
                        <form  action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="First Name *" name="fname"
                                   value="<?php echo $fname; ?>"    id="input_name"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Surname *" name="sname"
                                       id="input_name" required=""  value="<?php echo $sname; ?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Email Address *" name="email"
                                       id="input_name"  value="<?php echo $email; ?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="type"  required class="form-control" >
                                    <option>Select Account Type</option>
                                    <option value="regular">Regular</option>
                                    <option value="artist">Artist</option>
                                </select>
                            </div>
                            <!--<div class="form-group col-md-12">
                                <label for="files" class="form-control">Select Profile Image</label>
                                <input type="file" class="form-control" placeholder="Profile picture*" name="image"
                                       id="input_email" required=""/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" placeholder="Enter password*" name="password"
                                       id="input_email" required=""/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" placeholder="Confirm password*" name="passconfirm"
                                       id="input_email" required=""/>
                            </div>-->
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Phone Number*" name="pnumber"
                                       id="input_number"  value="<?php echo $pnumber; ?>"/>
                            </div>
                           <div class="form-group col-md-12">
                                <textarea type="text" class="form-control" placeholder="Enter tour address*" name="address"
                                       id="input_address" > <?php echo $address; ?></textarea>
                            </div>
                           <div class="form-group col-md-12">
                                <textarea type="text" class="form-control" placeholder="About me*" name="about"
                                       id="input_about" ><?php echo $about; ?></textarea>
                            </div>
                            <button  class="pull-right" type="submit" id="" name="update">
                                Update
                            </button>
                        </form>
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