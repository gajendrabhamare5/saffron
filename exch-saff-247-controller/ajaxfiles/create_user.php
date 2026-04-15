<?php
	include "../../include/conn.php";
	include "../session.php";
	
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];	
	
	if($login_type != 5){		
		header("Location: ../logout.php");	
	}
	
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_login_id = $_POST['user_login_id'];
	$user_number = $_POST['user_number'];
	$user_password = $_POST['user_password'];
	$user_status = $_POST['user_status'];
	$bet_delete_status = $_POST['bet_delete_status'];
	$is_usd_status = $_POST['is_usd_status'];
	$is_casino = $_POST['is_casino'];
	$my_percentage = $_POST['my_percentage'];
	$user_password = md5($user_password);
	
	$current_date = date('Y-m-d');
	
	$check_duplicate_login = $conn->query("select * from user_login_master where  Email_ID='$user_login_id'");
	$duplicate_num_rows = $check_duplicate_login->num_rows;
	
		
$new_password1 = $_REQUEST['user_password'];
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
	
	if($duplicate_num_rows > 0){
		$status = "error";
		$status_message = "Duplicate User Login ID, Please Enter another one.";
	}else{
		$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
		if($login_type == 5){
			$insert_user = $conn->query("insert into user_master (`Name`,`Email_ID`,`Phone`,`Country`,`Join_Date`,`Status`,bet_delete_status,is_usd,is_casino,my_percentage) Values ('$user_name','$user_email','$user_number','UK','$current_date','$user_status',$bet_delete_status,$is_usd_status,$is_casino,$my_percentage)");
			$insert_user_id = $conn->insert_id;
			
			$inser_login = $conn->query("insert into user_login_master (`UserID`,`UserType`,`Email_ID`,`Password`,`parentDL`,`parentMDL`,`parentSuperMDL`,`parentKingAdmin`,`parentController`) Values('$insert_user_id','7','$user_login_id','$user_password',0,0,0,0,'$user_id')");
		}
		
		
		if($insert_user_id != 0){
			$status_message = "King Admin Created";
			$status = "ok";
		}else{
			$status = "error";
			$status_message = "Something went wrong, please try again.";
		}
	}
	
	$return_array =array(
					"status"=>$status,
					"message"=>$status_message,
					);
	echo json_encode($return_array);
?>