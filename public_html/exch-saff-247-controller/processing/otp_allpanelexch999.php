<?php
$owner_mail = $_POST['owner_mail']; 
$owner_mail_pass =$_POST['owner_mail_pass'];
$website_name = $_POST['website_name'];

$email = $_POST['email'];
$subject = "OTP for bet delete";

$message = $_POST['message'];

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
$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true;  // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
$mail->SMTPAutoTLS = false;
/*$mail->Host = 'smtp.gmail.com';
				$mail->Port = 587;
				$mail->isHTML(true);
				$mail->Username = GUSER;
				$mail->Password = GPWD;
				$mail->SetFrom("kapdavilla@gmail.com", "Kapda Villa");
				$mail->Subject = $subject;
				$mail->Body = $message;
				$mail->AddAddress($email);*/
$mail->Host = $_POST['email_host'];
$mail->Port =  $_POST['email_port'];
$mail->isHTML(true);
$mail->Username = $_POST['GUSER'];
$mail->Password = $_POST['GPWD'];
$mail->SetFrom($owner_mail, $website_name);
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AddAddress($email);
if ($mail->Send()) {
	$datetime = date("Y-m-d H:i:s");
	$return = array('status' => 'ok', "message" => "An OTP has been sent to " .$email ." Mail.");
	echo json_encode($return);
} else {
	$return = array('status' => 'failed', "message" => "Something is wrong plz try again.","post"=>$_POST);
	echo  json_encode($return);
}