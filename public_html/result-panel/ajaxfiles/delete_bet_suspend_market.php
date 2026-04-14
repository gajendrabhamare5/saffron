<?php
	include "../../include/conn.php"; 
	
	if(isset($_POST['event_id']) && isset($_POST['sport_id']) && isset($_POST['market_type'])){
		$event_id = $_POST['event_id'];
		$sport_id = $_POST['sport_id'];
		$market_type = $_POST['market_type'];
		$conn->query("delete from bet_market_suspend_master where event_id='$event_id' and sport_id='$sport_id' and market_type='$market_type'");
		
		$return = array(
						"status"=>"ok",
						"message"=>"Bet suspend market Deleted Successfully",
						);
		echo json_encode($return);
		exit();
	}
?>