<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =1;
	
	$event_id = $_POST['event_id'];
	$block_event_ids = array();
	$block_market_ids = array();
	$block_parent_event_ids = array();


				
		$get_blocked_event_id = $conn->query("select * from block_event_id where block_by=$user_id");
		while($fetch_block_event = mysqli_fetch_assoc($get_blocked_event_id)){
			$block_event_ids[] = $fetch_block_event['event_id'];
		}
				$get_blocked_market_id = $conn->query("select * from block_market_id where block_by=$user_id");		
				
				while($fetch_market_event = mysqli_fetch_assoc($get_blocked_market_id)){
					$block_market_ids[] = $fetch_market_event['market_id'];		
					}
	
	
	
	
	$return_array = array(
						"status" =>"ok",
						"block_event_ids" =>$block_event_ids,
						"block_market_ids" =>$block_market_ids,
						"block_parent_event_ids" =>$block_parent_event_ids,
						);
	echo json_encode($return_array);
?>