<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$to_email = "bhansalibhawesh@yahoo.com";
$sub = "GET: Message from website's contact form";
$msg = "This is the message from GET";

// $headers = 'From: webmaster@satyaaircon.com' . "\r\n" .
//     'Reply-To: webmaster@satyaaircon.com' . "\r\n" .
//     'X-Mailer: PHP/' . phpversion();

// $success = mail($to_email, $sub, $message, $headers);

// if (!$success) {
//     $errorMessage = error_get_last()['message'];
//     echo $errorMessage;
// }

// else {
// 	echo "success";
// }


$eLog="/tmp/mailError.log";

//Get the size of the error log
//ensure it exists, create it if it doesn't
$fh= fopen($eLog, "a+");
fclose($fh);
$originalsize = filesize($eLog);

mail($to_email, $sub, $msg);

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