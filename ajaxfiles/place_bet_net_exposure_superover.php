<?php
include('../include/conn.php');
include('../include/flip_function.php');
include('../include/flip_function2.php');
include "../session.php";

$user_id = $_SESSION['CLIENT_LOGIN_ID'];
$eventId = $conn->real_escape_string($_REQUEST['eventId']);
$event_id = $eventId;
$market_type = $conn->real_escape_string($_REQUEST['bet_market_type']);
$stack = $conn->real_escape_string($_REQUEST['stack']);
$marketId = $conn->real_escape_string($_REQUEST['marketId']);
$type = $conn->real_escape_string($_REQUEST['bet_stake_side']);
$runs = floatVal($conn->real_escape_string($_REQUEST['runs']));
$market_ids = null;
if ($_REQUEST['market_ids']) {
	$market_ids = $_REQUEST['market_ids'];
}

$market_ids = array_unique($market_ids);
/* $market_1_id = $market_ids[0];
	$market_2_id = $market_ids[1];
	$market_3_id = $market_ids[2]; */



if ($market_type != "FANCY_ODDS") {
	if ($type == "Lay") {
		$exposure_bet_type = "Lay";
		$margin_used = $stack * ($runs - 1);
		$bet_win_amount = $stack;
	} else {
		$exposure_bet_type = "Back";
		$bet_win_amount = $stack * ($runs - 1);
		$margin_used = $stack;
	}
	$current_bet = array(
		"bet_event_id" => $eventId,
		"bet_market_id" => $marketId,
		"bet_margin_used" => $margin_used,
		"bet_win_amount" => $bet_win_amount,
		"bet_type" => $exposure_bet_type,
	);


	$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$market_type' and bet_status=1 and market_id in (1,2) GROUP BY event_id");
	$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
	$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

	$market_idss = array();
	$get_market_id = $conn->query("select market_id from event_market_id where event_id=$event_id and market_type='$market_type'");

	foreach ($get_market_id as $market_id_data) {
		$market_iddd = $market_id_data['market_id'];
		$market_idss[] = $market_iddd;
	}
	if ($market_idss != null) {
		$market_ids = $market_idss;
	} else
		$get_event_market = $conn->query("select market_id,event_id from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_type='$market_type' and market_id in (1,2)  GROUP BY market_id order by market_id");
	$get_event_data = array();
	while ($fetch_get_event_market = mysqli_fetch_assoc($get_event_market)) {
		$get_event_data[] = $fetch_get_event_market;
	}

	$event_1_id = $event_id;
	$market_bet_type_array2 = array();
	$market_bet_type_array = array();
	foreach ($market_ids as $markets) {
		$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$markets and market_type='$market_type' and bet_type='Back' and market_id in (1,2)");

		$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$markets and market_type='$market_type' and bet_type='Lay' and market_id in (1,2)");

		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}

		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}
		$market_bet_type_array[$markets]['Back'] = $total_1_win_back;
		$market_bet_type_array[$markets]['Lay'] = $total_1_win_lay;
	}



	$current_bet_event_id = $current_bet['bet_event_id'];

	if ($current_bet_event_id == $event_1_id) {

		$current_bet_market_id = $current_bet['bet_market_id'];
		$current_bet_type = $current_bet['bet_type'];
		$current_bet_win_amount = $current_bet['bet_win_amount'];
		$current_bet_margin_used = $current_bet['bet_margin_used'];
		$total_bet_amount = $total_bet_amount + $current_bet_margin_used;
		if ($current_bet_type == 'Back') {
			//same market id

			/* $market_bet_type_array2=array(); */
			foreach ($market_bet_type_array as $key => $val) {
				if ($current_bet_market_id == $key) {
					$total_1_win_back = $val['Back'] + $current_bet_win_amount + $current_bet_margin_used;
					$market_bet_type_array[$key]['Back'] = $total_1_win_back;
				}
			}
		} else {


			foreach ($market_bet_type_array as $key => $val) {
				if ($current_bet_market_id != $key) {
					$total_1_win_lay = $val['Lay'] + $current_bet_win_amount + $current_bet_margin_used;
					$market_bet_type_array[$key]['Lay'] = $total_1_win_lay;
				}
			}
		}
	}

	$market_ids_array = array();
	$market_exposure_array = array();
	$i_p = 0;
	foreach ($market_bet_type_array as $key => $val) {
		$i_p++;
		$keyyy = "team_" . $i_p;
		$market_ids_array[$keyyy] = $key;
		$market_exposure_array[$keyyy] = ($val['Back'] + $val['Lay']) - $total_bet_amount;
	}
    if($marketId == "1" || $marketId == "2"){
        $market_type="BOOKMAKER_ODDS";
    }
	$data[$market_type] = array(
		"market_ids" => $market_ids_array,
		"exposure" => $market_exposure_array,
	);



	$return_array = array(
		"status" => 'ok',
		"data" => $data,
	);
	echo json_encode($return_array);
	exit();
}
$return_array = array(
		"status" => 'ok',
		"data" => array(),
	);
	echo json_encode($return_array);
	exit();