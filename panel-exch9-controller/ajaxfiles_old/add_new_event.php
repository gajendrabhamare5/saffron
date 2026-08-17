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
   
   $sport_id = $conn->real_escape_string($_POST['sport_id']);
   $event_id = $conn->real_escape_string($_POST['event_id']);
   $market_id = $conn->real_escape_string($_POST['market_id']);
   $event_name = $conn->real_escape_string($_POST['event_name']);
   $match_date = $conn->real_escape_string($_POST['match_date']);
   $match_date = date('Y-m-d H:i:s',(($match_date)?$match_date:time()));
   $match_max = $conn->real_escape_string($_POST['match_max']);
   $bookmaker_max = $conn->real_escape_string($_POST['bookmaker_max']);
   $net_exposure_limit = $conn->real_escape_string($_POST['net_exposure_limit']);
   
   $sel = $conn->query("select * from event_market_limit WHERE event_id=".$event_id);
   
   $totalRecords = mysqli_num_rows($sel);
   
   $returnArr = array('status' => 'error','msg' => 'something wrong.');
   
   $responce['status'] = 'ok';
   if($sport_id == 4){
   		/* $responce = event_update_another_site(); */
   }
   if($responce['status'] == 'ok'){
	   if($totalRecords > 0){
			$conn->query("UPDATE event_market_limit SET `sport_id`='$sport_id', `event_name`='$event_name',`oddsmarketId`='$market_id',`match_max`='$match_max',`bookmaker_max`='$bookmaker_max',`matchdate` = '$match_date',`status`=0 WHERE event_id = $event_id;");
			$returnArr = array('status' => 'ok','msg' => 'successfully event updated.');
	   }
	   else{
		   
			$conn->query("INSERT INTO event_market_limit (`event_id`,`sport_id`,`event_name`,`oddsmarketId`,`match_max`,`bookmaker_max`,`matchdate`) VALUES('$event_id','$sport_id','$event_name','$market_id','$match_max','$bookmaker_max','$match_date')");
			$returnArr = array('status' => 'ok','msg' => 'successfully event added.');
	   }
   }

   echo json_encode($returnArr);
   ?>