<?php
include('../include/conn.php');
include "../session.php";
$user_id = $_SESSION['CLIENT_LOGIN_ID'];

	$bet_status = $conn->real_escape_string($_REQUEST['betStatus']);
	$start_date = $conn->real_escape_string($_REQUEST['startDate']);
	$end_date = $conn->real_escape_string($_REQUEST['endDate']);
	$eventType = $conn->real_escape_string($_REQUEST['eventType']);
	$min_date = date("Y-m-d",strtotime('-90 Days'));
	if($start_date == ""){
		$return_array = array(
						"status" =>'ok',
						"message"=>"Please select start date.",
						);
		echo json_encode($return_array);
		exit();
	}
	
	if($end_date == ""){
		$return_array = array(
						"status" =>'ok',
						"message"=>"Please select end date.",
						);
		echo json_encode($return_array);
		exit();
	}
	if($min_date >= $start_date){
		$return_array = array(
						"status" =>'ok',
						"message"=>"You can not view before 90 days profit/loss report.",
						);
		echo json_encode($return_array);
		exit();
	}
	
	if($eventType == "All" or $eventType == ""){
		$event_type_selection = "";
	}else{
		$event_type_selection = "and event_type=$eventType";
	}
	
	$get_all_bet_profit_loss = $conn->query("SELECT SUM(`bet_result`) as sum_profit_loss,DATE(`bet_time`) as bet_onlydate,event_name,event_type FROM bet_details where user_id=$user_id and DATE(bet_time) >= '$start_date' and DATE(bet_time) <= '$end_date' and bet_status=0 $event_type_selection GROUP BY event_id order by bet_time desc");
	
	
	$num_rows = $get_all_bet_profit_loss->num_rows;
	
	$get_all_bet_profit_loss_teenpatti = $conn->query("SELECT SUM(`bet_result`) as sum_profit_loss,DATE(`bet_time`) as bet_onlydate,event_name,event_type FROM bet_teen_details where user_id=$user_id and DATE(bet_time) >= '$start_date' and DATE(bet_time) <= '$end_date' and bet_status=0 GROUP BY event_type order by bet_time desc");
	$num_rows_teen = $get_all_bet_profit_loss_teenpatti->num_rows;
	
	if($num_rows != 0 or $num_rows_teen != 0 ){
		while($fetch_bet_profit_loss = mysqli_fetch_assoc($get_all_bet_profit_loss)){
			$bet_profit_loss [] = $fetch_bet_profit_loss;
		}
		
		
		while($fetch_bet_profit_loss_teenpatti = mysqli_fetch_assoc($get_all_bet_profit_loss_teenpatti)){
			$sum_profit_loss =  $fetch_bet_profit_loss_teenpatti['sum_profit_loss'];
			$bet_onlydate = $fetch_bet_profit_loss_teenpatti['bet_onlydate'];
			$event_name =  $fetch_bet_profit_loss_teenpatti['event_name'];
			$event_type =  $fetch_bet_profit_loss_teenpatti['event_type'];
			
			$get_event_data = $conn->query("select * from event_name_code where event_name='$event_type'");
			$fetch_get_event_data = mysqli_fetch_assoc($get_event_data);
			if($fetch_get_event_data != null){
				$event_name = $fetch_get_event_data['diamond_code'];
				$event_type = $fetch_get_event_data['diamond_code'];
			}
			$temp_array = array(
								"sum_profit_loss"=>$sum_profit_loss,
								"bet_onlydate"=>$bet_onlydate,
								"event_name"=>$event_name,
								"event_type"=>$event_type,
								);
			$bet_profit_loss [] = $temp_array;
		}
		$return_array = array(
						"status" =>'ok',
						"bet_profit_loss"=>$bet_profit_loss,
						);
	}else{
		$return_array = array(
						"status" =>'ok',
						"message"=>"No  profit/loss report places during this time period.",
						);
	}
	

	echo json_encode($return_array);

?>