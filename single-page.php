<?php
include 'includes/header.php';

$id= $_GET['slug'];
include "rb.php";


R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB

$in = R::findone('lyrics', 'slug = ?', [$id]);
$lyric_id=$in->lyric_id;
$user_id = $in->user_id;
$init = R::findOne('users', 'id = ?', [$user_id]);

                        //   $id= $_SESSION['user_id'];




if (isset($_POST['send'])) {


   // $init = R::findOne('comments', 'email = ? ', [$email]);



        $comments = R::dispense('comments');
        $comments->name = $_POST['name'];
        $comments->comment = $_POST['comment'];
        $comments->email = $_POST['email'];
        $comments->lyric_id = $lyric_id;
       $comments->date = date('y-m-d');
        R::store($comments);

        $msg='comment added!!!';
       // print ("<script>window.alert('comment added!!!')</script>");
        //print ("<script>window.location.assign('account.php')</script>");


}

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
							<article class="type-post color-3">
								<div class="entry-cover">
									<img src="<?php echo $in->image?>" alt="Post" />
									<div class="entry-header">
										<div class="post-category"><a href="#" title="Business"><?php echo $in->type?></a></div>
										<h3 class="entry-title"><?php echo $in->name?></h3>
										<div class="entry-footer">
											<span class="post-date"><a href="#"><?php
                                                    $source = $in->date;
                                                    $date = new DateTime($source);
                                                  //  echo $date->format('d.m.Y');


                                                    echo $source;
                                                    ?></a></span>
											<span class="post-like"><i class="fa fa-heart-o"></i><a href="#"></a></span>
											<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">356</a></span>
											<span class="post-like"><i class="fa fa-heart-o"></i><a href="#">356</a></span>
											<span class="post-view"><i class="fa fa-eye"></i><a href="#">589</a></span>
										</div>
									</div>
								</div>
								<div  class="col-12 ">
								<div class="col-md-6">
									<p><b>Producer:</b> <i><?php echo $in->producer?></i></p>
									<p><b>Song By: </b><i><?php echo $in->songby?></i></p>
									<p><b>Featuring: </b><i><?php echo $in->featuring?></i></p>
									<p><b>Audio: </b><i><?php echo $in->audio?></i></p>
								</div>
								<div class="col-md-6 ">
									<p><b>Writer:</b> <i><?php echo $in->writer?></i></p>
									<p><b>Album: </b><i><?php echo $in->album?></i></p>
									<p><b>Posted By: </b><i><?php echo $init->fname . '  '. $init->sname;?></i></p>
									<p><b>Video: </b><i><?php echo $in->video;?></i></p>
								</div>
								</div>
								<div class="entry-content">
                                    <h1><?php echo $in->name;?></h1>

									<p><?php
                                        echo nl2br($in->lyrics);?></p>
									<div class="about-author-box">
										<div class="author">
											<ul>
												<li style="background-color: green"><a href="whatsapp://send?text=" title="Share On Whatsapp" onclick="window.open('whatsapp://send?text=%20Take%20a%20look%20at%20this%20awesome%20page%20-%20' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-whatsapp"></i></a></li>
												<li><a class="w-inline-block social-share-btn fb" href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;">
														<i class="fa fa-facebook"></i>	</a>
												<li><a href="https://twitter.com/home?status=" target="_blank" class="tw" title="Twitter"><i class="fa fa-twitter"
												                                                                                             onclick="window.open('https://twitter.com/home?status=' + encodeURIComponent(document.URL)); return false;"></i></a></li>
												<li> <a class="w-inline-block social-share-btn go" href="https://plus.google.com/share?url=" target="_blank" title="Share on Google+"
												        onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;">
														<i class="fa fa-google"></i>
													</a></li>

												<li><a class="w-inline-block social-share-btn ln" href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank"  title="Linkedin"
												       onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' + encodeURIComponent(document.title)); return false;"
													><i class="fa fa-linkedin"></i></a>

												</li>

											</ul>
										</div>
									</div>
								</div>

								<!-- About Author -->
								<!-- About Author /- -->
								<div class="about-author-box">
									<h3>About Author</h3>
									<div class="author">
										<i><img src="<?php echo $init->image?>"  width="50px" height="50px" alt="Author" /></i>
										<h4><?php echo $init->fname . '  '. $init->sname;?></h4>
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
							<?php $count = R::count('comments', 'lyric_id = ?', [$lyric_id]);
										?>
							<!-- Comment Area -->
							<div id="comments" class="comments-area">
								<h2 class="comments-title"> <span><?php
										if ($count>0){
                                            echo 'Comments'.$count;
										}
										 ?></span></h2>
								<ol class="comment-list">
									<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1 parent">
										<?php $in = R::findall('comments', 'lyric_id = ?', [$lyric_id]);
										foreach ($in as $comm){
?>
										<div class="comment-body">
											<footer class="comment-meta">
												<div class="comment-author vcard">
													<img alt="img" src="assets/images/comment1.jpg" class="avatar avatar-72 photo"/>
													<b class="fn"><?php echo $comm->name; ?></b>
												</div>
												<div class="comment-metadata"><a href="#">Oct 3, 2016</a></div>
											</footer>
											<div class="comment-content">
												<p><?php echo $comm->comment; ?></p>
											</div>
											<div class="reply">
												<a rel="nofollow" class="comment-reply-link" href="#">Reply</a>
											</div>
										</div>
											<?php } ?>
									</li>
								</ol><!-- .comment-list -->
								<!-- Comment Form -->
								<div id="respond" class="comment-respond">
									<h2 id="reply-title" class="comment-reply-title">Leave a comment</h2>
									<form method="post" id="commentform" class="comment-form">
										<p class="comment-form-author">
											<input id="author" name="name" placeholder="Name *" required="required" type="text"/>
										</p>
										<p class="comment-form-email">
											<input id="email" name="email" placeholder="Your@email.com *" required="required" type="email"/>
										</p>
										<p class="comment-form-comment">
											<textarea id="comment" placeholder="Your Comment" name="comment" rows="5" required="required"></textarea>
										</p><span class="success"><?php echo @$msg ;?></span>
										<p class="form-submit">
											<input name="send" class="submit" value="Post Comment" type="submit"/>
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
                                    <?php $news = R::findall('news' ,'Order BY id Desc LIMIT 5');
                                    foreach ($news as $c){
                                        ?>
										<div class="latest-content color-5">
											<a href="blog-page.php<?php echo '?id='.$c->id;; ?>" title="Recent Posts"><i><img src="admin/<?php echo $c->image;?>" class="wp-post-image" alt="blog-1"></i></a>
											<span><a href="#" title="POLITICS"><?php echo $c->categorty;?></a> <a href="#"><?php echo $c->date;?></a></span>
											<h5><a title="Qaim says prominent people arrested" href="#"><?php echo $c->title;?></a></h5>
										</div>
                                    <?php } ?>
								</div>
								<div class="see-more"><a href="#" title="SEE MORE POST">SEE MORE POST</a></div>
							</aside><!-- Widget Recent Post -->

							<!-- Popular Video -->
							<!-- Popular Video /- -->
						</div><!-- Widget Area /- -->
						<!-- Widget Area /- -->
					</div>
				</div><!-- Container /- -->
			</div><!-- Single Post /- -->
		
		</main>

	</div>

<?php
include 'includes/footer.php';


?>