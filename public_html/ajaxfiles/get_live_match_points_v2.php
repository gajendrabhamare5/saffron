<?php
include('../include/conn.php');
include "../session.php";

$user_id = $_SESSION['CLIENT_LOGIN_ID'];
$event_id = $conn->real_escape_string($_REQUEST['eventId']);
$market_ids = null;
if ($_REQUEST['market_ids']) {

	$market_ids = $conn->real_escape_string($_REQUEST['market_ids']);
}
$market_ids = array_unique($market_ids); 

$winning_amount_team_3 = 0;

//$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_details where user_id=$user_id and event_id=$event_id and market_type ='MATCH_ODDS' and bet_status=1 GROUP BY event_id");

$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id,market_type from bet_details where user_id=$user_id and event_id=$event_id and bet_status=1 GROUP BY event_id,market_type");




while ($fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet)) {

	$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];
	$market_type = $fetch_match_odds_active_bet['market_type'];
	$market_idss = array();
	$get_market_id = $conn->query("select market_id from event_market_id where event_id=$event_id and market_type='$market_type'");
	foreach ($get_market_id as $market_id_data) {
		$market_iddd = $market_id_data['market_id'];
		$market_idss[] = $market_iddd;
	}

	$get_event_market = $conn->query("select market_id,event_id from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_type ='$market_type' GROUP BY market_id order by market_id");
	$get_event_data = array();
	while ($fetch_get_event_market = mysqli_fetch_assoc($get_event_market)) {
		$get_event_data[] = $fetch_get_event_market;
	}


	$event_1_id = $get_event_data[0]['event_id'];

	if ($market_idss != null) {
		$market_ids = $market_idss;
	}

	$market_bet_type_array2=array();
	$market_bet_type_array=array();
	foreach($market_ids as $markets){
		$get_1_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$markets and market_type='$market_type' and bet_type='Back'");

		$get_1_opp_lay_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$markets and market_type='$market_type' and bet_type='Lay'");
		
		$total_1_win_back = 0;
		while($fetch_get_1_win_back_data = mysqli_fetch_assoc($get_1_win_back_data)){
			$total_1_win_back = $total_1_win_back + $fetch_get_1_win_back_data['bet_win_amount'] + $fetch_get_1_win_back_data['bet_margin_used'];
		}
		
		$total_1_win_lay = 0;
		while($fetch_get_1_opp_lay_data = mysqli_fetch_assoc($get_1_opp_lay_data)){
			$total_1_win_lay = $total_1_win_lay + $fetch_get_1_opp_lay_data['bet_win_amount'] + $fetch_get_1_opp_lay_data['bet_margin_used'];
		}
		$market_bet_type_array[$markets]['Back']=$total_1_win_back;
		$market_bet_type_array[$markets]['Lay']=$total_1_win_lay;
		
	}
	if ($market_type != 'KHADO_ODDS') {
		$market_ids_array=array();
			$market_exposure_array=array();
			$i_p=0;
			foreach($market_bet_type_array as $key=>$val){
			    $i_p++;
			    $keyyy="team_".$i_p;
			    $market_ids_array[$keyyy]= $key;
			    $market_exposure_array[$keyyy]=($val['Back'] + $val['Lay']) - $total_bet_amount;
				
			}
			$data[$market_type]=array(
				"market_ids" => $market_ids_array,
				"exposure" =>$market_exposure_array,
			);
	}

	/*
	
	$market_1_id = $market_idss[0];
	$market_2_id = $market_idss[1];
	$market_3_id = $market_idss[2];
	
	$get_1_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type ='$market_type' and bet_type='Back'");
	$get_1_opp_lay_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_1_id and market_type ='$market_type' and bet_type='Lay'");
	$get_2_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type ='$market_type' and bet_type='Back'");
	$get_2_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_2_id and market_type ='$market_type' and bet_type='Lay'");

	if ($market_3_id != "") {
		$get_3_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_3_id and market_type ='$market_type' and bet_type='Back'");
		$get_3_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_3_id and market_type ='$market_type' and bet_type='Lay'");
	}

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
		$total_3_win_back = 0;
		while ($fetch_get_3_win_back_data = mysqli_fetch_assoc($get_3_win_back_data)) {
			$total_3_win_back = $total_3_win_back + $fetch_get_3_win_back_data['bet_win_amount'] + $fetch_get_3_win_back_data['bet_margin_used'];
		}

		$total_3_win_lay = 0;
		while ($fetch_get_3_opp_lay_data = mysqli_fetch_assoc($get_3_opp_lay_data)) {
			$total_3_win_lay = $total_3_win_lay + $fetch_get_3_opp_lay_data['bet_win_amount'] + $fetch_get_3_opp_lay_data['bet_margin_used'];
		}
	}

	$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
	$winning_amount_team_2 = ($total_2_win_back + $total_2_win_lay) - $total_bet_amount;
	if ($market_3_id != "") {
		$winning_amount_team_3 = ($total_3_win_back + $total_3_win_lay) - $total_bet_amount;
	}

	if ($market_type != 'KHADO_ODDS') {
		if ($market_3_id != "") {
			$data[$market_type] = array(
				"market_ids" => array(
					'team_1' =>	$market_1_id,
					'team_2' =>	$market_2_id,
					'team_3' =>	$market_3_id,
				),
				"exposure" => array(
					'team_1' =>	$winning_amount_team_1,
					'team_2' =>	$winning_amount_team_2,
					'team_3' =>	$winning_amount_team_3,
				),
			);
		} else {
			$data[$market_type] = array(
				"market_ids" => array(
					'team_1' =>	$market_1_id,
					'team_2' =>	$market_2_id,
				),
				"exposure" => array(
					'team_1' =>	$winning_amount_team_1,
					'team_2' =>	$winning_amount_team_2,
				),
			);
		}
	} */
}
// TOSS_ODDS

$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_details where user_id=$user_id and event_id=$event_id and market_type ='TOSS_ODDS' and bet_status=1 GROUP BY event_id");

$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];


$get_event_market = $conn->query("select market_id,event_id from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_type ='TOSS_ODDS' GROUP BY market_id order by market_id");
$get_event_data = array();
while ($fetch_get_event_market = mysqli_fetch_assoc($get_event_market)) {
	$get_event_data[] = $fetch_get_event_market;
}

$event_1_id = $get_event_data[0]['event_id'];

$get_1_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type ='TOSS_ODDS' and bet_type='Back'");
$get_1_opp_lay_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_1_id and market_type ='TOSS_ODDS' and bet_type='Lay'");
$get_2_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type ='TOSS_ODDS' and bet_type='Back'");
$get_2_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_2_id and market_type ='TOSS_ODDS' and bet_type='Lay'");

if ($market_3_id != "") {
	$get_3_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_3_id and market_type ='TOSS_ODDS' and bet_type='Back'");
	$get_3_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_3_id and market_type ='TOSS_ODDS' and bet_type='Lay'");
}

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
	$total_3_win_back = 0;
	while ($fetch_get_3_win_back_data = mysqli_fetch_assoc($get_3_win_back_data)) {
		$total_3_win_back = $total_3_win_back + $fetch_get_3_win_back_data['bet_win_amount'] + $fetch_get_3_win_back_data['bet_margin_used'];
	}

	$total_3_win_lay = 0;
	while ($fetch_get_3_opp_lay_data = mysqli_fetch_assoc($get_3_opp_lay_data)) {
		$total_3_win_lay = $total_3_win_lay + $fetch_get_3_opp_lay_data['bet_win_amount'] + $fetch_get_3_opp_lay_data['bet_margin_used'];
	}
}

$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
$winning_amount_team_2 = ($total_2_win_back + $total_2_win_lay) - $total_bet_amount;
if ($market_3_id != "") {
	$winning_amount_team_3 = ($total_3_win_back + $total_3_win_lay) - $total_bet_amount;
}
if ($market_3_id != "") {
	$data['TOSS_ODDS'] = array(
		"market_ids" => array(
			'team_1' =>	$market_1_id,
			'team_2' =>	$market_2_id,
			'team_3' =>	$market_3_id,
		),
		"exposure" => array(
			'team_1' =>	$winning_amount_team_1,
			'team_2' =>	$winning_amount_team_2,
			'team_3' =>	$winning_amount_team_3,
		),
	);
} else {
	$data['TOSS_ODDS'] = array(
		"market_ids" => array(
			'team_1' =>	$market_1_id,
			'team_2' =>	$market_2_id,
		),
		"exposure" => array(
			'team_1' =>	$winning_amount_team_1,
			'team_2' =>	$winning_amount_team_2,
		),
	);
}
// TIE_ODDS

$get_match_odds_active_bet = $conn->query("select SUM(bet_margin_used) as total_bet_amount, event_id from bet_details where user_id=$user_id and event_id=$event_id and market_type ='TIE_ODDS' and bet_status=1 GROUP BY event_id");

$fetch_match_odds_active_bet = mysqli_fetch_assoc($get_match_odds_active_bet);
$total_bet_amount = $fetch_match_odds_active_bet['total_bet_amount'];


$get_event_market = $conn->query("select market_id,event_id from bet_details where user_id=$user_id and bet_status =1 and event_id=$event_id and market_type ='TIE_ODDS' GROUP BY market_id order by market_id");
$get_event_data = array();
while ($fetch_get_event_market = mysqli_fetch_assoc($get_event_market)) {
	$get_event_data[] = $fetch_get_event_market;
}

$event_1_id = $get_event_data[0]['event_id'];

$get_1_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_1_id and market_type ='TIE_ODDS' and bet_type='Back'");
$get_1_opp_lay_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_1_id and market_type ='TIE_ODDS' and bet_type='Lay'");
$get_2_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_2_id and market_type ='TIE_ODDS' and bet_type='Back'");
$get_2_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_2_id and market_type ='TIE_ODDS' and bet_type='Lay'");

if ($market_3_id != "") {
	$get_3_win_back_data = $conn->query("select * from  bet_details  where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id=$market_3_id and market_type ='TIE_ODDS' and bet_type='Back'");
	$get_3_opp_lay_data = $conn->query("select * from  bet_details where user_id=$user_id and bet_status =1 and event_id=$event_1_id and market_id<>$market_3_id and market_type ='TIE_ODDS' and bet_type='Lay'");
}
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
	$total_3_win_back = 0;
	while ($fetch_get_3_win_back_data = mysqli_fetch_assoc($get_3_win_back_data)) {
		$total_3_win_back = $total_3_win_back + $fetch_get_3_win_back_data['bet_win_amount'] + $fetch_get_3_win_back_data['bet_margin_used'];
	}

	$total_3_win_lay = 0;
	while ($fetch_get_3_opp_lay_data = mysqli_fetch_assoc($get_3_opp_lay_data)) {
		$total_3_win_lay = $total_3_win_lay + $fetch_get_3_opp_lay_data['bet_win_amount'] + $fetch_get_3_opp_lay_data['bet_margin_used'];
	}
}
$winning_amount_team_1 = ($total_1_win_back +  $total_1_win_lay) - $total_bet_amount;
$winning_amount_team_2 = ($total_2_win_back + $total_2_win_lay) - $total_bet_amount;

if ($market_3_id != "") {
	$winning_amount_team_3 = ($total_3_win_back + $total_3_win_lay) - $total_bet_amount;
}
if ($market_3_id != "") {
	$data['TIE_ODDS'] = array(
		"market_ids" => array(
			'team_1' =>	$market_1_id,
			'team_2' =>	$market_2_id,
			'team_3' =>	$market_3_id,
		),
		"exposure" => array(
			'team_1' =>	$winning_amount_team_1,
			'team_2' =>	$winning_amount_team_2,
			'team_3' =>	$winning_amount_team_3,
		),
	);
} else {
	$data['TIE_ODDS'] = array(
		"market_ids" => array(
			'team_1' =>	$market_1_id,
			'team_2' =>	$market_2_id,
		),
		"exposure" => array(
			'team_1' =>	$winning_amount_team_1,
			'team_2' =>	$winning_amount_team_2,
		),
	);
}




//FAnCY Exposure 
$fancy_odds = array();
$get_fancy_exposure_data = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$event_id' and market_type='FANCY_ODDS'");
while ($fetch_get_fancy_exposure_data = mysqli_fetch_assoc($get_fancy_exposure_data)) {
	$fancy_odds[] = array(
		"market_ids" => array(
			'team_1' => $fetch_get_fancy_exposure_data['market_id'],
		),
		"exposure" => array(
			'team_1' => $fetch_get_fancy_exposure_data['exposure_amount'],
		),
	);
}
$data['FANCY_ODDS'] = $fancy_odds;


//KHADO Exposure 
$fancy_odds = array();
$get_fancy_exposure_data = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$event_id' and market_type='KHADO_ODDS'");
while ($fetch_get_fancy_exposure_data = mysqli_fetch_assoc($get_fancy_exposure_data)) {
	$fancy_odds[] = array(
		"market_ids" => array(
			'team_1' => $fetch_get_fancy_exposure_data['market_id'],
		),
		"exposure" => array(
			'team_1' => $fetch_get_fancy_exposure_data['exposure_amount'],
		),
	);
}
$data['KHADO_ODDS'] = $fancy_odds;


//METER Exposure 
$fancy_odds = array();
$get_fancy_exposure_data = $conn->query("select * from exposure_details where user_id=$user_id and event_id='$event_id' and market_type='METER_ODDS'");
while ($fetch_get_fancy_exposure_data = mysqli_fetch_assoc($get_fancy_exposure_data)) {
	$fancy_odds[] = array(
		"market_ids" => array(
			'team_1' => $fetch_get_fancy_exposure_data['market_id'],
		),
		"exposure" => array(
			'team_1' => $fetch_get_fancy_exposure_data['exposure_amount'],
		),
	);
}
$data['METER_ODDS'] = $fancy_odds;
$return_array = array(
	"status" => 'ok',
	"data" => $data,
);

echo json_encode($return_array);
