<?php
include 'includes/header.php';
include 'rb.php';
require 'vendor/autoload.php';
require 'includes/functions.php';
use \RedBeanPHP\R as R;

R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
$init = R::findone('contactus');

if(isset($_POST['send'])) {
//Taking all values
    //$fname = $_POST['fname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['body'];
    $to = 'gabrielmusodza@gmail.com';
    $headers = 'FROM: "' . $email . '"';
	mail($to,$subject,$msg, $headers);
}
$secretkey='1bf4330f59f6e835e8df8d1f020bc706-898ca80e-9577c82f';
$domain="sandbox63dcaae1bd954d218cf811ba8d7934ca.mailgun.org";
?>


<div class="main-container">

    <main class="site-main">

        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Map Section -->
                <div class="col-xs-12 map-section">
                    <div class="map-canvas" id="map-canvas-contact" data-lat="-17.823548" data-lng="31.061886" data-string="Washington Square Park, New York, NY, United States" data-zoom="10"></div>
                </div><!-- Map Section /- -->

                <!-- Contact Form -->
                <div class="col-sm-6 col-xs-12">
                    <div class="contact-form">
                        <h3>Send Us An E-mail</h3>
	                    <form method="post" action=".php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your name *" name="name" id="input_name" required="" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your e-mail*" name="email" id="input_email" required=""  />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="phone subject" name="subject" id="input_phone" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message" name="body" id="textarea_message"></textarea>
                            </div>
                            <button title="SEND MESSAGE" type="submit" id="btn_submit" name="send">Send message</button>
                            <div id="alert-msg" class="alert-msg"></div>
                        </form>
                    </div>
                </div><!-- Contact Form /- -->
                <!-- Contact Details -->
                <div class="col-sm-6 col-xs-12">
                    <div class="contact-detail">
                        <h3>Visit Us</h3>
	                    <p><?php echo $init->motto ?></p> <div class="detail-box">
                            <p><i class="fa fa-map-marker"></i><?php echo $init->adress?></p>
                            <p><i class="fa fa-phone"></i>Telephone : <a href="tel:<?php echo $init->pnumber?>"><?php echo $init->pnumber?></a></p>
                            <p><i class="fa fa-envelope-o"></i>E-mail : <a href="mailto:<?php echo $init->email?>"><?php echo $init->email?></a></p>
                        </div>
                    </div>
                </div><!-- Contact Details /- -->
            </div><!-- Row /- -->
        </div><!-- Container -->

    </main>

</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW40y4kdsjsz714OVTvrw7woVCpD8EbLE"></script>


<?php
include 'includes/footer.php'
?>
