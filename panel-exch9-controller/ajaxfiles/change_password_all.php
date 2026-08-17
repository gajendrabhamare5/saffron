<?php
include "../../include/conn.php";
include "../session.php";

$userid = $_REQUEST['userid'];
$usertype = $_REQUEST['usertype'];
$option_type = $_REQUEST['option_type'];
$customer_user_id = $_REQUEST['user_name'];
$new_password = $_REQUEST['new_password'];
	 include "../../include/function.php";
$_REQUEST = check_variable_for_datatable($conn, $_REQUEST);
$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 	
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];	
	if($login_type != 5){		header("Location: ../logout.php");	}

/* $new_password = md5($new_password); */
if ($login_type == 5) {

$check_valid_user = $conn->query("select * from user_login_master where UserID='$userid' AND Email_ID='$customer_user_id'");
}
$num_rows = $check_valid_user->num_rows;
if ($num_rows == 0) {
	//redirect
	$status = "error";
	$status_message = "Invalid User.";
	$return_array = array(
		"status" => $status,
		"message" => $status_message,
	);
	echo json_encode($return_array);
	exit();
} else {


	$new_password1 = $_REQUEST['new_password'];
	$len = strlen($new_password1);
	if ($len < 6) {
		$return_array = array(
			"status" => 'error',
			"message" => 'Password must have 6 character',
		);
		echo json_encode($return_array);
		exit();
	}

	if (!preg_match("#[0-9]+#", $new_password1)) {
		$errors = "Password must include at least one number!";
		$return_array = array(
			"status" => 'error',
			"message" => $errors,
		);
		echo json_encode($return_array);
		exit();
	}

	if (!preg_match("#[a-zA-Z]+#", $new_password1)) {
		$errors = "Password must include at least one letter!";
		$return_array = array(
			"status" => 'error',
			"message" => $errors,
		);
		echo json_encode($return_array);
		exit();
	}

 $transaction_password_random = "";
 
	/* if ($usertype == 5 && $option_type == 1) {
		$p_salt = rand(111111, 999999);
		$site_salt = "huhefcvringybh";
		$salted_hash = hash('sha256', $new_password . $site_salt . $p_salt);

		$transaction_password_random = rand(111111, 999999);

		$p_salt1 = rand(111111, 999999);
		$site_salt1 = "huhefcvringybh";
		$salted_hash1 = hash('sha256', $transaction_password_random . $site_salt1 . $p_salt1);

		
		$change_password = $conn->query("update user_login_master set Password='$salted_hash',user_password_salt_key= '$site_salt',user_password_salt='$p_salt',transaction_password = '$salted_hash1',transaction_password_salt='$p_salt1',transaction_password_salt_key='$site_salt1' where UserID='$userid'");
	} else if (($usertype == 5 || $usertype == 10) && $option_type == 2) {
		$p_salt = rand(111111, 999999);
		$site_salt = "huhefcvringybh";
		$salted_hash = hash('sha256', $new_password . $site_salt . $p_salt);
		
		$change_password = $conn->query("update user_login_master set Password2='$salted_hash', password2_salt='$p_salt',password2_salt_key='$site_salt' where UserID='$userid'");
	} else  */
	if ($usertype != 1) {
		$p_salt = rand(111111, 999999);
		$site_salt = "huhefcvringybh";
		$salted_hash = hash('sha256', $new_password . $site_salt . $p_salt);

		$transaction_password_random = rand(111111, 999999);

		$p_salt1 = rand(111111, 999999);

		$site_salt1 = "huhefcvringybh";
		$salted_hash1 = hash('sha256', $transaction_password_random . $site_salt1 . $p_salt1);
		/* echo "update user_login_master set Password='$salted_hash',user_password_salt_key='$site_salt',user_password_salt='$p_salt',transaction_password = '$salted_hash1',transaction_password_salt='$p_salt1',transaction_password_salt_key='$site_salt1' where UserID='$userid'"; */
		$change_password = $conn->query("update user_login_master set Password='$salted_hash',user_password_salt_key='$site_salt',user_password_salt='$p_salt',transaction_password = '$salted_hash1',transaction_password_salt='$p_salt1',transaction_password_salt_key='$site_salt1' where UserID='$userid'");
	} else {

		$p_salt = rand(111111, 999999);
		$site_salt = "huhefcvringybh";
		$salted_hash = hash('sha256', $new_password . $site_salt . $p_salt);
		/* echo "update user_login_master set Password='$salted_hash', user_password_salt='$p_salt',user_password_salt_key='$site_salt' where UserID='$userid'"; */
		$change_password = $conn->query("update user_login_master set Password='$salted_hash', user_password_salt='$p_salt',user_password_salt_key='$site_salt' where UserID='$userid'");
	}

	if ($change_password) {
		$status = "ok";
		$status_message = "Password Changed.";
		$return_array = array(
			"status" => $status,
			"message" => $status_message,
			"transaction_password" => $transaction_password_random
		);
		echo json_encode($return_array);
		exit();
	} else {
		$status = "error";
		$status_message = "Something went wrong, please try again.";
		$return_array = array(
			"status" => $status,
			"message" => $status_message,
		);
		echo json_encode($return_array);
		exit();
	}
}
