<?php
include "../../include/conn.php";
include "../../include/flip_function2.php";


$event_name = $conn->real_escape_string($_POST['event_name']);
$sport_name = $conn->real_escape_string($_POST['sport_name']);
$market_name = $conn->real_escape_string($_POST['market_name']);
$yes_run = $conn->real_escape_string($_POST['yes_run']);
$no_run = $conn->real_escape_string($_POST['no_run']);
$yes_size = $conn->real_escape_string($_POST['yes_size']);
$no_size = $conn->real_escape_string($_POST['no_size']);
$start_date_time = $conn->real_escape_string($_POST['start_date_time']);
$end_date_time = $conn->real_escape_string($_POST['end_date_time']);

$where = "";
if (isset($_POST['yes_run']) && !empty($_POST['yes_run'])) {
	$yes_run = $_POST['yes_run'];
	$where .= " and bet_runs = '$yes_run' and bet_type='Yes'";
}
if (isset($_POST['no_run']) && !empty($_POST['no_run'])) {
	$no_run = $_POST['no_run'];
	$where .= " and bet_runs = '$no_run' and bet_type='No'";
}
if (isset($_POST['yes_size']) && !empty($_POST['yes_size'])) {
	$yes_size = $_POST['yes_size'];
	$where .= " and bet_odds = '$yes_size' and (bet_type='Yes' or bet_type='Back')";
}
if (isset($_POST['no_size']) && !empty($_POST['no_size'])) {
	$no_size = $_POST['no_size'];
	$where .= " and bet_odds = '$no_size' and (bet_type='No' or bet_type='Lay')";
}
if (isset($_POST['start_date_time']) && !empty($_POST['start_date_time'])) {
	$start_date_time = $_POST['start_date_time'];
	$start_date_time = date("Y-m-d H:i:s", strtotime($start_date_time));
	$where .= " and bet_time >= '$start_date_time'";
}
if (isset($_POST['end_date_time']) && !empty($_POST['end_date_time'])) {
	$end_date_time = $_POST['end_date_time'];
	$end_date_time = date("Y-m-d H:i:s", strtotime($end_date_time));
	$where .= " and bet_time <= '$end_date_time'";
}
$myfile = fopen("bet_cancel_file.txt", "w") or die("Unable to open file!");
$fetch_event_id_query = $conn->query("select bet_id from bet_details where event_id = '$event_name' and market_id='$market_name' and event_type='$sport_name' $where");
$url_row_count = mysqli_num_rows($fetch_event_id_query);
if ($url_row_count > 0) {
	$all_bet_id = array();
	while ($fetch_event_id_data = mysqli_fetch_assoc($fetch_event_id_query)) {
		$bet_id = $fetch_event_id_data['bet_id'];
		if (!empty($bet_id) && $bet_id > 0) {
			$all_bet_id[] = $bet_id;
		}
	}
	if (count($all_bet_id) <= 0) {
		$return_array = array(
			"status" => "error",
			"message" => "Please try after some time,No bet available.",
		);
		echo json_encode($return_array);
		exit();
	}

	$counttt = 0;
	$bet_id_list = implode(",", $all_bet_id);
	foreach ($all_bet_id as $bet_id) {
		$get_bet_details = $conn->query("select * from bet_details where bet_id=$bet_id and bet_status IN (1,0)");
		$fetch_bet_details = mysqli_fetch_assoc($get_bet_details);
		$bet_user_id = $fetch_bet_details['user_id'];
		$event_id = $fetch_bet_details['event_id'];
		$market_id = $fetch_bet_details['market_id'];
		$event_type = $fetch_bet_details['event_type'];
		$market_type = $fetch_bet_details['market_type'];
		$bet_status = $fetch_bet_details['bet_status'];
		if (!empty($bet_id) && $bet_id > 0) {
			$delete_bet_details  = $conn->query("update bet_details set bet_status='2' where user_id=$bet_user_id and bet_id=$bet_id");

			$counttt++;
			$ip_address = '';
			if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
				$ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
			} else {
				$ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			}
			$bet_user_agent = $_SERVER['HTTP_USER_AGENT'];
			$todaytime = date("Y-m-d H:i:s");
			$conn->query("INSERT INTO `bet_cancelled_log`(`bet_id`, `event_type`, `event_id`, `market_id`, `yes_run`, `no_run`, `yes_size`, `no_size`, `start_date_time`, `end_date_time`, `ip_adderss`, `user_agent`, `added_datetime`) VALUES ('$bet_id','$sport_name','$event_name','$market_name','$yes_run','$no_run','$yes_size','$no_size','$start_date_time','$end_date_time','$ip_address','$bet_user_agent','$todaytime')");
			if ($bet_status == 0) {
				$fetch_acc_query = $conn->query("select * from accounts where bet_id=$bet_id and game_type='0'");
				if (mysqli_num_rows($fetch_acc_query) > 0) {

					$fetch_acc_temp_query = $conn->query("select * from accounts_temp where bet_id=$bet_id and game_type='0'");
					if (mysqli_num_rows($fetch_acc_temp_query) > 0) {
						$delete_bet_details  = $conn->query("delete from accounts_temp where bet_id=$bet_id and game_type='0'");
					} else {
						while ($old_data = mysqli_fetch_assoc($fetch_acc_query)) {
							$user_id_acc = $old_data['user_id'];
							$opp_user_id_acc = $old_data['opp_user_id'];
							$account_description_acc = $old_data['account_description'];
							$bet_id_acc = $old_data['bet_id'];
							$event_id_acc = $old_data['event_id'];
							$game_type_acc = $old_data['game_type'];
							$amount_acc = $old_data['amount'];
							$amount_acc = $amount_acc * (-1);
							$type_acc = $old_data['type'];
							if ($type_acc == "Credit") {
								$type_acc = "Debit";
							} else {
								$type_acc = "Credit";
							}
							$entry_type_acc = $old_data['entry_type'];
							$account_date_time_acc = $old_data['account_date_time'];
							$status_acc = $old_data['status'];
							$remark_acc = $old_data['remark'];
							$transaction_id_acc = $old_data['transaction_id'];

							$conn->query("insert into accounts_temp  SET `user_id`='$user_id_acc',`opp_user_id`='$opp_user_id_acc',`account_description`='$account_description_acc',`bet_id`='$bet_id_acc',`event_id`='$event_id_acc',`game_type`='$game_type_acc',`amount`='$amount_acc',`type`='$type_acc',`entry_type`='12',`account_date_time`='$account_date_time_acc',`status`='$status_acc',`remark`='Added new entry bcz bet not found cancel time',`transaction_id`='$transaction_id_acc'");
						}
					}
					$delete_bet_details  = $conn->query("delete from accounts where bet_id=$bet_id and game_type='0'");
				}
			}
		}


		$bet_event_id = $fetch_bet_details['event_id'];
		$bet_market_id = $fetch_bet_details['market_id'];
		$bet_market_type = $fetch_bet_details['market_type'];
		$bet_event_type = $fetch_bet_details['event_type'];
		$bet_win_amount = $fetch_bet_details['bet_win_amount'];
		$bet_bet_time = $fetch_bet_details['bet_time'];
		if ($bet_market_type == "FANCY_ODDS") {


			$exposure_data = get_current_bet_fancy_exposure2($conn, $bet_user_id, $bet_event_id, $bet_market_id);
			$exposure_data = min($exposure_data);
			$condition = " and market_id=" . $bet_market_id;
			$condition2 = ",market_id=" . $bet_market_id;
		} else {
			$bet_type_exposure = "";
			$stack = "";
			$runs = "";
			$condition = "";
			$condition2 = "";

			$exposure_data = get_net_exposure_match_oods($conn, $bet_user_id, $bet_event_id, $bet_market_type, $bet_type_exposure, $stack, $runs);
		}

		$expo_fetch = $conn->query("select * from exposure_details where user_id=$bet_user_id and event_id='$bet_event_id' and market_type='$bet_market_type' $condition");
		$count_exposure = mysqli_num_rows($expo_fetch);
		if ($exposure_data == 0) {
			if ($count_exposure > 0) {
				$delete_exposure = $conn->query("delete from exposure_details where event_id='$bet_event_id' and  user_id=$bet_user_id and market_type='$bet_market_type' $condition");
			}
		} else {

			if ($count_exposure > 0) {
				$conn->query("update exposure_details set exposure_amount='$exposure_data' where event_id='$bet_event_id' and user_id=$bet_user_id and market_type='$bet_market_type' $condition");
			} else {
				$conn->query("insert into exposure_details set `user_id`='$bet_user_id',`event_type`='$bet_event_type',`event_id`='$bet_event_id',`market_type`='$bet_market_type',`exposure_amount`='$exposure_data',`max_winning_amount`='$bet_win_amount',`exposure_datetime`='$bet_bet_time' $condition2");
			}
		}
	}

	if (count($all_bet_id) == $counttt) {
		$return_array = array(
			"status" => "ok",
			"message" => "Bet Cancelled Successffully.",
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
