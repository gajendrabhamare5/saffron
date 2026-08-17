<?php



	include "../../include/conn.php";
	include "../../include/flip_function2.php";
	include('../../include/level_percentage.php');
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$bet_id = $_REQUEST['bet_id'];
	$otp = $_REQUEST['otp'];

	$fetch_otp_query=$conn->query("select * from bet_delete_otp where bet_id='$bet_id' and bet_type='bet' order by id desc limit 1");
	if(mysqli_num_rows($fetch_otp_query) <= 0){
		$return_array = array(
			"status"=>'error',
			"message"=>'OTP is invalid',
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
	
	
	$get_bet_details = $conn->query("select * from bet_details where bet_id=$bet_id and bet_status IN (1,0)");
	$fetch_bet_details = mysqli_fetch_assoc($get_bet_details);
	$bet_user_id = $fetch_bet_details['user_id'];
	$event_id = $fetch_bet_details['event_id'];
	$market_id = $fetch_bet_details['market_id'];
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
	$parentDL = $fetch_parent_ids['parentDL'];
	$parentMDL = $fetch_parent_ids['parentMDL'];
	$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
	
	$get_DL_comm = $conn->query("select * from user_master where Id=$parentDL");
	$fetch_DL_comm = mysqli_fetch_assoc($get_DL_comm);
	$dl_commission = $fetch_DL_comm['my_percentage'];
	
	$get_MDL_comm = $conn->query("select * from user_master where Id=$parentMDL");
	$fetch_MDL_comm = mysqli_fetch_assoc($get_MDL_comm);
	$mdl_commission = $fetch_MDL_comm['my_percentage'];
	
	$smdl_commission = 100 - $mdl_commission - $dl_commission;
	
	
	
	if($result_status == 'Win'){
		$actual_win_amount = $bet_win_amount + $bet_margin_used;		
		$actual_win_amount2 = $bet_win_amount;
		$user_amount = $actual_win_amount2;
	/* 	$dl_amount = -($actual_win_amount2 * $dl_commission) / 100;
		$mdl_amount = -($actual_win_amount2 * $mdl_commission) / 100;
		$smdl_amount = -($actual_win_amount2 * $smdl_commission) / 100; */
		$smdl_amount = -$actual_loss_amount;
		
	}
	else if($result_status == 'Loss'){
		$actual_loss_amount = $bet_margin_used;
		$user_amount = -$actual_loss_amount;
		/* $dl_amount = ($actual_loss_amount * $dl_commission) / 100;
		$mdl_amount = ($actual_loss_amount * $mdl_commission) / 100;
		$smdl_amount = ($actual_loss_amount * $smdl_commission) / 100; */
		$smdl_amount = $actual_loss_amount;
		
		
	}
	else if($result_status == "Cancel"){
		$delete_bet_details  = $conn->query("update bet_details set bet_status='2' where user_id=$bet_user_id and bet_id=$bet_id");
		if($bet_id > 0){
			$delete_bet_details  = $conn->query("delete from accounts where user_id=$bet_user_id and bet_id=$bet_id");
			$delete_bet_details  = $conn->query("delete from accounts_temp where user_id=$bet_user_id and bet_id=$bet_id");
		}
		
			
	if($market_type == "FANCY_ODDS"){
		$exposure_data = get_current_bet_fancy_exposure2($conn,$bet_user_id,$event_id,$market_id);
		$exposure_data = min($exposure_data);
		
		if($exposure_data == 0){
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and market_id='$market_id' and user_id=$bet_user_id and market_type='$market_type'");
		}else{
			$conn->query("update exposure_details set exposure_amount='$exposure_data' where user_id=$bet_user_id and event_id='$event_id' and market_id='$market_id' and market_type='$market_type'");
		}
		
	
	}else{
		$bet_type_exposure ="";
		$stack ="";
		$runs ="";
		
		$exposure_data = get_net_exposure_match_oods($conn,$bet_user_id,$event_id,$market_type,$bet_type_exposure,$stack,$runs);
		
		if($exposure_data == 0){
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and user_id=$bet_user_id and market_type='$market_type'");
		}else{
			$conn->query("update exposure_details set exposure_amount='$exposure_data' where event_id='$event_id' and user_id=$bet_user_id and market_type='$market_type'");
		}
	}
	
		$return_array = array(
						"status"=>'ok',
						"message"=>'Bet Cancelled',
						);
		echo json_encode($return_array);
		exit();
	}
	
	else  if($result_status == "Delete"){
		
		/* $return_array = array(
						"status"=>'ok',
						"message"=>'Invalid Request!',
						);
	echo json_encode($return_array);
	exit(); */
		
		
		$get_delete_bet_details = $conn->query("select * from bet_details where bet_id=$bet_id");
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
								"meter_market_id"=>$fetch_get_delete_bet_details['meter_market_id'],
								"user_id"=>$fetch_get_delete_bet_details['user_id'],
								"event_name"=>$fetch_get_delete_bet_details['event_name'],
								"market_name"=>$fetch_get_delete_bet_details['market_name'],
								"market_type"=>$fetch_get_delete_bet_details['market_type'],
								"bet_type"=>$fetch_get_delete_bet_details['bet_type'],
								"bet_runs"=>$fetch_get_delete_bet_details['bet_runs'],
								"bet_runs2"=>$fetch_get_delete_bet_details['bet_runs2'],
								"bet_odds"=>$fetch_get_delete_bet_details['bet_odds'],
								"bet_stack"=>$fetch_get_delete_bet_details['bet_stack'],
								"bet_comm"=>$fetch_get_delete_bet_details['bet_comm'],
								"bet_result"=>$fetch_get_delete_bet_details['bet_result'],
								"bet_margin_used"=>$fetch_get_delete_bet_details['bet_margin_used'],
								"bet_win_amount"=>$fetch_get_delete_bet_details['bet_win_amount'],
								"bet_time"=>$fetch_get_delete_bet_details['bet_time'],
								"bet_status"=>$fetch_get_delete_bet_details['bet_status'],
								"bet_ip_address"=>$fetch_get_delete_bet_details['bet_ip_address'],
								"bet_user_agent"=>$fetch_get_delete_bet_details['bet_user_agent'],
								"bet_final_result"=>$fetch_get_delete_bet_details['bet_final_result'],
								"runner_id"=>$fetch_get_delete_bet_details['runner_id'],
								"runner_name1"=>$fetch_get_delete_bet_details['runner_name1'],
								"deleted_time"=>$deleted_time,
								"deleted_ip_address"=>$deleted_ip_address,
								);
		
		$columns = implode(',',array_keys($insert_array));
		
		$values  = implode("','",array_values($insert_array));
		
		$sql = "INSERT INTO bet_details_deleted ($columns) VALUES ('$values')";
		$conn->query($sql);
		
		$conn->query("DROP TRIGGER bet_details_delete1_trigger");
		$delete_bet_details  = $conn->query("delete from bet_details where user_id=$bet_user_id and bet_id=$bet_id");
		
		$conn->query('

CREATE TRIGGER `bet_details_delete1_trigger` BEFORE DELETE ON `bet_details` FOR EACH ROW 

BEGIN
     signal sqlstate "45000" set message_text = "Invalid delete action.";
END
');

if($bet_id > 0){
		$delete_bet_details  = $conn->query("delete from accounts where bet_id=$bet_id and game_type=0");
		$delete_bet_details  = $conn->query("delete from accounts_temp where bet_id=$bet_id and game_type=0");
}
		
	if($market_type == "FANCY_ODDS"){
		$exposure_data = get_current_bet_fancy_exposure2($conn,$bet_user_id,$event_id,$market_id);
		$exposure_data = min($exposure_data);
		
		if($exposure_data == 0){
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and market_id='$market_id' and user_id=$bet_user_id and market_type='$market_type'");
		}else{
			$conn->query("update exposure_details set exposure_amount='$exposure_data' where user_id=$bet_user_id and event_id='$event_id' and market_id='$market_id' and market_type='$market_type'");
		}
		
	
	}else{
		$bet_type_exposure ="";
		$stack ="";
		$runs ="";
		
		$exposure_data = get_net_exposure_match_oods($conn,$bet_user_id,$event_id,$market_type,$bet_type_exposure,$stack,$runs);
		
		if($exposure_data == 0){
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and user_id=$bet_user_id and market_type='$market_type'");
		}else{
			$conn->query("update exposure_details set exposure_amount='$exposure_data' where event_id='$event_id' and user_id=$bet_user_id and market_type='$market_type'");
		}
	}
	
		$return_array = array(
						"status"=>'ok',
						"message"=>'Bet Deleted',
						);
		echo json_encode($return_array);
		exit();
	}
	
	$update_bet_status = $conn->query("update bet_details set bet_status=0,bet_result='$user_amount' where bet_id=$bet_id and bet_status=1");
	
	//adjust account 
	if($result_status == 'Win'){
		
		$account_description = "#Win BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
		$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$bet_user_id','0','$account_description','$bet_id','$actual_win_amount2','Credit','4','$transaction_time','1')");
		
		if(INSERT_ACCOUNTS_TEMP){ 
			$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$bet_user_id','0','$account_description','$bet_id','$actual_win_amount2','Credit','4','$transaction_time','1')");
		}
		
		$level_pers = get_level_per($conn, $bet_user_id);
        foreach ($level_pers as $debit_user_id => $level_per) {

            $debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
            $transaction_id = 'sports-'.$bet_id.'-'.$debit_user_id;

            $account_descriptionSMDL = "#Loss BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
            $insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$debit_amt','Debit','7','$transaction_time','1','$transaction_id')");
			if(INSERT_ACCOUNTS_TEMP){ 
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$debit_amt','Debit','7','$transaction_time','1','$transaction_id')");
			}
        }
		
		
		
	}else if($result_status == 'Loss'){
		$account_description = "#Loss BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
		$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$bet_user_id','0','$account_description','$bet_id','$user_amount','Debit','7','$transaction_time','1')");
		
		if(INSERT_ACCOUNTS_TEMP){ 
			$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$bet_user_id','0','$account_description','$bet_id','$user_amount','Debit','7','$transaction_time','1')");
		}
		
		
		$level_pers = get_level_per($conn, $bet_user_id);
        foreach ($level_pers as $cradit_user_id => $level_per) {

            $cradit_amt = ($bet_margin_used / 100) * $level_per;
            $transaction_id = 'sports-'.$bet_id.'-'.$cradit_user_id;

            $account_descriptionSMDL = "#Win BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
            $insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$cradit_amt','Credit','4','$transaction_time','1','$transaction_id')");
			if(INSERT_ACCOUNTS_TEMP){ 
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$cradit_amt','Credit','4','$transaction_time','1','$transaction_id')");
			}
        }
		
	}
	
	
	if($market_type == "FANCY_ODDS"){
		$exposure_data = get_current_bet_fancy_exposure2($conn,$bet_user_id,$event_id,$market_id);
		$exposure_data = min($exposure_data);
		
		if($exposure_data == 0){
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and market_id='$market_id' and user_id=$bet_user_id and market_type='$market_type'");
		}else{
			$conn->query("update exposure_details set exposure_amount='$exposure_data' where user_id=$bet_user_id and event_id='$event_id' and market_id='$market_id' and market_type='$market_type'");
		}
		
	
	}else{
		$bet_type_exposure ="";
		$stack ="";
		$runs ="";
		
		$exposure_data = get_net_exposure_match_oods($conn,$bet_user_id,$event_id,$market_type,$bet_type_exposure,$stack,$runs);
		
		if($exposure_data == 0){
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and user_id=$bet_user_id and market_type='$market_type'");
		}else{
			$conn->query("update exposure_details set exposure_amount='$exposure_data' where event_id='$event_id' and user_id=$bet_user_id and market_type='$market_type'");
		}
	}
	
	$return_array = array(
						"status"=>'ok',
						"message"=>'Result done!',
						);
	echo json_encode($return_array);
	exit();

	
?>