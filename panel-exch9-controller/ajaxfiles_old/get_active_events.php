<?php
   include "../../include/conn.php";
   include "../session.php";
   $user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
   $login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

   if($login_type != 5){
   		header("Location: ../logout.php");
   }
   
   $event_id = $conn->real_escape_string($_POST['event_id']);
   
   $where = '';
   if($event_id != '' && !empty($event_id)){
   		$where = ' AND event_id='.$event_id;
   }
   
   $sel = $conn->query("select * from event_market_limit WHERE status = 0 $where ORDER BY matchdate ASC");
   
   $totalRecords = mysqli_num_rows($sel);
   
   $data = array();
   while ($user_data = mysqli_fetch_assoc($sel)) {
   
   $sport_id = $user_data['sport_id'];
   $oddsmarketId = $user_data['oddsmarketId'];
   $event_id = $user_data['event_id'];
   $event_name = $user_data['event_name'];
   $match_max = $user_data['match_max'];
   $bookmaker_max = $user_data['bookmaker_max'];
   $matchdate = $user_data['matchdate'];
   $net_exposure_limit = $user_data['net_exposure_limit'];
   
   	$data[] = array( 
   		"sport_id"	=>	$sport_id,
   		"oddsmarketId"	=>	$oddsmarketId,
   		"event_id"	=>	$event_id,
   	  	"event_name"	=>	$event_name,
   	  	"match_max" => $match_max,
   	  	"bookmaker_max" => $bookmaker_max,
   	  	"net_exposure_limit" => $net_exposure_limit,
   	  	"matchdate" => $matchdate,
   	  );
   }
   
   echo json_encode($data);
   ?>