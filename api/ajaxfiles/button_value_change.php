<?php
include('../include/conn.php');
include "../session.php";
	$user_id = $_SESSION['CLIENT_LOGIN_ID'];
	$all_button_value = $conn->real_escape_string($_REQUEST['all_button_value']);
	
	
	$update_button = $conn->query("update user_master set button_value='$all_button_value' where Id=$user_id");
	if($update_button){
		$return_array = array(
							"status" =>"ok",
							"message" =>"Button value Changed",
							);
	}else{
		$return_array = array(
							"status" =>"ok",
							"message" =>"Something went wrong,please try again later",
							);
	}
	
	echo json_encode($return_array);
?>