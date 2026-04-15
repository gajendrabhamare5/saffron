<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$data_original = file_get_contents("php://input");
$data = json_decode(file_get_contents("php://input"));

$result_array = $data->t1;



$rdesc = $result_array->rdesc;


$game_type = $result_array->gtype;
$mid = $result_array->rid;
$bet_final_result = $result_array->winnat;
$result = $result_array->win;


$cards3 = $result_array->card;
$cards3 = '["'.$cards3.'"]';
$cards3 = str_replace(',','","',$cards3);
$cards = $cards3;
$cards2 = $cards3;

$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid' and game_type='$game_type'");
$row_count = mysqli_num_rows($check_result_already_insert);
if($row_count > 0){
	echo "already inserted";
	exit();
}
$result_time = date("Y-m-d H:i:s");
$result_status=$bet_final_result;
$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$rdesc','$data_original')");


$event_type = "BALLBYBALL";

$result_time = date("Y-m-d H:i:s");
$market_id = array();
$market_id[]=$result;
if($result == "5"  || $result == "6"){
    $market_id[]="17";
}
if($result == "7" || $result == "8" || $result == "9" || $result == "10" || $result == "11"){
    $market_id[]="18";
}
if($result == "13" || $result == "14" || $result == "15" || $result == "16"){
    $market_id[]="19";
}


$bet_final_result = 'Winner - '.$result_status;

$end_date_time = date("Y-m-d H:i:s");
$transaction_time = date("Y-m-d H:i:s");
$transaction_time2 = date("d-m-Y H:i:s");

$get_all_bet = $conn->query("select * from bet_teen_details where event_id='$mid' and bet_status=1 and event_type='$event_type'");
while ($fetch_get_all_bet = mysqli_fetch_assoc($get_all_bet)) {
    $bet_id = $fetch_get_all_bet['bet_id'];
    $bet_user_id = $fetch_get_all_bet['user_id'];
    $bet_market_id = $fetch_get_all_bet['market_id'];
    $bet_market_name = $fetch_get_all_bet['market_name'];
    $bet_amount = $fetch_get_all_bet['bet_margin_used'];
    $bet_odds = $fetch_get_all_bet['bet_odds'];
    $bet_stack = $fetch_get_all_bet['bet_stack'];
    $bet_winning_amount = $fetch_get_all_bet['bet_win_amount'];
    $actual_win_amount2 = $bet_winning_amount;
    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];


    if (in_array($bet_market_id, $market_id)) {

        $user_amount = $actual_win_amount2;
        $smdl_amount = -$actual_win_amount2;


        $bet_result = ($bet_odds - 1 ) * $bet_stack;
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$user_amount',bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1");
        
        if($conn->affected_rows > 0){
        	$transaction_id = $bet_id.'-'.$bet_user_id;
			$account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0)){
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Credit','4','$transaction_time','1',1,'$transaction_id')");
			}
			if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0))){
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Credit','4','$transaction_time','1',1,'$transaction_id')");
			}

			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $debit_user_id => $level_per) {

				$debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
				$transaction_id = $bet_id.'-'.$debit_user_id;

				$account_descriptionSMDL = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				
				if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0)){
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')");
				}
				if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0))){
					$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')");
				}
			}
        }
    } else {


        $bet_winning_amount22 = ($bet_odds - 1 ) * $bet_stack;
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='-$bet_amount',bet_final_result='$bet_final_result'  where bet_id='$bet_id' and bet_status=1");

		if($conn->affected_rows > 0){
			$transaction_id = $bet_id.'-'.$bet_user_id;
			$account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $bet_amount != 0)){
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");
			}
			if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $bet_amount != 0))){
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");
			}

			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $cradit_user_id => $level_per) {

				$cradit_amt = ($bet_amount / 100) * $level_per;
				$transaction_id = $bet_id.'-'.$cradit_user_id;

				$account_descriptionSMDL = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0)){
					$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')");
				}
				if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0))){
					$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')");
				}
			}
        }
    }
}
$conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");


echo "done";


?>
?>