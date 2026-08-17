<?php
	include "../../include/conn.php";
	include "../session.php";
	/* error_reporting(E_ALL);
	ini_set("display_errors",1);
	ini_set("display_startup_errors",1); */
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	
	$mid = $_REQUEST['event_id'];
	$result = $_REQUEST['winner_name'];
	$game_type = 'twenty';
	$cards = '';
	
	
	if($mid == ""){
		$return = array(
						"status"=>'error',
						"message"=>'Please select event id',
						);
		echo json_encode($return);
		exit();
	}

	if($result == ""){
		$return = array(
						"status"=>'error',
						"message"=>'Please select winner name',
						);
		echo json_encode($return);
		exit();
	}
	
	$result_time  = date("Y-m-d H:i:s");
	
	if($result == 1){
		$result_status ='A';
		$market_id = '4545';
	}else{
		$result_status ='B';
		$market_id = '5555';
	}
	
	$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid'");
	$row_count = mysqli_fetch_row($check_result_already_insert);
	
	
	
	$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time) VALUES('$mid','$game_type','$result_status','$cards','$result_time')");

	
	$end_date_time = date("Y-m-d H:i:s");
	$transaction_time = date("Y-m-d H:i:s");
	$transaction_time2 = date("d-m-Y H:i:s");
	
	$get_all_bet = $conn->query("select * from bet_teen_details where event_id='$mid' and bet_status=1");
	while($fetch_get_all_bet = mysqli_fetch_assoc($get_all_bet)){
		$bet_id = $fetch_get_all_bet['bet_id'];
		$bet_user_id = $fetch_get_all_bet['user_id'];
		$bet_market_id = $fetch_get_all_bet['market_id'];
		$bet_market_name = $fetch_get_all_bet['market_name'];
		$bet_amount = $fetch_get_all_bet['bet_margin_used'];
		$bet_winning_amount = $fetch_get_all_bet['bet_win_amount'];
		$actual_win_amount2 = $bet_winning_amount;
		$get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
		$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
		$parentDL = $fetch_parent_ids['parentDL'];
		$parentMDL = $fetch_parent_ids['parentMDL'];
		$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
		
		
		if($bet_market_id == $market_id){
			$user_amount = $actual_win_amount2;
			$smdl_amount = -$actual_win_amount2;
			
			$bet_result = $user_amount - $bet_amount;
			$update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$bet_result',bet_win_amount='$bet_result' where bet_id='$bet_id' and bet_status=1");
			$account_description = "#Win 2020 Teenpatti BET ID $bet_id GAME ID $mid at $transaction_time2";
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$bet_user_id','$parentSuperMDL','$account_description','$bet_id','$actual_win_amount2','Credit','4','$transaction_time','1')");

			$account_descriptionSMDL = "#Loss 2020 Teenpatti BET ID $bet_id GAME ID $mid at $transaction_time2";
			$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$parentSuperMDL','$bet_user_id','$account_descriptionSMDL','$bet_id','$smdl_amount','Debit','7','$transaction_time','1')");
		}else{
			$bet_winning_amount22 = $bet_winning_amount - $bet_amount;
			$update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_win_amount='$bet_winning_amount22'  where bet_id='$bet_id' and bet_status=1");
		}
		
		
	}
	
			$return = array(
						"status"=>'ok',
						"message"=>'Result Done',
						);
		echo json_encode($return);
		exit();
?>