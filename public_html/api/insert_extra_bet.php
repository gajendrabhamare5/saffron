<?php
include "../include/conn.php";

function insert_query($conn,$table_name,$data){
	
	$columns = implode(',',array_keys($data));
	
	$values  = implode("','",array_values($data));
	
	$sql = "INSERT INTO $table_name ($columns) VALUES ('$values')";
	$conn->query($sql);
	return $conn->insert_id;
}

$user_id = 4;
$bet_time = date("Y-m-d H:i:s");




$event_type = $_REQUEST['event_type'];
$oddsmarketId = $_REQUEST['oddsmarketId'];
$event_id = $_REQUEST['event_id'];
$market_id = $_REQUEST['market_id'];
$market_name = $_REQUEST['market_name'];
$market_type = $_REQUEST['market_type'];
$bet_type = $_REQUEST['bet_type'];
$bet_runs = $_REQUEST['bet_runs'];
$bet_odds = $_REQUEST['bet_odds'];
$bet_margin_used = $_REQUEST['bet_margin_used'];
$bet_win_amount = $_REQUEST['bet_win_amount'];
$event_name = $_REQUEST['event_name'];

$check_already_add = $conn->query("select * from bet_details where event_id='$event_id' and market_id='$market_id' and market_type='$market_type'");
$row_count = mysqli_num_rows($check_already_add);
if($row_count == 0){
	
	$bet_ip_address	 = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$bet_user_agent = $_SERVER['HTTP_USER_AGENT'];
	
	
	
	$game_type_id = 0;
	$bet_stack =100;
	
	if(true){
		$insert_bet_details = array(
								"bet_ip_address"=>$bet_ip_address,
								"bet_user_agent"=>0,
								"event_type"=>$event_type,
								"event_id"=>$event_id,
								"oddsmarketId"=>$oddsmarketId,
								"market_id"=>$market_id,
								"user_id"=>$user_id,
								"event_name"=>$event_name,
								"market_name"=>$market_name,
								"market_type"=>$market_type,
								"bet_type"=>$bet_type,
								"bet_runs"=>$bet_runs,
								"bet_odds"=>$bet_odds,
								"bet_stack"=>$bet_stack,
								"bet_comm"=>0,
								"bet_result"=>0,
								"bet_run_result"=>0,
								"bet_margin_used"=>$bet_margin_used,
								"bet_win_amount"=>$bet_win_amount,
								"bet_time"=>$bet_time,
								"bet_status"=>1,
								);
	insert_query($conn,"bet_details",$insert_bet_details);
	echo "inserted";
	}
	
}
else
{
	echo "NA";
}

?>