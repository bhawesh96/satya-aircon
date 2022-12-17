<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	
//Set Access-Control-Allow-Origin with PHP
// header('Access-Control-Allow-Origin: http://orva.in', false);
// header('Access-Control-Allow-Origin: http://plasmaforyou.org', false);
// header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

$name = $_POST['name'];
// echo $name;
$email = $_POST['email'];
// echo $email;
$phone = $_POST['phone'];
// echo $phone;
$message = $_POST['message'];
// echo $message;
$to_email = $_POST['to_email'];
// echo $to_email;

$sub = "Message from website's contact form";


$message = 'Hello,' . "\r\n" . "\r\n" .
		'Someone just contacted you via the contact form of your website - ' . "\r\n" . "\r\n" . 
		'Name: ' . $name . "\r\n" .
		'Email: ' . $email . "\r\n" .
		'Phone: ' . $phone . "\r\n" .
		'Message: ' . $message . "\r\n" . "\r\n" .
		'Thank You!';
print $message;

// // $headers = 'From: webmaster@satyaaircon.com' . "\r\n" .
// //     'Reply-To: webmaster@satyaaircon.com' . "\r\n" .
// //     'X-Mailer: PHP/' . phpversion();

// // $success = mail($to_email, $sub, $message, $headers);

// // if (!$success) {
// //     $errorMessage = error_get_last()['message'];
// //     echo $errorMessage;
// // }

// // else {
// // 	echo "success";
// // }


$eLog="/tmp/mailError.log";

//Get the size of the error log
//ensure it exists, create it if it doesn't
$fh= fopen($eLog, "a+");
fclose($fh);
$originalsize = filesize($eLog);

mail($to_email, $sub, $message);

/*
* NOTE: PHP caches file status so we need to clear
* that cache so we can get the current file size
*/

clearstatcache();
$finalsize = filesize($eLog);

//Check if the error log was just updated
if ($originalsize != $finalsize) {
print "Problem sending mail. (size was $originalsize, now $finalsize) See $eLog
";
} else {
print "Mail sent to $to_email";
}
?>