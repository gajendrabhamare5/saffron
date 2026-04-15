<?php

include "../include/conn.php";

function generateRandomString($length = 18)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

/* error_reporting(E_ALL);
ini_set("display_errors",1);
ini_set("display_startup_errors",1); */

$maintenance_sql = 'SELECT * FROM `site_under_maintenance` LIMIT 1';
$maintenance_result = mysqli_query($conn, $maintenance_sql);
$row = mysqli_fetch_array($maintenance_result, MYSQLI_ASSOC);



$post_username = $conn->real_escape_string($_POST['username']);
$post_password = $conn->real_escape_string($_POST['password']);

if ($row['site_status'] == 1) {
	$return = array("status" => 'maintenance', 'msg' => 'We are planning to have scheduled maintenance.');
	echo json_encode($return);
	exit();
}

session_start();

$login_ip_addrss = '';
if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
	$login_ip_addrss = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else {
	$login_ip_addrss = gethostbyaddr($_SERVER['REMOTE_ADDR']);
}



$user_agent = $_SERVER['HTTP_USER_AGENT'];

$user_id = 0;

$check_user_name = $conn->query("select * from user_login_master where `Email_ID`='$post_username' and UserType IN (1)");
$row_count = mysqli_num_rows($check_user_name);

if ($row_count <= 0) {
	$return = array(
		"status" => '0',
		"message" => 'Invalid username',
	);
	echo json_encode($return);
	exit();
}


if ($row_count >= 1)  //To check if the row exists
{
	if (true) //fetching the contents of the row
	{

		$row = mysqli_fetch_assoc($check_user_name);
		$UserID = $row['UserID'];
		$Password = $row['Password'];
		$user_password = $row['Password'];
		$user_password_salt = $row['user_password_salt'];
		$user_password_salt_key = $row['user_password_salt_key'];
		$SecretKey = $row['SecretKey'];
		$first_password_changed = $row['first_password_changed'];

		if(empty($user_password_salt) && empty($user_password_salt_key)){
			$p_salt = rand(111111,999999); 
			$new_password = $post_password;
			$site_salt="huhefcvringybh";
			$salted_hash = hash('sha256', $new_password.$site_salt.$p_salt);

			$conn->query("update user_login_master set user_password_salt='$p_salt',user_password_salt_key='$site_salt',Password='$salted_hash' where UserID=$UserID");
			$return = array("status" => '0');
			echo json_encode($return);
			exit();
			
		}

		$salted_hash = hash('sha256', $post_password . $user_password_salt_key . $user_password_salt);
		if ($user_password == $salted_hash) {

			$uid = $UserID;
			$skey = $SecretKey;

			$sql = "SELECT * FROM `user_master` WHERE `Id`=$uid";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$name = $row['Name'];
			$Stat = $row['Status'];
			$auth_user_verification_status = $row['user_verification_status'];
			$auth_user_verification_type = $row['user_verification_type'];

			$get_parent_ids = $conn->query("select * from user_login_master where UserID=$uid");
			$fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
			$parentDL = $fetch_parent_ids['parentDL'];
			$parentMDL = $fetch_parent_ids['parentMDL'];
			$parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
			$parentKingAdmin = $fetch_parent_ids['parentKingAdmin'];

			$get_parentDL_status = $conn->query("select * from user_master where Id=$parentDL");
			$fetch_get_parentDL_status = mysqli_fetch_assoc($get_parentDL_status);
			$dl_status = $fetch_get_parentDL_status['Status'];

			$get_parentMDL_status = $conn->query("select * from user_master where Id=$parentMDL");
			$fetch_get_parentMDL_status = mysqli_fetch_assoc($get_parentMDL_status);
			$mdl_status = $fetch_get_parentMDL_status['Status'];

			$get_parentSMDL_status = $conn->query("select * from user_master where Id=$parentSuperMDL");
			$fetch_get_parentSMDL_status = mysqli_fetch_assoc($get_parentSMDL_status);
			$smdl_status = $fetch_get_parentSMDL_status['Status'];

			$get_parentKingAdmin_status = $conn->query("select * from user_master where Id=$parentKingAdmin");
			$fetch_get_parentKingAdmin_status = mysqli_fetch_assoc($get_parentKingAdmin_status);
			$kingadmin_status = $fetch_get_parentKingAdmin_status['Status'];

			if ($Stat == "1" and $dl_status == "1" and $mdl_status == "1" and $smdl_status == "1" and $kingadmin_status == "1") {
				if ($skey == "") {
					if($auth_user_verification_status == "ENABLED"){

						if($auth_user_verification_type == "Telegram"){
							$data = array(
								'user_id' => $uid,
							);
						
						
							// Encode the data to JSON
							$jsonData = json_encode($data);
						
							// URL to which the request is sent
							$url = AUTH_CODE_URL.'verification/telegram_generate_otp';
							$curl = curl_init();
							curl_setopt_array($curl, array(
								CURLOPT_URL => $url,
								CURLOPT_RETURNTRANSFER => true,
								CURLOPT_SSL_VERIFYPEER => 0,
								CURLOPT_SSL_VERIFYHOST => 0,
								CURLOPT_POSTFIELDS => $jsonData,
								CURLOPT_HTTPHEADER => array(
									"content-type: application/json",
								),
							));
						
							$response = curl_exec($curl);
							$err = curl_error($curl);
						
							if (curl_errno($curl)) {
								$return = array(
									"status" => 'telegram_error',
									"message" => curl_error($curl),
								);
								echo json_encode($return);
								exit();
							}
							curl_close($curl);
							$response = (array)json_decode($response);
						
							if (!$response['status']) {
								$return = array(
									"status" => 'telegram_error',
									"message" => $response['message'],
								);
								echo json_encode($return);
								exit();
							}
						}
						$_SESSION['CLIENT_AUTH_STATUS'] = true;
						$_SESSION['CLIENT_AUTH_UID'] = $uid;
						$return = array(
							"status" => "auth",
							"user_auth_id" => $uid,
						);
						echo json_encode($return);
						exit();
					}
					
					$date_time = date("Y-m-d H:i:s");
					$conn->query("insert into login_ip_address(user_id,ip_address,login_date_time,user_agent) VALUES($uid,'$login_ip_addrss','$date_time','$user_agent')");
					$conn->query("insert into activity_log(user_id,username,ip_address,user_agent,date_time,log_type) VALUES($uid,'$post_username','$login_ip_addrss','$user_agent','$date_time','login')");

					$_SESSION['CLIENT_LOGIN_STATUS'] = true;
					$_SESSION['CLIENT_LOGIN_ID'] = $uid;
					$_SESSION['CLIENT_LOGIN_NAME'] = $name;
					$_SESSION['FIRST_PASSWORD_CHANGED'] = $first_password_changed;

					$str = rand();
					$login_random_string = md5($str);
					$_SESSION['LOGIN_ENC_ID'] = base64_encode($uid);
					$_SESSION['LOGIN_STRING'] = $login_random_string;

					$first_two_character = substr($name, 0, 2);

					$generate_radom = generateRandomString();
					$api_auth_token = "$first_two_character" . $generate_radom;
					$api_auth_token = strtoupper($api_auth_token);

					$conn->query("UPDATE `user_login_master` SET `loginString` = '$login_random_string',api_auth_token='$api_auth_token' where Id=$uid");

					$return = array(
						"status" => $uid,
						"login_id" => base64_encode($uid),
						"login_string" => $login_random_string,
						"first_password_changed" => $first_password_changed,
					);
					echo json_encode($return);
				} else {
					$_SESSION['temp_id'] = $uid;
					$return = array("status" => 'skey');
					echo json_encode($return);
				}
			} else {
				$return = array("status" => 'NA');
				echo json_encode($return);
			}
		} else {
			$return = array("status" => '0');
			echo json_encode($return);
		}
	}
} else {
	$return = array("status" => '0');
	echo json_encode($return);
}
