<?php

function get_net_exposure_during_placing_v3($conn, $user_id, $current_bet)
{
	$bet_event_id = $current_bet['bet_event_id'];
	$bet_market_id = $current_bet['bet_market_id'];
	$bet_margin_used = $current_bet['bet_margin_used'];
	$bet_win_amount = $current_bet['bet_win_amount'];
	if(isset($current_bet['bet_odds'])){
		$bet_odds = $current_bet['bet_odds'];
	}
	$bet_type = $current_bet['bet_market_type'];
	$bet_type_exposure = $current_bet['bet_type'];
	$stack = $current_bet['stack'];
	$runs = $current_bet['runs'];

	$get_total_amont_other_event = $conn->query("select SUM(exposure_amount) as total_net_exposure from exposure_details where user_id=$user_id and event_id<>'$bet_event_id' and exposure_amount < 0");
	$fetch_get_total_amont_other_event = mysqli_fetch_assoc($get_total_amont_other_event);
	$net_exposure_other_event = $fetch_get_total_amont_other_event['total_net_exposure'];

	if ($bet_type == "FANCY_ODDS") {

		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'");

		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);
		if ($check_num_rows <= 0) {
			$this_current_bet_details = -$bet_margin_used;
		} else {


			$exposure_data = get_current_bet_fancy_exposure2($conn, $user_id, $bet_event_id, $bet_market_id, $current_bet);
			/* if($user_id == 284){
					$exposure_data = get_current_bet_fancy_exposure3($conn,$user_id,$bet_event_id,$bet_market_id,$current_bet);
				} */
			$this_current_bet_details = min($exposure_data);
		}



		$get_total_amont = $conn->query("select SUM(exposure_amount) as total_net_exposure from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_id<>'$bet_market_id'");
		$fetch_get_total_amont = mysqli_fetch_assoc($get_total_amont);
		$net_exposure = $fetch_get_total_amont['total_net_exposure'];

		$total_final_exposure  = $this_current_bet_details + $net_exposure;
	} else {


		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type'");
		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);

		if ($check_num_rows <= 0) {
			$this_current_bet_details = -$bet_margin_used;
		} else {
			$this_current_bet_details = get_net_exposure_match_oods($conn, $user_id, $bet_event_id, $bet_type, $bet_type_exposure, $stack, $runs, $current_bet);
		}

		$get_total_amont = $conn->query("select SUM(exposure_amount) as total_net_exposure from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type<>'$bet_type' ");
		$fetch_get_total_amont = mysqli_fetch_assoc($get_total_amont);
		$net_exposure = $fetch_get_total_amont['total_net_exposure'];


		$total_final_exposure  = $net_exposure + $this_current_bet_details;
	}
	if ($user_id == 284) {
		/* echo $net_exposure. " net_exposure </br>";
			echo $net_exposure_other_event. " net_exposure_other_event </br>";
			echo $this_current_bet_details. " this_current_bet_details </br>";
			echo $total_final_exposure. " total_final_exposure </br>";
			echo $total_final_exposure + $net_exposure_other_event. " return value </br>"; */
	}
	if ($net_exposure_other_event > 0) {
		$net_exposure_other_event = 0;
	}

	return $total_final_exposure + $net_exposure_other_event;
}

function get_net_exposure_during_placing_v3_patti($conn, $user_id, $current_bet)
{
	$bet_event_id = $current_bet['bet_event_id'];
	$bet_market_id = $current_bet['bet_market_id'];
	$bet_margin_used = $current_bet['bet_margin_used'];
	$bet_win_amount = $current_bet['bet_win_amount'];
	if(isset($current_bet['bet_odds'])){
		$bet_odds = $current_bet['bet_odds'];
	}
	$bet_type = $current_bet['bet_market_type'];
	$bet_type_exposure = $current_bet['bet_type'];
	$stack = $current_bet['stack'];
	$runs = $current_bet['runs'];

	$get_total_amont_other_event = $conn->query("select SUM(exposure_amount) as total_net_exposure from exposure_details where user_id=$user_id and event_id<>'$bet_event_id' and exposure_amount < 0");
	$fetch_get_total_amont_other_event = mysqli_fetch_assoc($get_total_amont_other_event);
	$net_exposure_other_event = $fetch_get_total_amont_other_event['total_net_exposure'];



		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type'");
		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);

		if ($check_num_rows <= 0) {
			$this_current_bet_details = -$bet_margin_used;
		} else {
			$this_current_bet_details = get_net_exposure_match_oods_patti($conn, $user_id, $bet_event_id, $bet_type, $bet_type_exposure, $stack, $runs, $current_bet);
		}

		$get_total_amont = $conn->query("select SUM(exposure_amount) as total_net_exposure from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type<>'$bet_type' ");
		$fetch_get_total_amont = mysqli_fetch_assoc($get_total_amont);
		$net_exposure = $fetch_get_total_amont['total_net_exposure'];


		$total_final_exposure  = $net_exposure + $this_current_bet_details;
	
	if ($user_id == 284) {
		/* echo $net_exposure. " net_exposure </br>";
			echo $net_exposure_other_event. " net_exposure_other_event </br>";
			echo $this_current_bet_details. " this_current_bet_details </br>";
			echo $total_final_exposure. " total_final_exposure </br>";
			echo $total_final_exposure + $net_exposure_other_event. " return value </br>"; */
	}
	if ($net_exposure_other_event > 0) {
		$net_exposure_other_event = 0;
	}

	return $total_final_exposure + $net_exposure_other_event;
}

function get_net_exposure_during_placing_v3_casino($conn, $user_id, $current_bet)
{
	$bet_event_id = $current_bet['bet_event_id'];
	$bet_market_id = $current_bet['bet_market_id'];
	$bet_margin_used = $current_bet['bet_margin_used'];
	$bet_win_amount = $current_bet['bet_win_amount'];
	$bet_odds = $current_bet['bet_odds'];
	$bet_type = $current_bet['bet_market_type'];
	$bet_type_exposure = $current_bet['bet_type'];
	$stack = $current_bet['stack'];
	$runs = $current_bet['runs'];

	$get_total_amont_other_event = $conn->query("select SUM(exposure_amount) as total_net_exposure from exposure_details where user_id=$user_id and event_id<>'$bet_event_id' and exposure_amount < 0");
	$fetch_get_total_amont_other_event = mysqli_fetch_assoc($get_total_amont_other_event);
	$net_exposure_other_event = $fetch_get_total_amont_other_event['total_net_exposure'];

	if ($bet_type == "FANCY_ODDS") {

		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'");

		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);
		if ($check_num_rows <= 0) {
			$this_current_bet_details = -$bet_margin_used;
		} else {


			$exposure_data = get_current_bet_fancy_casino_exposure2($conn, $user_id, $bet_event_id, $bet_market_id,"SUPER_OVER", $current_bet);
			/* if($user_id == 284){
					$exposure_data = get_current_bet_fancy_exposure3($conn,$user_id,$bet_event_id,$bet_market_id,$current_bet);
				} */
			$this_current_bet_details = min($exposure_data);
		}



		$get_total_amont = $conn->query("select SUM(exposure_amount) as total_net_exposure from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_id<>'$bet_market_id'");
		$fetch_get_total_amont = mysqli_fetch_assoc($get_total_amont);
		$net_exposure = $fetch_get_total_amont['total_net_exposure'];

		$total_final_exposure  = $this_current_bet_details + $net_exposure;
	}/*  else {


		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type'");
		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);

		if ($check_num_rows <= 0) {
			$this_current_bet_details = -$bet_margin_used;
		} else {
			$this_current_bet_details = get_net_exposure_match_oods($conn, $user_id, $bet_event_id, $bet_type, $bet_type_exposure, $stack, $runs, $current_bet);
		}

		$get_total_amont = $conn->query("select SUM(exposure_amount) as total_net_exposure from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type<>'$bet_type' ");
		$fetch_get_total_amont = mysqli_fetch_assoc($get_total_amont);
		$net_exposure = $fetch_get_total_amont['total_net_exposure'];


		$total_final_exposure  = $net_exposure + $this_current_bet_details;
	} */
	if ($user_id == 284) {
		/* echo $net_exposure. " net_exposure </br>";
			echo $net_exposure_other_event. " net_exposure_other_event </br>";
			echo $this_current_bet_details. " this_current_bet_details </br>";
			echo $total_final_exposure. " total_final_exposure </br>";
			echo $total_final_exposure + $net_exposure_other_event. " return value </br>"; */
	}
	if ($net_exposure_other_event > 0) {
		$net_exposure_other_event = 0;
	}

	return $total_final_exposure + $net_exposure_other_event;
}

function add_net_exposure_v3($conn, $user_id, $current_bet)
{
	$bet_event_id = $current_bet['bet_event_id'];
	$bet_market_id = $current_bet['bet_market_id'];
	$bet_margin_used = $current_bet['bet_margin_used'];
	$bet_win_amount = $current_bet['bet_win_amount'];
	$bet_odds = $current_bet['bet_odds'];
	$bet_type = $current_bet['bet_market_type'];
	$bet_type_exposure = $current_bet['bet_type'];
	$stack = $current_bet['stack'];
	$runs = $current_bet['runs'];
	$exposure_data = 0;
	$exposure_datetime = date("Y-m-d H:i:s");
	if ($bet_type == "FANCY_ODDS") {

		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'");

		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);

		if ($check_num_rows <= 0) {
			//insert
			$conn->query("insert into exposure_details (user_id,event_id,market_id,market_type,exposure_amount,exposure_datetime) values('$user_id','$bet_event_id','$bet_market_id','$bet_type','-$bet_margin_used','$exposure_datetime')");
		} else {
			//change net exposure

			$exposure_data = get_current_bet_fancy_exposure2($conn, $user_id, $bet_event_id, $bet_market_id);
			$exposure_data = min($exposure_data);
			$update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'");
		}
	} else {

		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type'");
		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);

		if ($check_num_rows <= 0) {
			//insert
			$conn->query("insert into exposure_details (user_id,event_id,market_type,exposure_amount,exposure_datetime) values('$user_id','$bet_event_id','$bet_type','-$bet_margin_used','$exposure_datetime')");
		} else {
			$exposure_data = get_net_exposure_match_oods($conn, $user_id, $bet_event_id, $bet_type, $bet_type_exposure, $stack, $runs);
			$update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type'");
		}
	}
	return $exposure_data;
}

function check_casino_net_exposure_v2_before_bet($conn, $user_id, $current_bet)
{
	$bet_event_id = $current_bet['bet_event_id'];
	$bet_market_id = $current_bet['bet_market_id'];
	$bet_margin_used = $current_bet['bet_margin_used'];
	$bet_win_amount = $current_bet['bet_win_amount'];
	$bet_odds = $current_bet['bet_odds'];
	$bet_type = $current_bet['bet_market_type'];
	$bet_type_exposure = $current_bet['bet_type'];
	$stack = $current_bet['stack'];
	$runs = $current_bet['runs'];
	$exposure_datetime = date("Y-m-d H:i:s");
	$bet_type_check = false;
	$return_margin = 0;
	if (strpos($bet_type, "OVER_UNDER") !== false || strpos($bet_type, "UNDER_OVER") !== false  || strpos($bet_type, "GAME_WINNER") !== false || strpos($bet_type, "2ND_SET_WINNER") !== false || strpos($bet_type, "GAME_TO_DEUCE") !== false || strpos($bet_type, "BM_2ND_SET") !== false || strpos($bet_type, "POINT_WINNER") !== false) {
		$bet_type_check = true;
	}
	if(count($current_bet) > 0 && isset($current_bet['other_fancy']) && $current_bet['other_fancy'] == "other"){
		$bet_type_check = true;
	}
	if (true) {

		$bet_market_name = "";
		$where = "";
		if (isset($current_bet['bet_market_name'])) {
			$bet_market_name = $current_bet['bet_market_name'];
			$where = " and casino_back_name='$bet_market_name'";
		}

		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type' $where");
		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);

		if ($check_num_rows <= 0) {
			//insert
			$return_margin = $bet_margin_used * (-1);
		} else {

			if ($bet_type == "INSTANT_WORLI") {
				$return_margin = $bet_margin_used * (-1);
			} else {
				$exposure_data = get_net_exposure_casino_oods_c2($conn, $user_id, $bet_event_id, $bet_type, $bet_type_exposure, $stack, $runs, $bet_market_name, $current_bet);
				$return_margin = $exposure_data;
			}
		}
	}
	return $return_margin;
}
function add_net_exposure_v2($conn, $user_id, $current_bet)
{
	$bet_event_type = $current_bet['bet_event_type'];
	$bet_event_id = $current_bet['bet_event_id'];
	$bet_market_id = $current_bet['bet_market_id'];
	$bet_margin_used = $current_bet['bet_margin_used'];
	$bet_win_amount = $current_bet['bet_win_amount'];
	$bet_odds = $current_bet['bet_odds'];
	$bet_type = $current_bet['bet_market_type'];
	$bet_type_exposure = $current_bet['bet_type'];
	$stack = $current_bet['stack'];
	$runs = $current_bet['runs'];
	$exposure_datetime = date("Y-m-d H:i:s");
	$bet_type_check = false;

	$ptinnn=array();


	$bet_market_type2 = "";
	if (isset($current_bet['bet_market_type2'])) {
		$bet_market_type2 = $current_bet['bet_market_type2'];
	}

	if (strpos($bet_type, "OVER_UNDER") !== false || strpos($bet_type, "UNDER_OVER") !== false || strpos($bet_type, "GAME_WINNER") !== false || strpos($bet_type, "2ND_SET_WINNER") !== false || strpos($bet_type, "GAME_TO_DEUCE") !== false || strpos($bet_type, "BM_2ND_SET") !== false || strpos($bet_type, "POINT_WINNER") !== false) {
		$bet_type_check = true;
	}

	if(count($current_bet) > 0 && isset($current_bet['other_fancy']) && $current_bet['other_fancy'] == "other"){
		$bet_type_check = true;
	}

	if ($bet_type == "KHADO_ODDS") { 

		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'");

		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);

		if ($check_num_rows <= 0) {
			//insert
			$conn->query("insert into exposure_details (user_id,event_id,market_id,market_type,exposure_amount,exposure_datetime,max_winning_amount) values('$user_id','$bet_event_id','$bet_market_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_win_amount')");
		} else {
			//change net exposure

			//$exposure_data = get_current_bet_fancy_exposure2($conn,$user_id,$bet_event_id,$bet_market_id);
			//$exposure_data = min($exposure_data);
			$update_exposure_data = $conn->query("update exposure_details set exposure_amount = exposure_amount - '$stack',max_winning_amount='$bet_win_amount',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'");
		}
	} 
	else if ($bet_type == "FANCY_ODDS" or $bet_type == "FANCY1_ODDS" or $bet_type == "BALL_ODDS") {


		if ($bet_market_type2 == "SUPER_OVER" or $bet_market_type2 == "FIVE_5_CRICKET" or $bet_market_type2 == "SUPER_OVER2" or $bet_market_type2 == "SUPER_OVER3") {
			/* if($bet_type == "FANCY1_ODDS"){
					$bet_market_type2 = "FANCY_ODDS";
					$bet_type = "FANCY_ODDS";
				} */
		}

		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'");

		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);

		if ($check_num_rows <= 0) {
			//insert
			$conn->query("insert into exposure_details (user_id,event_id,market_id,market_type,exposure_amount,exposure_datetime,max_winning_amount) values('$user_id','$bet_event_id','$bet_market_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_win_amount')");
		} else {
			//change net exposure

			if ($bet_market_type2 == "SUPER_OVER" or $bet_market_type2 == "FIVE_5_CRICKET" or $bet_market_type2 == "SUPER_OVER2" or $bet_market_type2 == "SUPER_OVER3") {

				$exposure_data = get_current_bet_fancy_casino_exposure2($conn, $user_id, $bet_event_id, $bet_market_id, $bet_market_type2);
			} else {
				if(isset($current_bet['odds_even']) && $current_bet['odds_even'] == "yes"){
					$exposure_data = get_current_bet_fancy_exposure_oddseven($conn, $user_id, $bet_event_id, $bet_market_id);
				}else{
					$exposure_data = get_current_bet_fancy_exposure2($conn, $user_id, $bet_event_id, $bet_market_id);
				}
			}


			$exposure_data1 = min($exposure_data);
			$max_exposure_data = max($exposure_data);
			if ($max_exposure_data < 0) {
				$max_exposure_data = 0;
			}
			$update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data1',max_winning_amount='$max_exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'");
		}
	} 
	else if ($bet_type == "MATCH_ODDS" or $bet_type == "BOOKMAKER_ODDS" or $bet_type == "BOOKMAKERSMALL_ODDS" or $bet_type == "BOOKMAKER_TIED_ODDS"  or $bet_type_check == true) {

		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type'");
		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);

		if ($check_num_rows <= 0) {
			//insert
			$conn->query("insert into exposure_details (user_id,event_id,market_type,exposure_amount,exposure_datetime,event_type,max_winning_amount) values('$user_id','$bet_event_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_event_type','$bet_win_amount')");
		} 
		else {
			
			if(isset($current_bet['number_market_pass']) && $current_bet['number_market_pass'] == "yes"){
				$exposure_data_all = get_net_exposure_match_oods($conn, $user_id, $bet_event_id, $bet_type, $bet_type_exposure, $stack, $runs, $current_bet, 1);
				$ptinnn['respoimnse']=$exposure_data_all;
				if(isset($exposure_data_all['net_exposure_array'])){
					$exposure_data_all=$exposure_data_all['net_exposure_array'];
				}
			}else{
				$exposure_data_all = get_net_exposure_match_oods($conn, $user_id, $bet_event_id, $bet_type, $bet_type_exposure, $stack, $runs, array(), 1);
			}
			
			$exposure_data = min($exposure_data_all);
			$max_exposure_data = max($exposure_data_all);
			if ($max_exposure_data < 0) {
				$max_exposure_data = 0;
			}
			$update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',max_winning_amount='$max_exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type'");
		}
		$ptinnn['testcurrent_bet1']=$current_bet;
		return $ptinnn;
	} else {

		$bet_market_name = "";
		$where = "";
		if (isset($current_bet['bet_market_name'])) {
			$bet_market_name = $current_bet['bet_market_name'];
			$where = " and casino_back_name='$bet_market_name'";
		}
		if ($bet_market_type2 == "RACE17" || $bet_market_type2 == "NOTENUM" || $bet_market_type2 == "PATTI2" || $bet_market_type2 == "TEENSIN" || ($bet_market_type2 == "ODITEENPATTI" && $bet_market_id > 2) || ($bet_market_type2 == "TEEN62" && $bet_market_id > 2) || ($bet_market_type2 == "TEENJOKER" && $bet_market_id > 2) || ($bet_market_type2 == "TRAP" && $bet_market_id > 2) || ($bet_market_type2 == "MOGAMBO" && $bet_market_id > 2)) {
			$where .= " and market_id='$bet_market_id'";
		}

		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type' $where");
		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);

		if ($check_num_rows <= 0) {
			//insert
			if ($bet_market_type2 == "RACE17" || $bet_market_type2 == "NOTENUM" || $bet_market_type2 == "PATTI2" || $bet_market_type2 == "TEENSIN" ||  ($bet_market_type2 == "ODITEENPATTI" && $bet_market_id > 2) || ($bet_market_type2 == "TEEN62" && $bet_market_id > 2) || ($bet_market_type2 == "TEENJOKER" && $bet_market_id > 2) || ($bet_market_type2 == "TRAP" && $bet_market_id > 2) || ($bet_market_type2 == "MOGAMBO" && $bet_market_id > 2)) {
				$conn->query("insert into exposure_details (user_id,event_id,market_id,market_type,exposure_amount,exposure_datetime,casino_back_name,max_winning_amount) values('$user_id','$bet_event_id','$bet_market_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_market_name','$bet_win_amount')");
			}else{
				$conn->query("insert into exposure_details (user_id,event_id,market_type,exposure_amount,exposure_datetime,casino_back_name,max_winning_amount) values('$user_id','$bet_event_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_market_name','$bet_win_amount')");
			}
		} else {

			if ($bet_type == "INSTANT_WORLI") {
				$conn->query("insert into exposure_details (user_id,event_id,market_type,exposure_amount,exposure_datetime,casino_back_name,max_winning_amount) values('$user_id','$bet_event_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_market_name','$bet_win_amount')");
			} else {
				if ($bet_market_type2 == "NOTENUM" || $bet_market_type2 == "RACE17" || $bet_market_type2 == "PATTI2" || $bet_market_type2 == "TEENSIN" || $bet_market_type2 == "ODITEENPATTI" || $bet_market_type2 == "TEEN62" || $bet_market_type2 == "TEENJOKER" || $bet_market_type2 == "TRAP" || $bet_market_type2 == "MOGAMBO") {
					if(($bet_market_type2 == "ODITEENPATTI" &&  $bet_market_id <= 2) || ($bet_market_type2 == "TEEN62" &&  $bet_market_id <= 2) || ($bet_market_type2 == "TEENJOKER" && $bet_market_id <= 2) || ($bet_market_type2 == "TRAP" && $bet_market_id <= 2) || ($bet_market_type2 == "MOGAMBO" && $bet_market_id <= 2)){
						$exposure_data = get_current_bet_fancy_casino_exposure_patti($conn, $user_id, $bet_event_id, $bet_market_id, $bet_market_type2);
						$exposure_data = min($exposure_data);
					}else{
						$exposure_data = get_current_bet_fancy_casino_exposure2($conn, $user_id, $bet_event_id, $bet_market_id, $bet_market_type2);
						$exposure_data = min($exposure_data);
					}
				}else if($bet_market_type2 == "POISON" || $bet_market_type2 == "POISON20" || $bet_market_type2 == "JOKER20" || $bet_market_type2 == "JOKER1"){

					$exposure_data = get_net_exposure_casino_oods_on_page_poison_expo($conn, $user_id, $bet_event_id, $bet_type, $bet_market_name);
				}else if($bet_type == "ROULETTE11" || $bet_type == "ROULETTE12" || $bet_type == "ROULETTE13" || $bet_type == "OURROULLETE"|| $bet_type == "TEENUNIQUE"){
					$exposure_data = get_net_exposure_casino_roullete($conn, $user_id, $bet_event_id, $bet_type);
				} else {
					$exposure_data = get_net_exposure_casino_oods($conn, $user_id, $bet_event_id, $bet_type, $bet_type_exposure, $stack, $runs, $bet_market_name);
				}

				$max_exposure_data = abs($exposure_data);

				if ($bet_market_type2 == "NOTENUM" || $bet_market_type2 == "RACE17" || $bet_market_type2 == "PATTI2" || $bet_market_type2 == "TEENSIN" || $bet_market_type2 == "ODITEENPATTI" || $bet_market_type2 == "TEEN62" || $bet_market_type2 == "TEENJOKER" || $bet_market_type2 == "TRAP" || $bet_market_type2 == "MOGAMBO") {
					if(($bet_market_type2 == "ODITEENPATTI" &&  $bet_market_id <= 2) || ($bet_market_type2 == "TEENJOKER" && $bet_market_id <= 2) || ($bet_market_type2 == "TRAP" && $bet_market_id <= 2) || ($bet_market_type2 == "MOGAMBO" && $bet_market_id <= 2) || ($bet_market_type2 == "TEEN62" && $bet_market_id <= 2)){
					$update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',max_winning_amount='$max_exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type' and casino_back_name='$bet_market_name' and market_id='0'");
					}else{
						$update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',max_winning_amount='$max_exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type' and casino_back_name='$bet_market_name' and market_id='$bet_market_id'");
					}
				}else{
					$update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',max_winning_amount='$max_exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type' and casino_back_name='$bet_market_name'");
				}
			}
		}
		return $ptinnn;
	} 
}

function get_net_exposure_match_oods($conn, $user_id, $bet_event_id, $market_type, $bet_type_exposure, $stack, $runs, $current_bet = array(), $is_all_value = 0)
{
	$print_val=array();
    $runs = floatVal($runs);
    $event_id = $bet_event_id;
    $market_id = $conn->query("select * from event_market_id where event_id='$bet_event_id' and market_type='$market_type'");
    $market_ids = array();
    while ($market_ids_array = mysqli_fetch_assoc($market_id)) {
        $market_ids[] = $market_ids_array['market_id'];
    }

    $bet_type_check = false;

    if (strpos($market_type, "OVER_UNDER") !== false || strpos($market_type, "UNDER_OVER") !== false || strpos($market_type, "GAME_WINNER") !== false || strpos($market_type, "2ND_SET_WINNER") !== false || strpos($market_type, "GAME_TO_DEUCE") !== false || strpos($market_type, "BM_2ND_SET") !== false || strpos($market_type, "POINT_WINNER") !== false) {
        $bet_type_check = true;
    }

    if (count($current_bet) > 0 && isset($current_bet['other_fancy']) && $current_bet['other_fancy'] == "other") {
        $bet_type_check = true;
    }
    $othermarkets = array();
    $market_ids = array_unique($market_ids);
    if ($market_type == "MATCH_ODDS" or $market_type == "BOOKMAKER_ODDS" or $market_type == "BOOKMAKERSMALL_ODDS" or $market_type == "BOOKMAKER_TIED_ODDS" or $bet_type_check == true) {
        $market_1_id = $market_ids[0];

        $market_2_id = $market_ids[1];
        /* $market_3_id = $market_ids[2]; */

        
        foreach ($market_ids as $keys => $ids) {
            if ($keys != 0 and $keys != 1) {
                $othermarkets[] = $ids;
            }
        }
    } else {
        $market_1_id = 1;
        $market_2_id = 3;
    }


    $type = $bet_type_exposure;
    if ($market_type == "MATCH_ODDS" or $market_type == "BOOKMAKER_ODDS" or $market_type == "BOOKMAKERSMALL_ODDS" or $market_type == "BOOKMAKER_TIED_ODDS" or $bet_type_check == true) {
        if ($type == "Lay") {
            $exposure_bet_type = "Lay";
            $margin_used = $stack * ($runs - 1);
            $bet_win_amount = $stack;
        } else {
            $exposure_bet_type = "Back";
            $bet_win_amount = $stack * ($runs - 1);
            $margin_used = $stack;
        }

		
		$print_val['get_match_odds_active_bet']="select SUM(bet_margin_used) as total_bet_amount, event_id from bet_details where user_id=$user_id and event_id=$event_id and market_type='$market_type' and bet_status=1 GROUP BY event_id";
        $get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_details where user_id=$user_id and event_id=$event_id and market_type='$market_type' and bet_status=1 GROUP BY event_id");
        $fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
        $total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];
		$print_val['total_bet_amount']=$total_bet_amount;



        $event_1_id = $event_id;


        $get_1_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type='$market_type' and bet_type='Back'");
		$print_val['get_1_win_back_data']="select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type='$market_type' and bet_type='Back'";

        $get_1_opp_lay_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_1_id and market_type='$market_type' and bet_type='Lay'");
		$print_val['get_1_opp_lay_data']="select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_1_id and market_type='$market_type' and bet_type='Lay'";

        $get_2_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type='$market_type' and bet_type='Back'");
		$print_val['get_2_win_back_data']="select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type='$market_type' and bet_type='Back'";

        $get_2_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_2_id and market_type='$market_type' and bet_type='Lay'");
		$print_val['get_2_opp_lay_data']="select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_2_id and market_type='$market_type' and bet_type='Lay'";




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

        $other_market_win = array();
        if (count($othermarkets) > 0) {
            foreach ($othermarkets as $markets) {
				
                $get_3_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$markets and market_type='$market_type' and bet_type='Back'");
				$print_val['get_3_win_back_data'][]="select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$markets and market_type='$market_type' and bet_type='Back'";

                $get_3_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$markets and market_type='$market_type' and bet_type='Lay'");
				$print_val['get_3_opp_lay_data'][]="select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$markets and market_type='$market_type' and bet_type='Lay'";
                $total_3_win_back = 0;
                while ($fetch_get_3_win_back_data = mysqli_fetch_assoc($get_3_win_back_data)) {
                    $total_3_win_back = $total_3_win_back + $fetch_get_3_win_back_data['bet_win_amount'] + $fetch_get_3_win_back_data['bet_margin_used'];
                }
                $other_market_win["total_" . $markets . "_win_back"] = $total_3_win_back;
                $total_3_win_lay = 0;
                while ($fetch_get_3_opp_lay_data = mysqli_fetch_assoc($get_3_opp_lay_data)) {
                    $total_3_win_lay = $total_3_win_lay + $fetch_get_3_opp_lay_data['bet_win_amount'] + $fetch_get_3_opp_lay_data['bet_margin_used'];
                }
                $other_market_win["total_" . $markets . "_win_lay"] = $total_3_win_lay;
            }
        }
		$print_val['other_market_win'][]=$other_market_win;
		$print_val['current_bet']=$current_bet;
        $current_bet_event_id = $current_bet['bet_event_id'];

        if ($current_bet_event_id == $event_1_id) {

            $current_bet_market_id = $current_bet['bet_market_id'];
            $current_bet_type = $current_bet['bet_type'];
            $current_bet_win_amount = $current_bet['bet_win_amount'];
            $current_bet_margin_used = $current_bet['bet_margin_used'];
			if(isset($current_bet['number_market_pass']) && $current_bet['number_market_pass'] == "yes"){

			}else{
            $total_bet_amount = $total_bet_amount + $current_bet_margin_used;
			}
            if ($current_bet_type == 'Back') {
                //same market id
                if ($current_bet_market_id == $market_1_id) {
                    $total_1_win_back = $total_1_win_back + $current_bet_win_amount + $current_bet_margin_used;
                } else if ($current_bet_market_id == $market_2_id) {
                    $total_2_win_back = $total_2_win_back + $current_bet_win_amount + $current_bet_margin_used;
                } else {
                    if (count($othermarkets) > 0) {
                        foreach ($othermarkets as $markets) {
							if ($current_bet_market_id == $markets) {
                            	$other_market_win["total_" . $markets . "_win_back"] =  $other_market_win["total_" . $markets . "_win_back"]  + $current_bet_win_amount + $current_bet_margin_used;
							}
                        }
                    }
                }
            } else {
                //other market id
                if ($current_bet_market_id == $market_1_id) {
                    $total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					if (count($othermarkets) > 0) {
                   
						foreach ($othermarkets as $markets) {
							$other_market_win["total_" . $markets . "_win_lay"] =  $other_market_win["total_" . $markets . "_win_lay"]  + $current_bet_win_amount + $current_bet_margin_used;
						
						}
					}
                    
                } else if ($current_bet_market_id == $market_2_id) {
                    $total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					if (count($othermarkets) > 0) {
                   
						foreach ($othermarkets as $markets) {
							$other_market_win["total_" . $markets . "_win_lay"] =  $other_market_win["total_" . $markets . "_win_lay"]  + $current_bet_win_amount + $current_bet_margin_used;
						}
					}
                    
                } else {
                    $total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
                    $total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					if (count($othermarkets) > 0) {
                   
						foreach ($othermarkets as $markets) {
							if ($current_bet_market_id != $markets) {
								$other_market_win["total_" . $markets . "_win_lay"] =  $other_market_win["total_" . $markets . "_win_lay"]  + $current_bet_win_amount + $current_bet_margin_used;
							}
						}
					}
                }
				
            }
        }
$print_val['other_market_win'][]=$other_market_win;
        $winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;

        $winning_amount_team_2 = ($total_2_win_back + $total_2_win_lay) - $total_bet_amount;

        $win_team_1 = $winning_amount_team_1;

        $win_team_2 = $winning_amount_team_2;
        $net_exposure_array = array();
        if (count($othermarkets) > 0) {
            $net_exposure_array[] = $win_team_1;
            $net_exposure_array[] = $win_team_2;
            foreach ($othermarkets as $markets) {
                $win_team_3 =  ($other_market_win["total_" . $markets . "_win_back"] + $other_market_win["total_" . $markets . "_win_lay"]) - $total_bet_amount;
                $net_exposure_array[] = $win_team_3;
            }
        } else {

            $net_exposure_array[] = $win_team_1;
            $net_exposure_array[] = $win_team_2;
        }
    }

    if ($is_all_value == 0) {
        $net_exposure_array =  min($net_exposure_array);
    }
	if(isset($current_bet['number_market_pass']) && $current_bet['number_market_pass'] == "yes"){
		$print_val['net_exposure_array']=$net_exposure_array;
	 	return $net_exposure_array;
	}else{
    	return $net_exposure_array;
	}
	
}
function get_net_exposure_match_oods_patti($conn, $user_id, $bet_event_id, $market_type, $bet_type_exposure, $stack, $runs, $current_bet = array(), $is_all_value = 0)
{
    $runs = floatVal($runs);
    $event_id = $bet_event_id;
    $market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type'");
    $market_ids = array();
    while ($market_ids_array = mysqli_fetch_assoc($market_id)) {
        $market_ids[] = $market_ids_array['market_id'];
    }

    $bet_type_check = false;

    $othermarkets = array();
    $market_ids = array_unique($market_ids);

        $market_1_id = $market_ids[0];

        $market_2_id = $market_ids[1];
        /* $market_3_id = $market_ids[2]; */

        
        foreach ($market_ids as $keys => $ids) {
            if ($keys != 0 and $keys != 1) {
                $othermarkets[] = $ids;
            }
        }
   


    $type = $bet_type_exposure;
        if ($type == "Lay") {
            $exposure_bet_type = "Lay";
            $margin_used = $stack * ($runs - 1);
            $bet_win_amount = $stack;
        } else {
            $exposure_bet_type = "Back";
            $bet_win_amount = $stack * ($runs - 1);
            $margin_used = $stack;
        }


        $get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$market_type' and bet_status=1 GROUP BY event_id");
        $fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
        $total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];




        $event_1_id = $event_id;


        $get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type='$market_type' and bet_type='Back'");

        $get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_1_id and market_type='$market_type' and bet_type='Lay'");

        $get_2_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type='$market_type' and bet_type='Back'");

        $get_2_opp_lay_data = $conn->query("select * from  bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_2_id and market_type='$market_type' and bet_type='Lay'");




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

        $other_market_win = array();
        if (count($othermarkets) > 0) {
            foreach ($othermarkets as $markets) {
                $get_3_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$markets and market_type='$market_type' and bet_type='Back'");

                $get_3_opp_lay_data = $conn->query("select * from  bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$markets and market_type='$market_type' and bet_type='Lay'");
                $total_3_win_back = 0;
                while ($fetch_get_3_win_back_data = mysqli_fetch_assoc($get_3_win_back_data)) {
                    $total_3_win_back = $total_3_win_back + $fetch_get_3_win_back_data['bet_win_amount'] + $fetch_get_3_win_back_data['bet_margin_used'];
                }
                $other_market_win["total_" . $markets . "_win_back"] = $total_3_win_back;
                $total_3_win_lay = 0;
                while ($fetch_get_3_opp_lay_data = mysqli_fetch_assoc($get_3_opp_lay_data)) {
                    $total_3_win_lay = $total_3_win_lay + $fetch_get_3_opp_lay_data['bet_win_amount'] + $fetch_get_3_opp_lay_data['bet_margin_used'];
                }
                $other_market_win["total_" . $markets . "_win_lay"] = $total_3_win_lay;
            }
        }


        $current_bet_event_id = $current_bet['bet_event_id'];

        if ($current_bet_event_id == $event_1_id) {

            $current_bet_market_id = $current_bet['bet_market_id'];
            $current_bet_type = $current_bet['bet_type'];
            $current_bet_win_amount = $current_bet['bet_win_amount'];
            $current_bet_margin_used = $current_bet['bet_margin_used'];
            $total_bet_amount = $total_bet_amount + $current_bet_margin_used;
            if ($current_bet_type == 'Back') {
                //same market id
                if ($current_bet_market_id == $market_1_id) {
                    $total_1_win_back = $total_1_win_back + $current_bet_win_amount + $current_bet_margin_used;
                } else if ($current_bet_market_id == $market_2_id) {
                    $total_2_win_back = $total_2_win_back + $current_bet_win_amount + $current_bet_margin_used;
                } else {
                    if (count($othermarkets) > 0) {
                        foreach ($othermarkets as $markets) {
                            $other_market_win["total_" . $markets . "_win_back"] =  $other_market_win["total_" . $markets . "_win_back"]  + $current_bet_win_amount + $current_bet_margin_used;
                        }
                    }
                }
            } else {
                //other market id
                if ($current_bet_market_id == $market_1_id) {
                    $total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
                    if (count($othermarkets) > 0) {
                        foreach ($othermarkets as $markets) {
                            $other_market_win["total_" . $markets . "_win_lay"] =  $other_market_win["total_" . $markets . "_win_lay"]  + $current_bet_win_amount + $current_bet_margin_used;
                        }
                    }
                } else if ($current_bet_market_id == $market_2_id) {
                    $total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
                    if (count($othermarkets) > 0) {
                        foreach ($othermarkets as $markets) {
                            $other_market_win["total_" . $markets . "_win_lay"] =  $other_market_win["total_" . $markets . "_win_lay"]  + $current_bet_win_amount + $current_bet_margin_used;
                        }
                    }
                } else if (count($othermarkets) > 0) {
                    $total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
                    $total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
                    foreach ($othermarkets as $markets) {
                        if ($current_bet_market_id != $markets) {
                            $other_market_win["total_" . $markets . "_win_lay"] =  $other_market_win["total_" . $markets . "_win_lay"]  + $current_bet_win_amount + $current_bet_margin_used;
                        }
                    }
                } else {
                    $total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
                    $total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
                }
            }
        }

        $winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;

        $winning_amount_team_2 = ($total_2_win_back + $total_2_win_lay) - $total_bet_amount;

        $win_team_1 = $winning_amount_team_1;

        $win_team_2 = $winning_amount_team_2;
        $net_exposure_array = array();
        if (count($othermarkets) > 0) {
            $net_exposure_array[] = $win_team_1;
            $net_exposure_array[] = $win_team_2;
            foreach ($othermarkets as $markets) {
                $win_team_3 =  ($other_market_win["total_" . $markets . "_win_back"] + $other_market_win["total_" . $markets . "_win_lay"]) - $total_bet_amount;
                $net_exposure_array[] = $win_team_3;
            }
        } else {

            $net_exposure_array[] = $win_team_1;
            $net_exposure_array[] = $win_team_2;
        }
    

    if ($is_all_value == 0) {
        $net_exposure_array =  min($net_exposure_array);
    }

    return $net_exposure_array;
}

/* function get_net_exposure_match_oods($conn, $user_id, $bet_event_id, $market_type, $bet_type_exposure, $stack, $runs, $current_bet = array(), $is_all_value = 0)
{
	$runs = floatVal($runs);
	$event_id = $bet_event_id;
	$market_id = $conn->query("select * from event_market_id where event_id='$bet_event_id' and market_type='$market_type'");
	$market_ids = array();
	while ($market_ids_array = mysqli_fetch_assoc($market_id)) {
		$market_ids[] = $market_ids_array['market_id'];
	}

	$bet_type_check = false;

	if (strpos($market_type, "OVER_UNDER") !== false || strpos($market_type, "UNDER_OVER") !== false || strpos($market_type, "GAME_WINNER") !== false || strpos($market_type, "2ND_SET_WINNER") !== false || strpos($market_type, "GAME_TO_DEUCE") !== false || strpos($market_type, "BM_2ND_SET") !== false || strpos($market_type, "POINT_WINNER") !== false) {
		$bet_type_check = true;
	}

	if(count($current_bet) > 0 && isset($current_bet['other_fancy']) && $current_bet['other_fancy'] == "other"){
		$bet_type_check = true;
	}

	$market_ids = array_unique($market_ids);
	if ($market_type == "MATCH_ODDS" or $market_type == "BOOKMAKER_ODDS" or $market_type == "BOOKMAKERSMALL_ODDS" or $market_type == "BOOKMAKER_TIED_ODDS" or $bet_type_check == true) {
		$market_1_id = $market_ids[0];

		$market_2_id = $market_ids[1];

		$market_3_id = $market_ids[2];
	} else {
		$market_1_id = 1;
		$market_2_id = 3;
	}


	$type = $bet_type_exposure;
	if ($market_type == "MATCH_ODDS" or $market_type == "BOOKMAKER_ODDS" or $market_type == "BOOKMAKERSMALL_ODDS" or $market_type == "BOOKMAKER_TIED_ODDS" or $bet_type_check == true) {
		if ($type == "Lay") {
			$exposure_bet_type = "Lay";
			$margin_used = $stack * ($runs - 1);
			$bet_win_amount = $stack;
		} else {
			$exposure_bet_type = "Back";
			$bet_win_amount = $stack * ($runs - 1);
			$margin_used = $stack;
		}



		$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_details where user_id=$user_id and event_id=$event_id and market_type='$market_type' and bet_status=1 GROUP BY event_id");
		$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
		$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];




		$event_1_id = $event_id;

		$get_1_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type='$market_type' and bet_type='Back'");

		$get_1_opp_lay_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_1_id and market_type='$market_type' and bet_type='Lay'");

		$get_2_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type='$market_type' and bet_type='Back'");

		$get_2_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_2_id and market_type='$market_type' and bet_type='Lay'");




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


		if ($market_3_id != "") {
			$get_3_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_3_id and market_type='$market_type' and bet_type='Back'");

			$get_3_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_3_id and market_type='$market_type' and bet_type='Lay'");
			$total_3_win_back = 0;
			while ($fetch_get_3_win_back_data = mysqli_fetch_assoc($get_3_win_back_data)) {
				$total_3_win_back = $total_3_win_back + $fetch_get_3_win_back_data['bet_win_amount'] + $fetch_get_3_win_back_data['bet_margin_used'];
			}
			$total_3_win_lay = 0;
			while ($fetch_get_3_opp_lay_data = mysqli_fetch_assoc($get_3_opp_lay_data)) {
				$total_3_win_lay = $total_3_win_lay + $fetch_get_3_opp_lay_data['bet_win_amount'] + $fetch_get_3_opp_lay_data['bet_margin_used'];
			}
		}





		$current_bet_event_id = $current_bet['bet_event_id'];

		if ($current_bet_event_id == $event_1_id) {

			$current_bet_market_id = $current_bet['bet_market_id'];
			$current_bet_type = $current_bet['bet_type'];
			$current_bet_win_amount = $current_bet['bet_win_amount'];
			$current_bet_margin_used = $current_bet['bet_margin_used'];
			$total_bet_amount = $total_bet_amount + $current_bet_margin_used;
			if ($current_bet_type == 'Back') {
				//same market id
				if ($current_bet_market_id == $market_1_id) {
					$total_1_win_back = $total_1_win_back + $current_bet_win_amount + $current_bet_margin_used;
				} else if ($current_bet_market_id == $market_2_id) {
					$total_2_win_back = $total_2_win_back + $current_bet_win_amount + $current_bet_margin_used;
				} else {
					if ($market_3_id != "") {
						$total_3_win_back = $total_3_win_back + $current_bet_win_amount + $current_bet_margin_used;
					}
				}
			} else {
				//other market id
				if ($current_bet_market_id == $market_1_id) {
					$total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					if ($market_3_id != "") {
						$total_3_win_lay = $total_3_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					}
				} else if ($current_bet_market_id == $market_2_id) {
					$total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					if ($market_3_id != "") {
						$total_3_win_lay = $total_3_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					}
				} else {
					$total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					$total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
				}
			}
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;

		$winning_amount_team_2 = ($total_2_win_back + $total_2_win_lay) - $total_bet_amount;
		if ($market_3_id != "") {
			$winning_amount_team_3 = ($total_3_win_back + $total_3_win_lay) - $total_bet_amount;
		}

		$win_team_1 = $winning_amount_team_1;

		$win_team_2 = $winning_amount_team_2;
		$net_exposure_array = array();
		if ($market_3_id != "") {
			$win_team_3 = $winning_amount_team_3;
			
			$net_exposure_array[] = $win_team_1;
			$net_exposure_array[] = $win_team_2;
			$net_exposure_array[] = $win_team_3;
		} else {
			
			$net_exposure_array[] = $win_team_1;
			$net_exposure_array[] = $win_team_2;
		}
	}

	if ($is_all_value == 0) {
		$net_exposure_array =  min($net_exposure_array);
	}

	return $net_exposure_array;
} */
function get_net_exposure_casino_roullete($conn, $user_id, $bet_event_id, $market_type)
{

	$event_id = $bet_event_id;
	

	$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and event_name='$market_type' and bet_status=1");
	$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
	$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];
	if(empty($total_bet_amount)){
		$total_bet_amount=0;
	}
		
	return -abs($total_bet_amount);
}

function get_net_exposure_casino_oods($conn, $user_id, $bet_event_id, $market_type, $bet_type_exposure, $stack, $runs, $bet_market_name, $current_bet = array(), $is_all_value = 0)
{

	$runs = floatVal($runs);
	$event_id = $bet_event_id;
	if ($bet_market_name == "") {

		$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type'");
	} else {

		$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type' and back_name='$bet_market_name'");
	}

	$market_ids = array();
	while ($market_ids_array = mysqli_fetch_assoc($market_id)) {
		$market_ids[] = $market_ids_array['market_id'];
	}

	$market_idss = array_unique($market_ids);

	$net_exposure_array = array();
	foreach ($market_idss as $market_ids1) {
		$market_id1 = $market_ids1;

		$type = $bet_type_exposure;
		if ($type == "Lay") {
			$exposure_bet_type = "Lay";
			$margin_used = $stack * ($runs - 1);
			$bet_win_amount = $stack;
		} else {
			$exposure_bet_type = "Back";
			$bet_win_amount = $stack * ($runs - 1);
			$margin_used = $stack;
		}

		$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name' and bet_status=1 GROUP BY event_id");
		$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
		$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

		$event_1_id = $event_id;

		$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back'");

		$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'");


		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = $win_team_1;
	}


	if ($is_all_value == 0) {
		$net_exposure_array =  min($net_exposure_array);
	}
	return $net_exposure_array;
}

function get_net_exposure_casino_oods_c2($conn, $user_id, $bet_event_id, $market_type, $bet_type_exposure, $stack, $runs, $bet_market_name, $current_bet = array())
{

	$runs = floatVal($runs);
	$event_id = $bet_event_id;
	if ($bet_market_name == "") {

		$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type'");
	} else {

		$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type' and back_name='$bet_market_name'");
	}

	$market_ids = array();
	while ($market_ids_array = mysqli_fetch_assoc($market_id)) {
		$market_ids[] = $market_ids_array['market_id'];
	}

	$market_idss = array_unique($market_ids);

	$net_exposure_array = array();
	foreach ($market_idss as $market_ids1) {
		$market_id1 = $market_ids1;

		$type = $bet_type_exposure;
		if ($type == "Lay") {
			$exposure_bet_type = "Lay";
			$margin_used = $stack * ($runs - 1);
			$bet_win_amount = $stack;
		} else {
			$exposure_bet_type = "Back";
			$bet_win_amount = $stack * ($runs - 1);
			$margin_used = $stack;
		}

		$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name' and bet_status=1 GROUP BY event_id");
		$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
		$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

		$event_1_id = $event_id;

		$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back'");

		$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'");


		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		if (isset($current_bet['bet_market_id'])) {

			if ($current_bet['bet_market_id'] == $market_id1 and $current_bet['bet_type'] == "Back") {

				$total_1_win_back = $total_1_win_back + $current_bet['bet_win_amount'] + $current_bet['bet_margin_used'];
			} else if ($current_bet['bet_market_id'] != $market_id1 and $current_bet['bet_type'] == "Lay") {
				$total_1_win_lay = $total_1_win_lay + $current_bet['bet_win_amount'] + $current_bet['bet_margin_used'];
			}
			$total_bet_amount = $total_bet_amount + $current_bet['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = $win_team_1;
	}


	$net_exposure_array =  min($net_exposure_array);
	return $net_exposure_array;
}

function get_net_exposure_casino_oods_on_page($conn, $user_id, $bet_event_id, $market_type, $bet_market_name)
{


	$event_id = $bet_event_id;
	if ($bet_market_name == "") {

		$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type'");
	} else {

		$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type' and back_name='$bet_market_name'");
	}

	$market_ids = array();
	while ($market_ids_array = mysqli_fetch_assoc($market_id)) {
		if($market_type == "TEEN41" or $market_type == "TEEN42" or $market_type == "TEEN1" or $market_type == "ODITEENPATTI" or $market_type == "TEEN62" or $market_type == "TEEN6" or $market_type == "TRAP" or $market_type == "PATTI2" or $market_type == "TEEN3" or $market_type == "TEENJOKER" or $market_type == "NOTENUM" or $market_type == "RACE17" or $market_type == "DOLIDANA" or $market_type == "MOGAMBO"){
			if($market_ids_array['market_id'] == "1" || $market_ids_array['market_id'] == "2"){
				$market_ids[] = $market_ids_array['market_id'];
			}
		}
		else if($market_type == "DUM10"){
			if($market_ids_array['market_id'] == "1"){
				$market_ids[] = $market_ids_array['market_id'];
			}
		}else{
			$market_ids[] = $market_ids_array['market_id'];
		}
	}

	$market_idss = array_unique($market_ids);

	$net_exposure_array = array();
	foreach ($market_idss as $market_ids1) {
		$market_id1 = $market_ids1;

		if ($market_type == "SUPER_OVER" or $market_type == "FIVE_5_CRICKET" or $market_type == "SUPER_OVER2" or $market_type == "SUPER_OVER3" or $market_type == "TEEN41" or $market_type == "TEEN42" or $market_type == "ODITEENPATTI" or $market_type == "TEEN6" or $market_type == "TEEN62" or $market_type == "TEEN1" or $market_type == "TRAP" or $market_type == "PATTI2" or $market_type == "TEEN3" or $market_type == "TEENJOKER" or $market_type == "NOTENUM" or $market_type == "RACE17" or $market_type == "DOLIDANA" or $market_type == "MOGAMBO") {

		
			$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name'  and market_id IN (1,2) and bet_status=1 GROUP BY event_id");
			$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

			$event_1_id = $event_id;

			$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back' and market_id IN (1,2)");

			$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'  and market_id IN (1,2)");
		} else {

			$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name' and bet_status=1 GROUP BY event_id");
			$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

			$event_1_id = $event_id;

			$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back'");

			$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'");
		}

		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		
		$net_exposure_array[] = array(
			"market_id" => $market_id1,
			"win_loss" => $win_team_1,	
		);
	}

	return $net_exposure_array;
}
function get_net_exposure_casino_oods_on_page_poison_expo($conn, $user_id, $bet_event_id, $market_type, $bet_market_name)
{


	$event_id = $bet_event_id;
	if ($bet_market_name == "") {

		$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type'");
	} else {

		$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type' and back_name='$bet_market_name'");
	}

	$market_ids = array();
	$market_ids2 = array();
	$market_ids3 = array();
	$market_ids4 = array();
	$market_ids_joker = array();
	while ($market_ids_array = mysqli_fetch_assoc($market_id)) {
		
			if($market_ids_array['market_id'] == "1" || $market_ids_array['market_id'] == "2"){
				$market_ids[] = $market_ids_array['market_id'];
			}
			else if($market_ids_array['market_id'] == "3" || $market_ids_array['market_id'] == "4"){
				$market_ids2[] = $market_ids_array['market_id'];
			}
			else if($market_ids_array['market_id'] == "5" || $market_ids_array['market_id'] == "6"){
				$market_ids3[] = $market_ids_array['market_id'];
			}
			else if($market_ids_array['market_id'] == "14" || $market_ids_array['market_id'] == "140"){
				$market_ids_joker[] = $market_ids_array['market_id'];
			}
			else{
				$market_ids4[] = $market_ids_array['market_id'];
			}
	}

	$market_idss = array_unique($market_ids);
	$market_idss2 = array_unique($market_ids2);
	$market_idss3 = array_unique($market_ids3);
	$market_idss4 = array_unique($market_ids4);
	$market_idss_joker = array_unique($market_ids_joker);

	$net_exposure_array = array();
	$net_exposure_array_final = 0;
	foreach ($market_idss as $market_ids1) {
		$market_id1 = $market_ids1;

		
			$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name'  and market_id IN (1,2) and bet_status=1 GROUP BY event_id");
			$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

			$event_1_id = $event_id;

			$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back' and market_id IN (1,2)");

			$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'  and market_id IN (1,2)");
		

		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = $win_team_1;
	}
	$net_exposure_array_final += min($net_exposure_array);
	$net_exposure_array = array();
	foreach ($market_idss2 as $market_ids1) {
		$market_id1 = $market_ids1;

		
			$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name'  and market_id IN (3,4) and bet_status=1 GROUP BY event_id");
			$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

			$event_1_id = $event_id;

			$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back' and market_id IN (3,4)");

			$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'  and market_id IN (3,4)");
		

		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = $win_team_1;
	}
	$net_exposure_array_final += min($net_exposure_array);
	$net_exposure_array = array();
	foreach ($market_idss3 as $market_ids1) {
		$market_id1 = $market_ids1;

		
			$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name'  and market_id IN (5,6) and bet_status=1 GROUP BY event_id");
			$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

			$event_1_id = $event_id;

			$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back' and market_id IN (5,6)");

			$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'  and market_id IN (5,6)");
		

		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = $win_team_1;
	}
	$net_exposure_array_final += min($net_exposure_array);
	$net_exposure_array = array();
	foreach ($market_idss4 as $market_ids1) {
		$market_id1 = $market_ids1;

		
			$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name'  and market_id IN (7,8,9,10) and bet_status=1 GROUP BY event_id");
			$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

			$event_1_id = $event_id;

			$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back' and market_id IN (7,8,9,10)");

			$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'  and market_id IN (7,8,9,10)");
		

		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = $win_team_1;
	}
	$net_exposure_array_final += min($net_exposure_array);
	$net_exposure_array = array();
	foreach ($market_ids_joker as $market_ids1) {
		$market_id1 = $market_ids1;

		
			$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name'  and market_id IN (14,140) and bet_status=1 GROUP BY event_id");
			$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

			$event_1_id = $event_id;

			$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back' and market_id IN (14,140)");

			$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'  and market_id IN (14,140)");
		

		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = $win_team_1;
	}
	$net_exposure_array_final += min($net_exposure_array);
	return $net_exposure_array_final;
}
function get_net_exposure_casino_oods_on_page_poison($conn, $user_id, $bet_event_id, $market_type, $bet_market_name)
{


	$event_id = $bet_event_id;
	if ($bet_market_name == "") {

		$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type'");
	} else {

		$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type' and back_name='$bet_market_name'");
	}

	$market_ids = array();
	$market_ids2 = array();
	$market_ids3 = array();
	$market_ids4 = array();
	$market_ids4_joker = array();
	while ($market_ids_array = mysqli_fetch_assoc($market_id)) {
		
			if($market_ids_array['market_id'] == "1" || $market_ids_array['market_id'] == "2"){
				$market_ids[] = $market_ids_array['market_id'];
			}
			else if($market_ids_array['market_id'] == "3" || $market_ids_array['market_id'] == "4"){
				$market_ids2[] = $market_ids_array['market_id'];
			}
			else if($market_ids_array['market_id'] == "5" || $market_ids_array['market_id'] == "6"){
				$market_ids3[] = $market_ids_array['market_id'];
			}
			else if($market_ids_array['market_id'] == "14" || $market_ids_array['market_id'] == "140"){
				$market_ids4_joker[] = $market_ids_array['market_id'];
			}
			else{
				$market_ids4[] = $market_ids_array['market_id'];
			}
	}

	$market_idss = array_unique($market_ids);
	$market_idss2 = array_unique($market_ids2);
	$market_idss3 = array_unique($market_ids3);
	$market_idss4 = array_unique($market_ids4);
	$market_idss_joker = array_unique($market_ids4_joker);

	$net_exposure_array = array();
	foreach ($market_idss as $market_ids1) {
		$market_id1 = $market_ids1;

		
			$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name'  and market_id IN (1,2) and bet_status=1 GROUP BY event_id");
			$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

			$event_1_id = $event_id;

			$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back' and market_id IN (1,2)");

			$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'  and market_id IN (1,2)");
		

		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = array(
			"market_id" => $market_id1,
			"win_loss" => $win_team_1,
		);
	}
	foreach ($market_idss2 as $market_ids1) {
		$market_id1 = $market_ids1;

		
			$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name'  and market_id IN (3,4) and bet_status=1 GROUP BY event_id");
			$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

			$event_1_id = $event_id;

			$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back' and market_id IN (3,4)");

			$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'  and market_id IN (3,4)");
		

		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = array(
			"market_id" => $market_id1,
			"win_loss" => $win_team_1,
		);
	}
	foreach ($market_idss3 as $market_ids1) {
		$market_id1 = $market_ids1;

		
			$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name'  and market_id IN (5,6) and bet_status=1 GROUP BY event_id");
			$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

			$event_1_id = $event_id;

			$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back' and market_id IN (5,6)");

			$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'  and market_id IN (5,6)");
		

		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = array(
			"market_id" => $market_id1,
			"win_loss" => $win_team_1,
		);
	}
	foreach ($market_idss4 as $market_ids1) {
		$market_id1 = $market_ids1;

		
			$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name'  and market_id IN (7,8,9,10) and bet_status=1 GROUP BY event_id");
			$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

			$event_1_id = $event_id;

			$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back' and market_id IN (7,8,9,10)");

			$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'  and market_id IN (7,8,9,10)");
		

		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = array(
			"market_id" => $market_id1,
			"win_loss" => $win_team_1,
		);
	}

	foreach ($market_idss_joker as $market_ids1) {
		$market_id1 = $market_ids1;

		
			$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name'  and market_id IN (14,140) and bet_status=1 GROUP BY event_id");
			$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

			$event_1_id = $event_id;

			$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back' and market_id IN (14,140)");

			$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay'  and market_id IN (14,140)");
		

		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = array(
			"market_id" => $market_id1,
			"win_loss" => $win_team_1,
		);
	}


	return $net_exposure_array;
}

function get_net_exposure_casino_oods_on_page_other($conn, $user_id, $bet_event_id, $market_type, $bet_market_name)
{


	$event_id = $bet_event_id;
	if ($bet_market_name == "") {

		$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type'");
	} else {

		$market_id = $conn->query("select * from event_casino_market_id where market_type='$market_type' and back_name='$bet_market_name'");
	}

	$market_ids = array();
	$market_ids2 = array();
	while ($market_ids_array = mysqli_fetch_assoc($market_id)) {
		if ($market_type == "GOAL") {
			if($market_ids_array['market_id'] <= 10){
				$market_ids[] = $market_ids_array['market_id'];
			}
			
			if($market_ids_array['market_id'] > 10){
				$market_ids2[] = $market_ids_array['market_id'];
			}
		}
		if ($market_type == "LUCKY15") {
			$market_ids[] = $market_ids_array['market_id'];
		}
		if ($market_type == "AMAR_AKBAR_ANTHONY" || $market_type == "AMAR_AKBAR_ANTHONY2") {
			if($market_ids_array['market_id'] <= 3){
				$market_ids[] = $market_ids_array['market_id'];
			}
		}
	}
	$wheree="";
	$wheree2="";
	if ($market_type == "GOAL") {
		$wheree=" and market_id <= 10";
		$wheree2=" and market_id > 10";
	}
	$market_idss = array_unique($market_ids);

	$net_exposure_array = array();
	foreach ($market_idss as $market_ids1) {
		$market_id1 = $market_ids1;

		

			$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name' and bet_status=1 $wheree GROUP BY event_id");
			$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

			$event_1_id = $event_id;

			$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back' $wheree");

			$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay' $wheree");
		

		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = array(
			"market_id" => $market_id1,
			"win_loss" => $win_team_1,
		);
	}
	if(count($market_ids2) > 0){
	$market_idss2 = array_unique($market_ids2);
	foreach ($market_idss2 as $market_ids1) {
		$market_id1 = $market_ids1;

		

			$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_teen_details where user_id=$user_id and event_id=$event_id and market_type='$bet_market_name' and bet_status=1 $wheree2 GROUP BY event_id");
			$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
			$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

			$event_1_id = $event_id;

			$get_1_win_back_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_id1 and market_type='$bet_market_name' and bet_type='Back' $wheree2");

			$get_1_opp_lay_data = $conn->query("select * from  bet_teen_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_id1 and market_type='$bet_market_name' and bet_type='Lay' $wheree2");
		

		$total_1_win_back = 0;
		while ($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)) {
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		$total_1_win_lay = 0;
		while ($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)) {
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
		$win_team_1 = $winning_amount_team_1;

		$net_exposure_array[] = array(
			"market_id" => $market_id1,
			"win_loss" => $win_team_1,
		);
	}

	}

	return $net_exposure_array;
}

function get_current_bet_fancy_exposure_oddseven($conn, $user_id, $event_id, $market_id, $current_bet = array())
{
	
$fetch_query = $conn->query("
SELECT
    SUM(CASE WHEN market_name LIKE '%(EVEN)%' THEN bet_win_amount ELSE 0 END) AS even_win,
    SUM(CASE WHEN market_name LIKE '%(EVEN)%' THEN bet_margin_used ELSE 0 END) AS even_stake,
    SUM(CASE WHEN market_name LIKE '%(ODD)%' THEN bet_win_amount ELSE 0 END) AS odd_win,
    SUM(CASE WHEN market_name LIKE '%(ODD)%' THEN bet_margin_used ELSE 0 END) AS odd_stake
FROM bet_details
WHERE market_id = '$market_id'
  AND event_id = '$event_id'
  AND bet_status = 1
  AND user_id = '$user_id'
");

$row = mysqli_fetch_assoc($fetch_query);

$even_win   = isset($row['even_win']) ? floatval($row['even_win']) : 0;
$even_stake = isset($row['even_stake']) ? floatval($row['even_stake']) : 0;
$odd_win    = isset($row['odd_win']) ? floatval($row['odd_win']) : 0;
$odd_stake  = isset($row['odd_stake']) ? floatval($row['odd_stake']) : 0;

$fancy_all_exposure_data=array();
if (count($current_bet) > 0) {
	$stack = floatval($current_bet['stack']);
    $odds  = floatval($current_bet['bet_odds']);
    $bet_win_amount = $stack * ($odds - 1);
    $margin_used = $stack;

    $bet_label = (strtolower($current_bet['bet_type']) == 'yes') ? 'ODD' : 'EVEN';

    if ($bet_label == 'EVEN') {
        $even_win   += $bet_win_amount;
        $even_stake += $margin_used;
    } else {
		$odd_win    += $bet_win_amount;
        $odd_stake  += $margin_used;
    }
}
$exposure = min(
    $even_win - $odd_stake,
    $odd_win - $even_stake 
);

$max_winning = max(
    $even_win - $odd_stake,
    $odd_win - $even_stake
);
	$fancy_all_exposure_data[]=$exposure;
	
	$fancy_all_exposure_data[]=$max_winning;
	return $fancy_all_exposure_data;
}

function get_current_bet_fancy_exposure2($conn, $user_id, $event_id, $market_id, $current_bet = array())
{
	$get_all_fancy_stake = $conn->query("select * from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS'");
	$stack_rate_array = array();
	$fancy_stack_rate_array = array();
	$fancy_all_exposure_data = array();
	while ($fetch_get_all_fancy_stake = mysqli_fetch_assoc($get_all_fancy_stake)) {
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
	if ($stack_rate_unique_array != null) {
		$min_run = $stack_rate_unique_array[0];
		$max_run = max($stack_rate_unique_array);
		$i = 0;
		$win_amount_yes = 0;
		$win_amount_no = 0;
		$loss_amount_yes = 0;
		$loss_amount_no = 0;

		$first_label = $min_run - 1;
		$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs < $first_label and bet_type='Yes'");

		$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
		$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

		if ($current_bet_type == 'Yes') {
			if ($current_bet_odds < $first_label) {
				$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
			}
		}

		$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");

		$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
		$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

		if ($current_bet_type == 'No') {
			if ($current_bet_odds > $first_label) {
				$win_amount_no = $win_amount_no + $current_bet_win_amount;
			}
		}

		$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");

		$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
		$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

		if ($current_bet_type == 'Yes') {
			if ($current_bet_odds > $first_label) {
				$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
			}
		}

		$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs < $first_label and bet_type='No'");

		$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
		$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

		if ($current_bet_type == 'No') {
			if ($current_bet_odds < $first_label) {
				$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
			}
		}

		/* if($min_run == $current_bet_odds){
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
			} */


		$total_win = $win_amount_yes + $win_amount_no;
		$total_loss = $loss_amount_yes + $loss_amount_no;

		$exposure = $total_win - $total_loss;

		array_push($fancy_all_exposure_data, $exposure);

		$win_amount_yes = 0;
		$win_amount_no = 0;
		$loss_amount_yes = 0;
		$loss_amount_no = 0;

		foreach ($stack_rate_unique_array as $runs) {
			if ($runs != $max_run) {
				$next_value  = $stack_rate_unique_array[$i + 1];
				$new_value = $next_value - 1;
				if ($runs == $new_value) {
					$new_run_title = "$runs";
				} else {
					$new_run_title = "$runs - $new_value";
				}

				$first_label = $new_value;

				$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='Yes'");

				$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
				$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

				if ($current_bet_type == 'Yes') {
					if ($current_bet_odds <= $first_label) {
						$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
					}
				}

				$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");

				$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
				$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];
				if ($current_bet_type == 'No') {
					if ($current_bet_odds > $first_label) {
						$win_amount_no = $win_amount_no + $current_bet_win_amount;
					}
				}

				$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");

				$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
				$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

				if ($current_bet_type == 'Yes') {
					if ($current_bet_odds > $first_label) {
						$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
					}
				}

				$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='No'");

				$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
				$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

				if ($current_bet_type == 'No') {
					if ($current_bet_odds <= $first_label) {
						$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
					}
				}

				/* if($runs == $current_bet_odds){
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
					} */

				$total_win = $win_amount_yes + $win_amount_no;
				$total_loss = $loss_amount_yes + $loss_amount_no;
				$exposure = $total_win - $total_loss;
				array_push($fancy_all_exposure_data, $exposure);
				$i++;
			}
		}

		$win_amount_yes = 0;
		$win_amount_no = 0;
		$loss_amount_yes = 0;
		$loss_amount_no = 0;
		$first_label = $max_run;
		$search = $first_label - 1;
		$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='Yes'");

		$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
		$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
		if ($current_bet_type == 'Yes') {
			if ($current_bet_odds <= $first_label) {
				$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
			}
		}


		$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");
		$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
		$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

		if ($current_bet_type == 'No') {
			if ($current_bet_odds > $first_label) {
				$win_amount_no = $win_amount_no + $current_bet_win_amount;
			}
		}

		$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");
		$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
		$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

		if ($current_bet_type == 'Yes') {
			if ($current_bet_odds > $first_label) {
				$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
			}
		}

		$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='No'");
		$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
		$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

		if ($current_bet_type == 'No') {
			if ($current_bet_odds <= $first_label) {
				$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
			}
		}

		/* if($max_run == $current_bet_odds){
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
			} */

		$total_win = $win_amount_yes + $win_amount_no;
		$total_loss = $loss_amount_yes + $loss_amount_no;
		$exposure = $total_win - $total_loss;
		array_push($fancy_all_exposure_data, $exposure);
	}



	return $fancy_all_exposure_data;
}

function get_current_bet_fancy_casino_exposure_patti($conn, $user_id, $event_id, $market_id, $bet_market_type2, $current_bet = array())
{
	$get_all_fancy_stake = $conn->query("SELECT 
  user_id,
  event_id,
  ABS(
    LEAST(
      -- If Player A wins (market_id = 1)
      SUM(
        CASE 
          WHEN market_id = 1 AND bet_type = 'Back' THEN bet_win_amount
          WHEN market_id != 1 AND bet_type = 'Back' THEN -bet_stack
          WHEN market_id = 1 AND bet_type = 'Lay' THEN -((bet_odds - 1) * bet_stack)
          WHEN market_id != 1 AND bet_type = 'Lay' THEN bet_stack
          ELSE 0
        END
      ),
      -- If Player B wins (market_id = 2)
      SUM(
        CASE 
          WHEN market_id = 2 AND bet_type = 'Back' THEN bet_win_amount
          WHEN market_id != 2 AND bet_type = 'Back' THEN -bet_stack
          WHEN market_id = 2 AND bet_type = 'Lay' THEN -((bet_odds - 1) * bet_stack)
          WHEN market_id != 2 AND bet_type = 'Lay' THEN bet_stack
          ELSE 0
        END
      )
    )
  ) AS exposure
FROM 
  bet_teen_details
WHERE 
  user_id = $user_id
  AND event_id = '$event_id'
  AND market_id IN (1, 2)
GROUP BY 
  user_id, event_id");
	$stack_rate_array = array();
	$fancy_stack_rate_array = array();
	$fancy_all_exposure_data = array();
	while ($fetch_get_all_fancy_stake = mysqli_fetch_assoc($get_all_fancy_stake)) {
		$fancy_all_exposure_data[] = -$fetch_get_all_fancy_stake['exposure'];
	}

	

	return $fancy_all_exposure_data;
}

function get_current_bet_fancy_casino_exposure2($conn, $user_id, $event_id, $market_id, $bet_market_type2, $current_bet = array())
{
	$get_all_fancy_stake = $conn->query("select * from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and event_type='$bet_market_type2'");
	$stack_rate_array = array();
	$fancy_stack_rate_array = array();
	$fancy_all_exposure_data = array();
	while ($fetch_get_all_fancy_stake = mysqli_fetch_assoc($get_all_fancy_stake)) {
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
	if ($stack_rate_unique_array != null) {
		$min_run = $stack_rate_unique_array[0];
		$max_run = max($stack_rate_unique_array);
		$i = 0;
		$win_amount_yes = 0;
		$win_amount_no = 0;
		$loss_amount_yes = 0;
		$loss_amount_no = 0;

		$first_label = $min_run - 1;
		$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and event_type='$bet_market_type2' and bet_runs < $first_label and bet_type IN ('Yes','Back')");

		$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
		$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

		if ($current_bet_type == 'Yes' || $current_bet_type == 'Back') {
			if ($current_bet_odds < $first_label) {
				$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
			}
		}

		$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and event_type='$bet_market_type2' and bet_runs > $first_label and bet_type IN ('No','Lay')");

		$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
		$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

		if ($current_bet_type == 'No' || $current_bet_type == 'Lay') {
			if ($current_bet_odds > $first_label) {
				$win_amount_no = $win_amount_no + $current_bet_win_amount;
			}
		}

		$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and event_type='$bet_market_type2' and bet_runs > $first_label and bet_type IN ('Yes','Back')");

		$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
		$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

		if ($current_bet_type == 'Yes' || $current_bet_type == 'Back') {
			if ($current_bet_odds > $first_label) {
				$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
			}
		}

		$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and event_type='$bet_market_type2' and bet_runs < $first_label and bet_type IN ('No','Lay')");

		$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
		$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

		if ($current_bet_type == 'No' || $current_bet_type == 'Lay') {
			if ($current_bet_odds < $first_label) {
				$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
			}
		}

		/* if($min_run == $current_bet_odds){
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
			} */


		$total_win = $win_amount_yes + $win_amount_no;
		$total_loss = $loss_amount_yes + $loss_amount_no;

		$exposure = $total_win - $total_loss;

		array_push($fancy_all_exposure_data, $exposure);

		$win_amount_yes = 0;
		$win_amount_no = 0;
		$loss_amount_yes = 0;
		$loss_amount_no = 0;

		foreach ($stack_rate_unique_array as $runs) {
			if ($runs != $max_run) {
				$next_value  = $stack_rate_unique_array[$i + 1];
				$new_value = $next_value - 1;
				if ($runs == $new_value) {
					$new_run_title = "$runs";
				} else {
					$new_run_title = "$runs - $new_value";
				}

				$first_label = $new_value;

				$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and event_type='$bet_market_type2' and bet_runs <= $first_label and bet_type IN ('Yes','Back')");

				$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
				$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

				if ($current_bet_type == 'Yes' || $current_bet_type == 'Back') {
					if ($current_bet_odds <= $first_label) {
						$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
					}
				}

				$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and event_type='$bet_market_type2' and bet_runs > $first_label and bet_type IN ('No','Lay')");

				$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
				$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];
				if ($current_bet_type == 'No' || $current_bet_type == 'Lay') {
					if ($current_bet_odds > $first_label) {
						$win_amount_no = $win_amount_no + $current_bet_win_amount;
					}
				}

				$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and event_type='$bet_market_type2' and bet_runs > $first_label and bet_type IN ('Yes','Back')");

				$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
				$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

				if ($current_bet_type == 'Yes' || $current_bet_type == 'Back') {
					if ($current_bet_odds > $first_label) {
						$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
					}
				}

				$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and event_type='$bet_market_type2' and bet_runs <= $first_label and bet_type IN ('No','Lay')");

				$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
				$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

				if ($current_bet_type == 'No' || $current_bet_type == 'Lay') {
					if ($current_bet_odds <= $first_label) {
						$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
					}
				}

				/* if($runs == $current_bet_odds){
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
					} */

				$total_win = $win_amount_yes + $win_amount_no;
				$total_loss = $loss_amount_yes + $loss_amount_no;
				$exposure = $total_win - $total_loss;
				array_push($fancy_all_exposure_data, $exposure);
				$i++;
			}
		}

		$win_amount_yes = 0;
		$win_amount_no = 0;
		$loss_amount_yes = 0;
		$loss_amount_no = 0;
		$first_label = $max_run;
		$search = $first_label - 1;
		$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and event_type='$bet_market_type2' and bet_runs <= $first_label and bet_type IN ('Yes','Back')");

		$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
		$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
		if ($current_bet_type == 'Yes' || $current_bet_type == 'Back') {
			if ($current_bet_odds <= $first_label) {
				$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
			}
		}


		$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and event_type='$bet_market_type2' and bet_runs > $first_label and bet_type IN ('No','Lay')");
		$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
		$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

		if ($current_bet_type == 'No' || $current_bet_type == 'Lay') {
			if ($current_bet_odds > $first_label) {
				$win_amount_no = $win_amount_no + $current_bet_win_amount;
			}
		}

		$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and event_type='$bet_market_type2' and bet_runs > $first_label and bet_type IN ('Yes','Back')");
		$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
		$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

		if ($current_bet_type == 'Yes' || $current_bet_type == 'Back') {
			if ($current_bet_odds > $first_label) {
				$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
			}
		}

		$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and event_type='$bet_market_type2' and bet_runs <= $first_label and bet_type IN ('No','Lay')");
		$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
		$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

		if ($current_bet_type == 'No' || $current_bet_type == 'Lay') {
			if ($current_bet_odds <= $first_label) {
				$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
			}
		}

		/* if($max_run == $current_bet_odds){
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
			} */

		$total_win = $win_amount_yes + $win_amount_no;
		$total_loss = $loss_amount_yes + $loss_amount_no;
		$exposure = $total_win - $total_loss;
		array_push($fancy_all_exposure_data, $exposure);
	}



	return $fancy_all_exposure_data;
}


function get_current_bet_fancy_exposure3($conn, $user_id, $event_id, $market_id, $current_bet = array())
{
	$get_all_fancy_stake = $conn->query("select * from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS'");
	$stack_rate_array = array();
	$fancy_stack_rate_array = array();
	$fancy_all_exposure_data = array();
	while ($fetch_get_all_fancy_stake = mysqli_fetch_assoc($get_all_fancy_stake)) {
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
	if ($stack_rate_unique_array != null) {
		$min_run = $stack_rate_unique_array[0];
		$max_run = max($stack_rate_unique_array);
		$i = 0;
		$win_amount_yes = 0;
		$win_amount_no = 0;
		$loss_amount_yes = 0;
		$loss_amount_no = 0;

		$first_label = $min_run - 1;
		$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs < $first_label and bet_type='Yes'");

		$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
		$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

		if ($current_bet_type == 'Yes') {
			if ($current_bet_odds < $first_label) {
				$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
			}
		}

		$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");

		$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
		$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

		if ($current_bet_type == 'No') {
			if ($current_bet_odds > $first_label) {
				$win_amount_no = $win_amount_no + $current_bet_win_amount;
			}
		}

		$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");

		$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
		$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

		if ($current_bet_type == 'Yes') {
			if ($current_bet_odds > $first_label) {
				$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
			}
		}

		$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs < $first_label and bet_type='No'");

		$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
		$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

		if ($current_bet_type == 'No') {
			if ($current_bet_odds < $first_label) {
				$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
			}
		}

		/* if($min_run == $current_bet_odds){
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
			} */


		$total_win = $win_amount_yes + $win_amount_no;
		$total_loss = $loss_amount_yes + $loss_amount_no;

		$exposure = $total_win - $total_loss;

		array_push($fancy_all_exposure_data, $exposure);

		$win_amount_yes = 0;
		$win_amount_no = 0;
		$loss_amount_yes = 0;
		$loss_amount_no = 0;

		foreach ($stack_rate_unique_array as $runs) {
			if ($runs != $max_run) {
				$next_value  = $stack_rate_unique_array[$i + 1];
				$new_value = $next_value - 1;
				if ($runs == $new_value) {
					$new_run_title = "$runs";
				} else {
					$new_run_title = "$runs - $new_value";
				}

				$first_label = $new_value;

				$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='Yes'");

				$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
				$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

				if ($current_bet_type == 'Yes') {
					if ($current_bet_odds <= $first_label) {
						$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
					}
				}

				$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");

				$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
				$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];
				if ($current_bet_type == 'No') {
					if ($current_bet_odds > $first_label) {
						$win_amount_no = $win_amount_no + $current_bet_win_amount;
					}
				}

				$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");

				$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
				$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

				if ($current_bet_type == 'Yes') {
					if ($current_bet_odds > $first_label) {
						$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
					}
				}

				$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='No'");

				$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
				$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

				if ($current_bet_type == 'No') {
					if ($current_bet_odds <= $first_label) {
						$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
					}
				}

				/* if($runs == $current_bet_odds){
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
					} */

				$total_win = $win_amount_yes + $win_amount_no;
				$total_loss = $loss_amount_yes + $loss_amount_no;
				$exposure = $total_win - $total_loss;
				array_push($fancy_all_exposure_data, $exposure);
				$i++;
			}
		}

		$win_amount_yes = 0;
		$win_amount_no = 0;
		$loss_amount_yes = 0;
		$loss_amount_no = 0;
		$first_label = $max_run;
		$search = $first_label - 1;
		$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='Yes'");

		$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
		$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
		if ($current_bet_type == 'Yes') {
			if ($current_bet_odds <= $first_label) {
				$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
			}
		}


		$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");
		$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
		$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

		if ($current_bet_type == 'No') {
			if ($current_bet_odds > $first_label) {
				$win_amount_no = $win_amount_no + $current_bet_win_amount;
			}
		}

		$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");
		$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
		$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

		if ($current_bet_type == 'Yes') {
			if ($current_bet_odds > $first_label) {
				$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
			}
		}

		$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='No'");
		$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
		$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

		if ($current_bet_type == 'No') {
			if ($current_bet_odds <= $first_label) {
				$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
			}
		}

		/* if($max_run == $current_bet_odds){
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
			} */

		$total_win = $win_amount_yes + $win_amount_no;
		$total_loss = $loss_amount_yes + $loss_amount_no;
		$exposure = $total_win - $total_loss;
		array_push($fancy_all_exposure_data, $exposure);
	}

	if ($user_id == 284) {
		echo "<pre>";
		print_r($fancy_all_exposure_data);
		echo "</pre>";
	}

	return $fancy_all_exposure_data;
}

/* mamu code */

function get_current_bet_fancy_exposure_superopver($conn, $user_id, $event_id, $market_id, $current_bet = array())
{

	$current_bet_event_id = $current_bet['bet_event_id'];
	$current_bet_market_id = $current_bet['bet_market_id'];
	$current_bet_type = $current_bet['bet_type'];
	$current_bet_win_amount = $current_bet['bet_win_amount'];
	$current_bet_margin_used = $current_bet['bet_margin_used'];
	$current_bet_odds = $current_bet['runs'];
	$current_bet_market_type = $current_bet['bet_market_type'];
	$get_all_fancy_stake = $conn->query("select * from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type LIKE '$current_bet_market_type'");

	$stack_rate_array = array();
	$fancy_stack_rate_array = array();
	$fancy_all_exposure_data = array();
	while ($fetch_get_all_fancy_stake = mysqli_fetch_assoc($get_all_fancy_stake)) {
		$stack_rate_array[] = $fetch_get_all_fancy_stake['bet_runs'];
	}
	$stack_rate_array[] = $current_bet_odds;
	$stack_rate_unique_array =  array_unique($stack_rate_array);
	$stack_rate_unique_array =  array_filter($stack_rate_unique_array);

	sort($stack_rate_unique_array);
	/* if ($user_id == 12352) {
		array_push($fancy_all_exposure_data, "0 select * from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type LIKE '$current_bet_market_type'");
		array_push($fancy_all_exposure_data, $stack_rate_unique_array);
	} */
	$last_run_value = 0;
	if ($stack_rate_unique_array != null) {
		$min_run = $stack_rate_unique_array[0];
		/* if ($user_id == 32322) {
			array_push($fancy_all_exposure_data, "min_run=" . $min_run);
			array_push($fancy_all_exposure_data, $stack_rate_unique_array);
		} */
		$max_run = max($stack_rate_unique_array);
		$i = 0;
		$win_amount_yes = 0;
		$win_amount_no = 0;
		$loss_amount_yes = 0;
		$loss_amount_no = 0;

		$first_label = $min_run - 1;

		$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type LIKE '$current_bet_market_type' and bet_runs < $first_label and (bet_type='Yes' OR bet_type='Back')");
		/* if ($user_id == 32322) {
			array_push($fancy_all_exposure_data, "1 select SUM(bet_win_amount) as total_win_yes from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type LIKE '$current_bet_market_type' and bet_runs < $first_label and (bet_type='Yes' OR bet_type='Back')");
		} */
		$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
		$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

		if ($current_bet_type == 'Yes' || $current_bet_type == 'Back') {
			if ($current_bet_odds < $first_label) {
				$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
			}
		}

		$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type LIKE '$current_bet_market_type' and bet_runs > $first_label and (bet_type='No' OR bet_type='Lay')");
		/* if ($user_id == 32322) {
			array_push($fancy_all_exposure_data, "2 select SUM(bet_win_amount) as win_amount_no from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type LIKE '$current_bet_market_type' and bet_runs > $first_label and (bet_type='No' OR bet_type='Lay')");
		} */
		$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
		$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

		if ($current_bet_type == 'No' || $current_bet_type == 'Lay') {
			if ($current_bet_odds > $first_label) {
				$win_amount_no = $win_amount_no + $current_bet_win_amount;
			}
		}

		$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type LIKE '$current_bet_market_type' and bet_runs > $first_label and (bet_type='Yes' OR bet_type='Back')");
		/* if ($user_id == 32322) {
			array_push($fancy_all_exposure_data, "3 select SUM(bet_margin_used) as total_loss_yes from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type LIKE '$current_bet_market_type' and bet_runs > $first_label and (bet_type='Yes' OR bet_type='Back')");
		} */
		$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
		$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

		if ($current_bet_type == 'Yes' || $current_bet_type == 'Back') {
			if ($current_bet_odds > $first_label) {
				$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
			}
		}

		$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type LIKE '$current_bet_market_type' and bet_runs < $first_label and (bet_type='No' OR bet_type='Lay')");
		/* if ($user_id == 32322) {
			array_push($fancy_all_exposure_data, "4 select SUM(bet_margin_used) as total_loss_no from bet_teen_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_id=$market_id  and market_type LIKE '$current_bet_market_type' and bet_runs < $first_label and (bet_type='No' OR bet_type='Lay')");
		} */
		$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
		$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

		if ($current_bet_type == 'No' || $current_bet_type == 'Lay') {
			if ($current_bet_odds < $first_label) {
				$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
			}
		}

		$total_win = $win_amount_yes + $win_amount_no;
		$total_loss = $loss_amount_yes + $loss_amount_no;

		$exposure = $total_win - $total_loss;

		array_push($fancy_all_exposure_data, $exposure);
		/* if ($user_id == 32322) {
			array_push($fancy_all_exposure_data, "win_amount_yes=" . $win_amount_yes);
			array_push($fancy_all_exposure_data, "win_amount_no=" . $win_amount_no);
			array_push($fancy_all_exposure_data, "loss_amount_yes=" . $loss_amount_yes);
			array_push($fancy_all_exposure_data, "loss_amount_no=" . $loss_amount_no);
		} */
	}
	return $fancy_all_exposure_data;
}

function add_net_exposure_superopver($conn, $user_id, $current_bet)
{
	$bet_event_id = $current_bet['bet_event_id'];
	$bet_market_id = $current_bet['bet_market_id'];
	$bet_margin_used = $current_bet['bet_margin_used'];
	$bet_win_amount = $current_bet['bet_win_amount'];
	$bet_odds = $current_bet['bet_odds'];
	$bet_type = $current_bet['bet_market_type'];
	$bet_type_exposure = $current_bet['bet_type'];
	$stack = $current_bet['stack'];
	$runs = $current_bet['runs'];
	$exposure_datetime = date("Y-m-d H:i:s");
	$bet_type_check = false;
	$return_array = array();
	if ($bet_type == "FANCY_ODDS" or $bet_type == "FANCY1_ODDS") {

		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'");

		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);

		if ($check_num_rows <= 0) {
			//insert
			$conn->query("insert into exposure_details (user_id,event_id,market_id,market_type,exposure_amount,exposure_datetime) values('$user_id','$bet_event_id','$bet_market_id','$bet_type','-$bet_margin_used','$exposure_datetime')");
			/* if ($user_id == 32322) {
				$return_array[] = "insert into exposure_details (user_id,event_id,market_id,market_type,exposure_amount,exposure_datetime) values('$user_id','$bet_event_id','$bet_market_id','$bet_type','-$bet_margin_used','$exposure_datetime')";
			} */
		} else {
			//change net exposure
			/* if ($user_id == 32322) { */
			$new_bet_tyyyyp = $current_bet['bet_market_type'];
			if($bet_type == "FANCY_ODDS"){
				$new_bet_tyyyyp = $current_bet['bet_market_type2'];
			}
			$exposure_data = get_current_bet_fancy_exposure_superopver($conn, $user_id, $bet_event_id, $bet_market_id,  array('bet_market_type' => $new_bet_tyyyyp));
			/* 	} else {
				$exposure_data = get_current_bet_fancy_exposure_superopver($conn, $user_id, $bet_event_id, $bet_market_id, array('bet_market_type' => $bet_type));
			}
			if ($user_id == 32322) {
				$return_array[] = $exposure_data;
			} */
			$exposure_data = min($exposure_data);
			$update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'");
			/* if ($user_id == 32322) {
				$return_array[] = "update exposure_details set exposure_amount='$exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_id='$bet_market_id' and market_type='$bet_type'";
			} */
		}
	} else {

		$bet_market_name = "";
		$where = "";
		if (isset($current_bet['bet_market_name'])) {
			$bet_market_name = $current_bet['bet_market_name'];
			$where = " and casino_back_name='$bet_market_name'";
		}

		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type' $where");
		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);

		if ($check_num_rows <= 0) {
			//insert
			$conn->query("insert into exposure_details (user_id,event_id,market_type,exposure_amount,exposure_datetime,casino_back_name) values('$user_id','$bet_event_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_market_name')");
			/* if ($user_id == 32322) {
				$return_array[] = "else insert into exposure_details (user_id,event_id,market_type,exposure_amount,exposure_datetime,casino_back_name) values('$user_id','$bet_event_id','$bet_type','-$bet_margin_used','$exposure_datetime','$bet_market_name')";
			} */
		} else {
			$exposure_data = get_net_exposure_casino_oods($conn, $user_id, $bet_event_id, $bet_type, $bet_type_exposure, $stack, $runs, $bet_market_name);
			$update_exposure_data = $conn->query("update exposure_details set exposure_amount='$exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type' and casino_back_name='$bet_market_name'");
			/* if ($user_id == 32322) {
				$return_array[] = "else update exposure_details set exposure_amount='$exposure_data',exposure_datetime='$exposure_datetime' where user_id=$user_id and event_id='$bet_event_id' and market_type='$bet_type' and casino_back_name='$bet_market_name'";
			} */
		}
	}
	/* 	if ($user_id == 32322) {
		return $return_array;
	} */
}
	
	/* end mamu code */


/* start cancel exposure revert */

function get_current_bet_fancy_exposure2_cancel($conn, $user_id, $event_id, $market_id, $current_bet = array())
{
	$get_all_fancy_stake = $conn->query("select * from bet_details where user_id=$user_id and bet_status =2 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS'");
	$stack_rate_array = array();
	$fancy_stack_rate_array = array();
	$fancy_all_exposure_data = array();
	while ($fetch_get_all_fancy_stake = mysqli_fetch_assoc($get_all_fancy_stake)) {
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
	if ($stack_rate_unique_array != null) {
		$min_run = $stack_rate_unique_array[0];
		$max_run = max($stack_rate_unique_array);
		$i = 0;
		$win_amount_yes = 0;
		$win_amount_no = 0;
		$loss_amount_yes = 0;
		$loss_amount_no = 0;

		$first_label = $min_run - 1;
		$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =2 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs < $first_label and bet_type='Yes'");

		$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
		$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

		if ($current_bet_type == 'Yes') {
			if ($current_bet_odds < $first_label) {
				$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
			}
		}

		$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =2 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");

		$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
		$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

		if ($current_bet_type == 'No') {
			if ($current_bet_odds > $first_label) {
				$win_amount_no = $win_amount_no + $current_bet_win_amount;
			}
		}

		$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =2 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");

		$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
		$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

		if ($current_bet_type == 'Yes') {
			if ($current_bet_odds > $first_label) {
				$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
			}
		}

		$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =2 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs < $first_label and bet_type='No'");

		$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
		$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

		if ($current_bet_type == 'No') {
			if ($current_bet_odds < $first_label) {
				$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
			}
		}

		/* if($min_run == $current_bet_odds){
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
			} */


		$total_win = $win_amount_yes + $win_amount_no;
		$total_loss = $loss_amount_yes + $loss_amount_no;

		$exposure = $total_win - $total_loss;

		array_push($fancy_all_exposure_data, $exposure);

		$win_amount_yes = 0;
		$win_amount_no = 0;
		$loss_amount_yes = 0;
		$loss_amount_no = 0;

		foreach ($stack_rate_unique_array as $runs) {
			if ($runs != $max_run) {
				$next_value  = $stack_rate_unique_array[$i + 1];
				$new_value = $next_value - 1;
				if ($runs == $new_value) {
					$new_run_title = "$runs";
				} else {
					$new_run_title = "$runs - $new_value";
				}

				$first_label = $new_value;

				$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =2 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='Yes'");

				$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
				$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];

				if ($current_bet_type == 'Yes') {
					if ($current_bet_odds <= $first_label) {
						$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
					}
				}

				$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =2 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");

				$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
				$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];
				if ($current_bet_type == 'No') {
					if ($current_bet_odds > $first_label) {
						$win_amount_no = $win_amount_no + $current_bet_win_amount;
					}
				}

				$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =2 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");

				$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
				$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

				if ($current_bet_type == 'Yes') {
					if ($current_bet_odds > $first_label) {
						$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
					}
				}

				$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =2 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='No'");

				$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
				$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

				if ($current_bet_type == 'No') {
					if ($current_bet_odds <= $first_label) {
						$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
					}
				}

				/* if($runs == $current_bet_odds){
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
					} */

				$total_win = $win_amount_yes + $win_amount_no;
				$total_loss = $loss_amount_yes + $loss_amount_no;
				$exposure = $total_win - $total_loss;
				array_push($fancy_all_exposure_data, $exposure);
				$i++;
			}
		}

		$win_amount_yes = 0;
		$win_amount_no = 0;
		$loss_amount_yes = 0;
		$loss_amount_no = 0;
		$first_label = $max_run;
		$search = $first_label - 1;
		$get_lower_yes_total = $conn->query("select SUM(bet_win_amount) as total_win_yes from bet_details where user_id=$user_id and bet_status =2 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='Yes'");

		$fetch_get_lower_yes_total = mysqli_fetch_assoc($get_lower_yes_total);
		$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
		if ($current_bet_type == 'Yes') {
			if ($current_bet_odds <= $first_label) {
				$win_amount_yes = $win_amount_yes + $current_bet_win_amount;
			}
		}


		$get_lower_no_total = $conn->query("select SUM(bet_win_amount) as win_amount_no from bet_details where user_id=$user_id and bet_status =2 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='No'");
		$fetch_get_lower_no_total = mysqli_fetch_assoc($get_lower_no_total);
		$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

		if ($current_bet_type == 'No') {
			if ($current_bet_odds > $first_label) {
				$win_amount_no = $win_amount_no + $current_bet_win_amount;
			}
		}

		$get_higher_yes_total = $conn->query("select SUM(bet_margin_used) as total_loss_yes from bet_details where user_id=$user_id and bet_status =2 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs > $first_label and bet_type='Yes'");
		$fetch_get_higher_yes_total = mysqli_fetch_assoc($get_higher_yes_total);
		$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];

		if ($current_bet_type == 'Yes') {
			if ($current_bet_odds > $first_label) {
				$loss_amount_yes = $loss_amount_yes + $current_bet_margin_used;
			}
		}

		$get_higher_no_total = $conn->query("select SUM(bet_margin_used) as total_loss_no from bet_details where user_id=$user_id and bet_status =2 and event_id=$event_id and market_id=$market_id  and market_type='FANCY_ODDS' and bet_runs <= $first_label and bet_type='No'");
		$fetch_get_higher_no_total = mysqli_fetch_assoc($get_higher_no_total);
		$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

		if ($current_bet_type == 'No') {
			if ($current_bet_odds <= $first_label) {
				$loss_amount_no = $loss_amount_no + $current_bet_margin_used;
			}
		}

		/* if($max_run == $current_bet_odds){
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
			} */

		$total_win = $win_amount_yes + $win_amount_no;
		$total_loss = $loss_amount_yes + $loss_amount_no;
		$exposure = $total_win - $total_loss;
		array_push($fancy_all_exposure_data, $exposure);
	}



	return $fancy_all_exposure_data;
}

function get_net_exposure_match_oods_cancel($conn, $user_id, $bet_event_id, $market_type, $bet_type_exposure, $stack, $runs, $current_bet = array(), $is_all_value = 0)
{
	$runs = floatVal($runs);
	$event_id = $bet_event_id;
	$market_id = $conn->query("select * from event_market_id where event_id='$bet_event_id' and market_type='$market_type'");
	$market_ids = array();
	while ($market_ids_array = mysqli_fetch_assoc($market_id)) {
		$market_ids[] = $market_ids_array['market_id'];
	}

	$bet_type_check = false;

	if (strpos($market_type, "OVER_UNDER") !== false || strpos($market_type, "UNDER_OVER") !== false || strpos($market_type, "GAME_WINNER") !== false || strpos($market_type, "2ND_SET_WINNER") !== false || strpos($market_type, "GAME_TO_DEUCE") !== false || strpos($market_type, "BM_2ND_SET") !== false || strpos($market_type, "POINT_WINNER") !== false) {
		$bet_type_check = true;
	}

	if(count($current_bet) > 0 && isset($current_bet['other_fancy']) && $current_bet['other_fancy'] == "other"){
		$bet_type_check = true;
	}
	
	$market_ids = array_unique($market_ids);
	if ($market_type == "MATCH_ODDS" or $market_type == "BOOKMAKER_ODDS" or $market_type == "BOOKMAKERSMALL_ODDS" or $market_type == "BOOKMAKER_TIED_ODDS" or $bet_type_check == true) {
		$market_1_id = $market_ids[0];

		$market_2_id = $market_ids[1];

		$market_3_id = $market_ids[2];
	} else {
		$market_1_id = 1;
		$market_2_id = 3;
	}
 

	$type = $bet_type_exposure;
	if ($market_type == "MATCH_ODDS" or $market_type == "BOOKMAKER_ODDS" or $market_type == "BOOKMAKERSMALL_ODDS" or $market_type == "BOOKMAKER_TIED_ODDS" or $bet_type_check == true) {
		if ($type == "Lay") {
			$exposure_bet_type = "Lay";
			$margin_used = $stack * ($runs - 1);
			$bet_win_amount = $stack;
		} else {
			$exposure_bet_type = "Back";
			$bet_win_amount = $stack * ($runs - 1);
			$margin_used = $stack;
		}



		$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_details where user_id=$user_id and event_id=$event_id and market_type='$market_type' and bet_status=2 GROUP BY event_id");
		$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
		$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];




		$event_1_id = $event_id;

		$get_1_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =2 and event_id=$event_1_id and market_id=$market_1_id and market_type='$market_type' and bet_type='Back'");

		$get_1_opp_lay_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =2 and event_id=$event_1_id and market_id<>$market_1_id and market_type='$market_type' and bet_type='Lay'");

		$get_2_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =2 and event_id=$event_1_id and market_id=$market_2_id and market_type='$market_type' and bet_type='Back'");

		$get_2_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =2 and event_id=$event_1_id and market_id<>$market_2_id and market_type='$market_type' and bet_type='Lay'");




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


		if ($market_3_id != "") {
			$get_3_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =2 and event_id=$event_1_id and market_id=$market_3_id and market_type='$market_type' and bet_type='Back'");

			$get_3_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =2 and event_id=$event_1_id and market_id<>$market_3_id and market_type='$market_type' and bet_type='Lay'");
			$total_3_win_back = 0;
			while ($fetch_get_3_win_back_data = mysqli_fetch_assoc($get_3_win_back_data)) {
				$total_3_win_back = $total_3_win_back + $fetch_get_3_win_back_data['bet_win_amount'] + $fetch_get_3_win_back_data['bet_margin_used'];
			}
			$total_3_win_lay = 0;
			while ($fetch_get_3_opp_lay_data = mysqli_fetch_assoc($get_3_opp_lay_data)) {
				$total_3_win_lay = $total_3_win_lay + $fetch_get_3_opp_lay_data['bet_win_amount'] + $fetch_get_3_opp_lay_data['bet_margin_used'];
			}
		}





		$current_bet_event_id = $current_bet['bet_event_id'];

		if ($current_bet_event_id == $event_1_id) {

			$current_bet_market_id = $current_bet['bet_market_id'];
			$current_bet_type = $current_bet['bet_type'];
			$current_bet_win_amount = $current_bet['bet_win_amount'];
			$current_bet_margin_used = $current_bet['bet_margin_used'];
			$total_bet_amount = $total_bet_amount + $current_bet_margin_used;
			if ($current_bet_type == 'Back') {
				//same market id
				if ($current_bet_market_id == $market_1_id) {
					$total_1_win_back = $total_1_win_back + $current_bet_win_amount + $current_bet_margin_used;
				} else if ($current_bet_market_id == $market_2_id) {
					$total_2_win_back = $total_2_win_back + $current_bet_win_amount + $current_bet_margin_used;
				} else {
					if ($market_3_id != "") {
						$total_3_win_back = $total_3_win_back + $current_bet_win_amount + $current_bet_margin_used;
					}
				}
			} else {
				//other market id
				if ($current_bet_market_id == $market_1_id) {
					$total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					if ($market_3_id != "") {
						$total_3_win_lay = $total_3_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					}
				} else if ($current_bet_market_id == $market_2_id) {
					$total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					if ($market_3_id != "") {
						$total_3_win_lay = $total_3_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					}
				} else {
					$total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					$total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
				}
			}
		}

		$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;

		$winning_amount_team_2 = ($total_2_win_back + $total_2_win_lay) - $total_bet_amount;
		if ($market_3_id != "") {
			$winning_amount_team_3 = ($total_3_win_back + $total_3_win_lay) - $total_bet_amount;
		}

		$win_team_1 = $winning_amount_team_1;

		$win_team_2 = $winning_amount_team_2;
		$net_exposure_array = array();
		if ($market_3_id != "") {
			$win_team_3 = $winning_amount_team_3;
			/* if($win_team_1 > $win_team_2 and $win_team_3 > $win_team_2){
						$net_exposure = $win_team_2;
					}else if($win_team_1 > $win_team_3 and $win_team_2 > $win_team_3){
						$net_exposure = $win_team_3;
					}else{
						$net_exposure = $win_team_1;
					} */
			$net_exposure_array[] = $win_team_1;
			$net_exposure_array[] = $win_team_2;
			$net_exposure_array[] = $win_team_3;
		} else {
			/* if($win_team_1 > $win_team_2){
						$net_exposure = $win_team_2;
					}else{
						$net_exposure = $win_team_1;
					} */
			$net_exposure_array[] = $win_team_1;
			$net_exposure_array[] = $win_team_2;
		}
	}

	if ($is_all_value == 0) {
		$net_exposure_array =  min($net_exposure_array);
	}

	return $net_exposure_array;
}

/* end cancel exposure revert */
