<?php
include('../include/conn.php');
include "session.php";

	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$controller_controller_type = 	$_SESSION['CONTROLLER_CONTROLLER_TYPE'];
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	if($login_type != 5){
		header("Location: ../logout.php");
	}

	$id = $_GET["id"];
	
	$conn->query("delete from slider_details where id=$id");
	
	$_SESSION['SLIDER_MSG'] = "delete";
	echo "<script>location.href='slider.php'</script>";
	
	
	?>