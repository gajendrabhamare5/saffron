<?php
include('../include/conn.php');
include('../include/flip_function.php');
include('../include/flip_function2.php');
include "../session.php";
include('../include/rejection_log.php');
error_reporting(0);
$page_call_time = date("Y-m-d H:i:s");

$user_id = $_SESSION['CLIENT_LOGIN_ID'];
$user_login_name = $_SESSION['CLIENT_LOGIN_NAME'];

$casino_maintanance_list = $conn->query("select casino_name from casino_maintanance_list");
$casino_maintanance_list_data = mysqli_fetch_all($casino_maintanance_list);
$casino_lis_db = array_column($casino_maintanance_list_data, 0);

if (in_array("ODI_TEENPATTI", $casino_lis_db)) {
	$return = array(
		"status" => 'error',
		"message" => CASINO_MAINTENANCE_MSG,
	);
	echo json_encode($return);
	exit();
}

$get_blockeventdata = $conn->query("SELECT * FROM `block_event` WHERE UserId='$user_id' and casino_name='teen';");
// $fetch_blockdata = mysqli_fetch_assoc($get_blockeventdata);

if (mysqli_num_rows($get_blockeventdata) > 0) {

	$return = array(
		"status" => 'error',
		"message" => 'Game is Locked. Please Contact Upper Level.',
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time);
	echo json_encode($return);
	exit();
}

$bet_ip_address = '';
if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
	$bet_ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else {
	$bet_ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
}

$bet_user_agent = $_SERVER['HTTP_USER_AGENT'];

$eventType = $conn->real_escape_string($_REQUEST['eventType']);
$eventId = intVal($conn->real_escape_string($_REQUEST['eventId']));
$oddsmarketId = $conn->real_escape_string($_REQUEST['oddsmarketId']);
$marketId = $conn->real_escape_string($_REQUEST['marketId']);
$market_type = $conn->real_escape_string($_REQUEST['bet_market_type']);
$stack = $conn->real_escape_string($_REQUEST['stack']);
$bet_total_amount = $stack;
$odds = $conn->real_escape_string($_REQUEST['odds']);
$bet_type = $conn->real_escape_string($_REQUEST['bet_type']);
$runs = $odds;
$type = $conn->real_escape_string($_REQUEST['type']);
$eventName = $conn->real_escape_string($_REQUEST['bet_event_name']);
$market_runner_name = $conn->real_escape_string($_REQUEST['market_runner_name']);

/* if($marketId != 1 && $marketId != 2 && $marketId != 17 && $marketId != 18){
	$return = array(
		"status" => 'error',
		"message" => "Market in Maintenance",
	);
	save_rejection_log($conn,$user_id,($return['message']." #".__line__),$market_runner_name,$page_call_time);
	echo json_encode($return);
	exit();
} */

/* if ($marketId == 17 or $marketId == 18) {
	$return = array(
		"status" => 'error',
		"message" => "Market in Maintenance",
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time);
	echo json_encode($return);
	exit();
} */

if (CASINO_MAINTENANCE == 1) {
	$return = array(
		"status" => 'error',
		"message" => CASINO_MAINTENANCE_MSG,
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time);
	echo json_encode($return);
	exit();
}

$bet_time = date('Y-m-d H:i:s');
$transaction_time2 = date("d-m-Y H:i:s");

if (!(($type == 'Yes' && $bet_type == 'Back') || ($type == 'No' && $bet_type == 'Lay'))) {
	$return = array(
		"status" => 'error',
		"message" => 'Something went wrong, please try again later.',
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time);
	echo json_encode($return);
	exit();
}


if ($eventId == 0 or $eventId == "") {
	$return = array(
		"status" => 'error',
		"message" => 'Something went wrong, please try again later,',
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time);
	echo json_encode($return);
	exit();
}

if ($runs <= 1) {
	$return = array(
		"status" => 'error',
		"message" => 'Invalid Rate.',
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time);
	echo json_encode($return);
	exit();
}

if ($type == "No" or $type == "Lay") {
	$exposure_bet_type = "Lay";
} else {
	$exposure_bet_type = "Back";
}

$bet_market_name = $market_type;

$get_userdata = $conn->query("select * from user_master where Id=$user_id");
$fetch_userdata = mysqli_fetch_assoc($get_userdata);

$user_status = $fetch_userdata['Status'];
$bet_status = $fetch_userdata['bet_status'];
$parentDL = $fetch_userdata['parentDL'];
$parentMDL = $fetch_userdata['parentMDL'];
$parentSuperMDL = $fetch_userdata['parentSuperMDL'];
$parentKingAdmin = $fetch_userdata['parentKingAdmin'];

$min_stake_limit = $fetch_userdata['min_casino_stake'];
$max_stake_limit = $fetch_userdata['max_casino_stake'];
$net_exposure_limit = $fetch_userdata['net_exposure_limit'];

if ($user_status == 0) {
	$return = array(
		"status" => 'error',
		"message" => 'Your Account is Blocked.',
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time);
	echo json_encode($return);
	exit();
}

if ($bet_status == 0) {
	$return = array(
		"status" => 'error',
		"message" => 'Your Bet is Blocked, Please contact your upline.',
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time);
	echo json_encode($return);
	exit();
}

$sql_upper_data = $conn->query("select Status,bet_status from user_master where Id IN ($parentDL,$parentMDL,$parentSuperMDL,$parentKingAdmin)");
while ($fetch_upper_data = mysqli_fetch_assoc($sql_upper_data)) {

	if ($fetch_upper_data['Status'] == 0) {
		$return = array(
			"status" => 'error',
			"message" => 'Your Account is Blocked.',
		);
		save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time);
		echo json_encode($return);
		exit();
	}

	if ($fetch_upper_data['bet_status'] == 0) {
		$return = array(
			"status" => 'error',
			"message" => 'Your Bet is Blocked, Please contact your upline.',
		);
		save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time);
		echo json_encode($return);
		exit();
	}
}

$get_check_result = $conn->query("select * from twenty_teenpatti_result where event_id='$eventId' and game_type='teen'");
$row_counts = mysqli_num_rows($get_check_result);
if ($row_counts != 0) {
	$return = array(
		"status" => 'error',
		"message" => 'Bet Suspended.',
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time);
	echo json_encode($return);
	exit();
}

$check_account_amount = $conn->query("select sum(amount) as total_account_balance from accounts where user_id=$user_id");
$fetch_check_account_amount = mysqli_fetch_assoc($check_account_amount);
$account_balance = $fetch_check_account_amount['total_account_balance'];

$unmatched_exposure_balance = get_unmatched_expo($conn, $user_id);
/* $final_net_exposure = get_total_net_exposure($conn,$user_id); */
$final_net_exposure = get_net_exposure_casino_market_new($conn, $user_id, $eventId, $market_type, $marketId, $exposure_bet_type, $stack, $runs, $bet_market_name);

$exposure_balance = $final_net_exposure;
$check_plus_expo = $exposure_balance + $unmatched_exposure_balance;

$url = CASINO_DATA_URL . "?type=teen";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$get_data = curl_exec($ch);
$bet_api_data = $get_data;
$er = curl_error($ch);
curl_close($ch);
$get_data = json_decode($get_data);

$serverTime = $get_data->odds->serverTime / 1000;
$unixServerTime = $serverTime;

$time = time();
if ($unixServerTime < ($time - CASINO_DELAY_TIME)) {
	$return = array(
		"status" => 'error',
		"message" => 'Bet Suspended.',
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time, $get_data, $url);
	echo json_encode($return);
	exit();
}


$api_data = $get_data->odds;

/* $min_stack = 100;
$max_stack = 500000;


if($min_stake_limit > $min_stack){
   if($min_stake_limit > $stack){
	   $return = array(
			   "status"=>'error',
			   "message"=>"Your Minimum Stake Limit is $min_stake_limit.",
		   );
		   save_rejection_log($conn,$user_id,($return['message']." #".__line__),$market_runner_name,$page_call_time,$get_data,$url);
	   echo json_encode($return);
	   exit();
   }
}else{
   if($min_stack > $stack){
	   $return = array(
			   "status"=>'error',
			   "message"=>"Your Minimum Stake Limit is $min_stack.",
		   );
		   save_rejection_log($conn,$user_id,($return['message']." #".__line__),$market_runner_name,$page_call_time,$get_data,$url);
	   echo json_encode($return);
	   exit();
   }
}

if($max_stake_limit < $max_stack){
   if($max_stake_limit < $stack){
	   $return = array(
		   "status"=>'error',
		   "message"=>"Your Maximum Stake Limit is $max_stake_limit.",
	   );
	   save_rejection_log($conn,$user_id,($return['message']." #".__line__),$market_runner_name,$page_call_time,$get_data,$url);
	   echo json_encode($return);
	   exit();
   }
}else{
   if($max_stack < $stack){
	   $return = array(
		   "status"=>'error',
		   "message"=>"Your Maximum Stake Limit is $max_stack.",
	   );
	   save_rejection_log($conn,$user_id,($return['message']." #".__line__),$market_runner_name,$page_call_time,$get_data,$url);
	   echo json_encode($return);
	   exit();
   }
} */


$api_data = $get_data->odds;

$t2_datas = $api_data->t2;
foreach ($t2_datas as $t2_data) {
	$api_sid = $t2_data->sid;
	$marketIdNew = explode("_", $marketId);
	if ($api_sid == $marketIdNew[0]) {
		$bet_status = $t2_data->gstatus;

		$min_stack = $t2_data->min;
		$max_stack = $t2_data->max;

		if ($min_stake_limit > $min_stack) {
			if ($min_stake_limit > $stack) {
				$return = array(
					"status" => 'error',
					"message" => "Your Minimum Stake Limit is $min_stake_limit.",
				);
				save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time, $get_data, $url);
				echo json_encode($return);
				exit();
			}
		} else {
			if ($min_stack > $stack) {
				$return = array(
					"status" => 'error',
					"message" => "Your Minimum Stake Limit is $min_stack.",
				);
				save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time, $get_data, $url);
				echo json_encode($return);
				exit();
			}
		}

		if ($max_stake_limit < $max_stack) {
			if ($max_stake_limit < $stack) {
				$return = array(
					"status" => 'error',
					"message" => "Your Maximum Stake Limit is $max_stake_limit.",
				);
				save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time, $get_data, $url);
				echo json_encode($return);
				exit();
			}
		} else {
			if ($max_stack < $stack) {
				$return = array(
					"status" => 'error',
					"message" => "Your Maximum Stake Limit is $max_stack.",
				);
				save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time, $get_data, $url);
				echo json_encode($return);
				exit();
			}
		}

		if ($bet_status != "1" and $bet_status != 1 and $bet_status != 'ACTIVE' and $bet_status != 'OPEN') {
			$return = array(
				"status" => 'error',
				"message" => 'Bet Suspended',
			);
			save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time, $get_data, $url);
			echo json_encode($return);
			exit();
		}

		$back1 = $t2_data->b1;
		$lay1 = $t2_data->l1;
		if (isset($marketIdNew[1])) {
			foreach ($t2_data->odds as $odds) {
				$api_sid_odd = $odds->sid;
				if ($api_sid_odd == $marketIdNew[1]) {
					$back1 = $odds->b;
					$lay1 = $odds->l;
				}
			}
		}
	}
}

$api_data = $get_data->odds;

$api_event_id = $api_data->t1[0]->mid;


$api_event_id = str_replace("9.", "", $api_event_id);
if ($eventId != $api_event_id) {
	$return = array(
		"status" => 'error',
		"message" => "Invalid Game ID",
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time, $get_data, $url);
	echo json_encode($return);
	exit();
}

if ($type == "No" or $type == "Lay") {
	$margin_used = $stack * ($runs - 1);
	$bet_win_amount = $stack;
	$wiiningamount = $stack;
} else {
	$bet_win_amount = $stack * ($runs - 1);
	$margin_used = $stack;

	$wiiningamount = $bet_win_amount;
}

$total_exposure = $margin_used;
if ($check_plus_expo > 0) {
	$available_balance = $account_balance - $margin_used;
} else {
	$available_balance = ($account_balance + $exposure_balance + $unmatched_exposure_balance) - $margin_used;
	$total_exposure = ($exposure_balance + $unmatched_exposure_balance) - $margin_used;
}


/*$available_balance = number_format($available_balance,2);*/

if ($available_balance < 0) {
	$return = array(
		"status" => 'error',
		"message" => 'Insufficient Funds. ',
		'account_balance' => $account_balance,
		'margin_used' => $margin_used,
		'exposure_balance' => $exposure_balance,
		'unmatched_exposure_balance' => $unmatched_exposure_balance,
		'available_balance' => $available_balance,
		'check_plus_expo' => $check_plus_expo,
		'final_net_exposure' => $final_net_exposure,
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time, $get_data, $url);
	echo json_encode($return);
	exit();
}


if (!empty($net_exposure_limit) && $net_exposure_limit < abs($total_exposure)) {

	$return = array(
		"status" => 'error',
		"message" => 'Bet Not Confirm Check Exposer Limit And Balance.' . number_format(abs($total_exposure), 2, ".", ""),//'Insufficient Funds.',
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time, $get_data, $url);
	echo json_encode($return);
	exit();
}

if ($type == "Yes" or $type == "Back") {
	$api_rate = $back1;
} else {
	$api_rate = $lay1;
}


$current_bet = array(
	"bet_event_id" => $eventId,
	"bet_market_id" => $marketId,
	"bet_margin_used" => $margin_used,
	"bet_win_amount" => $bet_win_amount,
	"bet_type" => $exposure_bet_type,
	"bet_market_type" => $market_type,
	"bet_market_name" => $bet_market_name,
	"stack" => $stack,
	"runs" => $runs,
	"bet_odds" => $odds,
	"bet_market_type2" => $market_type,
);


if (CHECK_CASINO_EXPOSURE == true) {
	if (isset($market_type_array)) {
		if ($market_type_array != null) {

			if (($key = array_search($eventName, $market_type_array)) !== false) {
				unset($market_type_array[$key]);
			}

			$market_type_array = implode("','", $market_type_array);

			$get_old_total_exposure = $conn->query("select SUM(exposure_amount) as old_exposure from exposure_details where market_type IN('$market_type_array') and user_id=$user_id");

			$fetch_get_old_total_exposure = mysqli_fetch_assoc($get_old_total_exposure);
			$old_exposure_details = $fetch_get_old_total_exposure['old_exposure'];
			if ($old_exposure_details > 0) {
				$old_exposure_details = 0;
			}
			/* $new_exposure = check_casino_net_exposure_v2_before_bet($conn,$user_id,$current_bet); */
			$new_exposure = $exposure_balance;
			if ($new_exposure > 0) {
				$new_exposure = 0;
			}
			$new_current_exposure_details = abs($old_exposure_details) + abs($new_exposure);
			if (CASINO_EXPOSURE_LIMIT < $new_current_exposure_details) {
				$return = array(
					"status" => 'error',
					"message" => 'No user can have casino exposure above ' . number_format(abs(CASINO_EXPOSURE_LIMIT), 2, ".", ""),
				);
				save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time, $get_data, $url);
				echo json_encode($return);
				exit();
			}
		}
	}
}

$runs = floatval($runs);
$api_rate = floatval($api_rate);

if ($runs != $api_rate and "$runs" != "$api_rate") {
	$return = array(
		"status" => 'error',
		"message" => "Invalid Rate.",
		"api_rate" => $api_rate,
		"runs" => $runs,
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time, $get_data, $url);
	echo json_encode($return);
	exit();
}


$insert_trade = $conn->query("insert into bet_teen_details (`event_id`,`event_type`,`oddsmarketId`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`,`bet_ip_address`,`bet_user_agent`) values('$eventId','$eventType','$oddsmarketId','$marketId','$user_id','$eventName','$market_runner_name','$market_type','$bet_type','00','$runs','$stack','0','$margin_used','$bet_time','1','$wiiningamount','$bet_ip_address','$bet_user_agent')");
$last_bet_id = $conn->insert_id;



if ($last_bet_id > 0) {

	$insert_bet_data = $conn->query("insert into bet_details_api_data (bet_id,user_id,data,added_datetime) values('$last_bet_id','$user_id','$bet_api_data','$bet_time')");
	$add_exposure_amount = add_net_exposure_v2($conn, $user_id, $current_bet);


	$bet_email_notify = $fetch_userdata['bet_email_notify'];
	if ($bet_email_notify == 1) {
		include('../include/email_notify.php');
		$emailData = array('user_id' => $user_id, 'username' => $user_login_name, 'bet_id' => $last_bet_id, 'event_type' => $eventType, 'event_id' => $eventId, 'market_runner_name' => $market_runner_name, 'bet_type' => $bet_type, 'bet_odds' => $runs, 'bet_stack' => $stack, 'game_type' => 1);
		sendBetEmail($conn, $emailData, $insert_qry, $get_data);
	}

	$return = array(
		"status" => 'ok',
		"message" => 'Bet placed Successfully',
		'market_exposure' => $exposure_balance,
	);
	save_success_log($conn, $user_id, $last_bet_id, $market_runner_name, $page_call_time, $get_data, $url);
	echo json_encode($return);
	exit();
} else {
	$return = array(
		"status" => 'error',
		"message" => 'Something went wrong, please try again later,',
	);
	save_rejection_log($conn, $user_id, ($return['message'] . " #" . __LINE__), $market_runner_name, $page_call_time, $get_data, $url);
	echo json_encode($return);
	exit();
}

?>