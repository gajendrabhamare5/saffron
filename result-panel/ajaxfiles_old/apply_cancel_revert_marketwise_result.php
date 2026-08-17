<?php
	include "../../include/conn.php";
	include "../../include/flip_function2.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	/* error_reporting(E_ALL);
	ini_set("display_errors",1);
	ini_set("display_startup_errors",1); */
	
		$search_datewise = "";
	if(isset($_REQUEST['start_time'])){
		$start_time = $_REQUEST['start_time'];
		$end_time = $_REQUEST['end_time'];
		
		if($start_time != "" and $end_time != ""){
			$search_datewise .=" and b.bet_time between '$start_time' and '$end_time'";
		}
	}
	
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	$event_id = $_REQUEST['event_id'];
	$market_id = $_REQUEST['market_id'];
	$oddsmarketId = $_REQUEST['oddsmarketId'];
 	$all_result_url = array();
	/*foreach($white_list_data_cancel as $white_list_url){
	
	
		$url2 = $white_list_url."controller-agent/ajaxfiles/apply_cancel_revert_marketwise_result_auto.php?event_id=$event_id&oddsmarketId=$oddsmarketId&market_id=$market_id&start_time=$start_time&end_time=$end_time&login_type=$login_type";
		$url2 = str_replace(" ","%20",$url2);
		$all_result_url[] = $url2;
	} 
	
	
	$host = SITE_IP;


 	require '../../vendor/autoload.php';

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
	
	$client = new Client(new Version2X(SITE_IP.'?token=mamu',$options));
	$client->initialize();
	$client->emit('giveResult', ['list' => $all_result_url]);
	$client->close(); 
	*/
	$fetch_event_id_query = $conn->query("select * from bet_details where bet_status IN (2) and event_id=$event_id and oddsmarketId='$oddsmarketId' and market_id=$market_id $search_datewise");
	$url_row_count = mysqli_num_rows($fetch_event_id_query);
	if ($url_row_count > 0) {
		$all_bet_id = array();
		$counttt = 0;
		while ($fetch_bet_details = mysqli_fetch_assoc($fetch_event_id_query)) {
			$bet_id = $fetch_bet_details['bet_id'];
			$all_bet_id[]=$bet_id;
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
						$delete_exposure = $conn->query("delete from exposure_details where event_id='$bet_event_id' and  user_id=$bet_user_id and market_type='$bet_market_type' $condition");
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
				$delete_bet_details  = $conn->query("update bet_details set bet_status='1' where user_id=$bet_user_id and bet_id=$bet_id and bet_status='2'");
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
/* 

	$get_revert_market_entry_id = $conn->query("select * from bet_details where bet_status IN (2) and event_id=$event_id and oddsmarketId='$oddsmarketId' and market_id=$market_id $search_datewise");
	while($fetch_get_revert_market_entry_id = mysqli_fetch_assoc($get_revert_market_entry_id)){
		$bet_id = $fetch_get_revert_market_entry_id['bet_id'];		
		$update_bet_details  = $conn->query("update bet_details set bet_status=1,bet_result='0' where bet_id=$bet_id");
		$delete_bet_details  = $conn->query("delete from accounts where bet_id=$bet_id and game_type=0");
		 
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
	
	$conn->query("delete from accounts where account_id IN($both_account_id) and game_type=0");
	
	
	}
	
	$return_array = array(
					"status"=>'ok',
					"message"=>'Bet Revert.',
					);
	echo json_encode($return_array);
	exit(); */
?>