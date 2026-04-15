<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	$event_id = $_REQUEST['event_id'];
	$bet_user_id = $_REQUEST['user_id'];
	$market_id = $_REQUEST['market_id'];
	$client_name = $_REQUEST['client_name'];
	
	if($login_type == 5){
		$user_login_type = "parentKingAdmin";
		$group_by_data = "parentSuperMDL";
		
			
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
			$search_mdl_name = " and b.user_id IN (".implode(',',$my_user_ids).")";
		}else{
			$search_mdl_name = "";
		}
	}else{
		$search_mdl_name = "";
	}
}else{
	$search_mdl_name = "";
}

if($login_type == 3 or $login_type == 4 or $login_type == 7){
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
	$search_client_name=" and b.user_id=$client_id";
	
}else{
	$search_client_name ="";
}

	$total_stake = 0;
	$total_result = 0;
	$total_pnl = 0;
	$total_my = 0;
	$total_comm = 0;
	$total_upline = 0;
	if($market_id != "MATCH_ODDS"){
	?>
	<div class="table-responsive">
	<table class="table table-striped jambo_table bulk_action nowrap" id="example" style="width:100%">
	<thead>
	<tr class="headings">
		<th class="column-title" >User Name</th>
		<th class="column-title" >Type</th>
		
		<th class="column-title" >Result</th>
		<th class="column-title" >Odds</th>
		<th class="column-title" >Rate</th>
		<th class="column-title" >Stake</th>
		<th class="column-title" >P&L </th>
		<th class="column-title" >My</th>
		<th class="column-title" >Comm</th>
		<th class="column-title" >Upline</th>
		<th class="column-title" >Date</th>
		</tr>
	</thead>
	<?php
	//$get_bet_details = $conn->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserID=b.user_id where ulm.$user_login_type=$user_id $search_client_name $search_mdl_name $search_dl_name and b.bet_status =0 and b.user_id=$bet_user_id and b.market_id=$market_id and b.event_id=$event_id and market_type='FANCY_ODDS'");
	
	$get_bet_details = $conn->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserID=b.user_id where  1=1 $search_client_name $search_smdl_name $search_mdl_name $search_dl_name and b.bet_status =0 and b.user_id IN ($myfield_arr) and b.market_id=$market_id and b.event_id=$event_id and market_type='FANCY_ODDS'");
	
	while($fetch_get_bet_details = mysqli_fetch_assoc($get_bet_details)){
		$bet_user_id = $fetch_get_bet_details['user_id'];
		$bet_type = $fetch_get_bet_details['bet_type'];
		$bet_stake = $fetch_get_bet_details['bet_stack'];
		$bet_result = $fetch_get_bet_details['bet_result'];
		$bet_runs = $fetch_get_bet_details['bet_runs'];
		$bet_time = $fetch_get_bet_details['bet_time'];
		$bet_odds = $fetch_get_bet_details['bet_odds'];
		
		$my_commision = check_percentage($conn,$user_id,$bet_user_id);
		$my_win_amount = ($bet_result * $my_commision)/100;
		if($bet_result > 0){
			$comm_amount = ($bet_result * 2)/100;
			$pnl = $bet_result - $comm_amount;
		}else{
			$comm_amount = 0;
			$pnl = $bet_result;
		}
		$upline_amount = $bet_result - $my_win_amount;
		
		$my_win_amount = -$my_win_amount;
		$upline_amount = -$upline_amount;
		
		$bet_result_color = amount_color($bet_result);
		$pnl_color = amount_color($pnl);
		$my_win_amount_color = amount_color($my_win_amount);
		$comm_amount_color = amount_color($comm_amount);
		$upline_amount_color = amount_color($upline_amount);
	?>
	<tr>
	<td>
		<?php
		$get_user_name = $conn->query("select * from user_login_master where UserID=$bet_user_id");
		$fetch_get_user_name = mysqli_fetch_assoc($get_user_name);
		$user_name =$fetch_get_user_name['Email_ID'];
		echo $user_name;
		?>
	</td>
	<td><?php echo $bet_type; ?></td>
<td style="color:<?php echo $bet_result_color; ?>"><?php echo $bet_result; ?></td>
	<td><?php echo $bet_odds; ?></td>
	<td><?php echo $bet_runs; ?></td>
		<td><?php echo $bet_stake;
	?></td>
	
	
	<td style="color:<?php echo $pnl_color; ?>"><?php echo $pnl; ?></td>
	<td style="color:<?php echo $my_win_amount_color; ?>"><?php echo $my_win_amount; ?></td>
	<td style="color:<?php echo $comm_amount_color; ?>"><?php echo $comm_amount; ?></td>
	<td style="color:<?php echo $upline_amount_color; ?>"><?php echo $upline_amount; ?></td>
	<td><?php echo date('d-m-Y H:i:s',strtotime($bet_time)); ?></td>
	</tr>
	<?php
	$total_stake = $total_stake + $bet_stake;
	$total_result = $total_result + $bet_result;
	$total_pnl = $total_pnl + $pnl;
	$total_my = $total_my + $my_win_amount;
	$total_comm = $total_comm + $comm_amount;
	$total_upline = $total_upline + $upline_amount;
	}
?>

<tr style="display:none;">
<td>Total: </td>

<td> </td>
<td>
<?php
echo $total_result;
?>
</td>
<td> </td>
<td> </td>

<td>
<?php
echo $total_stake;
?>
</td>



<td>
<?php
echo $total_pnl;
?>
</td>

<td>
<?php
echo $total_my;
?>
</td>

<td>
<?php
echo $total_comm;
?>
</td>

<td>
<?php
echo $total_upline;
?>
</td>
<td></td>


</tr>
</table>
</div>
<?php
	}else{
?>
<div class="table-responsive">
<table class="table table-striped jambo_table bulk_action nowrap" id="" style="width:100%">
	<thead>
	<tr class="headings">
		<th class="column-title" >User Name</th>
		<th class="column-title" >Runner Name</th>
		
		<th class="column-title" >Result</th>
		<th class="column-title" >Type</th>
		
		<th class="column-title" >Odds</th>
		<th class="column-title" >Rate</th>
		<th class="column-title" >Stake</th>
		<th class="column-title" >P&L </th>
		<th class="column-title" >My</th>
		<th class="column-title" >Comm</th>
		<th class="column-title" >Upline</th>
		<th class="column-title" >Date</th>
		</tr>
	</thead>
	<?php
	$get_bet_details = $conn->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserID=b.user_id where 1=1 $search_client_name $search_smdl_name $search_mdl_name $search_dl_name and b.bet_status =0  and  b.user_id IN ($myfield_arr)	 and b.event_id=$event_id and b.market_type='MATCH_ODDS'");
	
	while($fetch_get_bet_details = mysqli_fetch_assoc($get_bet_details)){
		$bet_user_id = $fetch_get_bet_details['user_id'];
		$bet_type = $fetch_get_bet_details['bet_type'];
		$market_name = $fetch_get_bet_details['market_name'];
		$bet_stake = $fetch_get_bet_details['bet_stack'];
		$bet_result = $fetch_get_bet_details['bet_result'];
		$bet_odds = $fetch_get_bet_details['bet_odds'];
		$bet_runs = $fetch_get_bet_details['bet_runs'];
		$bet_time = $fetch_get_bet_details['bet_time'];
		
		$my_commision = check_percentage($conn,$user_id,$bet_user_id);
		$my_win_amount = ($bet_result * $my_commision)/100;
		if($bet_result > 0){
			$comm_amount = ($bet_result * 2)/100;
			$pnl = $bet_result - $comm_amount;
		}else{
			$comm_amount = 0;
			$pnl = $bet_result;
		}
		$upline_amount = $bet_result - $my_win_amount;
		
		$my_win_amount = -$my_win_amount;
		$upline_amount = -$upline_amount;
		
		$bet_result_color = amount_color($bet_result);
		$pnl_color = amount_color($pnl);
		$my_win_amount_color = amount_color($my_win_amount);
		$comm_amount_color = amount_color($comm_amount);
		$upline_amount_color = amount_color($upline_amount);
	?>
	<tr>
	<td>
		<?php
		$get_user_name = $conn->query("select * from user_login_master where UserID=$bet_user_id");
		$fetch_get_user_name = mysqli_fetch_assoc($get_user_name);
		$user_name =$fetch_get_user_name['Email_ID'];
		echo $user_name;
		?>
	</td>
	<td><?php echo $market_name; ?></td>
	<td style="color:<?php echo $bet_result_color; ?>"><?php echo $bet_result; ?></td>
	<td><?php echo $bet_type; ?></td>
	
	<td><?php echo $bet_odds; ?></td>
	<td><?php echo $bet_runs; ?></td>
	<td><?php echo $bet_stake; ?></td>
	
	
	<td style="color:<?php echo $pnl_color; ?>"><?php echo $pnl; ?></td>
	<td style="color:<?php echo $my_win_amount_color; ?>"><?php echo $my_win_amount; ?></td>
	<td style="color:<?php echo $comm_amount_color; ?>"><?php echo $comm_amount; ?></td>
	<td style="color:<?php echo $upline_amount_color; ?>"><?php echo $upline_amount; ?></td>
	<td><?php echo date('d-m-Y H:i:s',strtotime($bet_time)); ?></td>
	</tr>
	<?php
	$total_stake = $total_stake + $bet_stake;
	$total_result = $total_result + $bet_result;
	$total_pnl = $total_pnl + $pnl;
	$total_my = $total_my + $my_win_amount;
	$total_comm = $total_comm + $comm_amount;
	$total_upline = $total_upline + $upline_amount;
	}
?>
<tr style="display:none;">
<td>Total: </td>

<td> </td>

<td>
<?php
echo $total_result;
?>
</td>
<td> </td>
<td> </td>
<td> </td>

<td>
<?php
echo $total_stake;
?>
</td>


<td>
<?php
echo $total_pnl;
?>
</td>

<td>
<?php
echo $total_my;
?>
</td>

<td>
<?php
echo $total_comm;
?>
</td>

<td>
<?php
echo $total_upline;
?>
</td>
<td></td>


</tr>
</table>
</div>
<?php
	}
?>
<?php

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
			$get_smdl_id = $conn->query("select * from user_login_master where UserID=$bet_user_id");
			$fetch_smdl_id = mysqli_fetch_assoc($get_smdl_id);
			$smdl_id = $fetch_smdl_id['parentKingAdmin'];
			$get_smdl_percentage = $conn->query("select * from user_master where Id=$smdl_id");
			$fetch_get_smdl_percentage = mysqli_fetch_assoc($get_smdl_percentage);
			$my_smdl_percentage = $fetch_get_smdl_percentage['my_percentage'];
			$my_actual_percentage = 100 - $my_smdl_percentage;
		}
		
		return $my_actual_percentage;
	}
?>