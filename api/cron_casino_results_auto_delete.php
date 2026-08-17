<?php

include('../include/conn.php');


$added_datetime  = date("Y-m-d H:i:s");
$added_datetime_first  = date("Y-m-d H:i:s",strtotime('-2 hours'));

$get_delete_pending = $conn->query("select * from bet_teen_details where bet_status=1 and bet_time <='$added_datetime_first'");
while($fetch_get_delete_pending = mysqli_fetch_assoc($get_delete_pending)){
	$event_id = $fetch_get_delete_pending['event_id'];
	$event_type = $fetch_get_delete_pending['event_type'];
	$bet_id = $fetch_get_delete_pending['bet_id'];
	
	$conn->query("update bet_teen_details set bet_status='2' where bet_id=$bet_id");
	$conn->query("delete from exposure_details where event_id='$event_id' and market_type='$event_type'");
	
}

$insert_cron = $conn->query("insert into cron_auto_casino(added_time) VALUES ('$added_datetime')");

$get_pending_result = $conn->query("SELECT event_id,event_name FROM `bet_teen_details` where bet_status=1 GROUP BY event_id,event_name");

$eventNameList = array();
$eventIdList = array();

$fetch_get_pending_result = mysqli_fetch_all($get_pending_result);
$eventIdList = array_column($fetch_get_pending_result,0);
$eventNameList = array_column($fetch_get_pending_result,1);

$return_array = array(
					"status"=>"ok",
					"eventId"=>$eventIdList,
					"eventName"=>$eventNameList,
					);
					
echo json_encode($return_array);
exit();
?>