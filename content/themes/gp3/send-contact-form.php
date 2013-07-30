<?php
/**
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 */



// Read POST request params into vars
$to      = "web@guillemandreu.com";
$subject = "Web - " . trim($_POST['subject']);
$name    = trim($_POST['name']);
$phone   = trim($_POST['phone']);
$email   = trim($_POST['email']);
$message = $name ." \r\n";
$message .= $email ." \r\n";
$message .= date('d/m/Y', time())." \r\n"." \r\n";
$message .= $_POST['message'];

// Headers
$headers = "From: " . $name . " <" . $email . ">\r\n";

// Send email
if(!mail($to,$subject,$message,$headers)) {
	echo '<h3>A wild error appeared!</h3><p>Oh, no. It seems that <strong>something went wrong and your message wasn’t delivered.</strong></p><p>Please try again, or contact me directly at <a href="mailto:hi[at]guillemandreu[dot]com">hi[at]guillemandreu[dot]com</a>.</p><p>Thank you.</p>';
} else {
	echo '<h3>Everything is working fine</h3><p><strong>Your message has been sent.</strong></p><p>I’ll contact you back, if applicable, as soon as I can.</p><p>Thank you.</p>';
}