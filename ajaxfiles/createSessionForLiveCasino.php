<?php
include('../include/conn.php');
include('../include/function.php');
include "../include/function.php";
$_REQUEST = check_variable_for_datatable($conn, $_REQUEST);

$data = json_decode(file_get_contents("php://input"));
$is_app = 0;
if (isset($data->is_app)) {
	$is_app = $data->is_app;
	$all_data = (array) $data;
	$_REQUEST = $all_data;
}


if ($is_app == 1) {
	$user_id = $data->login_user_id;
	$user_login_name = $data->login_user_name;
	$auth_key = $data->auth_key;

	if ($auth_key == "") {
		$return = array(
			"status" => "error",
			"message" => "Invalid Key",
		);
		echo json_encode($return);
		exit();
	}

	$get_auth_data = $conn->query("select * from user_login_master  where loginString='$auth_key'");
	$fetch_get_auth_data = mysqli_fetch_assoc($get_auth_data);
	$db_user_id = $fetch_get_auth_data['UserID'];
	if ($db_user_id != $user_id) {
		$return = array(
			"status" => "error",
			"message" => "Unauthorised Access",
		);
		echo json_encode($return);
		exit();
	} else {

		$user_id = $fetch_get_auth_data['UserID'];
	}
	$version_name = 0;
} else {
	include "../session.php";
	error_reporting(0);
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	ini_set("display_startup_errors", 1);
	error_reporting(0);

	$is_app = 0;
	$version_name = 0;
	$user_id = $_SESSION['CLIENT_LOGIN_ID'];
	$user_login_name = $_SESSION['CLIENT_LOGIN_NAME'];
}
$page_call_time = date("Y-m-d H:i:s");
$deviceType = $conn->real_escape_string($_REQUEST['deviceType']);
$game_id = "";
if (isset($_REQUEST['game_id'])) {
	$game_id = $conn->real_escape_string($_REQUEST['game_id']);
}

$host = CASINO_IP;
require '../vendor/autoload.php';

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

$options = [
	'context' => [
		'ssl' => [
			'verify_peer' => false,
			'verify_peer_name' => false
		]
	]
];
$client = new Client(new Version2X($host, $options));
$client->initialize();
$trade_ip_address = '';
if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
	$trade_ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else {
	$trade_ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
}

$user_agent = $_SERVER['HTTP_USER_AGENT'];
if ($deviceType == 0) {
	$deviceType1	=	"desktop";
} else {
	$deviceType1	=	"mobile";
}
$added_datetime = date("Y-m-d H:i:s");
$get_userdata = $conn->query("select * from user_master where Id=$user_id");
$fetch_userdata = mysqli_fetch_assoc($get_userdata);
$playerId = $fetch_userdata['playerId'];
$get_dldata = $conn->query("select * from user_master where Id=$fetch_userdata[parentDL]");
$fetch_dldata = mysqli_fetch_assoc($get_dldata);

$get_mdldata = $conn->query("select * from user_master where Id=$fetch_userdata[parentMDL]");
$fetch_mdldata = mysqli_fetch_assoc($get_mdldata);

$get_smdldata = $conn->query("select * from user_master where Id=$fetch_userdata[parentSuperMDL]");
$fetch_smdldata = mysqli_fetch_assoc($get_smdldata);


$get_kingdata = $conn->query("select * from user_master where Id=$fetch_userdata[parentKingAdmin]");
$fetch_kingdata = mysqli_fetch_assoc($get_kingdata);

if ($fetch_userdata['Status'] == 0 || $fetch_dldata['Status'] == 0 || $fetch_mdldata['Status'] == 0 || $fetch_smdldata['Status'] == 0 || $fetch_kingdata['Status'] == 0) {
	$return = array(
		"status" => 'error',
		"message" => 'Your Account is Blocked.',
	);
	echo json_encode($return);
	exit();
}

if ($fetch_userdata['bet_status'] == 0 || $fetch_dldata['bet_status'] == 0 || $fetch_mdldata['bet_status'] == 0 || $fetch_smdldata['bet_status'] == 0 || $fetch_kingdata['bet_status'] == 0) {
	$return = array(
		"status" => 'error',
		"message" => 'Your Bet is Blocked, Please contact your upline.',
	);
	echo json_encode($return);
	exit();
}
$insert_casino_ip = array(
	"user_id"			=>	$user_id,
	"ip_address"		=>	$trade_ip_address,
	"user_agent"		=>	$user_agent,
	"added_datetime"	=>	$added_datetime,
	"device_type"		=>	$deviceType,
	"is_app"			=>	$is_app,
	"version_name"		=>	$version_name,
);
$insert_id = insert_query($conn, "casino_ip_user_agent", $insert_casino_ip);
if (empty($playerId)) {
	$login_auth_key = login_auth_key(15);
} else {
	$login_auth_key = $playerId;
}
$wallet_session_id = login_auth_key(10);
$conn->query("update user_master set playerId='$login_auth_key', wallet_session='$wallet_session_id' where Id=$user_id");
if (!empty($game_id)) {
	$client->emit('getLaunchUrlForParticularGame', [
		"displayName"		=>	$user_login_name,
		"playerId"			=>	$login_auth_key,
		"gameId"			=>	$game_id,
		"currency"			=>	"INR",
		"country"			=>	"IN",
		"gender"			=>	"M",
		"birthDate"			=>	"1986-01-01",
		"lang"				=>	"en_IN",
		"mode"				=>	"real",
		"walletCurrency"				=>	"INR",
		"returnUrl"				=>	WEB_URL,
		"device"			=>	$deviceType1,
		"walletSessionId"	=>	$wallet_session_id,
	]);
} else {
	$client->emit('getUrlForLobby', [
		"displayName"		=>	$user_login_name,
		"playerId"			=>	$login_auth_key,
		"currency"			=>	"INR",
		"country"			=>	"IN",
		"lang"				=>	"en_IN",
		"mode"				=>	"real_only",
		"config"			=>	array(
			"displays" 	=> array(
				"balance"		=> true,
				"name"			=> true,
				"language"		=> true,
				"gameHistory"	=> true,
				"search"		=> true
			),
			"urls"		=> array(
				"exit"	=> WEB_URL . "/games-done"
			)
		),
		"device"			=>	$deviceType1,
		"walletSessionId"	=>	$wallet_session_id,
	]);
}


$temp_all = $client->read();
$temp_all = substr($temp_all, 2);
$temp_all = json_decode($temp_all);
$temp_all = $temp_all[1];
if (isset($temp_all->url)) {

	$return = array(
		"status" => 'ok',
		"data" => $temp_all,
	);
	echo json_encode($return);
	exit();
} else if (isset($temp_all->type)) {
	$return = array(
		"status" => 'error',
		"data" => "Please Refresh Page and Try Again.",
	);
	echo json_encode($return);
	exit();
} else {

	$return = array(
		"status" => 'error',
		"message" => 'Something Wrong With API',
	);
	echo json_encode($return);
	exit();
}
