<?php
	include('../include/conn.php');
	include('../include/flip_function.php');

	include "../session.php";
	$user_id = $_SESSION['CLIENT_LOGIN_ID'];
	$get_account_balance = $conn->query("select SUM(`amount`) as total_balance from accounts where user_id=$user_id and status=1");
	$fetch_account_balance = mysqli_fetch_assoc($get_account_balance);
	$account_balance = $fetch_account_balance['total_balance'];
	
	$unmatched_exposure_balance = get_unmatched_expo($conn,$user_id);
		$final_net_exposure = get_total_net_exposure($conn,$user_id);
		$exposure_balance = $final_net_exposure;
		
		$exposure_winning_balance = get_total_only_winning($conn,$user_id);
	//}
	/* $get_exposure_balance = $conn->query("select SUM(`bet_margin_used`) as total_exposure from bet_details where user_id=$user_id and bet_status=1");
	$fetch_exposure_balance = mysqli_fetch_assoc($get_exposure_balance);
	$exposure_balance = $fetch_exposure_balance['total_exposure']; */
	
		$check_plus_expo = $exposure_balance + $unmatched_exposure_balance;
		if($check_plus_expo > 0){
			$current_balance =  number_format($account_balance, 2); 
		}else{
			$current_balance =  number_format($account_balance + $exposure_balance + $unmatched_exposure_balance , 2); 
		}
									
		$exposure_balance = $exposure_balance * (-1);
		$unmatched_exposure_balance = $unmatched_exposure_balance * (-1);
	$return_array = array(
						"status"=>"ok",
						"balance"=>number_format($account_balance,2,'.',''),
						"exposure"=>number_format($exposure_balance + $unmatched_exposure_balance,2,'.',''),
						"winning"=>number_format($exposure_winning_balance,2,'.',''),
						);
echo json_encode($return_array);
?>