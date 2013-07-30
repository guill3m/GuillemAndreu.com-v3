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
$message = "Nom: " . $name . " \r\n";
$message .= "Email: " . $email . " \r\n";
$message .= "Telèfon: " . $phone . " \r\n";
$message .= date('r', time()) . " \r\n";
$message .= "--------------- \r\n";
$message .= $_POST['message'];

// Headers
$headers = "From: " . $name . " <" . $email . ">\r\n";

// Mail
$ok = mail($to,$subject,$message,$headers);

// Send email
if($ok) {
	echo 'OK';
}