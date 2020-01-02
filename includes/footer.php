<!-- Footer Main -->
<footer id="footer-main" class="container-fluid no-left-padding no-right-padding footer-main">
    <!-- Top Footer -->
    <div class="container-fluid no-left-padding no-right-padding top-footer">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">

                <!-- Widget About -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <aside class="widget widget_about">
                        <h3 class="widget-title">ABOUT US</h3>
                        <div class="logo-block"><a href="index.html"><img src="assets/images/logo.png" alt="Logo"/></a>
                        </div>
                        <p>We are all about lyrics and sharing the message in the best music.</p>
                    </aside>
                </div><!-- Widget About /- -->

                <!-- Widget Working Time -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <aside class="widget widget_latestposts">
                        <h3 class="widget-title">RECENT UPLOADS</h3>
	                    <?php
                        $sliders = R::findAll('news', 'Order by date Desc LIMIT 2');

                        foreach ($sliders as $slider) {
                        $id= $slider->id;
                        ?>

	                    <div class="latest-content">
		                    <a href="#" title="Recent Posts"><i><img src="admin/<?php echo $slider->image;?>" class="wp-post-image" alt="blog-1"></i></a>
		                    <h5><a title="Qaim says prominent people arrested " href="#"><?php echo $slider->title;?> </a></h5>
		                    <span><i class="fa fa-pencil-square-o"></i><a href="#"><?php echo $slider->date;?></a></span>
	                    </div>
	                    <?php }?>
                    </aside>

                </div><!-- Widget Working Time -->

                <!-- Widget Links -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <aside class="widget widget_categories">
                        <h3 class="widget-title">categories</h3>
	                    <ul>
                            <?php
                            $sl = R::findAll('categories', 'Order by date Desc LIMIT 8');

                            foreach ($sl as $slid) {
                            $id= $slid->id;
                            ?>
		                    <li><a href="#" title="Business"><?php echo $slid->title;?> </a></li>
                            <?php }?>
	                    </ul>
                    </aside>
                </div><!-- Widget Links /- -->

                <!-- Widget Category -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <aside class="widget widget_tag_cloud">
                        <h3 class="widget-title">Popular tags</h3>
                        <div class="tagcloud">
                        </div>
                    </aside>
                </div><!-- Widget Category /- -->
            </div><!-- Row /- -->
        </div><!-- Container /- -->
    </div><!-- Top Footer -->
    <!-- Bottom Footer -->
    <div class="container-fluid bottom-footer">
	    <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | 263Lyrics</p>
    </div><!-- Bottom Footer /- -->
</footer><!-- Footer Main /- -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- JQuery v1.12.4 -->
<script src="assets/js/jquery-1.12.4.min.js"></script>

<!-- Library - Js -->
<script src="assets/js/lib.js"></script>

<!-- Library - Theme JS -->
<script src="assets/js/functions.js"></script>

</body>
</html>