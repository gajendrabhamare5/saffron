<?php

include('../include/conn.php');
include('../include/flip_function.php');
include('../include/flip_function2.php');
include "../session.php";
include('../include/market_limit.php');
include('../include/rejection_log.php');
error_reporting(0);

$odds_change = 0;
$status_changed = 0;

$eventManualType = $conn->real_escape_string($_POST['eventManualType']);

$eventType = $conn->real_escape_string($_POST['eventType']);
$eventId = intVal($conn->real_escape_string($_POST['eventId']));
$oddsmarketId = $conn->real_escape_string($_POST['oddsmarketId']);
$marketId = $conn->real_escape_string($_POST['marketId']);
$market_runner_name = $conn->real_escape_string($_POST['market_runner_name']);
$market_type = $conn->real_escape_string($_POST['bet_market_type']);
$stack = $conn->real_escape_string($_POST['stack']);
$odds = $conn->real_escape_string($_POST['odds']);
$runs = $conn->real_escape_string($_POST['runs']);
$type = $conn->real_escape_string($_POST['type']);
$bet_type_main = $conn->real_escape_string($_POST['bet_type']);

$bet_ip_address = '';
if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
	$bet_ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else{
	$bet_ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
}

$bet_user_agent = $_SERVER['HTTP_USER_AGENT'];

$user_id = $_SESSION['CLIENT_LOGIN_ID'];

if($market_type == "MATCH_ODDS" && $odds > 4){
	$return = array(
		"status" => 'error',
		"message" => 'Bet Not Accept Rate Over 4.00.',
	);
	echo json_encode($return);
	exit();
}

if($market_type != "BOOKMAKER_ODDS" && $market_type != "BOOKMAKERSMALL_ODDS"){
	if ($market_type == "MATCH_ODDS") {
		sleep(3);
	}
	else{
		/*	microsecond	*/
		usleep(700000);
	}
}

$res_user_master = $conn->query("select Status,bet_status,parentDL,parentMDL,parentSuperMDL,min_stake,max_stake,min_fancy_stake,max_fancy_stake,net_exposure_limit from user_master where Id=$user_id");
$fetch_user_master = mysqli_fetch_assoc($res_user_master);

$user_status = $fetch_user_master['Status'];
$bet_status = $fetch_user_master['bet_status'];
$parentDL = $fetch_user_master['parentDL'];
$parentMDL = $fetch_user_master['parentMDL'];
$parentSuperMDL = $fetch_user_master['parentSuperMDL'];

$min_stake_limit = $fetch_user_master['min_stake'];
$max_stake_limit = $fetch_user_master['max_stake'];
$fancy_min_stake_limit = $fetch_user_master['min_fancy_stake'];
$fancy_max_stake_limit = $fetch_user_master['max_fancy_stake'];
$net_exposure_limit = $fetch_user_master['net_exposure_limit'];

if($eventId == ELECTION_EVENT_ID || $oddsmarketId == ELECTION_MARKET_ID){
	$min_stake_limit = ELECTION_MIN;
	$max_stake_limit = ELECTION_MAX;
}

if ($user_status == 0) {
    $return = array(
        "status" => 'error',
        "message" => 'Your Account is Blocked.',
    );
    echo json_encode($return);
    exit();
}

if ($bet_status == 0) {
    $return = array(
        "status" => 'error',
        "message" => 'Your Bet is Blocked, Please contact your upline.',
    );
    echo json_encode($return);
    exit();
}

$get_parent_status = $conn->query("select Status,bet_status from user_master where Id IN ($parentDL,$parentMDL,$parentSuperMDL)");
while($fetch_parent_status = mysqli_fetch_assoc($get_parent_status)){

	$parent_status = $fetch_parent_status['Status'];
	$parent_bet_status = $fetch_parent_status['bet_status'];
	
	if ($parent_status == 0) {
		$return = array(
			"status" => 'error',
			"message" => 'Your Account is Blocked.',
		);
		echo json_encode($return);
		exit();
	}

	if ($parent_bet_status == 0) {
		$return = array(
			"status" => 'error',
			"message" => 'Your Bet is Blocked, Please contact your upline.',
		);
		echo json_encode($return);
		exit();
	}
}

$check_sport_block = $conn->query("select * from block_sport where event_type=$eventType  and block_by IN ($parentDL,$parentMDL,$parentSuperMDL)");
$count_sport_row = mysqli_num_rows($check_sport_block);
if ($count_sport_row != 0) {
    $return = array(
        "status" => 'error',
        "message" => 'Sport is blocked.',
    );
    save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
    echo json_encode($return);
    exit();
}

$check_event_block = $conn->query("select * from block_event_id where event_type=$eventType and event_id=$eventId  and block_by IN ($parentDL,$parentMDL,$parentSuperMDL)");
$count_event_row = mysqli_num_rows($check_event_block);
if ($count_event_row != 0) {
    $return = array(
        "status" => 'error',
        "message" => 'Event is blocked.',
    );
    save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
    echo json_encode($return);
    exit();
}

$check_market_block = $conn->query("select * from block_event_id where market_id=$marketId  and block_by IN ($parentDL,$parentMDL,$parentSuperMDL)");
$count_event_row = mysqli_num_rows($check_event_block);
if ($count_event_row != 0) {
    $return = array(
        "status" => 'error',
        "message" => 'Market is blocked.',
    );
    save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
    echo json_encode($return);
    exit();
}

$market_limit_data = get_market_limit($conn,$eventId,$oddsmarketId,true,$eventType);

$eventName = $market_limit_data['event_name'];
$event_data222 = $market_limit_data['event_data222'];

$bet_time = date('Y-m-d H:i:s');
$time = time();
if ($type != 'No' and $type != 'Yes') {
    $return = array(
        "status" => 'error',
        "message" => 'Something went wrong, please try again.',
    );
} else {
    if ($stack <= 0) {
        $return = array(
            "status" => 'error',
            "message" => 'Invalid Stake Amount.',
        );
        save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
        echo json_encode($return);
        exit();
    }
    if ($odds == 0 || $runs == 0) {
        $return = array(
            "status" => 'error',
            "message" => 'Invalid Bet.',
        );
        save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
        echo json_encode($return);
        exit();
    }
    $get_account_balance = $conn->query("select SUM(`amount`) as total_balance from accounts where user_id=$user_id and status=1");
    $fetch_account_balance = mysqli_fetch_assoc($get_account_balance);
    $account_balance = $fetch_account_balance['total_balance'];
    
    if($market_type == "BOOKMAKER_ODDS" || $market_type == "BOOKMAKERSMALL_ODDS"){
            $odds = $odds / 100;
            $odds = $odds + 1;
            $runs = $odds;
    }
    
    if ($market_type == "MATCH_ODDS" || $market_type == "BOOKMAKER_ODDS" || $market_type == "BOOKMAKERSMALL_ODDS") {

        if ($type == "No") {
            $exposure_bet_type = "Lay";
            $margin_used = $stack * ($runs - 1);
            $bet_win_amount = $stack;
        } else {
            $exposure_bet_type = "Back";
            $bet_win_amount = $stack * ($runs - 1);
            $margin_used = $stack;
        }
        $current_bet = array(
            "bet_event_id" => $eventId,
            "bet_market_id" => $marketId,
            "bet_margin_used" => $margin_used,
            "bet_win_amount" => $bet_win_amount,
            "bet_type" => $exposure_bet_type,
            "bet_market_type" => $market_type,
            "stack" => $stack,
            "runs" => $runs,
        );
        
        //$market_exposure = get_net_exposure_match_oods($conn,$user_id,$eventId,$market_type,$exposure_bet_type,$stack,$runs,$current_bet);
		$market_exposure = 0-$stack;
		
		if(!empty($market_limit_data)){
		
		if($market_exposure == 0)
			$market_exposure = $margin_used;
		else
			$market_exposure = ($market_exposure > 0) ? 0:abs($market_exposure);
			
			//$min = $market_limit_data['match_min'];
			$max = $market_limit_data['match_max'];
			
			if($market_type == 'BOOKMAKER_ODDS' || $market_type == "BOOKMAKERSMALL_ODDS"){
				//$min = $market_limit_data['bookmaker_min'];
				if(get_inplay_status($oddsmarketId))
					$max = $market_limit_data['bookmaker_live'];
				else
					$max = $market_limit_data['bookmaker_max'];
					
					if($market_type == "BOOKMAKERSMALL_ODDS" && $max >= 100){
						$max = 25000;
					}
			}
			
			if($max == 1){
				$return = array(
					"status" => 'error',
					"message" => 'Check Maximum Bet Limit.',
					"market_exposure" => $market_exposure,
					"min" => $min,
					"max" => $max,
				);
				save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
				echo json_encode($return);
				exit();
			}
		
			if($market_exposure > $max){
				$return = array(
					"status" => 'error',
					"message" => 'Check Maximum Bet Limit.',
					"market_exposure" => $market_exposure,
					"min" => $min,
					"max" => $max,
				);
				echo json_encode($return);
				save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
				exit();
			}
			
		}
		else{
			$return = array(
				"status" => 'error',
				"message" => 'Check Maximum Bet Limit.',
			);
			save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
			echo json_encode($return);
			exit();		
		}

        $exposure_balance = get_net_exposure_during_placing_v3($conn, $user_id, $current_bet);
    } else if ($market_type == "METER_ODDS") {

        $url = SPORTS_DATA_URL . $oddsmarketId;
        $data = file_get_contents($url);
        $data = json_decode($data);

        $serverTime = $data->serverTime / 1000;
        $unixServerTime = substr($serverTime, 0, strpos($serverTime, "."));

        if ($unixServerTime < ($time - CASINO_DELAY_TIME)) {
            $return = array(
                "status" => 'error',
                "message" => 'Bet Suspended.',
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
            echo json_encode($return);
            exit();
        }

        //$eventName = $conn->real_escape_string($_POST['bet_event_name']);
        $data = $data->meter[0]->value->session;
        $margin_used = 150 * $stack;
        $margin_amount = 150;
        $current_score = 0;
        foreach ($data as $live_market_rate) {
            if ($live_market_rate->SelectionId == $marketId) {
                $status = $live_market_rate->GameStatus;
                $statusLabel = $live_market_rate->GameStatus;
                $cmp_id = $marketId;
                $marketName = $live_market_rate->RunnerName;
                if ($type == 'No' or $type == "Lay") {
                    $runsNo = $live_market_rate->LayPrice1;
                    $odds_down = $runsNo;
                    $odds = $runsNo;
                } else if ($type == 'Yes' or $type == "Back") {
                    $runsYes = $live_market_rate->BackPrice1;
                    $odds = $runsYes;
                }

                $check_previous_up_bet = check_current_palyer_previous_up_bet($conn, $cmp_id, $user_id);
                $check_previous_down_bet = check_current_palyer_previous_down_bet($conn, $cmp_id, $user_id);

                $betting_stack_input = $stack;
                $total_up_stack = $check_previous_up_bet['total_up_stack'];
                $total_down_stack = $check_previous_down_bet['total_down_stack'];

                if ($total_up_stack == "") {
                    $total_up_stack = 0;
                }

                if ($total_down_stack == "") {
                    $total_down_stack = 0;
                }

                if ($type == "Lay" or $type == "No" or $type == "Down") {
                    $bet_insert_type = "No";
                    $total_new_down_stake = $total_down_stack + $betting_stack_input;
                    $current_bet_data = array(
                        "stack" => $betting_stack_input,
                        "odds" => $odds,
                        "type" => "No",
                        "cmp_current_score" => $odds,
                    );

                    if ($total_up_stack == $total_new_down_stake) {
                        $margin_used = result_as_per_down_rate($conn, $cmp_id, $user_id, $margin_amount, $odds_down, $current_bet_data,true);
                    } else if ($total_up_stack > $total_new_down_stake) {
                        $margin_used = result_as_per_up_rate($conn, $cmp_id, $user_id, $current_score, $current_bet_data,true);
                    } else {
                        $margin_used = result_as_per_down_rate($conn, $cmp_id, $user_id, $margin_amount, $odds_down, $current_bet_data,true);
                    }
                } else {
                    $bet_insert_type = "Yes";
                    $total_new_up_stake = $total_up_stack + $betting_stack_input;
                    $current_bet_data = array(
                        "stack" => $betting_stack_input,
                        "odds" => $odds,
                        "type" => "Yes",
                        "cmp_current_score" => $current_run,
                    );
                    if ($total_new_up_stake == $total_down_stack) {

                        $margin_used = result_as_per_up_rate($conn, $cmp_id, $user_id, $current_score, $current_bet_data,true);
                    } else if ($total_new_up_stake > $total_down_stack) {

                        $margin_used = result_as_per_up_rate($conn, $cmp_id, $user_id, $current_score, $current_bet_data,true);
                    } else {

                        $margin_used = result_as_per_down_rate($conn, $cmp_id, $user_id, $margin_amount, $odds_down, $current_bet_data,true);
                    }
                }

                $exposure_balance -= $margin_used;
                $exposure_balance += user_prv_exposure_except_current_cmp($conn, $user_id, $cmp_id, $eventId);
            }
        }
    } else {
        
        $temp_amount = ($stack * $odds) / 100;
        if(in_array($conn->real_escape_string($_POST['market_odd_name']),array('FANCY1_ODDS','ODDEVEN_ODDS'))){
            $temp_amount = $stack * ($odds - 1);
        }
        
        if ($type == "No" or $type == "Lay") {
            $exposure_bet_type = "No";
            if($conn->real_escape_string($_POST['market_odd_name']) == 'ODDEVEN_ODDS'){
                $bet_win_amount = $temp_amount;
                $margin_used = $stack;
            }
            else{
                $margin_used = $temp_amount;
                $bet_win_amount = $stack;
            }
        } else {
            $exposure_bet_type = "Yes";
            $bet_win_amount = $temp_amount;
            $margin_used = $stack;
        }
        
        
        $current_bet = array(
            "bet_event_id" => $eventId,
            "bet_market_id" => $marketId,
            "bet_margin_used" => $margin_used,
            "bet_win_amount" => $bet_win_amount,
            "bet_odds" => $odds,
            "bet_type" => $exposure_bet_type,
            "bet_market_type" => $market_type,
            "stack" => $stack,
            "runs" => $runs,
        );

        $exposure_balance = get_net_exposure_during_placing_v3($conn, $user_id, $current_bet);
    }


    if ($margin_used == 0) {
        $return = array(
            "status" => 'error',
            "message" => 'Invalid Stake.',
        );
        save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
        echo json_encode($return);
        exit();
    }

    $unmatched_exposure_balance = get_unmatched_expo($conn, $user_id);
    $total_exposure = $exposure_balance + $unmatched_exposure_balance;
    $available_balance = $account_balance + $total_exposure;
    
    $available_balance = number_format($available_balance, 2);
    if ($available_balance < 0) {
        $return = array(
            "status" => 'error',
            "message" => 'Bet Not Confirm Check Exposer Limit And Balance.'. number_format(abs($exposure_balance),2,".",""),//'Insufficient Funds.',
        );
        save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
        echo json_encode($return);
        exit();
    }
    
    $total_exposure = ($total_exposure > 0)?0:$total_exposure;
    
	if($net_exposure_limit < abs($total_exposure)){

		 $return = array(
			"status" => 'error',
			"message" => 'Bet Not Confirm Check Exposer Limit And Balance.'. number_format(abs($exposure_balance),2,".",""),//'Insufficient Funds.',
		);
		save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
		echo json_encode($return);
		exit();
	}

    //if($market_type == "MATCH_ODDS" || $market_type =="BOOKMAKER_ODDS" ){
    if ($market_type != "FANCY_ODDS" && $market_type != "METER_ODDS" && $market_type != "KHADO_ODDS") {

        if ($min_stake_limit > $stack) {
            $return = array(
                "status" => 'error',
                "message" => "Your Minimum Stake Limit is $min_stake_limit.",
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
            echo json_encode($return);
            exit();
        }
        if ($max_stake_limit < $stack) {
            $return = array(
                "status" => 'error',
                "message" => "Your Maximum Stake Limit is $max_stake_limit.",
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
            echo json_encode($return);
            exit();
        }


        $get_dl_data = $conn->query("select parentDL from user_login_master where UserID=$user_id");
        $fetch_dl_data = mysqli_fetch_assoc($get_dl_data);
        $parentDL = $fetch_dl_data['parentDL'];

        $get_min_max_odds_data = $conn->query("select * from user_master where Id=$parentDL");
        $fetch_get_min_max_odds_data = mysqli_fetch_assoc($get_min_max_odds_data);
        $minimum_match_odds = $fetch_get_min_max_odds_data['minimum_lay_odds'];
        $maximum_match_odds = $fetch_get_min_max_odds_data['maximum_back_odds'];
        if ($type == "No") {
            //Lay
            if ($minimum_match_odds != "" or $minimum_match_odds != null or $runs < 1) {
                if ($minimum_match_odds > $runs) {
                    $return = array(
                        "status" => 'error',
                        "message" => "Minimum Lay Odds Limit is $minimum_match_odds",
                    );
                    save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                    echo json_encode($return);
                    exit();
                } else if ($runs < 1) {
                    $return = array(
                        "status" => 'error',
                        "message" => "Minimum Lay Odds Limit is 1",
                    );
                    save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                    echo json_encode($return);
                    exit();
                }
            }
        } else {
            //Back
            if ($maximum_match_odds != "" or $maximum_match_odds != null or $runs > 20) {
                if ($maximum_match_odds = "" or $maximum_match_odds == null) {
                    $maximum_match_odds = 100;
                    if ($market_type == "MATCH_ODDS") {
                        $maximum_match_odds = 20;
                    }
                }
                if ($maximum_match_odds < $runs) {
                    $return = array(
                        "status" => 'error',
                        "message" => "Maximum Back Odds Limit is $maximum_match_odds",
                    );
                    save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                    echo json_encode($return);
                    exit();
                } else if ($runs < 1) {
                    $return = array(
                        "status" => 'error',
                        "message" => "Minimum Back Odds Limit is 1",
                    );
                    save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                    echo json_encode($return);
                    exit();
                }
            }
        }



        if ($eventManualType == 'Manual') {
            
        } else {
            $market_runner_name = $conn->real_escape_string($_POST['market_runner_name']);
            $market_odd_name = $conn->real_escape_string($_POST['market_odd_name']);

            //$eventName = $conn->real_escape_string($_POST['bet_event_name']);

            // $url2 = "http://vkcasinos.com/diamond/data1.php?eventId=" . $oddsmarketId;
//             $data2 = file_get_contents($url2);
            $data2 = $event_data222;

            $serverTime = $data2->serverTime / 1000;
            $unixServerTime = intVal($serverTime);
            
            if(!isset($data2->data[0]->matchDate)){
            	$match_start = strtotime($data2->data[0]->matchdate);
            	/*if($market_type == "MATCH_ODDS"){
					if($time < $match_start-300){
						$return = array(
							"status" => 'error',
							"message" => 'Bet Not Started. #'.__LINE__,
							"time"	=>	$time,
							"match_time" =>	$match_start,
						);
						save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
						echo json_encode($return);
						exit();
					}
				}*/
            }
            else{
           		$match_start = $data2->data[0]->matchDate;
            	$match_start = $match_start - 16200;
            	$early_time = 300;
            	
            	if($oddsmarketId == '1.178213361'){
            		$early_time += 1800;
            	}
            	elseif($oddsmarketId == '1.179779097'){
            		$early_time += 1800;
            	}
            	      	
				if($market_type == "MATCH_ODDS"){
				   //if($match_start - $time > 30){
				   if($match_start - $time > $early_time){
						$return = array(
							"status" => 'error',
							"message" => 'Bet Not Started.',
							"time"	=>	$time,
							"match_time" =>	$match_start,
						);
						save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
						echo json_encode($return);
						exit();
				   }
				}
            }
			
			
            /*if ($unixServerTime < ($time - CASINO_DELAY_TIME)) {
                $return = array(
                    "status" => 'error',
                    "message" => 'Bet Suspended.',
                    "unixServerTime" => $unixServerTime,
                    "c"				=>	$time
                );
                echo json_encode($return);
                exit();
            }*/
//}
            $data2 = $data2->data;

            //$eventName = $data2[0]->runners[1]->name . ' vs ' . $data2[0]->runners[0]->name;

            $market_name_array = array();
            $event_team_1 = "";
            $event_team_2 = "";

            foreach ($data2 as $data22) {
                $market_name4 = $data22->market_name;
                if ($market_odd_name == "To Win the Toss") {
                    $get_end_time = $conn->query("select * from toss_end_time where event_id='$eventId'");
                    while ($fetch_get_end_time = mysqli_fetch_assoc($get_end_time)) {
                        $end_time = $fetch_get_end_time['end_date'];
                        $current_bet_time = date("Y-m-d H:i:s");

                        $end_time = strtotime($end_time);
                        $current_bet_time = strtotime($current_bet_time);
                        if ($end_time <= $current_bet_time) {
                            $return = array(
                                "status" => 'error',
                                "message" => 'Toss Odds bet is closed.',
                            );
                            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                            echo json_encode($return);
                            exit();
                        }
                    }
                }
                $market_4_runners = $data22->runners;
                $market_4_bookmaker = $data22->bookmaker;
                
                if ($market_name4 == "Match Odds" or $market_name4 == $market_type) {
					if($market_type == "BOOKMAKER_ODDS" || $market_type == "BOOKMAKERSMALL_ODDS"){
						
						$t_runner_data =  $market_4_bookmaker;
					}
					else{
						$t_runner_data = $market_4_runners;
					}
                    foreach ($t_runner_data as $runners_4_data) {
                        $market_4_id = $runners_4_data->id;
                        $market_4_name = $runners_4_data->name;
                        if ($market_type == $market_name4 || $market_name4 == "Match Odds" || $market_type == "BOOKMAKER_ODDS" || $market_type == "BOOKMAKERSMALL_ODDS") {
                            $market_id_array[] = $market_4_id;
                            $market_name_array[] = $market_4_name;
                        }
                    }
                }
            }

            $event_team_1_id = $market_id_array[0];
            $event_team_2_id = $market_id_array[1];

            if ($market_id_array[2]) {
                $event_team_3_id = $market_id_array[2];
                $event_team_3 = $market_name_array[2];
            }

            $event_team_1 = $market_name_array[0];
            $event_team_2 = $market_name_array[1];


            $url = SPORTS_DATA_URL . $oddsmarketId;

            $data = file_get_contents($url);
            $data = json_decode($data);

            $serverTime = $data->serverTime / 1000;
            $unixServerTime = substr($serverTime, 0, strpos($serverTime, "."));
            
            $bm1_datas = (isset($data->bm1)) ? $data->bm1 : array();
            $data = $data->cricket;

          	if ($unixServerTime < ($time - CASINO_DELAY_TIME)) {
                $return = array(
                    "status" => 'error',
                    "message" => 'Bet Suspended.',
                );
                save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                echo json_encode($return);
                exit();
            }

            $status = $data[0]->status;
            $ggstatus = $data[0]->ggstatus;
            
            if(ELECTION_MARKET_ID != $oddsmarketId){
				if($data[0]->eventTypeId != $eventType){
					$return = array(
						"status" => 'error',
						"message" => 'Something went wrong. #'.__LINE__,
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
            }
            
            if($market_type == "MATCH_ODDS" && $data[0]->inplay == false){
            	$return = array(
					"status" => 'error',
					"message" => 'Bet Not Started. #'.__LINE__,
					"time"	=>	$time,
					"match_time" =>	$match_start,
				);
				save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
				echo json_encode($return);
				exit();
            }

            $eventName = str_replace("'", "", $eventName);
            //if(($status != "OPEN" or $ggstatus != "OPEN")){
            if (($status != "OPEN" && $status != "ACTIVE") or ( $ggstatus != "OPEN" && $ggstatus != "ACTIVE")) {
                $return = array(
                    "status" => 'error',
                    "message" => "Bet Suspended."
                );
                save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                echo json_encode($return);
                exit();
            }
            
            if($market_type == "BOOKMAKERSMALL_ODDS"){
            
				$bm1_data1 = (isset($bm1_datas[0])) ? $bm1_datas[0] : array();
				$bm1_data1 = (isset($bm1_data1->value)) ? $bm1_data1->value : array();
				$bm1_data1 = (isset($bm1_data1->session)) ? $bm1_data1->session : array();
			
				foreach ($bm1_data1 as $bm1_runner_data) {
					
					$market_selection_id = $bm1_runner_data->SelectionId;

					$get_market_data = $conn->query("select * from event_market_id where event_id=$eventId and market_id=$market_selection_id and market_type='$market_type'");
					$get_row_market_data = mysqli_num_rows($get_market_data);

					if ($get_row_market_data == 0) {
					
						if ($event_team_1_id == $market_selection_id) {
								$conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$event_team_1','$market_type')");
						} else {
							if (isset($event_team_3_id)) {
								if ($event_team_3_id == $market_selection_id) {
									$conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$event_team_3','$market_type')");
								} else if ($event_team_2_id == $market_selection_id) {
									$conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$event_team_2','$market_type')");
								}
							} else {
								if ($event_team_2_id == $market_selection_id) {
									$conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$event_team_2','$market_type')");
								}
							}
						}
					}
				}

					
				foreach ($bm1_data1 as $bm1_runner_data) {
					
						/* $marketName = $bm1_runner_data->RunnerName;
						  $marketName = str_replace("'","",$marketName); */
						$market_selection_id = $bm1_runner_data->SelectionId;

						$suspendSite = $bm1_runner_data->GameStatus;                      
						$MStatus = $bm1_runner_data->MStatus;                
						$Active = $bm1_runner_data->Active;                

						if (intVal($bm1_runner_data->SelectionId) == intVal($marketId)) {

							if ($suspendSite != 'ACTIVE' || $Active != 'ACTIVE') {
								$return = array(
									"status" => 'error',
									"message" => 'Odds suspended, please try again.',
								);
								echo json_encode($return);
								exit();
							}

							if ($MStatus != 'OPEN') {
								$return = array(
									"status" => 'error',
									"message" => 'Odds suspended, please try again.',
								);
								echo json_encode($return);
								exit();
							}

							$get_last_bet = $conn->query("select * from bet_details where user_id=$user_id and event_id = $eventId and market_id=$marketId order by bet_id DESC LIMIT 1");
							$fetch_last_date_time = mysqli_fetch_assoc($get_last_bet);
							$last_bet_date_time = $fetch_last_date_time['bet_time'];
							$epoch_last_bet_time = strtotime($last_bet_date_time);
							$new_time = strtotime(date("Y-m-d H:i:s"));
							$substract_time = $new_time - 7;
							$new_20_time = date("Y-m-d H:i:s", $substract_time);

							if ($epoch_last_bet_time >= $substract_time) {
								if ($type == "No") {
									//Lay
									$lay_1 = ($bm1_runner_data->LayPrice1 / 100) +1;
									$conn->query("insert into continues_bet_details (`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$eventId','$eventType','$marketId','$user_id','$eventName','$market_runner_name','$market_type','Lay','00','$lay_1','$stack','0','$margin_used','$bet_time','1','$bet_win_amount')");
								} else {
									$back_1 = ($bm1_runner_data->BackPrice1 / 100) +1;
									$insert_trade = $conn->query("insert into continues_bet_details (`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$eventId','$eventType','$marketId','$user_id','$eventName','$market_runner_name','$market_type','Back','00','$back_1','$stack','0','$stack','$bet_time','1','$bet_win_amount')");
								}

								$return = array(
									"status" => 'error',
									"message" => 'Multiple Bet Not Allowed On Same Time AND Same Market.',
								);
								echo json_encode($return);
								exit();
							}

							if ($type == "No") {
								//Lay
								$lay_1 = ($bm1_runner_data->LayPrice1 / 100) +1 ;


								if ($lay_1 <= $runs) {
								
									$margin_used = $stack * ($runs - 1);
								
									$bet_win_amount = $stack;
									$insert_trade = $conn->query("insert into bet_details (`bet_ip_address`,`bet_user_agent`,`event_id`,`event_type`,`oddsmarketId`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$bet_ip_address','$bet_user_agent','$eventId','$eventType','$oddsmarketId','$marketId','$user_id','$eventName','$market_runner_name','$market_type','Lay','00','$runs','$stack','0','$margin_used','$bet_time','1','$bet_win_amount')");


									$last_bet_id = $conn->insert_id;

									$return = array(
										"status" => 'ok',
										"message" => 'Bet has been placed and matched successfully',
										"Id" => $last_bet_id,
										"ID2" => $odds_change
									);
									
									/*	Rate update changes	*/ 
									
										$current_bet["bet_margin_used"] = $margin_used;
										$current_bet["bet_win_amount"] = $bet_win_amount;
										$current_bet["runs"] = $runs;
										
									/*	End of Rate update changes	*/
									
									$add_exposure_amount = add_net_exposure_v2($conn, $user_id, $current_bet);
									echo json_encode($return);
									exit();
								}
								else{
									$return = array(
										"status" => 'error',
										"message" => 'Bet not confirmed, Odds is Changed.',
									);
									echo json_encode($return);
									exit();
								}
							} else {
								//Back
								$back_1 = ($bm1_runner_data->BackPrice1 / 100 ) + 1 ;
								$bet_win_amount = $stack * ($back_1 -1);
								if ($bet_win_amount <= 0) {
									$return = array(
										"status" => 'error',
										"message" => 'Invalid Match Odds.',
									);
									echo json_encode($return);
									exit();
								}
								
								if ($back_1 >= $runs) {

									$bet_win_amount = $stack * ($back_1 - 1);
									$insert_trade = $conn->query("insert into bet_details (`bet_ip_address`,`bet_user_agent`,`event_id`,`event_type`,`oddsmarketId`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$bet_ip_address','$bet_user_agent','$eventId','$eventType','$oddsmarketId','$marketId','$user_id','$eventName','$market_runner_name','$market_type','Back','00','$back_1','$stack','0','$stack','$bet_time','1','$bet_win_amount')");
									$last_bet_id = $conn->insert_id;
									$return = array(
										"status" => 'ok',
										"message" => 'Bet has been placed and matched successfully',
										"Id" => $last_bet_id,
										"ID2" => $odds_change
									);
									
									/*	Rate update changes	*/ 
									
										$current_bet["bet_margin_used"] = $stack;
										$current_bet["bet_win_amount"] = $bet_win_amount;
										$current_bet["runs"] = $back_1;
										
									/*	End of Rate update changes	*/ 

									$add_exposure_amount = add_net_exposure_v2($conn, $user_id, $current_bet);
									echo json_encode($return);
									exit();
									
								}
								else{
									$return = array(
										"status" => 'error',
										"message" => 'Bet not confirmed, Odds is Changed.',
									);
									echo json_encode($return);
									exit();
								}
							}
						}
					
				}
                            
			}

            foreach ($data as $match_data) {
            
                $data_event_name = ($match_data->mtype == 'Match Odds' || $match_data->mtype == 'MATCH_ODDS') ? 'MATCH_ODDS' : $data_event_name;

                if ($market_odd_name == $data_event_name || $data_event_name == "Most Points" || $market_odd_name == "BOOKMAKER_ODDS") {

                    $runners_data = $match_data->runners;
                    $bookmaker_data = $match_data->bookmaker;
					$main_status = ($match_data->status == 'OPEN')?'ACTIVE':$match_data->status;
					
                    if($market_type == "BOOKMAKER_ODDS"){
                            $runners_data11 = $bookmaker_data;

                            foreach ($bookmaker_data as $match_odds_selection2) {
                                    $market_selection_id = $match_odds_selection2->id;

                                    $get_market_data = $conn->query("select * from event_market_id where event_id=$eventId and market_id=$market_selection_id and market_type='$market_type'");
                                    $get_row_market_data = mysqli_num_rows($get_market_data);

                                    if ($get_row_market_data == 0) {


                                            if ($event_team_1_id == $market_selection_id) {

                                                    $conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$event_team_1','$market_type')");
                                            } else {
                                                    if (isset($event_team_3_id)) {
                                                            if ($event_team_3_id == $market_selection_id) {

                                                                    $conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$event_team_3','$market_type')");
                                                            } else if ($event_team_2_id == $market_selection_id) {

                                                                    $conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$event_team_2','$market_type')");
                                                            }
                                                    } else {
                                                            if ($event_team_2_id == $market_selection_id) {

                                                                    $conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$event_team_2','$market_type')");
                                                            }
                                                    }
                                            }
                                    }
                            }
                    }
                    else{
                            $runners_data11 = $runners_data;

                              foreach ($runners_data as $match_odds_selection2) {
                                    $market_selection_id = $match_odds_selection2->id;

                                    $get_market_data = $conn->query("select * from event_market_id where event_id=$eventId and market_id=$market_selection_id and market_type='$market_type'");
                                    $get_row_market_data = mysqli_num_rows($get_market_data);

                                    if ($get_row_market_data == 0) {


                                            if ($event_team_1_id == $market_selection_id) {

                                                    $conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$event_team_1','$market_type')");
                                            } else {
                                                    if (isset($event_team_3_id)) {
                                                            if ($event_team_3_id == $market_selection_id) {

                                                                    $conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$event_team_3','$market_type')");
                                                            } else if ($event_team_2_id == $market_selection_id) {

                                                                    $conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$event_team_2','$market_type')");
                                                            }
                                                    } else {
                                                            if ($event_team_2_id == $market_selection_id) {

                                                                    $conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$event_team_2','$market_type')");
                                                            }
                                                    }
                                            }
                                    }
                            }
                    }
                    
                    if($market_type == "BOOKMAKER_ODDS"){
                        
                        foreach ($bookmaker_data as $match_odds_selection) {
                            /* $marketName = $match_odds_selection->name;
                              $marketName = str_replace("'","",$marketName); */
                            $market_selection_id = $match_odds_selection->selectionId;

                            $suspendSite = $match_odds_selection->status;                            

                            if (intVal($match_odds_selection->selectionId) == intVal($marketId)) {

                                if ($suspendSite != 'ACTIVE') {
                                    $return = array(
                                        "status" => 'error',
                                        "message" => 'Odds suspended, please try again.',
                                    );
                                    save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                                    echo json_encode($return);
                                    exit();
                                }

                                $get_last_bet = $conn->query("select * from bet_details where user_id=$user_id and event_id = $eventId and market_id=$marketId order by bet_id DESC LIMIT 1");
                                $fetch_last_date_time = mysqli_fetch_assoc($get_last_bet);
                                $last_bet_date_time = $fetch_last_date_time['bet_time'];
                                $epoch_last_bet_time = strtotime($last_bet_date_time);
                                $new_time = strtotime(date("Y-m-d H:i:s"));
                                $substract_time = $new_time - 7;
                                $new_20_time = date("Y-m-d H:i:s", $substract_time);

                                if ($epoch_last_bet_time >= $substract_time) {
                                    if ($type == "No") {
                                        //Lay
                                        $lay_1 = ($match_odds_selection->lay[0]->price / 100) +1;
                                        $conn->query("insert into continues_bet_details (`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$eventId','$eventType','$marketId','$user_id','$eventName','$market_runner_name','$market_type','Lay','00','$lay_1','$stack','0','$margin_used','$bet_time','1','$bet_win_amount')");
                                    } else {
                                        $back_1 = ($match_odds_selection->back[0]->price / 100) +1;
                                        $insert_trade = $conn->query("insert into continues_bet_details (`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$eventId','$eventType','$marketId','$user_id','$eventName','$market_runner_name','$market_type','Back','00','$back_1','$stack','0','$stack','$bet_time','1','$bet_win_amount')");
                                    }

                                    $return = array(
                                        "status" => 'error',
                                        "message" => 'Multiple Bet Not Allowed On Same Time AND Same Market.',
                                    );
                                    save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                                    echo json_encode($return);
                                    exit();
                                }

                                if ($type == "No") {
                                    //Lay
                                    $lay_1 = ($match_odds_selection->lay[0]->price / 100) +1 ;

	
                                    if ($lay_1 <= $runs) {
                                    
                                    	$margin_used = $stack * ($runs - 1);
                                    
										$bet_win_amount = $stack;
										$insert_trade = $conn->query("insert into bet_details (`bet_ip_address`,`bet_user_agent`,`event_id`,`event_type`,`oddsmarketId`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$bet_ip_address','$bet_user_agent','$eventId','$eventType','$oddsmarketId','$marketId','$user_id','$eventName','$market_runner_name','$market_type','Lay','00','$runs','$stack','0','$margin_used','$bet_time','1','$bet_win_amount')");


										$last_bet_id = $conn->insert_id;

										$return = array(
											"status" => 'ok',
											"message" => 'Bet has been placed and matched successfully',
											"Id" => $last_bet_id,
											"ID2" => $odds_change
										);

										
										/*	Rate update changes	*/ 
										
											$current_bet["bet_margin_used"] = $margin_used;
											$current_bet["bet_win_amount"] = $bet_win_amount;
											$current_bet["runs"] = $runs;
											
										/*	End of Rate update changes	*/
										
										$add_exposure_amount = add_net_exposure_v2($conn, $user_id, $current_bet);

										echo json_encode($return);
										exit();
                                    }
                                    else{
                                    	$return = array(
                                            "status" => 'error',
                                            "message" => 'Bet not confirmed, Odds is Changed.',
                                        );
                                        save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                                        echo json_encode($return);
                                        exit();
                                    }
                                } else {
                                    //Back
                                    $back_1 = ($match_odds_selection->back[0]->price/100) + 1 ;
                                    $bet_win_amount = $stack * ($back_1 -1);
                                    if ($bet_win_amount <= 0) {
                                        $return = array(
                                            "status" => 'error',
                                            "message" => 'Invalid Match Odds.',
                                        );
                                        save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                                        echo json_encode($return);
                                        exit();
                                    }
                                    
                                    if ($back_1 >= $runs) {

										$bet_win_amount = $stack * ($back_1 - 1);
										$insert_trade = $conn->query("insert into bet_details (`bet_ip_address`,`bet_user_agent`,`event_id`,`event_type`,`oddsmarketId`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$bet_ip_address','$bet_user_agent','$eventId','$eventType','$oddsmarketId','$marketId','$user_id','$eventName','$market_runner_name','$market_type','Back','00','$back_1','$stack','0','$stack','$bet_time','1','$bet_win_amount')");
										$last_bet_id = $conn->insert_id;
										$return = array(
											"status" => 'ok',
											"message" => 'Bet has been placed and matched successfully',
											"Id" => $last_bet_id,
											"ID2" => $odds_change
										);
										
										/*	Rate update changes	*/ 
										
											$current_bet["bet_margin_used"] = $stack;
											$current_bet["bet_win_amount"] = $bet_win_amount;
											$current_bet["runs"] = $back_1;
											
										/*	End of Rate update changes	*/ 

										$add_exposure_amount = add_net_exposure_v2($conn, $user_id, $current_bet);

										echo json_encode($return);
										exit();
										
									}
                                    else{
                                    	$return = array(
                                            "status" => 'error',
                                            "message" => 'Bet not confirmed, Odds is Changed.',
                                        );
                                        save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                                        echo json_encode($return);
                                        exit();
                                    }
                                }
                            }
                        }
                    }
                    else{
                        foreach ($runners_data11 as $match_odds_selection) {
                            /* $marketName = $match_odds_selection->name;
                              $marketName = str_replace("'","",$marketName); */
                            $market_selection_id = $match_odds_selection->id;


                            $suspendSite = ($match_odds_selection->status == 'OPEN')?'ACTIVE':$match_odds_selection->status;
                            if ($suspendSite != 'ACTIVE' ) {
                                $return = array(
                                    "status" => 'error',
                                    "message" => 'Odds suspended, please try again.',
                                );
                                save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                                echo json_encode($return);
                                exit();
                            }

                            if (intVal($match_odds_selection->id) == intVal($marketId)) {
								if($main_status != 'ACTIVE'){
									$return = array(
										"status" => 'error',
										"message" => 'Odds suspended, please try again.',
									);
									save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
									echo json_encode($return);
									exit();
								}
                                if ($eventType == 2) {


                                    $get_last_bet = $conn->query("select * from bet_details where user_id=$user_id and event_id = $eventId and market_id=$marketId order by bet_id DESC LIMIT 1");
                                    $fetch_last_date_time = mysqli_fetch_assoc($get_last_bet);
                                    $last_bet_date_time = $fetch_last_date_time['bet_time'];
                                    $epoch_last_bet_time = strtotime($last_bet_date_time);
                                    $new_time = strtotime(date("Y-m-d H:i:s"));
                                    $substract_time = $new_time - 20;
                                    $new_20_time = date("Y-m-d H:i:s", $substract_time);

                                    if ($epoch_last_bet_time >= $substract_time) {
                                        if ($type == "No") {
                                            //Lay
                                            $lay_1 = $match_odds_selection->lay[0]->price;
                                            $conn->query("insert into continues_bet_details (`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$eventId','$eventType','$marketId','$user_id','$eventName','$market_runner_name','$market_type','Lay','00','$lay_1','$stack','0','$margin_used','$bet_time','1','$bet_win_amount')");
                                        } else {
                                            $back_1 = $match_odds_selection->back[0]->price;
                                            $insert_trade = $conn->query("insert into continues_bet_details (`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$eventId','$eventType','$marketId','$user_id','$eventName','$market_runner_name','$market_type','Back','00','$back_1','$stack','0','$stack','$bet_time','1','$bet_win_amount')");
                                        }

                                        $return = array(
                                            "status" => 'error',
                                            "message" => 'Multiple Bet Not Allowed On Same Time AND Same Market.',
                                        );
                                        save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                                        echo json_encode($return);
                                        exit();
                                    }
                                } 
                                else {

                                    $get_last_bet = $conn->query("select * from bet_details where user_id=$user_id and event_id = $eventId and market_id=$marketId order by bet_id DESC LIMIT 1");
                                    $fetch_last_date_time = mysqli_fetch_assoc($get_last_bet);
                                    $last_bet_date_time = $fetch_last_date_time['bet_time'];
                                    $epoch_last_bet_time = strtotime($last_bet_date_time);
                                    $new_time = strtotime(date("Y-m-d H:i:s"));
                                    $substract_time = $new_time - 7;
                                    $new_20_time = date("Y-m-d H:i:s", $substract_time);

                                    if ($epoch_last_bet_time >= $substract_time) {
                                        if ($type == "No") {
                                            //Lay
                                            $lay_1 = $match_odds_selection->lay[0]->price;
                                            $conn->query("insert into continues_bet_details (`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$eventId','$eventType','$marketId','$user_id','$eventName','$market_runner_name','$market_type','Lay','00','$lay_1','$stack','0','$margin_used','$bet_time','1','$bet_win_amount')");
                                        } else {
                                            $back_1 = $match_odds_selection->back[0]->price;
                                            $insert_trade = $conn->query("insert into continues_bet_details (`event_id`,`event_type`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$eventId','$eventType','$marketId','$user_id','$eventName','$market_runner_name','$market_type','Back','00','$back_1','$stack','0','$stack','$bet_time','1','$bet_win_amount')");
                                        }

                                        $return = array(
                                            "status" => 'error',
                                            "message" => 'Multiple Bet Not Allowed On Same Time AND Same Market.',
                                        );
                                        save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                                        echo json_encode($return);
                                        exit();
                                    }
                                }
                                if ($type == "No") {
                                    //Lay
                                    $lay_1 = $match_odds_selection->lay[0]->price;
                                    $lay_2 = $match_odds_selection->lay[1]->price;
                                    $lay_3 = $match_odds_selection->lay[2]->price;

                                    if ($lay_1 <= $runs) {
                                        $margin_used = $stack * ($runs - 1);
                                        $bet_win_amount = $stack;
                                        $insert_trade = $conn->query("insert into bet_details (`bet_ip_address`,`bet_user_agent`,`event_id`,`event_type`,`oddsmarketId`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$bet_ip_address','$bet_user_agent','$eventId','$eventType','$oddsmarketId','$marketId','$user_id','$eventName','$market_runner_name','$market_type','Lay','00','$runs','$stack','0','$margin_used','$bet_time','1','$bet_win_amount')");


                                        $last_bet_id = $conn->insert_id;

                                        $return = array(
                                            "status" => 'ok',
                                            "message" => 'Bet has been placed and matched successfully',
                                            "Id" => $last_bet_id,
                                            "ID2" => $odds_change
                                        );

										/*	Rate update changes	*/ 
										
										$current_bet["bet_margin_used"] = $margin_used;
										$current_bet["bet_win_amount"] = $bet_win_amount;
										$current_bet["runs"] = $runs;
											
										/*	End of Rate update changes	*/
										
                                        $add_exposure_amount = add_net_exposure_v2($conn, $user_id, $current_bet);

                                        echo json_encode($return);
                                        exit();
                                    } else {
                                        $return = array(
                                            "status" => 'error',
                                            "message" => 'Bet not confirmed, Odds is Changed.',
                                        );
                                        save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                                        echo json_encode($return);
                                        exit();
                                    }
                                } 
                                else {
                                    //Back
                                    
                                    $back_1 = $match_odds_selection->back[0]->price;
                                    $back_2 = $match_odds_selection->back[1]->price;
                                    $back_3 = $match_odds_selection->back[2]->price;
                                    $bet_win_amount = $stack * ($back_1 - 1);
                                    if ($bet_win_amount <= 0) {
                                        $return = array(
                                            "status" => 'error',
                                            "message" => 'Invalid Match Odds.',
                                        );
                                        save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                                        echo json_encode($return);
                                        exit();
                                    }
                                    if ($back_1 >= $runs) {
                                        $bet_win_amount = $stack * ($runs - 1);
                                        $insert_trade = $conn->query("insert into bet_details (`bet_ip_address`,`bet_user_agent`,`event_id`,`event_type`,`oddsmarketId`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$bet_ip_address','$bet_user_agent','$eventId','$eventType','$oddsmarketId','$marketId','$user_id','$eventName','$market_runner_name','$market_type','Back','00','$runs','$stack','0','$stack','$bet_time','1','$bet_win_amount')");
                                        $last_bet_id = $conn->insert_id;
                                        $return = array(
                                            "status" => 'ok',
                                            "message" => 'Bet has been placed and matched successfully',
                                            "Id" => $last_bet_id,
                                            "ID2" => $odds_change
                                        );
                                        
                                        /*	Rate update changes	*/ 
										
											$current_bet["bet_margin_used"] = $stack;
											$current_bet["bet_win_amount"] = $bet_win_amount;
											$current_bet["runs"] = $runs;
											
										/*	End of Rate update changes	*/ 

                                        $add_exposure_amount = add_net_exposure_v2($conn, $user_id, $current_bet);



                                        echo json_encode($return);
                                        exit();
                                    } else {
                                        $return = array(
                                            "status" => 'error',
                                            "message" => 'Bet not confirmed, Odds is Changed.',
                                        );
                                        save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                                        echo json_encode($return);
                                        exit();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        if (($last_bet_id != null or $last_bet_id != 0) && ($odds_change != 1)) {
            $return = array(
                "status" => 'ok',
                "message" => 'Bet has been placed and matched successfully',
                "Id" => $last_bet_id,
                "ID2" => $odds_change
            );

            $add_exposure_amount = add_net_exposure_v2($conn, $user_id, $current_bet);
        } else if ($odds_change == 1) {
            $return = array(
                "status" => 'unmatched',
                "bet_id" => $last_unmtached_bet_id,
                "message" => 'Bet Place Successfully With Unmatched Status.',
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
        } else if ($status_changed == 10) {
            $return = array(
                "status" => 'error',
                "message" => 'Ball is running, please try again.',
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
        } else if ($status_changed == 6) {
            $return = array(
                "status" => 'error',
                "message" => 'Odds suspended, please try again.',
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
        } else {
            $return = array(
                "status" => 'error',
                "message" => 'Something went wrong, please try again.',
                "Id" => $last_bet_id,
                "ID2" => $odds_change,
                "Status" => $status_changed,
                "q" => $query,
                "m" => $marketId
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
        }
    } else {
        //fancy code
        //check_already_result
        $check_result_done = $conn->query("select * from result where eventId='$eventId' and marketId='$marketId' ");
        $fetch_check_result_done = mysqli_fetch_assoc($check_result_done);
        if ($fetch_check_result_done != null) {
            $return = array(
                "status" => 'error',
                "message" => "Bet Closed.",
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
            echo json_encode($return);
            exit();
        }
        if ($fancy_min_stake_limit > $stack) {
            $return = array(
                "status" => 'error',
                "message" => "Your Minimum Stake Limit is $fancy_min_stake_limit.",
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
            echo json_encode($return);
            exit();
        }
        if ($fancy_max_stake_limit < $stack) {
            $return = array(
                "status" => 'error',
                "message" => "Your Maximum Stake Limit is $fancy_max_stake_limit.",
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
            echo json_encode($return);
            exit();
        }
//            $eventName = $_REQUEST['bet_event_name'];

        $market_type = $conn->real_escape_string($_POST['market_odd_name']);

        $url = SPORTS_DATA_URL . $oddsmarketId;

        $data = file_get_contents($url);

        $data = json_decode($data);

        $serverTime = $data->serverTime / 1000;
        $unixServerTime = substr($serverTime, 0, strpos($serverTime, "."));
		
        if ($unixServerTime < ($time - CASINO_DELAY_TIME)) {
            $return = array(
                "status" => 'error',
                "message" => 'Bet Suspended.',
                
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
            echo json_encode($return);
            exit();
        }

        //$eventName = $data->cricket[0][0]->runners[1]->name . ' vs ' . $data->cricket[0][0]->runners[0]->name;

        if ($market_type == "FANCY_ODDS") {
            $get_m_type_data = "session";
            $data = $data->session[0]->value->session;
        } else if ($market_type == "FANCY1_ODDS") {
            $get_m_type_data = "session1";
            $data = $data->session1[0]->value->session;
        } else if ($market_type == "KHADO_ODDS") {
            $get_m_type_data = "khado";
            $data = $data->khado[0]->value->session;
        } else if ($market_type == "BALL_ODDS") {
            $get_m_type_data = "ballByBall";
            $data = $data->ballByBall[0]->value->session;
        } else if ($market_type == "METER_ODDS") {
            $get_m_type_data = "meter";
            $data = $data->meter[0]->value->session;
        } else if ($market_type == "ODDEVEN_ODDS") {
            $get_m_type_data = "oddEven";
            $data = $data->oddEven[0]->value->session;
        }

        foreach ($data as $live_market_rate) {
            if ($live_market_rate->SelectionId == $marketId) {
                $status = $live_market_rate->GameStatus;
                $statusLabel = $live_market_rate->GameStatus;

                $marketName = $live_market_rate->RunnerName;
                $oddsNo = $live_market_rate->LaySize1;
                $oddsYes = $live_market_rate->BackSize1;
                
                
                $layPrice1 = $live_market_rate->LayPrice1;
                $backPrice1 = $live_market_rate->BackPrice1;
                
                if($type == 'Yes' && (floatVal($runs) != floatVal($backPrice1))){
                	$return = array(
						"status"=>'error',
						"message"=>'Odds is Invalid, please try again later.',
						"run"=>$runs . ' - ' .$backPrice1,
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
                }
                else if($type == 'No' && (floatVal($runs) != floatVal($layPrice1))){
                	$return = array(
						"status"=>'error',
						"message"=>'Odds is Invalid, please try again later.',
						"run"=>$runs . ' - ' .$layPrice1,
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
                }
                
                $oddsYes_ = $oddsYes;
                $oddsNo_ = $oddsNo;
                if(in_array($market_type ,array("FANCY1_ODDS","ODDEVEN_ODDS","METER_ODDS","KHADO_ODDS"))){
                	$oddsYes_ = $backPrice1;
                	$oddsNo_ = $layPrice1;
                }
                
                if($type == 'Yes' && (floatVal($odds) != floatVal($oddsYes_))){
                	$return = array(
						"status"=>'error',
						"message"=>'Odds is Invalid, please try again later.',
						"odds"=>$odds . ' - ' .$oddsYes_,
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
                }
                else if($type == 'No' && (floatVal($odds) != floatVal($oddsNo_))){
                	$return = array(
						"status"=>'error',
						"message"=>'Odds is Invalid, please try again later.',
						"odds"=>$odds . ' - ' .$oddsNo_,
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
                }
                $total_odds = $oddsNo + $oddsYes;
                /* if($total_odds > 200){
                  $return = array(
                  "status"=>'error',
                  "message"=>'Odds is Invalid, please try again later.',
                  );
                  echo json_encode($return);
                  exit();
                  } */
                $eventName = str_replace("'", "", $eventName);
                $marketName = str_replace("'", "", $marketName);

                if ($market_type == "ODDEVEN_ODDS") {
                    if ($type == 'Yes')
                        $marketName .= ' (ODD)';
                    else
                        $marketName .= ' (EVEN)';
                    $type = 'Yes';
                }

                if ($statusLabel != "") {
                    $return = array(
                        "status" => 'error',
                        "message" => $statusLabel,
                    );
                    save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                    echo json_encode($return);
                    exit();
                } else {
                
                	if($oddsmarketId != ELECTION_MARKET_ID){
						if($get_m_type_data == 'ballByBall'){
							if(!(strpos($marketName, 'Only ') !== false)){   /* Only not found	*/
								//if(strpos($marketName, 'over run') !== false){
									continue;
								//}
							}
						}
                	}
                	
                    if ($type == 'No') {

                        $runsNo = $live_market_rate->LayPrice1;
                        if ($market_type == "FANCY1_ODDS" || $market_type == "ODDEVEN_ODDS") {
                            $oddsNo = $runsNo;
                            $bet_margin_used = $stack * ($oddsNo - 1);
                            $bet_win_amount = $stack;
                        } else if ($market_type == "METER_ODDS") {
                            $oddsNo = $runsNo;
                            $bet_margin_used = $margin_used;
                            $bet_win_amount = 0;
                        } else {
                            $oddsNo = $live_market_rate->LaySize1;
                            $bet_margin_used = ($stack * $oddsNo) / 100;
                            $bet_win_amount = $stack;
                        }

                        if (in_array($market_type, array('ODDEVEN_ODDS', 'FANCY1_ODDS', 'BALL_ODDS')))
                            $market_type = 'FANCY_ODDS';

                        $insert_trade = $conn->query("insert into bet_details (`bet_ip_address`,`bet_user_agent`,`event_id`,`event_type`,`oddsmarketId`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$bet_ip_address','$bet_user_agent','$eventId','$eventType','$oddsmarketId','$marketId','$user_id','$eventName','$marketName','$market_type','No','$runsNo','$oddsNo','$stack','0','$bet_margin_used','$bet_time','1','$bet_win_amount')");
                        $last_bet_id = $conn->insert_id;

                        if ($market_type == "METER_ODDS") {
                            $exposure_amount = $margin_used;
                            update_exposure($conn, $user_id, $eventId, $marketId, $eventId, "-$exposure_amount");
                        } else {
                            $add_exposure_amount = add_net_exposure_v2($conn, $user_id, $current_bet);
                        }
                    } else if ($type == 'Yes') {

                        $runsYes = $live_market_rate->BackPrice1;
                        if ($market_type == "FANCY1_ODDS" || $market_type == "ODDEVEN_ODDS") {
                            $oddsYes = $runsYes;
                            $bet_win_amount = $stack * ($oddsYes - 1);
                            $bet_margin_used = $stack;
                        } else if ($market_type == "METER_ODDS") {
                            $oddsYes = $runsYes;
                            $bet_margin_used = $margin_used;
                            $bet_win_amount = 0;
                        } else {
                            $oddsYes = $live_market_rate->BackSize1;
                            $bet_win_amount = ($stack * $oddsYes) / 100;
                            $bet_margin_used = $stack;
                        }

                        if ($market_type == "KHADO_ODDS") {
                            $runsNo = $live_market_rate->LayPrice1;
							$runsNo = $runsNo - 1;
                            $bet_runs2 = $runsYes + $runsNo;

                            $insert_trade = $conn->query("insert into bet_details (`bet_ip_address`,`bet_user_agent`,`event_id`,`event_type`,`oddsmarketId`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_runs2`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$bet_ip_address','$bet_user_agent','$eventId','$eventType','$oddsmarketId','$marketId','$user_id','$eventName','$marketName','$market_type','Yes','$runsYes','$bet_runs2','$oddsYes','$stack','0','$bet_margin_used','$bet_time','1','$bet_win_amount')");
                        } else {

                            if (in_array($market_type, array('ODDEVEN_ODDS', 'FANCY1_ODDS', 'BALL_ODDS')))
                                $market_type = 'FANCY_ODDS';

                            $insert_trade = $conn->query("insert into bet_details (`bet_ip_address`,`bet_user_agent`,`event_id`,`event_type`,`oddsmarketId`,`market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`) values('$bet_ip_address','$bet_user_agent','$eventId','$eventType','$oddsmarketId','$marketId','$user_id','$eventName','$marketName','$market_type','Yes','$runsYes','$oddsYes','$stack','0','$bet_margin_used','$bet_time','1','$bet_win_amount')");
                        }
                        $last_bet_id = $conn->insert_id;

                        if ($market_type == "METER_ODDS") {
                            $exposure_amount = $margin_used;

                            update_exposure($conn, $user_id, $eventId, $marketId, $eventId, "-$exposure_amount");
                        } else {

                            $add_exposure_amount = add_net_exposure_v2($conn, $user_id, $current_bet);
                        }
                    }
                }
            }
        }
        if ($last_bet_id != null or $last_bet_id != 0) {
            $return = array(
                "status" => 'ok',
                "message" => 'Bet has been placed and matched successfully',
            );
        } else if ($odds_change == 1) {
            $return = array(
                "status" => 'error',
                "message" => 'Odds Change, please try again.',
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
        } else if ($status_changed == 10) {
            $return = array(
                "status" => 'error',
                "message" => 'Ball is running, please try again.',
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
        } else if ($status_changed == 6) {
            $return = array(
                "status" => 'error',
                "message" => 'Odds suspended, please try again.',
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
        } else {
            $return = array(
                "status" => 'error',
                "message" => 'Something went wrong, please try again.',
                "data" => $data
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
        }
    }
}
echo json_encode($return);
?>