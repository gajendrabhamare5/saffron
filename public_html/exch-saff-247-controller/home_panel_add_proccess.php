<?php
   include "../include/conn.php";
   include "session.php";
   /* error_reporting(E_ALL);
   ini_set("display_errors",1);
   ini_set("display_startup_errors",1); */
   $user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
   $login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

   $eventId = $conn->real_escape_string($_POST['eventId']);
   $sport_name = $conn->real_escape_string($_POST['sport_name']);
   $marketId = $conn->real_escape_string($_POST['marketId']);
   $eventName = $conn->real_escape_string($_POST['eventName']);

   if(empty($sport_name)){
	   $return_array = array(
						"status"=>"error",
						"message"=>"Please select sport",
						);
		echo json_encode($return_array);
		exit();
   }
   
   if(empty($eventId)){
	   $return_array = array(
						"status"=>"error",
						"message"=>"Please select event",
						);
		echo json_encode($return_array);
		exit();
   }

	   $datetime=date("Y-m-d H:i:s");
       
	   $insert_url = $conn->query("insert into home_custom_event_list set id='',sport_type='$sport_name',market_id='$marketId',event_id='$eventId',event_name='$eventName',date='$datetime'");
	   if($insert_url){
		   $return_array = array(
							"status"=>"ok",
							"message"=>"Inserted Successffully",
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
 
   
?>