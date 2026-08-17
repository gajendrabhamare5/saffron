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

$event_type = "NOTENUM";

$market_id = array();
$winner_cards_id = array();
$result_time = date("Y-m-d H:i:s");

$marketData = array(
    'Odd Card 1' => '1',
    'Even Card 1' => '7',
    'Black Card 1' => '13',
    'Red Card 1' => '19',
    'Low Card 1' => '25',
    'High Card 1' => '31',
    'Baccarat 1' => '37',
    'Baccarat 2' => '38',
    'Odd Card 2' => '2',
    'Even Card 2' => '8',
    'Black Card 2' => '14',
    'Red Card 2' => '20',
    'Low Card 2' => '26',
    'High Card 2' => '32',
    'Odd Card 3' => '3',
    'Even Card 3' => '9',
    'Black Card 3' => '15',
    'Red Card 3' => '21',
    'Low Card 3' => '27',
    'High Card 3' => '33',
    'Odd Card 4' => '4',
    'Even Card 4' => '10',
    'Black Card 4' => '16',
    'Red Card 4' => '22',
    'Low Card 4' => '28',
    'High Card 4' => '34',
    'Odd Card 5' => '5',
    'Even Card 5' => '11',
    'Black Card 5' => '17',
    'Red Card 5' => '23',
    'Low Card 5' => '29',
    'High Card 5' => '35',
    'Odd Card 6' => '6',
    'Even Card 6' => '12',
    'Black Card 6' => '18',
    'Red Card 6' => '24',
    'Low Card 6' => '30',
    'High Card 6' => '36',
    'Card 1 - Card A' => '39_1',
    'Card 1 - Card 2' => '39_2',
    'Card 1 - Card 3' => '39_3',
    'Card 1 - Card 4' => '39_4',
    'Card 1 - Card 5' => '39_5',
    'Card 1 - Card 6' => '39_6',
    'Card 1 - Card 7' => '39_7',
    'Card 1 - Card 8' => '39_8',
    'Card 1 - Card 9' => '39_9',
    'Card 1 - Card 10' => '39_10',
    'Card 2 - Card A' => '40_1',
    'Card 2 - Card 2' => '40_2',
    'Card 2 - Card 3' => '40_3',
    'Card 2 - Card 4' => '40_4',
    'Card 2 - Card 5' => '40_5',
    'Card 2 - Card 6' => '40_6',
    'Card 2 - Card 7' => '40_7',
    'Card 2 - Card 8' => '40_8',
    'Card 2 - Card 9' => '40_9',
    'Card 2 - Card 10' => '40_10',
    'Card 3 - Card A' => '41_1',
    'Card 3 - Card 2' => '41_2',
    'Card 3 - Card 3' => '41_3',
    'Card 3 - Card 4' => '41_4',
    'Card 3 - Card 5' => '41_5',
    'Card 3 - Card 6' => '41_6',
    'Card 3 - Card 7' => '41_7',
    'Card 3 - Card 8' => '41_8',
    'Card 3 - Card 9' => '41_9',
    'Card 3 - Card 10' => '41_10',
    'Card 4 - Card A' => '42_1',
    'Card 4 - Card 2' => '42_2',
    'Card 4 - Card 3' => '42_3',
    'Card 4 - Card 4' => '42_4',
    'Card 4 - Card 5' => '42_5',
    'Card 4 - Card 6' => '42_6',
    'Card 4 - Card 7' => '42_7',
    'Card 4 - Card 8' => '42_8',
    'Card 4 - Card 9' => '42_9',
    'Card 4 - Card 10' => '42_10',
    'Card 5 - Card A' => '43_1',
    'Card 5 - Card 2' => '43_2',
    'Card 5 - Card 3' => '43_3',
    'Card 5 - Card 4' => '43_4',
    'Card 5 - Card 5' => '43_5',
    'Card 5 - Card 6' => '43_6',
    'Card 5 - Card 7' => '43_7',
    'Card 5 - Card 8' => '43_8',
    'Card 5 - Card 9' => '43_9',
    'Card 5 - Card 10' => '43_10',
    'Card 6 - Card A' => '44_1',
    'Card 6 - Card 2' => '44_2',
    'Card 6 - Card 3' => '44_3',
    'Card 6 - Card 4' => '44_4',
    'Card 6 - Card 5' => '44_5',
    'Card 6 - Card 6' => '44_6',
    'Card 6 - Card 7' => '44_7',
    'Card 6 - Card 8' => '44_8',
    'Card 6 - Card 9' => '44_9',
    'Card 6 - Card 10' => '44_10'
);
$result_list = explode("#", $remark);
foreach ($result_list as $key_main => $val) {
$spit_list = explode("  ", $val);
    if ($key_main == 0) {
        foreach ($spit_list as $key => $val) {
        $card_no_odd = "Odd Card " . ($key + 1);
            $card_no_even = "Even Card " . ($key + 1);
            if ($val == "Even") {
                $keyss_back = $marketData[$card_no_even];
                $market_id[$keyss_back] = 'Back';
                $keyss_lay = $marketData[$card_no_odd];
                $market_id[$keyss_lay] = 'Lay';
                
            }
            if ($val == "Odd") {
                $keyss_back = $marketData[$card_no_even];
                $market_id[$keyss_back] = 'Lay';
                $keyss_lay = $marketData[$card_no_odd];
                $market_id[$keyss_lay] = 'Back';
            }
            
            
        }
    } else if ($key_main == 1) {
        foreach ($spit_list as $key => $val) {
        $card_no_red = "Red Card " . ($key + 1);
            $card_no_black = "Black Card " . ($key + 1);
            if ($val == "Red") {
                $keyss_back = $marketData[$card_no_red];
                $market_id[$keyss_back] = 'Back';
                $keyss_lay = $marketData[$card_no_black];
                $market_id[$keyss_lay] = 'Lay';
                
            }
            if ($val == "Black") {
                $keyss_back = $marketData[$card_no_red];
                $market_id[$keyss_back] = 'Lay';
                $keyss_lay = $marketData[$card_no_black];
                $market_id[$keyss_lay] = 'Back';
            }
            
            
        }
    }  else if ($key_main == 2) {
        foreach ($spit_list as $key => $val) {
        $card_no_low = "Low Card " . ($key + 1);
            $card_no_high = "High Card " . ($key + 1);
            if ($val == "Low") {
                $keyss_back = $marketData[$card_no_low];
                $market_id[$keyss_back] = 'Back';
                $keyss_lay = $marketData[$card_no_high];
                $market_id[$keyss_lay] = 'Lay';
                
            }
            if ($val == "High") {
                $keyss_back = $marketData[$card_no_low];
                $market_id[$keyss_back] = 'Lay';
                $keyss_lay = $marketData[$card_no_high];
                $market_id[$keyss_lay] = 'Back';
            }
            
            
        }
    } else if ($key_main == 3) {
        foreach ($spit_list as $key => $val) {
          
            $nn=$val;
            if($nn == "1"){
                $nn="A";
            }
            $card_no="Card ".($key+1)." - Card ".$nn;
            $keyss_back = $marketData[$card_no];
            $market_id[$keyss_back] = 'Back';
            
        }
    }  else if ($key_main == 4) {
        if (strpos($val, "Baccarat 1") !== false) { 
            $market_id[37] = 'Back';
        }
        if (strpos($val, "Baccarat 2") !== false) { 
            $market_id[38] = 'Back';
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