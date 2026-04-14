<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];	
	
	if($login_type != 5){		
		header("Location: ../logout.php");	
	}
	
	
	$get_account_sum_shree = $conn->query("select SUM(amount) as total_commision from accounts as a left outer join user_login_master as u  on  u.UserID=a.user_id where a.opp_user_id=1 and a.entry_type=9 and u.parentMDL!=615");
	$fetch_get_account_sum_shree = mysqli_fetch_assoc($get_account_sum_shree);
	$total_commision_shree = $fetch_get_account_sum_shree['total_commision'];
	
	$get_account_sum_shree_settlement = $conn->query("select SUM(amount) as total_commision from accounts where opp_user_id=157 and user_id=1");
	$fetch_get_account_sum_shree_settlement = mysqli_fetch_assoc($get_account_sum_shree_settlement);
	$total_commision_shree_settlement = $fetch_get_account_sum_shree_settlement['total_commision'];
	
	
	$get_account_sum_gns = $conn->query("select SUM(amount) as total_commision from accounts as a left outer join user_login_master as u  on  u.UserID=a.user_id where a.opp_user_id=1 and a.entry_type=9 and u.parentMDL=615");
	$fetch_get_account_sum_gns = mysqli_fetch_assoc($get_account_sum_gns);
	$total_commision_gns = $fetch_get_account_sum_gns['total_commision'];
	
	$get_account_sum_gns_settlement = $conn->query("select SUM(amount) as total_commision from accounts where opp_user_id=615 and user_id=1");
	$fetch_get_account_sum_gns_settlement = mysqli_fetch_assoc($get_account_sum_gns_settlement);
	$total_commision_gns_settlement = $fetch_get_account_sum_gns_settlement['total_commision'];
	?>
	<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
	<table id="customers">
		<tr>
			<th>User Name</th>
			<th>Pendig Commission</th>
			<th>Commission</th>
			<th>Receive Commission</th>
			<th>Settlement </th>
		</tr>
		
		<tr>
			<td>shree789</td>
			<td><?php
				$total_comm_shree  = $total_commision_shree  *(-1);
				$pending_comm_shree = $total_comm_shree + $total_commision_shree_settlement;
				echo number_format($pending_comm_shree,2);
			?></td>
			<td><?php echo number_format($total_commision_shree  *(-1),2); ?></td>
			<td><?php 
			
				$total_rcv_shree =   ($total_commision_shree * (-1)) - $pending_comm_shree; 
				echo $total_rcv_shree;
				?></td>
			<td><a href="credit_debit?user_id=157">Settlement</a></td>
		</tr>
		
		<tr>
			<td>gns</td>
			<td><?php
				$total_comm_gns  = $total_commision_gns  *(-1);
				$pending_comm_gns = $total_comm_gns + $total_commision_gns_settlement;
				echo number_format($pending_comm_gns,2);
			?></td>
			<td><?php echo number_format($total_commision_gns *(-1),2); ?></td>
			<td><?php 
			
				$total_rcv_gns =   ($total_commision_gns * (-1)) - $pending_comm_gns; 
				echo $total_rcv_gns
				?></td>
			<td><a href="credit_debit?user_id=615">Settlement</a></td>
		</tr>
		
		
		<tr style="    font-weight: bold;
    font-size: 18px;">
			<td>Total</td>
			<td><?php 
				$total_commision_pend = $pending_comm_shree + $pending_comm_gns;
				echo number_format($total_commision_pend,2);
			?></td>
			<td><?php 
				$total_commision = $total_commision_shree + $total_commision_gns;
				echo number_format($total_commision * (-1),2);
			?></td>
			<td colspan="2"><?php 
				$total_rcv_commision = $total_rcv_shree + $total_rcv_gns;
				echo number_format($total_rcv_commision,2);
			?></td>
		</tr>
	</table>