<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "263lyrics");

//R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

?><!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie6"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie7"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie8"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">
	<meta property="og:title" content="How to change the address bar color in Chrome, Firefox, Opera, Safari" />
	<meta property="og:description" content="How to change the address bar color in Chrome, Firefox, Opera, Safari" />
	<meta property="og:url" content="http://webdevelopmentscripts.com/64-how-to-change-the-address-bar-color-in-chrome-firefox-opera-safari" />
	<meta property="og:image" content="http://webdevelopmentscripts.com/post-images/685b-change-browser-address-bar-color-chrome-android.jpeg" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript">

		$(function() {

			$(".search_button").click(function() {
				// getting the value that user typed
				var searchString    = $("#search_box").val();
				// forming the queryString
				var data            = 'search='+ searchString;

				// if searchString is not empty
				if(searchString) {
					// ajax call
					$.ajax({
						type: "POST",
						url: "do_search.php",
						data: data,
						beforeSend: function(html) { // this happens before actual call
							$("#results").html('');
							$("#searchresults").show();
							$(".word").html(searchString);
						},
						success: function(html){ // this happens after we get results
							$("#results").show();
							$("#results").append(html);
						}
					});
				}
				return false;
			});
		});
	</script>
    <title>Home - 263Lyrics</title>

	<link rel="shortcut icon" href="assets/images/logo.png" />
    <!-- For iPhone 4 Retina display: -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="apple-touch-icon-precomposed" href="assets/images//apple-touch-icon-114x114-precomposed.png">

    <!-- For iPad: -->
    <link rel="apple-touch-icon-precomposed" href="assets/images//apple-touch-icon-72x72-precomposed.png">

    <!-- For iPhone: -->
    <link rel="apple-touch-icon-precomposed" href="assets/images//apple-touch-icon-57x57-precomposed.png">

    <!-- Library - Google Font Familys -->
    <link href="https://fonts.googleapis.com/css?family=Bentham|Fira+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:400,700|Noto+Serif:400,400i,700,700i|Oswald:200,300,400,500,600,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
          rel="stylesheet">

    <!-- Library -->
    <link href="assets/css/lib.css" rel="stylesheet">

    <!-- Custom - Common CSS -->
    <link href="assets/css/plugins.css" rel="stylesheet">
    <link href="assets/css/elements.css" rel="stylesheet">
    <link href="assets/css/rtl.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!--[if lt IE 9]>
    <script src="js/html5/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Loader -->
<div id="site-loader" class="load-complete">
    <div class="loader">
        <div class="loader-inner ball-clip-rotate">
            <div></div>
        </div>
    </div>
</div><!-- Loader /- -->

<!-- Header Section -->
<header class="header_s header_s1">
    <!-- SidePanel -->
    <div id="slidepanel">
        <!-- Top Header -->
        <div class="container-fluid no-right-padding no-left-padding top-header">
            <!-- Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-3 top-menu">
                        <a href="#"><i class="icon_menu"></i> PROGRAMS</a>
                        <ul>
                            <li><a href="#" title="ADVERTISE">ADVERTISE</a></li>
                            <li><a href="affiliate-program" title="AFFILIATE PROGRAM">AFFILIATE</a></li>
                            <li><a href="donate" title="DONATE">DONATE</a></li>

                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-3 top-social">
                        <a href="#"><i class="social_share"></i></a>
                        <ul>
                            <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" title="Google+"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="whatsapp://send?text=http://webdevelopmentscripts.com" title="whatsapp"><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
	                <div class="col-md-4 col-sm-4 col-xs-6 top-search">
		                <form method="post" class="searchform" action="search">
			                <div class="input-group">
				                <input placeholder="Search" class="form-control" required="" type="text" name="keyword">
				                <span class="input-group-btn">
										<button class="btn btn-default" name="go" type="submit"><i
													class="fa fa-search"></i></button>
									</span>
			                </div>
		                </form>
	                </div>
                  <!--  <div class="col-md-4 col-sm-4 col-xs-6 top-search">
                        <form method="get" class="searchform" action="search">
                            <div class="input-group">
                                <input type="text" name="search" id="search_box" class='search_box'>
                                <span class="input-group-btn">
										<button class="btn btn-default" type="submit" name="go"><i
                                                    class="fa fa-search"></i></button>
									</span>
                            </div>
                        </form>
                    </div>-->
                </div><!-- Row /- -->
            </div><!-- Container /- -->
        </div><!-- Top Header /- -->

        <!-- Middle Header -->
        <div class="container-fluid no-left-padding no-right-padding middle-header">
            <!-- Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <div class="col-md-4 logo-block">
                        <a href="index"><img src="assets/images/logo.png" alt="Logo"/></a>
                    </div>
                    <div class="col-md-8 add-block-banner">

                        <!-- TODO PUT A FANCY BANNER HERE-->

                    </div>
                </div><!-- Row /- -->
            </div><!-- Container /- -->
        </div><!-- Middle Header /- -->

    </div><!-- SidePanel /- -->

    <!-- Ownavigation -->
    <nav class="navbar ownavigation">
        <!-- Container -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="assets/images/logo-2.png" alt="logo"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown active"><a href="index" class="dropdown-toggle" role="button"
                                                   aria-haspopup="true" aria-expanded="false">Home</a></li>
                    <li class="dropdown mega-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"
                           title="News">News</a>
                        <i class="ddl-switch fa fa-angle-down"></i>
                        <div class="dropdown-menu megamenu">
                            <div class="col-md-2 col-sm-12 megamenu-categories">
                                <ul class="nav nav-tabs" role="tablist">
                                    <?php

                                    $categories = mysqli_query($db,"SELECT * FROM categories order by id DESC ");


                                    while ($cat=mysqli_fetch_array($categories)) { ?>
                                    <li role="presentation" class="active">
	                                    <a href="#iphone-ipad" role="tab"
	                                       data-toggle="tab" title="Iphone & ipad"><?php echo $cat['title'];?>
                                          </a></li>
	                                <?php }?>
                                </ul>
                            </div>
                            <div class="col-md-10 col-sm-12 col-xs-12 megamenu-post tab-content">

                                <div role="tabpanel" class="tab-pane active" id="android">
                                    <?php

                                    $news = mysqli_query($db,"SELECT * FROM news order by id DESC ");


                                    while ($new=mysqli_fetch_array($news)) {

                                        $id = $new['id'];?>
                                    <div class="col-md-3 col-sm-4 col-xs-4">
                                        <div class="type-post">
                                            <div class="entry-cover"><a href="blog-page.php<?php echo '?id='.$id; ?>"><img
                                                            src="admin/<?php echo $new['image'];?>" alt="Post"/></a>
                                            </div>
                                            <h3 class="entry-title"><a href="blog-page.php<?php echo '?id='.$id; ?>"><?php echo $new['title'];?></a></h3>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>


                            </div>
                        </div>
                    </li>

                    <li><a href="artistes" title="Artistes">Artistes</a></li>
                    <li><a href="about-us" title="About Author">About Us</a></li>
                    <li><a href="contact-us" title="Contact Us">Contact Us</a></li>
<?php  if (isset($_SESSION['role'])) {
	                ?>
		              <li><a href="account" title="Sign In">Account</a></li>
	                <li><a href="sign-out">Sign out</a></li>
	                <?php
                        } else {
                            ?>
		              <li><a href="sign-up" title="Sign Up">Sign Up</a></li>
		              <li><a href="sign-in" title="Sign In">Sign In</a></li>
                    <?php
 }
                    ?>
                </ul>
            </div>
            <div id="loginpanel" class="desktop-hide">
                <div class="right" id="toggle">
                    <a id="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
                    <a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
                </div>
            </div>
        </div><!-- Container /- -->
    </nav><!-- Ownavigation /- -->

</header><!-- Header Section /- -->
