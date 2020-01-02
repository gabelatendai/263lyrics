<?php
 include 'PHPMailer-5.2.14/class.phpmailer.php';
    $erro_msg = NULL;
    if(!empty($_POST['submit']))
    {
        if(empty($_POST['fullname']))
        $erro_msg = "please enter full name";
        if(empty($_POST['phone']))
        $erro_msg = "please enter phone number";
        if(empty($_POST['email']))
        $erro_msg = "please enter email address";
        if(empty($_POST['message']))
        $erro_msg = "please fill in message";
        if(empty($erro_msg))
        {
            $subject = $_POST['phone'];
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->SMTPDebug = 1;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = '';//if you chave an ssl certificate you can activate here
                $mail->Host= "mail.kacee.co.zw";
                $mail->Port =25;
                $mail->isHTML(true);
                $mail->Username = "gmusodza@kacee.co.zw";
                $mail->Password = "express@2019";
                $mail->setFrom($_POST['email']);//this is the email that the user fills in the form
                $mail->Subject="$subject";
                $mail->Body = $_POST['message']."<br><br>".$_POST['fullname'];
                $mail->addAddress("gmusodza@kacee.co.zw");

                if(!$mail->send())
                {
                     echo '<script type="text/javascript">alert("Message not deliver!")</script>' ;;
                }
                else
                {
                     echo '<script type="text/javascript">alert("Message has been sent!")</script>' ;
                }
        }
    }
?>