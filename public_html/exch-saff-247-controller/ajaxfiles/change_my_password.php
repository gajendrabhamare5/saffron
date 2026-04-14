<?php
include('../../include/conn.php');
include "../session.php";
/* error_reporting(E_ALL);
ini_set('display_errros',1);
ini_set('display_startup_errros',1); */
$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];

$current_password = $_REQUEST['current_password'];
$new_password = $_REQUEST['new_password'];
$confirm_password = $_REQUEST['confirm_password'];
if($current_password == ""){
		$return_array = array(
			"status" =>"error",
			"message"=>"Please Enter Current Password",
		);
		echo json_encode($return_array);
		exit();	
}
if($new_password == ""){
		$return_array = array(
			"status" =>"error",
			"message"=>"Please Enter New Password",
		);
		echo json_encode($return_array);
		exit();	
}
if($confirm_password == ""){
		$return_array = array(
			"status" =>"error",
			"message"=>"Please Enter Confirm Password",
		);
		echo json_encode($return_array);
		exit();	
}
if($new_password != $confirm_password){
		$return_array = array(
			"status" =>"error",
			"message"=>"Password and Confirm Password is not matched.",
		);
		echo json_encode($return_array);
		exit();	
}

$new_password1 = $_REQUEST['new_password'];
$len = strlen($new_password1);
	if($len < 6){
		$return_array = array(
			"status"=>'error',
			"message"=>'Password must have 6 character',
		);	
		echo json_encode($return_array);
		exit();	
	}
	
	 if (!preg_match("#[0-9]+#", $new_password1)) {
        $errors = "Password must include at least one number!";
		$return_array = array(
			"status"=>'error',
			"message"=>$errors,
		);	
		echo json_encode($return_array);
		exit();	
    }
	
	 if (!preg_match("#[a-zA-Z]+#", $new_password1)) {
        $errors = "Password must include at least one letter!";
		$return_array = array(
			"status"=>'error',
			"message"=>$errors,
		);	
		echo json_encode($return_array);
		exit();	
    } 

	$check_current_password = $conn->query("select * from user_login_master where UserID=$user_id");
	$row = mysqli_fetch_assoc($check_current_password);
	$Password = $row['Password'];
	$user_password = $row['Password'];
	$user_password_db = $row['Password2'];
	$Password2_salt = $row['password2_salt'];
	$Password2_salt_key = $row['password2_salt_key'];
	$user_type = $row['UserType'];
	$user_password_salt = $row['user_password_salt'];
	$user_password_salt_key = $row['user_password_salt_key'];
	$skey = $row['SecretKey'];
	$SecretKey = $row['SecretKey'];
	$salted_hash = hash('sha256',$current_password.$Password2_salt_key.$Password2_salt);
	$curr_pass_num_rows = $check_current_password->num_rows;
if($user_password_db!=$salted_hash){
	$return_array = array(
			"status" =>"error",
			"message"=>"Current Password is wrong.",
			//"message"=>"select * from user_login_master where UserID=$user_id and Password='$current_password'",
		);
		echo json_encode($return_array);
		exit();	
}
	$p_salt = rand(111111,999999); 
	$new_password = $new_password;
	$site_salt="huhefcvringybh";
	$salted_hash = hash('sha256', $new_password.$site_salt.$p_salt);

	$change_password = $conn->query("update user_login_master set password2_salt='$p_salt',password2_salt_key='$site_salt',Password2='$salted_hash' where UserID=$user_id");


if($change_password){
	$return_array = array(
			"status" =>"ok",
			"message"=>"Password Changed.",
		);
		echo json_encode($return_array);
		exit();	
}else{
	$return_array = array(
			"status" =>"error",
			"message"=>"Something went wrong, please try again.",
		);
		echo json_encode($return_array);
		exit();	
}
