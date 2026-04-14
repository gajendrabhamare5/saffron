<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 	
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];	
	if($login_type != 5){		
		header("Location: ../logout.php");	
	}
	
	function generateRandomString($length = 18) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
	$user_type = $_REQUEST['user_type'];
	$new_user_id = $_REQUEST['user_id'];
	
	$sql = "SELECT * FROM `user_master` WHERE `Id`=$new_user_id";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$name = $row['Name'];
	$is_casino = $row['is_casino'];
	
	if($user_type == 2 || $user_type == 3 || $user_type == 4 or $user_type == 7){
		$_SESSION['DL_LOGIN_STATUS']=true;
		$_SESSION['DL_LOGIN_ID']=$new_user_id;
		$_SESSION['DL_LOGIN_NAME']=$name;
		$_SESSION['LOGIN_SESSION_TYPE']=$user_type;
		$_SESSION['CASINO_ALLOWED']=$is_casino;
		$_SESSION['MAINTENANCE_ACCESS']=1;
		$return_array=array(
						"status"=>"ok",
						"url"=>"/dl-agent/index",
						);
		
	}
	else if($user_type == 1){
		
		
		$_SESSION['CLIENT_LOGIN_STATUS']=true;
		$_SESSION['CLIENT_LOGIN_ID']=$new_user_id;
		$_SESSION['CLIENT_LOGIN_NAME']=$name;
		$_SESSION['CASINO_ALLOWED']=$is_casino;
		$_SESSION['FIRST_PASSWORD_CHANGED']=1;
		$_SESSION['MAINTENANCE_ACCESS']=1;
		$_SESSION['IS_LOGOUT']=true;
		
		$str = rand();
						$login_random_string = md5($str);
						$_SESSION['LOGIN_ENC_ID'] = base64_encode($new_user_id);
						$_SESSION['LOGIN_STRING'] = $login_random_string;
						
			$first_two_character = substr($name,0,2);
		$generate_radom = generateRandomString();
		$api_auth_token = "$first_two_character".$generate_radom;
		$api_auth_token = strtoupper($api_auth_token);

		/* $conn->query("UPDATE `user_login_master` SET `loginString` = '$login_random_string',api_auth_token='$api_auth_token' where Id=$new_user_id"); */


		$return_array=array(
						"status"=>"ok",
						"url"=>"/index",
						);
		
	}else{
		$return_array = array(
						"status"=>"error",
						"message"=>"Invalid type.",
						);
	}
	
	echo json_encode($return_array);
?>