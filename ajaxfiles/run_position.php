<?php
	
	include('../include/conn.php');
	// include('../include/flip_function.php');
// 	include('../include/flip_function2.php');
	include "../session.php";
	
	ini_set('display_errors', 1);
 	ini_set('display_startup_errors', 1);
 	error_reporting(E_ALL);
	
	$user_id = $_SESSION['CLIENT_LOGIN_ID'];
	
	$event_id = '30312319';//$conn->real_escape_string($_REQUEST['event_id']);
	$market_id = '5';//$conn->real_escape_string($_REQUEST['market_id']);
	
	/*
	function get_current_bet_fancy_exposure2($conn,$user_id,$event_id,$market_id,$current_bet = array()){
		$get_all_fancy_stake = $conn->query("select * from bet_details where user_id=$user_id and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS'");
		$stack_rate_array = array();
		$fancy_stack_rate_array = array();
		$fancy_all_exposure_data = array();
		while($fetch_get_all_fancy_stake = mysqli_fetch_assoc($get_all_fancy_stake)){
			$stack_rate_array[] = $fetch_get_all_fancy_stake['bet_runs'];
			
		}
		
		$current_bet_event_id = $current_bet['bet_event_id'];
		$current_bet_market_id = $current_bet['bet_market_id'];
		$current_bet_type = $current_bet['bet_type'];
		$current_bet_win_amount = $current_bet['bet_win_amount'];
		$current_bet_margin_used = $current_bet['bet_margin_used'];
		$current_bet_odds = $current_bet['runs'];
		//$current_bet_odds = $current_bet['bet_odds'];
		
		$stack_rate_array[] = $current_bet_odds;
		$stack_rate_unique_array =  array_unique($stack_rate_array);
		sort($stack_rate_unique_array);
		$last_run_value = 0;
		if($stack_rate_unique_array != null){
			$min_run = $stack_rate_unique_array[0];
			$max_run = max($stack_rate_unique_array);
			$i=0;
			$win_amount_yes = 0;
			$win_amount_no = 0;
			$loss_amount_yes = 0;
			$loss_amount_no = 0;
			
			$first_label = $min_run -1;
			$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs < $first_label and bet_type='Yes'");

			$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
			$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

			if($current_bet_type == 'Yes'){
				if($current_bet_odds < $first_label){
					$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
				}
			}
			
			$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");

			$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
			$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];
			
			if($current_bet_type == 'No'){
				if($current_bet_odds > $first_label){
					$win_amount_no = $win_amount_no + $current_bet_win_amount;
				}
			}

			$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");

			$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
			$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

			if($current_bet_type == 'Yes'){
				if($current_bet_odds > $first_label){
					$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
				}
			}
			
			$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs < $first_label and bet_type='No'");

			$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
			$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];
			
			if($current_bet_type == 'No'){
				if($current_bet_odds < $first_label){
					$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
				}
			}
			
			$total_win = $win_amount_yes + $win_amount_no;
			$total_loss = $loss_amount_yes + $loss_amount_no;

			$exposure = $total_win - $total_loss;

			array_push($fancy_all_exposure_data,$exposure);
			
			$win_amount_yes = 0;
			$win_amount_no = 0;
			$loss_amount_yes = 0;
			$loss_amount_no = 0;
			
			foreach($stack_rate_unique_array as $runs){
				if($runs != $max_run){
					$next_value  =$stack_rate_unique_array[$i + 1];
					$new_value = $next_value - 1;
					if($runs == $new_value){
						$new_run_title = "$runs";
					}else{
						$new_run_title = "$runs - $new_value";
					}
					
					$first_label = $new_value;

					$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='Yes'");

					$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
					$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
				
					if($current_bet_type == 'Yes'){
				if($current_bet_odds <= $first_label){
					$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
				}
			}
					
					$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");

					$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
					$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];
					if($current_bet_type == 'No'){
				if($current_bet_odds > $first_label){
					$win_amount_no = $win_amount_no + $current_bet_win_amount;
				}
			}
			
					$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");

					$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
					$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];
					
					if($current_bet_type == 'Yes'){
				if($current_bet_odds > $first_label){
					$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
				}
			}
					
					$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='No'");

					$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
					$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];
					
					if($current_bet_type == 'No'){
				if($current_bet_odds <= $first_label){
					$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
				}
			}		
					$total_win = $win_amount_yes + $win_amount_no;
					$total_loss = $loss_amount_yes + $loss_amount_no;
					$exposure = $total_win - $total_loss;
					array_push($fancy_all_exposure_data,$exposure);
					$i++;
				}
			}
			
			$win_amount_yes = 0;
			$win_amount_no = 0;
			$loss_amount_yes = 0;
			$loss_amount_no = 0;
			$first_label = $max_run;
			$search = $first_label - 1;
			$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='Yes'");

			$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
			$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
			if($current_bet_type == 'Yes'){
				if($current_bet_odds <= $first_label){
					$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
				}
			}
			
			
			$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");
			$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
			$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

			if($current_bet_type == 'No'){
				if($current_bet_odds > $first_label){
					$win_amount_no = $win_amount_no + $current_bet_win_amount;
				}
			}
			
			$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");
			$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
			$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

			if($current_bet_type == 'Yes'){
				if($current_bet_odds > $first_label){
					$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
				}
			}
			
			$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='No'");
			$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
			$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];
			
			if($current_bet_type == 'No'){
				if($current_bet_odds <= $first_label){
					$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
				}
			}
			
			$total_win = $win_amount_yes + $win_amount_no;
			$total_loss = $loss_amount_yes + $loss_amount_no;
			$exposure = $total_win - $total_loss;
			array_push($fancy_all_exposure_data,$exposure);
			
		}
		
		
		
		return $fancy_all_exposure_data;
	}
	
	 $current_bet = array(
            "bet_event_id" => $event_id,
            "bet_market_id" => $market_id,
            "bet_margin_used" => 0,
            "bet_win_amount" => 0,
            "bet_odds" => 0,
            "bet_type" => 'Yes',
            "bet_market_type" => 'FANCY_ODDS',
            "stack" => 0,
            "runs" => 0,
        );
	
	$exposure_data = get_current_bet_fancy_exposure2($conn,$user_id,$event_id,$market_id,$current_bet);
	 unset($exposure_data[0]);
	echo "<pre>";
	print_r($exposure_data);
	
	die;
	
	*/

	$res_bets = $conn->query("SELECT bet_id,market_id,event_name,bet_type,bet_runs,bet_margin_used,bet_win_amount FROM bet_details where event_id = '$event_id' AND market_id=$market_id AND market_type='FANCY_ODDS' AND user_id = 6");
	$bets_data = array();
	
	$run_position_arr = array();
	$runs_arr = array();
	
	$last_amount = 0;
	
	$lay_arr = $back_arr = array();
	while($bet_data = mysqli_fetch_assoc($res_bets)){
		$bets_data[] = $bet_data;
		
		$bet_type			= strtolower($bet_data['bet_type']);
		$bet_runs			= intval($bet_data['bet_runs']);
		$bet_margin_used	= 0 - floatval($bet_data['bet_margin_used']);
		$bet_win_amount 	= floatval($bet_data['bet_win_amount']);
		if($bet_type == 'back')
			$bet_type = 'yes';
		else if($bet_type == 'lay')
			$bet_type = 'no';
			
		$runs_arr[$bet_runs] = $bet_runs;
		if($bet_type == 'yes'){
			$back_arr = $bet_data;
		}
		else if($bet_type == 'no'){
			$lay_arr = $bet_data;
		}
		

		if($bet_type == 'yes'){
		
			$win_run = $bet_runs;
			$loss_run = $bet_runs - 1;
			
			if(isset($run_position_arr[$loss_run]))
				$run_position_arr[$loss_run] += $bet_margin_used;
			else
				$run_position_arr[$loss_run] = $bet_margin_used;
				
			if(isset($run_position_arr[$win_run]))
				$run_position_arr[$win_run] += $bet_win_amount;
			else
				$run_position_arr[$win_run] = $bet_win_amount;
		}
		else if ($bet_type == 'no'){
			
			$win_run = $bet_runs - 1;
			$loss_run = $bet_runs;
			
			if(isset($run_position_arr[$win_run]))
				$run_position_arr[$win_run] += $bet_win_amount;
			else
				$run_position_arr[$win_run] = $bet_win_amount;
				
			if(isset($run_position_arr[$loss_run]))
				$run_position_arr[$loss_run] += $bet_margin_used;
			else
				$run_position_arr[$loss_run] = $bet_margin_used;
		}
	}
	
	ksort($run_position_arr);
	
	$start = min($runs_arr) - 1;
	$end = max($runs_arr) + 1;
	
	for($i = $start; $i <= $end; $i++){
	
	}
	
	echo "<pre>";
	print_r($run_position_arr);
	echo "</pre>";
	
	echo "<pre>";
	print_r($bets_data);
	echo "</pre>";
	
if(false){
	

	
	while($bet_data = mysqli_fetch_assoc($res_bets)){
	
		$bet_type			= strtolower($bet_data['bet_type']);
		$bet_runs			= intval($bet_data['bet_runs']);
		$bet_margin_used	= 0 - floatval($bet_data['bet_margin_used']);
		$bet_win_amount 	= floatval($bet_data['bet_win_amount']);
		
		if($bet_type == 'back')
			$bet_type = 'yes';
		else if($bet_type == 'lay')
			$bet_type = 'no';
			
		$runs_arr[$bet_runs] = $bet_runs;
		
		$bets_data[] = $bet_data;
	}
	
	$start = min($runs_arr) - 1;
	$end = max($runs_arr) +1;
		
	usort($bets_data, function($a, $b) {
		return intval($a['bet_runs']) - intval($b['bet_runs']);
	});
	
	for($i = $start; $i <= $end; $i++){
		foreach($bets_data as $bet_data){
			$bet_runs = intval($bet_data['bet_runs']);
			$bet_type = strtolower($bet_data['bet_type']);
			$bet_margin_used	= 0 - floatval($bet_data['bet_margin_used']);
			$bet_win_amount 	= floatval($bet_data['bet_win_amount']);

			if($bet_type == 'back')
				$bet_type = 'yes';
			else if($bet_type == 'lay')
				$bet_type = 'no';

			$last_pl = 0;
			if($bet_type == 'yes'){
				if($i >= $bet_runs){
					$last_pl = $bet_win_amount;
				}
				else{
					$last_pl = $bet_margin_used;
				}
			}
			else if($bet_type == 'no'){
			
				if($i < $bet_runs){
					$last_pl = $bet_margin_used;
				}
				else{
					$last_pl = $bet_win_amount;		
				}
			}
			
			if(isset($run_position_arr[$i]))
				$run_position_arr[$i] += $last_pl;
			else
				$run_position_arr[$i] = $last_pl;
		}
	}
	
	echo "<pre>";
	print_r($run_position_arr);
	echo "</pre>";
	
	echo "<pre>";
	print_r($bets_data);
	echo "</pre>";
	}
	
?>