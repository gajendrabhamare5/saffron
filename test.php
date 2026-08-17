<?php
exit();
if($_REQUEST['key'] == 'S0A65kk8haJ8hO22TBavzIplvpjguuyz'){
	include('include/conn.php');
	
	$event_id = intval($conn->real_escape_string($_REQUEST['event_id']));
	
	if($event_id > 0){
	
		$res_bets = $conn->query("
			SELECT b.*,(SELECT m.Email_Id FROM user_master m WHERE m.Id = b.user_id) as username 
			FROM `bet_teen_details` b 
			WHERE b.`event_id` = $event_id
		");
		
		$printArr = array();
		while($bets_data = mysqli_fetch_assoc($res_bets)){
			
			$printArr[] = array(
				'userId' 	=> $bets_data['user_id'],
				'userName'	=> $bets_data['username'],
				'eventId'	=> $bets_data['event_id'],
				'eventName'	=> $bets_data['event_name'],
				'marketId'	=> $bets_data['market_id'],
				'marketName'	=> $bets_data['market_name'],
				'type'		=> $bets_data['bet_type'],
				'result'	=> $bets_data['bet_result'],
				'status'	=> $bets_data['bet_status'],
			);
		}
		
		echo json_encode($printArr);
	}
	else{

		$res_exposure = $conn->query("
			SELECT e.*,(SELECT m.Email_Id FROM user_master m WHERE m.Id = e.user_id) as username 
			FROM `exposure_details` e 
			WHERE e.`market_type` NOT IN ('MATCH_ODDS','BOOKMAKER_ODDS','FANCY_ODDS','METER_ODDS','KHADO_ODDS','BOOKMAKERSMALL_ODDS')
		");
		$printArr = array();
		while($exposure_data = mysqli_fetch_assoc($res_exposure)){
			
			$printArr[] = array(
				'eventId'		=> $exposure_data['event_id'],
				'userId'		=> $exposure_data['user_id'],
				'userName'		=> $exposure_data['username'],
				'marketType'	=> $exposure_data['market_type'],
				'amount'		=> $exposure_data['exposure_amount'],
				'datetime'		=> $exposure_data['exposure_datetime'],
				'casinoBackName'	=> $exposure_data['casino_back_name'],
			);
		}
		
		echo json_encode($printArr);
	}

	$conn->close();
}
else{
	echo "authentication required.";
}