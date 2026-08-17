<?php

	include "../../include/conn.php";
	include "../../include/function.php";
	include "../../include/level_percentage.php";

	$user_id = 1; 
	$login_type = 5;
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	
	
	$event_id = $_REQUEST['result_event_id'];
	$market_id = $_REQUEST['result_market_id'];
	$match_odds_result = $_REQUEST['result_market_runs'];
	$result_market_type = $_REQUEST['result_market_type'];
	
	$market_type = $result_market_type;
	if($result_market_type == ""){
		$market_type = "Over";
	}
	
	
	$get_revert_market_entry_id = $conn->query("select * from bet_details where bet_status=0 and event_id='$event_id' and market_id='$market_id' and market_type='FANCY_ODDS'");
	while($fetch_get_revert_market_entry_id = mysqli_fetch_assoc($get_revert_market_entry_id)){
		$bet_id = $fetch_get_revert_market_entry_id['bet_id'];		
		$update_bet_details  = $conn->query("update bet_details set bet_status=1,bet_result='0' where bet_id=$bet_id");
		$delete_bet_details  = $conn->query("delete from accounts where bet_id=$bet_id and game_type=0");
		$delete_bet_details  = $conn->query("delete from accounts_temp where bet_id=$bet_id and game_type=0");
		
	}
	
	
	$date_time= date("Y-m-d H:i:s");
		
	$added_datetime = $date_time;
		
	$addded_datetime = $date_time;
	$added_datetime  = $date_time;

	$date_time= date("Y-m-d H:i:s");
		
		
		
		$ip_address = '';
		if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
			$ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		else{
			$ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		}

		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		
		
		$conn->query("insert into result (eventType,eventId,marketId,runs,marketName,date_time,added_by,ip_address,user_agent) values('4','$event_id','$market_id','$match_odds_result','fancy','$date_time','$user_id','$ip_address','$user_agent')");	
		
	if($market_type == "Over"){
		
		
		
		if($match_odds_result == "CAN"){
			$delete_bet_details  = $conn->query("update bet_details set bet_status=2 where event_id=$event_id and market_id=$market_id and market_type='FANCY_ODDS'");
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and market_id='$market_id' and market_type='FANCY_ODDS'");
			$return_array = array(
							"status"=>'ok',
							"message"=>'Bet Cancelled',
							);
			echo json_encode($return_array);
			exit();
		}			
		$get_win_bet_details = $conn->query("select * from bet_details where event_id=$event_id and market_id=$market_id and market_type='FANCY_ODDS'");
		while($fetch_get_win_bet_details = mysqli_fetch_assoc($get_win_bet_details)){
			$bet_id = $fetch_get_win_bet_details['bet_id'];
			$bet_type = $fetch_get_win_bet_details['bet_type'];
			$bet_runs = $fetch_get_win_bet_details['bet_runs'];
			if($bet_type == "Yes" and $bet_runs<= $match_odds_result){
				set_result($conn,$bet_id,'Win',$match_odds_result);
			}else if($bet_type=="No" and $bet_runs > $match_odds_result){
				set_result($conn,$bet_id,'Win',$match_odds_result);
			}else{
				set_result($conn,$bet_id,'Loss',$match_odds_result);
			}
			
		}
		

	}
	else if($market_type == "Yes_no"){
		$get_win_bet_details = $conn->query("select * from bet_details where event_id=$event_id and market_id=$market_id and market_type='FANCY_ODDS'");
		while($fetch_get_win_bet_details = mysqli_fetch_assoc($get_win_bet_details)){
			$bet_id = $fetch_get_win_bet_details['bet_id'];
			$bet_type = $fetch_get_win_bet_details['bet_type'];
			$bet_runs = $fetch_get_win_bet_details['bet_runs'];
			if($bet_type == $match_odds_result){
				set_result($conn,$bet_id,'Win',$match_odds_result);
			}else{
				set_result($conn,$bet_id,'Loss',$match_odds_result);
			}
			
		}
		

		
	}
	else if ($market_type == "khado") {

    $market_type = 'KHADO_ODDS';

    if ($match_odds_result == "CAN") {
        $delete_bet_details = $conn->query("update bet_details set bet_status=2 where event_id=$event_id and market_id=$market_id and market_type='$market_type'");
        $delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and market_id='$market_id' and market_type='$market_type'");
        $return_array = array(
            "status" => 'ok',
            "message" => 'Bet Cancelled',
        );
        echo json_encode($return_array);
        exit();
    }
    $get_win_bet_details = $conn->query("select * from bet_details where event_id=$event_id and market_id=$market_id and market_type='$market_type' and bet_status=1");
    while ($fetch_get_win_bet_details = mysqli_fetch_assoc($get_win_bet_details)) {
        $bet_id = $fetch_get_win_bet_details['bet_id'];
        $bet_type = $fetch_get_win_bet_details['bet_type'];
        $bet_runs = (int) $fetch_get_win_bet_details['bet_runs'];
        $bet_runs2 = (int) $fetch_get_win_bet_details['bet_runs2'];

//        if ((int) $fetch_get_win_bet_details['user_id'] == 6) {
            if ($bet_type == 'Yes') {

                $match_odds_result = (int) $match_odds_result;
                if ($match_odds_result >= $bet_runs && $match_odds_result <= $bet_runs2) {
                    set_result($conn, $bet_id, 'Win',$match_odds_result);
                } else {
                    set_result($conn, $bet_id, 'Loss',$match_odds_result);
                }
            }
//        }
    }

}
	else if ($market_type == "meter") {

		if ($match_odds_result == "CAN") {
			$delete_bet_details = $conn->query("update bet_details set bet_status=2 where event_id=$event_id and market_id=$market_id and market_type='$market_type'");
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and market_id='$market_id' and market_type='METER_ODDS'");
			$return_array = array(
				"status" => 'ok',
				"message" => 'Bet Cancelled',
			);
			echo json_encode($return_array);
			exit();
		}
		$get_win_bet_details = $conn->query("select * from bet_details where event_id=$event_id and market_id=$market_id and market_type='METER_ODDS'  and bet_status=1");
		while ($fetch_get_win_bet_details = mysqli_fetch_assoc($get_win_bet_details)) {
			$bet_id = $fetch_get_win_bet_details['bet_id'];
			$bet_type = $fetch_get_win_bet_details['bet_type'];
			$bet_runs = $fetch_get_win_bet_details['bet_runs'];

			$is_meter = true;
			$meter_diff = abs($match_odds_result - $bet_runs);
			if ($bet_type == "Yes" and $bet_runs <= $match_odds_result) {
				set_result($conn, $bet_id, 'Win',$match_odds_result, $is_meter, $meter_diff);
			} else if ($bet_type == "Yes" and $bet_runs == $match_odds_result) {
				set_result($conn, $bet_id, 'CAN',$match_odds_result, $is_meter, $meter_diff);
			} else if ($bet_type == "No" and $bet_runs > $match_odds_result) {
				set_result($conn, $bet_id, 'Win',$match_odds_result, $is_meter, $meter_diff);
			} else {
				set_result($conn, $bet_id, 'Loss',$match_odds_result, $is_meter, $meter_diff);
			}
		}


	} 
	else if ($market_type == "odd_even") {
    if ($match_odds_result == "CAN") {
        $delete_bet_details = $conn->query("update bet_details set bet_status=2 where event_id=$event_id and market_id=$market_id and market_type='$market_type'");
        $delete_exposure = $conn->query("delete from exposure_details where event_id='$event_id' and market_id='$market_id' and market_type='FANCY_ODDS'");
        $return_array = array(
            "status" => 'ok',
            "message" => 'Bet Cancelled',
        );
        echo json_encode($return_array);
        exit();
    }


    $get_win_bet_details = $conn->query("select * from bet_details where event_id=$event_id and market_id=$market_id and market_type='FANCY_ODDS'  and bet_status=1");
    while ($fetch_get_win_bet_details = mysqli_fetch_assoc($get_win_bet_details)) {
        $bet_id = $fetch_get_win_bet_details['bet_id'];
        $bet_type = $fetch_get_win_bet_details['bet_type'];
        $bet_runs = $fetch_get_win_bet_details['bet_runs'];
        $market_name = $fetch_get_win_bet_details['market_name'];

        // Test if string contains the word 
        if (strpos($market_name, '(ODD)') !== false) {

            if ($match_odds_result == 'odd')
                set_result($conn, $bet_id, 'Win',$match_odds_result);
            else
                set_result($conn, $bet_id, 'Loss',$match_odds_result);

            // echo "odd Found!";
        } else {

            if ($match_odds_result == 'even')
                set_result($conn, $bet_id, 'Win',$match_odds_result);
            else
                set_result($conn, $bet_id, 'Loss',$match_odds_result);

            //echo "Word Not Found!";
        }

        if ($bet_type == "Yes" and $bet_runs <= $match_odds_result) {
            set_result($conn, $bet_id, 'Win',$match_odds_result);
        } else if ($bet_type == "No" and $bet_runs > $match_odds_result) {
            set_result($conn, $bet_id, 'Win',$match_odds_result);
        } else {
            set_result($conn, $bet_id, 'Loss',$match_odds_result);
        }
    }

    $return_array = array(
        "status" => "ok",
        "message" => "Result Done",
    );
    echo json_encode($return_array);
}
	else{
			
		}
	
	$return_array = array(
							"status"=>"ok",
							"message"=>"Result Done",
							);
		echo json_encode($return_array);
	
	function set_result($conn,$bet_id,$result_status,$match_odds_result, $is_meter = false, $meter_diff = 0){
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
		/* $get_DL_comm = $conn->query("select * from user_master where Id=$parentDL");
		$fetch_DL_comm = mysqli_fetch_assoc($get_DL_comm);
		$dl_commission = $fetch_DL_comm['my_percentage'];
		
		$get_MDL_comm = $conn->query("select * from user_master where Id=$parentMDL");
		$fetch_MDL_comm = mysqli_fetch_assoc($get_MDL_comm);
		$mdl_commission = $fetch_MDL_comm['my_percentage'];
		
		$smdl_commission = 100 - $mdl_commission - $dl_commission; */
		
		
		if($result_status == 'Win'){
			if ($is_meter) {
				$actual_win_amount2 = $bet_stack * $meter_diff;
				$user_amount = $actual_win_amount2;
			} else {
				$actual_win_amount = $bet_win_amount + $bet_margin_used;		
				$actual_win_amount2 = $bet_win_amount;
				$user_amount = $actual_win_amount2;
				
				$smdl_amount = -$actual_win_amount2;
			}
			
		}else if($result_status == 'Loss'){
			if ($is_meter) {
            $user_amount = 0 - ($bet_stack * $meter_diff);
        } else {
			$actual_loss_amount = $bet_margin_used;
			$user_amount = -$actual_loss_amount;
			
			$smdl_amount = $actual_loss_amount;
		}
			
			
		}else{
			
			$delete_bet_details  = $conn->query("update bet_details set bet_status=2 where user_id=$bet_user_id and bet_id=$bet_id");
			$delete_bet_details  = $conn->query("delete from accounts where user_id=$bet_user_id and bet_id=$bet_id and game_type=0");
			$delete_bet_details  = $conn->query("delete from accounts_temp where user_id=$bet_user_id and bet_id=$bet_id and game_type=0");
			$delete_exposure = $conn->query("delete from exposure_details where event_id='$eventId' and user_id=$bet_user_id and market_id='$marketId'");
			$return_array = array(
							"status"=>'ok',
							"message"=>'Bet Cancelled',
							);
			echo json_encode($return_array);
			exit();
		}
		
		$update_bet_status = $conn->query("update bet_details set bet_status=0,bet_result='$user_amount',bet_run_result='$match_odds_result' where bet_id=$bet_id and bet_status=1");
		$delete_exposure = $conn->query("delete from exposure_details where event_id='$eventId' and user_id=$bet_user_id and market_id='$marketId'");
		//adjust account 
		if($result_status == 'Win'){
			
			
			/* if($parentDL != 65 and $parentMDL != 615){
				
				$comm_amount = 0;
				
                $update_bet_status = $conn->query("update bet_details set bet_comm='$comm_amount' where bet_id=$bet_id");
				
				
				$account_description_commision = "#Commission Paid from $user_Email_ID BET ID $bet_id - $event_name -$market_name at $entry_transaction_time";
				
				
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('1','$bet_user_id','$account_description_commision','$bet_id','$comm_amount','Credit','10','$transaction_time','1')");
				
				$comm_amount = $comm_amount * (-1);
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$bet_user_id','0','$account_description_commision','$bet_id','$comm_amount','Debit','9','$transaction_time','1')");
				
				
			} */
			
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
					$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`,`game_type`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$debit_amt','Debit','7','$transaction_time','1','$transaction_id',0)");
				}
				
				if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0))){ 
					$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`,`game_type`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$debit_amt','Debit','7','$transaction_time','1','$transaction_id',0)");
				}
			}
			
			
		}else if($result_status == 'Loss'){
			
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

				$account_descriptionSMDL = "#Win $event_type BET ID $bet_id GAME ID $mid at $result_time";
				if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0)){
					$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`,`game_type`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$cradit_amt','Credit','4','$transaction_time','1','$transaction_id',0)");
				}
				if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0))){ 
					$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`,`game_type`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$cradit_amt','Credit','4','$transaction_time','1','$transaction_id',0)");
				}
			}
			
			
		}
		return true;
	}
		
?>