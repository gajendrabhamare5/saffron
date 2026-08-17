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

$event_type = "2020_DRAGON_TIGER2";


$result_time = date("Y-m-d H:i:s");
$market_id = array();

$bet_final_result = '';
if ($result == 1) {
    $result_status = 'D';
    $bet_final_result = 'Dragon';
    $market_id_fixed = 1;
} else if ($result == 2) {
    $result_status = 'T';
    $bet_final_result = 'Tiger';
    $market_id_fixed = 2;
} else  {
   /*  $get_all_bet1 = $conn->query("select * from bet_teen_details where event_id='$mid' and bet_status=1 and event_type='$event_type'");
    while ($fetch_get_all_bet1 = mysqli_fetch_assoc($get_all_bet1)) {
        $bet_id = $fetch_get_all_bet1['bet_id'];
        $update_bet = $conn->query("update bet_teen_details set bet_status=2,bet_result='0',bet_win_amount='0' where bet_id='$bet_id' and bet_status=1");

        $conn->query("delete from accounts where bet_id='$bet_id' and game_type=1");
        $conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
    } */
} 


$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid' and game_type='$game_type'");
$row_count = mysqli_fetch_row($check_result_already_insert);
if($row_count != 0){
	echo "already inserted";
	exit();
}





 $rdesc = str_replace(" ","",$rdesc);
$rdesc_array = explode("#",$rdesc);


$is_tie = $rdesc_array[0];
$is_pair = $rdesc_array[1];
$is_even_odd = $rdesc_array[2];
$is_red_black = $rdesc_array[3];
$card_number = $rdesc_array[4];

if($is_tie == "Tie"){
	$bet_final_result .=  'Tie';
	$market_id_fixed = 3;
	$result_status = "T";
}



$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$rdesc','$data_original')");

if ($is_pair == "No") {
    $bet_final_result .= '|No Pair';
}
else{
	$market_id[] = 4;
    $bet_final_result .= '|Pair';
	
}


$is_even_odd_array = explode("|",$is_even_odd);
if($is_even_odd_array != null){
	foreach($is_even_odd_array as $even_odd){
		$even_odd_array = explode(":",$even_odd);
		if($even_odd_array != null){
			$winner_side = $even_odd_array[0];
			$winner_type = $even_odd_array[1];
			if($winner_side == "D"){
				if($winner_type == "Even"){
					 $market_id[] = 5;
					$bet_final_result .= '*Even';
				}
				else{
					$market_id[] = 6;
					$bet_final_result .= '*Odd';
				}
			}
			else{
				if($winner_type == "Even"){
					 $market_id[] = 22;
					$bet_final_result .= '*Even';
				}
				else{
					$market_id[] = 23;
					$bet_final_result .= '*Odd';
				}
			}
		}
	}
}

$is_red_black_array = explode("|",$is_red_black);
if($is_red_black_array != null){
	foreach($is_red_black_array as $red_black){
		$red_black_array = explode(":",$red_black);
		if($red_black_array != null){
			$winner_side = $red_black_array[0];
			$winner_type = $red_black_array[1];
			if($winner_side == "D"){
				if($winner_type == "Red"){
					$market_id[] = 7;
					$bet_final_result .= '*Red';
				}
				else{
					$market_id[] = 8;
					$bet_final_result .= '*Black';
				}
			}
			else{
				if($winner_type == "Red"){
					 $market_id[] = 24;
					$bet_final_result .= '*Red';
				}
				else{
					$market_id[] = 25;
					$bet_final_result .= '*Black';
				}
			}
		}
	}
}


$card_number_array = explode("|",$card_number);
if($card_number_array != null){
	foreach($card_number_array as $card_number){
		$card_number_array1 = explode(":",$card_number);
		if($card_number_array1 != null){
			$winner_side = $card_number_array1[0];
			$winner_type = $card_number_array1[1];
			if($winner_side == "D"){
				$dragon_cards_type_id = cards_type_id($winner_type, 'dragon');
				$market_id[] = $dragon_cards_type_id;	
				$bet_final_result .= '|Card'.$winner_type;
			}
			else{
				$bet_final_result .= '|Card'.$winner_type;
				$tiger_cards_type_id = cards_type_id($winner_type, 'tiger');
				$market_id[] = $tiger_cards_type_id;
			}
		}
	}
	
}











$end_date_time = date("Y-m-d H:i:s");
$transaction_time = date("Y-m-d H:i:s");
$transaction_time2 = date("d-m-Y H:i:s");
echo "select * from bet_teen_details where event_id='$mid' and bet_status=1 and event_type='$event_type'";
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

    if ($bet_market_id == 1 or $bet_market_id == 2 or $bet_market_id == 3) {
        if ($bet_market_id == $market_id_fixed and $bet_type == "Back") {
            set_result($conn, $bet_id, "Win", $mid, $end_date_time,$event_type, $bet_final_result);
        } else if ($bet_market_id != $market_id_fixed and $bet_type == "Lay") {
            set_result($conn, $bet_id, "Win", $mid, $end_date_time,$event_type, $bet_final_result);
        } else {
            set_result($conn, $bet_id, "Loss", $mid, $end_date_time,$event_type, $bet_final_result);
        }
    }


    if ($bet_market_id >= 4) {


        if (in_array($bet_market_id, $market_id)) {



            $user_amount = $actual_win_amount2;
            $smdl_amount = -$actual_win_amount2;

            $bet_result = ($bet_odds - 1 ) * $bet_stack;
            $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$bet_result',bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1");
            
            if($conn->affected_rows > 0){
            	$transaction_id = $bet_id.'-'.$bet_user_id;
				$account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0)){
					$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$actual_win_amount2','Credit','4','$transaction_time','1',1,'$transaction_id')");
				}
				if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0))){
					$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$actual_win_amount2','Credit','4','$transaction_time','1',1,'$transaction_id')");
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
            $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='-$bet_stack',bet_final_result='$bet_final_result'  where bet_id='$bet_id' and bet_status=1");

			if($conn->affected_rows > 0){
				$transaction_id = $bet_id.'-'.$bet_user_id;
				$account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $bet_stack != 0)){
					$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_stack','Debit','7','$transaction_time','1',1,'$transaction_id')");
				}
				if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $bet_stack != 0))){
					$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_stack','Debit','7','$transaction_time','1',1,'$transaction_id')");
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
}

function set_result($conn, $bet_id, $result_status, $mid, $end_date_time,$event_type = '', $bet_final_result='') {


    $end_date_time = date("Y-m-d H:i:s");
    $transaction_time = $end_date_time;
    $transaction_time2 = $end_date_time;
    $get_bet_details = $conn->query("select * from bet_teen_details where bet_id=$bet_id and bet_status=1");
    $fetch_bet_details = mysqli_fetch_assoc($get_bet_details);
    $bet_user_id = $fetch_bet_details['user_id'];
    $bet_market_id = $fetch_bet_details['market_id'];
    $bet_market_name = $fetch_bet_details['market_name'];
    $bet_amount = $fetch_bet_details['bet_margin_used'];
    $bet_winning_amount = $fetch_bet_details['bet_win_amount'];
    $actual_win_amount2 = $bet_winning_amount;
    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
    //adjust account 

    if ($result_status == 'Win') {
        $actual_win_amount = $bet_winning_amount + $bet_amount;
        $actual_win_amount2 = $bet_winning_amount;
        $user_amount = $actual_win_amount2;
        $smdl_amount = -$actual_win_amount2;
    } else if ($result_status == 'Loss') {
        $actual_loss_amount = $bet_amount;
        $user_amount = -$actual_loss_amount;
        $smdl_amount = $actual_loss_amount;
    }

    if ($result_status == 'Win') {
        echo "Win";
        $user_amount = $actual_win_amount2;
        $smdl_amount = -$actual_win_amount2;

        $bet_result = $user_amount;

        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$bet_result',bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1");

		if($conn->affected_rows > 0){
			$transaction_id = $bet_id.'-'.$bet_user_id;
			$account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0)){
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$actual_win_amount2','Credit','4','$transaction_time','1',1,'$transaction_id')");
			}
			if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0))){
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$actual_win_amount2','Credit','4','$transaction_time','1',1,'$transaction_id')");
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
    } else if ($result_status == 'Loss') {
        echo "loss";
        $bet_winning_amount22 = $bet_winning_amount - $bet_amount;
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$user_amount',bet_final_result='$bet_final_result'  where bet_id='$bet_id' and bet_status=1");

		if($conn->affected_rows > 0){
			$transaction_id = $bet_id.'-'.$bet_user_id;
			$account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			if(INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0)){
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");
			}
			if(INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0))){
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");
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
    return true;
}

$conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");

echo "done";


function cards_type_id($card, $type_cards) {
		 if($card == "A" or $card == 1 or $card == "1"){
		$rank = 1;
	}
	else if($card == "K" or $card == 13 or $card == "13"){
		$rank = 13;
	}
	else if($card == "J" or $card == 11 or $card == "11"){
		$rank = 11;
	}
	else if($card == "Q" or $card == 12 or $card == "12"){
		$rank = 12;
	}
		else{
			$rank = $card;
		}
    if ($type_cards == "dragon") {

        $market_id = $rank + 8;
    } else {

        $market_id = $rank + 25;
    }
    return $market_id;
}

?>