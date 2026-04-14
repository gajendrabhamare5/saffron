<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	
	$event_id = $_REQUEST['event_id'];
	$market_id = $_REQUEST['market_id'];
	
	$search_datewise = "";
	if(isset($_REQUEST['start_time'])){
		$start_time = $_REQUEST['start_time'];
		$end_time = $_REQUEST['end_time'];
		
		if($start_time != "" and $end_time != ""){
			$search_datewise .=" and b.bet_time between '$start_time' and '$end_time'";
		}
	}
	
	
	if($login_type == 5){
		//$get_pnl_report  = $conn->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserID=b.user_id where b.event_id ='$event_id' and market_id=$market_id and bet_status=0 and ulm.parentMDL!=615 $search_datewise order by b.event_id, b.market_type , b.market_id, b.bet_type");
		$get_pnl_report  = $conn->query("select * from bet_details where event_id ='$event_id' and market_id=$market_id and bet_status=0 $search_datewise order by event_id, market_type , market_id, bet_type");
	}else{
		header("Location: ../logout.php");
	}

	$bet_ticker = array();
	while($fetch_get_pnl_report = mysqli_fetch_assoc($get_pnl_report)){
		
		$bet_id = $fetch_get_pnl_report['bet_id'];
		$bet_user_id = $fetch_get_pnl_report['user_id'];
		$event_name = $fetch_get_pnl_report['event_name'];
		$market_name = $fetch_get_pnl_report['market_name'];
		$market_type = $fetch_get_pnl_report['market_type'];
		$bet_type = $fetch_get_pnl_report['bet_type'];
		$bet_stack = $fetch_get_pnl_report['bet_stack'];
		$bet_runs = $fetch_get_pnl_report['bet_runs'];
		$bet_odds = $fetch_get_pnl_report['bet_odds'];
		$bet_margin_used = $fetch_get_pnl_report['bet_margin_used'];
		$bet_time = $fetch_get_pnl_report['bet_time'];
		$bet_result = $fetch_get_pnl_report['bet_result'];
		
		$get_user_data = $conn->query("select * from user_login_master where UserID=$bet_user_id");
		$fetch_get_user_data = mysqli_fetch_assoc($get_user_data);
		$user_name = $fetch_get_user_data['Email_ID'];
		$parentDL = $fetch_get_user_data['parentDL'];
		$parentMDL = $fetch_get_user_data['parentMDL'];
		
		
		$get_dl_data = $conn->query("select * from user_login_master where UserID=$parentDL");
		$fetch_get_dl_data = mysqli_fetch_assoc($get_dl_data);
		$dl_user_name = $fetch_get_dl_data['Email_ID'];
		
		$get_mdl_data = $conn->query("select * from user_login_master where UserID=$parentMDL");
		$fetch_get_mdl_data = mysqli_fetch_assoc($get_mdl_data);
		$mdl_user_name = $fetch_get_mdl_data['Email_ID'];
		
		if($market_type == "MATCH_ODDS"){
			if($bet_type == 'Yes'){
				$win = $bet_odds * $bet_stack;
			}else{
				$win = $bet_stack;
			}
		}else{
			$net_profit = ($bet_stack * $bet_odds) / 100;
			$win = $bet_stack + $net_profit;
		}
		
		if($market_type == "MATCH_ODDS"){
			if($bet_type == 'Yes'){
				$loss = $bet_margin_used;
			}else{
				$loss = $bet_odds * $bet_stack;
			}
		}else{
				$loss = $bet_stack;
		}
		
		
		$bet_ticker[] = array(
						"bet_id"=>$bet_id,
						"user_name"=>$user_name,
						"mdl_name"=>$mdl_user_name,		
						"dl_name"=>$dl_user_name,		
						"event_name"=>$event_name,		
						"market_name"=>$market_name,		
						"type"=>$bet_type,		
						"stake"=>$bet_stack,		
						"margin_used"=>$bet_margin_used,		
						"rate"=>$bet_runs,		
						"odds"=>$bet_odds,		
						"win"=>$win,		
						"loss"=>$loss,		
						"bet_result"=>$bet_result,		
						"date_time"=>$bet_time,		
						"market_type"=>$market_type,		
						);
	}
	
	$return_array = array(
					"status"=>"ok",
					"bet_ticker"=>$bet_ticker,
					);
	echo  json_encode($return_array);
?>