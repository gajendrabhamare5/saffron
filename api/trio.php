<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$data_original = file_get_contents("php://input");
$data = json_decode(file_get_contents("php://input"));

$result_array = $data->t1;



$remark = $result_array->rdesc;


$game_type = $result_array->gtype;
$mid = $result_array->rid;
$bet_final_result = $result_array->winnat;
$result = $result_array->win;
$result_status = $result_array->win;


$cards3 = $result_array->card;
$cards3 = '["' . $cards3 . '"]';
$cards3 = str_replace(',', '","', $cards3);
$cards = $cards3;
$cards2 = $cards3;

$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid' and game_type='$game_type'");
$row_count = mysqli_num_rows($check_result_already_insert);
if ($row_count > 0) {
    echo "already inserted";
    exit();
}

//$get_data = json_decode($get_data);

$event_type = "TRIO";

$market_id = array();
$winner_cards_id = array();
$result_time = date("Y-m-d H:i:s");

$result_list = explode("#", $remark);
foreach ($result_list as $key_main => $val) {

    
    if ($key_main == 0) {
        $ress="";
        if(empty($val)){
            $ress = "Lay";
        }else{
            if (strpos($val, "No") !== false) {
                $ress = "Lay";
            }
            if (strpos($val, "Yes") !== false) {
                $ress = "Back";
            }
        }
        $market_id[1] = $ress;
    } else if ($key_main == 1) {
        if(empty($val)){
            $market_id[2] = "Lay";
            $market_id[3] = "Lay";
        }else{
            if (strpos($val, "1 2 4  |  J Q K") !== false) {
                $market_id[2] = "Back";
                $market_id[3] = "Back";

            }else if (strpos($val, "1 2 4") !== false) { 
                $market_id[2] = "Back";
                $market_id[3] = "Lay";
            }
            else if (strpos($val, "J Q K") !== false) { 
                $market_id[3] = "Back";
                $market_id[2] = "Lay";
            }
        }
    } else if ($key_main == 2) {
        if(empty($val)){
            $market_id[4] = "Lay";
            $market_id[5] = "Lay";
        }else{
            if (strpos($val, "Black") !== false) { 
                $market_id[4] = "Lay";
                $market_id[5] = "Back";            
            }
            if (strpos($val, "RED") !== false) { 
                $market_id[4] = "Back";
                $market_id[5] = "Lay";
            }
        }
    } else if ($key_main == 3) {
        if(empty($val)){
            $market_id[6] = "Lay";
            $market_id[7] = "Lay";
        }else{
            if (strpos($val, "Odd") !== false) { 
                $market_id[6] = "Back";
                $market_id[7] = "Lay";
            }
            if (strpos($val, "Even") !== false) { 
                $market_id[6] = "Lay";
                $market_id[7] = "Back";
            }
        }
    } else if ($key_main == 4) {
        if (strpos($val, "Pair") !== false) { 
            $market_id[8] = "Back";
        }
        if (strpos($val, "Flush") !== false) { 
            $market_id[9] = "Back";
        }
        if (strpos($val, "Straight") !== false) { 
            $market_id[10] = "Back";
        }
        if (strpos($val, "Trio") !== false) { 
            $market_id[11] = "Back";
        }
        if (strpos($val, "Straight Flush") !== false) { 
            $market_id[12] = "Back";
        }
        
    }
}

$return_odds = 0;
$return_odds2 = 0;
$cards2 = json_decode($cards2);



$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$remark','$data_original')");
/* if($row_count > 0){
  echo "ok";
  exit();
  } */

$bet_final_result = 'Winner - ' . $bet_final_result;

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
    $bet_type = $fetch_get_all_bet['bet_type'];
    $winner_flag = false;
    if ($market_id[$bet_market_id]) {
        if ($market_id[$bet_market_id] == $bet_type) {
            $winner_flag = true;
        }
    }

    if ($winner_flag) {


        $user_amount = $actual_win_amount2;
        $smdl_amount = -$actual_win_amount2;


        $bet_result = ($bet_odds - 1) * $bet_stack;
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$user_amount',bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1");

        if ($conn->affected_rows > 0) {
            $transaction_id = $bet_id . '-' . $bet_user_id;
            $account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
            if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0)) {
                $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Credit','4','$transaction_time','1',1,'$transaction_id')");
            }
            if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0))) {
                $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Credit','4','$transaction_time','1',1,'$transaction_id')");
            }

            $level_pers = get_level_per($conn, $bet_user_id);
            foreach ($level_pers as $debit_user_id => $level_per) {

                $debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
                $transaction_id = $bet_id . '-' . $debit_user_id;

                $account_descriptionSMDL = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
                if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0)) {
                    $insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')");
                }
                if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $debit_amt != 0))) {
                    $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')");
                }
            }
        }
    } else {


        $bet_winning_amount22 = ($bet_odds - 1) * $bet_stack;
        if ($bet_market_id == "1" || $bet_market_id == "2" || $bet_market_id == "4" || $bet_market_id == "5" || ((int)$bet_market_id >= 47 and (int)$bet_market_id <= 52)) {
            $bet_winning_amount22 = ($bet_odds) * $bet_stack;
        }
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='-$bet_stack',bet_final_result='$bet_final_result'  where bet_id='$bet_id' and bet_status=1");

        if ($conn->affected_rows > 0) {
            $transaction_id = $bet_id . '-' . $bet_user_id;
            $account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
            if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $bet_amount != 0)) {
                $insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");
            }
            if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $bet_amount != 0))) {
                $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");
            }

            $level_pers = get_level_per($conn, $bet_user_id);
            foreach ($level_pers as $cradit_user_id => $level_per) {

                $cradit_amt = ($bet_amount / 100) * $level_per;
                $transaction_id = $bet_id . '-' . $cradit_user_id;

                $account_descriptionSMDL = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
                if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0)) {
                    $insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')");
                }
                if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $cradit_amt != 0))) {
                    $conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')");
                }
            }
        }
    }
}
$conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");


echo "done";
