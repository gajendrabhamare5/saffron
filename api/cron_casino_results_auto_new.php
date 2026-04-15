<?php

include('../include/conn.php');


$added_datetime = date("Y-m-d H:i:s");
$added_datetime_first = date("Y-m-d H:i:s", strtotime('-24 hours'));


$ggg = "SELECT event_id,event_name FROM `bet_teen_details` where bet_status=1 and bet_time>'$added_datetime_first'  GROUP BY event_id,event_name";
$insert_cron = $conn->query("insert into cron_auto_casino(added_time) VALUES ('$added_datetime')");
$get_pending_result = $conn->query("SELECT event_id,event_name FROM `bet_teen_details` where bet_status=1 and bet_time>'$added_datetime_first' GROUP BY event_id,event_name");

$eventNameList = array();
$eventIdList = array();
$eventNameActual = array();

while ($pending_result = mysqli_fetch_assoc($get_pending_result)) {
	$event_id = $pending_result['event_id'];
	$event_name = $pending_result['event_name'];

	if ($event_name == "2020TEENPATTI") {
		$event_id = intval($event_id);
		$event_actual_name = "teen20";
	} else if ($event_name == "TESTTEENPATTI") {
		$event_id = intval($event_id);
		$event_actual_name = "teen9";
	} else if ($event_name == "ODITEENPATTI") {
		$event_id = intval($event_id);
		$event_actual_name = "Teen";
	} else if ($event_name == "LUCKY7") {
		$event_id = intval($event_id);
		$event_actual_name = "lucky7";
	} else if ($event_name == "LUCKY7B") {
		$event_id = intval($event_id);
		$event_actual_name = "lucky7eu";
	} else if ($event_name == "2020_POKER") {
		$event_id = intval($event_id);
		$event_actual_name = "poker20";
	} else if ($event_name == "ODI_POKER") {
		$event_id = intval($event_id);
		$event_actual_name = "poker";
	} else if ($event_name == "32CARDS") {
		$event_id = intval($event_id);
		$event_actual_name = "card32";
	} else if ($event_name == "32CARDSB") {
		$event_id = intval($event_id);
		$event_actual_name = "card32eu";
	} else if ($event_name == "2020_DRAGON_TIGER") {
		$event_id = intval($event_id);
		$event_actual_name = "dt20";
	} else if ($event_name == "ODI_DRAGON_TIGER") {
		$event_id = intval($event_id);
		$event_actual_name = "dt6";
	} else if ($event_name == "DTL20") {
		$event_id = intval($event_id);
		$event_actual_name = "dtl20";
	} else if ($event_name == "AMAR_AKBAR_ANTHONY") {
		$event_id = intval($event_id);
		$event_actual_name = "aaa";
	} else if ($event_name == "B_TABLE") {
		$event_id = intval($event_id);
		$event_actual_name = "btable";
	} else if ($event_name == "AB20") {
		$event_id = intval($event_id);
		$event_actual_name = "ab20";
	} else if ($event_name == "6_PLAYER_POKER") {
		$event_id = intval($event_id);
		$event_actual_name = "poker6";
	} else if ($event_name == "2020_CRICKET_MATCH") {
		$event_id = intval($event_id);
		$event_actual_name = "cmatch20";
	} else if ($event_name == "2020_DRAGON_TIGER2") {
		$event_id = intval($event_id);
		$event_actual_name = "dt202";
	} else if ($event_name == "3_CARD_J") {
		$event_id = intval($event_id);
		$event_actual_name = "3cardj";
	} else if ($event_name == "BACCARAT2") {
		$event_id = intval($event_id);
		$event_actual_name = "baccarat2";
	} else if ($event_name == "BACCARAT") {
		$event_id = intval($event_id);
		$event_actual_name = "baccarat";
	} else if ($event_name == "OPENTEENPATTI") {
		$event_id = intval($event_id);
		$event_actual_name = "teen8";
	} else if ($event_name == "CASINO_WAR") {
		$event_id = intval($event_id);
		$event_actual_name = "war";
	} else if ($event_name == "CASINO_METER") {
		$event_id = intval($event_id);
		$event_actual_name = "cmeter";
	} else if ($event_name == "INSTANT_WORLI") {
		$event_id = intval($event_id);
		$event_actual_name = "worli2";
	} else if ($event_name == "WORLI_MATKA") {
		$event_id = intval($event_id);
		$event_actual_name = "worli";
	} else if ($event_name == "RACE_20") {
		$event_id = intval($event_id);
		$event_actual_name = "race20";
	} else if ($event_name == "QUEEN") {
		$event_id = intval($event_id);
		$event_actual_name = "queen";
	} else if ($event_name == "ABJ") {
		$event_id = intval($event_id);
		$event_actual_name = "abj";
	} else if ($event_name == "FIVE_5_CRICKET") {
		$event_id = intval($event_id);
		$event_actual_name = "cricketv3";
	} else if ($event_name == "SUPER_OVER") {
		$event_id = intval($event_id);
		$event_actual_name = "superover";
	} else if ($event_name == "TEEN6") {
		$event_id = intval($event_id);
		$event_actual_name = "teen6";
	} else if ($event_name == "TEEN42") {
		$event_id = intval($event_id);
		$event_actual_name = "teen42";
	} else if ($event_name == "TEEN41") {
		$event_id = intval($event_id);
		$event_actual_name = "teen41";
	} else if ($event_name == "TEEN33") {
		$event_id = intval($event_id);
		$event_actual_name = "teen33";
	} else if ($event_name == "TEEN32") {
		$event_id = intval($event_id);
		$event_actual_name = "teen32";
	} else if ($event_name == "SICBO") {
		$event_id = intval($event_id);
		$event_actual_name = "sicbo";
	} else if ($event_name == "SICBO2") {
		$event_id = intval($event_id);
		$event_actual_name = "sicbo2";
	} else if ($event_name == "GOAL") {
		$event_id = intval($event_id);
		$event_actual_name = "goal";
	} else if ($event_name == "SUPER_OVER2") {
		$event_id = intval($event_id);
		$event_actual_name = "superover2";
	} else if ($event_name == "SUPER_OVER3") {
		$event_id = intval($event_id);
		$event_actual_name = "superover3";
	} else if ($event_name == "LUCKY7C") {
		$event_id = intval($event_id);
		$event_actual_name = "lucky7eu2";
	} else if ($event_name == "LOTTCARD") {
		$event_id = intval($event_id);
		$event_actual_name = "lottcard";
	} else if ($event_name == "LOTTCARD") {
		$event_id = intval($event_id);
		$event_actual_name = "lottcard";
	} else if ($event_name == "LUCKY15") {
		$event_id = intval($event_id);
		$event_actual_name = "lucky15";
	} else if ($event_name == "DUM10") {
		$event_id = intval($event_id);
		$event_actual_name = "dum10";
	} else if ($event_name == "CMETER1") {
		$event_id = intval($event_id);
		$event_actual_name = "cmeter1";
	} else if ($event_name == "RACE2") {
		$event_id = intval($event_id);
		$event_actual_name = "race2";
	} else if ($event_name == "RACE17") {
		$event_id = intval($event_id);
		$event_actual_name = "race17";
	} else if ($event_name == "NOTENUM") {
		$event_id = intval($event_id);
		$event_actual_name = "notenum";
	} else if ($event_name == "TEENSIN") {
		$event_id = intval($event_id);
		$event_actual_name = "teensin";
	} else if ($event_name == "B_TABLE2") {
		$event_id = intval($event_id);
		$event_actual_name = "btable2";
	} else if ($event_name == "DOLIDANA") {
		$event_id = intval($event_id);
		$event_actual_name = "dolidana";
	} else {
		$event_id = intval($event_id);
		$event_actual_name = strtolower($event_name);
	}
	$eventIdList[] = "$event_id";
	$eventNameList[] = $event_name;
	$eventNameActualList[] = $event_actual_name;
}

$return_array = array(
	"status" => "ok",
	"eventId" => $eventIdList,
	"eventName" => $eventNameList,
	"eventNameActual" => $eventNameActualList,
);

echo json_encode($return_array);
exit();
?>