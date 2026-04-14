<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	error_reporting(E_ALL);
	ini_set("display_errors",1);
	ini_set("display_startup_errors",1);
	
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
	
	
	foreach($white_list_data as $white_list_url){
	
	
		$url2 = $white_list_url."controller-agent/ajaxfiles/apply_revert_marketwise_result_auto.php?event_id=$event_id&market_id=$market_id&start_time=$start_time&end_time=$end_time";
		$url2 = str_replace(" ","%20",$url2);
		file_get_contents($url2);
	}
	
	$get_revert_market_entry_id = $conn->query("select * from bet_details where bet_status=0 and event_id=$event_id and market_id=$market_id $search_datewise");
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
	$bet_id_new = $fetch_event_id['bet_id'];
	$conn->query("delete from commission_master where comm_id='$comm_id'");
	
	$conn->query("delete from accounts where bet_id IN($bet_id_new) and game_type=0 and entry_type IN(9,10)");
	$conn->query("delete from accounts_temp where bet_id IN($bet_id_new) and game_type=0 and entry_type IN(9,10)");
	
	
	}
	
	$return_array = array(
					"status"=>'ok',
					"message"=>'Bet Result Revert.',
					);
	echo json_encode($return_array);
	exit();
?>