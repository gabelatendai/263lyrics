<?php
include 'includes/header.php';
include 'rb.php';
require 'vendor/autoload.php';
require 'includes/functions.php';
use \RedBeanPHP\R as R;

R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
$init = R::findone('about');

?>


<div class="main-container">

    <main class="site-main">

        <!-- Container -->
        <div class="container">

            <!-- We Are Doing -->
            <div class="container-fluid we-are-doing-section">
                <!-- We Are Content -->
                <div class="col-md-6 we-are-content">
                    <h3>what we are doing</h3>
                    <p><?php echo $init->description;?></p><a href="contact-us" title="CONTACT US">CONTACT US</a>
                    <a href="#" title="KNOW MORE">KNOW MORE</a>
                </div><!-- We Are Content -->
                <!-- We Are Slider -->
                <div class="col-md-6 we-are-slider">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php
                            $about = R::findAll('aboutslide','Order by id Desc Limit 1');

                            foreach ($about as $slid) {
                            ?>
                            <div class="item active">
                                <i><img src="admin/<?php  echo $slid->image;?>" alt="We Are Slide"></i>
                            </div>
                           <?php }?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!-- We Are Slider /- -->
            </div><!-- We Are Doing /- -->
            <div class="clearfix"></div>
            <!-- Author Section -->

	        <!-- Author Section -->
	        <div class="container-fluid author-section">
		        <div class="author-block">
			        <h3 class="block-title">OUR Members</h3>
			        <div class="row">
				        <?php
                        $sliders = R::findAll('members');

                        foreach ($sliders as $slider) {
                        ?>


				        <div class="col-md-4 col-sm-6">
					        <div class="author-box">
						        <ul>
							        <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							        <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							        <li><a href="#" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						        </ul>
						        <h4><?php echo $slider->name  ?></h4>
						        <i><img src="admin/<?php echo $slider->image  ?>" alt="Author" /></i>
						        <p><?php echo $slider->about  ?></p>
					        </div>
				        </div>
				       <?php }?>
			        </div>
		        </div>
	        </div><!-- Author Section /- -->

        </div><!-- Container /- -->

    </main>

</div>
<?php
include 'includes/footer.php'
?>
