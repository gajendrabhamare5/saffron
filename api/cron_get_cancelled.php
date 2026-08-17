<?php

include('../include/conn.php');


$get_pending_result = $conn->query("SELECT event_id,event_name FROM `bet_teen_details` where bet_status=2 and user_id=4 and bet_time >='2021-06-04 00:00:00' GROUP BY event_id,event_name");

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