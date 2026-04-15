<?php

include('../include/conn.php');

include "session.php";

$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];

$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

?>

<!DOCTYPE html>

<html lang="en">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php echo SITE_NAME; ?> | Chip Summary</title>

<?php 



include("header.php");

?>
<?php
	

	$plus_array = array();
	$minus_array = array();
	$total_cash_amount = 0;
	$total_own_amount = 0;
	$total_upline_amount = 0;
	
	if($login_type == 5){
		$get_my_percentage = $conn->query("select * from user_master where Id=$user_id");
			$fetch_get_my_percentage = mysqli_fetch_assoc($get_my_percentage);
			$my_percentage = $fetch_get_my_percentage['my_percentage'];
			
		$get_mdl_ids = $conn->query("select * from user_login_master where UserType=7 and parentController=$user_id");
		$get_mdl_id = array();
		while($fetch_get_mdl_ids = mysqli_fetch_assoc($get_mdl_ids)){
			$get_mdl_id[] = array(
							"user_id" => $fetch_get_mdl_ids['UserID'],
							"user_name" =>$fetch_get_mdl_ids['Email_ID']
							);
		}
		
		foreach($get_mdl_id as $mdl_id_data){
			$mdl_id = $mdl_id_data['user_id'];
			$mdl_name = $mdl_id_data['user_name'];
			
			$get_customer_array = array();
			$get_my_user_ids = $conn->query("select * from user_login_master where UserType=1 and parentKingAdmin=$mdl_id");
			while($fetch_get_my_user_ids = mysqli_fetch_assoc($get_my_user_ids)){
				$get_customer_array[] = $fetch_get_my_user_ids['UserID'];
			}

			$get_mdl_percentage = $conn->query("select * from user_master where Id=$mdl_id");
			$fetch_get_mdl_percentage = mysqli_fetch_assoc($get_mdl_percentage);
			$my_mdl_percentage = $fetch_get_mdl_percentage['my_percentage'];
			$my_actual_percentage = 100 - $my_mdl_percentage;
			
			
			
				$get_chip_details = $conn->query("select SUM(bet_result) as total_amount,user_id from bet_details where user_id  IN(".implode(',',$get_customer_array).") and bet_status=0");
			
				$fetch_get_chip_details = mysqli_fetch_assoc($get_chip_details);
				$temp_total_amount = $fetch_get_chip_details['total_amount'];
				
				$upline_percentage = 100 - $my_percentage;
				
				$total_amount = ($temp_total_amount * $my_actual_percentage) / 100;
				
				
				$get_account_information = $conn->query("select SUM(amount) as total_amount,user_id from accounts where user_id =$mdl_id and entry_type = 8 and opp_user_id=$user_id");
				$fetch_get_account_information = mysqli_fetch_assoc($get_account_information);
				$total_ac_amount = $fetch_get_account_information['total_amount'];
				
				$final_settelment_amount = $total_amount - $total_ac_amount;
			$total_cash_amount = $total_cash_amount + $total_ac_amount;
			$total_own_amount = $total_own_amount + $total_amount;
			$total_upline_amount = $total_upline_amount + $upline_amount;
			if($final_settelment_amount >= 0){
				$plus_array[] = array(
									"account_user_id"=>$mdl_id,
									"my_down_actual_percentage"=>$my_mdl_percentage,
									"account_userEmail"=>$mdl_name,
									"total_amount"=>$final_settelment_amount,
									);
			}else{
				
				$minus_array[] = array(
									"account_user_id"=>$mdl_id,
									"my_down_actual_percentage"=>$my_mdl_percentage,
									"account_userEmail"=>$mdl_name,
									"total_amount"=>$final_settelment_amount,
									);
			}

		}
		$total_own_amount = $total_own_amount * (-1);
		
	}
?>


<div class="right_col" role="main" style="min-height: 1171px;">
<div class="">

		<div class="page-title">

			<div class="title_left">

				<h3>Chip Summary of <?php echo  $_SESSION['CONTROLLER_LOGIN_NAME']; ?></h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-6 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_content">
						<div class="table-responsive">
							<h4>Plus Account</h4>
							<table class="table table-striped jambo_table bulk_action" id="">
								<thead>
									<tr class="headings" style="background: #05611a;">
											<th class="column-title" style="display: table-cell;">User Name</th>
											<th class="column-title" style="display: table-cell;">Account</th>
											<th class="column-title" style="display: table-cell;">Chips</th>
											<th class="column-title" style="display: table-cell;"></th>
									</tr>
								</thead>
									
									<tbody id="">
									
									<?php
									$grand_user_amount = 0;
									foreach($plus_array as $plus_data){
										if($plus_data['total_amount'] != 0){
										
									?>
									<tr>
										<td><a href="#" ><?php echo $plus_data['account_userEmail']; ?> <?php
										if($plus_data['my_down_actual_percentage'] != ""){
											
										
										echo " (".$plus_data['my_down_actual_percentage']."%)";
										} ?></a></td>
										<td><?php echo $plus_data['account_userEmail']; ?>  A/C</td>
										<td style="color: #0dd20d;font-weight: 600;"><?php echo number_format($plus_data['total_amount'],2); ?></td>
										<td><a  class="btn btn-success btn-xs" href="credit_debit_downline.php?user_id=<?php echo $plus_data['account_user_id']; ?>&type=8&amount=<?php echo $plus_data['total_amount']; ?>">Settlement</a></td>
									</tr>
									<?php
									$grand_user_amount  = $grand_user_amount + $plus_data['total_amount'];
									}
									}
									?>
									<tr>
										<td><?php echo $_SESSION['CONTROLLER_LOGIN_NAME']; ?></td>
										<td>Cash </td>
										<td><?php echo number_format($total_cash_amount,2); ?></td>
										<td></td>
									</tr>
									<tr>
										<td><?php echo $_SESSION['CONTROLLER_LOGIN_NAME']; ?></td>
										<td>Own</td>
										<td><?php echo number_format($total_own_amount,2); ?></td>
										<td></td>
									</tr>
									<tr class="headings" style="background: #b7b7b7;">
											<th class="column-title" style="display: table-cell;color: #000000;">Total</th>
											<th class="column-title" style="display: table-cell;"></th>
											<th class="column-title" style="display: table-cell;color: #0fa00f;"><?php echo number_format($total_upline_amount + $grand_user_amount+ $total_cash_amount,2); ?></th>
											<th class="column-title" style="display: table-cell;"></th>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_content">
						<div class="table-responsive">
							<h4>Minus Account</h4>
							<table class="table table-striped jambo_table bulk_action" id="">
								<thead>
									<tr class="headings" style="background: #610511;">
											<th class="column-title" style="display: table-cell;">User Name</th>
											<th class="column-title" style="display: table-cell;">Account</th>
											<th class="column-title" style="display: table-cell;">Chips</th>
											<th class="column-title" style="display: table-cell;"></th>
										</tr>

									</thead>

									<tbody id="active_bet_ticker">
									<?php
									$grand_user_amount = 0;
									foreach($minus_array as $minus_data){
									?>
									<tr>
										<td><a href="#" ><?php echo $minus_data['account_userEmail']; ?> <?php
										if($minus_data['my_down_actual_percentage'] != ""){
											
										
										echo " (".$minus_data['my_down_actual_percentage']."%)";
										} ?></a></td>
										<td><?php echo $minus_data['account_userEmail']; ?>  A/C</td>
										<td style="color: #ef0a28;font-weight: 600;"><?php echo number_format($minus_data['total_amount'],2); ?></td>
										<td><a  class="btn btn-danger btn-xs" href="credit_debit_downline.php?user_id=<?php echo $minus_data['account_user_id']; ?>&type=8&amount=<?php echo $minus_data['total_amount']; ?>">Settlement</a></td>
									</tr>
									<?php
									$grand_user_amount  = $grand_user_amount + $minus_data['total_amount'];
									}
									?>
									<tr class="headings" style="background: #b7b7b7;">
											<th class="column-title" style="display: table-cell;color: #000000;">Total</th>
											<th class="column-title" style="display: table-cell;"></th>
											<th class="column-title" style="display: table-cell;color: #ef0a28;"><?php echo number_format($grand_user_amount,2); ?></th>
											<th class="column-title" style="display: table-cell;"></th>
										</tr>
									
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	include("footer.php");
?>
</body>
</html>