<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	$current_status = $_REQUEST['current_status'];

	if($current_status == ""){
		$return = array(
						"status"=>"ok",
						"message"=>"current_status is required.",
						);
		echo json_encode($return);
		exit();
	}
	file_get_contents("http://netexch.com/api/auto_entry/set_under_maintenance.php?current_status=$current_status");
	file_get_contents("http://rrexchange247.com/api/auto_entry/set_under_maintenance.php?current_status=$current_status");
	
	$conn->query("update site_under_maintenance set site_status=$current_status");
	$return = array(
				"status"=>"ok",	
				"message"=>"Site Status Change Successfully",
				);
	echo json_encode($return);
	exit();
?>