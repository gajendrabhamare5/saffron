<?php

include('../include/conn.php');


$added_datetime  = date("Y-m-d H:i:s");
$added_datetime_first  = date("Y-m-d H:i:s",strtotime('-8 hours'));


$insert_cron = $conn->query("insert into cron_auto_casino(added_time) VALUES ('$added_datetime')");

$get_pending_result = $conn->query("SELECT event_id,event_name FROM `bet_teen_details` where bet_status=1 and bet_time>'$added_datetime_first' and event_name not in ($new_casino) GROUP BY event_id,event_name");

$eventNameList = array();
$eventIdList = array();
$eventNameActual = array();

while($pending_result = mysqli_fetch_assoc($get_pending_result)){
	$event_id = $pending_result['event_id'];
	$event_name = $pending_result['event_name'];
	
	if($event_name == "2020TEENPATTI"){
		$event_id = "11.".$event_id;
		$event_actual_name = "teen20";
	}
	else if($event_name == "TESTTEENPATTI"){
		$event_id = "10.".$event_id;
		$event_actual_name = "teen9";
	}
	else if($event_name == "ODITEENPATTI"){
		$event_id = "9.".$event_id;
		$event_actual_name = "Teen";
	}
	else if($event_name == "LUCKY7"){
		$event_id = "24.".$event_id;
		$event_actual_name = "lucky7";
	}
	else if($event_name == "LUCKY7B"){
		$event_id = "36.".$event_id;
		$event_actual_name = "lucky7eu";
	}
	else if($event_name == "2020_POKER"){
		$event_id = "12.".$event_id;
		$event_actual_name = "poker20";
	}
	else if($event_name == "ODI_POKER"){
		$event_id = "13.".$event_id;
		$event_actual_name = "poker";
	}
	else if($event_name == "32CARDS"){
		$event_id = "18.".$event_id;
		$event_actual_name = "card32";
	}
	else if($event_name == "32CARDSB"){
		$event_id = "29.".$event_id;
		$event_actual_name = "card32eu";
	}
	else if($event_name == "2020_DRAGON_TIGER"){
		$event_id = "25.".$event_id;
		$event_actual_name = "dt20";
	}
	else if($event_name == "ODI_DRAGON_TIGER"){
		$event_id = "28.".$event_id;
		$event_actual_name = "dt6";
	}
	else if($event_name == "DTL20"){
		$event_id = "32.".$event_id;
		$event_actual_name = "dtl20";
	}
	else if($event_name == "AMAR_AKBAR_ANTHONY"){
		$event_id = "27.".$event_id;
		$event_actual_name = "aaa";
	}
	else if($event_name == "B_TABLE"){
		$event_id = "26.".$event_id;
		$event_actual_name = "btable";
	}
	else if($event_name == "AB20"){
		$event_id = "14.".$event_id;
		$event_actual_name = "ab20";
	}
	else if($event_name == "6_PLAYER_POKER"){
		$event_id = "17.".$event_id;
		$event_actual_name = "poker9";
	}
	else if($event_name == "2020_CRICKET_MATCH"){
		$event_id = "35.".$event_id;
		$event_actual_name = "cmatch20";
	}
	else if($event_name == "2020_DRAGON_TIGER2"){
		$event_id = "40.".$event_id;
		$event_actual_name = "dt202";
	}
	else if($event_name == "3_CARD_J"){
		$event_id = "16.".$event_id;
		$event_actual_name = "3cardj";
	}
	else if($event_name == "BACCARAT2"){
		$event_id = "39.".$event_id;
		$event_actual_name = "baccarat2";
	}
	else if($event_name == "BACCARAT"){
		$event_id = "37.".$event_id;
		$event_actual_name = "baccarat";
	}
	else if($event_name == "OPENTEENPATTI"){
		$event_id = "22.".$event_id;
		$event_actual_name = "teen8";
	}
	else if($event_name == "CASINO_WAR"){
		$event_id = "31.".$event_id;
		$event_actual_name = "war";
	}
	else if($event_name == "CASINO_METER"){
		$event_id = "33.".$event_id;
		$event_actual_name = "cmeter";
	}
	else if($event_name == "INSTANT_WORLI"){
		$event_id = "23.".$event_id;
		$event_actual_name = "worli2";
	}
	else if($event_name == "WORLI_MATKA"){
		$event_id = "15.".$event_id;
		$event_actual_name = "worli";
	}
	else if($event_name == "RACE_20"){
		$event_id = "46.".$event_id;
		$event_actual_name = "race20";
	}
	else if($event_name == "QUEEN"){
		$event_id = "44.".$event_id;
		$event_actual_name = "queen";
	}
	else if($event_name == "ABJ"){
		$event_id = "38.".$event_id;
		$event_actual_name = "abj";
	}
	else if($event_name == "FIVE_5_CRICKET"){
		$event_id = "41.".$event_id;
		$event_actual_name = "cricketv3";
	}
	else if($event_name == "SUPER_OVER"){
		$event_id = "52.".$event_id;
		$event_actual_name = "superover";
	}
	
	$eventIdList[] = $event_id;
	$eventNameList[] = $event_name;
	$eventNameActualList[] = $event_actual_name;
}

$return_array = array(
					"status"=>"ok",
					"eventId"=>$eventIdList,
					"eventName"=>$eventNameList,
					"eventNameActual"=>$eventNameActualList,
					);
					
echo json_encode($return_array);
exit();
?>