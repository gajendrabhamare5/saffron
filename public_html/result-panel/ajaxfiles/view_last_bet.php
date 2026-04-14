<?php
	include "../../include/conn.php";
	
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	
	
	 if($login_type == 5){
		
		
		$search_event_name ="";
		$limit_query = "DESC LIMIT 20";
		$event_name = $_REQUEST['event_name'];
		$oddsmarketId = $_REQUEST['oddsmarketId'];
		if($event_name != ""){
			$search_event_name .=" and event_id='$event_name'";
			$limit_query = "DESC";
		}
		/* if(!empty($oddsmarketId)){
			$search_event_name .=" and oddsmarketId='$oddsmarketId'";
			$limit_query = "DESC";
		} */
		
		$current_date =  date('Y-m-d H:i:s', strtotime('-2 day', strtotime(date("Y-m-d H:i:s"))));
		
		/* $get_pnl_report  = $conn->query("select * from bet_details where 1=1  $search_event_name and bet_time>='$current_date' and bet_status=0 and market_type  IN ('FANCY_ODDS') GROUP BY event_id,market_id ORDER BY bet_result_time $limit_query");
		 */
		/* $get_pnl_report  = $conn->query("select * from bet_details where 1=1  $search_event_name and bet_time>='$current_date' and bet_status=0 and market_type  NOT IN ('MATCH_ODDS','BOOKMAKER_ODDS','BOOKMAKERSMALL_ODDS') GROUP BY event_id,market_id ORDER BY bet_result_time $limit_query"); */
		$get_pnl_report  = $conn->query("select *,SUM(bet_result) as total_pnl from bet_details where 1=1  $search_event_name and bet_time>='$current_date' and bet_status=0 and market_type  NOT IN ('MATCH_ODDS','BOOKMAKER_ODDS','BOOKMAKERSMALL_ODDS') GROUP BY event_id,market_id ORDER BY bet_result_time $limit_query");
		
	
	}else{
		header("Location: ../logout.php");
	}
	
	$bet_ticker = array();
	while($fetch_get_pnl_report = mysqli_fetch_assoc($get_pnl_report)){
		
		$eventId = $fetch_get_pnl_report['event_id'];
		$marketId = $fetch_get_pnl_report['market_id'];
		$event_name = $fetch_get_pnl_report['event_name'];
		$market_name = $fetch_get_pnl_report['market_name'];
		$market_type = $fetch_get_pnl_report['market_type'];
		$oddsmarketId = $fetch_get_pnl_report['oddsmarketId'];
		$total_pnl = $fetch_get_pnl_report['total_pnl'];
		
		/* $get_event_data = $conn->query("select * from bet_details where event_id=$eventId and market_id=$marketId");
		$fetch_get_event_data = mysqli_fetch_assoc($get_event_data);
		$event_name = $fetch_get_event_data['event_name'];
		$market_name = $fetch_get_event_data['market_name']; */
		
		$bet_result_time = $fetch_get_pnl_report['bet_result_time'];
		$runs = $fetch_get_pnl_report['bet_run_result'];
		$date_time = $fetch_get_pnl_report['bet_time'];
		
		
	if($event_name == null){
		continue;
	}
	
		
		/* $total_pnl = 0;
		$get_sum_total = $conn->query("select SUM(bet_result) as total_pnl from bet_details where event_id=$eventId and market_id=$marketId");
		$fetch_get_sum_total = mysqli_fetch_assoc($get_sum_total);
		$total_pnl = $fetch_get_sum_total['total_pnl']; */
		if(empty($total_pnl)){
			$total_pnl = 0;
		}
		
		$bet_ticker[] = array(
						"event_name"=>$event_name,		
						"market_name"=>$market_name,	
						"result_runs"=>$runs,			
						"total_pnl"=>$total_pnl,			
						"result_date_time"=>$bet_result_time,			
						"eventId"=>$eventId,			
						"oddsmarketId"=>$oddsmarketId,			
						"marketId"=>$marketId,			
						"market_type"=>$market_type,			
						);
	}
	
	
	
	$market_name_data1 = array_map("unserialize", array_unique(array_map("serialize", $bet_ticker)));
	$bet_ticker = array();
	foreach($market_name_data1 as $market_name_data111){
		$bet_ticker[] = array(
								"event_name"=>$market_name_data111['event_name'] ."(".$market_name_data111['market_type'].")",
								"market_name"=>$market_name_data111['market_name'],
								"result_runs"=>$market_name_data111['result_runs'],
								"result_market_type"=>$market_name_data111['market_type'],
								"total_pnl"=>$market_name_data111['total_pnl'],
								"result_date_time"=>$market_name_data111['result_date_time'],
								"eventId"=>$market_name_data111['eventId'],
								"marketId"=>$market_name_data111['marketId'],
								"oddsmarketId"=>$market_name_data111['oddsmarketId'],
								);
	}
	
	function date_compare($a, $b)
{
    $t1 = strtotime($a['result_date_time']);
    $t2 = strtotime($b['result_date_time']);
    return $t2 - $t1;
}    
usort($bet_ticker, 'date_compare');
	
	$return_array = array(
					"status"=>"ok",
					"bet_ticker"=>$bet_ticker,
					);
	echo  json_encode($return_array);
?>