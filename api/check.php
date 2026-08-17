<?php

	include "../include/conn.php";
	include "../include/flip_function2.php";

	
	$bet_user_id = 651;
	$event_id = 30685663;
	$market_type = "MATCH_ODDS";
	$bet_type_exposure = "Back";
	$stack = 100;
	$stack = 1;
$exposure_data = get_net_exposure_match_oods($conn,$bet_user_id,$event_id,$market_type,$bet_type_exposure,$stack,$runs);
		
		echo "update exposure_details set exposure_amount='$exposure_data' where event_id='$event_id' and user_id=$bet_user_id and market_type='$market_type'";
		