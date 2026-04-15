<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =1; 
	$sport_block = $_POST['sport_block'];
	$event_block = $_POST['event_block'];
	$market_block = $_POST['market_block'];
	
	$conn->query("delete from block_sport where block_by=$user_id");
	$conn->query("delete from block_event_id where block_by=$user_id");
	$conn->query("delete from block_market_id where block_by=$user_id");
	
	if($sport_block != ''){
		foreach($sport_block as $sport_id){
			$conn->query("insert into block_sport(event_type,block_by) VALUES ($sport_id,$user_id)");
		}
	}
	
	if($event_block != ''){
		foreach($event_block as $event_id){
			$conn->query("insert into block_event_id(event_id,block_by) VALUES ($event_id,$user_id)");
		}
	}
	
	
		
	if($market_block != ''){
		foreach($market_block as $market_id){
			$conn->query("insert into block_market_id(market_id,block_by) VALUES ($market_id,$user_id)");
		}
	}
	
	
	$get_all_smdl = $conn->query("select * from user_login_master where UserType=4");
	$all_smdl  = array();
	
	while($fetch_get_all_smdl = mysqli_fetch_assoc($get_all_smdl)){
		$all_smdl[] = $fetch_get_all_smdl['UserID'];
	}
	
	
	foreach($all_smdl as $smdl_id){
		$conn->query("delete from block_sport where block_by=$smdl_id");
		$conn->query("delete from block_event_id where block_by=$smdl_id");
		$conn->query("delete from block_market_id where block_by=$smdl_id");
		
		if($sport_block != ''){
			foreach($sport_block as $sport_id){
				$conn->query("insert into block_sport(event_type,block_by) VALUES ($sport_id,$smdl_id)");
			}
		}
		
		if($event_block != ''){
			foreach($event_block as $event_id){
				$conn->query("insert into block_event_id(event_id,block_by) VALUES ($event_id,$smdl_id)");
			}
		}
		
		
			
		if($market_block != ''){
			foreach($market_block as $market_id){
				$conn->query("insert into block_market_id(market_id,block_by) VALUES ($market_id,$smdl_id)");
			}
		}
	}
	
	
	$return_array = array(
						"status"=>"ok",
						"message"=>"Change Market Block Setting",
	);
	
	echo json_encode($return_array);
?>