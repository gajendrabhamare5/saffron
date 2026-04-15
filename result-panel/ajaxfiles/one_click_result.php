<?php
	include "../../include/conn.php";
	include "../session.php";
	error_reporting(E_ALL);
	ini_set("display_errors",1);
	ini_set("display_startup_errors",1);
	
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	
	$check_result = 1;
	$check_result = file_get_contents("http://178.128.208.88/result.php");
	if($check_result ==0){
		$return_array = array(
							"status"=>"ok",
							"message"=>"One Click Result Done",
							);
		echo json_encode($return_array);
	}else{
		$return_array = array(
							"status"=>"error",
							"message"=>"Something went wrong, please try again later.",
							);
		echo json_encode($return_array);
	}
?>