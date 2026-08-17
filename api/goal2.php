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
$cards = $cards3;
$cards2 = $cards3;

$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid' and game_type='$game_type'");
$row_count = mysqli_num_rows($check_result_already_insert);
if($row_count > 0){
	echo "already inserted";
	exit();
}
$result_time = date("Y-m-d H:i:s");
$result_status=$bet_final_result;
$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$rdesc','$data_original')");


$event_type = "GOAL2";

$result_time = date("Y-m-d H:i:s");
$market_id = array();
$market_id[]=$result;

$rdesc_array = explode("#",$rdesc);
$goal_method = $rdesc_array[1];


if(strtolower($goal_method) == "shot goal"){
    $market_id[]="21";
}
if(strtolower($goal_method) == "header goal"){
    $market_id[]="22";
}
if(strtolower($goal_method) == "penalty goal"){
    $market_id[]="23";
}
if(strtolower($goal_method) == "free kick goal"){
    $market_id[]="24";
}
if(strtolower($goal_method) == "no goal"){
    $market_id[]="25";
}


$rdesc_array = str_replace('#',' and ',$rdesc);
$sid_list = array(
    "Cristiano Ronaldo and Shot Goal" => 121,
    "Cristiano Ronaldo and Header Goal" => 122,
    "Cristiano Ronaldo and Penalty Goal" => 123,
    "Cristiano Ronaldo and Free Kick Goal" => 124,
    "Cristiano Ronaldo and No Goal" => 125,
    "Lionel Messi and Shot Goal" => 221,
    "Lionel Messi and Header Goal" => 222,
    "Lionel Messi and Penalty Goal" => 223,
    "Lionel Messi and Free Kick Goal" => 224,
    "Lionel Messi and No Goal" => 225,
    "Robert Lewandowski and Shot Goal" => 321,
    "Robert Lewandowski and Header Goal" => 322,
    "Robert Lewandowski and Penalty Goal" => 323,
    "Robert Lewandowski and Free Kick Goal" => 324,
    "Robert Lewandowski and No Goal" => 325,
    "Karim Benzema and Shot Goal" => 421,
    "Karim Benzema and Header Goal" => 422,
    "Karim Benzema and Penalty Goal" => 423,
    "Karim Benzema and Free Kick Goal" => 424,
    "Karim Benzema and No Goal" => 425,
    "Edinson Cavani and Shot Goal" => 521,
    "Edinson Cavani and Header Goal" => 522,
    "Edinson Cavani and Penalty Goal" => 523,
    "Edinson Cavani and Free Kick Goal" => 524,
    "Edinson Cavani and No Goal" => 525,
    "Luis Suarez and Shot Goal" => 621,
    "Luis Suarez and Header Goal" => 622,
    "Luis Suarez and Penalty Goal" => 623,
    "Luis Suarez and Free Kick Goal" => 624,
    "Luis Suarez and No Goal" => 625,
    "Neymar and Shot Goal" => 721,
    "Neymar and Header Goal" => 722,
    "Neymar and Penalty Goal" => 723,
    "Neymar and Free Kick Goal" => 724,
    "Neymar and No Goal" => 725,
    "Sergio Aguero and Shot Goal" => 821,
    "Sergio Aguero and Header Goal" => 822,
    "Sergio Aguero and Penalty Goal" => 823,
    "Sergio Aguero and Free Kick Goal" => 824,
    "Sergio Aguero and No Goal" => 825,
    "Olivier Giroud and Shot Goal" => 921,
    "Olivier Giroud and Header Goal" => 922,
    "Olivier Giroud and Penalty Goal" => 923,
    "Olivier Giroud and Free Kick Goal" => 924,
    "Olivier Giroud and No Goal" => 925,
    "Mohamed Salah and Shot Goal" => 1021,
    "Mohamed Salah and Header Goal" => 1022,
    "Mohamed Salah and Penalty Goal" => 1023,
    "Mohamed Salah and Free Kick Goal" => 1024,
    "Mohamed Salah and No Goal" => 1025,
    "Kylian Mbappe and Shot Goal" => 1121,
    "Kylian Mbappe and Header Goal" => 1122,
    "Kylian Mbappe and Penalty Goal" => 1123,
    "Kylian Mbappe and Free Kick Goal" => 1124,
    "Kylian Mbappe and No Goal" => 1125,
);
if(array_key_exists($rdesc_array,$sid_list)){
    $market_id[] = $sid_list[$rdesc_array];
}
$bet_final_result = 'Winner - '.$result_status;


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
	$bet_type = $fetch_get_all_bet['bet_type'];
    $bet_winning_amount = $fetch_get_all_bet['bet_win_amount'];
    $actual_win_amount2 = $bet_winning_amount;
    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];


    if ((in_array($bet_market_id, $market_id) && $bet_type == 'Back') || (!in_array($bet_market_id, $market_id) && $bet_type == 'Lay')) {

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
?>