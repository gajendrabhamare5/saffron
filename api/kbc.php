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

$event_type = "KBC";

$market_id = array();
$winner_cards_id = array();
$result_time = date("Y-m-d H:i:s");

$marketData = array(
    'Red' => '1_1',
    'Black' => '1_2',
    'Odd' => '2_1',
    'Even' => '2_2',
    'Up' => '3_1',
    'Down' => '3_2',
    'A23' => '4_1',
    '456' => '4_2',
    '8910' => '4_3',
    'JQK' => '4_4',
    'Spade' => '5_1',
    'Heart' => '5_2',
    'Club' => '5_3',
    'Diamond' => '5_4'
);

$result_list = explode("#", $remark);
foreach ($result_list as $key_main => $val) {
    $val = $noSpaces = preg_replace('/\s+/', '', $val);
    $keyss = $marketData[$val];
	if(!empty($keyss)){
   		$market_id[$keyss] = 'Back';
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

$other_bet_ids=array();
$other_bet=$conn->query("select * from kbc_teen_bet where event_id='$mid' and bet_status=1");
while($other_data=mysqli_fetch_assoc($other_bet)){
    $bet_id_new=$other_data['bet_id'];
    $other_bet_ids[$bet_id_new][]=$other_data;
}

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
   /*  $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL']; */
    $bet_type = $fetch_get_all_bet['bet_type'];

    $winner_flag = false;
    $winner_count = [];
    $bet_create_type = "5";
    if(isset($other_bet_ids[$bet_id])){

        foreach($other_bet_ids[$bet_id] as $val){
            $other_kbc_id=$val['id'];
            $other_market_id=$val['market_id'];
            $other_user_id=$val['user_id'];
            $other_market_name=$val['market_name'];
            $bet_create_type = $val['bet_type'];
            if (array_key_exists($other_market_id,$market_id) && $other_user_id == $bet_user_id) {
                    $update_bet = $conn->query("update kbc_teen_bet set bet_status=0,bet_final_result='Win' where bet_id='$bet_id' and bet_status=1 and id='$other_kbc_id'");
                    $winner_count[] = 1;
            }else{
                $update_bet = $conn->query("update kbc_teen_bet set bet_status=0,bet_final_result='Loss' where bet_id='$bet_id' and bet_status=1 and id='$other_kbc_id'");
                $winner_count[] = 2;
            }
        }
    }
    if($bet_create_type == "5"){
        if (!in_array(2,$winner_count) ) {
            $winner_flag = true;
        }
    }
    if($bet_create_type == "4" || $bet_create_type == "50"){
        $first_four = array_slice($winner_count, 0, 4);
        if (!in_array(2,$first_four) ) {
            $winner_flag = true;
        }
    }
    if ($winner_flag) {
        $actual_win_amount2=0;
        if (array_key_exists("2_1",$market_id)) {
            $actual_win_amount2 = $bet_stack * 101;
        }
        if (array_key_exists("2_2",$market_id)) {
            $actual_win_amount2 = $bet_stack * 111;
        }
        if($bet_create_type == "4"){
            if (array_key_exists("2_1",$market_id)) {
                $actual_win_amount2 = $bet_stack * 26.5;
            }
            if (array_key_exists("2_2",$market_id)) {
                $actual_win_amount2 = $bet_stack * 29;
            }
        }
        if($bet_create_type == "50"){
            if (!in_array(2,$winner_count) ) {
                if (array_key_exists("2_1",$market_id)) {
                    $actual_win_amount2 = $bet_stack * 63.76;
                }
                if (array_key_exists("2_2",$market_id)) {
                    $actual_win_amount2 = $bet_stack * 69.65;
                }
            }else{
                $first_four = array_slice($winner_count, 0, 4);
                $last = end($winner_count);
                if (!in_array(2,$first_four) && $last == "2") {
                    if (array_key_exists("2_1",$market_id)) {
                        $actual_win_amount2 = $bet_stack * 12.75;
                    }
                    if (array_key_exists("2_2",$market_id)) {
                        $actual_win_amount2 = $bet_stack * 14;
                    }
                }
            }
        }
        $user_amount = $actual_win_amount2;
        $smdl_amount = -$actual_win_amount2;
        $bet_result = ($bet_odds - 1) * $bet_stack;
       /*  $update_bet = $conn->query("update kbc_teen_bet set bet_status=0,bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1"); */
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
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='-$bet_amount',bet_final_result='$bet_final_result'  where bet_id='$bet_id' and bet_status=1");
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

function checkEvenOrOdd($number)
{
    if ($number % 2 == 0) {
        return "5";
    } else {
        return "4";
    }
}
