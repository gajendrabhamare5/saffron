<?php

include('../../include/conn.php');
/* error_reporting(E_ALL);
ini_set("display_errors",1);
ini_set("display_startup_errors",1); */
include "../session.php";

$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
$bet_id = $_POST['bet_id'];
$type = $_POST['type']; 
/* $host = SITE_EMAIL_HOST;
if (getmxrr($host, $mxhosts)) {
    echo "MX records for $host: " . implode(', ', $mxhosts);
} else {
    echo "DNS lookup failed";
} */
if ($type == "bet") {
	$get_pnl_report  = $conn->query("select * from bet_details as b where  1=1 and bet_id='$bet_id'");
	$fetch_pnrl_report = mysqli_fetch_assoc($get_pnl_report);
	$event_name = $fetch_pnrl_report['event_name'];
	$market_name = $fetch_pnrl_report['market_name'];
	$bet_type = $fetch_pnrl_report['bet_type'];
	$bet_user_id = $fetch_pnrl_report['user_id'];
}
if ($type == "casino_bet") {
	$get_pnl_report_casino  = $conn->query("select * from bet_teen_details as b where  1=1 and bet_id='$bet_id'");
	$fetch_get_pnl_report_casino = mysqli_fetch_assoc($get_pnl_report_casino);
	$event_name = $fetch_get_pnl_report_casino['event_name'] . " (" . $fetch_get_pnl_report_casino['event_id'] . ")";
	$market_name = $fetch_get_pnl_report_casino['market_name'];
	$bet_type = $fetch_get_pnl_report_casino['bet_type'];
	$bet_user_id = $fetch_get_pnl_report_casino['user_id'];
}
$get_names_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
$fetch_names_ids = mysqli_fetch_assoc($get_names_ids);
$bet_username = $fetch_names_ids['Email_ID'];

$ip_address = '';
if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
	$ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else {
	$ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
}

$user_agent = $_SERVER['HTTP_USER_AGENT'];

$otp = rand(111111, 999999);

$owner_mail = SITE_EMAIL;
$owner_mail_pass = SITE_EMAIL_PASS;
$website_name = SITE_NAME;

$email = SITE_EMAIL_TO;
$subject = "OTP for bet delete";

$message = '<html>

<body style="background-color:#F0FFF0;">

<center>

	<div style="width:100%;max-width:640px;height:100%;">

		<div style="background-color:#E0FFFF;padding:1px;">

		<br>

			<center>

				<font size="5"><b> Your OTP is ' . $otp . '</b></font>

				<br>
				<br>

			</center>
			<center>

				<table width="100%" cellspacing="5px">

					<tr>

						<td colspan="6" align="center">

							<font color="#808080">Bet Summary</font>

						</td>

					</tr>
					<tr>

						<td colspan="6">

							<hr>

						</td>

					</tr>

					<tr>

						<td style="width:12%;" >

							<font color="#808080">User Name</font>

						</td>
						<td  >

							<font color="#808080">:</font>

						</td>
						<td colspan="3" >

							<font color="#808080">' . $bet_username . '</font>

						</td>

					</tr>

					<tr>

						<td colspan="6">

							<hr>

						</td>

					</tr>

					<tr>

						<td style="width:12%;" >

							<font color="#808080">Event</font>

						</td>
						<td  >

							<font color="#808080">:</font>

						</td>
						<td colspan="3" >

							<font color="#808080">' . $event_name . '</font>

						</td>

					</tr>

					<tr>

						<td colspan="6">

							<hr>

						</td>

					</tr>
					<tr>

						<td  style="width:12%;" >

							<font color="#808080">Market</font>

						</td>
						<td  >

							<font color="#808080">:</font>

						</td>
						<td colspan="3" >

							<font color="#808080">' . $market_name . '</font>

						</td>

					</tr>

					<tr>

						<td colspan="6">

							<hr>

						</td>

					</tr>
					<tr>

						<td style="width:12%;" >

							<font color="#808080">Bet Type</font>

						</td>
						<td  >

							<font color="#808080">:</font>

						</td>
						<td colspan="3" >

							<font color="#808080">' . $bet_type . '</font>

						</td>

					</tr>

					<tr>

						<td colspan="6">

							<hr>

						</td>

					</tr>
					<tr>

						<td style="width:12%;" >

							<font color="#808080">IP Address</font>

						</td>
						<td  >

							<font color="#808080">:</font>

						</td>
						<td colspan="3" >

							<font color="#808080">' . $ip_address . '</font>

						</td>

					</tr>

					<tr>

						<td colspan="6">

							<hr>

						</td>

					</tr>
					<tr>

						<td style="width:12%;" >

							<font color="#808080">User Agent</font>

						</td>
						<td  >

							<font color="#808080">:</font>

						</td>
						<td colspan="3" >

							<font color="#808080">' . $user_agent . '</font>

						</td>

					</tr>

					<tr>

						<td colspan="6">

							<hr>

						</td>

					</tr>

</table>

			</center>

		</div>

</div>

	</center>

</body>

</html>';

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

define('GUSER', "$owner_mail");
define('GPWD',    $owner_mail_pass);

global $error;
$mail = new PHPMailer\PHPMailer\PHPMailer();  // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
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
//$mail->Host = 'smtp.gmail.com';
				// $mail->Port = 587;
// 				$mail->isHTML(true);
// 				$mail->Username = GUSER;
// 				$mail->Password = GPWD;
// 				$mail->SetFrom("kapdavilla@gmail.com", "Kapda Villa");
// 				$mail->Subject = $subject;
// 				$mail->Body = $message;
// 				$mail->AddAddress($email);
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
	 $conn->query("insert into bet_delete_otp set `user_id`='$user_id',`bet_id`='$bet_id',`bet_type`='$type',`otp`='$otp',`ip_address`='$ip_address',`user_agent`='$user_agent',`datetime`='$datetime'");
	$return = array('status' => 'ok', "message" => "An OTP has been sent to " .SITE_EMAIL_TO ." Mail.");
	echo json_encode($return);
} else {
	/* echo "Mailer Error: " . $mail->ErrorInfo; */
	$return = array('status' => 'failed', "message" => "Something is wrong plz try again.");
	echo  json_encode($return);
}