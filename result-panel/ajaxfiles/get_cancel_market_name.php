<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	
	 
	$market_name_data=array();
	if($login_type == 5){	
		$event_id = $_REQUEST['event_id'];
		$sport_id = $_REQUEST['sport_id'];
		$oddsmarketId = $_REQUEST['oddsmarketId'];
		$get_active_market_name = $conn->query("select  * from bet_details where bet_status IN (2) and event_id=$event_id and event_type='$sport_id' and oddsmarketId='$oddsmarketId' GROUP BY event_id,market_id,market_type");
		while($fetch_get_active_market_name = mysqli_fetch_assoc($get_active_market_name)){
			$market_id = $fetch_get_active_market_name['market_id'];
			$market_type = $fetch_get_active_market_name['market_type'];
			$market_name = $fetch_get_active_market_name['market_name'];
			
			$market_name_data[] = array(
									"market_id"=>$market_id,
									"market_type"=>$market_type,
									"market_name"=>$market_name,
									);
		}
		$return_array = array(
							"status"=>"ok",
							"market_name_data"=>$market_name_data
							);
		echo json_encode($return_array);
	}else{
		header("Location: ../logout.php");
	}
?>