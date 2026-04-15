<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$result = $_REQUEST['result'];
$game_type = $_REQUEST['type'];
$mid = $_REQUEST['mid'];
$cards = $_REQUEST['cards'];
$cards2 = $_REQUEST['cards'];
$cards3 = $_REQUEST['cards'];
//$get_data = json_decode($get_data);

$event_type = "CASINO_METER";
$mid = str_replace("33.", "", $mid);

$result_time = date("Y-m-d H:i:s");
$market_id = array();

if ($result == "CAN") {
    $get_all_bet1 = $conn->query("select * from bet_teen_details where event_id='$mid' and bet_status=1 and event_type='$event_type'");
    while ($fetch_get_all_bet1 = mysqli_fetch_assoc($get_all_bet1)) {
        $bet_id = $fetch_get_all_bet1['bet_id'];
        $update_bet = $conn->query("update bet_teen_details set bet_status=2,bet_result='0',bet_win_amount='0' where bet_id='$bet_id' and bet_status=1");

        $conn->query("delete from accounts where bet_id='$bet_id' and game_type=1");
        $conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
    }
}

$low = $_REQUEST['low'];

$high = $_REQUEST['high'];

$desc_remakrs = $low . "-" . $high;
if ($low > $high) {
    $result = 1;
    $winning_loss_run = $low - $high;
    $market_id[] = 1;
} else {
    $result = 2;
    $winning_loss_run = $high - $low;
    $market_id[] = 2;
}

$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid'");
$row_count = mysqli_fetch_row($check_result_already_insert);
$result_status = $result;
$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$desc_remakrs')");

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
    $bet_type = $fetch_get_all_bet['bet_type'];
    $actual_win_amount2 = $bet_winning_amount;
    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];


    if (in_array($bet_market_id, $market_id)) {

        //$return_stack = $bet_stack * 1.5;

        $actual_win_amount2 = $winning_loss_run * $bet_stack;
        $actual_win_amount2 = $actual_win_amount2 * 1.15;

        $user_amount = $actual_win_amount2;
        $smdl_amount = -$actual_win_amount2;

        //$bet_result = ($bet_odds - 1 ) * $bet_stack;
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$actual_win_amount2' where bet_id='$bet_id' and bet_status=1");
        
        if($conn->affected_rows > 0){
        	$transaction_id = $bet_id.'-'.$bet_user_id;
			$account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$actual_win_amount2','Credit','4','$transaction_time','1',1,'$transaction_id')");

			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $debit_user_id => $level_per) {

				$debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
				$transaction_id = $bet_id.'-'.$debit_user_id;

				$account_descriptionSMDL = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')");
			}
        }
    } else {

        $lossing_amount = $winning_loss_run * $bet_stack;


        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='-$lossing_amount'  where bet_id='$bet_id' and bet_status=1");

		if($conn->affected_rows > 0){
			$transaction_id = $bet_id.'-'.$bet_user_id;
			$account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$lossing_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");

			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $cradit_user_id => $level_per) {

				$cradit_amt = ($lossing_amount / 100) * $level_per;
				$transaction_id = $bet_id.'-'.$cradit_user_id;

				$account_descriptionSMDL = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')");
			}
        }
    }
}


$conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");

echo "done";
?>