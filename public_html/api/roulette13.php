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
$result_status = $result_array->win;


$cards3 = $result_array->card;
$cards3 = '["'.$cards3.'"]';
$cards3 = str_replace(',','","',$cards3);

$event_type = "ROULETTE13";


$result_time = date("Y-m-d H:i:s");

$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid' and game_type='$game_type'");
$row_count = mysqli_fetch_row($check_result_already_insert);
if($row_count != 0){
	echo "already inserted";
	exit();
}


$sid_to_nat = [
    38 => '0,1',
    39 => '0,2',
    40 => '0,3',
    41 => '1,4',
    42 => '4,7',
    43 => '7,10',
    44 => '10,13',
    45 => '13,16',
    46 => '16,19',
    47 => '19,22',
    48 => '22,25',
    49 => '25,28',
    50 => '28,31',
    51 => '31,34',
    52 => '2,5',
    53 => '5,8',
    54 => '8,11',
    55 => '11,14',
    56 => '14,17',
    57 => '17,20',
    58 => '20,23',
    59 => '23,26',
    60 => '26,29',
    61 => '29,32',
    62 => '32,35',
    63 => '3,6',
    64 => '6,9',
    65 => '9,12',
    66 => '12,15',
    67 => '15,18',
    68 => '18,21',
    69 => '21,24',
    70 => '24,27',
    71 => '27,30',
    72 => '30,33',
    73 => '33,36',
    74 => '1,2',
    75 => '2,3',
    76 => '4,5',
    77 => '5,6',
    78 => '7,8',
    79 => '8,9',
    80 => '10,11',
    81 => '11,12',
    82 => '13,14',
    83 => '14,15',
    84 => '16,17',
    85 => '17,18',
    86 => '19,20',
    87 => '20,21',
    88 => '22,23',
    89 => '23,24',
    90 => '25,26',
    91 => '26,27',
    92 => '28,29',
    93 => '29,30',
    94 => '31,32',
    95 => '32,33',
    96 => '34,35',
    97 => '35,36',
    98 => '1,2,3',
    99 => '4,5,6',
    100 => '7,8,9',
    101 => '10,11,12',
    102 => '13,14,15',
    103 => '16,17,18',
    104 => '19,20,21',
    105 => '22,23,24',
    106 => '25,26,27',
    107 => '28,29,30',
    108 => '31,32,33',
    109 => '34,35,36',
    110 => '0,1,2,3',
    111 => '1,2,4,5',
    112 => '2,3,5,6',
    113 => '4,5,7,8',
    114 => '5,6,8,9',
    115 => '7,8,10,11',
    116 => '8,9,11,12',
    117 => '10,11,13,14',
    118 => '11,12,14,15',
    119 => '13,14,16,17',
    120 => '14,15,17,18',
    121 => '16,17,19,20',
    122 => '17,18,20,21',
    123 => '19,20,22,23',
    124 => '20,21,23,24',
    125 => '22,23,25,26',
    126 => '23,24,26,27',
    127 => '25,26,28,29',
    128 => '26,27,29,30',
    129 => '28,29,31,32',
    130 => '29,30,32,33',
    131 => '31,32,34,35',
    132 => '32,33,35,36',
    145 => '0,1,2',
    146 => '0,2,3',
];
$result_status = (int)$result_status;
$market_id[] = $result_status + 1;

if((int)$result_status >= 1 && (int)$result_status <= 12){
	$market_id[] = 133;
	$bet_final_result .= ' || 1st 12';
}
if((int)$result_status >= 13 && (int)$result_status <= 24){
	$market_id[] = 134;
	$bet_final_result .= ' || 2nd 12';
}
if((int)$result_status >= 25 && (int)$result_status <= 36){
	$market_id[] = 135;
	$bet_final_result .= ' || 3rd 12';
}

if((int)$result_status % 3 == 1){
	$market_id[] = 136;
	$bet_final_result .= ' || 1st Column';
}
if((int)$result_status % 3 == 2){
	$market_id[] = 137;
	$bet_final_result .= ' || 2nd Column';
}
if((int)$result_status % 3 == 0){
	$market_id[] = 138;
	$bet_final_result .= ' || 3rd Column';
}
if((int)$result_status >= 1 && (int)$result_status <= 18){
	$market_id[] = 139;
	$bet_final_result .= ' || 1 - 18';
}
if((int)$result_status >= 19 && (int)$result_status <= 36){
	$market_id[] = 140;
	$bet_final_result .= ' || 19 - 26';
}

$redKeys = array(1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36);
$is_red="";
if(in_array($result_status,$redKeys)){
	$is_red="RED";
}
if(strtoupper($is_red) == "RED"){
	 $market_id[] = 141;
	 $bet_final_result .= ' || Red';
}
else{
	 $market_id[] = 142;
	 $bet_final_result .= ' || Black';
}
if((int)$result_status % 2 == 0){
	$market_id[] = 144;
	$bet_final_result .= ' || Even';

}else{
	$market_id[] = 143;
	$bet_final_result .= ' || Odd';
}



$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$rdesc','$data_original')");
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

    $winner_flag=false;
    
    if (in_array($bet_market_id, $market_id)){
        $winner_flag=true; 
    }else{
		$all_numbers=$sid_to_nat[$bet_market_id];
		if(!empty($all_numbers)){
			$all_numbers=explode(",",$all_numbers);
			if(in_array($result_status,$all_numbers)){
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