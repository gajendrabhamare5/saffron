<?php
exit();
include('../../include/conn.php');
/* test for allpanelexch999  curl file */
$owner_mail = SITE_EMAIL;
$owner_mail_pass = SITE_EMAIL_PASS;
$website_name = SITE_NAME;

$email = SITE_EMAIL_TO;
$subject = "OTP for bet delete";

$message = "test";

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
/*define ('GUSER','kapdavilla@gmail.com');
				define ('GPWD','kanchanc');*/

define('GUSER', "$owner_mail");
define('GPWD',    $owner_mail_pass);
global $error;
$mail = new PHPMailer\PHPMailer\PHPMailer();  // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true;  // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
$mail->SMTPAutoTLS = false;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
    ),
);
/*$mail->Host = 'smtp.gmail.com';
				$mail->Port = 587;
				$mail->isHTML(true);
				$mail->Username = GUSER;
				$mail->Password = GPWD;
				$mail->SetFrom("kapdavilla@gmail.com", "Kapda Villa");
				$mail->Subject = $subject;
				$mail->Body = $message;
				$mail->AddAddress($email);*/
$mail->Host = SITE_EMAIL_HOST;
$mail->Port = SITE_EMAIL_PORT;
$mail->isHTML(true);
$mail->Username = GUSER;
$mail->Password = GPWD;
$mail->SetFrom($owner_mail, $website_name);
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AddAddress($email);
if ($mail->Send()) {
	$datetime = date("Y-m-d H:i:s");
	$return = array('status' => 'ok', "message" => "An OTP has been sent to " .$email ." Mail.");
	echo json_encode($return);
} else {
	$return = array('status' => 'failed', "message" => "Something is wrong plz try again.","post"=>$_POST,"sascd"=>$mail->ErrorInfo);
	echo  json_encode($return);
}