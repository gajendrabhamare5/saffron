<?php

  function get_total_net_exposure($conn,$user_id){
		$get_total_amont = $conn->query("select SUM(exposure_amount) as total_net_exposure from exposure_details where user_id=$user_id and exposure_amount < 0");
		$fetch_get_total_amont = mysqli_fetch_assoc($get_total_amont);
		
		$net_exposure = 0;
		if($fetch_get_total_amont != null){
			$net_exposure = $fetch_get_total_amont['total_net_exposure'];
		}
		if($net_exposure == ""){
			$net_exposure = 0;
		}
		return $net_exposure;
	}
	
	function get_total_only_winning($conn,$user_id){
		$get_total_amont = $conn->query("select SUM(exposure_amount) as total_net_exposure from exposure_details where user_id=$user_id and exposure_amount > 0");
		$fetch_get_total_amont = mysqli_fetch_assoc($get_total_amont);
		
		$net_exposure = 0;
		if($fetch_get_total_amont != null){
			$net_exposure = $fetch_get_total_amont['total_net_exposure'];
		}
		
		if($net_exposure == ""){
			$net_exposure = 0;
		}
		
		return $net_exposure;
	}
	
function get_net_exposure($conn,$user_id,$current_bet = array()){
		$market_1_id = 0;
		$used_this = 0;
		$get_fancy_margin = $conn->query("select SUM(bet_margin_used) as total_fancy_margin from bet_details where user_id=$user_id and bet_status=1 and (market_type='FANCY_ODDS' OR market_type='METER_ODDS')");
		$fetch_fancy_margin = mysqli_fetch_assoc($get_fancy_margin);
		$fancy_margin = $fetch_fancy_margin['total_fancy_margin'];
		$fancy_margin = -$fancy_margin;
		$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_details where user_id=$user_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_status=1 GROUP BY event_id");
		$total_net_exposure = 0;
		while($fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet)){
			$event_id = $fetch_match_odds_active_bet['event_id'];
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];
			
			$get_event_market = $conn->query("select market_id,event_id from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') GROUP BY market_id order by market_id");
			$get_event_data = array();
			while($fetch_get_event_market = mysqli_fetch_assoc($get_event_market)){
				$get_event_data[] = $fetch_get_event_market;
			}
			
			$event_1_id =$get_event_data[0]['event_id']; 
			$market_1_id =$get_event_data[0]['market_id']; 

			$event_2_id =$get_event_data[1]['event_id']; 
			$market_2_id =$get_event_data[1]['market_id']; 
			
			$get_1_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Back'");

			$get_1_opp_lay_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Lay'");
			
	
			
			$get_2_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Back'");

			$get_2_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Lay'");
		

			$total_1_win_back = 0;
			while($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)){
				$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
				
			}
			
			$total_1_win_lay = 0;
			while($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)){
				$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
				
			}
			
			$total_2_win_back = 0;
			while($fetch_get_2_win_back_data = mysqli_fetch_assoc($get_2_win_back_data)){
				
				$total_2_win_back = $total_2_win_back + $fetch_get_2_win_back_data['bet_win_amount'] + $fetch_get_2_win_back_data['bet_margin_used'];
			}

			$total_2_win_lay = 0;
			while($fetch_get_2_opp_lay_data = mysqli_fetch_assoc($get_2_opp_lay_data)){
				$total_2_win_lay = $total_2_win_lay + $fetch_get_2_opp_lay_data['bet_win_amount'] + $fetch_get_2_opp_lay_data['bet_margin_used'];
			}

			$current_bet_event_id = $current_bet['bet_event_id'];
			
			if($current_bet_event_id == $event_1_id){
				
				$current_bet_market_id = $current_bet['bet_market_id'];
				$current_bet_type = $current_bet['bet_type'];
				$current_bet_win_amount = $current_bet['bet_win_amount'];
				$current_bet_margin_used = $current_bet['bet_margin_used'];
				$total_bet_amount = $total_bet_amount + $current_bet_margin_used;
				if($current_bet_type == 'Back'){
					//same market id
					if($current_bet_market_id == $market_1_id){
						$total_1_win_back = $total_1_win_back + $current_bet_win_amount + $current_bet_margin_used;
					}else{
						$total_2_win_back = $total_2_win_back + $current_bet_win_amount + $current_bet_margin_used;
					}
				}else{
					//other market id
					if($current_bet_market_id == $market_1_id){
						$total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
						
					}else{
						$total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					}
				}
			}else{
				
				/* if($used_this == 0){
					$current_bet_market_id = $current_bet['bet_market_id'];
					$current_bet_type = $current_bet['bet_type'];
					$current_bet_win_amount = $current_bet['bet_win_amount'];
					$current_bet_margin_used = $current_bet['bet_margin_used'];
					$total_bet_amount = $total_bet_amount + $current_bet_margin_used;
					
					$used_this = 1;
				} */
				
			}
			
			
			$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
			$winning_amount_team_2 = ($total_2_win_back + $total_2_win_lay) - $total_bet_amount;
			
			if($winning_amount_team_1 > $winning_amount_team_2){
				$net_exposure = $winning_amount_team_2;
			}else{
				$net_exposure = $winning_amount_team_1;
			}
			
			$total_net_exposure = $total_net_exposure + $net_exposure;
			
		}
		if($market_1_id == 0){
			if($current_bet == null){
				
			$current_bet_margin_used = 0;
			}else{
			$current_bet_margin_used = $current_bet['bet_margin_used'];
				
			}
				$total_net_exposure = -$current_bet_margin_used;
			}
		return $total_net_exposure + $fancy_margin;
	}
	
	function get_current_bet_fancy_exposure($conn,$user_id,$event_id,$market_id,$current_bet = array()){
		$get_all_fancy_stake = $conn->query("select * from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS'");
		$stack_rate_array = array();
		$fancy_all_exposure_data = array();
		while($fetch_get_all_fancy_stake = mysqli_fetch_assoc($get_all_fancy_stake)){
			$stack_rate_array[] = $fetch_get_all_fancy_stake['bet_runs'];
		}
		
		$current_bet_event_id = $current_bet['bet_event_id'];
		$current_bet_market_id = $current_bet['bet_market_id'];
		$current_bet_type = $current_bet['bet_type'];
		$current_bet_win_amount = $current_bet['bet_win_amount'];
		$current_bet_margin_used = $current_bet['bet_margin_used'];
		$current_bet_odds = $current_bet['bet_odds'];
		
		$stack_rate_array[] = $current_bet_odds;
		$stack_rate_unique_array =  array_unique($stack_rate_array);
		sort($stack_rate_unique_array);
		$last_run_value = 0;
		if($stack_rate_unique_array != null){
			$min_run = $stack_rate_unique_array[0];
			$max_run = max($stack_rate_unique_array);
			$i=0;
			$first_label = $min_run -1;
			$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs < $first_label and bet_type='Yes'");

			$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
			$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

			$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");

			$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
			$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

			$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");

			$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
			$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

			$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs < $first_label and bet_type='No'");

			$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
			$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

			if($current_bet_type == 'Yes'){
				if($current_bet_odds < $first_label){
					$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
				}else if($current_bet_odds > $first_label){
					$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
				}
			}else{
				if($current_bet_odds > $first_label){
					$win_amount_no = $win_amount_no + $current_bet_win_amount;
				}else if($current_bet_odds < $first_label){
					$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
				}
			}
			
			$total_win = $win_amount_yes + $win_amount_no;
			$total_loss = $loss_amount_yes + $loss_amount_no;

			$exposure = $total_win - $total_loss;

			array_push($fancy_all_exposure_data,$exposure);
			
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

					$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='Yes'");

					$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
					$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

					
					$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");

					$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
					$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

					$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");

					$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
					$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

					$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='No'");

					$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
					$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];
					
					if($current_bet_type == 'Yes'){
						if($current_bet_odds <= $first_label){
							$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
						}else if($current_bet_odds > $first_label){
							$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
						}
					}else{
						if($current_bet_odds > $first_label){
							$win_amount_no = $win_amount_no + $current_bet_win_amount;
						}else if($current_bet_odds <= $first_label){
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
			
			$first_label = $max_run;
			$search = $first_label - 1;
			$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='Yes'");

			$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
			$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

			$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");
			$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
			$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

			$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");
			$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
			$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

			$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='No'");
			$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
			$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];
			if($current_bet_type == 'Yes'){
				if($current_bet_odds <= $first_label){
					$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
				}else if($current_bet_odds > $first_label){
					$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
				}
			}else{
				if($current_bet_odds > $first_label){
					$win_amount_no = $win_amount_no + $current_bet_win_amount;
				}else if($current_bet_odds <= $first_label){
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
	
	function get_net_exposure_during_placing($conn,$user_id,$current_bet = array()){
		$market_1_id = 0;
		$used_this = 0;
		$get_fancy_margin = $conn->query("select SUM(bet_margin_used) as total_fancy_margin from bet_details where user_id=$user_id and bet_status=1 and market_type='FANCY_ODDS'");
		$fetch_fancy_margin = mysqli_fetch_assoc($get_fancy_margin);
		$fancy_margin = $fetch_fancy_margin['total_fancy_margin'];
		$fancy_margin = -$fancy_margin;
		$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_details where user_id=$user_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_status=1 GROUP BY event_id");
		$total_net_exposure = 0;
		while($fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet)){
			$event_id = $fetch_match_odds_active_bet['event_id'];
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];
			
			$get_event_market = $conn->query("select market_id,event_id from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') GROUP BY market_id order by market_id");
			$get_event_data = array();
			while($fetch_get_event_market = mysqli_fetch_assoc($get_event_market)){
				$get_event_data[] = $fetch_get_event_market;
			}
			
			$event_1_id =$get_event_data[0]['event_id']; 
			$market_1_id =$get_event_data[0]['market_id']; 

			$event_2_id =$get_event_data[1]['event_id']; 
			$market_2_id =$get_event_data[1]['market_id']; 
			
			$get_1_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Back'");

			$get_1_opp_lay_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Lay'");
			
	
			
			$get_2_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Back'");

			$get_2_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Lay'");
		

			$total_1_win_back = 0;
			while($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)){
				$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
				
			}
			
			$total_1_win_lay = 0;
			while($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)){
				$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
				
			}
			
			$total_2_win_back = 0;
			while($fetch_get_2_win_back_data = mysqli_fetch_assoc($get_2_win_back_data)){
				
				$total_2_win_back = $total_2_win_back + $fetch_get_2_win_back_data['bet_win_amount'] + $fetch_get_2_win_back_data['bet_margin_used'];
			}

			$total_2_win_lay = 0;
			while($fetch_get_2_opp_lay_data = mysqli_fetch_assoc($get_2_opp_lay_data)){
				$total_2_win_lay = $total_2_win_lay + $fetch_get_2_opp_lay_data['bet_win_amount'] + $fetch_get_2_opp_lay_data['bet_margin_used'];
			}

			$current_bet_event_id = $current_bet['bet_event_id'];
			
			if($current_bet_event_id == $event_1_id){
				
				$current_bet_market_id = $current_bet['bet_market_id'];
				$current_bet_type = $current_bet['bet_type'];
				$current_bet_win_amount = $current_bet['bet_win_amount'];
				$current_bet_margin_used = $current_bet['bet_margin_used'];
				$total_bet_amount = $total_bet_amount + $current_bet_margin_used;
				if($current_bet_type == 'Back'){
					//same market id
					if($current_bet_market_id == $market_1_id){
						$total_1_win_back = $total_1_win_back + $current_bet_win_amount + $current_bet_margin_used;
					}else{
						$total_2_win_back = $total_2_win_back + $current_bet_win_amount + $current_bet_margin_used;
					}
				}else{
					//other market id
					if($current_bet_market_id == $market_1_id){
						$total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
						
					}else{
						$total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					}
				}
			}
			
			
			$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
			$winning_amount_team_2 = ($total_2_win_back + $total_2_win_lay) - $total_bet_amount;
			
			if($winning_amount_team_1 > 0 and $winning_amount_team_2 > 0){
				$net_exposure =0;
			}else{
				if($winning_amount_team_1 > $winning_amount_team_2){
					$net_exposure = $winning_amount_team_2;
				}else{
					$net_exposure = $winning_amount_team_1;
				}
			}
			
			
			$total_net_exposure = $total_net_exposure + $net_exposure;
			
		}
		
		$get_chck_event_this_event = $conn->query("select * from bet_details where user_id=$user_id and bet_status =1 and event_id=$current_bet_event_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS')");
		$fetch_get_chck_event_this_event = mysqli_num_rows($get_chck_event_this_event);
		if($fetch_get_chck_event_this_event <= 0){
			
				$current_bet_margin_used = $current_bet['bet_margin_used'];
				$total_net_exposure += -$current_bet_margin_used;
			
		}
		
		return $total_net_exposure + $fancy_margin;
	}
	
	function get_net_exposure_during_placing_temp($conn,$user_id,$current_bet = array()){
		$market_1_id = 0;
		$used_this = 0;
		$get_fancy_margin = $conn->query("select SUM(bet_margin_used) as total_fancy_margin from bet_details where user_id=$user_id and bet_status=1 and market_type='FANCY_ODDS'");
		$fetch_fancy_margin = mysqli_fetch_assoc($get_fancy_margin);
		$fancy_margin = $fetch_fancy_margin['total_fancy_margin'];
		$fancy_margin = -$fancy_margin;
		$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_details where user_id=$user_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_status=1 GROUP BY event_id");
		$total_net_exposure = 0;
		while($fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet)){
			$event_id = $fetch_match_odds_active_bet['event_id'];
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];
			
			$get_event_market = $conn->query("select market_id,event_id from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') GROUP BY market_id order by market_id");
			$get_event_data = array();
			while($fetch_get_event_market = mysqli_fetch_assoc($get_event_market)){
				$get_event_data[] = $fetch_get_event_market;
			}
			
			$event_1_id =$get_event_data[0]['event_id']; 
			$market_1_id =$get_event_data[0]['market_id']; 

			$event_2_id =$get_event_data[1]['event_id']; 
			$market_2_id =$get_event_data[1]['market_id']; 
			
			$get_1_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Back'");

			$get_1_opp_lay_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Lay'");
			
	
			
			$get_2_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Back'");

			$get_2_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Lay'");
		

			$total_1_win_back = 0;
			while($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)){
				$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
				
			}
			
			$total_1_win_lay = 0;
			while($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)){
				$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
				
			}
			
			$total_2_win_back = 0;
			while($fetch_get_2_win_back_data = mysqli_fetch_assoc($get_2_win_back_data)){
				
				$total_2_win_back = $total_2_win_back + $fetch_get_2_win_back_data['bet_win_amount'] + $fetch_get_2_win_back_data['bet_margin_used'];
			}

			$total_2_win_lay = 0;
			while($fetch_get_2_opp_lay_data = mysqli_fetch_assoc($get_2_opp_lay_data)){
				$total_2_win_lay = $total_2_win_lay + $fetch_get_2_opp_lay_data['bet_win_amount'] + $fetch_get_2_opp_lay_data['bet_margin_used'];
			}

			$current_bet_event_id = $current_bet['bet_event_id'];
			
			if($current_bet_event_id == $event_1_id){
				
				$current_bet_market_id = $current_bet['bet_market_id'];
				$current_bet_type = $current_bet['bet_type'];
				$current_bet_win_amount = $current_bet['bet_win_amount'];
				$current_bet_margin_used = $current_bet['bet_margin_used'];
				$total_bet_amount = $total_bet_amount + $current_bet_margin_used;
				if($current_bet_type == 'Back'){
					//same market id
					if($current_bet_market_id == $market_1_id){
						$total_1_win_back = $total_1_win_back + $current_bet_win_amount + $current_bet_margin_used;
					}else{
						$total_2_win_back = $total_2_win_back + $current_bet_win_amount + $current_bet_margin_used;
					}
				}else{
					//other market id
					if($current_bet_market_id == $market_1_id){
						$total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
						
					}else{
						$total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					}
				}
			}
			
			
			$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
			$winning_amount_team_2 = ($total_2_win_back + $total_2_win_lay) - $total_bet_amount;
			
			if($winning_amount_team_1 > 0 and $winning_amount_team_2 > 0){
				$net_exposure =0;
			}else{
				if($winning_amount_team_1 > $winning_amount_team_2){
					$net_exposure = $winning_amount_team_2;
				}else{
					$net_exposure = $winning_amount_team_1;
				}
			}
			
			
			$total_net_exposure = $total_net_exposure + $net_exposure;
			
		}
		
		$get_chck_event_this_event = $conn->query("select * from bet_details where user_id=$user_id and bet_status =1 and event_id=$current_bet_event_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS')");
		$fetch_get_chck_event_this_event = mysqli_num_rows($get_chck_event_this_event);
		if($fetch_get_chck_event_this_event <= 0){
			
				$current_bet_margin_used = $current_bet['bet_margin_used'];
				$total_net_exposure += -$current_bet_margin_used;
			
		}
		
		return $total_net_exposure + $fancy_margin;
	}
	
	
	
	/* function get_unmatched_expo($conn,$user_id,$current_bet = array()){
		$market_1_id = 0;
		$get_fancy_margin = $conn->query("select SUM(bet_margin_used) as total_fancy_margin from unmatched_bet_details where user_id=$user_id and bet_status=1 and market_type='FANCY_ODDS'");
		$fetch_fancy_margin = mysqli_fetch_assoc($get_fancy_margin);
		$fancy_margin = $fetch_fancy_margin['total_fancy_margin'];
		$fancy_margin = -$fancy_margin;
		$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from unmatched_bet_details where user_id=$user_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_status=1 GROUP BY event_id");
		$total_net_exposure = 0;
		while($fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet)){
			$event_id = $fetch_match_odds_active_bet['event_id'];
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];
			
			$get_event_market = $conn->query("select market_id,event_id from unmatched_bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') GROUP BY market_id order by market_id");
			$get_event_data = array();
			while($fetch_get_event_market = mysqli_fetch_assoc($get_event_market)){
				$get_event_data[] = $fetch_get_event_market;
			}
			
			$event_1_id =$get_event_data[0]['event_id']; 
			$market_1_id =$get_event_data[0]['market_id']; 

			$event_2_id =$get_event_data[1]['event_id']; 
			$market_2_id =$get_event_data[1]['market_id']; 
			
			$get_1_win_back_data = $conn->query("select * from  unmatched_bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Back'");

			$get_1_opp_lay_data = $conn->query("select * from  unmatched_bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Lay'");
			
	
			
			$get_2_win_back_data = $conn->query("select * from  unmatched_bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Back'");

			$get_2_opp_lay_data = $conn->query("select * from  unmatched_bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Lay'");
		

			$total_1_win_back = 0;
			while($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)){
				$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
				
			}
			
			$total_1_win_lay = 0;
			while($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)){
				$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
				
			}
			
			$total_2_win_back = 0;
			while($fetch_get_2_win_back_data = mysqli_fetch_assoc($get_2_win_back_data)){
				
				$total_2_win_back = $total_2_win_back + $fetch_get_2_win_back_data['bet_win_amount'] + $fetch_get_2_win_back_data['bet_margin_used'];
			}

			$total_2_win_lay = 0;
			while($fetch_get_2_opp_lay_data = mysqli_fetch_assoc($get_2_opp_lay_data)){
				$total_2_win_lay = $total_2_win_lay + $fetch_get_2_opp_lay_data['bet_win_amount'] + $fetch_get_2_opp_lay_data['bet_margin_used'];
			}

			$current_bet_event_id = $current_bet['bet_event_id'];
			
			if($current_bet_event_id == $event_1_id){
				
				$current_bet_market_id = $current_bet['bet_market_id'];
				$current_bet_type = $current_bet['bet_type'];
				$current_bet_win_amount = $current_bet['bet_win_amount'];
				$current_bet_margin_used = $current_bet['bet_margin_used'];
				$total_bet_amount = $total_bet_amount + $current_bet_margin_used;
				if($current_bet_type == 'Back'){
					//same market id
					if($current_bet_market_id == $market_1_id){
						$total_1_win_back = $total_1_win_back + $current_bet_win_amount + $current_bet_margin_used;
					}else{
						$total_2_win_back = $total_2_win_back + $current_bet_win_amount + $current_bet_margin_used;
					}
				}else{
					//other market id
					if($current_bet_market_id == $market_1_id){
						$total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
						
					}else{
						$total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					}
				}
			}
			
			
					$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
			
		
				$winning_amount_team_2 = ($total_2_win_back + $total_2_win_lay) - $total_bet_amount;
			
			if($winning_amount_team_1 > $winning_amount_team_2){
				$net_exposure = $winning_amount_team_2;
			}else{
				$net_exposure = $winning_amount_team_1;
			}
			$total_net_exposure = $total_net_exposure + $net_exposure;
		}
		if($market_1_id == 0){
			$current_bet_margin_used = $current_bet['bet_margin_used'];
				$total_net_exposure = -$current_bet_margin_used;
			}
		return $total_net_exposure + $fancy_margin;
	}
	 */
	 
	 function get_unmatched_expo($conn,$user_id,$current_bet = array()){
		$market_1_id = 0;
		$get_fancy_margin = $conn->query("select SUM(bet_margin_used) as total_fancy_margin from unmatched_bet_details where user_id=$user_id and bet_status=1");
		$fetch_fancy_margin = mysqli_fetch_assoc($get_fancy_margin);
		
		$fancy_margin = 0;
		if($fetch_fancy_margin != null){
			
			$fancy_margin = $fetch_fancy_margin['total_fancy_margin'];
		}
		
		if($fancy_margin == ""){
			$fancy_margin = 0;
		}
		
		$fancy_margin = $fancy_margin * (-1);
		
		return $fancy_margin;
	}
	
	
	function get_net_exposure_event_id($conn,$user_id,$event_id){
		
		$get_fancy_margin = $conn->query("select SUM(bet_margin_used) as total_fancy_margin from bet_details where user_id=$user_id and event_id=$event_id and bet_status=1 and market_type='FANCY_ODDS'");
		$fetch_fancy_margin = mysqli_fetch_assoc($get_fancy_margin);
		$fancy_margin = $fetch_fancy_margin['total_fancy_margin'];
		$fancy_margin = -$fancy_margin;
		
		$get_all_market_ids = $conn->query("select * from event_market_id where event_id=$event_id");
		$fetch_get_all_market_ids = array();
		while($fetch_get_all_market_id = mysqli_fetch_assoc($get_all_market_ids)){
			$fetch_get_all_market_ids[] =$fetch_get_all_market_id;
		}
		$market_1_id =$fetch_get_all_market_ids[0]['market_id'];
		$market_2_id =$fetch_get_all_market_ids[1]['market_id']; 
		$market_3_id =$fetch_get_all_market_ids[2]['market_id']; 
		
		
		
		$winning_amount_team_3 = 0;
		$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_details where user_id=$user_id and event_id=$event_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_status=1 GROUP BY event_id");
		$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
		$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

		$get_event_market = $conn->query("select market_id,event_id from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') GROUP BY market_id order by market_id");
		$get_event_data = array();
		while ($fetch_get_event_market = mysqli_fetch_assoc($get_event_market)) {
			$get_event_data[] = $fetch_get_event_market;
		}

		$event_1_id = $get_event_data[0]['event_id'];
		
		
		$get_1_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Back'");
		$get_1_opp_lay_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_1_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Lay'");
		$get_2_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Back'");
		$get_2_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_2_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Lay'");
		$get_3_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_3_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Back'");
		$get_3_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_3_id and market_type IN ('MATCH_ODDS','TOSS_ODDS','TIE_ODDS') and bet_type='Lay'");
		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}
		$total_2_win_back = 0;
		while ($fetch_get_2_win_back_data = mysqli_fetch_assoc($get_2_win_back_data)) {
			$total_2_win_back = $total_2_win_back + $fetch_get_2_win_back_data['bet_win_amount'] + $fetch_get_2_win_back_data['bet_margin_used'];
		}
		$total_2_win_lay = 0;
		while ($fetch_get_2_opp_lay_data = mysqli_fetch_assoc($get_2_opp_lay_data)) {
			$total_2_win_lay = $total_2_win_lay + $fetch_get_2_opp_lay_data['bet_win_amount'] + $fetch_get_2_opp_lay_data['bet_margin_used'];
		}
		$total_3_win_back = 0;
		while ($fetch_get_3_win_back_data = mysqli_fetch_assoc($get_3_win_back_data)) {
			$total_3_win_back = $total_3_win_back + $fetch_get_3_win_back_data['bet_win_amount'] + $fetch_get_3_win_back_data['bet_margin_used'];
		}
		$total_3_win_lay = 0;
		while ($fetch_get_3_opp_lay_data = mysqli_fetch_assoc($get_3_opp_lay_data)) {
			$total_3_win_lay = $total_3_win_lay + $fetch_get_3_opp_lay_data['bet_win_amount'] + $fetch_get_3_opp_lay_data['bet_margin_used'];
		}
		$winning_amount_team_1 = ($total_1_win_back + $total_1_win_lay) - $total_bet_amount;
		$winning_amount_team_2 = ($total_2_win_back + $total_2_win_lay) - $total_bet_amount;
		$winning_amount_team_3 = ($total_3_win_back + $total_3_win_lay) - $total_bet_amount;
		$return_value = 0;
		
		
		if($market_3_id == null or $market_3_id == ""){
			
			if($winning_amount_team_1 <= $winning_amount_team_2){
				$return_value = $winning_amount_team_1;
			}else if($winning_amount_team_2 < $winning_amount_team_1){
				$return_value = $winning_amount_team_2;
			}
			
		}else{
			
			if($winning_amount_team_1 < $winning_amount_team_2 and $winning_amount_team_1 < $winning_amount_team_3){
				$return_value = $winning_amount_team_1;
			}else if($winning_amount_team_2 < $winning_amount_team_1 and $winning_amount_team_2 < $winning_amount_team_3){
				$return_value = $winning_amount_team_2;
			}else if($winning_amount_team_3 < $winning_amount_team_1  and $winning_amount_team_3 < $winning_amount_team_2){
					$return_value = $winning_amount_team_3;
			}
		}
	
		
		return $return_value + $fancy_margin;
	}
	
	
	function check_current_palyer_previous_up_bet($conn,$cmp_id,$user_id){
		$get_current_player_up_data  = $conn->query("SELECT SUM(bet_stack) AS total_up_stack, SUM(bet_margin_used) AS total_up_margin_used from bet_details where market_id=$cmp_id and user_id=$user_id and bet_type='Yes' and bet_status=1");

		$fetch_get_current_player_up_data = mysqli_fetch_assoc($get_current_player_up_data);
		return $fetch_get_current_player_up_data;
		
	}
	
	function check_current_palyer_previous_down_bet($conn,$cmp_id,$user_id){
		$get_current_player_up_data  = $conn->query("SELECT SUM(bet_stack) AS total_down_stack, SUM(bet_margin_used) AS total_down_margin_used from bet_details where market_id=$cmp_id and user_id=$user_id and bet_type='No'  and bet_status=1");

		$fetch_get_current_player_up_data = mysqli_fetch_assoc($get_current_player_up_data);
		return $fetch_get_current_player_up_data;
		
	}
	
	function result_as_per_down_rate($conn,$cmp_id,$user_id,$margin_amount,$cmp_down,$current_bet_data = array(),$fixed_margin = false){
		
//		$my_all_bet_datas = $conn->query("SELECT * from bet_details where market_id=$cmp_id  and  user_id=$user_id and bet_status=1");
		$exposure_amount = 0;
//		while($datas = mysqli_fetch_assoc($my_all_bet_datas)){
//			$stack =  $datas['bet_stack'];
//			$odds =  $datas['bet_odds'];
//			$type =  $datas['bet_type'];
//			
//			$temp_cmp_current_score = $cmp_down;
//			$cmp_current_score = $temp_cmp_current_score + $margin_amount;
//                        if($fixed_margin){
//                            if($type == 'No'){
//                                $profit = $stack * 100;
//                                $exposure_amount = $exposure_amount + $profit;
//                            }else{
//                                $profit = $odds * $stack;
//                                $exposure_amount = $exposure_amount + $profit;
//                            }
//                        }else{
//                            if($type == 'No'){
//                                    $profit = ($odds - $cmp_current_score) * $stack;
//                                    $exposure_amount = $exposure_amount + $profit;
//                            }else{
//                                    $profit = ($cmp_current_score - $odds) * $stack;
//                                    $exposure_amount = $exposure_amount + $profit;
//                            }
//                        }
//		}
		
		if($current_bet_data != null){
			$bet_stack = $current_bet_data['stack'];
			$bet_odds = $current_bet_data['odds'];
			$bet_type = $current_bet_data['type'];
			$bet_cmp_current_score = $current_bet_data['cmp_current_score'];
                        
                        if($fixed_margin){
                            if($bet_type == 'No'){
                                $profit = $bet_stack * 100;
                                $exposure_amount = $exposure_amount + $profit;
                            }else{
                                $profit = $bet_odds * $bet_stack;
                                $exposure_amount = $exposure_amount + $profit;
                            }
                        }
                        else{
                            $cmp_current_score = $bet_cmp_current_score + $margin_amount;
                            if($bet_type == 'No'){
                                $profit = ($bet_odds - $cmp_current_score) * $bet_stack;
                                $exposure_amount = $exposure_amount + $profit;
                            }else{
                                $profit = ($cmp_current_score - $bet_odds) * $bet_stack;
                                $exposure_amount = $exposure_amount + $profit;
                            }
                        }
		}
		
		return $exposure_amount;
		
	}
	
	function result_as_per_up_rate($conn,$cmp_id,$user_id,$current_score,$current_bet_data = array(),$fixed_margin = false){

//		$my_all_bet_datas = $conn->query("SELECT * from bet_position where market_id=$cmp_id  and  user_id=$user_id and bet_status=1");
		$exposure_amount = 0;
//		while($datas = mysqli_fetch_assoc($my_all_bet_datas)){
//			$stack =  $datas['bet_stack'];
//			$odds =  $datas['bet_odds'];
//			$type =  $datas['bet_type'];
//			$cmp_current_score = $current_score;
//                        
//                        if($fixed_margin){
//                            if($type == 'No'){
//                                $profit = $stack * 100;
//                                $exposure_amount = $exposure_amount + $profit;
//                            }else{
//                                $profit = $odds * $stack;
//                                $exposure_amount = $exposure_amount + $profit;
//                            }
//                        }
//                        else{
//			
//                            if($type == 'No'){
//                                $profit = ($odds - $cmp_current_score) * $stack;
//                                $exposure_amount = $exposure_amount + $profit;
//                            }else{
//                                $profit = ($cmp_current_score - $odds) * $stack;
//                                $exposure_amount = $exposure_amount + $profit;
//                            }
//                        }
//		}
		
		if($current_bet_data != null){
			$bet_stack = $current_bet_data['stack'];
			$bet_odds = $current_bet_data['odds'];
			$bet_type = $current_bet_data['type'];
			$cmp_current_score = $current_bet_data['cmp_current_score'];
			
                        if($fixed_margin){
                            if($bet_type == 'No'){
                                $profit = $bet_stack * 100;
                                $exposure_amount = $exposure_amount + $profit;
                            }else{
                                $profit = $bet_odds * $bet_stack;
                                $exposure_amount = $exposure_amount + $profit;
                            }
                        }
                        else{
                            if($bet_type == 'No'){
                                $profit = ($bet_odds - $cmp_current_score) * $bet_stack;
                                $exposure_amount = $exposure_amount + $profit;
                            }else{
                                $profit = ($cmp_current_score - $bet_odds) * $bet_stack;
                                $exposure_amount = $exposure_amount + $profit;
                            }
                        }
		}
		
		return $exposure_amount;
		
	}
	
	function user_prv_exposure_except_current_cmp($conn,$user_id,$cmp_id,$spread_match_id){
		
//		$get_acc_bal = $conn->query("select sum(exposure_amount) as total_balance from exposure_details where user_id=$user_id and market_id!=$cmp_id and meter_market_id!=$spread_match_id");
		$get_acc_bal = $conn->query("select sum(exposure_amount) as total_balance from exposure_details where user_id=$user_id");
		$fetch_get_acc_bal = mysqli_fetch_assoc($get_acc_bal);
		if($fetch_get_acc_bal == null){
			$account_balance = 0;
		}else{
			$account_balance = $fetch_get_acc_bal['total_balance'];
			if($account_balance == ""){
				$account_balance = 0;
			}
		}
		return $account_balance;
	}
	
		function user_account_balance($conn,$user_id){
		
		$get_acc_bal = $conn->query("select sum(amount) as total_balance from accounts where user_id=$user_id");
		$fetch_get_acc_bal = mysqli_fetch_assoc($get_acc_bal);
		if($fetch_get_acc_bal == null){
			$account_balance = 0;
		}else{
			$account_balance = $fetch_get_acc_bal['total_balance'];
			if($account_balance == ""){
				$account_balance = 0;
			}
		}
		return $account_balance;
	}
	
		function update_exposure($conn,$user_id,$m_id,$cmp_id,$meter_market_id,$exposure_amount){
                    $exposure_datetime = date('Y-m-d H:i-s');
                    $get_check_already_exist = $conn->query("select * from exposure_details where user_id=$user_id and market_id=$cmp_id and meter_market_id=$meter_market_id");
                    $check_already_exist = mysqli_fetch_assoc($get_check_already_exist);
//                    if($check_already_exist == null){
                        $conn->query("insert into exposure_details (exposure_amount,market_id,user_id,event_id,meter_market_id,market_type,exposure_datetime) value('$exposure_amount','$cmp_id','$user_id','$m_id',$meter_market_id,'METER_ODDS','$exposure_datetime')");
//                    }else{
//
//                        $conn->query("update exposure_details set exposure_amount='$exposure_amount' where market_id='$cmp_id' and user_id='$user_id' and meter_market_id=$meter_market_id");
//                    }
		return true;
	}
	
	function get_net_exposure_casino_market($conn,$user_id,$bet_event_id,$market_type,$marketId,$bet_type_exposure,$stack,$runs,$bet_market_name){
		
		$runs = floatVal($runs);
		$event_id = $bet_event_id;
		
		$market_exposure = 0;
		if($bet_market_name != ""){
			if($bet_market_name == ""){
				$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type'");
			}else{
				$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type' and back_name='$bet_market_name'");
			}
		
			$market_ids = array();
			while($market_ids_array = mysqli_fetch_assoc($market_id)){
				$market_ids[] = $market_ids_array['market_id'];
			}
		
			$market_idss = array_unique($market_ids);
		
			$market_ids_str = implode(',',$market_idss);
		
			$get_bet_teen_datas = $conn->query("select market_id,bet_type,SUM(bet_win_amount) as total_win,SUM(bet_margin_used) as total_margin from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id IN ($market_ids_str) and market_type='$bet_market_name' GROUP BY market_id,bet_type");
		
			$bets_data = array();
		
			$bet_found = false;
			while($get_bet_teen_data = mysqli_fetch_assoc($get_bet_teen_datas)){
			
				$total_win = $get_bet_teen_data['total_win'];
				$total_margin = $get_bet_teen_data['total_margin'];
			
				if($marketId == $get_bet_teen_data['market_id']){
			
					if($get_bet_teen_data['bet_type'] == 'Back' && $bet_type_exposure == 'Back'){
						$total_win += $stack * ($runs - 1);
						$total_margin += $stack;
						$bet_found = true;
					}
					else if($get_bet_teen_data['bet_type'] == 'Lay' && $bet_type_exposure == 'Lay'){
						$total_win += $stack;
						$total_margin += $stack * ($runs - 1);
						$bet_found = true;
					}
				}
			
				$bets_data[] = array(
					'market_id' => $get_bet_teen_data['market_id'],
					'bet_type' => $get_bet_teen_data['bet_type'],
					'bet_win_amount' => $total_win,
					'bet_margin_used' => $total_margin,
				);
			}
		
			if(!$bet_found){
		
				if($bet_type_exposure == 'Back'){
					$total_win = $stack * ($runs - 1);
					$total_margin = $stack;
				}
				else{
					$total_win = $stack;
					$total_margin = $stack * ($runs - 1);
				}
				
				$bets_data[] = array(
					'market_id' => $marketId,
					'bet_type' => $bet_type_exposure,
					'bet_win_amount' => $total_win,
					'bet_margin_used' => $total_margin,
				);
			}
		
			$expo_arr = array();
			foreach($market_idss as $market_ids1){
				$market_id1 = $market_ids1;
			
				foreach($bets_data as $bet_data){
					$total_exposure = 0;
					if ($market_id1 == $bet_data['market_id']) {
						if ($bet_data['bet_type'] == 'Back') {
							$total_exposure += $bet_data['bet_win_amount'];
						} else {
							$total_exposure -= $bet_data['bet_margin_used'];
						}
					} else {
						if ($bet_data['bet_type'] == 'Lay') {
							$total_exposure += $bet_data['bet_win_amount'];
						} else {
							$total_exposure -= $bet_data['bet_margin_used'];
						}
					}
				
					if(isset($expo_arr[$market_id1])){
						$expo_arr[$market_id1] += $total_exposure;
					}
					else{
						$expo_arr[$market_id1] = $total_exposure;
					}
				}
			}
		
			//return min($expo_arr);
		
			$market_exposure = min($expo_arr);
		}
		else{
			if($bet_type_exposure == 'Back'){
				$market_exposure = 0 - $stack;
			}
			elseif($bet_type_exposure == 'Lay'){
				$market_exposure =  0 - ($stack * ($runs - 1));
			}
		}
		
		$where = "";
		if($bet_market_name != ""){
			$where = " AND casino_back_name != '$bet_market_name'";
		}
		
		$get_total_amont = $conn->query("select SUM(exposure_amount) as total_net_exposure from exposure_details where user_id=$user_id and exposure_amount < 0 $where");
		$fetch_get_total_amont = mysqli_fetch_assoc($get_total_amont);
		
		$net_exposure = $market_exposure;
		if($fetch_get_total_amont != null){
			$net_exposure += floatVal($fetch_get_total_amont['total_net_exposure']);
		}
		
		return $net_exposure;
	}
	
	
	function get_net_exposure_casino_cricket_market($conn,$user_id,$bet_event_id,$market_type,$marketId,$bet_type_exposure,$stack,$runs,$bet_market_name){
		
		$runs = floatVal($runs);
		$event_id = $bet_event_id;
		
		$market_exposure = 0;
		if($bet_market_name != ""){
			if($bet_market_name == ""){
				$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type'");
			}else{
				$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type' and back_name='$bet_market_name'");
			}
		
			$market_ids = array();
			while($market_ids_array = mysqli_fetch_assoc($market_id)){
				$market_ids[] = $market_ids_array['market_id'];
			}
		
			$market_idss = array_unique($market_ids);
		
			$market_ids_str = implode(',',$market_idss);
		
			$get_bet_teen_datas = $conn->query("select market_id,bet_type,SUM(bet_win_amount) as total_win,SUM(bet_margin_used) as total_margin from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id IN ($market_ids_str) and market_type='$bet_market_name' GROUP BY market_id,bet_type");
		
			$bets_data = array();
		
			$bet_found = false;
			while($get_bet_teen_data = mysqli_fetch_assoc($get_bet_teen_datas)){
			
				$total_win = $get_bet_teen_data['total_win'];
				$total_margin = $get_bet_teen_data['total_margin'];
			
				if($marketId == $get_bet_teen_data['market_id']){
			
					if($get_bet_teen_data['bet_type'] == 'Back' && $bet_type_exposure == 'Back'){
						$total_win += $stack * ($runs - 1);
						$total_margin += $stack;
						$bet_found = true;
					}
					else if($get_bet_teen_data['bet_type'] == 'Lay' && $bet_type_exposure == 'Lay'){
						$total_win += $stack;
						$total_margin += $stack * ($runs - 1);
						$bet_found = true;
					}
				}
			
				$bets_data[] = array(
					'market_id' => $get_bet_teen_data['market_id'],
					'bet_type' => $get_bet_teen_data['bet_type'],
					'bet_win_amount' => $total_win,
					'bet_margin_used' => $total_margin,
				);
			}
		
			if(!$bet_found){
		
				if($bet_type_exposure == 'Back'){
					$total_win = $stack * ($runs - 1);
					$total_margin = $stack;
				}
				else{
					$total_win = $stack;
					$total_margin = $stack * ($runs - 1);
				}
				
				$bets_data[] = array(
					'market_id' => $marketId,
					'bet_type' => $bet_type_exposure,
					'bet_win_amount' => $total_win,
					'bet_margin_used' => $total_margin,
				);
			}
		
			$expo_arr = array();
			foreach($market_idss as $market_ids1){
				$market_id1 = $market_ids1;
			
				foreach($bets_data as $bet_data){
					$total_exposure = 0;
					if ($market_id1 == $bet_data['market_id']) {
						if ($bet_data['bet_type'] == 'Back') {
							$total_exposure += $bet_data['bet_win_amount'];
						} else {
							$total_exposure -= $bet_data['bet_margin_used'];
						}
					} else {
						if ($bet_data['bet_type'] == 'Lay') {
							$total_exposure += $bet_data['bet_win_amount'];
						} else {
							$total_exposure -= $bet_data['bet_margin_used'];
						}
					}
				
					if(isset($expo_arr[$market_id1])){
						$expo_arr[$market_id1] += $total_exposure;
					}
					else{
						$expo_arr[$market_id1] = $total_exposure;
					}
				}
			}
		
			//return min($expo_arr);
		
			$market_exposure = min($expo_arr);
		}
		else{
			if($bet_type_exposure == 'Back'){
				$market_exposure = 0 - $stack;
			}
			elseif($bet_type_exposure == 'Lay'){
				$market_exposure =  0 - ($stack * ($runs - 1));
			}
		}
		
		$where = "";
		if($bet_market_name != ""){
			$where = " AND event_id != '$event_id'";
		}
		
		$get_total_amont = $conn->query("select SUM(exposure_amount) as total_net_exposure from exposure_details where user_id=$user_id and exposure_amount < 0 $where");
		$fetch_get_total_amont = mysqli_fetch_assoc($get_total_amont);
		
		$net_exposure = $market_exposure;
		if($fetch_get_total_amont != null){
			$net_exposure += floatVal($fetch_get_total_amont['total_net_exposure']);
		}
		
		return $net_exposure;
	}
?>