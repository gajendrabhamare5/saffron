<?php
function get_market_limit($conn = false,$eventId ='',$oddsmarketId = '',$with_data = false,$eventType = ''){

	$sql_market_limit = $conn->query("select * from event_market_limit where event_id=$eventId AND oddsmarketId='$oddsmarketId' AND status = 0");
	$market_limit_data = mysqli_fetch_assoc($sql_market_limit);		
		
	if(empty($market_limit_data)){
		$url2 = SPORTS_DATA1_URL . $oddsmarketId;

		
		
		 $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url2);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$event_data222 = curl_exec($ch);

		$er = curl_error($ch);
		curl_close($ch);
		
		$event_data222 = json_decode($event_data222);

		$eventName = (isset($event_data222->data[0]->name))? $event_data222->data[0]->name : $event_data222->data[0]->matchName;

		if (strpos($eventName, '/') !== false) {
			$eventNameArr = explode('/',$eventName);
			$eventName = trim($eventNameArr[0]);
		}
		
		$market_limit_data = array();
		if($eventType == 1 || $eventType == 2){
			$market_limit_data = array('match_min' => 100,'match_max' => 50000,'bookmaker_min' => 0,'bookmaker_max' => 1,'bookmaker_live' => 1);
		}
		else{
			$market_runners = $event_data222->data[0]->runners;

			$market_runner1 = $market_runners[0]->name;

			/* $leauge1 = array("Australia","India","South Africa","England","West Indies","New Zealand","New Zealand","Pakistan");

			$leauge2 = array("Hobart Hurricanes","Sydney Sixers","Melbourne Stars","Brisbane Heat","Sydney Thunder","Melbourne Renegades","Perth Scorchers","Adelaide Strikers");

			$leauge3 = array("Gemcon Khulna","Gazi Group Chottogram","Northern Knights","Central Districts","Wellington","Canterbury","Auckland","Otago");
			
			$leauge4 = array("Maratha Arabians","Northern Warriors","Pune Devils","Deccan Gladiators","Delhi Bulls","Bangla Tigers","Qalandars","Abu Dhabi");
		
			if (in_array($market_runner1, $leauge1)){
				$market_limit_data = array('match_min' => 500,'match_max' => 300000,'bookmaker_min' => 500,'bookmaker_max' => 3000000,'bookmaker_live' => 3000000);
			}
			else if (in_array($market_runner1, $leauge2)){
				$market_limit_data = array('match_min' => 100,'match_max' => 50000,'bookmaker_min' => 500,'bookmaker_max' => 200000,'bookmaker_live' => 200000);
			}
			else if (in_array($market_runner1, $leauge3)){
				$market_limit_data = array('match_min' => 100,'match_max' => 50000,'bookmaker_min' => 500,'bookmaker_max' => 200000,'bookmaker_live' => 200000);
			}
			else if (in_array($market_runner1, $leauge4)){
				$market_limit_data = array('match_min' => 100,'match_max' => 25000,'bookmaker_min' => 500,'bookmaker_max' => 50000,'bookmaker_live' => 200000);
			} */
			if(true){
				$market_limit_data = array('match_min' => 1,'match_max' => 1,'bookmaker_min' => 1,'bookmaker_max' => 1,'bookmaker_live' => 1);	
			}
			
			$market_limit_data = array('match_min' => 100,'match_max' => 50000,'bookmaker_min' => 500,'bookmaker_max' => 200000,'bookmaker_live' => 200000);
		}
		
		$market_limit_data['event_name'] = $eventName;	
		$market_limit_data['event_data222'] = $event_data222;
		
	}
	else{
		if($with_data){
			
			$url2 = SPORTS_DATA1_URL . $oddsmarketId;

			$event_data222 = file_get_contents($url2);
			$event_data222 = json_decode($event_data222);
			
			$market_limit_data['event_data222'] = $event_data222;
		}
	}
	
	return $market_limit_data;
}

function get_inplay_status($oddsmarketId = ''){

	$url2 = SPORTS_DATA_URL . $oddsmarketId;

	$event_data222 = file_get_contents($url2);
	$event_data222 = json_decode($event_data222);
	if(isset($event_data222->cricket[0]->inplay))
		return $event_data222->cricket[0]->inplay;
	else
		return false;
}