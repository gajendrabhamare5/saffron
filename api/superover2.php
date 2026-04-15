<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$data_original = file_get_contents("php://input");
$data = json_decode($data_original);

$result_array = $data->t1;



$result_array_fancy = $result_array->score;
if (isset($result_array_fancy) && count($result_array_fancy) > 0) {
} else {
	exit();
}

$rdesc = $result_array->rdesc;


$game_type = $result_array->gtype;
$mid = $result_array->rid;
$bet_final_result = $result_array->winnat;
$result = $result_array->win;


$cards3 = "";
$cards3 = '["'.$cards3.'"]';
$cards3 = str_replace(',','","',$cards3);
$cards = $cards3;
$cards2 = $cards3;

$check_result_already_insert = $conn->query("select * from twenty_teenpatti_result where event_id='$mid' and game_type='$game_type'");
$row_count = mysqli_num_rows($check_result_already_insert);
if($row_count > 0){
	echo "already inserted";
	/* exit(); */
}


$result_time = date("Y-m-d H:i:s");
$result_status=$result; 


$event_type = "SUPER_OVER2";

$market_id = $result;


if ($market_id == 0) {
	$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$rdesc','$data_original')");

	$get_all_bet1 = $conn->query("select * from bet_teen_details where event_id='$mid' and bet_status=1 and event_type='$event_type' and market_id <= 2");
	while ($fetch_get_all_bet1 = mysqli_fetch_assoc($get_all_bet1)) {
		$bet_id = $fetch_get_all_bet1['bet_id'];
		$update_bet = $conn->query("update bet_teen_details set bet_status=2,bet_result='0',bet_win_amount='0' where bet_id='$bet_id' and bet_status=1");

		$conn->query("delete from accounts where bet_id='$bet_id' and game_type=1");
		$conn->query("delete from accounts_temp where bet_id='$bet_id' and game_type=1");
		$conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
	}
    echo "done";
    /* exit(); */
}

$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$rdesc','$data_original')");


$eng_1_over_run = 0;
$eng_common_wicket = 0;
$eng_common_boundry = 0;


$all_scorebaord = array();
$ball=1;
foreach ($result_array_fancy as $fancy_odds) {
	$nat = $fancy_odds->nat;
	$run = $fancy_odds->run;
	$wkt = $fancy_odds->wkt;
	if($wkt == "true" || $wkt == true){
        $wkt=1;
    }else{
        $wkt=0;
    }
	if ($nat == "IND") {
		$eng_1_over_run += $run;
		if ($wkt == 1) {
			$eng_common_wicket = 1;
		}
		if ($run == 4 or $run == 6) {
			$eng_common_boundry = 1;
		}
	}
    if(!array_key_exists($nat,$all_scorebaord)){
        $ball=1;
    }else{
        $ball++;
    }
	$ball1 = "0_".$ball;
	$all_scorebaord[$nat][$ball1]['over'] = $run;
	$all_scorebaord[$nat][$ball1]['wkt'] = $wkt;
   

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
	$market_type = $fetch_get_all_bet['market_type'];
	$actual_win_amount2 = $bet_winning_amount;
	$get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
	$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
	$parentDL = $fetch_parent_ids['parentDL'];
	$parentMDL = $fetch_parent_ids['parentMDL'];
	$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];


	if ($bet_market_id <= 2) {
		if ($bet_market_id == $market_id and $bet_type == "Back") {
			set_result($conn, $bet_id, "Win", $mid, $end_date_time, $bet_final_result);
		} else if ($bet_market_id != $market_id and $bet_type == "Lay") {
			set_result($conn, $bet_id, "Win", $mid, $end_date_time, $bet_final_result);
		} else {
			set_result($conn, $bet_id, "Loss", $mid, $end_date_time, $bet_final_result);
		}
	}

	if ($bet_market_id == 3 or $bet_market_id == 5) {
		if ($bet_type == "Back" and $bet_runs <= $eng_1_over_run) {
			set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
		} else if ($bet_type == "Lay" and $bet_runs > $eng_1_over_run) {
			set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
		} else {
			set_result($conn, $bet_id, 'Loss', $mid, $end_date_time, $bet_final_result);
		}
	}

	if ($market_type == "FANCY_ODDS" || $market_type == "FANCY1_ODDS") {

		if(strpos($bet_market_name, 'Tie') !== false){
			if ($bet_type == "Back" and $market_id == 0) {
				set_result($conn, $bet_id, "Win", $mid, $end_date_time, $bet_final_result);
			} else if ($bet_type == "Lay" and $market_id != 0) {
				set_result($conn, $bet_id, "Win", $mid, $end_date_time, $bet_final_result);
			} else {
				set_result($conn, $bet_id, "Loss", $mid, $end_date_time, $bet_final_result);
			}
		
		}else if(strpos($bet_market_name, 'Common Wicket') !== false){
                if ($bet_type == "Back" and $eng_common_wicket == 1) {
					set_result($conn, $bet_id, "Win", $mid, $end_date_time, $bet_final_result);
				} else if ($bet_type == "Lay" and $eng_common_wicket == 0) {
					set_result($conn, $bet_id, "Win", $mid, $end_date_time, $bet_final_result);
				} else {
					set_result($conn, $bet_id, "Loss", $mid, $end_date_time, $bet_final_result);
				}
        }else if(strpos($bet_market_name, 'Common Boundry') !== false){
                if ($bet_type == "Back" and $eng_common_boundry == 1) {
					set_result($conn, $bet_id, "Win", $mid, $end_date_time, $bet_final_result);
				} else if ($bet_type == "Lay" and $eng_common_boundry == 0) {
					set_result($conn, $bet_id, "Win", $mid, $end_date_time, $bet_final_result);
				} else {
					set_result($conn, $bet_id, "Loss", $mid, $end_date_time, $bet_final_result);
				}
        } else {
			$over_market = floatval($bet_market_name);
			$over_market = str_replace(".", "_", $over_market);


			if (strpos($bet_market_name, 'IND') !== false) {
				//eng
				$over_run = $all_scorebaord['IND'][$over_market]['over'];
				$over_wkt = $all_scorebaord['IND'][$over_market]['wkt'];
				if ($over_wkt == 1 and strpos($bet_market_name, 'Wicket') !== false) {
					set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
				} else {
					if ($over_wkt == 0 and $over_run == 0 and strpos($bet_market_name, 'Zero') !== false) {
						set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
					} else {
						if ($over_run == 1 and strpos($bet_market_name, 'One') !== false) {
							set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
						} else {
							if ($over_run == 2 and strpos($bet_market_name, 'Two') !== false) {
								set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
							} else {
								if ($over_run == 3 and strpos($bet_market_name, 'Three') !== false) {
									set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
								} else {
									if ($over_run == 4 and strpos($bet_market_name, 'Boundry') !== false) {
										set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
									} else {
										if ($over_run == 6 and strpos($bet_market_name, 'Boundry') !== false) {
											set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
										} else {
											set_result($conn, $bet_id, 'Loss', $mid, $end_date_time, $bet_final_result);
										}
									}
								}
							}
						}
					}
				}
			} else {
				//rsa
				$over_run = $all_scorebaord['ENG'][$over_market]['over'];
				$over_wkt = $all_scorebaord['ENG'][$over_market]['wkt'];
				if ($over_wkt == 1 and strpos($bet_market_name, 'Wicket') !== false) {
					set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
				} else {
					if ($over_wkt == 0 and $over_run == 0 and strpos($bet_market_name, 'Zero') !== false) {
						set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
					} else {
						if ($over_run == 1 and strpos($bet_market_name, 'One') !== false) {
							set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
						} else {
							if ($over_run == 2 and strpos($bet_market_name, 'Two') !== false) {
								set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
							} else {
								if ($over_run == 3 and strpos($bet_market_name, 'Three') !== false) {
									set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
								} else {
									if ($over_run == 4 and strpos($bet_market_name, 'Boundry') !== false) {
										set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
									} else {
										if ($over_run == 6 and strpos($bet_market_name, 'Boundry') !== false) {
											set_result($conn, $bet_id, 'Win', $mid, $end_date_time, $bet_final_result);
										} else {
											set_result($conn, $bet_id, 'Loss', $mid, $end_date_time, $bet_final_result);
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

function set_result($conn, $bet_id, $result_status, $mid, $end_date_time, $bet_final_result = '')
{

	global $event_type;
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

		if ($conn->affected_rows > 0) {
			$transaction_id = $bet_id . '-' . $bet_user_id;
			$account_description = "#Win $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0)) {
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$actual_win_amount2','Credit','4','$transaction_time','1',1,'$transaction_id')");
			}
			if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $actual_win_amount2 != 0))) {
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$actual_win_amount2','Credit','4','$transaction_time','1',1,'$transaction_id')");
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
	} else if ($result_status == 'Loss') {
		echo "loss";
		$bet_winning_amount22 = $bet_winning_amount - $bet_amount;
		$update_bet = $conn->query("update bet_teen_details set bet_status=0,bet_result='$user_amount',bet_final_result='$bet_final_result' where bet_id='$bet_id' and bet_status=1");

		if ($conn->affected_rows > 0) {
			$transaction_id = $bet_id . '-' . $bet_user_id;
			$account_description = "#Loss $event_type BET ID $bet_id GAME ID $mid at $transaction_time2";
			if (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0)) {
				$insert_user_account = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");
			}
			if (INSERT_ACCOUNTS_TEMP && (INSERT_ACCOUNTS_ZERO || (INSERT_ACCOUNTS_ZERO == false && $user_amount != 0))) {
				$conn->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`event_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`game_type`,`transaction_id`) VALUES('$bet_user_id','0','$account_description','$bet_id','$mid','$user_amount','Debit','7','$transaction_time','1',1,'$transaction_id')");
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
	return true;
}

$conn->query("delete from exposure_details where event_id='$mid' and market_type ='$event_type'");
$conn->query("delete from exposure_details where event_id='$mid' and market_type ='FANCY_ODDS'");
$conn->query("delete from exposure_details where event_id='$mid' and market_type ='FANCY1_ODDS'");
echo "done";

?>