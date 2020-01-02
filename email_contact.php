<?php
/**
 * EDIT THE VALUES BELOW THIS LINE TO ADJUST THE CONFIGURATION
 * EACH OPTION HAS A COMMENT ABOVE IT WITH A DESCRIPTION
 */
/**
 * Specify the email address to which all mail messages are sent.
 * The script will try to use PHP's mail() function,
 * so if it is not properly configured it will fail silently (no error).
 */
$mailTo     = 'gabrielmusodza@gmail.com';
$Subject     = 'Contact email';

 $name = $_POST['name'];
 $email = $_POST['email'];
 $message = $_POST['message'];
 //$pnumber = $_POST['contact-number'];
/**
 * Set the message that will be shown on success
 */

/**
 * DO NOT EDIT ANYTHING BELOW THIS LINE, UNLESS YOU'RE SURE WHAT YOU'RE DOING
 */
$headers .= "Content-type: text/html;\r\n";
$headers .= "From: $email";

//mail function

mail($mailTo, $Subject,$message, $headers);

echo "Thank you, mail sent successfuly! $name";

?>
}