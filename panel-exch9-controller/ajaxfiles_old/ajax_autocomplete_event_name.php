<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['DL_LOGIN_ID']; 
	$searchTerm = $_GET['term'];
	$get_event_name = $conn->query("select * from bet_details where event_name LIKE '%".$searchTerm."%' GROUP BY event_id  ORDER BY bet_time DESC");
	while($fetch_get_event_name  = mysqli_fetch_assoc($get_event_name)){
		$client_name_array[] = $fetch_get_event_name['event_name']." (".date("d-m-Y",strtotime($fetch_get_event_name['bet_time'])).") "." #".$fetch_get_event_name['event_id'];
	}
	echo json_encode($client_name_array);
?>