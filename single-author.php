<?php
include 'includes/header.php';

$id= $_GET['id'];
include "rb.php";


R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB

$init = R::findOne('users', 'id = ?', [$id]);

?>

<main class="site-main">

    <!-- Author Detail -->
    <div class="container-fluid author-details no-left-padding no-right-padding">
        <!-- Container -->
        <div class="container">
            <div class="author-cnt-block">
                <i><img src="<?php echo $init->image; ?>" alt="Author" /></i>
                <div class="author-cnt">
                    <a href="#"><i class="fa fa-envelope"></i><?php echo $init->email; ?></a>
                    <a href="#"><i class="fa fa-phone"></i> <?php echo $init->pnumber; ?></a>
                    <a href="#"><i class="fa fa-twitter"></i> Follow Us on Twitter</a>
                    <a href="#"><i class="fa fa-globe"></i> 263lyrics.com</a>
                </div>
            </div>
            <h3><?php echo $init->fname. '  ' . $init->sname; ?> <span><?php echo $init->type ; ?></span></h3>
            <p><i class="fa fa-map-marker"></i> <?php echo $init->address ; ?>a</p>
        </div><!-- Container /- -->
        <!-- Author Tabs -->
        <div class="container-fluid author-tabs no-left-padding no-right-padding">
            <div class="container">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation"><a href="#my-post" aria-controls="my-post" role="tab" data-toggle="tab">View Artiste's Post</a></li>
                    <li role="presentation" class="active"><a href="#about-me" aria-controls="about-me" role="tab" data-toggle="tab">about  Artist</a></li>
                    <li role="presentation"><a href="#popular-video" aria-controls="popular-video" role="tab" data-toggle="tab">popular VIDEO</a></li>
                </ul>
            </div>
        </div><!-- Author Tabs /- -->
    </div><!-- Author Detail -->

    <div class="container-fluid no-left-padding no-right-padding author-post tab-content">
        <!-- My Post -->
        <div role="tabpanel" class="tab-pane" id="my-post">
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <!-- Content Area -->
                    <div class="col-md-8 col-sm-6 col-xs-6 no-left-padding no-right-padding content-area">
                        <?php
                        //  $id= $_SESSION['user_id'];
                        $in = R::findall('lyrics', 'user_id = ?', [$id]);

                        foreach ($in as $iny) {
                            ?>

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!-- Type Post -->

						<div class="type-post color-1">
							<div class="entry-cover"><a href="#"><img src="<?php echo $iny->image;?>" alt="Post"/></a></div>
								<div class="entry-content">
									<div class="post-format"><i class="fa fa-play"></i></div>
									<div class="post-category"><a href="#" title="business"><?php echo $iny->name;?></a></div>
										<h3 class="entry-title"><a href="#"><?php echo $iny->type;?></a></h3>
										<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very
										soon.</p>
										<div class="entry-footer">
											<span class="post-date"><a href="#"><?php echo $iny->date;?></a></span>
											<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">320</a></span>
											<span class="post-view"><i class="fa fa-eye"></i><a href="#">2350</a></span>
									</div>
									<a href="single-page?slug=<?php echo $iny->slug;?>" title="Watch Now">Watch Now<i class="fa fa-angle-right"></i></a>
								</div>
						</div>

	                       <!-- Type Post /- -->
                        </div>
                            <?php
                        }
                        ?>
                    </div><!-- Content Area /- -->

                    <!-- Widget Area -->
                    <div class="col-md-4 col-sm-6 col-xs-6 widget-area">
                        <!-- Widget Recent Post -->
                        <aside class="widget widget_latestposts">
                            <h3 class="widget-title">Recent Posts</h3>
                            <div class="latest-content-box">
                                <?php
                                //  $id= $_SESSION['user_id'];
                                //$books = R::findAll( 'book' , ' ORDER BY title DESC LIMIT 10 ' );
                                $i = R::findall('lyrics','ORDER BY date ASC LIMIT 4 ');

                                foreach ($i as $iy) {
                                    ?>

		                            <div class="latest-content color-5">
			                            <a href="single-page?slug=<?php echo $iy->slug;?>" title="Recent Posts"><i><img src="<?php echo $iy->image; ?>" class="wp-post-image" alt="blog-1"></i></a>
			                            <span><a href="#" title="POLITICS"><?php echo $iy->type; ?></a> <a href="#"><?php echo $iy->date; ?></a></span>
			                            <h5><a title="Qaim says prominent people arrested" href="#"><?php echo $iy->name; ?></a></h5>
		                            </div>
                                <?php } ?>
                            </div>
                            <div class="see-more"><a href="#" title="SEE MORE POST">SEE MORE POST</a></div>
                        </aside><!-- Widget Recent Post -->

                        <!-- Popular Video -->
                           </div><!-- Widget Area /- -->
                </div>
            </div><!-- Container /- -->
        </div><!-- My Post -->
        <div role="tabpanel" class="tab-pane" id="add">
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <!-- Content Area -->
                    <!-- Widget Area -->
                    <div class="col-md-4 col-sm-6 col-xs-6 widget-area">
                        <!-- Widget Recent Post -->
                        <aside class="widget widget_latestposts">
                            <h3 class="widget-title">Recent Posts</h3>
                            <div class="latest-content-box">
                                <?php
                                //  $id= $_SESSION['user_id'];
                                $i = R::findall('lyrics','Order by id desc LIMIT 5');

                                foreach ($i as $iy) {
                                ?>

	                            <div class="latest-content color-5">
                                    <a href="#" title="Recent Posts"><i><img src="<?php echo $iy->image; ?>" class="wp-post-image" alt="blog-1"></i></a>
                                    <span><a href="#" title="POLITICS"><?php echo $iy->type; ?></a> <a href="#"><?php echo $iy->date; ?></a></span>
                                    <h5><a title="Qaim says prominent people arrested" href="#"><?php echo $iy->name; ?></a></h5>
                                </div>
                               <?php } ?>
                            </div>
                            <div class="see-more"><a href="#" title="SEE MORE POST">SEE MORE POST</a></div>
                        </aside><!-- Widget Recent Post -->

                       </div><!-- Widget Area /- -->
                </div>
            </div><!-- Container /- -->
        </div><!-- My Post -->

        <!-- About Me -->
        <div role="tabpanel" class="tab-pane active" id="about-me">
            <div class="container">
                <!-- We Are Doing -->
                <div class="container-fluid we-are-doing-section">
                    <!-- Author Content -->
                    <div class="col-md-6 author-content">
                        <h3>About me</h3>
                        <p><?php echo $init->about ; ?></p>
                         <a href="#my-post" aria-controls="my-post" role="tab" data-toggle="tab" title="View My Post">View Artiste's Post</a>
                    </div><!-- Author Content -->
                    <div class="col-md-6 author-image-block">
                        <i><img src="<?php echo $init->image ; ?>" alt="Author Image" /></i>
                    </div>
                </div><!-- We Are Doing /- -->

                <!-- Our Experience and Skills -->
            </div>
        </div><!-- About Me /- -->

        <!-- Popular Video -->
	    <div role="tabpanel" class="tab-pane" id="popular-video">
		    <!-- Container -->
		    <div class="container">
			    <div class="row">
				    <!-- Content Area -->
				    <div class="col-md-8 col-sm-6 col-xs-6 no-left-padding no-right-padding content-area">
                        <?php
                        //  $id= $_SESSION['user_id'];
                        //$books = R::findAll( 'book' , ' ORDER BY title DESC LIMIT 10 ' );
                        $news = R::findall('news','ORDER BY date Desc LIMIT 10 ');

                        foreach ($news as $post) {
                            ?>
						    <div class="col-md-6 col-sm-12 col-xs-12">
							    <!-- Type Post -->
							    <div class="type-post color-1">
								    <div class="entry-cover"><a href="#"><img src="admin/<?php echo $post->image; ?>" alt="Post" /></a></div>
								    <div class="entry-content">
									    <div class="post-format"><i class="fa fa-play"></i></div>
									    <div class="post-category"><a href="#" title="business"><?php echo $post->category; ?></a></div>
									    <h3 class="entry-title"><a href="#"><?php echo $post->title; ?></a></h3>
									    <p><?php
                                            $new_description=$post->description;
                                            if (strlen($new_description) > 20) {

                                                // truncate string
                                                $stringCut = substr($new_description, 0, 40);
                                                $new_description = substr($stringCut, 0, strrpos($stringCut, ' ')).'...  ';
                                            }
                                            echo $new_description; ?></p>
									    <div class="entry-footer">
										    <span class="post-date"><a href="#"><?php echo $post->date; ?></a></span>
										    <span class="post-like"><i class="fa fa-heart-o"></i><a href="#">320</a></span>
										    <span class="post-view"><i class="fa fa-eye"></i><a href="#">2350</a></span>
									    </div>
									    <a href="blog-page.php<?php echo '?id='.$post->id; ?>" title="Watch Now">Watch Now<i class="fa fa-angle-right"></i></a>
								    </div>
							    </div><!-- Type Post /- -->
						    </div>

                        <?php } ?>
				    </div><!-- Content Area /- -->

				    <!-- Widget Area -->
				    <div class="col-md-4 col-sm-6 col-xs-6 widget-area">
					    <!-- Widget Recent Post -->
					    <aside class="widget widget_latestposts">
						    <h3 class="widget-title">Recent Posts</h3>
						    <div class="latest-content-box">
                                <?php
                                //  $id= $_SESSION['user_id'];
                                //$books = R::findAll( 'book' , ' ORDER BY title DESC LIMIT 10 ' );
                                $i = R::findall('lyrics','ORDER BY date ASC LIMIT 4 ');

                                foreach ($i as $iy) {
                                    ?>

								    <div class="latest-content color-5">
									    <a href="single-page?slug=<?php echo $iy->slug;?>" title="Recent Posts"><i><img src="<?php echo $iy->image; ?>" class="wp-post-image" alt="blog-1"></i></a>
									    <span><a href="#" title="POLITICS"><?php echo $iy->type; ?></a> <a href="#"><?php echo $iy->date; ?></a></span>
									    <h5><a title="Qaim says prominent people arrested" href="#"><?php echo $iy->name; ?></a></h5>
								    </div>
                                <?php } ?>
						    </div>
						    <div class="see-more"><a href="#" title="SEE MORE POST">SEE MORE POST</a></div>
					    </aside><!-- Widget Recent Post -->

					    <!-- Popular Video -->
				    </div><!-- Widget Area /- -->
			    </div>
		    </div><!-- Container /- -->
	    </div><!-- Popular Video -->

    </div>

</main>

<?php
include 'includes/footer.php'
?>
