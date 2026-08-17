<?php
   include "../../include/conn.php"; 
   
	 if(isset($_POST['market_type']) && isset($_POST['eventId']) && isset($_POST['sport_name'])){
   $market_type = $conn->real_escape_string($_POST['market_type']);
   $eventId = $conn->real_escape_string($_POST['eventId']);
   $sport_name = $conn->real_escape_string($_POST['sport_name']);
   
   
		if($eventId == "all"){
			$conn->query("delete from bet_market_suspend_master where sport_id='$sport_name'");
		}
		else
		{
			$conn->query("delete from bet_market_suspend_master where sport_id='$sport_name' and event_id='all'");
		}
	   $datetime=date("Y-m-d H:i:s");
	    $check_url = $conn->query("select * from bet_market_suspend_master where sport_id='$sport_name' and event_id='$eventId' and  market_type='$market_type'");
		$url_row_count = mysqli_num_rows($check_url);
		if($url_row_count  <= 0){
			 $insert_url = $conn->query("insert into bet_market_suspend_master set market_type='$market_type',sport_id='$sport_name',event_id='$eventId',datetime='$datetime'");
			  if($insert_url){
				   $return_array = array(
									"status"=>"ok",
									"message"=>"Bet Suspend Successffully",
									);
					echo json_encode($return_array);
					exit();
			   }
			   else{
					$return_array = array(
									"status"=>"error",
									"message"=>"Something went wrong, please try again later.",
									);
					echo json_encode($return_array);
					exit();
			   }
		}
		else
		{
			$return_array = array(
									"status"=>"ok",
									"message"=>"Bet Suspend Successffully",
									);
					echo json_encode($return_array);
					exit();
		}
   
	}
   
   
?>