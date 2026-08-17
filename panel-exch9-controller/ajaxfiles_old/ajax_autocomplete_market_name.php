<?php

	include "../../include/conn.php";

	include "../session.php";

	$user_id =$_SESSION['DL_LOGIN_ID']; 

	$searchTerm = $_GET['term'];
	$event_name = $_REQUEST['event_name'];
$explode = explode("#",$event_name);
	$event_name = $explode[1];
	$get_event_name = $conn->query("select * from bet_details where market_name LIKE '%".$searchTerm."%' and event_id=$event_name and bet_status =0 GROUP BY market_name");

	while($fetch_get_event_name  = mysqli_fetch_assoc($get_event_name)){

		$client_name_array[] = $fetch_get_event_name['market_name'];

	}

	echo json_encode($client_name_array);

?>