<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 	
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];	
	if($login_type != 5){		header("Location: ../logout.php");	}
	$customer_user_id = $_REQUEST['user_name'];
	$new_password = $_REQUEST['new_password'];
	$new_password = md5($new_password);
	if($login_type == 5){
		$check_valid_user = $conn->query("select * from user_login_master where  UserID=$customer_user_id");
	}
	$num_rows = $check_valid_user->num_rows;
	if($num_rows == 0){
		//redirect
		$status = "error";
		$status_message = "Invalid User.";
		$return_array =array(
					"status"=>$status,
					"message"=>$status_message,
					);
		echo json_encode($return_array);
		exit();
	}else{
		
		
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
	
		$update=$conn->query("update user_login_master set Password='$new_password'	where UserID=$customer_user_id");
		if($update){
			$status = "ok";
			$status_message = "Password Changed.";
			$return_array =array(
						"status"=>$status,
						"message"=>$status_message,
						);
			echo json_encode($return_array);
			exit();
		}else{
			$status = "error";
			$status_message = "Something went wrong, please try again.";
			$return_array =array(
						"status"=>$status,
						"message"=>$status_message,
						);
			echo json_encode($return_array);
			exit();
		}
	}