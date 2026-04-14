<?php
   include "../include/conn.php";
   include "session.php";
   $eventId = $conn->real_escape_string($_POST['eventId']);
   $delay_value = $conn->real_escape_string($_POST['delay_value']);
   
   
   $check_url = $conn->query("select * from event_delay_master where  event_id='$eventId' ");
   $url_row_count = mysqli_num_rows($check_url);
   if($url_row_count > 0){
        $return_array = array(
                        "status"=>"error",
                        "message"=>"event already added",
                        );
        echo json_encode($return_array);
        exit();
   }
   else{
	   $datetime=date("Y-m-d H:i:s");
	   $insert_url = $conn->query("insert into event_delay_master set event_id='$eventId',datetime='$datetime'");
	   if($insert_url){
		   $return_array = array(
							"status"=>"ok",
							"message"=>"Insert event delay Successffully",
							);
			echo json_encode($return_array);
			/* exit(); */
	   }
	   else{
			$return_array = array(
							"status"=>"error",
							"message"=>"Something went wrong, please try again later.",
							);
			echo json_encode($return_array);
			/* exit(); */
	   }
   }
   
   
?>