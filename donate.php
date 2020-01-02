<?php
ob_start();
include 'includes/header.php';
include 'rb.php';
//$link=mysqli _connect("localhost","root","","263lyrics");
R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB
if (isset($_POST['send'])) {

    $total = $_POST['amount'];
    $notes = $_POST['msg'];


    $string = "";
    $resulturl = 'https://accoleisure.org/admin/tickets/subscription';
    $returnurl = 'https://localhost/tanyakombo/thank.php';
    $amount = $total;
    $id = 5717;
    $reference = date('y-m-d');
    $additionalinfo = $notes;
    $authemail = '';
    $status = 'Message';
    $merchant_key = 'f469aefb-f4dd-47a7-bce2-61c09810720d';

    $string .= $resulturl . $returnurl . $reference . $amount . $id . $additionalinfo . $authemail . $status . $merchant_key;

    $hash = hash("sha512", $string);
    $finalHash = strtoupper($hash);

    $fields_string = 'resulturl=' . urlencode($resulturl) . '&returnurl=' . urlencode($returnurl) . '&reference=' . urlencode($reference) . '&amount=' . urlencode($amount) . '&id=' . urlencode($id) . '&additionalinfo=' . urlencode($additionalinfo) . '&authemail=' . urlencode($authemail) . '&status=' . urlencode($status) . '&hash=' . urlencode($finalHash);

//open connection
    $ch = curl_init();
    $url = 'https://www.paynow.co.zw/interface/initiatetransaction';

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//execute post
    $result = curl_exec($ch);

    $stageone = explode('&', $result);
    $data = array();

    for ($i = 0; $i < sizeof($stageone); $i++) {
        $item = explode('=', $stageone[$i]);
        $data[$item[0]] = $item[1];
    }

    $subscription = R::dispense('subscription');
    $subscription->pollurl = urldecode($data['pollurl']);
    $subscription->amount = $total;
    $subscription->timecreated = date("Y-m-d H:i:s");
    $subscription->reference = $reference;
    R::store($subscription);

    $browserurl = urldecode($data['browserurl']);
    $pollurl = urldecode($data['pollurl']);

    header("HTTP/1.1 301 Moved Permanently");
    header('location: ' . $browserurl);
}
?>
	<div class="main-container">

		<main class="site-main">

			<!-- Container -->
			<div class="container">
				<!-- Row -->
				<div class="row">
					<!-- Map Section -->
					<div class="col-sm-6 col-xs-12">
						<div class="contact-detail">
							<h3>Make a Donation</h3>
							<p>If you already have an existing account with us log in to access tools that enable you to
								share lyrics and to make content.</p>
							<div class="detail-box">
								<p><i class="fa fa-check"></i> Share your lyrics</p>
								<p><i class="fa fa-check"></i> Like and bookmark content</p>
								<p><i class="fa fa-check"></i> Access our programs</p>
							</div>
						</div>
					</div><!-- Contact Details /- -->
					<!-- Contact Form -->
					<div class="col-sm-6 col-xs-12">
						<div class="contact-form">
							<h3>Donate</h3>
							<form  action="donate" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Enter amount to donate *" name="amount"
									       id="input_name" required=""/>
								</div>
								<div class="form-group">
									<textarea type="text" class="form-control" placeholder="Enter message*" name="msg"
									       id="input_email" required=""></textarea>						</div>
								<button title="SEND MESSAGE" class="pull-right" type="submit" id="" name="send">
									Donate
								</button>
								<div id="alert-msg" class="alert-msg"></div>
							</form>
						</div>
					</div><!-- Contact Form /- -->
					<!-- Contact Details -->
				</div><!-- Row /- -->
			</div><!-- Container -->

		</main>

	</div>
<?php
include 'includes/footer.php'
?>