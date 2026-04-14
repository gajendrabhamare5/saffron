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
$cards3 = '["'.$cards3.'"]';
$cards3 = str_replace(',','","',$cards3);
$cards = $cards3;
$cards2 =$cards3;

$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid' and game_type='$game_type'");
$row_count = mysqli_num_rows($check_result_already_insert);
if($row_count > 0){
	echo "already inserted";
	exit();
}

$marketData = array(
    'Card 1 - Spade' => '3_1',
    'Card 1 - Diamond' => '3_2',
    'Card 1 - Club' => '3_3',
    'Card 1 - Heart' => '3_4',
    'Card 1 - Odd' => '13_1',
    'Card 1 - Even' => '13_2',
    'Card 1 - Card A' => '19_1',
    'Card 1 - Card 2' => '19_2',
    'Card 1 - Card 3' => '19_3',
    'Card 1 - Card 4' => '19_4',
    'Card 1 - Card 5' => '19_5',
    'Card 1 - Card 6' => '19_6',
    'Card 1 - Card 7' => '19_7',
    'Card 1 - Card 8' => '19_8',
    'Card 1 - Card 9' => '19_9',
    'Card 1 - Card 10' => '19_10',
    'Card 1 - Card J' => '19_11',
    'Card 1 - Card Q' => '19_12',
    'Card 1 - Card K' => '19_13',
    'Card 2 - Spade' => '4_1',
    'Card 2 - Diamond' => '4_2',
    'Card 2 - Club' => '4_3',
    'Card 2 - Heart' => '4_4',
    'Card 2 - Odd' => '14_1',
    'Card 2 - Even' => '14_2',
    'Card 2 - Card A' => '20_1',
    'Card 2 - Card 2' => '20_2',
    'Card 2 - Card 3' => '20_3',
    'Card 2 - Card 4' => '20_4',
    'Card 2 - Card 5' => '20_5',
    'Card 2 - Card 6' => '20_6',
    'Card 2 - Card 7' => '20_7',
    'Card 2 - Card 8' => '20_8',
    'Card 2 - Card 9' => '20_9',
    'Card 2 - Card 10' => '20_10',
    'Card 2 - Card J' => '20_11',
    'Card 2 - Card Q' => '20_12',
    'Card 2 - Card K' => '20_13',
    'Card 3 - Spade' => '5_1',
    'Card 3 - Diamond' => '5_2',
    'Card 3 - Club' => '5_3',
    'Card 3 - Heart' => '5_4',
    'Card 3 - Odd' => '15_1',
    'Card 3 - Even' => '15_2',
    'Card 3 - Card A' => '21_1',
    'Card 3 - Card 2' => '21_2',
    'Card 3 - Card 3' => '21_3',
    'Card 3 - Card 4' => '21_4',
    'Card 3 - Card 5' => '21_5',
    'Card 3 - Card 6' => '21_6',
    'Card 3 - Card 7' => '21_7',
    'Card 3 - Card 8' => '21_8',
    'Card 3 - Card 9' => '21_9',
    'Card 3 - Card 10' => '21_10',
    'Card 3 - Card J' => '21_11',
    'Card 3 - Card Q' => '21_12',
    'Card 3 - Card K' => '21_13',
    'Card 4 - Spade' => '6_1',
    'Card 4 - Diamond' => '6_2',
    'Card 4 - Club' => '6_3',
    'Card 4 - Heart' => '6_4',
    'Card 4 - Odd' => '16_1',
    'Card 4 - Even' => '16_2',
    'Card 4 - Card A' => '22_1',
    'Card 4 - Card 2' => '22_2',
    'Card 4 - Card 3' => '22_3',
    'Card 4 - Card 4' => '22_4',
    'Card 4 - Card 5' => '22_5',
    'Card 4 - Card 6' => '22_6',
    'Card 4 - Card 7' => '22_7',
    'Card 4 - Card 8' => '22_8',
    'Card 4 - Card 9' => '22_9',
    'Card 4 - Card 10' => '22_10',
    'Card 4 - Card J' => '22_11',
    'Card 4 - Card Q' => '22_12',
    'Card 4 - Card K' => '22_13',
    'Card 5 - Spade' => '7_1',
    'Card 5 - Diamond' => '7_2',
    'Card 5 - Club' => '7_3',
    'Card 5 - Heart' => '7_4',
    'Card 5 - Odd' => '17_1',
    'Card 5 - Even' => '17_2',
    'Card 5 - Card A' => '23_1',
    'Card 5 - Card 2' => '23_2',
    'Card 5 - Card 3' => '23_3',
    'Card 5 - Card 4' => '23_4',
    'Card 5 - Card 5' => '23_5',
    'Card 5 - Card 6' => '23_6',
    'Card 5 - Card 7' => '23_7',
    'Card 5 - Card 8' => '23_8',
    'Card 5 - Card 9' => '23_9',
    'Card 5 - Card 10' => '23_10',
    'Card 5 - Card J' => '23_11',
    'Card 5 - Card Q' => '23_12',
    'Card 5 - Card K' => '23_13',
    'Card 6 - Spade' => '8_1',
    'Card 6 - Diamond' => '8_2',
    'Card 6 - Club' => '8_3',
    'Card 6 - Heart' => '8_4',
    'Card 6 - Odd' => '18_1',
    'Card 6 - Even' => '18_2',
    'Card 6 - Card A' => '24_1',
    'Card 6 - Card 2' => '24_2',
    'Card 6 - Card 3' => '24_3',
    'Card 6 - Card 4' => '24_4',
    'Card 6 - Card 5' => '24_5',
    'Card 6 - Card 6' => '24_6',
    'Card 6 - Card 7' => '24_7',
    'Card 6 - Card 8' => '24_8',
    'Card 6 - Card 9' => '24_9',
    'Card 6 - Card 10' => '24_10',
    'Card 6 - Card J' => '24_11',
    'Card 6 - Card Q' => '24_12',
    'Card 6 - Card K' => '24_13'
);

$event_type = "TEEN6";

$market_id = array();
$winner_cards_id = array();
$result_time = date("Y-m-d H:i:s");
$market_id[] = $result;


if (strpos($remark, "A : Over 22") !== false) { 
    $market_id[] = 10;
}
if (strpos($remark, "A : Under 21") !== false) { 
    $market_id[] = 9;
}
if (strpos($remark, "B : Over 22") !== false) { 
    $market_id[] = 12;
}
if (strpos($remark, "B : Under 21") !== false) { 
    $market_id[] = 11;
}

$result_list=explode("#",$remark);

foreach($result_list as $key_main=>$val){

    if($key_main != 0 && $key_main != 4){
        $spit_list=explode("  ",$val);
      
        foreach($spit_list as $key=>$val){
            
            $card_no="Card ".($key+1)." - ".$val;
            if($key_main == "3"){
                $card_no="Card ".($key+1)." - Card ".$val;
            }
            if(array_key_exists($card_no,$marketData)){
                $market_id[] = $marketData[$card_no];
            }
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
$bet_final_result = 'Winner - '.$bet_final_result;

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
    $winner_flag=false;
    if ((int)$bet_market_id <= 2) {
		if (in_array($bet_market_id, $market_id) and $bet_type == "Back") {
			$winner_flag=true;
		} else if (!in_array($bet_market_id, $market_id) and $bet_type == "Lay") {
			$winner_flag=true;
		}
	}else{
        if (in_array($bet_market_id, $market_id)){
            $winner_flag=true; 
        }
    }

    if ($winner_flag) {

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