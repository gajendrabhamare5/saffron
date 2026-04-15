<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("error_display", 1);
ini_set("error_startup_display", 1);

$data123 ='{"t1":{"rid":"5900684815086","mtime":"6/18/2021 9:50:28 AM","ename":"32 Cards B","rdesc":"Player 9#8 : Odd  |  9 : Even~10 : Odd  |  11 : Even#2-2#8-9#2","card":"7DD,10DD,7SS,8SS,1,10HH,1,10SS,1,6HH,1,6SS,1,KHH,1,8CC,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1","winnat":"Player 9","win":"2","gtype":"card32eu"},"t2":null}';
$data_original = $data123;
$data = json_decode($data123);

$result_array = $data->t1;



$rdesc = $result_array->rdesc;


$game_type = $result_array->gtype;
$mid = $result_array->rid;
$bet_final_result = $result_array->winnat;
$result = $result_array->win;


$cards3 = $result_array->card;
$cards3 = '["'.$cards3.'"]';
$cards2 = '["'.$cards3.'"]';
$cards3 = str_replace(',','","',$cards3);

$event_type = "32CARDSB";

$result_time = date("Y-m-d H:i:s");
$market_ids = array();

$bet_final_result = '';
if ($result == 1) {
    $result_status = '8';
    $bet_final_result = 'Player 8';
    $market_id = 1;
} else if ($result == "CAN") {
    $get_all_bet1 = $conn->query("select * from bet_teen_details where event_id='$mid' and bet_status=1 and event_type='$event_type'");
    while ($fetch_get_all_bet1 = mysqli_fetch_assoc($get_all_bet1)) {
        $bet_id = $fetch_get_all_bet1['bet_id'];
        $update_bet = $conn->query("update bet_teen_details set bet_status=2,bet_result='0',bet_win_amount='0' where bet_id='$bet_id' and bet_status=1");

        $conn->query("delete from accounts where bet_id='$bet_id' and game_type=1");
        $conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
    }
} else if ($result == 2) {
    $result_status = '9';
    $bet_final_result = 'Player 9';
    $market_id = 2;
} else if ($result == 3) {
    $result_status = '10';
    $bet_final_result = 'Player 10';
    $market_id = 3;
} else if ($result == 4) {
    $result_status = '11';
    $bet_final_result = 'Player 11';
    $market_id = 4;
}

/* echo "market_id - $market_id";
echo "select * from twenty_teenpatti_result where event_id='$mid' and game_type='$game_type'";
$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid' and game_type='$game_type'");
$row_count = mysqli_fetch_row($check_result_already_insert);
if($row_count != 0){
	echo "already inserted";
	
}


$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$rdesc','$data_original')");
echo "market_id";
  */
 
 
 
 
$rdesc = str_replace(" ","",$rdesc);
$rdesc_array = explode("#",$rdesc);



$is_even_odd = $rdesc_array[1];
$is_red = $rdesc_array[2];
$is_10_11 = $rdesc_array[3];
$is_card = $rdesc_array[4];



$is_even_odd_array1 = explode("~",$is_even_odd);

foreach($is_even_odd_array1 as $is_even_dd){
	
	if($i == 0){
		$is_even_odd_array = explode("|",$is_even_dd);
			if($is_even_odd_array != null){
				foreach($is_even_odd_array as $even_odd){
					$even_odd_array = explode(":",$even_odd);
					if($even_odd_array != null){
						$winner_side = $even_odd_array[0];
						$winner_type = $even_odd_array[1];
						if($winner_side == "8"){
							if($winner_type == "Even"){
								 $market_ids[] = 6;
								$bet_final_result .= ' | 8:Even';
							}
							else{
								$market_ids[] = 5;
								$bet_final_result .= ' | 8:Odd';
							}
						}
						else if($winner_side == "9"){
							if($winner_type == "Even"){
								$market_ids[] = 8;
								$bet_final_result .= ' | 9:Even';
							}
							else{
								$market_ids[] = 7;
								$bet_final_result .= ' | 9:Odd';
							}
						}
						else if($winner_side == "10"){
							if($winner_type == "Even"){
								 $market_ids[] = 10;
								$bet_final_result .= ' | 10:Even';
							}
							else{
								$market_ids[] = 9;
								$bet_final_result .= ' | 10:Even';
							}
						}
						else{
							if($winner_type == "Even"){
								 $market_ids[] = 12;
								$bet_final_result .= ' | 11:Even';
							}
							else{
								$market_ids[] = 11;
								$bet_final_result .= ' | 11:Even';
							}
						}
					}
				}
			}
	}
}

echo "<pre>";
print_r($market_ids);
echo "</pre>";
exit();
if($is_10_11 == "10-11"){
	 $market_ids[] = 26;
}
else{
	 $market_ids[] = 25;
}

if($is_red == "Red"){
	$market_id_c = 14;
}
else if($is_red == "Black"){
	  $market_id_c = 13;
}
else{
	 $market_id_c = 27;
}


$check_single_bet = is_current_card($is_card);
$market_ids[] = $check_single_bet;
echo "select * from bet_teen_details where event_id='$mid' and event_type='$event_type' and bet_status=1";



$end_date_time = date("Y-m-d H:i:s");
$transaction_time = date("Y-m-d H:i:s");
$transaction_time2 = date("d-m-Y H:i:s");

$get_all_bet = $conn->query("select * from bet_teen_details where event_id='$mid' and event_type='$event_type' and bet_status=1");
while ($fetch_get_all_bet = mysqli_fetch_assoc($get_all_bet)) {
	echo "123";
    echo $bet_id = $fetch_get_all_bet['bet_id'];
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

    if ($bet_market_id <= 4) {
        if ($bet_market_id == $market_id and $bet_type == "Back") {
            set_result($conn, $bet_id, "Win", $mid, $end_date_time,$bet_final_result);
        } else if ($bet_market_id != $market_id and $bet_type == "Lay") {
            set_result($conn, $bet_id, "Win", $mid, $end_date_time,$bet_final_result);
        } else {
            set_result($conn, $bet_id, "Loss", $mid, $end_date_time,$bet_final_result);
        }
    }


    if ($bet_market_id == 13 or $bet_market_id == 14 or $bet_market_id == 27) {
        if ($bet_market_id == $market_id_c and $bet_type == "Back") {
            set_result($conn, $bet_id, "Win", $mid, $end_date_time,$bet_final_result);
        } else if ($bet_market_id != $market_id_c and $bet_type == "Lay") {
            set_result($conn, $bet_id, "Win", $mid, $end_date_time,$bet_final_result);
        } else {
            set_result($conn, $bet_id, "Loss", $mid, $end_date_time,$bet_final_result);
        }
    }

    if (($bet_market_id >= 5 and $bet_market_id <= 12) or ( $bet_market_id >= 15 and $bet_market_id <= 26)) {
        if (in_array($bet_market_id, $market_ids)) {
            $user_amount = $actual_win_amount2;
            $smdl_amount = -$actual_win_amount2;

            $bet_result = ($bet_odds - 1 ) * $bet_stack;
            $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$bet_result',bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1");
            
            if($conn->affected_rows > 0){
				$transaction_id = $bet_id.'-'.$bet_user_id;
				
				$account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$bet_result','Credit','4','$transaction_time','1',1,'$transaction_id')");

				$level_pers = get_level_per($conn, $bet_user_id);
				foreach ($level_pers as $debit_user_id => $level_per) {

					$debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
				
					$transaction_id = $bet_id.'-'.$debit_user_id;

					$account_descriptionSMDL = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
					$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')");
				}
            }
        } else {


            $bet_winning_amount22 = ($bet_odds - 1 ) * $bet_stack;
            $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='-$bet_stack',bet_final_result='$bet_final_result'  where bet_id='$bet_id' and bet_status=1");
			if($conn->affected_rows > 0){
				$transaction_id = $bet_id.'-'.$bet_user_id;
			
				$account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','-$bet_stack','Debit','7','$transaction_time','1',1,'$transaction_id')");

				$level_pers = get_level_per($conn, $bet_user_id);
				foreach ($level_pers as $cradit_user_id => $level_per) {

					$cradit_amt = ($bet_amount / 100) * $level_per;
				
					$transaction_id = $bet_id.'-'.$cradit_user_id;

					$account_descriptionSMDL = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
					$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')");
				}
            }
        }
    }
}

function set_result($conn, $bet_id, $result_status, $mid, $end_date_time,$bet_final_result='') {


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
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$actual_win_amount2','Credit','4','$transaction_time','1',1,'$transaction_id')");

			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $debit_user_id => $level_per) {

				$debit_amt = 0 - (($actual_win_amount2 / 100) * $level_per);
				
				$transaction_id = $bet_id.'-'.$debit_user_id;

				$account_descriptionSMDL = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$debit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$debit_amt','Debit','7','$transaction_time','1',1,'$transaction_id')");
			}
        }
    } else if ($result_status == 'Loss') {
        echo "loss";
        $bet_winning_amount22 = $bet_winning_amount - $bet_amount;
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$user_amount' ,bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1");

		if($conn->affected_rows > 0){
			$transaction_id = $bet_id.'-'.$bet_user_id;
			$account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");

			$level_pers = get_level_per($conn, $bet_user_id);
			foreach ($level_pers as $cradit_user_id => $level_per) {

				$cradit_amt = ($bet_amount / 100) * $level_per;
				
				$transaction_id = $bet_id.'-'.$cradit_user_id;

				$account_descriptionSMDL = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
				$insert_user_accountSMDL = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$cradit_user_id','$bet_user_id','$account_descriptionSMDL','$bet_id','$mid','$cradit_amt','Credit','4','$transaction_time','1',1,'$transaction_id')");
			}
        }
    }
    return true;
}

$conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
echo "done";

function is_current_card($card) {
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

    return $rank + 14;
}
?>