<?php

	include "../../include/conn.php";

	include "../session.php";

	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 

	$searchTerm = $_GET['term'];
	$event_name2 = $_GET['event_name'];

	$event_name2 = str_replace("+"," ",$event_name2);
	$get_event_name = $conn->query("select * from bet_details where market_name LIKE '%".$searchTerm."%' and event_name='$event_name2' GROUP BY market_name");

	while($fetch_get_event_name  = mysqli_fetch_assoc($get_event_name)){

		$client_name_array[] = $fetch_get_event_name['market_name'];

	}

	echo json_encode($client_name_array);

?>