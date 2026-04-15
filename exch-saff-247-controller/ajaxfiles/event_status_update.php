<?php
   include "../../include/conn.php";
   include "../session.php";
   $user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
   $login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

   error_reporting(E_ALL);
   ini_set("display_errors",1);
   ini_set("display_startup_errors",1);

   if($login_type != 5){
   		header("Location: ../logout.php");
   }
   
   $event_id = $conn->real_escape_string($_POST['event_id']);
   
   
   $responce = event_update_another_site();
   
   $returnArr = array('status' => 'error','msg' => 'something wrong.');
   
   //if($responce['status'] == 'ok'){
   
	   $sel = $conn->query("select * from event_market_limit WHERE event_id=".$event_id);
   
	   $totalRecords = mysqli_num_rows($sel);
	   
	   if($totalRecords > 0){
			$conn->query("UPDATE event_market_limit SET `status`=1 WHERE event_id = $event_id AND status=0;");
			$returnArr = array('status' => 'ok','msg' => 'successfully event updated.');
	   }
   //}
   
   echo json_encode($returnArr);
   
   
   function event_update_another_site(){
   
	   // where are we posting to?
		$url = 'http://diamondexchpro.org/controller-agent/ajaxfiles/event_status_update.php';

		// what post fields?
		$fields = $_REQUEST;

		// build the urlencoded data
		$postvars = http_build_query($fields);

		// open connection
		$ch = curl_init();

		// set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, count($fields));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// execute post
		$result = json_decode(curl_exec($ch),true);

		// close connection
		curl_close($ch);
		
		return $result;
   } 
   ?>