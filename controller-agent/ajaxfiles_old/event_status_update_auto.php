<?php
   include "../../include/conn.php";

   
   $user_id =1; 
   $login_type = 5;

   error_reporting(E_ALL);
   ini_set("display_errors",1);
   ini_set("display_startup_errors",1);

   if($login_type != 5){
   		header("Location: ../logout.php");
   }
   
   $event_id = $conn->real_escape_string($_REQUEST['event_id']);
   
   
   $returnArr = array('status' => 'error','msg' => 'something wrong.');
   
   //if($responce['status'] == 'ok'){
   
	   $sel = $conn->query("select * from event_market_limit WHERE event_id=".$event_id);
   
	   $totalRecords = mysqli_num_rows($sel);
	   
	   if($totalRecords > 0){
			$conn->query("UPDATE event_market_limit SET `status`=1 WHERE event_id = $event_id AND status=0");
			$returnArr = array('status' => 'ok','msg' => 'successfully event updated.');
	   }
   //}
   
   echo json_encode($returnArr);
   
   
   
   ?>