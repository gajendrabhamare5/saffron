<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	
	$event_id = $_REQUEST['event_id'];
	$market_id = $_REQUEST['market_id'];
	$market_type = $_REQUEST['market_type'];
	$match_odds_result = $_REQUEST['match_odds_result'];
	$total_profit_loss = 0;
	
	$url = "http://www.netexch.com/api/get_profit_loss_before_result.php?market_id=$market_id&event_id=$event_id&market_type=$market_type&match_odds_result=$match_odds_result";
	$url = str_replace(" ","%20",$url);
	$net_profit_loss = file_get_contents($url);
	
	
	
	$total_profit_loss = $total_profit_loss + $net_profit_loss;
	if($market_type == "Over"){
		if($match_odds_result != "CAN"){
			$get_win_bet_details = $conn->query("select * from bet_details where event_id=$event_id and market_id=$market_id and market_type='FANCY_ODDS'");
			while($fetch_get_win_bet_details = mysqli_fetch_assoc($get_win_bet_details)){
				$bet_id = $fetch_get_win_bet_details['bet_id'];
				$bet_type = $fetch_get_win_bet_details['bet_type'];
				$bet_runs = $fetch_get_win_bet_details['bet_runs'];
				if($bet_type == "Yes" and $bet_runs<= $match_odds_result){
					$return_amount = set_result($conn,$bet_id,'Win');
				}else if($bet_type=="No" and $bet_runs > $match_odds_result){
					$return_amount = set_result($conn,$bet_id,'Win');
				}else{
					$return_amount = set_result($conn,$bet_id,'Loss');
				}
				
				$total_profit_loss = $total_profit_loss + $return_amount;
				
			}
			
		}
	}
	if($market_type == "lottery"){
		if($match_odds_result != "CAN"){
			$get_win_bet_details = $conn->query("select * from bet_details where event_id=$event_id and market_id=$market_id and market_type='%ST_INN_%'");
			while($fetch_get_win_bet_details = mysqli_fetch_assoc($get_win_bet_details)){
				$bet_id = $fetch_get_win_bet_details['bet_id'];
				$bet_type = $fetch_get_win_bet_details['bet_type'];
				$bet_runs = $fetch_get_win_bet_details['bet_runs'];
				$market_name = $fetch_get_win_bet_details['market_name'];
				$market_name = explode(" ",$market_name);
				$winnner = $market_name[0];
				if(($bet_type == "Yes" or $bet_type == "Back") and $winnner == $match_odds_result){
					$return_amount = set_result($conn,$bet_id,'Win');
				}else if(($bet_type=="No" or $bet_type == "Lay") and $winnner != $match_odds_result){
					$return_amount = set_result($conn,$bet_id,'Win');
				}else{
					$return_amount = set_result($conn,$bet_id,'Loss');
				}
				
				$total_profit_loss = $total_profit_loss + $return_amount;
				
			}
			
		}
	}
	$return_array = array(
							"status"=>"ok",
							"profit_loss"=>$total_profit_loss,
							"net_profit_loss"=>$net_profit_loss,
							);
			echo json_encode($return_array);
	function set_result($conn,$bet_id,$result_status){
		$return_amount = 0;
		$get_bet_details = $conn->query("select * from bet_details where bet_id=$bet_id and bet_status=1");
		$fetch_bet_details = mysqli_fetch_assoc($get_bet_details);
		$bet_user_id = $fetch_bet_details['user_id'];
		$event_name = $fetch_bet_details['event_name'];
		$market_name = $fetch_bet_details['market_name'];
		$market_type = $fetch_bet_details['market_type'];
		$bet_type = $fetch_bet_details['bet_type'];
		$bet_runs = $fetch_bet_details['bet_runs'];
		$bet_odds = $fetch_bet_details['bet_odds'];
		$bet_stack = $fetch_bet_details['bet_stack'];
		$bet_margin_used = $fetch_bet_details['bet_margin_used'];
		$bet_win_amount = $fetch_bet_details['bet_win_amount'];
		$transaction_time = date("Y-m-d H:i:s");
		$entry_transaction_time = date("d-m-Y H:i:s");
		$get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
		$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
		$user_Email_ID = $fetch_parent_ids['Email_ID'];
		$parentDL = $fetch_parent_ids['parentDL'];
		$parentMDL = $fetch_parent_ids['parentMDL'];
		$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
		$eventId = $fetch_bet_details['event_id'];
		$marketId = $fetch_bet_details['market_id'];

		if($result_status == 'Win'){
			$actual_win_amount = $bet_win_amount + $bet_margin_used;		
			$actual_win_amount2 = $bet_win_amount;
			$user_amount = $actual_win_amount2;
		
			$smdl_amount = -$actual_win_amount2;
			
		}else if($result_status == 'Loss'){
			$actual_loss_amount = $bet_margin_used;
			$user_amount = -$actual_loss_amount;
			$smdl_amount = $actual_loss_amount;
			
		}
		
		//adjust account 
		if($result_status == 'Win'){
			
			$return_amount = $return_amount + $smdl_amount;
			
			
		}else if($result_status == 'Loss'){
		
				$return_amount = $return_amount + $smdl_amount;
			
		}
		return $return_amount;
	}
	
?>