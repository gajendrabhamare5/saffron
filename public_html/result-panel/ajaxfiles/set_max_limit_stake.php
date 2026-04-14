<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	
	$max_stake = $_POST['max_stake'];
	$max_tennis_stake = $_POST['max_tennis_stake'];
	$max_soccer_stake = $_POST['max_soccer_stake'];
	$max_casino_stake = $_POST['max_casino_stake'];
	$max_fancy_stake = $_POST['max_fancy_stake'];
	$net_exposure_limit = $_POST['net_exposure_limit'];
	
	$datetime = date("Y-m-d H:i:s");
	$update_stake_limit = $conn->query("
									UPDATE controller_set_max_limit
									SET
									max_stake='$max_stake',
									max_tennis_stake='$max_tennis_stake',
									max_soccer_stake='$max_soccer_stake',
									max_casino_stake='$max_casino_stake',
									max_fancy_stake='$max_fancy_stake',
									net_exposure_limit='$net_exposure_limit',
									datetime='$datetime'
									where 1
									");
									
	if($update_stake_limit){
		$return = array(
					"status"=>"ok",
					"message"=>"Limit updated",
					);
		echo json_encode($return);
		exit();
	}
	else{
		$return = array(
					"status"=>"error",
					"message"=>"Something went wrong, Please try again later",
					
					);
		echo json_encode($return);
		exit();
	}
	
	
	
?>