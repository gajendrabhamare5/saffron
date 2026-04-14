
<div class="row tile_count">
<div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
<span class="count_top"><i class="fa fa-users"></i> Total D/L</span>
<div class="count">
<?php
include "session.php";
$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 

	$get_count_user = $conn->query("select COUNT(*) as my_d_l_line from user_login_master where parentController = $user_id and UserType=7");
	$fetch_count_user = mysqli_fetch_assoc($get_count_user);
	if($fetch_count_user['my_d_l_line'] == ""){
		echo 0;
	}else{
		echo $fetch_count_user['my_d_l_line'];
	}

?>
</div>

</div>

<div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
<span class="count_top"><i class="fa fa-money"></i> My Points</span>
<div class="count"><?php
$get_account_balance_1 = $conn->query("select SUM(`amount`) as total_balance from accounts where user_id=$user_id and status=1");
		$fetch_account_balance_1 = mysqli_fetch_assoc($get_account_balance_1);
		
		$account_balance_1 = $fetch_account_balance_1['total_balance'];
		if($account_balance_1 == null){
			$account_balance_1 = 00;
		}
		echo number_format($account_balance_1,2);
?></div>

</div>
<div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
<span class="count_top"><i class="fa fa-money"></i> Downline Points</span>
<div class="count">
<?php

	$get_users_under = $conn->query("select UserID	 from user_login_master where parentController = $user_id ");
	$get_users = mysqli_fetch_all($get_users_under);
	$myfield_arr = array_column($get_users, 0);
	$myfield_arr = implode(',', $myfield_arr);
	
	$get_account_balance_12 = $conn->query("select SUM(`amount`) as total_balance from accounts where user_id IN ($myfield_arr) and 	status=1");
		$fetch_account_balance_12 = mysqli_fetch_assoc($get_account_balance_12);
		$account_balance_2 = $fetch_account_balance_12['total_balance'];
		if($account_balance_2 == null){
			$account_balance_2 = 00;
		}
		echo number_format($account_balance_2,2);


?>
</div>

</div>
</div>