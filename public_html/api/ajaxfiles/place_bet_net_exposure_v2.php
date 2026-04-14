<?php
include('../include/conn.php');
include('../include/flip_function.php');
include('../include/flip_function2.php');
include "../session.php";

	$user_id = $_SESSION['CLIENT_LOGIN_ID'];
	$eventId = $conn->real_escape_string($_REQUEST['eventId']);
	$event_id = $eventId;
	$market_type = $conn->real_escape_string($_REQUEST['bet_market_type']);
	$stack = $conn->real_escape_string($_REQUEST['stack']);
	$marketId = $conn->real_escape_string($_REQUEST['marketId']);
	$type = $conn->real_escape_string($_REQUEST['bet_stake_side']);
	$runs = floatVal($conn->real_escape_string($_REQUEST['runs']));
	$market_ids = null;

	if($_REQUEST['market_ids']){
		$market_ids = $_REQUEST['market_ids'];
	}

	$market_ids = array_unique($market_ids);
	$market_1_id = $market_ids[0];
	$market_2_id = $market_ids[1];
	$market_3_id = $market_ids[2];
	
		
	
	if($market_type != "FANCY_ODDS"){
		if($type == "Lay"){
			$exposure_bet_type = "Lay";
			$margin_used = $stack * ($runs - 1);
			$bet_win_amount = $stack;
		}else{
			$exposure_bet_type = "Back";
			$bet_win_amount = $stack * ($runs - 1);
			$margin_used = $stack;
		}
		$current_bet = array(
				"bet_event_id"=>$eventId,
				"bet_market_id"=>$marketId,
				"bet_margin_used"=>$margin_used,
				"bet_win_amount"=>$bet_win_amount,
				"bet_type"=>$exposure_bet_type,
				);


$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_details where user_id=$user_id and event_id=$event_id and market_type='$market_type' and bet_status=1 GROUP BY event_id");
$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];

$market_idss = array();
		$get_market_id = $conn->query("select market_id from event_market_id where event_id=$event_id and market_type='$market_type'");
		foreach($get_market_id as $market_id_data){
			$market_iddd = $market_id_data['market_id'];
			$market_idss[] = $market_iddd;
		}
		if($market_idss != null){
			$market_1_id = $market_idss[0];
			$market_2_id = $market_idss[1];
			$market_3_id = $market_idss[2];
			
		}
$get_event_market = $conn->query("select market_id,event_id from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_type='$market_type' GROUP BY market_id order by market_id");
			$get_event_data = array();
			while($fetch_get_event_market = mysqli_fetch_assoc($get_event_market)){
				$get_event_data[] = $fetch_get_event_market;
			}
			
			$event_1_id =$event_id; 
			/* $market_1_id =$get_event_data[0]['market_id']; 

			$event_2_id =$get_event_data[1]['event_id']; 
			$market_2_id =$get_event_data[1]['market_id'];  */
			
			$get_1_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type='$market_type' and bet_type='Back'");

				$get_1_opp_lay_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_1_id and market_type='$market_type' and bet_type='Lay'");

				$get_2_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type='$market_type' and bet_type='Back'");
				
				$get_2_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_2_id and market_type='$market_type' and bet_type='Lay'");
				
				
				
				
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
				
				
				if($market_3_id != ""){
					$get_3_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_3_id and market_type='$market_type' and bet_type='Back'");
				
					$get_3_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_3_id and market_type='$market_type' and bet_type='Lay'");
					$total_3_win_back = 0;
					while($fetch_get_3_win_back_data = mysqli_fetch_assoc($get_3_win_back_data)){
						$total_3_win_back = $total_3_win_back + $fetch_get_3_win_back_data['bet_win_amount'] + $fetch_get_3_win_back_data['bet_margin_used'];
					}
					$total_3_win_lay = 0;
					while($fetch_get_3_opp_lay_data = mysqli_fetch_assoc($get_3_opp_lay_data)){
						$total_3_win_lay = $total_3_win_lay + $fetch_get_3_opp_lay_data['bet_win_amount'] + $fetch_get_3_opp_lay_data['bet_margin_used'];
					}
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
					}else if($current_bet_market_id == $market_2_id){
						$total_2_win_back = $total_2_win_back + $current_bet_win_amount + $current_bet_margin_used;
					}else{
						if($market_3_id != ""){
							$total_3_win_back = $total_3_win_back + $current_bet_win_amount + $current_bet_margin_used;
						}
					}
				}else{
					//other market id
					if($current_bet_market_id == $market_1_id){
						$total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
						if($market_3_id != ""){
							$total_3_win_lay = $total_3_win_lay + $current_bet_win_amount + $current_bet_margin_used;
						}
						
					}else if($current_bet_market_id == $market_2_id){
						$total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
						if($market_3_id != ""){
							$total_3_win_lay = $total_3_win_lay + $current_bet_win_amount + $current_bet_margin_used;	
						}
						
					}else{
						$total_2_win_lay = $total_2_win_lay + $current_bet_win_amount + $current_bet_margin_used;
						$total_1_win_lay = $total_1_win_lay + $current_bet_win_amount + $current_bet_margin_used;
					}
				}
				
			}
			
			$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
			
			$winning_amount_team_2 = ($total_2_win_back + $total_2_win_lay) - $total_bet_amount;
			if($market_3_id != ""){
				$winning_amount_team_3 = ($total_3_win_back + $total_3_win_lay) - $total_bet_amount;
			}
			
		$win_team_1 =$winning_amount_team_1;
		$win_team_2 = $winning_amount_team_2;
		if($market_3_id != ""){
			$win_team_3 = $winning_amount_team_3;
			$data[$market_type]= array(
				"market_ids" => array(
					'team_1' => $market_1_id,
					'team_2' => $market_2_id,
					'team_3' => $market_3_id,
				),
				"exposure" => array(
					'team_1' => $win_team_1,
					'team_2' => $win_team_2,
					'team_3' => $win_team_3,
				),
			);
		}else{
			$data[$market_type] = array(
				"market_ids" => array(
					'team_1' => $market_1_id,
					'team_2' => $market_2_id,
				
				),
				"exposure" => array(
					'team_1' => $win_team_1,
					'team_2' => $win_team_2,
				
				),
			);
		}
		
			
	$return_array = array(
			"status" => 'ok',
			"data" => $data,
			);
		echo json_encode($return_array);
		exit();
	}else{
		$fancy_odds = array();
		$market_odds = $conn->real_escape_string($_REQUEST['market_odds']);
		if($type == "Lay" or $type == "No"){
			$bet_win_amount = $stack;
			$margin_used = $market_odds * $stack / 100;
			$exposure_bet_type = "No";
		}else{
			$bet_win_amount = $market_odds * $stack / 100;
			$margin_used = $stack;
			$exposure_bet_type = "Yes";
		}
		$current_bet = array(
					"bet_event_id"=>$event_id,
					"bet_market_id"=>$marketId,
					"bet_margin_used"=>$margin_used,
					"bet_win_amount"=>$bet_win_amount,
					"bet_odds"=>$market_odds,
					"bet_type"=>$exposure_bet_type,
					"bet_market_type"=>"FANCY_ODDS",
					"stack"=>$stack,
					"runs"=>$runs,
					);
		
		
		$check_market_exposure_exit = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$event_id' and market_id='$marketId' and market_type='FANCY_ODDS'");
				
		$check_num_rows = mysqli_num_rows($check_market_exposure_exit);
		if($check_num_rows <= 0){
			$this_current_bet_details = -$margin_used;
		}else{
			$exposure_data = get_current_bet_fancy_exposure2($conn,$user_id,$event_id,$marketId,$current_bet);

			$this_current_bet_details = min($exposure_data);
		}
		$fancy_odds[] = array(
							"market_ids"=>array(
											'team_1'=>$marketId,
											),
							"exposure"=>array(
											'team_1'=>$this_current_bet_details,
											),
							);
		
		$data['FANCY_ODDS'] = $fancy_odds;
		$return_array = array(								
							"status"=>'ok',		
							"data"=>$data,
															
		);
		echo json_encode($return_array);
		exit();
	}

?>