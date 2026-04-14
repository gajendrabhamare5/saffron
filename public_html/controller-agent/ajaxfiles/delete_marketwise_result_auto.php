<?php
	include "../../include/conn.php";
	
	$user_id =1; 
	$login_type =5;
	
	error_reporting(0);
	
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	$event_id = $_REQUEST['event_id'];
	$market_id = $_REQUEST['market_id'];
	
	$conn->query("delete from result where eventId='$event_id' and marketId='$market_id'");
	
	$return = array(
					"status"=>"ok",
					"message"=>"Result Deleted Successfully",
					);
	echo json_encode($return);
	exit();
?>