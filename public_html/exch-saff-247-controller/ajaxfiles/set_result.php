<?php
	include "../../include/conn.php";
	include "../../include/flip_function2.php";
	include('../../include/level_percentage.php');
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	$bet_id = $_REQUEST['bet_id'];
	$result_status = $_REQUEST['result_status'];
	
	$deleted_time = date("Y-m-d H:i:s");
		
	$deleted_ip_address = '';
	if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
		$deleted_ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	else{
		$deleted_ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	}
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$page_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$query2 = "INSERT INTO `wrong_bets`(`user_id`, `bet_id`, `status`, `page_name`, `ip_address`, `user_agent`, `added_datetime`) VALUES ($user_id,$bet_id,'$result_status','$page_link','$deleted_ip_address','$user_agent','$deleted_time')";
	$insert_id = $conn->query($query2);
	$return_array = array(
						"status"=>'ok',
						"message"=>'Done!',
						);
	echo json_encode($return_array);
	exit();
?>