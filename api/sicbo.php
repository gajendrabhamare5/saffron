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

//$get_data = json_decode($get_data);

$event_type = "SICBO";

$market_id = array();
$winner_cards_id = array();
$result_time = date("Y-m-d H:i:s");
$market_id[] = $result;
if (strpos($remark, "Under 21") !== false) {
    $market_id[] = 3;
}
if (strpos($remark, "Over 21") !== false) {
    $market_id[] = 4;
}
$return_odds = 0;
$return_odds2 = 0;
$cards2 = json_decode($cards2);
$card2 = $cards2;


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
    $bet_odds = $bet_odds - 1;
    $run = $fetch_get_all_bet['bet_odds'];
    $bet_stack = $fetch_get_all_bet['bet_stack'];
    $stack = $fetch_get_all_bet['bet_stack'];
    $bet_winning_amount = $fetch_get_all_bet['bet_win_amount'];
    $actual_win_amount2 = $bet_winning_amount;
    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];

    $winStatus=false;
    if(count(array_unique($cards2)) != 1 and $bet_market_id == "1" and (int)$result_status  >=4 and (int)$result_status  <= 10 ){
        $winStatus=true;
    }
    else if(count(array_unique($cards2)) != 1 and $bet_market_id == "2" and (int)$result_status  >=11 and (int)$result_status  <= 17 ){
        $winStatus=true;
    }  
    else if(count(array_unique($cards2)) == 1 and $bet_market_id == "3"){
         $actual_win_amount2 = ($bet_stack) * 29;
        $winStatus=true;
    }
    else if(checkEvenOrOdd((int)$result_status) == $bet_market_id){
        $winStatus=true;
    }
    /* else if((count(array_unique($cards2)) == 2 || count(array_unique($cards2)) == 1) and (int)$bet_market_id >= 6 and (int)$bet_market_id <= 11){
        $winStatus=true;
    } */
    else if((int)$bet_market_id == 6 and in_array("1",$cards2)){
        if(array_count_values($card2)['1'] >= 2){
            $actual_win_amount2 = ($bet_stack) * 7;
            $winStatus=true;
        }
        
    }
    else if((int)$bet_market_id == 7 and in_array("2",$cards2)){
        if(array_count_values($card2)['2'] >= 2){
            $actual_win_amount2 = ($bet_stack) * 7;
            $winStatus=true;
        }
        
    }
    else if((int)$bet_market_id == 8 and in_array("3",$cards2)){
        if(array_count_values($card2)['3'] >= 2){
            $actual_win_amount2 = ($bet_stack) * 7;
            $winStatus=true;
        }
        
    }
    else if((int)$bet_market_id == 9 and in_array("4",$cards2)){
        if(array_count_values($card2)['4'] >= 2){
            $actual_win_amount2 = ($bet_stack) * 7;
            $winStatus=true;
        }
        
    }
    else if((int)$bet_market_id == 10 and in_array("5",$cards2)){
        if(array_count_values($card2)['5'] >= 2){
            $actual_win_amount2 = ($bet_stack) * 7;
            $winStatus=true;
        }
        
    }
    else if((int)$bet_market_id == 11 and in_array("6",$cards2)){
        if(array_count_values($card2)['6'] >= 2){
            $actual_win_amount2 = ($bet_stack) * 7;
            $winStatus=true;
        }
        
    }
    /* else if(count(array_unique($cards2)) == 1 and (int)$bet_market_id >= 12 and (int)$bet_market_id <= 17){
        $winStatus=true;
    } */
    else if((int)$bet_market_id == 12 and in_array("1",$cards2)){
        if(array_count_values($card2)['1'] == 3){
            $actual_win_amount2 = ($bet_stack) * 149;
            $winStatus=true;
        }
        
    }
    else if((int)$bet_market_id == 13 and in_array("2",$cards2)){
        if(array_count_values($card2)['2'] == 3){
            $actual_win_amount2 = ($bet_stack) * 149;
            $winStatus=true;
        }
        
    }
    else if((int)$bet_market_id == 14 and in_array("3",$cards2)){
        if(array_count_values($card2)['3'] == 3){
            $actual_win_amount2 = ($bet_stack) * 149;
            $winStatus=true;
        }
        
    }
    else if((int)$bet_market_id == 15 and in_array("4",$cards2)){
        if(array_count_values($card2)['4'] == 3){
            $actual_win_amount2 = ($bet_stack) * 149;
            $winStatus=true;
        }
        
    }
    else if((int)$bet_market_id == 16 and in_array("5",$cards2)){
        if(array_count_values($card2)['5'] == 3){
            $actual_win_amount2 = ($bet_stack) * 149;
            $winStatus=true;
        }
        
    }
    else if((int)$bet_market_id == 17 and in_array("6",$cards2)){
        if(array_count_values($card2)['6'] == 3){
            $actual_win_amount2 = ($bet_stack) * 149;
            $winStatus=true;
        }
        
    }
    /* else if((int)$bet_market_id >= 18 and (int)$bet_market_id <= 31 and (int)$result_status  >=4 and (int)$result_status  <= 17){
        $winStatus=true;
    } */
    else if((int)$bet_market_id == 18 and (int)$result_status  == 4){
         $actual_win_amount2 = ($bet_stack) * 49;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 19 and (int)$result_status  == 5){
         $actual_win_amount2 = ($bet_stack) * 19;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 20 and (int)$result_status  == 6){
         $actual_win_amount2 = ($bet_stack) * 14;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 21 and (int)$result_status  == 7){
         $actual_win_amount2 = ($bet_stack) * 11;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 22 and (int)$result_status  == 8){
          
        $actual_win_amount2 = ($bet_stack) * 7;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 23 and (int)$result_status  == 9){
         $actual_win_amount2 = ($bet_stack) * 5;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 24 and (int)$result_status  == 10){
        $actual_win_amount2 = ($bet_stack) * 5;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 25 and (int)$result_status  == 11){
        $actual_win_amount2 = ($bet_stack) * 5;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 26 and (int)$result_status  == 12){
         $actual_win_amount2 = ($bet_stack) * 5;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 27 and (int)$result_status  == 13){
         $actual_win_amount2 = ($bet_stack) * 7;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 28 and (int)$result_status  == 14){
         $actual_win_amount2 = ($bet_stack) * 11;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 29 and (int)$result_status  == 15){
         $actual_win_amount2 = ($bet_stack) * 14;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 30 and (int)$result_status  == 16){
         $actual_win_amount2 = ($bet_stack) * 19;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 31 and (int)$result_status  == 17){
         $actual_win_amount2 = ($bet_stack) * 49;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 32 and in_array("1",$cards2) and in_array("2",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 33 and in_array("1",$cards2) and in_array("3",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 34 and in_array("1",$cards2) and in_array("4",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 35 and in_array("1",$cards2) and in_array("5",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 36 and in_array("1",$cards2) and in_array("6",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 37 and in_array("2",$cards2) and in_array("3",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 38 and in_array("2",$cards2) and in_array("4",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 39 and in_array("2",$cards2) and in_array("5",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 40 and in_array("2",$cards2) and in_array("6",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 41 and in_array("3",$cards2) and in_array("4",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 42 and in_array("3",$cards2) and in_array("5",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 43 and in_array("3",$cards2) and in_array("6",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 44 and in_array("4",$cards2) and in_array("5",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 45 and in_array("4",$cards2) and in_array("6",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 46 and in_array("5",$cards2) and in_array("6",$cards2)){
        $actual_win_amount2 = ($bet_stack) * 4;
        $winStatus=true;
    }
    else if((int)$bet_market_id == 47 and in_array("1",$cards2)){
        if(array_count_values($card2)['1'] == 2){
            $actual_win_amount2 = ($bet_stack) * 2;
        }
        if(array_count_values($card2)['1'] == 3){
            $actual_win_amount2 = ($bet_stack) * 3;
        }
        $winStatus=true;
    }
    else if((int)$bet_market_id == 48 and in_array("2",$cards2)){
        if(array_count_values($card2)['2'] == 2){
            $actual_win_amount2 = ($bet_stack) * 2;
        }
        if(array_count_values($card2)['2'] == 3){
            $actual_win_amount2 = ($bet_stack) * 3;
        }
        $winStatus=true;
    }
    else if((int)$bet_market_id == 49 and in_array("3",$cards2)){
        if(array_count_values($card2)['3'] == 2){
            $actual_win_amount2 = ($bet_stack) * 2;
        }
        if(array_count_values($card2)['3'] == 3){
            $actual_win_amount2 = ($bet_stack) * 3;
        }
        $winStatus=true;
    }
    else if((int)$bet_market_id == 50 and in_array("4",$cards2)){
        if(array_count_values($card2)['4'] == 2){
            $actual_win_amount2 = ($bet_stack) * 2;
        }
        if(array_count_values($card2)['4'] == 3){
            $actual_win_amount2 = ($bet_stack) * 3;
        }
        $winStatus=true;
    }
    else if((int)$bet_market_id == 51 and in_array("5",$cards2)){
        if(array_count_values($card2)['5'] == 2){
            $actual_win_amount2 = ($bet_stack) * 2;
        }
        if(array_count_values($card2)['5'] == 3){
            $actual_win_amount2 = ($bet_stack) * 3;
        }
        $winStatus=true;
    }
    else if((int)$bet_market_id == 52 and in_array("6",$cards2)){
        if(array_count_values($card2)['6'] == 2){
            $actual_win_amount2 = ($bet_stack) * 2;
        }
        if(array_count_values($card2)['6'] == 3){
            $actual_win_amount2 = ($bet_stack) * 3;
        }
        $winStatus=true;
    }

    
    if ($winStatus) {

        /* if((int)$bet_market_id >= 47 and (int)$bet_market_id <= 52){
            if(count(array_unique($cards2)) == 2){
                $actual_win_amount2 = ($stack * ($runs)) * 2;
            }
            if(count(array_unique($cards2)) == 2){
                $actual_win_amount2 = ($stack * ($runs)) * 3;
            }
        } */
    
        $user_amount = $actual_win_amount2;
        $smdl_amount = -$actual_win_amount2;


        /* $bet_result = ($bet_odds - 1 ) * $bet_stack; */
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
        if($bet_market_id == "1" || $bet_market_id == "2" || $bet_market_id == "4" || $bet_market_id == "5" || ((int)$bet_market_id >= 47 and (int)$bet_market_id <= 52)){
            $bet_winning_amount22 = ($bet_odds) * $bet_stack;
        }
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

function checkEvenOrOdd($number) {
    if ($number % 2 == 0) {
        return "5";
    } else {
        return "4";
    }
}

?>