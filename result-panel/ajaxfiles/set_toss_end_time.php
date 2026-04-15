<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	$event_id = $_REQUEST['event_id'];
	$event_end_time = $_REQUEST['event_end_time'];
	
	if($event_id == ""){
		$return = array(
						"status"=>"error",
						"message"=>"Please Enter Event ID",
						);
		echo json_encode($return);
		exit();
	}
	
	if($event_end_time == ""){
		$return = array(
						"status"=>"error",
						"message"=>"Please Enter Event Toss End Time",
						);
		echo json_encode($return);
		exit();
	}
	
	$event_end_time = $event_end_time.":00";
	$insert_toss_id = $conn->query("insert into toss_end_time(event_id,end_date) values('$event_id','$event_end_time')");
	
	file_get_contents("http://netexch.com/api/auto_entry/set_toss_end_time.php?event_id=$event_id&event_end_time=$event_end_time");
	file_get_contents("http://rrexchange247.com/api/auto_entry/set_toss_end_time.php?event_id=$event_id&event_end_time=$event_end_time");
	
	if($insert_toss_id){
		$return = array(
					"status"=>"ok",
					"message"=>"Toss End Time Added Success for Event ID: $event_id",
					);
		echo json_encode($return);
		exit();
	}else{
		$return = array(
					"status"=>"error",
					"message"=>"Something went wrong, Please try again later.",
					);
		echo json_encode($return);
		exit();
	}
?>