<?php
   include "../../include/conn.php";
     
   $url_name = $conn->real_escape_string($_POST['tv_url']);
   $eventId = $conn->real_escape_string($_POST['eventId']);
   $sport_name = $conn->real_escape_string($_POST['sport_name']);
   
   
   $check_url = $conn->query("select * from tv_url_master where sport_id='$sport_name' and event_id='$eventId' ");
   $url_row_count = mysqli_num_rows($check_url);
   if($url_row_count > 0){
	   $insert_url = $conn->query("update tv_url_master set url='$url_name'  where sport_id='$sport_name' and event_id='$eventId'");
	    if($insert_url){
		   $return_array = array(
							"status"=>"ok",
							"message"=>"Insert Tv URL Successffully",
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
	    /* $return_array = array(
						"status"=>"error",
						"message"=>"Tv URL already exists",
						);
		echo json_encode($return_array);
		exit(); */
   }
   else{
	   $datetime=date("Y-m-d H:i:s");
	   $insert_url = $conn->query("insert into tv_url_master set url='$url_name',sport_id='$sport_name',event_id='$eventId',datetime='$datetime'");
	   if($insert_url){
		   $return_array = array(
							"status"=>"ok",
							"message"=>"Insert Tv URL Successffully",
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