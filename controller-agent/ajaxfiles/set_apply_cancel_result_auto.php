<?php
	
	include "../../include/conn.php";
	

	$user_id = 1;
	$login_type = 5;

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
	else if(($yes_run == "" or $no_run == "") and ($start_date_time == "" or $end_date_time ==  "")){
		$return_errros = " Please enter value any one from Odds OR Start & End Date Time";
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
		
		
		
		if($start_date_time != ""){
			$start_date_time = date("Y-m-d H:i:s",strtotime($start_date_time));
			$filter_query .= " AND bet_time >='$start_date_time'";
		}
		
		if($end_date_time != ""){
			$end_date_time = date("Y-m-d H:i:s",strtotime($end_date_time));
			$filter_query .= " AND bet_time <='$end_date_time'";
		}
		
		
		
		
		
		$filter_query_yes = "";
		if($yes_run != ""){
			$filter_query_yes .= " AND bet_runs=$yes_run AND bet_type='Yes' ";
		}
		
		$filter_query_no = "";
		if($no_run != ""){
			$filter_query_no .= " AND bet_runs=$no_run AND bet_type='No' ";
		}
		
		
		$query = "select * FROM bet_details where 1=1 $filter_query_yes $filter_query and bet_status IN (0,1)";
		$query1 = "select * FROM bet_details where 1=1 $filter_query_no $filter_query  and bet_status IN (0,1)";
		
		
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
	if($yes_run == ""){
			$yes_run = 0;
		}
		if($no_run == ""){
			$no_run = 0;
		}
		$insert_log = $conn->query("insert into bet_cancelled_log (bet_id,event_type,event_id,market_id,yes_run,no_run,start_date_time,end_date_time,ip_adderss,user_agent,added_datetime) values('$all_bet_ids_text',$sport_name,$event_name,$market_name,$yes_run,$no_run,'$start_date_time','$end_date_time','$ip_address','$user_agent','$added_datetime')");
		
		if($all_bet_ids != null){
			$delete_bet_details  = $conn->query("delete from accounts where bet_id IN ($all_bet_ids_text) and game_type=0  and entry_type IN (4,7)");
			$delete_bet_details  = $conn->query("delete from accounts_temp where bet_id IN ($all_bet_ids_text) and game_type=0  and entry_type IN (4,7)");
		}
		
		$return_array = array(
								"status"=>"ok",
								"message"=>"Cancelled Successfully",
								);
		echo json_encode($return_array);
		exit();
	}
	
?>