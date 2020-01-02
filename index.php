<?php
include 'includes/header.php';
include 'rb.php';
require 'vendor/autoload.php';
require 'includes/functions.php';

use \RedBeanPHP\R as R;
//R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB

R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

$slidersLarge = R::findAll('slider', 'WHERE type = ?', ['large']);
$slidersSmall = R::findAll('slider', 'WHERE type = ?', ['small']);
$collection = collect();

foreach ($slidersLarge as $large) {
    $valArray = array();
    $i = 0;
    foreach ($slidersSmall as $small) {
        if ($i < 4) {
            array_push($valArray, $small);
        }
        $i++;
    }

    $collection->push(array("large" => $large, "small" => $valArray));
}
?>


<div class="main-container">
    <main class="site-main">

        <!-- Slider Section -->
        <div class="container-fluid no-left-padding no-right-padding slider-section">
            <!-- Container -->
            <div class="container">
                <div id="slider-1" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php
                        $count = 0;

                        foreach ($collection as $slider) {
                            ?>
                            <div class="item <?php if ($count == 0) {
                                echo 'active';
                            } ?>">
                                <div class="col-md-6 col-sm-6 col-xs-6 big-post">
                                    <!-- Type Post -->
                                    <div class="type-post color-1">
                                        <div class="entry-cover"><a href="#"><img
                                                        src="admin/<?php echo $slider['large']->imagepath ?>"
                                                        alt="Post"/></a></div>
                                        <div class="entry-content">
                                            <div class="post-category"><a href="#"
                                                                          title="World"><?php echo $slider['large']->tag ?></a>
                                            </div>
                                            <h3 class="entry-title"><a
                                                        href="#"><?php echo $slider['large']->caption ?></a></h3>
                                            <p><?php echo $slider['large']->description ?></p>
                                            <div class="entry-footer">
                                                <span class="post-date"><a href="#">08 July, 2016</a></span>
                                            </div>
                                        </div>
                                    </div><!-- Type Post /- -->
                                </div>
                                <?php
                                for ($i = 0; $i < count($slider['small']); $i++) {
                                    ?>
                                    <div class="col-md-3 col-sm-3 col-xs-6 thumb-post">
                                        <!-- Type Post -->
                                        <div class="type-post color-2">
                                            <div class="entry-cover"><a href="#"><img
                                                            src="admin/<?php echo $slider['small'][$i]->imagepath ?>"
                                                            alt="Post"/></a></div>
                                            <div class="entry-content">
                                                <div class="post-category"><a href="#"
                                                                              title="Travel"><?php echo $slider['small'][$i]->tag ?></a>
                                                </div>
                                                <h3 class="entry-title"><a
                                                            href="#"><?php echo $slider['small'][$i]->caption ?></a>
                                                </h3>
                                                <p><?php echo $slider['small'][$i]->description ?></p>
                                                <div class="entry-footer">
                                                    <span class="post-date"><a href="#">12 June, 2016</a></span>
                                                </div>

                                            </div>
                                        </div><!-- Type Post /- -->
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                            $count++;
                        }
                        ?>
                    </div>
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php
                        $count = 0;

                        foreach ($collection as $slider) {
                            ?>
                            <li data-target="#slider-1" data-slide-to="<?php echo $count ?>"
                                class="<?php if ($count == 0) echo "active"; ?>"></li>
                            <?php
                            $count++;
                        }
                        ?>
                    </ol>
                </div>
            </div><!-- Container /- -->
        </div><!-- Slider Section -->

        <!-- Recent Post -->
        <div class="container-fluid no-left-padding no-right-padding recent-post">
            <!-- Container -->
            <div class="container">
                <div class="section-header">
                    <h3>RECENT POSTS</h3>
                </div>
                <!-- Row -->
                <div class="row">
                    <?php $sliders = R::findAll('news','Order by date Desc Limit 3');

                    foreach ($sliders as $news) {
                        $id=$news->id;
                        ?>

		                <div class="col-md-4 col-sm-6 col-xs-6">
			                <!-- Type Post -->
			                <div class="type-post color-1">
				                <div class="entry-cover"><a href="#"><img src="admin/<?php echo $news->image; ?>" alt="Post"/></a>
				                </div>
				                <div class="entry-content">
					                <div class="post-format"><i class="fa fa-play"></i></div>
					                <div class="post-category"><a href="#" title="business"><?php echo $news->category; ?></a></div>
					                <h3 class="entry-title"><a href="#"><?php echo $news->title; ?></a>
					                </h3>
					                <p><?php
						                $date =$news->date;
                                        $new_description=$news->description;
                                        if (strlen($new_description) > 20) {

                                            // truncate string
                                            $stringCut = substr($new_description, 0, 40);
                                            $new_description = substr($stringCut, 0, strrpos($stringCut, ' ')).'..........  ';
                                        }
                                        echo $new_description; ?></p>
					                <div class="entry-footer">
						                <span class="post-date"><a href="#"><?php echo $date; ?></a></span>
						                <span class="post-like"><i class="fa fa-heart-o"></i><a href="#">320</a></span>
						                <span class="post-view"><i class="fa fa-eye"></i><a href="#">2350</a></span>
					                </div>
					                <a href="blog-page.php<?php echo '?id='.$id; ?>" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
				                </div>
			                </div><!-- Type Post /- -->
		                </div>
                    <?php } ?>                </div><!-- Row /- -->
            </div><!-- Container /- -->
        </div><!-- Recent Post /- -->

        <!-- Largest Post -->
        <div class="container-fluid no-left-padding no-right-padding largest-post-block">
            <!-- Container -->
            <div class="container">
                <!-- Section Header -->
                <div class="section-header">
                    <h3>largest posts</h3>
                </div><!-- Section Header /- -->
                <!-- Row -->
                <div class="row">
                    <?php $lyrics = R::findAll('lyrics','Order by date Desc Limit 6');

                    foreach ($lyrics as $lyry) {
                    $id=$lyry->slug;
                    ?>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <!-- Type Post -->
                        <div class="type-post larg-post color-7">
                            <div class="entry-cover"><a href="#"><img src="<?php echo $lyry->image;?>"
                                                                      alt="Post"/></a></div>
                            <div class="entry-content">
                                <div class="post-category"><a href="#" title="ECONOMIC"><?php echo $lyry->type;?></a></div>
                                <h3 class="entry-title"><a href="#"><?php echo $lyry->name;?></a></h3>
                                <p><?php
                                    $description=$lyry->lyrics;
                                    if (strlen($description) > 20) {

                                        // truncate string
                                        $stringCut = substr($description, 0, 60);
                                        $description = substr($stringCut, 0, strrpos($stringCut, ' ')).'..........  ';
                                    }
                                    echo $description; ?></p>
                                <div class="entry-footer">
                                    <span class="post-date"><a href="#"><?php echo $lyry->date;?></a></span>
                                    <span class="post-like"><i class="fa fa-heart-o"></i><a href="#">651</a></span>
                                    <span class="post-view"><i class="fa fa-eye"></i><a href="#">253</a></span>
                                </div>
                                <a href="single-page.php<?php echo '?slug='.$id; ?>" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div><!-- Type Post /- -->
                    </div>
                    <?php } ?>
                </div><!-- Row /- -->
            </div><!-- Container /- -->
        </div><!-- Largest Post /- -->

        <!-- Latest Vidoe -->
        <div class="container-fluid no-left-padding no-right-padding latest-video-block">
            <!-- Container -->
            <div class="container">
                <!-- Section Header --><!-- Section Header /- -->
                <!-- Row ---- Row /- -->
                <div class="col-md-12 load-more">
                    <a href="#" title="Load More">Load More</a>
                </div>
            </div><!-- Container /- -->
        </div><!-- Latest Vidoe /- -->

    </main>

</div>

<?php
include 'includes/footer.php'
?>
