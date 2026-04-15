<?php

	include "../../include/conn.php";
	include "../../include/flip_function2.php";
	include('../../include/level_percentage.php');
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$bet_id = $_REQUEST['bet_id'];

	$otp = $_REQUEST['otp'];

	$fetch_otp_query=$conn->query("select * from bet_delete_otp where bet_id='$bet_id' and bet_type='casino_bet' order by id desc limit 1");
	if(mysqli_num_rows($fetch_otp_query) <= 0){
		$return_array = array(
			"status"=>'error',
			"message"=>'Something is Wrong in OTP plz try again later',
			);
			echo json_encode($return_array);
			exit();
	}
	$fetch_otp_data=mysqli_fetch_assoc($fetch_otp_query);
	$db_otp=$fetch_otp_data['otp'];
	$db_datetime=$fetch_otp_data['datetime'];
	$todat_date=date("Y-m-d H:i:s");
	$d1 = strtotime($db_datetime);
	$d2 = strtotime($todat_date);
	$totalSecondsDiff = $d2-$d1; 
	$tot_min=$totalSecondsDiff/60;
	if($tot_min > 3){
		$return_array = array(
			"status"=>'error',
			"message"=>'OTP is expired',
			);
			echo json_encode($return_array);
			exit();
	}
	if($db_otp != $otp){
		$return_array = array(
			"status"=>'error',
			"message"=>'OTP is invalid',);
			echo json_encode($return_array);
			exit();
	}
	

	/* exit(); */

	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}

	$result_status = $_REQUEST['result_status'];
	
	$get_market_id = $conn->query("select * from bet_teen_details where bet_id=$bet_id");
	$fetch_get_market_id = mysqli_fetch_assoc($get_market_id);
	$mid = $fetch_get_market_id['event_id'];
	$event_type2 = $fetch_get_market_id['event_name'];
	
	if($result_status == "Win"){
		$get_all_winner_bet = $conn->query("select * from bet_teen_details where bet_id=$bet_id and bet_status=1");
		foreach($get_all_winner_bet as $winner_bet_data){
			$bet_id = $winner_bet_data['bet_id'];
			$bet_user_id = $winner_bet_data['user_id'];
			$bet_market_id = $winner_bet_data['market_id'];
			$bet_market_name = $winner_bet_data['market_name'];
			$bet_amount = $winner_bet_data['bet_margin_used'];
			$bet_winning_amount = $winner_bet_data['bet_win_amount'];
			$actual_win_amount2 = $bet_winning_amount;
			$get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
			$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
			$parentDL = $fetch_parent_ids['parentDL'];
			$parentMDL = $fetch_parent_ids['parentMDL'];
			$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
			 
			$user_amount = $actual_win_amount2;
			$smdl_amount = -$actual_win_amount2;
			
			$bet_result = $user_amount - $bet_amount;
			
			$transaction_id = 'casino-'.$bet_id.'-'.$bet_user_id;
			
			$update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$user_amount',bet_win_amount='$user_amount' where bet_id='$bet_id' and bet_status=1");
			$account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $result_time";
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`,`game_type`) VALUES('$bet_user_id','$parentSuperMDL','$account_description','$bet_id','$actual_win_amount2','Credit','4','$result_time','1','$transaction_id',1)");
			if(INSERT_ACCOUNTS_TEMP){ 
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`,`game_type`) VALUES('$bet_user_id','$parentSuperMDL','$account_description','$bet_id','$actual_win_amount2','Credit','4','$result_time','1','$transaction_id',1)");
			}
			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $debit_user_id => $level_per) {

				$debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
				$transaction_id = 'casino-'.$bet_id.'-'.$debit_user_id;

				$account_descriptionSMDL = "#Loss $event_type BET ID $bet_id GAME ID $mid at $result_time";
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`,`game_type`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$debit_amt','Debit','7','$result_time','1','$transaction_id',1)");
				if(INSERT_ACCOUNTS_TEMP){ 
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`,`game_type`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$debit_amt','Debit','7','$result_time','1','$transaction_id',1)");
				}
			}
			
			
		}
	}
	else if($result_status == "Loss"){
		$get_all_loss_data = $conn->query("select * from bet_teen_details where bet_id=$bet_id and bet_status=1");

		foreach($get_all_loss_data as $get_get_all_loss_data){
					$bet_id = $get_get_all_loss_data['bet_id'];
					$bet_user_id = $get_get_all_loss_data['user_id'];
					$bet_market_id = $get_get_all_loss_data['market_id'];
					$bet_market_name = $get_get_all_loss_data['market_name'];
					$bet_amount = $get_get_all_loss_data['bet_margin_used'];
					$bet_winning_amount = $get_get_all_loss_data['bet_win_amount'];
					$bet_margin_used = $get_get_all_loss_data['bet_margin_used'];
					$actual_win_amount2 = $bet_margin_used;
					$get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
					$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
					$parentDL = $fetch_parent_ids['parentDL'];
					$parentMDL = $fetch_parent_ids['parentMDL'];
					$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
					
					$user_amount = -$actual_win_amount2;
					$smdl_amount = $actual_win_amount2;
					
					$bet_result = $user_amount - $bet_amount;
					$transaction_id = 'casino-'.$bet_id.'-'.$bet_user_id;
					$update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$user_amount',bet_win_amount='$user_amount' where bet_id='$bet_id' and bet_status=1");
					$account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $result_time";
					$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`,`game_type`) VALUES('$bet_user_id','$parentSuperMDL','$account_description','$bet_id','$user_amount','Debit','7','$result_time','1','$transaction_id',1)");
					if(INSERT_ACCOUNTS_TEMP){ 
					$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`,`game_type`) VALUES('$bet_user_id','$parentSuperMDL','$account_description','$bet_id','$user_amount','Debit','7','$result_time','1','$transaction_id',1)");
					}

					$account_descriptionSMDL = "#Win $event_type BET ID $bet_id GAME ID $mid at $result_time";
					$level_pers = get_level_per($conn, $bet_user_id);
					foreach ($level_pers as $cradit_user_id => $level_per) {

						$cradit_amt = ($bet_margin_used / 100) * $level_per;
						$transaction_id = 'casino-'.$bet_id.'-'.$cradit_user_id;

						$account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $result_time";
						$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`,`game_type`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$cradit_amt','Credit','4','$result_time','1','$transaction_id',1)"); 
						if(INSERT_ACCOUNTS_TEMP){ 
						$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`,`game_type`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$cradit_amt','Credit','4','$result_time','1','$transaction_id',1)");
						}
					}
				}
	}
	else if($result_status == "Cancel"){
		$update_bet = $conn->query("update bet_teen_details set bet_status=2,bet_result='0',bet_win_amount='0',cancelled_by='1' where bet_id='$bet_id' and bet_status=1");
		if($bet_id > 0){
			$conn->query("delete from accounts where bet_id='$bet_id' and game_type=1");
			$conn->query("delete from accounts_temp where bet_id='$bet_id' and game_type=1");
        }
	}
	else  if($result_status == "Delete"){
		/* $return_array = array(
						"status"=>'ok',
						"message"=>'Invalid Request!',
						);
	echo json_encode($return_array);
	exit(); */
		
		$get_delete_bet_details = $conn->query("select * from bet_teen_details where bet_id=$bet_id");
		$fetch_get_delete_bet_details = mysqli_fetch_assoc($get_delete_bet_details);
		
		$deleted_time = date("Y-m-d H:i:s");
		
		$deleted_ip_address = '';
		if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
			$deleted_ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		else{
			$deleted_ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		}
		$insert_array = array(
								"bet_id"=>$fetch_get_delete_bet_details['bet_id'],
								"event_type"=>$fetch_get_delete_bet_details['event_type'],
								"event_id"=>$fetch_get_delete_bet_details['event_id'],
								"oddsmarketId"=>$fetch_get_delete_bet_details['oddsmarketId'],
								"market_id"=>$fetch_get_delete_bet_details['market_id'],
								"user_id"=>$fetch_get_delete_bet_details['user_id'],
								"event_name"=>$fetch_get_delete_bet_details['event_name'],
								"market_name"=>$fetch_get_delete_bet_details['market_name'],
								"market_type"=>$fetch_get_delete_bet_details['market_type'],
								"bet_type"=>$fetch_get_delete_bet_details['bet_type'],
								"bet_runs"=>$fetch_get_delete_bet_details['bet_runs'],
								"bet_odds"=>$fetch_get_delete_bet_details['bet_odds'],
								"bet_stack"=>$fetch_get_delete_bet_details['bet_stack'],
								"bet_result"=>$fetch_get_delete_bet_details['bet_result'],
								"bet_margin_used"=>$fetch_get_delete_bet_details['bet_margin_used'],
								"bet_win_amount"=>$fetch_get_delete_bet_details['bet_win_amount'],
								"bet_time"=>$fetch_get_delete_bet_details['bet_time'],
								"bet_status"=>$fetch_get_delete_bet_details['bet_status'],
								"cancelled_by"=>1,
								"bet_ip_address"=>$fetch_get_delete_bet_details['bet_ip_address'],
								"bet_user_agent"=>$fetch_get_delete_bet_details['bet_user_agent'],
								"bet_final_result"=>$fetch_get_delete_bet_details['bet_final_result'],
								"deleted_time"=>$deleted_time,
								"deleted_ip_address"=>$deleted_ip_address,
								);
		
		$columns = implode(',',array_keys($insert_array));
		
		$values  = implode("','",array_values($insert_array));
		
		$sql = "INSERT INTO bet_teen_details_deleted ($columns) VALUES ('$values')";
		$conn->query($sql);
		
		$conn->query("DROP TRIGGER bet_teen_details_delete1_trigger");
		$update_bet = $conn->query("delete from bet_teen_details where bet_id='$bet_id' ");
		$conn->query('

		CREATE TRIGGER `bet_teen_details_delete1_trigger` BEFORE DELETE ON `bet_teen_details` FOR EACH ROW 

		BEGIN
			 signal sqlstate "45000" set message_text = "Invalid delete action.";
		END
		');
		if($bet_id > 0){
			$conn->query("delete from accounts where bet_id='$bet_id' and game_type=1");
			$conn->query("delete from accounts_temp where bet_id='$bet_id' and game_type=1");
		}
	}
	 
	
	
        $conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type2'");
	$return_array = array(
						"status"=>'ok',
						"message"=>'Done!',
						);
	echo json_encode($return_array);
	exit();
?>