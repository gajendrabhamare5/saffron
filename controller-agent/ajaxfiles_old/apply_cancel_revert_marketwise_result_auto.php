<?php
include "../../include/conn.php";

$user_id = 1;



$search_datewise = "";
/* if(isset($_REQUEST['start_time'])){
		$start_time = $_REQUEST['start_time'];
		$end_time = $_REQUEST['end_time'];
		
		if($start_time != "" and $end_time != ""){
			$search_datewise .=" and bet_time between '$start_time' and '$end_time'";
		}
	} */

if (isset($_REQUEST['login_type'])) {
	$login_type = $_REQUEST['login_type'];
	if ($login_type != 5) {
		$return_array = array(
			"status" => "error",
			"message" => "Please try after some time",
		);
		echo json_encode($return_array);
		exit();
	}
} else {
	$return_array = array(
		"status" => "error",
		"message" => "Please try after some time",
	);
	echo json_encode($return_array);
	exit();
}

$event_id = $_REQUEST['event_id'];
$market_id = $_REQUEST['market_id'];

$condition1 = "";
if (isset($_REQUEST['oddsmarketId'])) {
	$oddsmarketId = $_REQUEST['oddsmarketId'];
	$condition1 = " oddsmarketId='$oddsmarketId' and ";
}

$get_revert_market_entry_id = $conn->query("select * from bet_details where $condition1 bet_status IN (2) and event_id=$event_id and market_id=$market_id $search_datewise");
$url_row_count = mysqli_num_rows($get_revert_market_entry_id);
if ($url_row_count > 0) {
	$all_bet_id = array();
	$counttt = 0;
	while ($fetch_bet_details = mysqli_fetch_assoc($get_revert_market_entry_id)) {
		$bet_id = $fetch_bet_details['bet_id'];
		$all_bet_id[] = $bet_id;
		$bet_user_id = $fetch_bet_details['user_id'];
		$event_id = $fetch_bet_details['event_id'];
		$market_id = $fetch_bet_details['market_id'];
		$event_type = $fetch_bet_details['event_type'];
		$market_type = $fetch_bet_details['market_type'];
		$bet_status = $fetch_bet_details['bet_status'];
		if (!empty($bet_id) && $bet_id > 0) {

			$counttt++;
			$bet_event_id = $fetch_bet_details['event_id'];
			$bet_market_id = $fetch_bet_details['market_id'];
			$bet_market_type = $fetch_bet_details['market_type'];
			$bet_event_type = $fetch_bet_details['event_type'];
			$bet_win_amount = $fetch_bet_details['bet_win_amount'];
			$bet_bet_time = $fetch_bet_details['bet_time'];
			if ($bet_market_type == "FANCY_ODDS") {


				$exposure_data = get_current_bet_fancy_exposure2_cancel($conn, $bet_user_id, $bet_event_id, $bet_market_id);
				$exposure_data = min($exposure_data);
				$condition = " and market_id=" . $bet_market_id;
				$condition2 = ",market_id=" . $bet_market_id;
			} else {
				$bet_type_exposure = "";
				$stack = "";
				$runs = "";
				$condition = "";
				$condition2 = "";

				$exposure_data = get_net_exposure_match_oods_cancel($conn, $bet_user_id, $bet_event_id, $bet_market_type, $bet_type_exposure, $stack, $runs);
			}

			$expo_fetch = $conn->query("select * from exposure_details where user_id=$bet_user_id and event_id='$bet_event_id' and market_type='$bet_market_type' $condition");
			$count_exposure = mysqli_num_rows($expo_fetch);
			if ($exposure_data == 0) {
				if ($count_exposure > 0) {
					/* echo "delete from exposure_details where event_id='$bet_event_id' and  user_id=$bet_user_id and market_type='$bet_market_type' $condition";
						echo "<br>\n"; */
					$conn->query("delete from exposure_details where event_id='$bet_event_id' and  user_id=$bet_user_id and market_type='$bet_market_type' $condition");
				}
			} else {

				if ($count_exposure > 0) {
					/* echo "update exposure_details set exposure_amount='$exposure_data' where event_id='$bet_event_id' and user_id=$bet_user_id and market_type='$bet_market_type' $condition";
						echo "<br>\n"; */
					$conn->query("update exposure_details set exposure_amount='$exposure_data' where event_id='$bet_event_id' and user_id=$bet_user_id and market_type='$bet_market_type' $condition");
				} else {
					/* echo "insert into exposure_details set `user_id`='$bet_user_id',`event_type`='$bet_event_type',`event_id`='$bet_event_id',`market_type`='$bet_market_type',`exposure_amount`='$exposure_data',`max_winning_amount`='$bet_win_amount',`exposure_datetime`='$bet_bet_time' $condition2";
						echo "<br>\n"; */
					$conn->query("insert into exposure_details set `user_id`='$bet_user_id',`event_type`='$bet_event_type',`event_id`='$bet_event_id',`market_type`='$bet_market_type',`exposure_amount`='$exposure_data',`max_winning_amount`='$bet_win_amount',`exposure_datetime`='$bet_bet_time' $condition2");
				}
			}
			/* echo "update bet_details set bet_status='1' where user_id=$bet_user_id and bet_id=$bet_id and bet_status='2'";
				echo "<br>\n"; */
			$conn->query("update bet_details set bet_status='1' where user_id=$bet_user_id and bet_id=$bet_id and bet_status='2'");
		}
	}

	if (count($all_bet_id) == $counttt) {
		$return_array = array(
			"status" => "ok",
			"message" => "Bet Revert Successffully.",
		);
		echo json_encode($return_array);
		exit();
	}
} else {
	$return_array = array(
		"status" => "error",
		"message" => "Please try after some time,No bet available.",
	);
	echo json_encode($return_array);
	exit();
}

/* $get_revert_market_entry_id = $conn->query("select * from bet_details where $condition bet_status IN (2) and event_id=$event_id and market_id=$market_id $search_datewise");
	while($fetch_get_revert_market_entry_id = mysqli_fetch_assoc($get_revert_market_entry_id)){
		$bet_id = $fetch_get_revert_market_entry_id['bet_id'];		
		$update_bet_details  = $conn->query("update bet_details set bet_status=1,bet_result='0' where bet_id=$bet_id");
		$delete_bet_details  = $conn->query("delete from accounts where bet_id=$bet_id and game_type=0");
		$delete_bet_details  = $conn->query("delete from accounts_temp where bet_id=$bet_id and game_type=0");
		
		$get_bet_details = $conn->query("select * from bet_details where bet_id='$bet_id'");
	$fetch_get_bet_details = mysqli_fetch_assoc($get_bet_details);
	$bet_user_id = $fetch_get_bet_details['user_id'];
	$bet_event_id = $fetch_get_bet_details['event_id'];
	$bet_market_id = $fetch_get_bet_details['market_id'];
	
	$get_account_id = $conn->query("select * from commission_master where user_id=$bet_user_id and event_id='$bet_event_id'");
	$fetch_event_id = mysqli_fetch_assoc($get_account_id);
	$comm_id = $fetch_event_id['comm_id'];
	$both_account_id = $fetch_event_id['account_id'];
	
	$conn->query("delete from commission_master where comm_id='$comm_id'");
	$bet_id_new = $fetch_event_id['bet_id'];
	
	$conn->query("delete from accounts where bet_id IN($bet_id_new) and game_type=0 and entry_type IN(9,10)");
	$conn->query("delete from accounts_temp where bet_id IN($bet_id_new) and game_type=0 and entry_type IN(9,10)");
	
	
	}
	
	$return_array = array(
					"status"=>'ok',
					"message"=>'Bet Revert.',
					);
	echo json_encode($return_array);
	exit(); */
