<?php
include('../include/conn.php');
include "../session.php";
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
$game_date = $conn->real_escape_string($_REQUEST['game_date']);
$casino_type = $conn->real_escape_string($_REQUEST['casino_type']);

	$game_date = date("Y-m-d",strtotime($game_date));
	
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and DATE(result_time) = '$game_date' ORDER BY result_time DESC");
	
	$casino_result=[];
	while($fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result)){
		$result_data['event_id']= $fetch_get_casino_result['event_id'];
		$result_data['game_type']= $fetch_get_casino_result['game_type'];
		$result_data['result_status']= $fetch_get_casino_result['result_status'];
		$result_data['cards']= $fetch_get_casino_result['cards'];
		$casino_result[] = $result_data;
	}
	
	$return_array = array(
						"status"=>"ok",
						"data"=>$casino_result,
						);
	echo json_encode($return_array);
?>