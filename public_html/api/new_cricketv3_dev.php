<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$data_original = file_get_contents("php://input");
$data_original = '[{"cards":"","desc":"AUS : 65 | IND : 63","gtype":"cricketv3","mid":"41.2109111127593","sid":"","win":"1"},[{"ball":"0.1","cards":"6HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"1","run":"6","wkt":0},{"ball":"0.2","cards":"4HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"1","run":"4","wkt":0},{"ball":"0.3","cards":"KHH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"1","run":"0","wkt":1},{"ball":"0.4","cards":"10HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"1","run":"0","wkt":0},{"ball":"0.5","cards":"3HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"1","run":"3","wkt":0},{"ball":"0.6","cards":"2HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"1","run":"2","wkt":0},{"ball":"1.1","cards":"6HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"2","run":"6","wkt":0},{"ball":"1.2","cards":"10HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"2","run":"0","wkt":0},{"ball":"1.3","cards":"10HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"2","run":"0","wkt":0},{"ball":"1.4","cards":"KHH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"2","run":"0","wkt":1},{"ball":"1.5","cards":"KHH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"2","run":"0","wkt":1},{"ball":"1.6","cards":"2HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"2","run":"2","wkt":0},{"ball":"2.1","cards":"3HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"3","run":"3","wkt":0},{"ball":"2.2","cards":"10HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"3","run":"0","wkt":0},{"ball":"2.3","cards":"10HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"3","run":"0","wkt":0},{"ball":"2.4","cards":"KHH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"3","run":"0","wkt":1},{"ball":"2.5","cards":"2HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"3","run":"2","wkt":0},{"ball":"2.6","cards":"6HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"3","run":"6","wkt":0},{"ball":"3.1","cards":"10HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"4","run":"0","wkt":0},{"ball":"3.2","cards":"KHH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"4","run":"0","wkt":1},{"ball":"3.3","cards":"4HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"4","run":"4","wkt":0},{"ball":"3.4","cards":"AHH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"4","run":"1","wkt":0},{"ball":"3.5","cards":"KHH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"4","run":"0","wkt":1},{"ball":"3.6","cards":"2HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"4","run":"2","wkt":0},{"ball":"4.1","cards":"AHH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"5","run":"1","wkt":0},{"ball":"4.2","cards":"4HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"5","run":"4","wkt":0},{"ball":"4.3","cards":"AHH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"5","run":"1","wkt":0},{"ball":"4.4","cards":"6HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"5","run":"6","wkt":0},{"ball":"4.5","cards":"6HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"5","run":"6","wkt":0},{"ball":"4.6","cards":"6HH","gid":"41.2109111127593","inning":"1","nat":"AUS","over":"5","run":"6","wkt":0},{"ball":"0.1","cards":"AHH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"1","run":"1","wkt":0},{"ball":"0.2","cards":"10HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"1","run":"0","wkt":0},{"ball":"0.3","cards":"KHH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"1","run":"0","wkt":1},{"ball":"0.4","cards":"3HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"1","run":"3","wkt":0},{"ball":"0.5","cards":"AHH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"1","run":"1","wkt":0},{"ball":"0.6","cards":"10HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"1","run":"0","wkt":0},{"ball":"1.1","cards":"AHH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"2","run":"1","wkt":0},{"ball":"1.2","cards":"6HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"2","run":"6","wkt":0},{"ball":"1.3","cards":"KHH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"2","run":"0","wkt":1},{"ball":"1.4","cards":"10HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"2","run":"0","wkt":0},{"ball":"1.5","cards":"4HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"2","run":"4","wkt":0},{"ball":"1.6","cards":"6HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"2","run":"6","wkt":0},{"ball":"2.1","cards":"3HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"3","run":"3","wkt":0},{"ball":"2.2","cards":"3HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"3","run":"3","wkt":0},{"ball":"2.3","cards":"3HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"3","run":"3","wkt":0},{"ball":"2.4","cards":"AHH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"3","run":"1","wkt":0},{"ball":"2.5","cards":"3HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"3","run":"3","wkt":0},{"ball":"2.6","cards":"6HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"3","run":"6","wkt":0},{"ball":"3.1","cards":"6HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"4","run":"6","wkt":0},{"ball":"3.2","cards":"10HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"4","run":"0","wkt":0},{"ball":"3.3","cards":"2HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"4","run":"2","wkt":0},{"ball":"3.4","cards":"KHH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"4","run":"0","wkt":1},{"ball":"3.5","cards":"10HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"4","run":"0","wkt":0},{"ball":"3.6","cards":"10HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"4","run":"0","wkt":0},{"ball":"4.1","cards":"4HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"5","run":"4","wkt":0},{"ball":"4.2","cards":"KHH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"5","run":"0","wkt":1},{"ball":"4.3","cards":"4HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"5","run":"4","wkt":0},{"ball":"4.4","cards":"2HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"5","run":"2","wkt":0},{"ball":"4.5","cards":"KHH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"5","run":"0","wkt":1},{"ball":"4.6","cards":"4HH","gid":"41.2109111127593","inning":"2","nat":"IND","over":"5","run":"4","wkt":0}]]';


$data = json_decode($data_original);

$result_array = $data[0];
$result_array_fancy = $data[1];

$rdesc = $result_array->desc;

$game_type = $result_array->gtype;
$mid = $result_array->mid;
$mid = str_replace("41.","",$mid);
$bet_final_result = "";
$result = $result_array->win;
$selection_id = $result_array->sid;


$cards3 = $result_array->cards;
$cards3 = '["'.$cards3.'"]';
$cards3 = str_replace(',','","',$cards3);
$cards2 = $cards3;
$event_type = "FIVE_5_CRICKET";


$result_time = date("Y-m-d H:i:s");
$market_id = $result;


$result_status =$result;

if($market_id == 0){
	$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$rdesc','$data_original')");
	$get_all_bet1 = $conn->query("select * from bet_teen_details where event_id='$mid' and bet_status=1 and event_type='$event_type'  and market_id <= 2");
    while ($fetch_get_all_bet1 = mysqli_fetch_assoc($get_all_bet1)) {
        $bet_id = $fetch_get_all_bet1['bet_id'];
        $update_bet = $conn->query("update bet_teen_details set bet_status=2,bet_result='0',bet_win_amount='0' where bet_id='$bet_id' and bet_status=1");

        $conn->query("delete from accounts where bet_id='$bet_id' and game_type=1");
        $conn->query("delete from accounts_temp where bet_id='$bet_id' and game_type=1");
        $conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
    }
	
}

$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$rdesc','$data_original')");
$insert_id = $conn->insert_id;
if($insert_id <= 0){
	/* echo "already inserted"; exit()  */
}


$all_scorebaord = array();
$total_run =0;
$old_nat_name = "";
foreach($result_array_fancy as $fancy_odds){
	$nat = $fancy_odds->nat;
	$run = $fancy_odds->run;
	$wkt = $fancy_odds->wkt;
	$ball = $fancy_odds->ball;
	$over = $fancy_odds->over;
	
	
	if(isset($all_scorebaord[$nat][$over]['over'])){
		$all_scorebaord[$nat][$over]['over'] += $run;
		
	}
	else{
		$all_scorebaord[$nat][$over]['over'] = $run;
		
	}
	
	if($old_nat_name != $nat){
		$total_run = $run;
	}
	else{
		$total_run += $run;
	}
	$old_nat_name = $nat;
	$all_scorebaord[$nat][$over]['total'] = $total_run;

	
}

$end_date_time = date("Y-m-d H:i:s");
$transaction_time = date("Y-m-d H:i:s");
$transaction_time2 = date("d-m-Y H:i:s");

$get_all_bet = $conn->query("select * from bet_teen_details where event_id='$mid' and event_type='$event_type' and bet_status=1");
while ($fetch_get_all_bet = mysqli_fetch_assoc($get_all_bet)) {
    echo $bet_id = $fetch_get_all_bet['bet_id'];
    $bet_user_id = $fetch_get_all_bet['user_id'];
    $bet_market_id = $fetch_get_all_bet['market_id'];
    $bet_market_name = $fetch_get_all_bet['market_name'];
    $bet_amount = $fetch_get_all_bet['bet_margin_used'];
    $bet_winning_amount = $fetch_get_all_bet['bet_win_amount'];
    $bet_type = $fetch_get_all_bet['bet_type'];
    $bet_runs = $fetch_get_all_bet['bet_runs'];
    $actual_win_amount2 = $bet_winning_amount;
    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];

	if($bet_market_id <= 2){
		if ($bet_market_id == $market_id and $bet_type == "Back") {
			set_result($conn, $bet_id, "Win", $mid, $end_date_time, $bet_final_result);
		} else if ($bet_market_id != $market_id and $bet_type == "Lay") {
			set_result($conn, $bet_id, "Win", $mid, $end_date_time, $bet_final_result);
		} else {
			set_result($conn, $bet_id, "Loss", $mid, $end_date_time, $bet_final_result);
		}
	}
	
	if($bet_market_id >= 3){
		
		$over_market = floatval($bet_market_name);	
		
		if (strpos($bet_market_name, 'Aus') !== false) {
			$over_run = $all_scorebaord['AUS'][$over_market]['total'];
			
			if($bet_type == "Back" and $bet_runs<= $over_run){
				set_result($conn,$bet_id,'Win',$mid, $end_date_time, $bet_final_result);
			}else if($bet_type=="Lay" and $bet_runs > $over_run){
				set_result($conn,$bet_id,'Win', $mid, $end_date_time, $bet_final_result);
			}else{
				set_result($conn,$bet_id,'Loss',$mid, $end_date_time, $bet_final_result);
			}
			
		}
		else{
			$over_run = $all_scorebaord['IND'][$over_market]['total'];
			echo "over_run - $over_run </br>";
			echo "bet_runs - $bet_runs </br>";
			if($bet_type == "Back" and $bet_runs<= $over_run){
				set_result($conn,$bet_id,'Win',$mid, $end_date_time, $bet_final_result);
			}else if($bet_type=="Lay" and $bet_runs > $over_run){
				set_result($conn,$bet_id,'Win', $mid, $end_date_time, $bet_final_result);
			}else{
				set_result($conn,$bet_id,'Loss',$mid, $end_date_time, $bet_final_result);
			}
		}
	}
}

function set_result($conn, $bet_id, $result_status, $mid, $end_date_time, $bet_final_result='') {


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
        $update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$user_amount',bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1");

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
$conn->query("delete from exposure_details where event_id='$mid' and market_type ='FANCY_ODDS'");
$conn->query("delete from exposure_details where event_id='$mid' and market_type ='FANCY1_ODDS'");
echo "done";
?>