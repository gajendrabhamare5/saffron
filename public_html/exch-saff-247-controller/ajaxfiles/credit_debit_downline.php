<?php

	include "../../include/conn.php";

	include "../session.php";

	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$controller_controller_type = 	$_SESSION['CONTROLLER_CONTROLLER_TYPE'];
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

	$user_name = $_REQUEST['user_name'];

	$transaction_type = intval($_REQUEST['transaction_type']);
	

	$transaction_points = $_REQUEST['transaction_points'];

	$transaction_time = date("Y-m-d H:i:s");
	$entry_transaction_time = date("d-m-Y H:i:s");

	

	$get_customer_name = $conn->query("select * from user_login_master where UserID=$user_name");

	$fetch_customer_name = mysqli_fetch_assoc($get_customer_name);

	$transaction_customer_name = $fetch_customer_name['Email_ID'];

	

	$get_login_name = $conn->query("select * from user_login_master where UserID=$user_id");

	$fetch_login_name = mysqli_fetch_assoc($get_login_name);

	$login_name = $fetch_login_name['Email_ID'];

	

	

	if($transaction_type == 1){

		//deposit

		$get_account_balance_1 = $conn->query("select SUM(`amount`) as total_balance from accounts where user_id=$user_id and status=1");

		$fetch_account_balance_1 = mysqli_fetch_assoc($get_account_balance_1);

		$account_balance_1 = $fetch_account_balance_1['total_balance'];

		if($account_balance_1 == null){

			$account_balance_1 = 00;

		}

		

		if($account_balance_1 < $transaction_points){

			$return_array = array(

								"status"=>"error",

								"message"=>"You don't have sufficient funds."

								);

			echo json_encode($return_array);

			exit();

		}

		$account_description = "#Deposit From - $login_name at $entry_transaction_time";

		$insert_deposit_entry = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$user_name','$user_id','$account_description','0','$transaction_points','Credit','1','$transaction_time','1')");

		$insert_deposit_id = $conn->insert_id;

		

		$account_description_2 = "#Withdraw From - $login_name and Deposit To $transaction_customer_name at $entry_transaction_time";

		$insert_withdraw_entry = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$user_id','$user_name','$account_description_2','0','-$transaction_points','Debit','2','$transaction_time','1')");

		$insert_withdraw_id = $conn->insert_id;

		

		if($insert_deposit_id != 0 && $insert_withdraw_id != 0){

			$return_array = array(

								"status"=>"ok",

								"message"=>"Deposit Transaction done."

								);

			echo json_encode($return_array);

			exit();

		}else{

			$conn->query("delete from accounts where account_id=$insert_deposit_id");

			$conn->query("delete from accounts where account_id=$insert_withdraw_id");

			$return_array = array(

								"status"=>"error",

								"message"=>"Something went wrong, please try again."

								);

			echo json_encode($return_array);

			exit();

		}

		

	}else if($transaction_type == 8 or $transaction_type == '8'){
		// settelement
		$get_account_balance = $conn->query("select SUM(`amount`) as total_balance from accounts where user_id=$user_name and status=1");

		$fetch_account_balance = mysqli_fetch_assoc($get_account_balance);

		$account_balance = $fetch_account_balance['total_balance'];

		if($account_balance == null){

			$account_balance = 00;

		}
		
		if($login_type == 2){

			$total_used_exposure = 0;
			$get_net_exposure_balance = $conn->query("select SUM(exposure_amount) as total_used_exposure from exposure_details where user_id=$user_name");
			$fetch_get_net_exposure_balance = mysqli_fetch_assoc($get_net_exposure_balance);
			$total_used_exposure = $fetch_get_net_exposure_balance['total_used_exposure'];
			$account_balance = $account_balance + $total_used_exposure;

			$total_used_unmatched_exposure = 0;
			$get_unmatched_exposure = $conn->query("select SUM(bet_margin_used) as total_used_unmatched_exposure from unmatched_bet_details where user_id=$user_name");
			$fetch_get_unmatched_exposure = mysqli_fetch_assoc($get_unmatched_exposure);
			$total_used_unmatched_exposure = $fetch_get_unmatched_exposure['total_used_unmatched_exposure'];
			$account_balance = $account_balance - $total_used_unmatched_exposure;
		}

	
		
		
		if($account_balance < $transaction_points){

			$return_array = array(

								"status"=>"error",

								"message"=>"This customer don't have sufficient funds."

								);

			echo json_encode($return_array);

			exit();

		}

		
		if($transaction_points > 0){
			$account_description = "#Settlement Deposit From - $transaction_customer_name at $entry_transaction_time";

			$insert_deposit_entry = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$user_id','$user_name','$account_description','0','$transaction_points','Credit','8','$transaction_time','1')");

			$insert_deposit_id = $conn->insert_id;

			

			$account_description_2 = "#Settlement Withdraw  To - $transaction_customer_name at $entry_transaction_time";

			$insert_withdraw_entry = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$user_name','$user_id','$account_description_2','0','-$transaction_points','Debit','8','$transaction_time','1')");

			$insert_withdraw_id = $conn->insert_id;
		}else{
			$account_description = "#Settlement Withdraw From - $transaction_customer_name at $entry_transaction_time";
			$transaction_points = str_replace("-","",$transaction_points);
			$insert_deposit_entry = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$user_id','$user_name','$account_description','0','-$transaction_points','Debit','8','$transaction_time','1')");

			$insert_deposit_id = $conn->insert_id;

			

			$account_description_2 = "#Settlement Deposit To - $transaction_customer_name at $entry_transaction_time";

			$insert_withdraw_entry = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$user_name','$user_id','$account_description_2','0','$transaction_points','Credit','8','$transaction_time','1')");

			$insert_withdraw_id = $conn->insert_id;
		}
		

		if($insert_deposit_id != 0 && $insert_withdraw_id != 0){

			$return_array = array(

								"status"=>"ok",

								"message"=>"Settlement Transaction done."

								);

			echo json_encode($return_array);

			exit();

		}else{

			$conn->query("delete from accounts where account_id=$insert_deposit_id");

			$conn->query("delete from accounts where account_id=$insert_withdraw_id");

			$return_array = array(

								"status"=>"error",

								"message"=>"Something went wrong, please try again."

								);

			echo json_encode($return_array);

			exit();

		}
	}else{

		//withdraw

		$get_account_balance = $conn->query("select SUM(`amount`) as total_balance from accounts where user_id=$user_name and status=1");

		$fetch_account_balance = mysqli_fetch_assoc($get_account_balance);

		$account_balance = $fetch_account_balance['total_balance'];

		if($account_balance == null){

			$account_balance = 00;

		}

		
if($login_type == 2){

			$total_used_exposure = 0;
			$get_net_exposure_balance = $conn->query("select SUM(exposure_amount) as total_used_exposure from exposure_details where user_id=$user_name");
			$fetch_get_net_exposure_balance = mysqli_fetch_assoc($get_net_exposure_balance);
			$total_used_exposure = $fetch_get_net_exposure_balance['total_used_exposure'];
			$account_balance = $account_balance + $total_used_exposure;

			$total_used_unmatched_exposure = 0;
			$get_unmatched_exposure = $conn->query("select SUM(bet_margin_used) as total_used_unmatched_exposure from unmatched_bet_details where user_id=$user_name");
			$fetch_get_unmatched_exposure = mysqli_fetch_assoc($get_unmatched_exposure);
			$total_used_unmatched_exposure = $fetch_get_unmatched_exposure['total_used_unmatched_exposure'];
			$account_balance = $account_balance - $total_used_unmatched_exposure;
		}
		if($account_balance < $transaction_points){

			$return_array = array(

								"status"=>"error",

								"message"=>"This customer don't have sufficient funds."

								);

			echo json_encode($return_array);

			exit();

		}

		

		$account_description = "#Deposit From - $transaction_customer_name at $entry_transaction_time";

		$insert_deposit_entry = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$user_id','$user_name','$account_description','0','$transaction_points','Credit','1','$transaction_time','1')");

		$insert_deposit_id = $conn->insert_id;

		

		$account_description_2 = "#Withdraw To - $transaction_customer_name at $entry_transaction_time";

		$insert_withdraw_entry = $conn->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$user_name','$user_id','$account_description_2','0','-$transaction_points','Debit','2','$transaction_time','1')");

		$insert_withdraw_id = $conn->insert_id;

		

		if($insert_deposit_id != 0 && $insert_withdraw_id != 0){

			$return_array = array(

								"status"=>"ok",

								"message"=>"Withdraw Transaction done."

								);

			echo json_encode($return_array);

			exit();

		}else{

			$conn->query("delete from accounts where account_id=$insert_deposit_id");

			$conn->query("delete from accounts where account_id=$insert_withdraw_id");

			$return_array = array(

								"status"=>"error",

								"message"=>"Something went wrong, please try again."

								);

			echo json_encode($return_array);

			exit();

		}

	}

?>