<?php
include 'includes/header.php';
include 'rb.php';
R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB

?>

<div class="main-container">

    <main class="site-main">

        <!-- Container -->
        <div class="container">

            <!-- We Are Doing -->
            <!-- Author Section -->


            <div class="container-fluid author-section">
                <div class="author-block">
                    <h3 class="block-title">OUR AUTHORS</h3>
                    <div class="row">
                        <?php
                        $type= 'artist';

                        $in = R::findall('users', 'type = ?', [$type]);

                        foreach ($in as $iny) {
                        ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="author-box">
                                <ul>
                                    <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                                <h4><a href="single-author.php ?id=<?php echo $iny->id;?>" title="Watch Now">
                                        <?php   echo $iny->fname . ' ' .$iny->sname; ?></a></h4>
                                <i><img src="<?php   echo $iny->image ; ?>" alt="Author" /></i>
                                <p><?php echo $iny->type;?></p>
                            </div>
                        </div>
                       <?php }?>
                    </div>
                </div>
            </div><!-- Author Section /- -->
  <div class="clearfix"></div>


        </div><!-- Container /- -->

    </main>

</div>

<?php
include 'includes/footer.php'
?>
