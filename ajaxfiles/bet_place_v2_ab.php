<?php

	include('../include/conn.php');
	include('../include/flip_function.php');
	include('../include/flip_function2.php');
	include "../session.php";
	include('../include/market_limit.php');
	include('../include/rejection_log.php');

	header("Access-Control-Allow-Origin: ".WEB_URL);

	/* error_reporting(E_ALL);
	ini_set("display_errors",1);
	ini_set("display_startup_errors",1); */

	$host = SITE_IP;
	require '../vendor/autoload.php';

	use ElephantIO\Client;
	use ElephantIO\Engine\SocketIO\Version2X;

	$bet_ip_address = '';
	if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
		$bet_ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	else{
		$bet_ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	}

	$bet_user_agent = $_SERVER['HTTP_USER_AGENT'];

	$user_id = $_SESSION['CLIENT_LOGIN_ID'];

	
	$check_user_active_status = $conn->query("select Status,bet_status,fancy_bet_status from user_master where Id=$user_id");
	$fetch_check_user_active_status = mysqli_fetch_assoc($check_user_active_status);
	$user_status = $fetch_check_user_active_status['Status'];
	$user_bet_status = $fetch_check_user_active_status['bet_status'];
	$user_fancy_bet_status = $fetch_check_user_active_status['fancy_bet_status'];
	if ($user_status == 0) {
		$return = array(
			"status" => 'error',
			"message" => 'Your Account is Blocked.',
		);
		echo json_encode($return);
		exit();
	}

	$bet_status = $fetch_check_user_active_status['bet_status'];

	if ($bet_status == 0) {
		$return = array(
			"status" => 'error',
			"message" => 'Your Bet is Blocked, Please contact your upline.',
		);
		echo json_encode($return);
		exit();
	}
	
	$get_parent_ids = $conn->query("select * from user_master where Id=$user_id");
	$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);

	$parentDL = $fetch_parent_ids['parentDL'];
	$parentMDL = $fetch_parent_ids['parentMDL'];
	$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
	$parentKingAdmin = $fetch_parent_ids['parentKingAdmin'];
	$soccer_access = $fetch_parent_ids['soccer_access'];
	$tennis_access = $fetch_parent_ids['tennis_access'];
	
	$get_parentDL_status = $conn->query("select * from user_master where Id=$parentDL");
	$fetch_get_parentDL_status = mysqli_fetch_assoc($get_parentDL_status);
	$dl_status = $fetch_get_parentDL_status['Status'];
	$dl_bet_status = $fetch_get_parentDL_status['bet_status'];
	$dl_fancy_bet_status = $fetch_get_parentDL_status['fancy_bet_status'];

	$get_parentMDL_status = $conn->query("select * from user_master where Id=$parentMDL");
	$fetch_get_parentMDL_status = mysqli_fetch_assoc($get_parentMDL_status);
	$mdl_status = $fetch_get_parentMDL_status['Status'];
	$mdl_bet_status = $fetch_get_parentMDL_status['bet_status'];
	$mdl_fancy_bet_status = $fetch_get_parentMDL_status['fancy_bet_status'];

	$get_parentSMDL_status = $conn->query("select * from user_master where Id=$parentSuperMDL");
	$fetch_get_parentSMDL_status = mysqli_fetch_assoc($get_parentSMDL_status);
	$smdl_status = $fetch_get_parentSMDL_status['Status'];
	$smdl_bet_status = $fetch_get_parentSMDL_status['bet_status'];
	$smdl_fancy_bet_status = $fetch_get_parentSMDL_status['fancy_bet_status'];

	$get_parentKingAdmin_status = $conn->query("select * from user_master where Id=$parentKingAdmin");
	$fetch_get_parentKingAdmin_status = mysqli_fetch_assoc($get_parentKingAdmin_status);
	$kingadmin_status = $fetch_get_parentKingAdmin_status['Status'];
	$kingadmin_bet_status = $fetch_get_parentKingAdmin_status['bet_status'];
	$kingadmin_fancy_bet_status = $fetch_get_parentKingAdmin_status['fancy_bet_status'];

	if ($dl_status == 0 || $mdl_status == 0 || $smdl_status == 0 || $kingadmin_status == 0) {
		$return = array(
			"status" => 'error',
			"message" => 'Your Account is Blocked.',
		);
		echo json_encode($return);
		exit();
	}

	if ($dl_bet_status == 0 || $mdl_bet_status == 0 || $smdl_bet_status == 0 || $kingadmin_bet_status == 0) {
		$return = array(
			"status" => 'error',
			"message" => 'Your Bet is Blocked, Please contact your upline.',
		);
		echo json_encode($return);
		exit();
	}

	$odds_change = 0;
	$status_changed = 0;
	
	$eventManualType = $conn->real_escape_string($_POST['eventManualType']);

	$eventType = $conn->real_escape_string($_POST['eventType']);
	$eventId = intVal($conn->real_escape_string($_POST['eventId']));
	$oddsmarketId = $conn->real_escape_string($_POST['oddsmarketId']);
	$marketId = $conn->real_escape_string($_POST['marketId']);
	$market_runner_name = $conn->real_escape_string($_POST['market_runner_name']);
	$marketName = $conn->real_escape_string($_POST['market_runner_name']);
	$market_type = $conn->real_escape_string($_POST['bet_market_type']);
	$stack = $conn->real_escape_string($_POST['stack']);
	$odds = $conn->real_escape_string($_POST['odds']);
	$runs = $conn->real_escape_string($_POST['runs']);
	$type = $conn->real_escape_string($_POST['type']);
	$bet_type_main = $conn->real_escape_string($_POST['bet_type']);
	$bet_runner_id = $conn->real_escape_string($_POST['bet_runner_id']);

	$bet_runs2 = 0;
	
	if($market_type == "KHADO_ODDS"){
		$runsYesInput = $runs;
	}
	
	$row_count_bet_1 = false; 
	if($eventType == 4){
		$check_bet_already = $conn->query("select * from bet_details where event_id=$eventId and market_id=$marketId and market_type='$market_type' LIMIT 1");
		$row_count_bet = mysqli_num_rows($check_bet_already);
		if($row_count_bet == 0){
			$row_count_bet_1 = true;
			

			$options = [
				'context' => [
					'ssl' => [
						'verify_peer' => false,
						 'verify_peer_name' => false
					]
				]
			];
			
			$client = new Client(new Version2X(SITE_IP.'?token=abcdefg',$options));
			$client->initialize();
		}
	}
	
	if($market_type == "FANCY_ODDS" or $market_type == "KHADO_ODDS"){
		sleep(1);
	}
	else if($market_type == "BOOKMAKER_ODDS" ||  $market_type == "BOOKMAKERSMALL_ODDS"){
	}
	else{
		sleep(5);
	}
	
	if ($eventType == 8 || $eventId == ELECTION_EVENT_ID || $oddsmarketId == ELECTION_MARKET_ID) {
		$return = array(
			"status" => 'error',
			"message" => 'Bet Allowed only Cricket and Casino.',
		);
		save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
		echo json_encode($return);
		exit();
	}
	
	
	
	if($eventType == 2){
		if($tennis_access == 0){
			$return = array(
				"status" => 'error',
				"message" => 'Bet Not Allowed in Tennis.',
			);
			save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
			echo json_encode($return);
			exit();
		}
	}

	if($eventType == 1){
		if($soccer_access == 0){
			$return = array(
				"status" => 'error',
				"message" => 'Bet Not Allowed in Soccer.',
			);
			save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
			echo json_encode($return);
			exit();
		}
	}
	
	$check_sport_block = $conn->query("select * from block_sport where event_type=$eventType  and block_by IN ($parentDL,$parentMDL,$parentSuperMDL,$parentKingAdmin)");
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

	$check_event_block = $conn->query("select * from block_event_id where event_type=$eventType and event_id=$eventId  and block_by IN ($parentDL,$parentMDL,$parentSuperMDL,$parentKingAdmin)");
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

	$check_market_block = $conn->query("select * from block_event_id where market_id=$marketId  and event_id=$eventId  and block_by IN ($parentDL,$parentMDL,$parentSuperMDL,$parentKingAdmin)");
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
	
	$bet_time = date('Y-m-d H:i:s');
	$time = time();
	if ($type != 'No' and $type != 'Yes') {
		$return = array(
			"status" => 'error',
			"message" => 'Invalid Bet Type.',
		);
		save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
		echo json_encode($return);
		exit();
	}
	
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

	$maximum_match_odds_limit = 8;
	if($eventId == 780537067){
		$maximum_match_odds_limit = 8;
	}
	
	if($market_type == "MATCH_ODDS" && $odds > $maximum_match_odds_limit){
        $return = array(
            "status" => 'error',
            "message" => 'Bet Not Accept Rate Over '.$maximum_match_odds_limit.'.00 on Oneday and T20.',
        );
        save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
        echo json_encode($return);
        exit();        
    }
	
	if($market_type == "BOOKMAKER_ODDS" || $market_type == "BOOKMAKERSMALL_ODDS"){
            $odds = $odds / 100;
            $odds = $odds + 1;
            $runs = $odds;
    }
	
	$exposure_balance_sport_wise =0;
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
            "bet_event_type" => $eventType,
            "bet_event_id" => $eventId,
            "bet_market_id" => $marketId,
            "bet_runner_id" => $bet_runner_id,
            "bet_margin_used" => $margin_used,
            "bet_win_amount" => $bet_win_amount,
            "bet_type" => $exposure_bet_type,
            "bet_market_type" => $market_type,
            "stack" => $stack,
            "runs" => $runs,
        );
        
        $market_exposure = get_net_exposure_match_oods($conn,$user_id,$eventId,$market_type,$exposure_bet_type,$stack,$runs,$current_bet);
        
		
		$sql_market_limit = $conn->query("select * from event_market_limit where event_id=$eventId AND oddsmarketId='$oddsmarketId'");
		$market_limit_data = mysqli_fetch_assoc($sql_market_limit);	
		
		if($eventType != 4){
			
			if(!empty($market_limit_data)){
			
				if($market_exposure == 0){
					$market_exposure = $margin_used;
				}
				else{
					$market_exposure = ($market_exposure > 0) ? 0:abs($market_exposure);
				}
				
				$max = $market_limit_data['match_max'];
				
				if($market_type == 'BOOKMAKER_ODDS' || $market_type == 'BOOKMAKERSMALL_ODDS'){
					$max = $market_limit_data['bookmaker_max'];
				}
				
				
				
					if($max == 1 ){
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
				
					if($stack > $max && $check_check_limit ){
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
				
				
				
			}
			else{
				if($market_exposure == 0){
					$market_exposure = $margin_used;
				}
				else{
					$market_exposure = ($market_exposure > 0) ? 0:abs($market_exposure);
				}
				if($eventType == 4){
						$max = 50000;
					if($market_type == 'BOOKMAKER_ODDS'){
						$max = 200000;
					}
					if($market_type == 'BOOKMAKERSMALL_ODDS'){
						$max = 200000;
					}
				}
				else{
					$max = 50000;
					
				}
				
				if($max < $stack){
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
			}
		}
        $exposure_balance = get_net_exposure_during_placing_v3($conn, $user_id, $current_bet);
		
		
        $exposure_balance_sport_wise = $exposure_balance;
    }
	else if ($market_type == "METER_ODDS"){

        $url = SPORTS_DATA_URL . $oddsmarketId;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
		curl_setopt($ch, CURLOPT_TIMEOUT, CURL_TIMEOUT);

		$get_data = curl_exec($ch);

		$er = curl_error($ch);
		curl_close($ch);

		$data = json_decode($get_data);


        $serverTime = $data->serverTime / 1000;
        $unixServerTime = $serverTime;

        if ($unixServerTime < ($time - CASINO_DELAY_TIME)) {
            $return = array(
                "status" => 'error',
                "message" => 'Bet Suspended.',
            );
            save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
            echo json_encode($return);
            exit();
        }

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
	}
	else{
        
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
            "bet_runner_id" => $bet_runner_id,
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
    $available_balance = $account_balance + $total_exposure;
    
    /*$available_balance = number_format($available_balance, 2);*/
    if ($available_balance < 0) {
        $return = array(
            "status" => 'error',
            "message" => 'Bet Not Confirm Check Exposer Limit And Balance.'. number_format(abs($total_exposure),2,".",""),//'Insufficient Funds.',
        );
        save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
        echo json_encode($return);
        exit();
    }
	
	$min_stake_limit = $fetch_parent_ids['min_stake'];
    $max_stake_limit = $fetch_parent_ids['max_stake'];
    
	$min_cricket_stake = $fetch_parent_ids['min_cricket_stake'];
	$max_cricket_stake = $fetch_parent_ids['max_cricket_stake'];
	
	$min_soccer_stake = $fetch_parent_ids['min_soccer_stake'];
	$max_soccer_stake = $fetch_parent_ids['max_soccer_stake'];
	
	$min_tennis_stake = $fetch_parent_ids['min_tennis_stake'];
	$max_soccer_stake = $fetch_parent_ids['max_tennis_stake'];
	if($eventType == 1){
		$min_stake_limit = $min_soccer_stake;
		$max_stake_limit = $max_soccer_stake;
	}
	else if($eventType == 2){
		$min_stake_limit = $min_tennis_stake;
		$max_stake_limit = $max_soccer_stake;
	}
	else if($eventType == 4){
		$min_stake_limit = $min_cricket_stake;
		$max_stake_limit = $max_cricket_stake;
	}
	
	$fancy_min_stake_limit = $fetch_parent_ids['min_fancy_stake'];
    $fancy_max_stake_limit = $fetch_parent_ids['max_fancy_stake'];
    
    $total_exposure = ($total_exposure > 0)?0:$total_exposure;
    $total_exposure = ($total_exposure > 0)?0:$total_exposure;
	
	if(!empty($fetch_parent_ids['net_exposure_limit']) && $fetch_parent_ids['net_exposure_limit'] < abs($total_exposure)){

		 $return = array(
			"status" => 'error',
			"message" => 'Bet Not Confirm Check Exposer Limit And Balance.'. number_format(abs($exposure_balance),2,".",""),//'Insufficient Funds.',
		);
		save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
		echo json_encode($return);
		exit();
	}
	
	if($eventType == 1){
		if(SOCCER_EXPOSURE_LIMIT < $exposure_balance_sport_wise ){
			 $return = array(
				"status" => 'error',
				"message" => 'No user can have casino exposure above '. number_format(abs(SOCCER_EXPOSURE_LIMIT),2,".",""),//'Insufficient Funds.',
			);
			save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
			echo json_encode($return);
			exit();
		}
	}
	else if($eventType == 2){
		if(TENNIS_EXPOSURE_LIMIT < $exposure_balance_sport_wise ){
			 $return = array(
				"status" => 'error',
				"message" => 'No user can have casino exposure above '. number_format(abs(TENNIS_EXPOSURE_LIMIT),2,".",""),//'Insufficient Funds.',
			);
			save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
			echo json_encode($return);
			exit();
		}
	}


	if ($market_type == "MATCH_ODDS" && $market_type == "BOOKMAKERSMALL_ODDS" && $market_type == "BOOKMAKER_ODDS") {
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
		
		$minimum_match_odds = $fetch_parent_ids['minimum_odds'];
        $maximum_match_odds = $fetch_parent_ids['maximum_odds'];
		
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
        } 
		else{
            //Back
			
            if ($maximum_match_odds != "" or $maximum_match_odds != null or $runs > 20) {
                if ($maximum_match_odds == "" or $maximum_match_odds == null) {
                    if ($market_type == "MATCH_ODDS") {
                        $maximum_match_odds = 8;
						if($event_id == 780537067){
							$maximum_match_odds = 8;
						}
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
	
		$market_runner_name = $conn->real_escape_string($_POST['market_runner_name']);
        $market_odd_name = $conn->real_escape_string($_POST['market_odd_name']);
		
		
	}
	
	$fancy_data = SITE_IP."/getFancyData1?eventId=".$oddsmarketId;
		
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $fancy_data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$data = curl_exec($ch);
	$er = curl_error($ch);
	curl_close($ch);
	
	$data_API = $data;
	$data_API_Fancy = $data;
	$data = json_decode($data);
	$eventName = $data->name;
	if($eventId == 28127348){
		$eventName = "INDIAN PREMIER LEAGUE";
	}
	
	
	$bmdata = $data->bm1;
    $data2 = $data->cricket;
			
	$maxBet = $data2[0]->maxBet;
	$maxxxx = $data2[0]->max; 
	if($market_type == "BOOKMAKERSMALL_ODDS"){
		$maxxxx = 25000;
	}
	
	if($maxBet == 1 and $market_type == "MATCH_ODDS" ){
		$return = array(
			"status" => 'error',
			"message" => 'Maximum Limit is 1.',
		);
		save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
		echo json_encode($return);
		exit();
	}
	
	if($market_exposure == 0){
		$market_exposure = $margin_used;
	}
	else{
		$market_exposure = ($market_exposure > 0) ? 0:abs($market_exposure);
	}
	
	
	if($market_exposure > $maxBet and $market_type == "MATCH_ODDS"){
		$message = "Check Maximum Bet Limit.";
		$return = array(
				"status" => 'error',
				"message" => $message,
				"market_exposure" => $market_exposure,
				"min" => $min,
				"max" => $max,
			);
			save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
			echo json_encode($return);
			exit();
	}
	
	if($eventType == 4 && ($market_type == "BOOKMAKER_ODDS" || $market_type == "BOOKMAKERSMALL_ODDS")){
		if($stack > $maxxxx){
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
	}
	
	$serverTime = $data->serverTime / 1000;
	$unixServerTime = intval($serverTime);
	
	$market_name_array = array();
    $event_team_1 = "";
	$event_team_2 = "";
	
	 foreach ($data2 as $data22) {
		$market_name4 = $data22->marketName;
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
			if($market_type == "BOOKMAKER_ODDS"){
				
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


	
	
	if($market_type == "MATCH_ODDS" || $market_type == "BOOKMAKERSMALL_ODDS" || $market_type == "BOOKMAKER_ODDS"){
		
		
		
		$oldGameId  = $data->oldGameId;
		$matchStartDate123  = $data->matchdate1;
		$matchStartDate12  = $data->matchdate1;
		$matchStartDate  = $data->matchdate1;
		$matchStartDate = $matchStartDate / 1000;
		if($eventType == 4){
			$matchStartDate = $matchStartDate - 330*60;
		}
		$matchStartDateActual = date('Y-m-d H:i:s',strtotime('-15 minutes',$matchStartDate));
		$matchStartDate1 = $matchStartDateActual;
		
		
		
		$current_time = date("Y-m-d H:i:s");
		$start_time = $matchStartDate1;
		
		
		
		
		$bm1_datas = (isset($data->bm1)) ? $data->bm1 : array();
		$data = $data->cricket;
		
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
	
	$time = time();					
	if ($unixServerTime < ($time - CASINO_DELAY_TIME)) {
		$return = array(
			"status" => 'error',
			"message" => 'Bet Suspended!.',
			
		);
		echo json_encode($return);
		exit();
	}
	
	
	$eventName = str_replace("'", "", $eventName);
	if($market_type == "BOOKMAKERSMALL_ODDS"){
		$bm1_data1 = (isset($bm1_datas[0])) ? $bm1_datas[0] : array();
		$bm1_data1 = (isset($bm1_data1->value)) ? $bm1_data1->value : array();
		$bm1_data1 = (isset($bm1_data1->session)) ? $bm1_data1->session : array();
		$small_bm_array = array();
		foreach ($bm1_data1 as $bm1_runner_data) {
			$small_bm_array[] = $bm1_runner_data->SelectionId;
		}
		$event_team_1_id = $small_bm_array[0];
		$event_team_2_id = $small_bm_array[1];
		$event_team_3_id = $small_bm_array[2];
		foreach ($bm1_data1 as $bm1_runner_data) {
					
			$market_selection_id = $bm1_runner_data->SelectionId;
			$market_selection_RunnerName = $bm1_runner_data->RunnerName;
			$market_selection_RunnerName = str_replace(".","",$market_selection_RunnerName);

			$get_market_data = $conn->query("select * from event_market_id where event_id=$eventId and market_id=$market_selection_id and market_type='$market_type'");
			$get_row_market_data = mysqli_num_rows($get_market_data);

			if ($get_row_market_data == 0) {
			
				if ($event_team_1_id == $market_selection_id) {
					
						$conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$market_selection_RunnerName','$market_type')");
				} else {
					if (isset($event_team_3_id)) {
						if ($event_team_3_id == $market_selection_id) {
							$conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$market_selection_RunnerName','$market_type')");
						} else if ($event_team_2_id == $market_selection_id) {
							$conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$market_selection_RunnerName','$market_type')");
						}
					} else {
						if ($event_team_2_id == $market_selection_id) {
							$conn->query("insert into event_market_id (event_id,market_id,market_name,market_type) values($eventId,$market_selection_id,'$market_selection_RunnerName','$market_type')");
						}
					}
				}
			}
		}
	
		foreach ($bm1_data1 as $bm1_runner_data) {
			
			$market_selection_id = $bm1_runner_data->SelectionId;
			$suspendSite = $bm1_runner_data->GameStatus;                      
			
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
			}
		}
	}
	
	foreach($data as $match_data) {
		if($market_odd_name == $data_event_name || $data_event_name == "Most Points" || $market_odd_name == "BOOKMAKER_ODDS") {
			$runners_data = $match_data->runners;
			$bookmaker_data = $match_data->bookmaker;
			$main_status = ($match_data->status == 'OPEN')?'ACTIVE':$match_data->status;
			
			if($market_type == "BOOKMAKER_ODDS"){
				$runners_data11 = $bookmaker_data;


				foreach ($bookmaker_data as $match_odds_selection2) {
					$market_selection_id = $match_odds_selection2->id;
					$market_runner_id = $match_odds_selection2->marketId;
					$get_market_data = $conn->query("select * from event_market_id where event_id=$eventId and market_id=$market_selection_id and market_type='$market_type'");
					$get_row_market_data = mysqli_num_rows($get_market_data);

					if ($get_row_market_data == 0) {


						if ($event_team_1_id == $market_selection_id) {

								$conn->query("insert into event_market_id (event_id,market_id,runner_id,market_name,market_type) values($eventId,$market_selection_id,'$market_runner_id','$event_team_1','$market_type')");
						}
						else {
								if (isset($event_team_3_id)) {
										if ($event_team_3_id == $market_selection_id) {

												$conn->query("insert into event_market_id (event_id,market_id,runner_id,market_name,market_type) values($eventId,$market_selection_id,'$market_runner_id','$event_team_3','$market_type')");
										} else if ($event_team_2_id == $market_selection_id) {

												$conn->query("insert into event_market_id (event_id,market_id,runner_id,market_name,market_type) values($eventId,$market_selection_id,'$market_runner_id','$event_team_2','$market_type')");
										}
								} else {
										if ($event_team_2_id == $market_selection_id) {

												$conn->query("insert into event_market_id (event_id,market_id,runner_id,market_name,market_type) values($eventId,$market_selection_id,'$market_runner_id','$event_team_2','$market_type')");
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
							$market_runner_id = $match_odds_selection2->marketId;

							$get_market_data = $conn->query("select * from event_market_id where event_id=$eventId and market_id=$market_selection_id and market_type='$market_type'");
							$get_row_market_data = mysqli_num_rows($get_market_data);

							if ($get_row_market_data == 0) {


									if ($event_team_1_id == $market_selection_id) {

											$conn->query("insert into event_market_id (event_id,market_id,runner_id,market_name,market_type) values($eventId,$market_selection_id,'$market_runner_id','$event_team_1','$market_type')");
									} else {
											if (isset($event_team_3_id)) {
													if ($event_team_3_id == $market_selection_id) {

															$conn->query("insert into event_market_id (event_id,market_id,runner_id,market_name,market_type) values($eventId,$market_selection_id,'$market_runner_id','$event_team_3','$market_type')");
													} else if ($event_team_2_id == $market_selection_id) {

															$conn->query("insert into event_market_id (event_id,market_id,runner_id,market_name,market_type) values($eventId,$market_selection_id,'$market_runner_id','$event_team_2','$market_type')");
													}
											} else {
													if ($event_team_2_id == $market_selection_id) {

															$conn->query("insert into event_market_id (event_id,market_id,runner_id,market_name,market_type) values($eventId,$market_selection_id,'$market_runner_id','$event_team_2','$market_type')");
													}
											}
									}
							}
					}
			}
		}
	}

	if($market_type == "BOOKMAKER_ODDS"){
		foreach ($bookmaker_data as $match_odds_selection) {
                         
			$market_selection_id = $match_odds_selection->selectionId;

			$suspendSite = $match_odds_selection->status;                            

			if (intVal($match_odds_selection->selectionId) == intVal($marketId)) {

				if ($suspendSite != 'ACTIVE') {
					$return = array(
						"status" => 'error',
						"message" => 'Odds suspended, please try again. 12354',
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
				
				if ($type == "No") {
					$lay_1 = ($match_odds_selection->lay[0]->price / 100) +1 ;
					if ($lay_1 <= $runs && $lay_1 > 1) {
						$margin_used = $stack * ($lay_1 - 1);
						$bet_win_amount = $stack;
						$bet_runs = 0;
						$bet_odds = $lay_1;
					}
					else{
						$return = array(
							"status" => 'error',
							"message" => 'Bet not confirmed, Odds is Changed.123',
						);
						save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
						echo json_encode($return);
						exit();
					}
				}
				else{
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
					
					if ($back_1 >= $runs && $back_1 > 1) {
						$bet_win_amount = $stack * ($back_1 - 1);
						$bet_runs = 0;
						$bet_odds = $back_1;
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
	else if($market_type == "MATCH_ODDS"){
		foreach ($runners_data11 as $match_odds_selection) {
			
			$market_selection_id = $match_odds_selection->id;
						
			$marketStatus = $match_odds_selection->marketStatus;
			$suspendSite = ($match_odds_selection->status == 'OPEN')?'ACTIVE':$match_odds_selection->status;
			if ($suspendSite != 'ACTIVE' ) {
				$return = array(
					"status" => 'error',
					"message" => "Odds suspended, please try again.",
				);
				save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
				echo json_encode($return);
				exit();
			}

			if (intVal($match_odds_selection->id) == intVal($marketId)) {
				if($marketStatus == 1){
					$return = array(
						"status" => 'error',
						"message" => "Market is inactive.",
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
				else if($marketStatus == 4){
					$return = array(
						"status" => 'error',
						"message" => "Market is closed.",
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
				else if($marketStatus == 3){
					$return = array(
						"status" => 'error',
						"message" => "Market is suspended.",
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
				
				if ($type == "No") {                                    
					$lay_1 = $match_odds_selection->lay[0]->price;
					$minimum_match_odds_limit =1;
					
					$lay_2 = $match_odds_selection->lay[1]->price;
					$lay_3 = $match_odds_selection->lay[2]->price;

					if ($lay_1 <= $runs) {
						$margin_used = $stack * ($lay_1 - 1);
						$bet_win_amount = $stack;
						$bet_margin_used = $margin_used;
						$bet_runs = 0;
						$bet_odds = $lay_1;
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
				else{
					$back_1 = $match_odds_selection->back[0]->price;
					$back_2 = $match_odds_selection->back[1]->price;
					$back_3 = $match_odds_selection->back[2]->price;
					$bet_win_amount = $stack * ($back_1 - 1);
					$bet_margin_used = $stack;
					$maximum_match_odds_limit = 8;
					if($eventId == 780537067){
						$maximum_match_odds_limit = 8;
					}
					if($market_type == "MATCH_ODDS" && $back_1 > $maximum_match_odds_limit){
						$return = array(
							"status" => 'error',
							"message" => 'Bet Not Accept Rate Over '.$maximum_match_odds_limit.'.00 .',
						);
						save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
						echo json_encode($return);
						exit();        
					}
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
						$bet_runs = 0;
						$bet_odds = $back_1;
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
	
	if($market_type != "MATCH_ODDS" && $market_type != "BOOKMAKERSMALL_ODDS" && $market_type != "BOOKMAKER_ODDS"){
		$data_API_Fancy = json_decode($data_API_Fancy);
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
		
		$market_type = $conn->real_escape_string($_POST['market_odd_name']);
		
		if ($user_fancy_bet_status == 0 || $dl_fancy_bet_status == 0 || $mdl_fancy_bet_status == 0 || $smdl_fancy_bet_status == 0 || $kingadmin_fancy_bet_status == 0) {
			$return = array(
				"status" => 'error',
				"message" => 'Your Fancy Bets are Blocked',
			);
			echo json_encode($return);
			exit();
		}
        if ($market_type == "FANCY_ODDS") {
            $get_m_type_data = "session";
            $data_overByOver = $data_API_Fancy->overByOver[0]->value->session;
            $data_Fancy = $data_API_Fancy->session[0]->value->session;
            
        } else if ($market_type == "FANCY1_ODDS") {
			
            $get_m_type_data = "session1";
            $data_Fancy = $data_API_Fancy->session1[0]->value->session;
        } else if ($market_type == "KHADO_ODDS") {
            $get_m_type_data = "khado";
            $data_Fancy = $data_API_Fancy->khado[0]->value->session;
        } else if ($market_type == "BALL_ODDS") {
            $get_m_type_data = "ballByBall";
            $data_Fancy = $data_API_Fancy->ballByBall[0]->value->session;
        } else if ($market_type == "METER_ODDS") {
            $get_m_type_data = "meter";
            $data_Fancy = $data_API_Fancy->meter[0]->value->session;
        } else if ($market_type == "ODDEVEN_ODDS") {
            $get_m_type_data = "oddEven";
            $data_Fancy = $data_API_Fancy->oddEven[0]->value->session;
        }
		
		foreach ($data_Fancy as $live_market_rate) {
			if ($live_market_rate->SelectionId == $marketId) {
				
				$status = $live_market_rate->GameStatus;
				$statusLabel = $live_market_rate->GameStatus;
				$marketStatus = $live_market_rate->marketStatus;
				$api_fancy_min = $live_market_rate->Min;
				$api_fancy_Max = $live_market_rate->Max;
				
				if ($api_fancy_min > $stack) {
					$return = array(
						"status" => 'error',
						"message" => "Your Minimum Stake Limit is $api_fancy_min.",
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
				if ($api_fancy_Max < $stack) {
					$return = array(
						"status" => 'error',
						"message" => "Your Maximum Stake Limit is $api_fancy_Max.",
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
				
                $marketName = $live_market_rate->RunnerName;
                $runner_name1 = $live_market_rate->RunnerName1;
                $oddsNo = $live_market_rate->LaySize1;
                $oddsYes = $live_market_rate->BackSize1;
				
                
                $eventName = str_replace("'", "", $eventName);
                $marketName = str_replace("'", "", $marketName);

                if ($market_type == "ODDEVEN_ODDS") {
                    if ($type == 'Yes')
                        $marketName .= ' (ODD)';
                    else
                        $marketName .= ' (EVEN)';
                    $type = 'Yes';
                }

				if($marketStatus == 1){
					$return = array(
						"status" => 'error',
						"message" => "Market is inactive.",
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
				else if($marketStatus == 4){
					$return = array(
						"status" => 'error',
						"message" => "Market is closed.",
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
				else if($marketStatus == 3){
					$return = array(
						"status" => 'error',
						"message" => "Market is suspended.",
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
				
                if ($statusLabel != "") {
                    $return = array(
                        "status" => 'error',
                        "message" => $statusLabel,
                    );
                    save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                    echo json_encode($return);
                    exit();
                }
				
				 if ($type == 'No') {

                        $runsNo = $live_market_rate->LayPrice1;
                        $bet_runs = $live_market_rate->LayPrice1;
                        if ($market_type == "FANCY1_ODDS" || $market_type == "ODDEVEN_ODDS") {
                            $oddsNo = $runsNo;
                            $bet_odds = $runsNo;
                            $bet_runs = $runsNo;
                            $bet_margin_used = $stack * ($oddsNo - 1);
                            $bet_win_amount = $stack;
                        } else if ($market_type == "METER_ODDS") {
                            $oddsNo = $runsNo;
                            $bet_odds = $runsNo;
                            $bet_runs = $runsNo;
                            $bet_margin_used = $margin_used;
                            $bet_win_amount = 0;
                        } else {
                            $oddsNo = $live_market_rate->LaySize1;
                            $bet_odds = $live_market_rate->LaySize1;
                            $bet_margin_used = ($stack * $oddsNo) / 100;
                            $bet_win_amount = $stack;
                        }

                       
				}
				else{
					$runsYes = $live_market_rate->BackPrice1;
					$bet_runs = $live_market_rate->BackPrice1;
                    $runsNo = $live_market_rate->LayPrice1;
					if ($market_type == "FANCY1_ODDS" || $market_type == "ODDEVEN_ODDS") {
						
						$oddsYes = $runsYes;
						$bet_odds = $runsYes;
						$bet_runs = $runsYes;
						$bet_win_amount = $stack * ($oddsYes - 1);
						$bet_margin_used = $stack;
					} else if ($market_type == "METER_ODDS") {
						$oddsYes = $runsYes;
						$bet_odds = $runsYes;
						$bet_runs = $runsYes;
						$bet_margin_used = $margin_used;
						$bet_win_amount = 0;
					} else {
						
						$oddsYes = $live_market_rate->BackSize1;
						$bet_odds = $live_market_rate->BackSize1;
						if ($market_type == "KHADO_ODDS") {
							$oddsNo = 100;
							$oddsYes = 100;
							$bet_odds = 100;
						}
						$bet_win_amount = ($stack * $oddsYes) / 100;
						$bet_margin_used = $stack;
					}
					
					if ($market_type == "KHADO_ODDS") {
							
							
							$check_khado_already = $conn->query("select * from bet_details where user_id='$user_id' and market_id='$marketId' and market_type='KHADO_ODDS' and bet_status=1");
							
							if(mysqli_num_rows($check_khado_already) > 0){
								$return = array(
									"status" => 'error',
									"message" => "You can place only one bet on particular khado market.",
								);
								save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
								echo json_encode($return);
								exit();
							}
							
							$runsNo = $runsNo - 1;
							$bet_runs = $runsYesInput;
                            $bet_runs2 = $runsYesInput + $runsNo;
					 }
				}
			}
		}
	
		foreach ($data_overByOver as $live_market_rate) {
			if ($live_market_rate->SelectionId == $marketId) {
				
				$status = $live_market_rate->GameStatus;
				$statusLabel = $live_market_rate->GameStatus;
				$marketStatus = $live_market_rate->marketStatus;
				$api_fancy_min = $live_market_rate->Min;
				$api_fancy_Max = $live_market_rate->Max;
				
				if ($api_fancy_min > $stack) {
					$return = array(
						"status" => 'error',
						"message" => "Your Minimum Stake Limit is $api_fancy_min.",
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
				if ($api_fancy_Max < $stack) {
					$return = array(
						"status" => 'error',
						"message" => "Your Maximum Stake Limit is $api_fancy_Max.",
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
				
                $marketName = $live_market_rate->RunnerName;
                $runner_name1 = $live_market_rate->RunnerName1;
                $oddsNo = $live_market_rate->LaySize1;
                $oddsYes = $live_market_rate->BackSize1;
				
                
                $eventName = str_replace("'", "", $eventName);
                $marketName = str_replace("'", "", $marketName);

                if ($market_type == "ODDEVEN_ODDS") {
                    if ($type == 'Yes')
                        $marketName .= ' (ODD)';
                    else
                        $marketName .= ' (EVEN)';
                    $type = 'Yes';
                }

				if($marketStatus == 1){
					$return = array(
						"status" => 'error',
						"message" => "Market is inactive.",
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
				else if($marketStatus == 4){
					$return = array(
						"status" => 'error',
						"message" => "Market is closed.",
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
				else if($marketStatus == 3){
					$return = array(
						"status" => 'error',
						"message" => "Market is suspended.",
					);
					save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
					echo json_encode($return);
					exit();
				}
				
                if ($statusLabel != "") {
                    $return = array(
                        "status" => 'error',
                        "message" => $statusLabel,
                    );
                    save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
                    echo json_encode($return);
                    exit();
                }
				
				 if ($type == 'No') {
					$runsNo = $live_market_rate->LayPrice1;
					$bet_runs = $live_market_rate->LayPrice1;
					if ($market_type == "FANCY1_ODDS" || $market_type == "ODDEVEN_ODDS") {
						$oddsNo = $runsNo;
						$bet_runs = $runsNo;
						$bet_odds = $runsNo;
						$bet_margin_used = $stack * ($oddsNo - 1);
						$bet_win_amount = $stack;
					} else if ($market_type == "METER_ODDS") {
						$oddsNo = $runsNo;
						$bet_runs = $runsNo;
						$bet_odds = $runsNo;
						$bet_margin_used = $margin_used;
						$bet_win_amount = 0;
					} else {
						$oddsNo = $live_market_rate->LaySize1;
						$bet_odds = $live_market_rate->LaySize1;
						$bet_margin_used = ($stack * $oddsNo) / 100;
						$bet_win_amount = $stack;
					}
					if ($market_type == "KHADO_ODDS") {
						
						
						$check_khado_already = $conn->query("select * from bet_details where user_id='$user_id' and market_id='$marketId' and market_type='KHADO_ODDS' and bet_status=1");
						
						if(mysqli_num_rows($check_khado_already) > 0){
							$return = array(
								"status" => 'error',
								"message" => "You can place only one bet on particular khado market.",
							);
							save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
							echo json_encode($return);
							exit();
						}
						
						
						
						$runsNo = $runsNo - 1;
						$bet_runs = $runsYesInput;
						$bet_runs2 = $runsYesInput + $runsNo;
					}
					if (in_array($market_type, array('ODDEVEN_ODDS', 'FANCY1_ODDS', 'BALL_ODDS', 'KHADO_ODDS'))){
						$market_type = 'FANCY_ODDS';
					}
				}
				else{
					$runsYes = $live_market_rate->BackPrice1;
					$bet_runs = $live_market_rate->BackPrice1;
					$runsNo = $live_market_rate->LayPrice1;
					if ($market_type == "FANCY1_ODDS" || $market_type == "ODDEVEN_ODDS") {
						$oddsYes = $runsYes;
						$bet_runs = $runsYes;
						$bet_odds = $runsYes;
						$bet_win_amount = $stack * ($oddsYes - 1);
						$bet_margin_used = $stack;
					} else if ($market_type == "METER_ODDS") {
						$oddsYes = $runsYes;
						$bet_runs = $runsYes;
						$bet_odds = $runsYes;
						$bet_margin_used = $margin_used;
						$bet_win_amount = 0;
					} else {
						
						$oddsYes = $live_market_rate->BackSize1;
						$bet_odds = $live_market_rate->BackSize1;
						if ($market_type == "KHADO_ODDS") {
							$oddsNo = 100;
							$oddsYes = 100;
							$bet_odds = 100;
						}
						$bet_win_amount = ($stack * $oddsYes) / 100;
						$bet_margin_used = $stack;
					}
					
					if ($market_type == "KHADO_ODDS") {							
						$check_khado_already = $conn->query("select * from bet_details where user_id='$user_id' and market_id='$marketId' and market_type='KHADO_ODDS' and bet_status=1");
						
						if(mysqli_num_rows($check_khado_already) > 0){
							$return = array(
								"status" => 'error',
								"message" => "You can place only one bet on particular khado market.",
							);
							save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
							echo json_encode($return);
							exit();
						}
						
						
						
						$runsNo = $runsNo - 1;
						$bet_runs = $runsYesInput;
						$bet_runs2 = $runsYesInput + $runsNo;
					 }
					 if (in_array($market_type, array('ODDEVEN_ODDS', 'FANCY1_ODDS', 'BALL_ODDS', 'KHADO_ODDS'))){
						$market_type = 'FANCY_ODDS';
					}
				}
			}
		}
	
		
	}
	
	
	if(empty($bet_odds)){
		$return = array(
			"status" => 'error',
			"message" => "Invalid Odds, Please try again",
		);
		save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
		echo json_encode($return);
		exit();
	}
	
	 if (in_array($market_type, array('ODDEVEN_ODDS', 'FANCY1_ODDS', 'BALL_ODDS', 'KHADO_ODDS'))){
							$market_type = 'FANCY_ODDS';
						}
						
	$insert_bet = array(
						"bet_ip_address"=>$bet_ip_address,
						"bet_user_agent"=>$bet_user_agent,
						"event_id"=>$eventId,
						"event_type"=>$eventType,
						"oddsmarketId"=>$oddsmarketId,
						"market_id"=>$marketId,
						"user_id"=>$user_id,
						"event_name"=>$eventName,
						"market_name"=>$marketName,
						"market_type"=>$market_type,
						"bet_type"=>$exposure_bet_type,
						"bet_runs"=>$bet_runs,
						"bet_runs2"=>$bet_runs2,
						"bet_odds"=>$bet_odds,
						"bet_stack"=>$stack,
						"bet_result"=>0,
						"bet_margin_used"=>$margin_used,
						"bet_time"=>$bet_time,
						"bet_status"=>1,
						"bet_win_amount"=>$bet_win_amount,
						"runner_id"=>$bet_runner_id,
						"runner_name1"=>$runner_name1,
						);
	
	$bet_id = insert_query($conn,'bet_details',$insert_bet);
	if($bet_id > 0){
		if($row_count_bet_1){
			
			$bet_data = array(
								"event_type"=>$eventType,
								"oddsmarketId"=>$oddsmarketId,
								"event_name"=>$eventName,
								"event_id"=>$eventId,
								"market_id"=>$marketId,
								"market_name"=>$marketName,
								"market_type"=>$market_type,
								"bet_type"=>$exposure_bet_type,
								"bet_runs"=>$bet_runs,
								"bet_odds"=>$bet_odds,
								"bet_margin_used"=>$margin_used,
								"bet_win_amount"=>$bet_win_amount,
								);
			$client->emit('broadcast1', ['bet_data' => $bet_data]);
			$client->close();
		}
		
		
		if($market_type == "MATCH_ODDS" || $market_type == "BOOKMAKERSMALL_ODDS" || $market_type == "BOOKMAKER_ODDS"){
			/*	Rate update changes	*/ 			
			$current_bet["bet_margin_used"] = $margin_used;
			
			$current_bet["bet_win_amount"] = $bet_win_amount;
			$current_bet["runs"] = $lay_1;
				
			/*	End of Rate update changes	*/
			
			$add_exposure_amount = add_net_exposure_v2($conn, $user_id, $current_bet);

		}
		else{
			if ($market_type == "METER_ODDS") {
				$exposure_amount = $margin_used;
				update_exposure($conn, $user_id, $eventId, $marketId, $eventId, "-$exposure_amount");
			} else {
				
				$add_exposure_amount = add_net_exposure_v2($conn, $user_id, $current_bet);
			}
		}
		
		 $return = array(
                "status" => 'ok',
                "message" => 'Bet placed Successfully',
            );
			echo json_encode($return);
		exit();
	}
	else{
		$return = array(
			"status" => 'error',
			"message" => "Something went wrong, please try again",
		);
		save_rejection_log($conn,$user_id,$return['message'],$market_runner_name);
		echo json_encode($return);
		exit();
	}
	
	function insert_query($conn,$table_name,$data){
		
		$columns = implode(',',array_keys($data));
		
		$values  = implode("','",array_values($data));
		
		$sql = "INSERT INTO $table_name ($columns) VALUES ('$values')";
		$conn->query($sql);
		return $conn->insert_id;
	}
?>