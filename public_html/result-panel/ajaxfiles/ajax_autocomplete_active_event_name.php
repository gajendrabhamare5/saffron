<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$searchTerm = $_GET['term'];
	$get_event_name = $conn->query("select * from bet_details where event_name LIKE '%".$searchTerm."%' and bet_status =1 GROUP BY event_name");
	while($fetch_get_event_name  = mysqli_fetch_assoc($get_event_name)){
		$client_name_array[] = $fetch_get_event_name['event_name'];
	}
	echo json_encode($client_name_array);
?>