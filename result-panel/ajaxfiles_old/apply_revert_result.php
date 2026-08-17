<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	error_reporting(E_ALL);
	ini_set("display_errors",1);
	ini_set("display_startup_errors",1);
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	$bet_id = $_REQUEST['bet_id'];
	$update_bet_details  = $conn->query("update bet_details set bet_status=1,bet_result='0' where bet_id=$bet_id");
	$delete_bet_details  = $conn->query("delete from accounts where bet_id=$bet_id and game_type='0'");
	$delete_bet_details  = $conn->query("delete from accounts_temp where bet_id=$bet_id and game_type='0'");
	
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
	
	$get_all_user_commision = $conn->query("select bet_id,event_id,market_id,event_name,market_name,market_type,SUM(bet_result) as overal_result,user_id,Email_ID from bet_details as b left outer join user_login_master as u on u.UserID=b.user_id where b.event_id='$bet_event_id' and b.market_type='MATCH_ODDS' and u.parentMDL !=615 and u.parentDL!=65 and b.bet_status=0 and  user_id='$bet_user_id'");				
	$entry_transaction_time = date("Y-m-d H:i:s");
	while($fetch_get_all_user_commision = mysqli_fetch_assoc($get_all_user_commision)){				
		$commission_bet_id = $fetch_get_all_user_commision['bet_id'];			
		$commision_user_id = $fetch_get_all_user_commision['user_id'];			
		$commision_user_Email_ID = $fetch_get_all_user_commision['Email_ID'];		
		$commision_overal_result = $fetch_get_all_user_commision['overal_result'];			
		$commision_event_name = $fetch_get_all_user_commision['event_name'];			
		$comm_amount = ($commision_overal_result * 2) / 100;							
			if($comm_amount > 0){					
				
				$update_bet_status = $conn->query("update bet_details set bet_comm='$comm_amount' where bet_id=$commission_bet_id");					$account_description_commision = "#Commission Paid from $commision_user_Email_ID Event name - $commision_event_name at $entry_transaction_time";			
				if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $comm_amount != 0)){
					$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('1','$commision_user_id','$account_description_commision','$commission_bet_id','$comm_amount','Credit','10','$entry_transaction_time','1')");				
					$account_id1 =  $conn->insert_id;
				}
				if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $comm_amount != 0))){ 
					$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('1','$commision_user_id','$account_description_commision','$commission_bet_id','$comm_amount','Credit','10','$entry_transaction_time','1')");				
				}
				
				
				$comm_amount = $comm_amount * (-1);					
				
				if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $comm_amount != 0)){
					$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$commision_user_id','1','$account_description_commision','$commission_bet_id','$comm_amount','Debit','9','$entry_transaction_time','1')");		
					
					$account_id2 =  $conn->insert_id;
				}
				if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $comm_amount != 0))){ 
					$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$commision_user_id','1','$account_description_commision','$commission_bet_id','$comm_amount','Debit','9','$entry_transaction_time','1')");		
				
				}
				
				$both_account_id = $account_id1.",".$account_id2;
				$conn->query("insert into commission_master (account_id,user_id,bet_id,event_id,comm_amount,comm_datetime) values('$both_account_id','$commision_user_id','$commission_bet_id','$bet_event_id','$comm_amount','$entry_transaction_time')");
			}               						
	}
	
	
	
	
	$return_array = array(
					"status"=>'ok',
					"message"=>'Bet Result Revert.',
					);
	echo json_encode($return_array);
	exit();
?>