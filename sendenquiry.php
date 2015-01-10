<?php
//sending email
$my_email = "48paramesh@gmail.com";
$continue = "/";

// This line prevents values being entered in a URL
if ($_SERVER['REQUEST_METHOD'] != "POST"){exit;}

$message = "";
// This line prevents a blank form being sent

while(list($key,$value) = each($_POST)){if(!(empty($value))){$set=1;}$message = $message . "$key: $value\n\n";} if($set!==1){header("location: $_SERVER[HTTP_REFERER]");exit;}

$message = "Adore technology Website Enquiry\n--------------------------\n\n" . $message . "---------------------- \n";
$message = stripslashes($message);

$subject = "Adore technology Website Enquiry";
$headers = "From: " . $_POST['Email'] . "\n" . "Return-Path: " . $_POST['Email'] . "\n" . "Reply-To: " . $_POST['Email'] . "\n";

mail($my_email,$subject,$message,$headers);


?>

<script language="javascript" type="text/javascript"> 
	alert ("Thanks for your enquiry! \n\n Mail Successfully Sent!\n\n Redirecting to Home Page...");
	window.location.href='index.html';
</script> 
