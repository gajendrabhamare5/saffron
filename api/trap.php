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
    'Card 1 - High' => '3_1',
    'Card 1 - Low' => '3_2',
    'Card 1 - JQK' => '17_3',
    'Card 2 - High' => '4_1',
    'Card 2 - Low' => '4_2',
    'Card 2 - JQK' => '18_3',
    'Card 3 - High' => '5_1',
    'Card 3 - Low' => '5_2',
    'Card 3 - JQK' => '19_3',
    'Card 4 - High' => '6_1',
    'Card 4 - Low' => '6_2',
    'Card 4 - JQK' => '20_3',
    'Card 5 - High' => '7_1',
    'Card 5 - Low' => '7_2',
    'Card 5 - JQK' => '21_3',
    'Card 6 - High' => '8_1',
    'Card 6 - Low' => '8_2',
    'Card 6 - JQK' => '22_3',
    'Card 7 - High' => '9_1',
    'Card 7 - Low' => '9_2',
    'Card 7 - JQK' => '23_3',
    'Card 8 - High' => '10_1',
    'Card 8 - Low' => '10_2',
    'Card 8 - JQK' => '24_3',
    'Card 9 - High' => '11_1',
    'Card 9 - Low' => '11_2',
    'Card 9 - JQK' => '25_3',
    'Card 10 - High' => '12_1',
    'Card 10 - Low' => '12_2',
    'Card 10 - JQK' => '26_3',
    'Card 11 - High' => '13_1',
    'Card 11 - Low' => '13_2',
    'Card 11 - JQK' => '27_3',
    'Card 12 - High' => '14_1',
    'Card 12 - Low' => '14_2',
    'Card 12 - JQK' => '28_3',
    'Card 13 - High' => '15_1',
    'Card 13 - Low' => '15_2',
    'Card 13 - JQK' => '29_3',
    'Card 14 - High' => '16_1',
    'Card 14 - Low' => '16_2',
    'Card 14 - JQK' => '30_3'
);

$event_type = "TRAP";

$market_id = array();
$winner_cards_id = array();
$result_time = date("Y-m-d H:i:s");
$market_id[] = $result;
$result_list=explode("#",$remark);

foreach($result_list as $key_main=>$val){

    if($key_main == 1){
        $spit_list=explode(",",$val);
      
        foreach($spit_list as $key=>$val){
            
            $card_no="Card ".($key+1)." - ".$val;
            if(array_key_exists($card_no,$marketData)){
                $market_id[] = $marketData[$card_no];
            }
        }
    }
}
$jqk_result=$result_list[2];
$jqk_result=explode(",",$jqk_result);
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
        $bet_market_name_new=explode(" - ",$bet_market_name);
        if($bet_market_name_new[1]=="JQK"){
            $bet_market_name_new=explode(" ",$bet_market_name_new[0]);
            $get_result=($bet_market_name_new[1] - 1);
            if($bet_type == "Back"){
                $bet_type_new="Yes"; 
            }
            if($bet_type == "Lay"){
                $bet_type_new="No"; 
            }
            if(isset($jqk_result[$get_result])){
                $result_market_id = $marketData[$bet_market_name];
                if($jqk_result[$get_result] == $bet_type_new && $result_market_id == $bet_market_id){
                    $winner_flag=true; 
                }
            }
        }else{
            if (in_array($bet_market_id, $market_id)){
                $winner_flag=true; 
            }
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