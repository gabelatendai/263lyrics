<?php
include 'includes/header.php';
include 'rb.php';
R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB

$video = $_GET['id'];

 $init = R::findOne('lyrics', 'id = ?', [$video]);

$id= $_SESSION['user_id'];


$user = R::findOne('users', 'id = ?', [$id]);

$name= $user->fname . '  ' .$user->sname;
$email= $user->email ;




if (isset($_POST['send'])) {


    // $init = R::findOne('comments', 'email = ? ', [$email]);



    $comments = R::dispense('comments');
    $comments->name =$name;
    $comments->comment = $_POST['comment'];
    $comments->email = $email;
    $comments->lyric_id = $video;
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
						<div class="col-md-10 col-sm-12 col-xs-12 content-area">
							<article class="type-post">
								<div class="entry-cover">
									<div class="embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" src="<?php echo $init->image; ?>" allowfullscreen=""></iframe>
									</div>
								</div>
								<div class="entry-content">
									<h1><?php echo $init->name; ?></h1>
								<p><?php echo nl2br($init->lyrics); ?></p>
								</div>
								
								<!-- About Author -->
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
								<?php
                                $user_id= $init->user_id;
								$ini = R::findOne('users', 'id = ?', [$user_id]); ?>
								<div class="about-author-box">
									<h3>About Author</h3>
									<div class="author">
										<i><img src="<?php echo $ini->image?>"  width="50px" height="50px" alt="Author" /></i>
										<h4><?php echo $ini->fname . '  '. $ini->fname;?></h4>
										<ul>
											<li><a href="#" class="fb" title="Facebook"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#" class="tw" title="Twitter"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#" class="go" title="Google"><i class="fa fa-google"></i></a></li>
											<li><a href="#" class="ln" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
										</ul>
										<p><?php echo $ini->about?></p>	</div>
								</div><!-- About Author /- -->
							</article>

                            <?php $count = R::count('comments', 'lyric_id = ?', [$id]);
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
                                        <?php $in = R::findall('comments', 'lyric_id = ?', [$video]);
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
										<p class="comment-form-comment">
											<textarea id="comment" placeholder="Your Comment" name="comment" rows="5" required="required"></textarea>
										</p><span class="success"><?php echo @$msg ;?></span>
										<p class="form-submit">
											<input name="send" class="submit" value="Post Comment" type="submit"/>
										</p>
									</form>
								</div>
							</div><!-- Comment Area /- -->
							
						</div><!-- Content Area /- -->
						
						<!-- Widget Area -->
					<!-- Widget Area /- -->
					</div>
				</div><!-- Container /- -->
			</div><!-- Single Post /- -->
		
		</main>

	</div>

<?php
include 'includes/footer.php'
?>
