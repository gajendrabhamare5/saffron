<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	
	$event_id = $_REQUEST['event_id'];
	$market_id = $_REQUEST['market_id'];
	$market_type = $_REQUEST['market_type'];
	$fancy_bet_result = $_REQUEST['fancy_bet_result'];
	$result_profit_loss = $_REQUEST['result_profit_loss'];
	
	$result_status = 1;
	$date_time = date("Y-m-d H:i:s");
	$insert_block = $conn->query("insert into result_block_details (event_id,market_id,market_type,result_amount,result_rate,result_status,date_time) values('$event_id','$market_id','$market_type','$result_profit_loss','$fancy_bet_result','$result_status','$date_time')");
	$insert_id =  $conn->insert_id;
	if($insert_id != 0){
		$return_array = array(
							"status"=>"error",
							"message"=>"Result Block",
							);
	}else{
		$return_array = array(
							"status"=>"error",
							"message"=>"Something went wrong, please try again",
							);
	}
	
	
	echo json_encode($return_array);
?>