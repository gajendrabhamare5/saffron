<?php
include('../include/conn.php');
/* error_reporting(E_ALL);
ini_set("display_errors",1);
ini_set("display_startup_errors",1); */
$user_id = 7;
$current_bet = array(
	"bet_event_id" => "135250426124826",
	"bet_market_id" => "17_3",
	"bet_margin_used" => "350",
	"bet_win_amount" => "100",
	"bet_type" => "Lay",
	"bet_market_type" => "TRAP",
	"bet_market_name" => "",
	"stack" => "100",
	"runs" => "4.5",
);
$bet_event_type = $current_bet['bet_event_type'];
$bet_event_id = $current_bet['bet_event_id'];
$bet_market_id = $current_bet['bet_market_id'];
$bet_margin_used = $current_bet['bet_margin_used'];
$bet_win_amount = $current_bet['bet_win_amount'];
$bet_odds = $current_bet['bet_odds'];
$bet_type = $current_bet['bet_market_type'];
$bet_type_exposure = $current_bet['bet_type'];
$stack = $current_bet['stack'];
$runs = $current_bet['runs'];
$exposure_datetime = date("Y-m-d H:i:s");
$bet_type_check = false;



$bet_market_type2 = "";
if (isset($current_bet['bet_market_type2'])) {
	$bet_market_type2 = $current_bet['bet_market_type2'];
}

if (strpos($bet_type, "OVER_UNDER") !== false || strpos($bet_type, "UNDER_OVER") !== false || strpos($bet_type, "GAME_WINNER") !== false || strpos($bet_type, "2ND_SET_WINNER") !== false || strpos($bet_type, "GAME_TO_DEUCE") !== false || strpos($bet_type, "BM_2ND_SET") !== false || strpos($bet_type, "POINT_WINNER") !== false) {
	$bet_type_check = true;
}

if (count($current_bet) > 0 && isset($current_bet['other_fancy']) && $current_bet['other_fancy'] == "other") {
	$bet_type_check = true;
}

$bet_market_name = "";
$where = "";
/* if (isset($current_bet['bet_market_name'])) {
	$bet_market_name = $current_bet['bet_market_name'];
	$where = " and casino_back_name='$bet_market_name'";
} */

echo "select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type' $where";
$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type' $where");
$check_num_rows = mysqli_num_rows($check_market_exposure_exit);

if ($check_num_rows > 0) {
	//insert
	echo "insert into exposure_details (user_id,event_id,market_type,exposure_amount,exposure_datetime,casino_back_name,max_winning_amount) values('$user_id','$bet_event_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_market_name','$bet_win_amount')";
	/* $conn->query("insert into exposure_details (user_id,event_id,market_type,exposure_amount,exposure_datetime,casino_back_name,max_winning_amount) values('$user_id','$bet_event_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_market_name','$bet_win_amount')"); */
} else {


	$exposure_data = get_net_exposure_casino_oods($conn, $user_id, $bet_event_id, $bet_type, $bet_type_exposure, $stack, $runs, $bet_market_name);

	echo "<pre>";
	print_r($exposure_data);
	echo "</pre>";

	$max_exposure_data = abs($exposure_data);
	echo "update exposure_details set exposure_amount='$exposure_data',max_winning_amount='$max_exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type' and casino_back_name='$bet_market_name'";

	/* $update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',max_winning_amount='$max_exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type' and casino_back_name='$bet_market_name'"); */
}

function get_net_exposure_casino_oods($conn, $user_id, $bet_event_id, $market_type, $bet_type_exposure, $stack, $runs, $bet_market_name, $current_bet = array(), $is_all_value = 0)
{
	$net_exposure_array = array();
	$runs = floatVal($runs);
	$event_id = $bet_event_id;
	if ($bet_market_name == "") {

		$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type'");
	} else {
	/* 	$net_exposure_array['market_idss'][] ="select * from event_casino_market_id where market_type='$market_type' and back_name='$bet_market_name'"; */
		$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type' and back_name='$bet_market_name'");
	}

	$market_ids = array();
	while ($market_ids_array = mysqli_fetch_assoc($market_id)) {
		$market_ids[] = $market_ids_array['market_id'];
	}
	
	$market_idss = array_unique($market_ids);

	/* $net_exposure_array['market_idss'][] =$market_idss; */
	foreach ($market_idss as $market_ids1) {
		$market_id1 = $market_ids1;

		$type = $bet_type_exposure;
		if ($type == "Lay") {
			$exposure_bet_type = "Lay";
			$margin_used = $stack * ($runs - 1);
			$bet_win_amount = $stack;
		} else {
			$exposure_bet_type = "Back";
			$bet_win_amount = $stack * ($runs - 1);
			$margin_used = $stack;
		}

		/* $net_exposure_array['quety1'][] = "select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name' and bet_status=0 GROUP BY event_id"; */
		$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name' and bet_status=0 GROUP BY event_id");
		$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
		$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

		$event_1_id = $event_id;

		/* $net_exposure_array['quety2'][] = "select * from  bet_teen_details  where user_id=$user_id and bet_status =0 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back'"; */
		$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =0 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back'");

		/* $net_exposure_array['quety3'][] = "select * from  bet_teen_details  where user_id=$user_id and bet_status =0 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'"; */
		$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =0 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'");


		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = $win_team_1;
	}


	/* if ($is_all_value == 0) {
		$net_exposure_array =  min($net_exposure_array);
	} */
	return $net_exposure_array;
}
