<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	
	$searchTerm = $_GET['term'];
	$get_client_name = $conn->query("select * from user_login_master where UserType=1  and Email_ID LIKE '%".$searchTerm."%'");
	
	while($fetch_get_client_name  = mysqli_fetch_assoc($get_client_name)){
		$client_name_array[] = $fetch_get_client_name['Email_ID'];
	}
	echo json_encode($client_name_array);
?>