<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	
	
	 if($login_type == 5){
		$smdl_name = $_REQUEST['smdl_name'];
		if($smdl_name != ""){
			$get_smdl_id = $conn->query("select * from user_login_master where Email_ID='$smdl_name'");
			$fetch_smdl_id = mysqli_fetch_assoc($get_smdl_id);
			$smdl_id = $fetch_smdl_id['UserID'];
			
			$get_client_id = $conn->query("select * from user_login_master where parentSuperMDL='$smdl_id'");
			$my_user_ids = array();
			while($fetch_donwline = mysqli_fetch_assoc($get_client_id)){
				$my_user_ids[] = $fetch_donwline['UserID'];
			}
			if($my_user_ids != null){
				$search_smdl_name = " and b.user_id IN (".implode(',',$my_user_ids).")";
			}else{
				$search_smdl_name = "1!=1";
			}
		}else{
			$search_smdl_name = "";
		}
		
		$mdl_name = $_REQUEST['mdl_name'];
		if($mdl_name != ""){
			$get_mdl_id = $conn->query("select * from user_login_master where Email_ID='$mdl_name'");
			$fetch_mdl_id = mysqli_fetch_assoc($get_mdl_id);
			$mdl_id = $fetch_mdl_id['UserID'];
			
			$get_client_id = $conn->query("select * from user_login_master where parentMDL='$mdl_id'");
			$my_user_ids = array();
			while($fetch_donwline = mysqli_fetch_assoc($get_client_id)){
				$my_user_ids[] = $fetch_donwline['UserID'];
			}
			if($my_user_ids != null){
				$search_mdl_name = " and b.user_id IN (".implode(',',$my_user_ids).")";
			}else{
				$search_mdl_name = "1!=1";
			}
		}else{
			$search_mdl_name = "";
		}

		$dl_name = $_REQUEST['dl_name'];
		if($dl_name != ""){
			$get_dl_id = $conn->query("select * from user_login_master where Email_ID='$dl_name'");
			$fetch_dl_id = mysqli_fetch_assoc($get_dl_id);
			$dl_id = $fetch_dl_id['UserID'];
			$get_client_id = $conn->query("select * from user_login_master where parentDL='$dl_id'");
			$my_user_ids = array();
			while($fetch_donwline = mysqli_fetch_assoc($get_client_id)){
				$my_user_ids[] = $fetch_donwline['UserID'];
			}
			if($my_user_ids != null){
				$search_dl_name = " and b.user_id IN (".implode(',',$my_user_ids).")";
			}else{
				$search_dl_name = "1!=1";
			}			
		}else{
			$search_dl_name ="";
		}
		
		$client_name = $_REQUEST['client_name'];
		if($client_name != ""){
			$get_client_id = $conn->query("select * from user_login_master where Email_ID='$client_name'");
			$fetch_client_id = mysqli_fetch_assoc($get_client_id);
			$client_id = $fetch_client_id['UserID'];
			$search_client_name=" and b.user_id=$client_id";
			
		}else{
			$search_client_name ="";
		}
		
		$market_name = $_REQUEST['market_name'];
		if($market_name != ""){
			$search_market_name =" and b.market_name='$market_name'";
		}else{
			$search_market_name ="";
		}
		
		$event_name = $_REQUEST['event_name'];
		if($event_name != ""){
			$search_event_name =" and b.event_name='$event_name'";
		}else{
			$search_event_name ="";
		}
		
		
		$get_pnl_report_casino  = $conn->query("select * from bet_teen_details as b left outer join  user_login_master as ulm on ulm.UserID=b.user_id where b.bet_status =1 $search_smdl_name $search_mdl_name $search_dl_name $search_client_name $search_market_name $search_event_name and ulm.parentMDL != 615 ORDER BY b.event_id,b.market_name,b.bet_type");
		
		
		
	}else{
		header("Location: ../logout.php");
	}
	
	$bet_ticker = array();
	
	while($fetch_get_pnl_report_casino = mysqli_fetch_assoc($get_pnl_report_casino)){
		
		$bet_id = $fetch_get_pnl_report_casino['bet_id'];
		$bet_user_id = $fetch_get_pnl_report_casino['user_id'];
		$event_id = $fetch_get_pnl_report_casino['event_id'];
		$event_name = $fetch_get_pnl_report_casino['event_name'];
		$market_name = $fetch_get_pnl_report_casino['market_name'];
		$market_type = $fetch_get_pnl_report_casino['market_type'];
		$bet_type = $fetch_get_pnl_report_casino['bet_type'];
		$bet_stack = $fetch_get_pnl_report_casino['bet_stack'];
		$bet_runs = $fetch_get_pnl_report_casino['bet_runs'];
		$bet_odds = $fetch_get_pnl_report_casino['bet_odds'];
		$bet_margin_used = $fetch_get_pnl_report_casino['bet_margin_used'];
		$bet_time = $fetch_get_pnl_report_casino['bet_time'];
		$bet_ip_address = $fetch_get_pnl_report_casino['bet_ip_address'];
		$bet_user_agent = $fetch_get_pnl_report_casino['bet_user_agent'];
		
		$get_user_data = $conn->query("select * from user_login_master where UserID=$bet_user_id");
		$fetch_get_user_data = mysqli_fetch_assoc($get_user_data);
		$user_name = $fetch_get_user_data['Email_ID'];
		$parentDL = $fetch_get_user_data['parentDL'];
		$parentMDL = $fetch_get_user_data['parentMDL'];
		$parentSMDL = $fetch_get_user_data['parentSuperMDL'];
		
		
		$get_dl_data = $conn->query("select * from user_login_master where UserID=$parentDL");
		$fetch_get_dl_data = mysqli_fetch_assoc($get_dl_data);
		$dl_user_name = $fetch_get_dl_data['Email_ID'];
		
		$get_mdl_data = $conn->query("select * from user_login_master where UserID=$parentMDL");
		$fetch_get_mdl_data = mysqli_fetch_assoc($get_mdl_data);
		$mdl_user_name = $fetch_get_mdl_data['Email_ID'];
		
		$get_smdl_data = $conn->query("select * from user_login_master where UserID=$parentSMDL");
		$fetch_get_smdl_data = mysqli_fetch_assoc($get_smdl_data);
		$smdl_user_name = $fetch_get_smdl_data['Email_ID'];
		
		if($market_type == "MATCH_ODDS" or $market_type == "BOOKMAKER_ODDS"){

			if($bet_type == 'No' or $bet_type == 'Lay'){

				 $win = $bet_stack;

			}else{

				 $win =($bet_odds - 1) * $bet_stack;

			}

		}else{

			if($bet_odds > 100){
				 $win = $bet_stack;
			}else{
				$net_profit = ($bet_stack * ($bet_odds-1));
				 $win = $net_profit;
			}

		}

		

		if($market_type == "MATCH_ODDS" or $market_type == "BOOKMAKER_ODDS"){

			if($bet_type == 'No' or $bet_type == 'Lay'){

														 $loss = $bet_margin_used;

													}else{

														 $loss = $bet_margin_used;

													}

		}else{

				if($bet_odds > 100){
					 $loss = ($bet_stack * ($bet_odds-1));
				}else{
					 $loss = $bet_stack;
				}

		}
		
		
		$bet_ticker[] = array(
						"bet_id"=>$bet_id,
						"user_name"=>$user_name,
						"smdl_name"=>$smdl_user_name,		
						"mdl_name"=>$mdl_user_name,		
						"dl_name"=>$dl_user_name,		
						"event_name"=>$event_name." ($event_id)",		
						"market_name"=>$market_name,		
						"type"=>$bet_type,		
						"stake"=>$bet_stack,		
						"margin_used"=>$bet_margin_used,		
						"rate"=>$bet_runs,		
						"odds"=>$bet_odds,		
						"win"=>$win,		
						"loss"=>$loss,		
						"date_time"=>$bet_time,		
						"market_type"=>$market_type,		
						"bet_ip_address"=>$bet_ip_address,		
						"bet_user_agent"=>$bet_user_agent,		
						);
	}
	
	
	function sortFunction( $a, $b ) {
    return strtotime($b["date_time"]) - strtotime($a["date_time"]);
}
usort($bet_ticker, "sortFunction");
	
	
	$return_array = array(
					"status"=>"ok",
					"bet_ticker"=>$bet_ticker,
					);
	echo  json_encode($return_array);
?>