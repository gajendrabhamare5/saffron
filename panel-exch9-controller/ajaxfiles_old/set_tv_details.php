<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	$event_id = $_REQUEST['event_id'];
	$hdmi_id = $_REQUEST['hdmi_id'];
	
	if($event_id == ""){
		$return = array(
						"status"=>"error",
						"message"=>"Please Enter Event ID",
						);
		echo json_encode($return);
		exit();
	}
	
	if($hdmi_id == ""){
		$return = array(
						"status"=>"error",
						"message"=>"Please Enter Enter Tv Details",
						);
		echo json_encode($return);
		exit();
	}
	
	$hdmi_id = $hdmi_id;
	$insert_toss_id = $conn->query("insert into hdmi_tv_master(event_id,hdmi_id) values('$event_id','$hdmi_id')");
	
	
	if($insert_toss_id){
		$return = array(
					"status"=>"ok",
					"message"=>"TV Details Success for Event ID: $event_id",
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