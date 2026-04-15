<?php
	include "../../include/conn.php";
	include "../session.php";
	
	/*error_reporting(E_ALL);
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);*/
	$total_team_1 = 0;
	$total_team_2 = 0;
	
	$total_team_1_temp = 0;
	$total_team_2_temp = 0;
	
	$grand_grand_total_order_amount = 0;
	$grand_grand_total_win_amount = 0;
	$grand_grand_commision_amount = 0;
	$grand_grand_total_my_win_amount = 0;
	$grand_grand_pnl_amount = 0;
	$grand_grand_my_commision_amount = 0;
	$grand_grand_my_pnl_amount = 0;
	$grand_grand_upline_win_amount = 0;
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

	$event_type = $_POST['eventType'];
	$event_name = $_POST['event_name'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$market_name = $_REQUEST['market_name'];
	if($market_name != ""){
		$search_market_name =" and market_name='$market_name'";
	}else{
		$search_market_name ="";
	}

	$client_name = $_REQUEST['client_name'];
	
	if($login_type == 5){
		
		
		$get_users_under = $conn->query("select Id from user_login_master");
	$get_users = mysqli_fetch_all($get_users_under);
	$myfield_arr = array_column($get_users, 0);
	$myfield_arr = implode(',', $myfield_arr);
	
	
	}
	else{
		header("Location: ../logout.php");
	}
	
	
	$search_smdl_name = "";
	if($login_type == 7){
		$smdl_name = $_REQUEST['smdl_name'];
		if($smdl_name != ""){
			$get_mdl_id = $conn->query("select * from user_login_master where Email_ID='$smdl_name'");
			$fetch_mdl_id = mysqli_fetch_assoc($get_mdl_id);
			$mdl_id = $fetch_mdl_id['UserID'];
			
			$get_client_id = $conn->query("select * from user_login_master where parentSuperMDL='$mdl_id'");
			$my_user_ids = array();
			while($fetch_donwline = mysqli_fetch_assoc($get_client_id)){
				$my_user_ids[] = $fetch_donwline['UserID'];
			}
			if($my_user_ids != null){
				$search_smdl_name = " and b.user_id IN (".implode(',',$my_user_ids).")";
			}else{
				$search_smdl_name = "";
			}
		}else{
			$search_smdl_name = "";
		}
	}else{
		$search_smdl_name = "";
	}
	
	if($login_type == 4){
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
			$search_mdl_name = " and user_id IN (".implode(',',$my_user_ids).")";
		}else{
			$search_mdl_name = "";
		}
	}else{
		$search_mdl_name = "";
	}
}else{
	$search_mdl_name = "";
}

if($login_type == 3 or $login_type == 4){
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
			$search_dl_name = " and user_id IN (".implode(',',$my_user_ids).")";
		}else{
			$search_dl_name = "";
		}
		
		
	}else{
		$search_dl_name ="";
	}
}else{
	$search_dl_name ="";
}

if($client_name != ""){
	$get_client_id = $conn->query("select * from user_login_master where Email_ID='$client_name'");
	$fetch_client_id = mysqli_fetch_assoc($get_client_id);
	$client_id = $fetch_client_id['UserID'];
	$search_client_name=" and user_id=$client_id";
	
}else{
	$search_client_name ="";
}

	
	$search_filter = "";
	if($event_type != 'All'){
		$search_filter .= " and event_type=$event_type";
	}else{
		$search_filter .= "";
	}
	
	if($_POST['event_name']){
		$search_filter .= " and event_name='$event_name'";
	}
	
	if(isset($_POST['start_date']) and isset($_POST['end_date'])){
		$start_date = date("Y-m-d",strtotime($start_date));
		$end_date = date("Y-m-d",strtotime($end_date));
		$search_filter .= " and DATE(bet_time) >= '$start_date' and DATE(bet_time) <= '$end_date'";
	}
		
			//$bet_time = date("Y-m-d");
			$get_pnl_report_event_name  = $conn->query("select event_id,event_name,CAST(bet_time AS DATE) as bet_time,event_type  from bet_details where user_id IN($myfield_arr) $search_filter $search_client_name $search_mdl_name $search_dl_name $search_market_name and bet_status =0  GROUP BY  event_id");
			$get_pnl_report_num_rows = $get_pnl_report_event_name->num_rows;
			if($get_pnl_report_num_rows >= 0){
				
				$fetch_get_pnl_report_event_name = mysqli_fetch_all($get_pnl_report_event_name);
				$all_event_idss = array_column($fetch_get_pnl_report_event_name, 0);	
				$all_event_datess = array_column($fetch_get_pnl_report_event_name, 2);	
				$all_event_ids = implode(",",$all_event_idss);
				
			//while($fetch_get_pnl_report_event_name = mysqli_fetch_assoc($get_pnl_report_event_name)){
			if(1==1){
		
			$grand_total_order_amount = 0;
			$grand_total_win_amount = 0;
			$grand_total_commision_amount = 0;
			$grand_commision_amount = 0;
			$grand_total_my_win_amount = 0;
			$grand_pnl_amount = 0;
			$grand_my_commision_amount = 0;
			$grand_my_pnl_amount = 0;
			$grand_upline_win_amount = 0;
			$old_bet_date = "";
			$old_event_id = "";
			$old_market_id = "";
			$get_pnl_market_name = $conn->query("select event_name,market_id,event_id,market_type,market_name,CAST(bet_time AS DATE) as bet_time,SUM(bet_stack) as total_order_amount,user_id,SUM(bet_result) as total_win_amount, SUM(bet_comm) as total_control_comm_amount from bet_details where user_id IN($myfield_arr) $search_filter $search_client_name $search_smdl_name $search_mdl_name $search_dl_name $search_market_name and bet_status =0 and event_id IN ($all_event_ids) GROUP BY event_id,market_id,CAST(bet_time AS DATE) ORDER BY CAST(bet_time AS DATE),event_id,market_type DESC,market_id DESC");
			
			$total_my_win_amount = 0;
			$bet_user_id = 0;
			$pnl_array = array();
			
			$main_market_id = 0;
			$main_market_name = 0;
			$main_total_order_amount = 0;
			$main_total_win_amount = 0;
			$main_commission_amount = 0;
			$main_pnl_amount = 0;
			$main_total_my_win_amount = 0;
			$main_my_commision_amount = 0;
			$main_grand_my_commision_amount = 0;
			$main_grand_grand_my_pnl_amount = 0;
			$main_grand_grand_upline_win_amount = 0;
			$main_market_type = 0;
			$main_event_id = 0;
			$main_commision_amount = 0;
			$main_my_pnl_amount = 0;
			$main_upline_win_amount = 0;
			
			$tot_order_amount = 0;
			$tot_total_win_amount = 0;
			$tot_pnl_amount = 0;
			$tot_commision_amount = 0;
			$tot_commision_amount = 0;
			$tot_total_my_win_amount = 0;
			$tot_my_commision_amount = 0;
			$tot_my_pnl_amount = 0;
			$tot_upline_win_amount = 0;
			$tot1_order_amount = 0;
			$tot1_total_win_amount = 0;
			$tot1_pnl_amount = 0;
			$tot1_commision_amount = 0;
			$tot1_commision_amount = 0;
			$tot1_total_my_win_amount = 0;
			$tot1_my_commision_amount = 0;
			$tot1_my_pnl_amount = 0;
			$tot1_upline_win_amount = 0;
			$old_event_id = 0;
			$main_flag = 0;
			$dd = 0;
			while($fetch_get_pnl_market_name =mysqli_fetch_assoc($get_pnl_market_name)){
				$market_id = $fetch_get_pnl_market_name['market_id'];
				$bet_date = $fetch_get_pnl_market_name['bet_time'];
				$event_name = $fetch_get_pnl_market_name['event_name'];
				
				$event_id = $fetch_get_pnl_market_name['event_id'];
				$market_type = $fetch_get_pnl_market_name['market_type'];
				$market_name = $fetch_get_pnl_market_name['market_name'];
				$total_order_amount = $fetch_get_pnl_market_name['total_order_amount'];
				
				
				$total_win_amount = $fetch_get_pnl_market_name['total_win_amount'];
				$total_control_comm_amount = $fetch_get_pnl_market_name['total_control_comm_amount'];
				
				$bet_user_id = $fetch_get_pnl_market_name['user_id'];
				
				$my_commision_percentage = check_percentage($conn,$user_id,$bet_user_id);
				
				$my_win_amount = (($fetch_get_pnl_market_name['total_win_amount']) * $my_commision_percentage)/100;
					$total_my_win_amount =  $my_win_amount;	
				/* if($market_type == "MATCH_ODDS"){
					$market_name = "MATCH_ODDS";
				} */
				
				
				if($main_event_id != $event_id && $main_event_id != 0){	
					$main_flag = 1;
					$tot_order_amount = $tot1_order_amount;
					$tot_total_win_amount = $tot1_total_win_amount;
					$tot_pnl_amount = $tot1_pnl_amount;
					$tot_commision_amount = $tot1_commision_amount;
					$tot_total_my_win_amount = $tot1_total_my_win_amount;
					$tot_my_commision_amount = $tot1_my_commision_amount;
					$tot_my_pnl_amount = $tot1_my_pnl_amount;
					$tot_upline_win_amount = $tot1_upline_win_amount;
					$tot1_order_amount = 0;
			$tot1_total_win_amount = 0;
			$tot1_pnl_amount = 0;
			$tot1_commision_amount = 0;
			$tot1_commision_amount = 0;
			$tot1_total_my_win_amount = 0;
			$tot1_my_commision_amount = 0;
			$tot1_my_pnl_amount = 0;
			$tot1_upline_win_amount = 0;
				/*	$amount_color = amount_color($tot_total_win_amount);
					$grand_pnl_amount_color = amount_color($tot_pnl_amount);
					$grand_commision_amount = -$tot_commision_amount;
					$grand_commision_amount_color = amount_color($tot_commision_amount);
					$grand_total_my_win_amount_color = amount_color($tot_total_my_win_amount);
					$grand_my_commision_amount_color = amount_color($tot_my_commision_amount);
					$grand_my_pnl_amount_color = amount_color($tot_my_pnl_amount);
					$grand_upline_win_amount_color = amount_color($tot_upline_win_amount);
			?>
				<tr>
				<td style="float: right;"><span>Total</span></td>
				<td><span> <?php echo number_format($tot_order_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $amount_color; ?>"> <?php echo number_format($tot_total_win_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $grand_commision_amount_color; ?>;"> <?php echo number_format($tot_commision_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $grand_pnl_amount_color; ?>"> <?php echo number_format($tot_pnl_amount,2); ?> </span></td>
				<td style="border-left:1px solid #ddd;text-align:center;color:<?php echo $grand_total_my_win_amount_color; ?>"><span> <?php echo number_format($tot_total_my_win_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $grand_my_commision_amount_color; ?>;"> <?php echo number_format($tot_my_commision_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $grand_my_pnl_amount_color; ?>"> <?php echo number_format($tot_my_pnl_amount,2); ?> </span></td>
			
				</tr>
			<tr>
				
				<?php 
					$tot_order_amount = 0;
					$tot_total_win_amount = 0;
					$tot_pnl_amount = 0;
					$tot_commision_amount = 0;
					$tot_commision_amount = 0;
					$tot_total_my_win_amount = 0;
					$tot_my_commision_amount = 0;
					$tot_my_pnl_amount = 0;
					$tot_upline_win_amount = 0;*/
					
				}
				else{
					$main_flag = 0;
				}

				$grand_total_order_amount = $grand_total_order_amount + $total_order_amount;
				
				
				
				$total_my_win_amount = -$total_my_win_amount;
				$grand_total_win_amount = $grand_total_win_amount + $total_win_amount;
				$commision_amount = 0;
				$commision_amount =  $total_control_comm_amount;
				$grand_total_my_win_amount = $grand_total_my_win_amount + $total_my_win_amount;
				
				//$commision_amount = commision_amount($total_win_amount);
				
				$my_commision_amount = $commision_amount;
				
				$grand_commision_amount = $grand_commision_amount + $commision_amount;
				$grand_total_commision_amount = $grand_total_commision_amount + $commision_amount;
				$pnl_amount = $total_win_amount - $commision_amount;
				$grand_pnl_amount = $grand_pnl_amount + $pnl_amount;
				$commision_amount = -$commision_amount;
				
				$grand_my_commision_amount = $grand_my_commision_amount + $my_commision_amount;
				$my_pnl_amount = $total_my_win_amount + $my_commision_amount;
				$upline_win_amount = $total_win_amount + $my_pnl_amount;
				$upline_win_amount = -$upline_win_amount;

				$grand_my_pnl_amount = $grand_my_pnl_amount + $my_pnl_amount;
				$grand_upline_win_amount = $grand_upline_win_amount + $upline_win_amount;
				
				$tot1_order_amount += $total_order_amount;
				$tot1_total_win_amount += $total_win_amount;
				$tot1_pnl_amount += $pnl_amount;
				$tot1_commision_amount += $commision_amount;
				$tot1_total_my_win_amount += $total_my_win_amount;
				$tot1_my_commision_amount += $my_commision_amount;
				$tot1_my_pnl_amount += $my_pnl_amount;
				$tot1_upline_win_amount += $upline_win_amount;
				
				if($market_id != $main_market_id && $main_market_id != 0 && $main_market_type == "FANCY_ODDS"){
					$main_amount_color = amount_color($main_total_win_amount);
					$main_pnl_amount_color = amount_color($main_pnl_amount);
					$main_commision_amount_color = amount_color($main_commision_amount);
					$main_my_win_amount_color = amount_color($main_total_my_win_amount);
					$main_my_commision_amount_color = amount_color($main_my_commision_amount);
					$main_my_pnl_amount_color = amount_color($main_my_pnl_amount);
					$main_upline_win_amount_color = amount_color($main_upline_win_amount);
					?>
						<tr>
							<td style="background: #afb0b1;color: #ffffff;width: 30%;"><span ><?php echo $main_market_name; ?></span><span> | </span> 
							<span><a href="javascript:void();" class="view_market_exposure" event_name="<?php echo $main_market_name; ?>" event_id="<?php echo $main_event_id; ?>" market_id="<?php echo $main_market_id; ?>" data-toggle="modal" data-target="#myModal"><span>View Bets<span></a></span></td>
							<td><span> <?php echo number_format($main_total_order_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_amount_color; ?>"> <?php echo number_format($main_total_win_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_commision_amount_color; ?>;"> <?php echo number_format($main_commision_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_pnl_amount_color; ?>"><?php echo number_format($main_pnl_amount,2); ?> </span></td>
							<td style="border-left:1px solid #ddd;text-align:center;color:<?php echo $main_my_win_amount_color; ?>"><span> <?php echo number_format($main_total_my_win_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_my_commision_amount_color; ?>;"> <?php echo number_format($main_my_commision_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_my_pnl_amount_color; ?>"> <?php echo number_format($main_my_pnl_amount,2); ?> </span></td>
							<td style="border-left:1px solid #ddd;text-align:center;color:<?php echo $main_upline_win_amount_color; ?>"><span> <?php echo number_format($main_upline_win_amount,2); ?> </span></td>
						</tr>
					<?php
					$main_market_id = $market_id;
					$main_market_name = $market_name;
					$main_total_order_amount = $total_order_amount;
					$main_total_win_amount = $total_win_amount;
					$main_commision_amount = $commision_amount;
					$main_pnl_amount = $pnl_amount;
					$main_total_my_win_amount = $total_my_win_amount;
					$main_my_commision_amount = $my_commision_amount;
					$main_my_pnl_amount = $my_pnl_amount;
					$main_upline_win_amount = $upline_win_amount;
					$main_market_type = $market_type;
					$main_event_id = $event_id;
				}
				else if($market_id != $main_market_id && $main_market_id != 0 && $main_market_type != "FANCY_ODDS" && ($market_type != $main_market_type || $event_id != $main_event_id)){
					$main_amount_color = amount_color($main_total_win_amount);
					$main_pnl_amount_color = amount_color($main_pnl_amount);
					$main_commision_amount_color = amount_color($main_commision_amount);
					$main_my_win_amount_color = amount_color($main_total_my_win_amount);
					$main_my_commision_amount_color = amount_color($main_my_commision_amount);
					$main_my_pnl_amount_color = amount_color($main_my_pnl_amount);
					$main_upline_win_amount_color = amount_color($main_upline_win_amount);
					?>
						<tr>
							<td style="background: #afb0b1;color: #ffffff;width: 30%;"><span ><?php echo $main_market_type; ?></span><span> | </span> 
							<span><a href="javascript:void();" class="view_market_exposure" event_name="<?php echo $main_market_name; ?>" event_id="<?php echo $main_event_id; ?>" market_id="<?php echo $main_market_type; ?>" data-toggle="modal" data-target="#myModal"><span>View Bets<span></a></span></td>
							<td><span> <?php echo number_format($main_total_order_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_amount_color; ?>"> <?php echo number_format($main_total_win_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_commision_amount_color; ?>;"> <?php echo number_format($main_commision_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_pnl_amount_color; ?>"><?php echo number_format($main_pnl_amount,2); ?> </span></td>
							<td style="border-left:1px solid #ddd;text-align:center;color:<?php echo $main_my_win_amount_color; ?>"><span> <?php echo number_format($main_total_my_win_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_my_commision_amount_color; ?>;"> <?php echo number_format($main_my_commision_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_my_pnl_amount_color; ?>"> <?php echo number_format($main_my_pnl_amount,2); ?> </span></td>
							<td style="border-left:1px solid #ddd;text-align:center;color:<?php echo $main_upline_win_amount_color; ?>"><span> <?php echo number_format($main_upline_win_amount,2); ?> </span></td>
						</tr>
					<?php
					$main_market_id = $market_id;
					$main_market_name = $market_name;
					$main_total_order_amount = $total_order_amount;
					$main_total_win_amount = $total_win_amount;
					$main_commision_amount = $commision_amount;
					$main_pnl_amount = $pnl_amount;
					$main_total_my_win_amount = $total_my_win_amount;
					$main_my_commision_amount = $my_commision_amount;
					$main_my_pnl_amount = $my_pnl_amount;
					$main_upline_win_amount = $upline_win_amount;
					$main_market_type = $market_type;
					$main_event_id = $event_id;
				}
				else{
					$main_market_id = $market_id;
					$main_market_name = $market_name;
					$main_total_order_amount += $total_order_amount;
					$main_total_win_amount += $total_win_amount;
					$main_commision_amount += $commision_amount;
					$main_pnl_amount += $pnl_amount;
					$main_total_my_win_amount += $total_my_win_amount;
					$main_my_commision_amount += $my_commision_amount;
					$main_my_pnl_amount += $my_pnl_amount;
					$main_upline_win_amount += $upline_win_amount;
					$main_market_type = $market_type;
					$main_event_id = $event_id;
				}
				
				if($main_flag == 1){
					$amount_color = amount_color($tot_total_win_amount);
					$grand_pnl_amount_color = amount_color($tot_pnl_amount);
					$grand_commision_amount = -$tot_commision_amount;
					$grand_commision_amount_color = amount_color($tot_commision_amount);
					$grand_total_my_win_amount_color = amount_color($tot_total_my_win_amount);
					$grand_my_commision_amount_color = amount_color($tot_my_commision_amount);
					$grand_my_pnl_amount_color = amount_color($tot_my_pnl_amount);
					$grand_upline_win_amount_color = amount_color($tot_upline_win_amount);
			?>
				<tr>
				<td style="float: right;"><span>Total</span></td>
				<td><span> <?php echo number_format($tot_order_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $amount_color; ?>"> <?php echo number_format($tot_total_win_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $grand_commision_amount_color; ?>;"> <?php echo number_format($tot_commision_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $grand_pnl_amount_color; ?>"> <?php echo number_format($tot_pnl_amount,2); ?> </span></td>
				<td style="border-left:1px solid #ddd;text-align:center;color:<?php echo $grand_total_my_win_amount_color; ?>"><span> <?php echo number_format($tot_total_my_win_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $grand_my_commision_amount_color; ?>;"> <?php echo number_format($tot_my_commision_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $grand_my_pnl_amount_color; ?>"> <?php echo number_format($tot_my_pnl_amount,2); ?> </span></td>
			
				</tr>
			<tr>
				
				<?php 
					$tot_order_amount = 0;
					$tot_total_win_amount = 0;
					$tot_pnl_amount = 0;
					$tot_commision_amount = 0;
					$tot_commision_amount = 0;
					$tot_total_my_win_amount = 0;
					$tot_my_commision_amount = 0;
					$tot_my_pnl_amount = 0;
					$tot_upline_win_amount = 0;
				}
				
				if($old_bet_date != $bet_date){
					$old_bet_date = $bet_date;
					?>
					<tr>
						<td colspan="9" style="color: #ffffff;background: #405467;" >
						<?php echo date("d-m-Y",strtotime($bet_date));?>
						</td>
					</tr>
					<?php
					$old_bet_date = $bet_date;
				}
				if($old_event_id != $event_id){	
					?>
					
					<td colspan="9" style="color: #ffffff;background: #7394b3;" id="event_id_<?php echo $event_id; ?>">
					<?php
					
					echo $event_name; 
					
				?> 
				
				</td>
			</tr>
			<?php
				$old_event_id = $event_id;
			}
				
				?>
		
		
			
		
			<?php
			/* 	
				if($old_market_id != $market_id){
					$pnl_array = array();
					$old_market_id = $market_id;
				}else{
					$pnl_array = array();
				} */
				 
			}
			if($main_market_type == "FANCY_ODDS"){
					$main_amount_color = amount_color($main_total_win_amount);
					$main_pnl_amount_color = amount_color($main_pnl_amount);
					$main_commision_amount_color = amount_color($main_commision_amount);
					$main_my_win_amount_color = amount_color($main_total_my_win_amount);
					$main_my_commision_amount_color = amount_color($main_my_commision_amount);
					$main_my_pnl_amount_color = amount_color($main_my_pnl_amount);
					$main_upline_win_amount_color = amount_color($main_upline_win_amount);
					?>
						<tr>
							<td style="background: #afb0b1;color: #ffffff;width: 30%;"><span ><?php echo $main_market_name; ?></span><span> | </span> 
							<span><a href="javascript:void();" class="view_market_exposure" event_name="<?php echo $main_market_name; ?>" event_id="<?php echo $main_event_id; ?>" market_id="<?php echo $main_market_id; ?>" data-toggle="modal" data-target="#myModal"><span>View Bets<span></a></span></td>
							<td><span> <?php echo number_format($main_total_order_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_amount_color; ?>"> <?php echo number_format($main_total_win_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_commision_amount_color; ?>;"> <?php echo number_format($main_commision_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_pnl_amount_color; ?>"><?php echo number_format($main_pnl_amount,2); ?> </span></td>
							<td style="border-left:1px solid #ddd;text-align:center;color:<?php echo $main_my_win_amount_color; ?>"><span> <?php echo number_format($main_total_my_win_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_my_commision_amount_color; ?>;"> <?php echo number_format($main_my_commision_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_my_pnl_amount_color; ?>"> <?php echo number_format($main_my_pnl_amount,2); ?> </span></td>
							<td style="border-left:1px solid #ddd;text-align:center;color:<?php echo $main_upline_win_amount_color; ?>"><span> <?php echo number_format($main_upline_win_amount,2); ?> </span></td>
						</tr>
					<?php
					$main_market_id = $market_id;
					$main_market_name = $market_name;
					$main_total_order_amount = $total_order_amount;
					$main_total_win_amount = $total_win_amount;
					$main_commision_amount = $commision_amount;
					$main_pnl_amount = $pnl_amount;
					$main_total_my_win_amount = $total_my_win_amount;
					$main_my_commision_amount = $my_commision_amount;
					$main_my_pnl_amount = $my_pnl_amount;
					$main_upline_win_amount = $upline_win_amount;
					$main_market_type = $market_type;
					$main_event_id = $event_id;
				}
				else{
					$main_amount_color = amount_color($main_total_win_amount);
					$main_pnl_amount_color = amount_color($main_pnl_amount);
					$main_commision_amount_color = amount_color($main_commision_amount);
					$main_my_win_amount_color = amount_color($main_total_my_win_amount);
					$main_my_commision_amount_color = amount_color($main_my_commision_amount);
					$main_my_pnl_amount_color = amount_color($main_my_pnl_amount);
					$main_upline_win_amount_color = amount_color($main_upline_win_amount);
					?>
						<tr>
							<td style="background: #afb0b1;color: #ffffff;width: 30%;"><span ><?php echo $main_market_type; ?></span><span> | </span> 
							<span><a href="javascript:void();" class="view_market_exposure" event_name="<?php echo $main_market_name; ?>" event_id="<?php echo $main_event_id; ?>" market_id="<?php echo $main_market_type; ?>" data-toggle="modal" data-target="#myModal"><span>View Bets<span></a></span></td>
							<td><span> <?php echo number_format($main_total_order_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_amount_color; ?>"> <?php echo number_format($main_total_win_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_commision_amount_color; ?>;"> <?php echo number_format($main_commision_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_pnl_amount_color; ?>"><?php echo number_format($main_pnl_amount,2); ?> </span></td>
							<td style="border-left:1px solid #ddd;text-align:center;color:<?php echo $main_my_win_amount_color; ?>"><span> <?php echo number_format($main_total_my_win_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_my_commision_amount_color; ?>;"> <?php echo number_format($main_my_commision_amount,2); ?> </span></td>
							<td><span style="color:<?php echo $main_my_pnl_amount_color; ?>"> <?php echo number_format($main_my_pnl_amount,2); ?> </span></td>
							<td style="border-left:1px solid #ddd;text-align:center;color:<?php echo $main_upline_win_amount_color; ?>"><span> <?php echo number_format($main_upline_win_amount,2); ?> </span></td>
						</tr>
					<?php
					$main_market_id = $market_id;
					$main_market_name = $market_name;
					$main_total_order_amount = $total_order_amount;
					$main_total_win_amount = $total_win_amount;
					$main_commision_amount = $commision_amount;
					$main_pnl_amount = $pnl_amount;
					$main_total_my_win_amount = $total_my_win_amount;
					$main_my_commision_amount = $my_commision_amount;
					$main_my_pnl_amount = $my_pnl_amount;
					$main_upline_win_amount = $upline_win_amount;
					$main_market_type = $market_type;
					$main_event_id = $event_id;
				}
				$amount_color = amount_color($tot1_total_win_amount);
				$grand_pnl_amount_color = amount_color($tot1_pnl_amount);
				$grand_commision_amount = -$tot1_commision_amount;
				$grand_commision_amount_color = amount_color($tot1_commision_amount);
				$grand_total_my_win_amount_color = amount_color($tot1_total_my_win_amount);
				$grand_my_commision_amount_color = amount_color($tot1_my_commision_amount);
				$grand_my_pnl_amount_color = amount_color($tot1_my_pnl_amount);
				$grand_upline_win_amount_color = amount_color($tot1_upline_win_amount);
			?>
				<tr>
				<td style="float: right;"><span>Total </span></td>
				<td><span> <?php echo number_format($tot1_order_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $amount_color; ?>"> <?php echo number_format($tot1_total_win_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $grand_commision_amount_color; ?>;"> <?php echo number_format($tot1_commision_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $grand_pnl_amount_color; ?>"> <?php echo number_format($tot1_pnl_amount,2); ?> </span></td>
				<td style="border-left:1px solid #ddd;text-align:center;color:<?php echo $grand_total_my_win_amount_color; ?>"><span> <?php echo number_format($tot1_total_my_win_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $grand_my_commision_amount_color; ?>;"> <?php echo number_format($tot1_my_commision_amount,2); ?> </span></td>
				<td><span style="color:<?php echo $grand_my_pnl_amount_color; ?>"> <?php echo number_format($tot1_my_pnl_amount,2); ?> </span></td>
			
				<td style="border-left:1px solid #ddd;text-align:center;color:<?php echo $grand_upline_win_amount_color; ?>"><span> <?php echo number_format($tot1_upline_win_amount,2); ?> </span></td>
				</tr>
			<tr>
				<?php 
					$tot_order_amount = 0;
					$tot_total_win_amount = 0;
					$tot_pnl_amount = 0;
					$tot_commision_amount = 0;
					$tot_commision_amount = 0;
					$tot_total_my_win_amount = 0;
					$tot_my_commision_amount = 0;
					$tot_my_pnl_amount = 0;
					$tot_upline_win_amount = 0;
					$grand_total_commision_amount = $grand_total_commision_amount * (-1);
			 $grand_grand_total_order_amount = $grand_grand_total_order_amount + $grand_total_order_amount;
			 $grand_grand_total_win_amount = $grand_grand_total_win_amount + $grand_total_win_amount;
			 $grand_grand_commision_amount = $grand_grand_commision_amount + $grand_total_commision_amount;
			 $grand_grand_pnl_amount = $grand_grand_pnl_amount + $grand_pnl_amount;
			 $grand_grand_total_my_win_amount = $grand_grand_total_my_win_amount + $grand_total_my_win_amount;
			 $grand_grand_my_commision_amount = $grand_grand_my_commision_amount + $grand_my_commision_amount;
			 $grand_grand_my_pnl_amount = $grand_grand_my_pnl_amount + $grand_my_pnl_amount;
			 $grand_grand_upline_win_amount = $grand_grand_upline_win_amount + $grand_upline_win_amount;
			 $grand_grand_commision_amount_color = amount_color($grand_grand_commision_amount);
			}
			
		
	?>
	<tr>
			<td style="float: right;"><span>Total</span></td>
			<td><span> <?php echo number_format($grand_grand_total_order_amount,2); ?> </span></td>
			<td><span style="color:<?php echo $amount_color; ?>"> <?php echo number_format($grand_grand_total_win_amount,2); ?> </span></td>
			<td><span style="color:<?php echo $grand_grand_commision_amount_color; ?>;"> <?php echo number_format($grand_grand_commision_amount,2); ?> </span></td>
			<td><span style="color:<?php echo $grand_pnl_amount_color; ?>"> <?php echo number_format($grand_grand_pnl_amount,2); ?> </span></td>
			<td style="border-left:1px solid #ddd;text-align:center;color:<?php echo $grand_total_my_win_amount_color; ?>"><span> <?php echo number_format($grand_grand_total_my_win_amount,2); ?> </span></td>
			<td><span style="color:<?php echo $grand_my_commision_amount_color; ?>;"> <?php echo number_format($grand_grand_my_commision_amount,2); ?> </span></td>
			<td><span style="color:<?php echo $grand_my_pnl_amount_color; ?>"> <?php echo number_format($grand_grand_my_pnl_amount,2); ?> </span></td>
			
			<td style="border-left:1px solid #ddd;text-align:center;color:<?php echo $grand_upline_win_amount_color; ?>"><span> <?php echo number_format($grand_grand_upline_win_amount,2); ?> </span></td>
			</tr>
	<?php
	}
	function commision_amount($amount){
		if($amount < 0){
			$commision = 0;
		}else{
			$commision = ($amount * 2) /100;	
		}
		return $commision;
	}
	
	function amount_color($amount){
		if($amount < 0){
					$amount_color = "red";
				}else{
					$amount_color = "green";	
				}
		return $amount_color;
	}
	function check_percentage($conn,$user_id,$bet_user_id){
		
		$get_my_percentage = $conn->query("select * from user_master where Id=$user_id");
		$fetch_get_my_percentage = mysqli_fetch_assoc($get_my_percentage);
		$my_percentage = $fetch_get_my_percentage['my_percentage'];
			$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

		$upline_percentage = 100 - $my_percentage;
		
		if($login_type == 2){
			$my_actual_percentage = $my_percentage;
		}else if($login_type ==3){
			$get_dl_id = $conn->query("select * from user_login_master where UserID=$bet_user_id");
			$fetch_dl_id = mysqli_fetch_assoc($get_dl_id);
			$dl_id = $fetch_dl_id['parentDL'];
			$get_dl_percentage = $conn->query("select * from user_master where Id=$dl_id");
			$fetch_get_dl_percentage = mysqli_fetch_assoc($get_dl_percentage);
			$my_dl_percentage = $fetch_get_dl_percentage['my_percentage'];
			
			$my_actual_percentage = $my_percentage - $my_dl_percentage;
		}
		else if($login_type ==4){
			$get_mdl_id = $conn->query("select * from user_login_master where UserID=$bet_user_id");
			$fetch_mdl_id = mysqli_fetch_assoc($get_mdl_id);
			$mdl_id = $fetch_mdl_id['parentMDL'];
			$get_mdl_percentage = $conn->query("select * from user_master where Id=$mdl_id");
			$fetch_get_mdl_percentage = mysqli_fetch_assoc($get_mdl_percentage);
			$my_mdl_percentage = $fetch_get_mdl_percentage['my_percentage'];
			$my_actual_percentage = $my_percentage - $my_mdl_percentage;
		}
		else if($login_type ==5){
			$get_mdl_id = $conn->query("select * from user_login_master where UserID=$bet_user_id");
			$fetch_mdl_id = mysqli_fetch_assoc($get_mdl_id);
			$mdl_id = $fetch_mdl_id['parentKingAdmin'];
			$get_mdl_percentage = $conn->query("select * from user_master where Id=$mdl_id");
			$fetch_get_mdl_percentage = mysqli_fetch_assoc($get_mdl_percentage);
			$my_mdl_percentage = $fetch_get_mdl_percentage['my_percentage'];
			$my_actual_percentage = 100 - $my_mdl_percentage;
		}
		
		return $my_actual_percentage;
	}
?>