<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
$login_type=$_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

	$login_cookie_data = $_REQUEST['login_cookie_data'];
	
	
		$insert_marquee = $conn->query("insert into login_cookie(login_cookie_data) values('$login_cookie_data')");
		
	if($insert_marquee){
		
		$return = array(
				"status"=>"ok",
				"message"=>"Inserted.",
				);
				
	}else{
		$return = array(
				"status"=>"error",
				"message"=>"Something went wrong, please try again.",
				);
	}
	echo json_encode($return);
	
?>