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

$id= $_GET['id'];
$user = R::findOne('lyrics', 'id=?',[$id]);
$user_id=$user->user_id;
$users_id = R::findOne('users', 'id=?',[$user_id]);
$comments_count= R::count('comments', 'lyric_id=?',[$id]);
?>
    <div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4> <?php
                    echo $user->name;
                    ?></h4>
                <p class="mg-b-0"> Posted by:<?php echo $users_id->fname.' '.$users_id->sname;?></p>
            </div>
        </div>

        <div class="br-pagebody">


<?php
echo nl2br($user->lyrics);
//$comments= R::findAll('comments', 'lyric_id=?',[$id]);
//$comments->id
?>
	        <h2><a href="comments<?php echo '?id='.$id; ?>"><?php
                    if ($comments_count>0){
                        echo 'Comments'. $comments_count;
                    }


                    ?></a> </h2>

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