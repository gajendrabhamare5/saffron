<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$searchTerm = $_GET['term'];
	if(isset($_GET['table_type'])){
		$get_event_name = $conn->query("select * from bet_teen_details where event_name LIKE '%".$searchTerm."%' GROUP BY event_name");
	}
	else
	{
		$get_event_name = $conn->query("select * from bet_details where event_name LIKE '%".$searchTerm."%' GROUP BY event_name");
	}
	while($fetch_get_event_name  = mysqli_fetch_assoc($get_event_name)){
		$client_name_array[] = $fetch_get_event_name['event_name'];
	}
	echo json_encode($client_name_array);
?>