<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$data_original = file_get_contents("php://input");
$data = json_decode($data_original);

$result_array = $data->t1;



$remark = $result_array->rdesc;


$game_type = $result_array->gtype;
$mid = $result_array->rid;
$bet_final_result = $result_array->winnat;
$result = $result_array->win;


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

//$get_data = json_decode($get_data);

$event_type = "OPENTEENPATTI";

$market_id = array();
$winner_cards_id = array();
$result_time = date("Y-m-d H:i:s");

$result_status = $result;

$marketMap = array(
    'Player 1' => 1,
    'Player 2' => 2,
    'Player 3' => 3,
    'Player 4' => 4,
    'Player 5' => 5,
    'Player 6' => 6,
    'Player 7' => 7,
    'Player 8' => 8,
    '1' => 9,
    '2' => 10,
    '3' => 11,
    '4' => 12,
    '5' => 13,
    '6' => 14,
    '7' => 15,
    '8' => 16,
    'Total 1' => 17,
    'Total 2' => 18,
    'Total 3' => 19,
    'Total 4' => 20,
    'Total 5' => 21,
    'Total 6' => 22,
    'Total 7' => 23,
    'Total 8' => 24,
    'Any Colour' => 25,
    'Any Straight' => 26,
    'Any Trio' => 27,
    'Any Straight Flush' => 28,
);


$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$remark','$data_original')");
/* if($row_count > 0){
  echo "ok";
  exit();
  } */

  
if(!empty($result)){
	$players = explode(",", $result);
    foreach($players as $val){
        $key="Player ".$val;
        if($marketMap[$key]){
            $market_id[]=$marketMap[$key];
        }
    }
}

$results=explode("#",$remark);
if(!empty($results[1])){
    $pair_result=$results[1];
    $pair_result_list = explode(" | ", $pair_result);
    foreach($pair_result_list as $val){
        $pair_result_list1 = explode(" : ", $val);
        $key="".$pair_result_list1[0];
        if($marketMap[$key]){
            $market_id[]=$marketMap[$key];
        }
    }
}
if(!empty($results[2])){
    $total_result=str_replace("~"," | ",$results[2]);
    preg_match_all('/([^|:]+)\s*:\s*(\d+)/', $total_result, $matches);

    // Clean keys and cast values to integers
    $keys = array_map('trim', $matches[1]);
    $values = array_map('intval', $matches[2]);

    // Create associative array
    $data = array_combine($keys, $values);

    // Get Dealer's value
    $dealerValue = isset($data['Dealer']) ? $data['Dealer'] : 0;

    // Filter out entries where value > dealer and key != Dealer
    $result = array_filter(
        $data,
        function($value, $key) use ($dealerValue) {
            return $key !== 'Dealer' && $value > $dealerValue;
        },
        ARRAY_FILTER_USE_BOTH
    );
    $players_total = array_keys($result);
    foreach($players_total as $val){
        $key="Total ".$val;
        if($marketMap[$key]){
            $market_id[]=$marketMap[$key];
        }
    }
}

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

function is_trio($card11, $card22, $card33, $cards) {

    $card1 = $cards->$card11;
    $card2 = $cards->$card22;
    $card3 = $cards->$card33;

    if ($card1['name'] == $card2['name'] && $card2['name'] == $card3['name']) {
        return true;
    } else {
        return false;
    }
}

function is_straight_flush($card11, $card22, $card33, $cards) {
    $card1 = $cards->$card11;
    $card2 = $cards->$card22;
    $card3 = $cards->$card33;

    if ($card1['type'] == $card2['type'] && $card2['type'] == $card3['type']) {
        if (($card2['rank'] - $card3['rank'] == 1) && ($card1['rank'] - $card2['rank'] == 1)) {
            return true;
        } else if (($card3['rank'] - $card2['rank'] == 1) && ($card1['rank'] - $card3['rank'] == 1)) {
            return true;
        } else if (($card3['rank'] - $card1['rank'] == 1) && ($card2['rank'] - $card3['rank'] == 1)) {
            return true;
        } else if (($card1['rank'] - $card3['rank'] == 1) && ($card2['rank'] - $card1['rank'] == 1)) {
            return true;
        } else if (($card2['rank'] - $card1['rank'] == 1) && ($card3['rank'] - $card2['rank'] == 1)) {
            return true;
        } else if (($card1['rank'] - $card2['rank'] == 1) && ($card3['rank'] - $card1['rank'] == 1)) {
            return true;
        } else if (($card2['priority'] - $card3['priority'] == 1) && ($card1['priority'] - $card2['priority'] == 1)) {
            return true;
        } else if (($card3['priority'] - $card2['priority'] == 1) && ($card1['priority'] - $card3['priority'] == 1)) {
            return true;
        } else if (($card3['priority'] - $card1['priority'] == 1) && ($card2['priority'] - $card3['priority'] == 1)) {
            return true;
        } else if (($card1['priority'] - $card3['priority'] == 1) && ($card2['priority'] - $card1['priority'] == 1)) {
            return true;
        } else if (($card2['priority'] - $card1['priority'] == 1) && ($card3['priority'] - $card2['priority'] == 1)) {
            return true;
        } else if (($card1['priority'] - $card2['priority'] == 1) && ($card3['priority'] - $card1['priority'] == 1)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function is_flush($card11, $card22, $card33, $cards) {
    $card1 = $cards->$card11;
    $card2 = $cards->$card22;
    $card3 = $cards->$card33;
    if (($card2['rank'] - $card3['rank'] == 1) && ($card1['rank'] - $card2['rank'] == 1)) {
        return true;
    } else if (($card3['rank'] - $card2['rank'] == 1) && ($card1['rank'] - $card3['rank'] == 1)) {
        return true;
    } else if (($card3['rank'] - $card1['rank'] == 1) && ($card2['rank'] - $card3['rank'] == 1)) {
        return true;
    } else if (($card1['rank'] - $card3['rank'] == 1) && ($card2['rank'] - $card1['rank'] == 1)) {
        return true;
    } else if (($card2['rank'] - $card1['rank'] == 1) && ($card3['rank'] - $card2['rank'] == 1)) {
        return true;
    } else if (($card1['rank'] - $card2['rank'] == 1) && ($card3['rank'] - $card1['rank'] == 1)) {
        return true;
    } else if (($card2['priority'] - $card3['priority'] == 1) && ($card1['priority'] - $card2['priority'] == 1)) {
        return true;
    } else if (($card3['priority'] - $card2['priority'] == 1) && ($card1['priority'] - $card3['priority'] == 1)) {
        return true;
    } else if (($card3['priority'] - $card1['priority'] == 1) && ($card2['priority'] - $card3['priority'] == 1)) {
        return true;
    } else if (($card1['priority'] - $card3['priority'] == 1) && ($card2['priority'] - $card1['priority'] == 1)) {
        return true;
    } else if (($card2['priority'] - $card1['priority'] == 1) && ($card3['priority'] - $card2['priority'] == 1)) {
        return true;
    } else if (($card1['priority'] - $card2['priority'] == 1) && ($card3['priority'] - $card1['priority'] == 1)) {
        return true;
    } else {
        return false;
    }
}

function is_color($card11, $card22, $card33, $cards) {
    $card1 = $cards->$card11;
    $card2 = $cards->$card22;
    $card3 = $cards->$card33;
    if ($card1['type'] == $card2['type'] && $card2['type'] == $card3['type']) {
        return true;
    } else {
        
    }
}

function is_pair($card11, $card22, $card33, $cards) {
    $card1 = $cards->$card11;
    $card2 = $cards->$card22;
    $card3 = $cards->$card33;
    if ($card1['name'] == $card2['name'] || $card1['name'] == $card3['name']) {
        return true;
    } else if ($card2['name'] == $card1['name'] || $card2['name'] == $card3['name']) {
        return true;
    } else if ($card3['name'] == $card2['name'] || $card3['name'] == $card1['name']) {
        return true;
    } else {
        return false;
    }
}

?>