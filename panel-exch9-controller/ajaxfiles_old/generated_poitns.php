<?php
	include "../../include/conn.php";
	include "../session.php";
		$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 	
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];	
	
	$generated_poitns = $_REQUEST['generated_poitns'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	$transaction_time = date('Y-m-d H:i:s');	$entry_transaction_time = date("d-m-Y H:i:s");
	$account_description = "#Generated Points - $generated_poitns at $entry_transaction_time";
	$insert_deposit_entry = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$user_id','0','$account_description','0','$generated_poitns','Credit','5','$transaction_time','1')");
	$insert_deposit_id = $conn->insert_id;
	if($insert_deposit_id != 0 ){
			$return_array = array(
								"status"=>"ok",
								"message"=>"Points Generated."
								);
			echo json_encode($return_array);
			exit();
		}else{
			$return_array = array(
								"status"=>"error",
								"message"=>"Something went wrong, please try again."
								);
			echo json_encode($return_array);
			exit();
		}
?>