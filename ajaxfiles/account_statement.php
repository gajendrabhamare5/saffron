<?php
include('../include/conn.php');
include "../session.php";
$user_id = $_SESSION['CLIENT_LOGIN_ID'];

$from_date = $conn->real_escape_string($_REQUEST['from_date']);
$to_date = $conn->real_escape_string($_REQUEST['to_date']);
$report_type = $conn->real_escape_string($_REQUEST['report_type']);
$account_details = array();
$min_date = date("Y-m-d", strtotime('-90 Days'));
if ($from_date == "") {
	$return_array = array(
		"status" => 'ok',
		"message" => "Please select start date.",
	);
	echo json_encode($return_array);
	exit();
}

if ($to_date == "") {
	$return_array = array(
		"status" => 'ok',
		"message" => "Please select end date.",
	);
	echo json_encode($return_array);
	exit();
}
if ($min_date >= $from_date) {
	$return_array = array(
		"status" => 'ok',
		"message" => "You can not view before 90 days profit/loss report.",
	);
	echo json_encode($return_array);
	exit();
}



$opdate = date('Y-m-d', strtotime($from_date . ' -1 day'));
if ($report_type == 2) {
	$get_count_opening_balacne = $conn->query("SELECT SUM(amount) as opening_bal FROM `accounts`WHERE `user_id` = $user_id AND `bet_id` =0 AND `account_date_time` <= '$opdate 23:59:59' AND `is_open_close` <> 1");
} else if ($report_type == 3) {
	$get_count_opening_balacne = $conn->query("SELECT SUM(amount) as opening_bal FROM `accounts`WHERE `user_id` = $user_id AND `bet_id` <> 0 AND `account_date_time` <= '$opdate 23:59:59' AND `is_open_close` <> 1");
}
else if ($report_type == 4) {
	$get_count_opening_balacne = $conn->query("SELECT SUM(amount) as opening_bal FROM `accounts`WHERE `user_id` = $user_id AND `bet_id` <> 0 AND `account_date_time` <= '$opdate 23:59:59' AND `is_open_close` <> 1 and game_typ=0");
}
else if ($report_type == 5) {
	$get_count_opening_balacne = $conn->query("SELECT SUM(amount) as opening_bal FROM `accounts`WHERE `user_id` = $user_id AND `bet_id` <> 0 AND `account_date_time` <= '$opdate 23:59:59' AND `is_open_close` <> 1 and game_typ=1");
}
else if ($report_type == 6) {
	
	$get_count_opening_balacne = $conn->query("SELECT SUM(amount) as opening_bal FROM `accounts`WHERE `user_id` = $user_id AND `bet_id` = '-1' AND `account_date_time` <= '$opdate 23:59:59' AND `is_open_close` <> 1 and game_typ=1");
}
 else {
	$get_count_opening_balacne = $conn->query("select SUM(amount) as opening_bal from accounts where user_id=$user_id and account_date_time<'$from_date 00:00:00'");
}
/* $get_count_opening_balacne = $conn->query("select SUM(amount) as opening_bal from accounts where user_id=$user_id and account_date_time<'$from_date 00:00:00'"); */

$fetch_count_opening_balance = mysqli_fetch_assoc($get_count_opening_balacne);
$total_pnl = $fetch_count_opening_balance['opening_bal'];
if ($total_pnl == "") {
	$total_pnl = 0;
}
$accounts['account_date_time'] = date("d-m-Y H:i:s", strtotime("$from_date 00:00:00"));
$accounts['total_pnl'] = $total_pnl;
$accounts['remakrs'] = "Opening Balance";
$accounts['pop'] = 0;
$accounts['event_id'] = '';
$accounts['game_type'] = '';
$accounts['event_type'] = '';
$accounts['market_id'] = '';
$accounts['market_type'] = '';

$account_details[] = $accounts;
if ($report_type == 1) {
	//all
	$get_account_details = $conn->query("select SUM(amount) as total_pnl, b.market_id,a.game_type,b.event_name,b.event_id,b.event_type,b.market_name,b.bet_final_result,b.market_type,a.account_date_time,IF(b.event_id IS NULL, `a`.`transaction_id`, b.event_id) as event_group_id, IF(a.game_type = 0,IF(b.market_type = 'MATCH_ODDS' OR b.market_type = 'BOOKMAKER_ODDS' OR b.market_type = 'BOOKMAKERSMALL_ODDS', b.market_type, b.market_id),'') as mgp_id from accounts as a left outer join bet_details as b on b.bet_id=a.bet_id where a.user_id=$user_id and a.bet_id<>0 and a.game_type=0 and a.account_date_time >='$from_date 00:00:00' and a.account_date_time <='$to_date 23:59:59' and a.entry_type IN(3,4,7)  GROUP BY event_group_id,mgp_id,a.game_type order by a.account_date_time");
	$accounts = array();
	while ($fetch_get_account_details = mysqli_fetch_assoc($get_account_details)) {
		$total_pnl = $fetch_get_account_details['total_pnl'];
		$event_name = $fetch_get_account_details['event_name'];
		$event_id = $fetch_get_account_details['event_id'];
		$event_type = $fetch_get_account_details['event_type'];
		$game_type = $fetch_get_account_details['game_type'];
		$market_id = $fetch_get_account_details['market_id'];
		$bet_final_result = $fetch_get_account_details['bet_final_result'];
		$accounts['event_type'] = $event_type;
		if ($event_type == 1) {
			$event_type = "Football";
		} else if ($event_type == 2) {
			$event_type = "Tennis";
		} else if ($event_type == 4) {
			$event_type = "Cricket";
		}
		$market_name = $fetch_get_account_details['market_name'];
		$market_type = $fetch_get_account_details['market_type'];
		$account_date_time = $fetch_get_account_details['account_date_time'];
		if ($market_type == "MATCH_ODDS") {
			$remakrs = "$event_type/$event_name/$market_name/$market_type";
		} else {
			$remakrs = "$event_type/$market_name/$market_type-$bet_final_result";
		}
		$accounts['account_date_time'] = date("d-m-Y H:i:s", strtotime($account_date_time));
		$accounts['total_pnl'] = $total_pnl;
		$accounts['remakrs'] = $remakrs;
		$accounts['pop'] = 1;
		$accounts['event_id'] = $event_id;
		$accounts['game_type'] = $game_type;

		$accounts['market_id'] = $market_id;
		$accounts['market_type'] = $market_type;
		$account_details[] = $accounts;
	}


	$get_account_details = $conn->query("select SUM(amount) as total_pnl,b.event_name,b.market_id,a.game_type,b.event_id,b.event_type,b.market_name,b.market_type,b.bet_final_result,a.account_date_time,IF(b.event_id IS NULL, `a`.`transaction_id`, b.event_id) as event_group_id, IF(a.game_type = 0,IF(b.market_type = 'MATCH_ODDS' OR b.market_type = 'BOOKMAKER_ODDS' OR b.market_type = 'BOOKMAKERSMALL_ODDS', b.market_type, b.market_id),'') as mgp_id from accounts as a left outer join bet_teen_details as b on b.bet_id=a.bet_id where a.user_id=$user_id and a.bet_id<>0  and a.game_type=1 and a.account_date_time >='$from_date 00:00:00' and a.account_date_time <='$to_date 23:59:59'  GROUP BY event_group_id,mgp_id,a.game_type order by a.account_date_time");
	$accounts = array();
	while ($fetch_get_account_details = mysqli_fetch_assoc($get_account_details)) {
		$total_pnl = $fetch_get_account_details['total_pnl'];
		$event_name = $fetch_get_account_details['event_name'];
		$event_id = $fetch_get_account_details['event_id'];
		$event_type = $fetch_get_account_details['event_type'];
		$market_name = $fetch_get_account_details['market_name'];
		$market_type = $fetch_get_account_details['market_type'];
		$game_type = $fetch_get_account_details['game_type'];
		$market_id = $fetch_get_account_details['market_id'];
		$account_date_time = $fetch_get_account_details['account_date_time'];
		$bet_final_result = $fetch_get_account_details['bet_final_result'];

		$event_type1 = str_replace('ODI', '1 Day ', $event_type);
		$event_type_str = ucwords(strtolower(str_replace('_', ' ', $event_type1)));
		$bet_final_result_str = ($bet_final_result != "") ? "/$event_type_str-$bet_final_result" : "";
		$remakrs = "$event_type_str/Rno. $event_id$bet_final_result_str";
		$accounts['account_date_time'] = date("d-m-Y H:i:s", strtotime($account_date_time));
		$accounts['total_pnl'] = $total_pnl;
		$accounts['remakrs'] = $remakrs;
		$accounts['pop'] = 1;
		$accounts['event_id'] = $event_id;
		$accounts['game_type'] = $game_type;
		$accounts['event_type'] = $event_type;
		$accounts['market_id'] = $market_id;
		$accounts['market_type'] = $market_type;
		$account_details[] = $accounts;
	}


	$get_account_details = $conn->query("select SUM(amount) as total_pnl,b.event_name,a.game_type,b.market_id,b.event_id,b.event_type,b.bet_final_result,b.market_name,b.market_type,a.account_date_time,IF(b.event_id IS NULL, `a`.`transaction_id`, b.event_id) as event_group_id, IF(a.game_type = 0,IF(b.market_type = 'MATCH_ODDS' OR b.market_type = 'BOOKMAKER_ODDS' OR b.market_type = 'BOOKMAKERSMALL_ODDS', b.market_type, b.market_id),'') as mgp_id from accounts as a left outer join bet_details as b on b.bet_id=a.bet_id where a.user_id=$user_id and a.bet_id<>0  and a.account_date_time >='$from_date 00:00:00' and a.account_date_time <='$to_date 23:59:59'  and a.game_type=0  and a.entry_type IN(9)  GROUP BY event_group_id,mgp_id,a.game_type order by a.account_date_time");
	$accounts = array();
	while ($fetch_get_account_details = mysqli_fetch_assoc($get_account_details)) {
		$total_pnl = $fetch_get_account_details['total_pnl'];
		$event_name = $fetch_get_account_details['event_name'];
		$event_id = $fetch_get_account_details['event_id'];
		$event_type = $fetch_get_account_details['event_type'];
		$game_type = $fetch_get_account_details['game_type'];
		$market_id = $fetch_get_account_details['market_id'];
		$bet_final_result = $fetch_get_account_details['bet_final_result'];
		$accounts['event_type'] = $event_type;
		if ($event_type == 1) {
			$event_type = "Football";
		} else if ($event_type == 2) {
			$event_type = "Tennis";
		} else if ($event_type == 4) {
			$event_type = "Cricket";
		}
		$market_name = $fetch_get_account_details['market_name'];
		$market_type = $fetch_get_account_details['market_type'];
		$account_date_time = $fetch_get_account_details['account_date_time'];

		$remakrs = "$event_type/$event_name/$market_name/$market_type-$bet_final_result";
		$accounts['account_date_time'] = date("d-m-Y H:i:s", strtotime($account_date_time));
		$accounts['total_pnl'] = $total_pnl;
		$accounts['remakrs'] = $remakrs;
		$accounts['pop'] = 0;
		$accounts['event_id'] = $event_id;
		$accounts['game_type'] = $game_type;

		$accounts['market_id'] = $market_id;
		$accounts['market_type'] = $market_type;
		$account_details[] = $accounts;
	}

	$get_account_details = $conn->query("select SUM(amount) as total_pnl,account_date_time from accounts as a where a.user_id=$user_id and a.entry_type IN (1,2,8) and a.is_open_close<>1  and a.account_date_time >='$from_date 00:00:00' and a.account_date_time <='$to_date 23:59:59' GROUP BY a.account_date_time,a.game_type ");
	$accounts = array();
	while ($fetch_get_account_details = mysqli_fetch_assoc($get_account_details)) {
		$total_pnl = $fetch_get_account_details['total_pnl'];
		$account_date_time = $fetch_get_account_details['account_date_time'];

		$remakrs = "";
		$accounts['account_date_time'] = date("d-m-Y H:i:s", strtotime($account_date_time));
		$accounts['total_pnl'] = $total_pnl;
		$accounts['remakrs'] = $remakrs;
		$accounts['pop'] = 0;
		$accounts['event_id'] = '';
		$accounts['game_type'] = '';
		$accounts['event_type'] = '';
		$accounts['market_id'] = '';
		$accounts['market_type'] = '';
		$account_details[] = $accounts;
	}
} else if ($report_type == 2) {
	//deposite
	$get_account_details = $conn->query("select SUM(amount) as total_pnl,account_date_time from accounts as a where a.user_id=$user_id and a.entry_type IN (1,2,8) and a.is_open_close<>1  and a.account_date_time >='$from_date 00:00:00' and a.account_date_time <='$to_date 23:59:59' GROUP BY a.account_date_time,a.game_type ");
	$accounts = array();
	while ($fetch_get_account_details = mysqli_fetch_assoc($get_account_details)) {
		$total_pnl = $fetch_get_account_details['total_pnl'];
		$account_date_time = $fetch_get_account_details['account_date_time'];

		$remakrs = "";
		$accounts['account_date_time'] = date("d-m-Y H:i:s", strtotime($account_date_time));
		$accounts['total_pnl'] = $total_pnl;
		$accounts['remakrs'] = $remakrs;
		$accounts['pop'] = 0;
		$accounts['event_id'] = '';
		$accounts['game_type'] = '';
		$accounts['event_type'] = '';
		$accounts['market_id'] = '';
		$accounts['market_type'] = '';
		$account_details[] = $accounts;
	}
} else if ($report_type == 3) {
	//game report
	$get_account_details = $conn->query("select SUM(amount) as total_pnl,b.event_name,b.event_id,b.event_type,b.market_name,b.bet_final_result,b.market_id,a.game_type,b.market_type,a.account_date_time,IF(b.event_id IS NULL, `a`.`transaction_id`, b.event_id) as event_group_id, IF(a.game_type = 0,IF(b.market_type = 'MATCH_ODDS' OR b.market_type = 'BOOKMAKER_ODDS' OR b.market_type = 'BOOKMAKERSMALL_ODDS', b.market_type, b.market_id),'') as mgp_id from accounts as a left outer join bet_details as b on b.bet_id=a.bet_id where a.user_id=$user_id and a.bet_id<>0  and a.account_date_time >='$from_date 00:00:00' and a.account_date_time <='$to_date 23:59:59'   and a.game_type=0  and a.entry_type IN(3,4,7)  GROUP BY event_group_id,mgp_id,a.game_type order by a.account_date_time");
	$accounts = array();
	while ($fetch_get_account_details = mysqli_fetch_assoc($get_account_details)) {
		$total_pnl = $fetch_get_account_details['total_pnl'];
		$event_name = $fetch_get_account_details['event_name'];
		$event_id = $fetch_get_account_details['event_id'];
		$event_type = $fetch_get_account_details['event_type'];
		$bet_final_result = $fetch_get_account_details['bet_final_result'];
		$game_type = $fetch_get_account_details['game_type'];
		$market_id = $fetch_get_account_details['market_id'];
		$accounts['event_type'] = $event_type;
		if ($event_type == 1) {
			$event_type = "Football";
		} else if ($event_type == 2) {
			$event_type = "Tennis";
		} else if ($event_type == 4) {
			$event_type = "Cricket";
		}
		$market_name = $fetch_get_account_details['market_name'];
		$market_type = $fetch_get_account_details['market_type'];
		$account_date_time = $fetch_get_account_details['account_date_time'];

		$remakrs = "$event_type/$market_name/$market_type-$bet_final_result";
		$accounts['account_date_time'] = date("d-m-Y H:i:s", strtotime($account_date_time));
		$accounts['total_pnl'] = $total_pnl;
		$accounts['remakrs'] = $remakrs;
		$accounts['pop'] = 1;
		$accounts['event_id'] = $event_id;
		$accounts['game_type'] = $game_type;
		
		$accounts['market_id'] = $market_id;
		$accounts['market_type'] = $market_type;
		$account_details[] = $accounts;
	}

	$get_account_details = $conn->query("select SUM(amount) as total_pnl,b.event_name,b.event_id,b.event_type,b.market_name,b.market_type,b.market_id,b.bet_final_result,a.game_type,a.account_date_time,IF(b.event_id IS NULL, `a`.`transaction_id`, b.event_id) as event_group_id, IF(a.game_type = 0,IF(b.market_type = 'MATCH_ODDS' OR b.market_type = 'BOOKMAKER_ODDS' OR b.market_type = 'BOOKMAKERSMALL_ODDS', b.market_type, b.market_id),'') as mgp_id from accounts as a left outer join bet_teen_details as b on b.bet_id=a.bet_id where a.user_id=$user_id and a.bet_id<>0  and a.account_date_time >='$from_date 00:00:00' and a.account_date_time <='$to_date 23:59:59'  and a.game_type=1  GROUP BY event_group_id,mgp_id,a.game_type order by a.account_date_time");
	$accounts = array();
	while ($fetch_get_account_details = mysqli_fetch_assoc($get_account_details)) {
		$total_pnl = $fetch_get_account_details['total_pnl'];
		$event_name = $fetch_get_account_details['event_name'];
		$event_id = $fetch_get_account_details['event_id'];
		$event_type = $fetch_get_account_details['event_type'];
		$market_name = $fetch_get_account_details['market_name'];
		$market_type = $fetch_get_account_details['market_type'];
		$account_date_time = $fetch_get_account_details['account_date_time'];
		$bet_final_result = $fetch_get_account_details['bet_final_result'];
		$game_type = $fetch_get_account_details['game_type'];
		$market_id = $fetch_get_account_details['market_id'];

		$event_type1 = str_replace('ODI', '1 Day ', $event_type);
		$event_type_str = ucwords(strtolower(str_replace('_', ' ', $event_type1)));
		$bet_final_result_str = ($bet_final_result != "") ? "/$event_type_str-$bet_final_result" : "";

		$remakrs = "$event_type_str/Rno. $event_id $bet_final_result$bet_final_result_str";
		$accounts['account_date_time'] = date("d-m-Y H:i:s", strtotime($account_date_time));
		$accounts['total_pnl'] = $total_pnl;
		$accounts['remakrs'] = $remakrs;
		$accounts['pop'] = 1;
		$accounts['event_id'] = $event_id;
		$accounts['game_type'] = $game_type;
		$accounts['event_type'] = $event_type;
		$accounts['market_id'] = $market_id;
		$accounts['market_type'] = $market_type;
		$account_details[] = $accounts;
	}

	$get_account_details = $conn->query("select SUM(amount) as total_pnl,b.event_name,b.event_id,b.event_type,b.market_id,a.game_type,b.market_name,b.market_type,b.bet_final_result,a.account_date_time,IF(b.event_id IS NULL, `a`.`transaction_id`, b.event_id) as event_group_id, IF(a.game_type = 0,IF(b.market_type = 'MATCH_ODDS' OR b.market_type = 'BOOKMAKER_ODDS' OR b.market_type = 'BOOKMAKERSMALL_ODDS', b.market_type, b.market_id),'') as mgp_id from accounts as a left outer join bet_details as b on b.bet_id=a.bet_id where a.user_id=$user_id and a.bet_id<>0  and a.account_date_time >='$from_date 00:00:00' and a.account_date_time <='$to_date 23:59:59'  and a.game_type=0  and a.entry_type IN(9) GROUP BY event_group_id,mgp_id,a.game_type order by a.account_date_time");
	$accounts = array();
	while ($fetch_get_account_details = mysqli_fetch_assoc($get_account_details)) {
		$total_pnl = $fetch_get_account_details['total_pnl'];
		$event_name = $fetch_get_account_details['event_name'];
		$event_id = $fetch_get_account_details['event_id'];
		$event_type = $fetch_get_account_details['event_type'];
		$market_name = $fetch_get_account_details['market_name'];
		$market_type = $fetch_get_account_details['market_type'];
		$account_date_time = $fetch_get_account_details['account_date_time'];
		$bet_final_result = $fetch_get_account_details['bet_final_result'];
		$market_id = $fetch_get_account_details['market_id'];
		$game_type = $fetch_get_account_details['game_type'];

		$remakrs = "$event_type/$market_name/Rno. $event_id - $bet_final_result";
		$accounts['account_date_time'] = date("d-m-Y H:i:s", strtotime($account_date_time));
		$accounts['total_pnl'] = $total_pnl;
		$accounts['remakrs'] = $remakrs;
		$accounts['pop'] = 0;
		$accounts['event_id'] = $event_id;
		$accounts['game_type'] = $game_type;
		$accounts['event_type'] = $event_type;
		$accounts['market_id'] = $market_id;
		$accounts['market_type'] = $market_type;
		$account_details[] = $accounts;
	}
}
else if ($report_type == 4) {
	//game report
	$get_account_details = $conn->query("select SUM(amount) as total_pnl,b.event_name,b.event_id,b.event_type,b.market_name,b.bet_final_result,b.market_id,a.game_type,b.market_type,a.account_date_time,IF(b.event_id IS NULL, `a`.`transaction_id`, b.event_id) as event_group_id, IF(a.game_type = 0,IF(b.market_type = 'MATCH_ODDS' OR b.market_type = 'BOOKMAKER_ODDS' OR b.market_type = 'BOOKMAKERSMALL_ODDS', b.market_type, b.market_id),'') as mgp_id from accounts as a left outer join bet_details as b on b.bet_id=a.bet_id where a.user_id=$user_id and a.bet_id<>0  and a.account_date_time >='$from_date 00:00:00' and a.account_date_time <='$to_date 23:59:59'   and a.game_type=0  and a.entry_type IN(3,4,7)  GROUP BY event_group_id,mgp_id,a.game_type order by a.account_date_time");
	$accounts = array();
	while ($fetch_get_account_details = mysqli_fetch_assoc($get_account_details)) {
		$total_pnl = $fetch_get_account_details['total_pnl'];
		$event_name = $fetch_get_account_details['event_name'];
		$event_id = $fetch_get_account_details['event_id'];
		$event_type = $fetch_get_account_details['event_type'];
		$bet_final_result = $fetch_get_account_details['bet_final_result'];
		$game_type = $fetch_get_account_details['game_type'];
		$market_id = $fetch_get_account_details['market_id'];
		$accounts['event_type'] = $event_type;
		if ($event_type == 1) {
			$event_type = "Football";
		} else if ($event_type == 2) {
			$event_type = "Tennis";
		} else if ($event_type == 4) {
			$event_type = "Cricket";
		}
		$market_name = $fetch_get_account_details['market_name'];
		$market_type = $fetch_get_account_details['market_type'];
		$account_date_time = $fetch_get_account_details['account_date_time'];

		$remakrs = "$event_type/$market_name/$market_type-$bet_final_result";
		$accounts['account_date_time'] = date("d-m-Y H:i:s", strtotime($account_date_time));
		$accounts['total_pnl'] = $total_pnl;
		$accounts['remakrs'] = $remakrs;
		$accounts['pop'] = 1;
		$accounts['event_id'] = $event_id;
		$accounts['game_type'] = $game_type;
		
		$accounts['market_id'] = $market_id;
		$accounts['market_type'] = $market_type;
		$account_details[] = $accounts;
	}

	$get_account_details = $conn->query("select SUM(amount) as total_pnl,b.event_name,b.event_id,b.event_type,b.market_id,a.game_type,b.market_name,b.market_type,b.bet_final_result,a.account_date_time,IF(b.event_id IS NULL, `a`.`transaction_id`, b.event_id) as event_group_id, IF(a.game_type = 0,IF(b.market_type = 'MATCH_ODDS' OR b.market_type = 'BOOKMAKER_ODDS' OR b.market_type = 'BOOKMAKERSMALL_ODDS', b.market_type, b.market_id),'') as mgp_id from accounts as a left outer join bet_details as b on b.bet_id=a.bet_id where a.user_id=$user_id and a.bet_id<>0  and a.account_date_time >='$from_date 00:00:00' and a.account_date_time <='$to_date 23:59:59'  and a.game_type=0  and a.entry_type IN(9) GROUP BY event_group_id,mgp_id,a.game_type order by a.account_date_time");
	$accounts = array();
	while ($fetch_get_account_details = mysqli_fetch_assoc($get_account_details)) {
		$total_pnl = $fetch_get_account_details['total_pnl'];
		$event_name = $fetch_get_account_details['event_name'];
		$event_id = $fetch_get_account_details['event_id'];
		$event_type = $fetch_get_account_details['event_type'];
		$market_name = $fetch_get_account_details['market_name'];
		$market_type = $fetch_get_account_details['market_type'];
		$account_date_time = $fetch_get_account_details['account_date_time'];
		$bet_final_result = $fetch_get_account_details['bet_final_result'];
		$market_id = $fetch_get_account_details['market_id'];
		$game_type = $fetch_get_account_details['game_type'];

		$remakrs = "$event_type/$market_name/Rno. $event_id - $bet_final_result";
		$accounts['account_date_time'] = date("d-m-Y H:i:s", strtotime($account_date_time));
		$accounts['total_pnl'] = $total_pnl;
		$accounts['remakrs'] = $remakrs;
		$accounts['pop'] = 0;
		$accounts['event_id'] = $event_id;
		$accounts['game_type'] = $game_type;
		$accounts['event_type'] = $event_type;
		$accounts['market_id'] = $market_id;
		$accounts['market_type'] = $market_type;
		$account_details[] = $accounts;
	}
}
else if ($report_type == 5) {
	

	$get_account_details = $conn->query("select SUM(amount) as total_pnl,b.event_name,b.event_id,b.event_type,b.market_name,b.market_type,b.market_id,b.bet_final_result,a.game_type,a.account_date_time,IF(b.event_id IS NULL, `a`.`transaction_id`, b.event_id) as event_group_id, IF(a.game_type = 0,IF(b.market_type = 'MATCH_ODDS' OR b.market_type = 'BOOKMAKER_ODDS' OR b.market_type = 'BOOKMAKERSMALL_ODDS', b.market_type, b.market_id),'') as mgp_id from accounts as a left outer join bet_teen_details as b on b.bet_id=a.bet_id where a.user_id=$user_id and a.bet_id<>0  and a.account_date_time >='$from_date 00:00:00' and a.account_date_time <='$to_date 23:59:59'  and a.game_type=1  GROUP BY event_group_id,mgp_id,a.game_type order by a.account_date_time");
	$accounts = array();
	while ($fetch_get_account_details = mysqli_fetch_assoc($get_account_details)) {
		$total_pnl = $fetch_get_account_details['total_pnl'];
		$event_name = $fetch_get_account_details['event_name'];
		$event_id = $fetch_get_account_details['event_id'];
		$event_type = $fetch_get_account_details['event_type'];
		$market_name = $fetch_get_account_details['market_name'];
		$market_type = $fetch_get_account_details['market_type'];
		$account_date_time = $fetch_get_account_details['account_date_time'];
		$bet_final_result = $fetch_get_account_details['bet_final_result'];
		$game_type = $fetch_get_account_details['game_type'];
		$market_id = $fetch_get_account_details['market_id'];

		
		$event_type1 = str_replace('ODI', '1 Day ', $event_type);
		$lower_event_type=strtolower($event_type);
		if($game_list_fullName[$lower_event_type]){
			$event_type1=$game_list_fullName[$lower_event_type];
		}
		$event_type_str = ucwords(strtolower(str_replace('_', ' ', $event_type1)));
		$bet_final_result_str = ($bet_final_result != "") ? "/$event_type_str-$bet_final_result" : "";

		$remakrs = "$event_type_str/Rno. $event_id $bet_final_result$bet_final_result_str";
		$accounts['account_date_time'] = date("d-m-Y H:i:s", strtotime($account_date_time));
		$accounts['total_pnl'] = $total_pnl;
		$accounts['remakrs'] = $remakrs;
		$accounts['pop'] = 1;
		$accounts['event_id'] = $event_id;
		$accounts['game_type'] = $game_type;
		$accounts['event_type'] = $event_type;
		$accounts['market_id'] = $market_id;
		$accounts['market_type'] = $market_type;
		$account_details[] = $accounts;
	}
}


function date_compare($a, $b)
{
	$t1 = strtotime($a['account_date_time']);
	$t2 = strtotime($b['account_date_time']);
	return $t1 - $t2;
}
usort($account_details, 'date_compare');


$return = array(
	"status" => "ok",
	"data" => $account_details,
);
echo json_encode($return);
