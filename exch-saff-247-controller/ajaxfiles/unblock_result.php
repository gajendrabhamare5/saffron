<?php
	include "../../include/conn.php";
	include "../../include/flip_function2.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	
	$event_id = $_REQUEST['event_id'];
	$market_id = $_REQUEST['market_id'];
	
	$conn->query("delete from result_block_details where event_id='$event_id' and market_id='$market_id'");
	
	echo "<script>location.href='../remove_result_block.php?type=0&msg=Unlbock Result'</script>";
?>