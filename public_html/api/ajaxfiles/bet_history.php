<?php
include('../include/conn.php');
include "../session.php";
$user_id = $_SESSION['CLIENT_LOGIN_ID'];

	$bet_status = $conn->real_escape_string($_REQUEST['betType']);
	$start_date = $conn->real_escape_string($_REQUEST['startDate']);
	$end_date = $conn->real_escape_string($_REQUEST['endDate']);
	$eventType = $conn->real_escape_string($_REQUEST['eventType']);
	
	$min_date = date("Y-m-d",strtotime('-60 Days'));
	if($start_date == ""){
		$return_array = array(
						"status" =>'ok',
						"message"=>"Please select start date.",
						);
		echo json_encode($return_array);
		exit();
	}
	
	if($end_date == ""){
		$return_array = array(
						"status" =>'ok',
						"message"=>"Please select end date.",
						);
		echo json_encode($return_array);
		exit();
	}
	
	if($min_date >= $start_date){
		$return_array = array(
						"status" =>'ok',
						"message"=>"You can not view before 30 days bet.",
						);
		echo json_encode($return_array);
		exit();
	}
	
	if($bet_status == "All"){
		$bet_status_con ="";
	}else{
		$bet_status_con = "and bet_status=$bet_status";
	}
	
	$is_casino = 0;
	if($eventType == "All" or $eventType == ""){
		$event_type_selection = "";
	}else{
		if($eventType != 999){
			$event_type_selection = "and event_type='$eventType'";
		}
		else{
			$is_casino = 1;
		}
	}
	
		if($is_casino == 1){
			$get_all_bet_history_data = $conn->query("SELECT * FROM bet_teen_details where user_id=$user_id and DATE(bet_time) >= '$start_date' and DATE(bet_time) <= '$end_date' $bet_status_con $event_type_selection order by bet_time desc");
		}
		else{
			$get_all_bet_history_data = $conn->query("SELECT * FROM bet_details where user_id=$user_id and DATE(bet_time) >= '$start_date' and DATE(bet_time) <= '$end_date' $bet_status_con $event_type_selection order by bet_time desc");
		}

	
	$num_rows = $get_all_bet_history_data->num_rows;
	if($num_rows != 0){
		while($fetch_bet_history_data = mysqli_fetch_assoc($get_all_bet_history_data)){
			$bet_history_data [] = $fetch_bet_history_data;
		}
		$return_array = array(
						"status" =>'ok',
						"bet_history_data"=>$bet_history_data,
						);
	}else{
		$return_array = array(
						"status" =>'ok',
						"message"=>"No Bet places during this time period.",
						);
	}
	

	echo json_encode($return_array);

?>