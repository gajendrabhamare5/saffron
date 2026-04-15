<?php
	include "../../include/conn.php";
	include "../../include/flip_function2.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	
	error_reporting(0);
	/* error_reporting(E_ALL);
	ini_set("display_errors",1);
	ini_set("display_startup_errors",1);
	 */
	$bet_id = $_REQUEST['bet_id'];
	if($login_type == 5){
		
	}else{
		header("Location: ../logout.php");
	}
	
	if($bet_id == ""){
		$return = array(
						"status"=>"ok",
						"message"=>"Please Select Click on Bet Button",
						);
		echo json_encode($return);
		exit();
	}
	
	$get_bet_details = $conn->query("select * from bet_details where bet_id=$bet_id and bet_status=2");
	$fetch_bet_details = mysqli_fetch_assoc($get_bet_details);
	$bet_user_id = $fetch_bet_details['user_id'];
	$market_type = $fetch_bet_details['market_type'];
	$event_id = $fetch_bet_details['event_id'];
	$market_id = $fetch_bet_details['market_id'];
	
	$activate_bet_details  = $conn->query("update bet_details set bet_status=1 where user_id=$bet_user_id and bet_id=$bet_id");
	
	if($market_type == "FANCY_ODDS"){
		$exposure_data = get_current_bet_fancy_exposure2($conn,$bet_user_id,$event_id,$market_id);
		$exposure_data = min($exposure_data);
		
		if($exposure_data == 0){
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and market_id='$market_id' and user_id=$bet_user_id and market_type='$market_type'");
		}else{
			$check_old_exposure = $conn->query("select * from exposure_details where user_id=$bet_user_id and event_id='$event_id' and market_id='$market_id'");
			$row_check_old_exposure = mysqli_fetch_assoc($check_old_exposure);
			if($row_check_old_exposure >= 1){
				$conn->query("update exposure_details set exposure_amount='$exposure_data' where user_id=$bet_user_id and event_id='$event_id' and market_id='$market_id' and market_type='$market_type'");
			}else{
				$conn->query("insert into exposure_details (user_id,event_id,market_id,market_type,exposure_amount) VALUES($bet_user_id,'$event_id','$market_id','$market_type','$exposure_data')");
			}
		}
		
	
	}else{
		$bet_type_exposure ="";
		$stack ="";
		$runs ="";
		
		$exposure_data = get_net_exposure_match_oods($conn,$bet_user_id,$event_id,$market_type,$bet_type_exposure,$stack,$runs);
		
		if($exposure_data == 0){
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and user_id=$bet_user_id and market_type='$market_type'");
		}else{
			$check_old_exposure = $conn->query("select * from exposure_details where user_id=$bet_user_id and event_id='$event_id' and market_type='$market_type'");
			$row_check_old_exposure = mysqli_fetch_assoc($check_old_exposure);
			if($row_check_old_exposure >= 1){
				$conn->query("update exposure_details set exposure_amount='$exposure_data' where event_id='$event_id' and user_id=$bet_user_id and market_type='$market_type'");
			}else{
				$conn->query("insert into exposure_details (user_id,event_id,market_type,exposure_amount) VALUES($bet_user_id,'$event_id','$market_type','$exposure_data')");
			}
			
		}
	}
	
	$return_array = array(
						"status"=>'ok',
						"message"=>'Bet Activated',
						);
	echo json_encode($return_array);
	exit();
	
	
?>