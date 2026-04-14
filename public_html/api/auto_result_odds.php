<?php

	header('Access-Control-Allow-Origin: *');
	include('../include/conn.php');
	include('../include/level_percentage.php');
	error_reporting(E_ALL);
	
	$eventType = $_GET['eventType'];
	$eventId = $_GET['eventId'];
	$selectionId = $_GET['selectionId'];
	$runnerName = $_GET['runnerName'];
	$status = $_GET['status'];
	$market_type = 'Match Odds';//$_GET['marketType'];
	$datetime = date("Y-m-d H:i:s");
	$market_type_search = "";
	$query = "SELECT * FROM `result_match_odds` WHERE `eventId` = $eventId && `selectionId` = $selectionId";
	$select = $conn->query($query);
	$count = mysqli_num_rows($select);
	if($count > 0){

		$query2 = "update `result_match_odds` set `status`=$status,datetime='$datetime' where `eventId` = $eventId && `selectionId` = $selectionId";
		$insert = $conn->query($query2);
		
		echo "Updated";
		exit();
	}
	else{
		
		$query2 = "INSERT INTO `result_match_odds` (`eventId`,`selectionId`,`runnerName`,`status`,`datetime`) VALUES ($eventId,$selectionId,'$runnerName',$status,'$datetime')";
		$insert = $conn->query($query2);
	
		if($eventType == 2 or $eventType == 1){
		
			if($status == 2){
	
				$bet_type = "Back";
				$bet_type_2 = "Lay";
				$result_status = 0; 
				$market_id = $selectionId;
				$event_id = $eventId;
		
				if($market_type == "Match Odds"){
					$market_type_search = "MATCH_ODDS";
				}else if($market_type == "Toss Odds"){
					$market_type_search = "TOSS_ODDS";
				}else if($market_type == "Tie Odds"){
					$market_type_search = "TIE_ODDS";
				}else if($market_type == "Other Odds"){
					$get_market_type = $conn->query("select * from bet_details where event_id='$event_id' and market_id='$market_id' and market_type NOT IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS','FANCY_ODDS')");
					$fetch_get_market_type = mysqli_fetch_assoc($get_market_type);
					 $market_type_search = $fetch_get_market_type['market_type'];
				}
		
				if($market_type_search == ""){
					echo "Invalid Market Type";
					exit();
				}
				$get_win_bet_details_1 = $conn->query("select * from bet_details where event_id=$event_id and market_id=$market_id and market_type='$market_type_search' and bet_type='$bet_type' and bet_status=1");
				while($fetch_get_win_bet_details_1 = mysqli_fetch_assoc($get_win_bet_details_1)){
					//won entry
					$bet_id = $fetch_get_win_bet_details_1['bet_id'];
					$bet_odds = $fetch_get_win_bet_details_1['bet_odds'];
					if($bet_odds < 1){
						$eventId = $fetch_get_win_bet_details_1['event_id'];
						$eventType = $fetch_get_win_bet_details_1['event_type'];
						$marketId = $fetch_get_win_bet_details_1['market_id'];
						$user_id = $fetch_get_win_bet_details_1['user_id'];
						$eventName = $fetch_get_win_bet_details_1['event_name'];
						$marketName = $fetch_get_win_bet_details_1['market_name'];
						$market_type = $fetch_get_win_bet_details_1['market_type'];
						$bet_type = $fetch_get_win_bet_details_1['bet_type'];
						$bet_runs = $fetch_get_win_bet_details_1['bet_runs'];
						$runs = $fetch_get_win_bet_details_1['bet_odds'];
						$stack = $fetch_get_win_bet_details_1['bet_stack'];
						$bet_result = $fetch_get_win_bet_details_1['bet_result'];
						$stk = $fetch_get_win_bet_details_1['bet_margin_used'];
						$bet_time = $fetch_get_win_bet_details_1['bet_time'];
						$bet_status = $fetch_get_win_bet_details_1['bet_status'];
						$bet_win_amount = $fetch_get_win_bet_details_1['bet_win_amount'];
				
						$insert_trade = $conn->query("insert into wrong_bet_details (`original_bet_id`,`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values($bet_id,'$eventId','$eventType','$marketId','$user_id','$eventName','$marketName','$market_type','$bet_type','$bet_runs','$runs','$stack','$bet_result','$stk','$bet_time','$bet_status','$bet_win_amount')");
						$delete_bet_details  = $conn->query("update bet_details set bet_status=2 where user_id=$user_id and bet_id=$bet_id");
					}else{
						set_result($conn,$bet_id,"Win");
				
					}
			
				}
		
		
				$get_loss_bet_details_1 = $conn->query("select * from bet_details where event_id=$event_id and market_id<>$market_id and market_type='$market_type_search' and bet_type='$bet_type'  and bet_status=1");
				while($fetch_get_loss_bet_details_1 = mysqli_fetch_assoc($get_loss_bet_details_1)){
					//loss entry
					$bet_id = $fetch_get_loss_bet_details_1['bet_id'];
					$bet_odds = $fetch_get_loss_bet_details_1['bet_odds'];
					if($bet_odds < 1){
						$eventId = $fetch_get_loss_bet_details_1['event_id'];
						$eventType = $fetch_get_loss_bet_details_1['event_type'];
						$marketId = $fetch_get_loss_bet_details_1['market_id'];
						$user_id = $fetch_get_loss_bet_details_1['user_id'];
						$eventName = $fetch_get_loss_bet_details_1['event_name'];
						$marketName = $fetch_get_loss_bet_details_1['market_name'];
						$market_type = $fetch_get_loss_bet_details_1['market_type'];
						$bet_type = $fetch_get_loss_bet_details_1['bet_type'];
						$bet_runs = $fetch_get_loss_bet_details_1['bet_runs'];
						$runs = $fetch_get_loss_bet_details_1['bet_odds'];
						$stack = $fetch_get_loss_bet_details_1['bet_stack'];
						$bet_result = $fetch_get_loss_bet_details_1['bet_result'];
						$stk = $fetch_get_loss_bet_details_1['bet_margin_used'];
						$bet_time = $fetch_get_loss_bet_details_1['bet_time'];
						$bet_status = $fetch_get_loss_bet_details_1['bet_status'];
						$bet_win_amount = $fetch_get_loss_bet_details_1['bet_win_amount'];
				
						$insert_trade = $conn->query("insert into wrong_bet_details (`original_bet_id`,`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values($bet_id,'$eventId','$eventType','$marketId','$user_id','$eventName','$marketName','$market_type','$bet_type','$bet_runs','$runs','$stack','$bet_result','$stk','$bet_time','$bet_status','$bet_win_amount')");
						$delete_bet_details  = $conn->query("update bet_details set bet_status=2 where user_id=$user_id and bet_id=$bet_id");
					}else{
						set_result($conn,$bet_id,"Loss");
				
					}
				}
		
		
				$get_win_bet_details_2 = $conn->query("select * from bet_details where event_id=$event_id and market_id<>$market_id and market_type='$market_type_search' and bet_type='$bet_type_2'  and bet_status=1");
				while($fetch_get_win_bet_details_2 = mysqli_fetch_assoc($get_win_bet_details_2)){
					//won entry
					$bet_id = $fetch_get_win_bet_details_2['bet_id'];
					$bet_odds = $fetch_get_win_bet_details_2['bet_odds'];
					if($bet_odds < 1){
						$eventId = $fetch_get_win_bet_details_2['event_id'];
						$eventType = $fetch_get_win_bet_details_2['event_type'];
						$marketId = $fetch_get_win_bet_details_2['market_id'];
						$user_id = $fetch_get_win_bet_details_2['user_id'];
						$eventName = $fetch_get_win_bet_details_2['event_name'];
						$marketName = $fetch_get_win_bet_details_2['market_name'];
						$market_type = $fetch_get_win_bet_details_2['market_type'];
						$bet_type = $fetch_get_win_bet_details_2['bet_type'];
						$bet_runs = $fetch_get_win_bet_details_2['bet_runs'];
						$runs = $fetch_get_win_bet_details_2['bet_odds'];
						$stack = $fetch_get_win_bet_details_2['bet_stack'];
						$bet_result = $fetch_get_win_bet_details_2['bet_result'];
						$stk = $fetch_get_win_bet_details_2['bet_margin_used'];
						$bet_time = $fetch_get_win_bet_details_2['bet_time'];
						$bet_status = $fetch_get_win_bet_details_2['bet_status'];
						$bet_win_amount = $fetch_get_win_bet_details_2['bet_win_amount'];
				
						$insert_trade = $conn->query("insert into wrong_bet_details (`original_bet_id`,`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values($bet_id,'$eventId','$eventType','$marketId','$user_id','$eventName','$marketName','$market_type','$bet_type','$bet_runs','$runs','$stack','$bet_result','$stk','$bet_time','$bet_status','$bet_win_amount')");
						$delete_bet_details  = $conn->query("update bet_details set bet_status=2 where user_id=$user_id and bet_id=$bet_id");
					}else{
						set_result($conn,$bet_id,"Win");
				
					}
				}
		
				$get_loss_bet_details_2 = $conn->query("select * from bet_details where event_id=$event_id and market_id=$market_id and market_type='$market_type_search' and bet_type='$bet_type_2'  and bet_status=1");
				while($fetch_get_loss_bet_details_2 = mysqli_fetch_assoc($get_loss_bet_details_2)){
					//loss entry
					$bet_id = $fetch_get_loss_bet_details_2['bet_id'];
					$bet_odds = $fetch_get_loss_bet_details_2['bet_odds'];
					if($bet_odds < 1){
						$eventId = $fetch_get_loss_bet_details_2['event_id'];
						$eventType = $fetch_get_loss_bet_details_2['event_type'];
						$marketId = $fetch_get_loss_bet_details_2['market_id'];
						$user_id = $fetch_get_loss_bet_details_2['user_id'];
						$eventName = $fetch_get_loss_bet_details_2['event_name'];
						$marketName = $fetch_get_loss_bet_details_2['market_name'];
						$market_type = $fetch_get_loss_bet_details_2['market_type'];
						$bet_type = $fetch_get_loss_bet_details_2['bet_type'];
						$bet_runs = $fetch_get_loss_bet_details_2['bet_runs'];
						$runs = $fetch_get_loss_bet_details_2['bet_odds'];
						$stack = $fetch_get_loss_bet_details_2['bet_stack'];
						$bet_result = $fetch_get_loss_bet_details_2['bet_result'];
						$stk = $fetch_get_loss_bet_details_2['bet_margin_used'];
						$bet_time = $fetch_get_loss_bet_details_2['bet_time'];
						$bet_status = $fetch_get_loss_bet_details_2['bet_status'];
						$bet_win_amount = $fetch_get_loss_bet_details_2['bet_win_amount'];
				
						$insert_trade = $conn->query("insert into wrong_bet_details (`original_bet_id`,`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values($bet_id,'$eventId','$eventType','$marketId','$user_id','$eventName','$marketName','$market_type','$bet_type','$bet_runs','$runs','$stack','$bet_result','$stk','$bet_time','$bet_status','$bet_win_amount')");
						$delete_bet_details  = $conn->query("update bet_details set bet_status=2 where user_id=$user_id and bet_id=$bet_id");
					}else{
				
						set_result($conn,$bet_id,"Loss");
				
					}
				}
			}
			else if($status == 3){
	
				$bet_type = "Back";
				$bet_type_2 = "Lay";
				$result_status = 0; 
				$market_id = $selectionId;
				$event_id = $eventId;
		
				if($market_type == "Match Odds"){
					$market_type_search = "MATCH_ODDS";
				}else if($market_type == "Toss Odds"){
					$market_type_search = "TOSS_ODDS";
				}else if($market_type == "Tie Odds"){
					$market_type_search = "TIE_ODDS";
				}else if($market_type == "Other Odds"){
					$get_market_type = $conn->query("select * from bet_details where event_id='$event_id' and market_id='$market_id' and market_type NOT IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS','FANCY_ODDS')");
					$fetch_get_market_type = mysqli_fetch_assoc($get_market_type);
					 $market_type_search = $fetch_get_market_type['market_type'];
				}
		
				if($market_type_search == ""){
					echo "Invalid Market Type";
					exit();
				}
		
				$get_loss_bet_details_1 = $conn->query("select * from bet_details where event_id=$event_id and market_id=$market_id and market_type='$market_type_search' and bet_type='$bet_type'  and bet_status=1");
				while($fetch_get_loss_bet_details_1 = mysqli_fetch_assoc($get_loss_bet_details_1)){
					//loss entry
					$bet_id = $fetch_get_loss_bet_details_1['bet_id'];
					$bet_odds = $fetch_get_loss_bet_details_1['bet_odds'];
					if($bet_odds < 1){
						$eventId = $fetch_get_loss_bet_details_1['event_id'];
						$eventType = $fetch_get_loss_bet_details_1['event_type'];
						$marketId = $fetch_get_loss_bet_details_1['market_id'];
						$user_id = $fetch_get_loss_bet_details_1['user_id'];
						$eventName = $fetch_get_loss_bet_details_1['event_name'];
						$marketName = $fetch_get_loss_bet_details_1['market_name'];
						$market_type = $fetch_get_loss_bet_details_1['market_type'];
						$bet_type = $fetch_get_loss_bet_details_1['bet_type'];
						$bet_runs = $fetch_get_loss_bet_details_1['bet_runs'];
						$runs = $fetch_get_loss_bet_details_1['bet_odds'];
						$stack = $fetch_get_loss_bet_details_1['bet_stack'];
						$bet_result = $fetch_get_loss_bet_details_1['bet_result'];
						$stk = $fetch_get_loss_bet_details_1['bet_margin_used'];
						$bet_time = $fetch_get_loss_bet_details_1['bet_time'];
						$bet_status = $fetch_get_loss_bet_details_1['bet_status'];
						$bet_win_amount = $fetch_get_loss_bet_details_1['bet_win_amount'];
				
						$insert_trade = $conn->query("insert into wrong_bet_details (`original_bet_id`,`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values($bet_id,'$eventId','$eventType','$marketId','$user_id','$eventName','$marketName','$market_type','$bet_type','$bet_runs','$runs','$stack','$bet_result','$stk','$bet_time','$bet_status','$bet_win_amount')");
						$delete_bet_details  = $conn->query("update bet_details set bet_status=2 where user_id=$user_id and bet_id=$bet_id");
					}else{
						set_result($conn,$bet_id,"Loss");
				
					}
				}
		
				$get_loss_bet_details_2 = $conn->query("select * from bet_details where event_id=$event_id and market_id=$market_id and market_type='$market_type_search' and bet_type='$bet_type_2' and bet_status=1");
				while($fetch_get_loss_bet_details_2 = mysqli_fetch_assoc($get_loss_bet_details_2)){
					//win entry
					$bet_id = $fetch_get_loss_bet_details_2['bet_id'];
					$bet_odds = $fetch_get_loss_bet_details_2['bet_odds'];
					if($bet_odds < 1){
						$eventId = $fetch_get_loss_bet_details_2['event_id'];
						$eventType = $fetch_get_loss_bet_details_2['event_type'];
						$marketId = $fetch_get_loss_bet_details_2['market_id'];
						$user_id = $fetch_get_loss_bet_details_2['user_id'];
						$eventName = $fetch_get_loss_bet_details_2['event_name'];
						$marketName = $fetch_get_loss_bet_details_2['market_name'];
						$market_type = $fetch_get_loss_bet_details_2['market_type'];
						$bet_type = $fetch_get_loss_bet_details_2['bet_type'];
						$bet_runs = $fetch_get_loss_bet_details_2['bet_runs'];
						$runs = $fetch_get_loss_bet_details_2['bet_odds'];
						$stack = $fetch_get_loss_bet_details_2['bet_stack'];
						$bet_result = $fetch_get_loss_bet_details_2['bet_result'];
						$stk = $fetch_get_loss_bet_details_2['bet_margin_used'];
						$bet_time = $fetch_get_loss_bet_details_2['bet_time'];
						$bet_status = $fetch_get_loss_bet_details_2['bet_status'];
						$bet_win_amount = $fetch_get_loss_bet_details_2['bet_win_amount'];
				
						$insert_trade = $conn->query("insert into wrong_bet_details (`original_bet_id`,`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values($bet_id,'$eventId','$eventType','$marketId','$user_id','$eventName','$marketName','$market_type','$bet_type','$bet_runs','$runs','$stack','$bet_result','$stk','$bet_time','$bet_status','$bet_win_amount')");
						$delete_bet_details  = $conn->query("update bet_details set bet_status=2 where user_id=$user_id and bet_id=$bet_id");
					}else{
				
						set_result($conn,$bet_id,"Win");
				
					}
				}
			}
		
			$event_id = $eventId;
			$get_all_user_commision = $conn->query("select bet_id,event_id,market_id,event_name,market_name,market_type,SUM(bet_result) as overal_result,user_id,Email_ID from bet_details as b left outer join user_login_master as u on u.UserID=b.user_id where b.event_id='$event_id' and b.market_type='MATCH_ODDS' and b.bet_status=0 GROUP BY user_id");				
			$entry_transaction_time = date("Y-m-d H:i:s");
			$entry_transaction_time = date("Y-m-d H:i:s",(strtotime($entry_transaction_time) +2));
			while($fetch_get_all_user_commision = mysqli_fetch_assoc($get_all_user_commision)){				
				$commission_bet_id = $fetch_get_all_user_commision['bet_id'];			
				$commision_user_id = $fetch_get_all_user_commision['user_id'];			
				$commision_user_Email_ID = $fetch_get_all_user_commision['Email_ID'];		
				$commision_overal_result = $fetch_get_all_user_commision['overal_result'];	
				
				if(floatVal($commision_overal_result) > 0){
					$event_name = $fetch_get_all_user_commision['event_name'];			
					$market_name = $fetch_get_all_user_commision['market_name'];			
					$comm_amount = ($commision_overal_result * 1) / 100;		
					
					
					
		$check_already_comm_add = $conn->query("select * from accounts where event_id='$event_id' and user_id='$commision_user_id'");
		$check_already_comm_count = mysqli_num_rows($check_already_comm_add);
		
		if($check_already_comm_count != null){
			
			
			$get_account_id = $conn->query("select * from commission_master where user_id=$commision_user_id and event_id='$event_id'");
			$fetch_event_id = mysqli_fetch_assoc($get_account_id);
			$comm_id = $fetch_event_id['comm_id'];
			$both_account_id = $fetch_event_id['account_id'];
			
			$conn->query("delete from commission_master where comm_id='$comm_id'");
			
			$bet_id_new = $fetch_event_id['bet_id'];
			if($bet_id_new > 0){
				$conn->query("delete from accounts where bet_id = $bet_id_new and game_type=0 and entry_type IN(9,10)");
				$conn->query("delete from accounts_temp where bet_id = $bet_id_new and game_type=0 and entry_type IN(9,10)");
			}
		}
        
		if (true) {
						if ($comm_amount > 0) {

				$transaction_id = 'sports_comm-'.$commission_bet_id.'-1';
                $update_bet_status = $conn->query("update bet_details set bet_comm='$comm_amount' where bet_id=$commission_bet_id");
                $account_description_commision = "#Commission Paid from $commision_user_Email_ID Event name - $commision_event_name at $entry_transaction_time";


                
                $level_pers = get_level_per($conn, $commision_user_id);
				
				foreach ($level_pers as $cradit_user_id => $level_per) {

					$cradit_amt = ($comm_amount / 100) * $level_per;
					if($cradit_amt > 0){
						$transaction_id = 'sports_comm-'.$commission_bet_id.'-'.$cradit_user_id;
						if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0)){
							$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('".$cradit_user_id."','$commision_user_id','$account_description_commision','$commission_bet_id','$event_id','$cradit_amt','Credit','10','$entry_transaction_time','1','$transaction_id')");
						}
						
						if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0))){
							$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('".$cradit_user_id."','$commision_user_id','$account_description_commision','$commission_bet_id','$event_id','$cradit_amt','Credit','10','$entry_transaction_time','1','$transaction_id')");
							
						}
                	}
				}
				$account_id1 = 0;

                $comm_amount = $comm_amount * (-1);

				$transaction_id = 'sports_comm-'.$commission_bet_id.'-'.$commision_user_id;
				
				if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $comm_amount != 0)){
					$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$commision_user_id',0,'$account_description_commision','$commission_bet_id','$comm_amount','Debit','9','$entry_transaction_time','1','$transaction_id')");
				
					$account_id2 = $conn->insert_id;
				
				}
				
				if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $comm_amount != 0))){
					$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$commision_user_id',0,'$account_description_commision','$commission_bet_id','$comm_amount','Debit','9','$entry_transaction_time','1','$transaction_id')");
				}

                $both_account_id = $account_id1 . "," . $account_id2;
                $conn->query("insert into commission_master (account_id,user_id,bet_id,event_id,comm_amount,comm_datetime) values('$both_account_id','$commision_user_id','$commission_bet_id','$event_id','$comm_amount','$entry_transaction_time')");
            }               						
					}
				
				}       						
			}
		
			//delete unmtach bet_details
		
			$conn->query("delete from unmatched_bet_details where event_id=$eventId");
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$eventId' and market_type='$market_type'");
		}
		echo "insert";
	}
	
	function set_result($conn,$bet_id,$result_status){

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
			
		}else{
			
			$delete_bet_details  = $conn->query("update bet_details set bet_status=2 where user_id=$bet_user_id and bet_id=$bet_id");
			if($bet_id > 0){
				$delete_bet_details  = $conn->query("delete from accounts where user_id=$bet_user_id and bet_id=$bet_id");
				$delete_bet_details  = $conn->query("delete from accounts_temp where user_id=$bet_user_id and bet_id=$bet_id");
			}
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$eventId' and user_id=$bet_user_id and market_type='$market_type'");
			$return_array = array(
							"status"=>'ok',
							"message"=>'Bet Cancelled',
							);
			echo json_encode($return_array);
			exit();
		}
		
		$update_bet_status = $conn->query("update bet_details set bet_status=0,bet_result='$user_amount' where bet_id=$bet_id and bet_status=1");
		$delete_exposure = $conn->query("delete from exposure_details where event_id='$eventId' and user_id=$bet_user_id and market_type='$market_type'");
		
		//adjust account 
		if($result_status == 'Win'){
			
			$account_description = "#Win BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
			$get_already_exist_details = $conn->query("select * from accounts where bet_id=$bet_id and account_description='$account_description'");
			$rows_get_already_exist_details = mysqli_num_rows($get_already_exist_details);
			
			if($rows_get_already_exist_details <= 0){
				
				$transaction_id = 'sports-'.$bet_id.'-'.$bet_user_id;
				$account_description = "#Win BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
				if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0)){
					$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$actual_win_amount2','Credit','4','$transaction_time','1','$transaction_id')");
				}
				
				if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0))){ 
						$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$actual_win_amount2','Credit','4','$transaction_time','1','$transaction_id')");
				}
					
				$level_pers = get_level_per($conn, $bet_user_id);
				foreach ($level_pers as $debit_user_id => $level_per) {

					$debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
					$transaction_id = 'sports-'.$bet_id.'-'.$debit_user_id;

					$account_descriptionSMDL = "#Loss BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
					if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0)){
						$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$debit_amt','Debit','7','$transaction_time','1','$transaction_id')");
					}
					
					if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0))){ 
						$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$debit_amt','Debit','7','$transaction_time','1','$transaction_id')");
					}
				}
			}
			
		}else if($result_status == 'Loss'){
			$account_description = "#Loss BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
			$get_already_exist_details = $conn->query("select * from accounts where bet_id=$bet_id and account_description='$account_description'");
			$rows_get_already_exist_details = mysqli_num_rows($get_already_exist_details);
			
			if($rows_get_already_exist_details <= 0){
				$transaction_id = 'sports-'.$bet_id.'-'.$bet_user_id;
				$account_description = "#Loss BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
				if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0)){
					$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$user_amount','Debit','7','$transaction_time','1','$transaction_id')");
				}
				
				if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0))){ 
						$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$user_amount','Debit','7','$transaction_time','1','$transaction_id')");
					}
					
				$level_pers = get_level_per($conn, $bet_user_id);
				foreach ($level_pers as $cradit_user_id => $level_per) {

					$cradit_amt = ($bet_margin_used / 100) * $level_per;
					$transaction_id = 'sports-'.$bet_id.'-'.$cradit_user_id;

					$account_descriptionSMDL = "#Win BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
					if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0)){
						$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$cradit_amt','Credit','4','$transaction_time','1','$transaction_id')");
					}
					
					if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0))){ 
						 $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$cradit_amt','Credit','4','$transaction_time','1','$transaction_id')");
					}
				}
			}
			
		}
		return true;
	}