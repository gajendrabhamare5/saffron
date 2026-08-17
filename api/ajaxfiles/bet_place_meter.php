<?php
include('../include/conn.php');
include('../include/flip_function.php');
include('../include/flip_function2.php');
include "../session.php";
error_reporting(0);

$bet_ip_address	 = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$user_id = $_SESSION['CLIENT_LOGIN_ID'];
	
$bet_ip_address = '';
if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
	$bet_ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else{
	$bet_ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
}

$bet_user_agent = $_SERVER['HTTP_USER_AGENT'];
	
	$eventType = $conn->real_escape_string($_REQUEST['eventType']);	
	$m_id = intVal($conn->real_escape_string($_REQUEST['eventId']));
	$oddsmarketId = $conn->real_escape_string($_REQUEST['oddsmarketId']);
	$market_runner_name = $conn->real_escape_string($_REQUEST['market_runner_name']);
	$cmp_id = $conn->real_escape_string($_REQUEST['marketId']);
	$player_id = $cmp_id;
	$market_type = $conn->real_escape_string($_REQUEST['bet_market_type']);
	$stack = $conn->real_escape_string($_REQUEST['stack']);
	$betting_stack_input = $stack;
	$odds = $conn->real_escape_string($_REQUEST['odds']);
	
	$runs = $conn->real_escape_string($_REQUEST['runs']);
	$betting_odds_input = $runs;
	$type = $conn->real_escape_string($_REQUEST['type']);
	$eventName = $conn->real_escape_string($_REQUEST['eventName']);
	
	
	
	$eventId = intVal($conn->real_escape_string($_REQUEST['eventId']));
	
	$marketId = $conn->real_escape_string($_REQUEST['marketId']);
	

	
	$get_mater_market_id = $conn->query("select * from meter_market_mapping where oddsmarket_id=$oddsmarketId");
	$fetch_get_mater_market_id = mysqli_fetch_assoc($get_mater_market_id);
	$spread_match_id = $fetch_get_mater_market_id['spread_id'];
	if($spread_match_id == ""){
		$spread_match_id = 0;
	}

	$check_ball_status = file_get_contents("http://spreadexplay.com/api/check_m_status.php?m_id=$spread_match_id&cmp_id=$cmp_id");
	$check_ball_status = json_decode($check_ball_status);
	
	$current_score = $check_ball_status->cmp_current_score;
	$current_run = $current_score;
	$api_cmp_suspended = $check_ball_status->cmp_suspended;
	$api_m_ball_status = $check_ball_status->m_ball_status;
	$api_m_up_status = $check_ball_status->m_up_status;
	$api_m_down_status = $check_ball_status->m_down_status;
	$odds_down = $check_ball_status->cmp_down;
	$odds_up = $check_ball_status->cmp_up;
	$match_type = $check_ball_status->m_type;
	
	
	if($api_cmp_suspended == 1){
		$alert_message = array(
					"status"=>"error",
					"message"=>"Player is inactive, please bet on another player.",
					);
		$_SESSION['alert_message'] = $alert_message;
		
		echo json_encode($alert_message);
		exit();
	}
	if($api_m_ball_status == "Suspended" or $api_m_up_status == "Suspended" or $api_m_down_status == "Suspended"){
		$alert_message = array(

					"status"=>"error",

					"message"=>"Ball is running",

					);

					$_SESSION['alert_message'] = $alert_message;

			echo json_encode($alert_message);

				exit();
	}
	

	
	if(!isset($betting_stack_input)){

		$alert_message = array(

					"status"=>"error",

					"message"=>"Invalid Stack Amount.",

					);

					$_SESSION['alert_message'] = $alert_message;

			echo json_encode($alert_message);

				exit();

	}

	$get_parent_ids = $conn->query("select * from user_login_master as ulm left outer join user_master as um on um.Id=ulm.UserID where um.Id=$user_id");
	$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
	
	$parentDL = $fetch_parent_ids['parentDL'];
	$parentMDL = $fetch_parent_ids['parentMDL'];		
	$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
	$bet_active = 0;
	$account_active = $fetch_parent_ids['Status'];
	
	
	
	$get_parentDL_status = $conn->query("select * from user_master where Id=$parentDL");
	$fetch_get_parentDL_status = mysqli_fetch_assoc($get_parentDL_status);
	$dl_status = $fetch_get_parentDL_status['Status'];
	
	$get_parentMDL_status = $conn->query("select * from user_master where Id=$parentMDL");
	$fetch_get_parentMDL_status = mysqli_fetch_assoc($get_parentMDL_status);
	$mdl_status = $fetch_get_parentMDL_status['Status'];
	
	$get_parentSMDL_status = $conn->query("select * from user_master where Id=$parentSuperMDL");
	$fetch_get_parentSMDL_status = mysqli_fetch_assoc($get_parentSMDL_status);
	$smdl_status = $fetch_get_parentSMDL_status['Status'];
	
	if($dl_status ==0 or $mdl_status == 0 or $smdl_status ==0 or $bet_active == 1 or $account_active == 0)
	{
	$return = array(
				"status"=>'error',
				"message"=>'Your Account is Blocked.',
			);
			echo json_encode($return);
			exit();
	}

        $bet_status = $fetch_parent_ids['bet_status'];

        if ($bet_status == 0) {
            $return = array(
                "status" => 'error',
                "message" => 'Your Bet is Blocked, Please contact your upline.',
            );
            echo json_encode($return);
            exit();
        }

	
	if($match_type == 'test'){
				if($betting_stack_input < TEST_MIN_LIMIT or $betting_stack_input > TEST_MAX_LIMIT){
						$alert_message = array(
							"status"=>"error",
							"message"=>"You can not bet on $betting_stack_input this stack, You bet Minimum ".TEST_MIN_LIMIT." and maximum ".TEST_MAX_LIMIT.".",
							);
							$_SESSION['alert_message'] = $alert_message;
						echo json_encode($alert_message);
						exit();
				}
			}else if($match_type == 'odi'){
				if($betting_stack_input < ODI_MIN_LIMIT or $betting_stack_input > ODI_MAX_LIMIT){
					$alert_message = array(
							"status"=>"error",
							"message"=>"You can not bet on $betting_stack_input this stack, You bet Minimum ".ODI_MIN_LIMIT." and maximum ".ODI_MAX_LIMIT.".",
							);
							$_SESSION['alert_message'] = $alert_message;
					echo json_encode($alert_message);
						exit();
				}
			}else if($match_type == 't20'){
				if($betting_stack_input < T20_MIN_LIMIT or $betting_stack_input > T20_MAX_LIMIT){
					$alert_message = array(
							"status"=>"error",
							"message"=>"You can not bet on $betting_stack_input this stack, You bet Minimum ".T20_MIN_LIMIT." and maximum ".T20_MAX_LIMIT.".",
							);
							$_SESSION['alert_message'] = $alert_message;
					echo json_encode($alert_message);
					exit();
				}
			}else{
				if($betting_stack_input < T20_MIN_LIMIT or $betting_stack_input > T20_MAX_LIMIT){					
					$alert_message = array(
							"status"=>"error",
							"message"=>"You can not bet on $betting_stack_input this stack, You bet Minimum ".T20_MIN_LIMIT." and maximum ".T20_MAX_LIMIT.".",
							);
							$_SESSION['alert_message'] = $alert_message;
					echo json_encode($alert_message);
						exit();
				}
			}
	
	


			if($type == "Lay" or $type == "No" or $type== "Down"){
				$odds = $odds_down;
			}else{
				$odds = $odds_up;
			}
			if($betting_odds_input != $odds){
						$alert_message = array(
							"status"=>"error",
							"message"=>"Bet Not Confirmed! ",
							);
							$_SESSION['alert_message'] = $alert_message;
					echo json_encode($alert_message);
						exit();
			}
			
			if($match_type == 'test'){
				$margin_used = 150 * $betting_stack_input;
				$margin_amount = 150;
			}else if($match_type == 'odi'){
				$margin_used = 100 * $betting_stack_input;
				$margin_amount = 100;
			}else if($match_type == 't2o'){
				$margin_used = 65 * $betting_stack_input;
				$margin_amount = 65;
			}else{
				$margin_used = 150 * $betting_stack_input;
				$margin_amount = 150;
			}
			
			$check_previous_up_bet = check_current_palyer_previous_up_bet($conn,$cmp_id,$user_id);				
			$check_previous_down_bet = check_current_palyer_previous_down_bet($conn,$cmp_id,$user_id);
			
			
			$total_up_stack = $check_previous_up_bet['total_up_stack'];				
			$total_down_stack =  $check_previous_down_bet['total_down_stack'];
			
			if($total_up_stack == ""){
				$total_up_stack = 0;
			}

			if($total_down_stack == ""){
				$total_down_stack = 0;
			}
		
		
		
		
			if($type == "Lay" or $type == "No" or $type== "Down"){
				$bet_insert_type = "No";
				$total_new_down_stake = $total_down_stack + $betting_stack_input;
				$current_bet_data = array(
									"stack"=>$betting_stack_input,
									"odds"=>$odds,
									"type"=>"No",
									"cmp_current_score"=>$odds,
									);
				
				if($total_up_stack == $total_new_down_stake){
					$margin_used = result_as_per_down_rate($conn,$cmp_id,$user_id,$margin_amount,$odds_down,$current_bet_data);
				}else if($total_up_stack > $total_new_down_stake){
					$margin_used = result_as_per_up_rate($conn,$cmp_id,$user_id,$current_score,$current_bet_data);
				}else{
					$margin_used = result_as_per_down_rate($conn,$cmp_id,$user_id,$margin_amount,$odds_down,$current_bet_data);
				}
			}else{
				$bet_insert_type = "Yes";
				$total_new_up_stake = $total_up_stack + $betting_stack_input;
				$current_bet_data = array(
									"stack"=>$betting_stack_input,
									"odds"=>$odds,
									"type"=>"Yes",
									"cmp_current_score"=>$current_run,
								);
				if($total_new_up_stake == $total_down_stack){
								
					$margin_used = result_as_per_up_rate($conn,$cmp_id,$user_id,$current_score,$current_bet_data);
				}else if($total_new_up_stake > $total_down_stack){
					
					$margin_used = result_as_per_up_rate($conn,$cmp_id,$user_id,$current_score,$current_bet_data);
				}else{
					
					$margin_used = result_as_per_down_rate($conn,$cmp_id,$user_id,$margin_amount,$odds_down,$current_bet_data);
				}
			}
			$prv_exposure_details = user_prv_exposure_except_current_cmp($conn,$user_id,$cmp_id,$spread_match_id);
			$user_balance = user_account_balance($conn,$user_id);
			$usable_balance = $user_balance + $prv_exposure_details;
			if($margin_used < 0){
				
			$margin_used2 = abs($margin_used);
			}else{
				$margin_used2 = 0;
			}
			
			if($margin_used2 <= $usable_balance){
				$exposure_amount = $margin_used;
				update_exposure($conn,$user_id,$m_id,$cmp_id,$spread_match_id,$exposure_amount);
				$bet_time = date('Y-m-d H:i:s');
				$time_stamp = time();
				$marketName = $market_runner_name." meter";
				
				$insert_trade = $conn->query("insert into bet_details (`bet_ip_address`,`event_id`,`event_type`,`oddsmarketId`,`market_id`,`meter_market_id`,`user_id`,`event_name`,`market_name`,`market_type`,`bet_type`,`bet_runs`,`bet_odds`,`bet_stack`,`bet_result`,`bet_margin_used`,`bet_time`,`bet_status`,`bet_win_amount`,`bet_ip_address`,`bet_user_agent`) values('$bet_ip_address','$eventId','$eventType','$oddsmarketId','$marketId','$spread_match_id','$user_id','$eventName','$marketName','$market_type','$bet_insert_type','$odds','$odds','$betting_stack_input','0','$margin_used','$bet_time','1','0','$bet_ip_address','$bet_user_agent')");
				
				$last_bet_id = $conn->insert_id;
				$down_bet_id = $last_bet_id;
				if($last_bet_id != null or $last_bet_id != 0){
					$get_match_details = $conn->query("SELECT * from bet_details as b LEFT OUTER JOIN user_login_master as u ON u.Id=b.user_id where b.bet_id=$down_bet_id   ORDER BY b.market_id,b.bet_time DESC");
					
					while($bet_datas = mysqli_fetch_assoc($get_match_details)){
								$cmp_id = $bet_datas['market_id'];
								$player_name = $bet_datas['market_name'];								
								$bet_bet_time = $bet_datas['bet_time'];
								$odds = $bet_datas['bet_odds'];
								$stack = $bet_datas['bet_stack'];
								$type = $bet_datas['bet_type'];
								$current_up = 0;
								$current_down = 0;
								$cmp_status = 1;
								$bet_status = $bet_datas['bet_status'];
								$b_id = $bet_datas['bet_id'];
								$result = $bet_datas['bet_result'];
								$first_name = $bet_datas['Email_ID'];
								$last_name = "";
								$customer_id = $bet_datas['UserID'];
								$player_current_score = 0;
								$cmp_current_score = 0;
								
								$parent_dl = $bet_datas['parentDL'];
								$parent_mdl = $bet_datas['parentMDL'];
								$parent_smdl = $bet_datas['parentSuperMDL'];
								
								$master_commision =  $conn->query("select * from user_login_master where Id=$parent_dl");
								$fetch_master_commision = mysqli_fetch_assoc($master_commision);
								
								$get_dl_master_name = $fetch_master_commision['Email_ID'];
								
								$super_master_commision =  $conn->query("select * from user_login_master where Id=$parent_mdl");
								$fetch_super_master_commision = mysqli_fetch_assoc($super_master_commision);
								$get_master_name = $fetch_super_master_commision['Email_ID'];
								
								
								$data = array(
									"b_id" => $down_bet_id,
									"cmp_id" => $cmp_id,
									"player_name" => $player_name,
									"odds" => $odds,
									"stack" => $stack,
									"type" => $type,
									"cmp_up" => $current_up,
									"cmp_down" => $current_down,
									"cmp_status" => $cmp_status,
									"bet_status" => $bet_status,
									"b_id" => $b_id,
									"result" => $result,
									"first_name" => $first_name,
									"last_name" => "",
									"customer_id" => $customer_id,
									"player_current_score" => $player_current_score,
									"cmp_current_score" => $cmp_current_score,
									"total_stack" => $stack,									
									"bet_time" => date("H:i:s",strtotime($bet_bet_time)),
									);
							}
								$alert_message = array(
									"status"=>"ok",
									"message"=>"Bet Placed Successfully.",
									"dl"=>$parent_dl,
									"dl_name"=>$get_dl_master_name,
									"mdl"=>$parent_mdl,
									"mdl_name"=>$get_master_name,
									"admin"=>$parent_smdl,
									"data"=>$data,
									);
									$_SESSION['alert_message'] = $alert_message;
							echo json_encode($alert_message);
								exit();
					
				}else{
					$alert_message = array(
									"status"=>'error',
									"message"=>'Something went wrong, please try again.',
									);
					$_SESSION['alert_message'] = $alert_message;
					echo json_encode($alert_message);
					exit();
				}
											
			}else{
				$alert_message = array(
							"status"=>"error",
							"message"=>"Insufficient Funds",
							);
							$_SESSION['alert_message'] = $alert_message;
					echo json_encode($alert_message);
					exit();
			}
		
	
		
?>