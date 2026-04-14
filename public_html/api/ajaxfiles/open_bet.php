	<?php
include('../include/conn.php');
include "../session.php";
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
$eventType = $conn->real_escape_string($_REQUEST['eventType']);

if($eventType == "All" or $eventType == ""){		
	$event_type_selection = "";	
}else{		
	$event_type_selection = "and event_type='$eventType'";	
}

	$event_id_filter = "";
	if(isset($_REQUEST['eventId'])){
		$eventId = $_REQUEST['eventId'];
		$event_id_filter = " and event_id = $eventId";
	}
	if(isset($_REQUEST['markettype'])){
		$markettype = $conn->real_escape_string($_REQUEST['markettype']);
		if($markettype == 1){
			$get_all_open_bet_data = $conn->query("SELECT * FROM bet_details where user_id=$user_id and bet_status=1 $event_type_selection $event_id_filter order by bet_time desc");
			
			while($fetch_open_bet_data = mysqli_fetch_assoc($get_all_open_bet_data)){
				$open_bet_data [] = $fetch_open_bet_data;
			}
		}
	}
	
	$teen_query = "";
	if(isset($_REQUEST['markettype'])){
		$markettype = $conn->real_escape_string($_REQUEST['markettype']);
		if($markettype != 1){
			$teen_query = " and event_type='$markettype'";
			
			$get_all_open_bet_data2 = $conn->query("SELECT * FROM bet_teen_details where 1=1 $teen_query and user_id=$user_id and bet_status=1 $event_type_selection order by bet_time desc");
	
			while($fetch_open_bet_data2 = mysqli_fetch_assoc($get_all_open_bet_data2)){
				$open_bet_data [] = $fetch_open_bet_data2;
			}
		}
	}
	
	if(isset($_REQUEST['unsetteled'])){
		$get_all_open_bet_data = $conn->query("SELECT * FROM bet_details where user_id=$user_id and bet_status=1 order by bet_time desc");
			
		while($fetch_open_bet_data = mysqli_fetch_assoc($get_all_open_bet_data)){
			$open_bet_data [] = $fetch_open_bet_data;
		}
		$get_all_open_bet_data2 = $conn->query("SELECT * FROM bet_teen_details where 1=1 $teen_query and user_id=$user_id and bet_status=1 order by bet_time desc");
	
		while($fetch_open_bet_data2 = mysqli_fetch_assoc($get_all_open_bet_data2)){
			$open_bet_data [] = $fetch_open_bet_data2;
		}
		
	}
	
	
	
	if($open_bet_data != null){
		$return_array = array(
					"status" =>'ok',
					"message"=>"",
					"open_bet_data"=>$open_bet_data,
					);
					
	}else{
		$return_array = array(
						"status" =>'ok',
						"message"=>"No active bet available.",
						);
	}
	echo json_encode($return_array);
?>