<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header('Location: index');
}

require '../vendor/autoload.php';
require '../includes/functions.php';

use \RedBeanPHP\R as R;

R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

include 'includes/header.php';
$lyrics = R::count('lyrics');
$artist = R::count('users', 'type=?',['artist']);
$news = R::count('news');
$users = R::count('users');
$members = R::count('members');
$comm = R::count('comments');
?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>Dashboard</h4>
                <p class="mg-b-0">263 lyrics  Administrator Dashboard</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-info rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                                All lyrics</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?php echo $lyrics; ?></p>
                                <span class="tx-11 tx-roboto tx-white-8"><a href="lyrics" style="color: white">View All lyrics</a> </span>
                            </div>
                        </div>
                        <div id="ch1" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                    <div class="bg-purple rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Artistes</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?php echo $artist; ?></p>
                                <span class="tx-11 tx-roboto tx-white-8"><a href="artistes" style="color: white">Registered Artistes</a> </span>
                            </div>
                        </div>
                        <div id="ch3" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="bg-teal rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                                    News</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?php echo $news; ?></p>
                                <span class="tx-11 tx-roboto tx-white-8"><a href="news" style="color: white">All News Post</a> </span>
                            </div>
                        </div>
                        <div id="ch2" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Users
                                    </p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?php echo $users; ?></p>
                                <span class="tx-11 tx-roboto tx-white-8"><a href="users" style="color: white">View All Users</a> </span>
                            </div>
                        </div>
                        <div id="ch4" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">About Us
                                    </p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?php echo $members; ?></p>
                                <span class="tx-11 tx-roboto tx-white-8"><a href="about.php" style="color: white">View All Members</a> </span>
                            </div>
                        </div>
                        <div id="ch4" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Comments
                                    </p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?php echo $comm; ?></p>
                                <span class="tx-11 tx-roboto tx-white-8"><a href="all_comments" style="color: white">View All Comments</a> </span>
                            </div>
                        </div>
                        <div id="ch4" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
            </div><!-- row -->

        </div><!-- br-pagebody -->
	    <footer class="br-footer">
		    <div class="footer-left">
			    <div class="mg-b-2">Copyright &copy; 2019. All Rights Reserved.</div>
			    <div>263Lyrics.</div>
		    </div>
		    <div class="footer-right d-flex align-items-center">
			    <span class="tx-uppercase mg-r-10">Share:</span>
			    <a target="_blank" class="pd-x-5"
			       href="#"><i
						    class="fab fa-facebook tx-20"></i></a>
			    <a target="_blank" class="pd-x-5"
			       href="#"><i
						    class="fab fa-twitter tx-20"></i></a>
		    </div>
	    </footer>
    </div><!-- br-mainpanel -->
	<!-- ########## END: MAIN PANEL ########## -->

<?php
include 'includes/footer.php';
?>