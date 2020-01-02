<?php
include 'includes/header.php';
include 'rb.php';
R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB

$video = $_GET['id'];

 $init = R::findOne('videos', 'id = ?', [$video]);
?>
	<div class="main-container">
	
		<main class="site-main">
		
			<!-- Single Post -->
			<div class="container-fluid no-left-padding no-right-padding single-post">
				<!-- Container -->
				<div class="container">
					<div class="row">
						<!-- Content Area -->
						<div class="col-md-8 col-sm-6 col-xs-6 content-area">
							<article class="type-post">
								<div class="entry-cover">
									<div class="embed-responsive embed-responsive-16by9">
										<video id="my_video_1" class="video-js vjs-default-skin" controls data-setup="{}" preload="auto" width="100%" height="450" poster="my_video_poster.png">

											<source src="<?php echo $init->video; ?>" type='video/mp4'>
										</video>
									</div>
								</div>
								<div class="entry-content">
									<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon by his unique stories in the magazine.Newshub is known for his excellent interface and eye catching design.Newshub is one of the excellent magazine in the world.Newshub magazine reached many readers very soon by his unique stories in the magazine.</p>
									<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon by his unique stories in the magazine.Newshub is known for his excellent interface and eye catching design reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon by his unique stories in the magazine.Newshub is known for his excellent interface and eye catching designNewshub is one of the excellent magazine in the world.Newshub magazine reached  very soon by his unique stories in the magazine  reached many readers very soon by his unique .</p>
									<blockquote>
										<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon by his unique stories in the magazine.Newshub is known for his excellent interface and eye catching design.Newshub is one of the excellent magazine in the world.Newshub magazine cis one of the excellent magazine in the world.Newshub magazine.</p>
									</blockquote>
									<p>Reporter is one of the excellent magazine in the world.Reporter magazine reached many readers very soon by his unique stories in the magazine.Newshub is known for his excellent interface and eye catching design.Newshub is one of the excellent magazine in the world.</p>
									<p>Reporter magazine reached many readers very soon by his unique stories in the magazine.Reporter is known for his excellent interface and eye catching design. </p>
								</div>
								
								<!-- About Author -->
								<div class="about-author-box">
									<h3>About Author</h3>
									<div class="author">
										<i><img src="assets/images/author.jpg" alt="Author" /></i>
										<h4>Tommy Walker</h4>
										<ul>
											<li><a href="#" class="fb" title="Facebook"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#" class="tw" title="Twitter"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#" class="go" title="Google"><i class="fa fa-google"></i></a></li>
											<li><a href="#" class="ln" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
										</ul>
										<p>reporter is one of the excellent magazine in the world.Newshub magazine reach many readers are very soon by his unique stories in the magazine.</p>
									</div>
								</div><!-- About Author /- -->
							</article>
							
							<!-- Comment Area -->
							<div id="comments" class="comments-area">
								<h2 class="comments-title">Comments <span>(3)</span></h2>
								<ol class="comment-list">
									<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1 parent">
										<div class="comment-body">
											<footer class="comment-meta">
												<div class="comment-author vcard">
													<img alt="img" src="assets/images/comment1.jpg" class="avatar avatar-72 photo"/>
													<b class="fn">Michel Tei</b>
												</div>
												<div class="comment-metadata"><a href="#">Oct 3, 2016</a></div>
											</footer>
											<div class="comment-content">
												<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon by his unique stories in the magazine.</p>
											</div>
											<div class="reply">
												<a rel="nofollow" class="comment-reply-link" href="#">Reply</a>
											</div>
										</div>
										<ol class="children">
											<li class="comment byuser comment-author-admin bypostauthor odd alt depth-2 parent">
												<div class="comment-body">
													<footer class="comment-meta">
														<div class="comment-author vcard">
															<img alt="img" src="assets/images/comment2.jpg" class="avatar avatar-72 photo"/>
															<b class="fn">Woes katrin</b>
														</div>
														<div class="comment-metadata"><a href="#">Oct 8, 2016</a></div>
													</footer>
													<div class="comment-content">
														<p>reporter is one of the excellent magazine in the world.Newshub magazine reach many readers very soon by his unique stories in the magazine.</p>
													</div>
													<div class="reply">
														<a rel="nofollow" class="comment-reply-link" href="#">Reply</a>
													</div>
												</div>
											</li>
										</ol>
									</li>
									<li class="comment byuser comment-author-admin bypostauthor even thread-odd thread-alt depth-1">
										<div class="comment-body">
											<footer class="comment-meta">
												<div class="comment-author vcard">
													<img alt="img" src="assets/images/comment3.jpg" class="avatar avatar-72 photo"/>
													<b class="fn">David Worth</b>
												</div>
												<div class="comment-metadata"><a href="#">Oct 10, 2016</a></div>
											</footer>
											<div class="comment-content">
												<p>Reporter is one of the excellent magazine in the world.Newshub magazine reached many readers very soon by his unique stories in the magazine.</p>
											</div>
											<div class="reply">
												<a rel="nofollow" class="comment-reply-link" href="#">Reply</a>
											</div>
										</div>
									</li>
								</ol><!-- .comment-list -->
								<!-- Comment Form -->
								<div id="respond" class="comment-respond">
									<h2 id="reply-title" class="comment-reply-title">Leave a comment</h2>
									<form method="post" id="commentform" class="comment-form">
										<p class="comment-form-author">
											<input id="author" name="author" placeholder="Name *" required="required" type="text"/>
										</p>
										<p class="comment-form-email">
											<input id="email" name="email" placeholder="Your@email.com *" required="required" type="email"/>
										</p>
										<p class="comment-form-comment">
											<textarea id="comment" placeholder="Your Comment" name="comment" rows="5" required="required"></textarea>
										</p>
										<p class="form-submit">
											<input name="submit" class="submit" value="Post Comment" type="submit"/>
										</p>
									</form>
								</div><!-- Comment Form /- -->
							</div><!-- Comment Area /- -->
							
						</div><!-- Content Area /- -->
						
						<!-- Widget Area -->
						<div class="col-md-4 col-sm-6 col-xs-6 widget-area">
							<!-- Widget Recent Post -->
							<aside class="widget widget_latestposts">
								<h3 class="widget-title">Recent Posts</h3>
								<div class="latest-content-box">
									<div class="latest-content color-5">
										<a href="#" title="Recent Posts"><i><img src="assets/images/wd-rcnt-1.jpg" class="wp-post-image" alt="blog-1"></i></a>
										<span><a href="#" title="POLITICS">POLITICS</a> <a href="#">22 OCT 2014</a></span>
										<h5><a title="Qaim says prominent people arrested" href="#">Qaim says prominent people arrested </a></h5>
									</div>
									<div class="latest-content color-2">
										<a href="#" title="Recent Posts"><i><img src="assets/images/wd-rcnt-2.jpg" class="wp-post-image" alt="blog-1"></i></a>
										<span><a href="#" title="SPORTS">SPORTS</a> <a href="#">22 OCT 2014</a></span>
										<h5><a title="Way now cleared for Australian" href="#">Way now cleared for Australian </a></h5>
									</div>
									<div class="latest-content color-3">
										<a href="#" title="Recent Posts"><i><img src="assets/images/wd-rcnt-3.jpg" class="wp-post-image" alt="blog-3"/></i></a>
										<span><a href="#" title="BUSINESS">BUSINESS</a> <a href="#">22 OCT 2014</a></span>
										<h5><a title="EU exit would leave Britain with zero" href="#">EU exit would leave Britain with zero</a></h5>
									</div>
								</div>
								<div class="see-more"><a href="#" title="SEE MORE POST">SEE MORE POST</a></div>
							</aside><!-- Widget Recent Post -->
							
							<!-- Popular Video -->
							<aside class="widget widget_video">
								<h3 class="widget-title">POPULAR VIDEOS</h3>
								<div class="video-block">
									<div class="video-post">
										<a href="#"><img src="assets/images/popular-video1.jpg" alt="Popular Video" /></a>
										<h5><a href="#"><i class="fa fa-play"></i>Qaim says prominent people arrested </a></h5>
									</div>
									<div class="video-post">
										<a href="#"><img src="assets/images/popular-video2.jpg" alt="Popular Video" /></a>
										<h5><a href="#"><i class="fa fa-play"></i>Way now cleared for Australian </a></h5>
									</div>
									<div class="video-post">
										<a href="#"><img src="assets/images/popular-video3.jpg" alt="Popular Video" /></a>
										<h5><a href="#"><i class="fa fa-play"></i>Way now cleared for Australian </a></h5>
									</div>
								</div>
								<div class="see-more"><a href="#" title="SEE MORE Video">SEE MORE Video</a></div>
							</aside><!-- Popular Video /- -->
						</div><!-- Widget Area /- -->
					</div>
				</div><!-- Container /- -->
			</div><!-- Single Post /- -->
		
		</main>

	</div>

<?php
include 'includes/footer.php'
?>
