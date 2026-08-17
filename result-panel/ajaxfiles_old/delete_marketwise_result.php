<?php
	include "../../include/conn.php";
		include "../session.php";
/* 	error_reporting(E_ALL);
	ini_set("display_errors",1);
	ini_set("display_startup_errors",1); */
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	
	error_reporting(0);
	
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	$event_id = $_REQUEST['event_id'];
	$market_id = $_REQUEST['market_id'];

	
	foreach($white_list_data as $white_list_url){
		$url2 = $white_list_url."controller-agent/ajaxfiles/delete_marketwise_result_auto.php?event_id=$event_id&market_id=$market_id";
		$url2 = str_replace(" ","%20",$url2);
		file_get_contents($url2);
	}
	$conn->query("delete from result where eventId='$event_id' and marketId='$market_id'");
	
	$return = array(
					"status"=>"ok",
					"message"=>"Result Deleted Successfully",
					);
	echo json_encode($return);
	exit();
?>