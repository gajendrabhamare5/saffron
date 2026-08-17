<?php
include "../../include/conn.php";

$customer_user_id = $_REQUEST['user_name'];
$new_password = $_REQUEST['new_password'];

$check_valid_user = $conn->query("select * from user_login_master where UserID='$customer_user_id'");

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

 
		$p_salt = rand(111111, 999999);
		$site_salt = "huhefcvringybh";
		$salted_hash = hash('sha256', $new_password . $site_salt . $p_salt);
		/* echo "update user_login_master set Password2='$salted_hash', password2_salt='$p_salt',password2_salt_key='$site_salt' where UserID=$customer_user_id"; */
		$change_password = $conn->query("update user_login_master set Password2='$salted_hash', password2_salt='$p_salt',password2_salt_key='$site_salt' where UserID='$userid'");
	

	if ($change_password) {
		$status = "ok";
		$status_message = "Password Changed.";
		$return_array = array(
			"status" => $status,
			"message" => $status_message,
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
