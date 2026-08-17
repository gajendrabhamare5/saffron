<?php
	
	include "../../include/conn.php";
	include "../session.php";

	$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

	if ($login_type != 5) {
		header("Location: ../logout.php");
	}
	
	
	$sport_name = $_REQUEST['sport_name'];
	$event_name = $_REQUEST['event_name'];
	$market_name = $_REQUEST['market_name'];
	$yes_run = $_REQUEST['yes_run'];
	$no_run = $_REQUEST['no_run'];
	$start_date_time = $_REQUEST['start_date_time'];
	$end_date_time = $_REQUEST['end_date_time'];
	
	$return_errros = "";
	
	if($sport_name == ""){
		$return_errros = " Please select event type";
	}
	else if($event_name == ""){
		$return_errros = " Please select event name";
	}
	else if($market_name == ""){
		$return_errros = " Please select market name";
	}
	else if($yes_run == ""){
		$return_errros = " Please enter yes run";
	}
	else if($no_run == ""){
		$return_errros = " Please enter no run";
	}
	else if($start_date_time == ""){
		$return_errros = " Please enter start time";
	}
	else if($end_date_time == ""){
		$return_errros = " Please enter end time";
	}
	
	if($return_errros != ""){
		$return_array = array(
								"status"=>"error",
								"message"=>$return_errros
								);
		echo json_encode($return_array);
		exit();
	}
	else{
		
		$ip_address = '';
		if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
			$ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		else{
			$ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		}
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		
		
		$filter_query = "";
		$filter_query .= " AND event_type=$sport_name";
		$filter_query .= " AND event_id=$event_name";
		$filter_query .= " AND market_id=$market_name";
		
		
		$start_date_time = date("Y-m-d H:i:s",strtotime($start_date_time));
		$end_date_time = date("Y-m-d H:i:s",strtotime($end_date_time));
		
		$filter_query .= " AND bet_time >='$start_date_time' and bet_time <='$end_date_time'";
		
		$query = "select * FROM bet_details where 1=1 AND bet_runs=$yes_run AND bet_type='Yes' $filter_query and bet_status IN (0,1)";
		$query1 = "select * FROM bet_details where 1=1 AND bet_runs=$no_run AND bet_type='No' $filter_query  and bet_status IN (0,1)";
		
		
		$all_bet_ids = array();
		$get_all_yes_cancelled_record = $conn->query($query);
		while($fetch_get_all_yes_cancelled_record = mysqli_fetch_assoc($get_all_yes_cancelled_record)){
			$bet_id = $fetch_get_all_yes_cancelled_record['bet_id'];
			$conn->query("update bet_details set bet_status=2 where bet_id=$bet_id and bet_status IN (0,1)");
			$all_bet_ids[] = $bet_id;
		}
		
		$get_all_no_cancelled_record = $conn->query($query1);
		while($fetch_get_all_no_cancelled_record = mysqli_fetch_assoc($get_all_no_cancelled_record)){
			$bet_id = $fetch_get_all_no_cancelled_record['bet_id'];
			$conn->query("update bet_details set bet_status=2 where bet_id=$bet_id and bet_status  IN (0,1) ");
			$all_bet_ids[] = $bet_id;
		}
		
		
			
		$all_bet_ids_text = "1!=1";
		if($all_bet_ids != null){
			$all_bet_ids_text = implode(",",$all_bet_ids);
		}
		$added_datetime = date("Y-m-d H:i:s");
		$insert_log = $conn->query("insert into bet_cancelled_log (bet_id,event_type,event_id,market_id,yes_run,no_run,start_date_time,end_date_time,ip_adderss,user_agent,added_datetime) values('$all_bet_ids_text',$sport_name,$event_name,$market_name,$yes_run,$no_run,'$start_date_time','$end_date_time','$ip_address','$user_agent','$added_datetime')");
		
		
		if($all_bet_ids != null){
			$delete_bet_details  = $conn->query("delete from accounts where bet_id IN ($all_bet_ids_text) and game_type=0 and entry_type IN (4,7)");
			$delete_bet_details  = $conn->query("delete from accounts_temp where bet_id IN ($all_bet_ids_text) and game_type=0 and entry_type IN (4,7)");
		}
		
		$return_array = array(
								"status"=>"ok",
								"message"=>"Cancelled Successfully",
								);
		echo json_encode($return_array);
		exit();
	}
	
?>