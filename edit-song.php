<?php
include 'includes/header.php';
include 'rb.php';

error_reporting(E_ALL);
R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB

$db = mysqli_connect("localhost", "root", "", "263lyrics");
$id = $_GET['id'];
$user_id= $_SESSION['user_id'];
if (isset($_POST['update'])) {


    $namm = $_POST['name'];
    $producer = $_POST['producer'];
    $typb = $_POST['type'];
    $writer = $_POST['writer'];
    $songby = $_POST['songby'];
    $featuring= $_POST['featuring'];
    $audio = $_POST['audio'];
    $video= $_POST['video'];
    $lyricf= $_POST['lyrics'];

   // mysqli_query($db,"UPDATE `lyrics` SET `name`='$nam',`type`='$typ',`lyrics`='$lyric' WHERE `id`='$id'");
    mysqli_query ($db,"UPDATE `lyrics` SET  `name`='$namm',`type`='$typb' ,`producer`='$producer',`writer`='$writer' ,`songby`='$songby' ,`featuring`='$featuring' ,`audio`='$audio' ,`video`='$video' WHERE `id`='$id'");

    ?>
	<script>
		alert(' Successfully Updated');
		window.location = "account.php?id=<?php echo $user_id;?>";
	</script>
    <?php
}

?>
 <div class="container">
  <div class="row">
 <div class="col-md-12 content-area">
  <div class="col-sm-10 ">
   <div class="contact-form">
    <h3 style="margin-left: 15px">Update Lyrics</h3>
<?php
if (isset($_GET['id']))
{
    $init = R::load('lyrics', $id);
    $name=$init->name;
    $lyrics=$init->lyrics;
    $image=$init->image;
    //$init = R::load('lyrics', $id);

}?>
	   <form  action="" method="post" enctype="multipart/form-data">
		   <div class="form-group col-md-6">
			   <input type="text" class="form-control" placeholder="Song By *" value="<?php echo $init->songby;?>" name="songby"
			          id="input_name" required=""/>
		   </div>
		   <div class="form-group col-md-6">
			   <input type="text" class="form-control" placeholder="song Title *" value="<?php echo $init->name;?>" name="name"
			          id="input_name" required=""/>
		   </div>
		   <div class="form-group col-md-6">
			   <select name="type"   class="form-control">
				   <option>Select Category</option>
				   <option value="Rap">Rap</option>
				   <option value="Pop">Pop</option>
				   <option value="R&B">R&B</option>
				   <option value="Christian">Christian</option>
				   <option value="HipHop">Hip Hop</option>
				   <option value="Dancehall"> Dancehall</option>
			   </select>
		   </div>
		   <div class="form-group col-md-6">
			   <input type="text" class="form-control" placeholder="Featuring *" value="<?php echo $init->featuring;?>" name="featuring"/>
		   </div>


		   <div class="form-group col-md-12">
			   <input type="text" class="form-control" placeholder="produced by *" value="<?php echo $init->producer;?>" name="producer"
			          id="input_name" required=""/>
		   </div>
		   <div class="form-group col-md-12">
			   <input type="text" class="form-control" placeholder="Written by *" value="<?php echo $init->writer;?>"  name="writer"
			          id="input_name" required=""/>
		   </div>

		   <div class="form-group col-md-12">
                                <textarea type="text" cols="2000" rows="20" class="md-textarea form-control" placeholder="Enter song lyrics *" name="lyrics"
                                          id="input_about" required=""><?php echo $init->lyrics;?> </textarea>
		   </div>
		   <div class="form-group col-md-12">
			   <input type="text" class="form-control" placeholder="Audio URL for downloads" value="<?php echo $init->audio;?>"  name="audio"
			          id="input_name" />
		   </div>
		   <div class="form-group col-md-12">
			   <input type="text" class="form-control" placeholder="Youtube Url"
			          value="<?php echo $init->video;?>"  name="video"
			          id="input_name" required=""/>
		   </div>
		   <br>
		   <br>
		   <br>
		   <button  class="pull-right" type="submit" id="" name="update">
			   Post Lyrics
		   </button>
	   </form>


   </div>
  </div>
 </div><!-- Content Area /- -->
  </div>
 </div>
<?php

?>

<?php
include 'includes/footer.php'
?>