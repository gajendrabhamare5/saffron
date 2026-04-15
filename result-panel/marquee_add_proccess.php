<?php
   include "../include/conn.php";
   include "session.php";
   $marquee = $conn->real_escape_string($_POST['marquee']);

   $check_url = $conn->query("select * from marquee_master");
   $url_row_count = mysqli_num_rows($check_url);
   if($url_row_count > 0){
	  
	   $insert_url = $conn->query("update marquee_master set marquee='$marquee'");
	    if($insert_url){
		   $return_array = array(
							"status"=>"ok",
							"message"=>"Insert Marquee Successffully",
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
	    /* $return_array = array(
						"status"=>"error",
						"message"=>"Tv URL already exists",
						);
		echo json_encode($return_array);
		exit(); */
   }
   else{
	   $datetime=date("Y-m-d H:i:s");
	   $insert_url = $conn->query("insert into marquee_master set marquee='$marquee',datetime='$datetime'");
	   if($insert_url){
		   $return_array = array(
							"status"=>"ok",
							"message"=>"Insert Marquee Successffully",
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
   
   
?>