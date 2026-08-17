<?php
	include "../../include/conn.php";
	include "../session.php";
/* 	error_reporting(E_ALL);
	ini_set("display_errors",1);
	ini_set("display_startup_errors",1); */
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	
	$event_id = $_REQUEST['event_id'];
	$market_id = $_REQUEST['market_id'];
	$market_type = $_REQUEST['market_type'];
	$match_odds_result = $_REQUEST['match_odds_result'];
		//add refrence result 			
		
			$search_datewise = "";
	if(isset($_REQUEST['start_time'])){
		$start_time = $_REQUEST['start_time'];
		$end_time = $_REQUEST['end_time'];
		
		if($start_time != "" and $end_time != ""){
			$search_datewise .=" and b.bet_time between '$start_time' and '$end_time'";
		}
	}
	
		
		$conn->query("insert into result (eventType,eventId,marketId,runs,marketName) values('4','$event_id','$market_id','$match_odds_result','fancy')");
	
	if($match_odds_result == "CAN"){
		
		if($market_type == "Over"){
		
			$delete_bet_details  = $conn->query("update bet_details set bet_status=2 where event_id='$event_id' and market_type='FANCY_ODDS' and market_id='$market_id' $search_datewise");
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and market_id='$market_id' and market_type='FANCY_ODDS' $search_datewise");
			$return_array = array(
							"status"=>'ok',
							"message"=>'Bet Cancelled Fancy',
							);
			echo json_encode($return_array);
			exit();
		}else{
			$delete_bet_details  = $conn->query("update bet_details set bet_status=2 where event_id='$event_id' and market_type='MATCH_ODDS' and market_id='$market_id' $search_datewise");
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id'  and market_type='MATCH_ODDS' $search_datewise");
			
			$return_array = array(
							"status"=>'ok',
							"message"=>'Bet Cancelled',
							);
			echo json_encode($return_array);
			exit();
		}
	}else{
$return_array = array(
							"status"=>'error',
							"message"=>'Please write CAN',
							);
			echo json_encode($return_array);
			exit();
	}