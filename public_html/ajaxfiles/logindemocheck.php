<?php
$printt=array();
$printt['before']=date("Y-m-d H:i:s");
include "../include/conn.php";
$printt['after']=date("Y-m-d H:i:s");
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


$printt['main']=date("Y-m-d H:i:s");

$maintenance_sql = 'SELECT * FROM `site_under_maintenance` LIMIT 1';
$maintenance_result = mysqli_query($conn, $maintenance_sql);
$row = mysqli_fetch_array($maintenance_result, MYSQLI_ASSOC);
$printt['after1']=date("Y-m-d H:i:s");


$post_username = $conn->real_escape_string($_POST['username']);
$post_password = $conn->real_escape_string($_POST['password']);

$post_username = LOGINDEMONAME;
$post_password = LOGINDEMOPASS;

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
$printt['username']=date("Y-m-d H:i:s");

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

			$printt['parent']=date("Y-m-d H:i:s");
			if ($Stat == "1" and $dl_status == "1" and $mdl_status == "1" and $smdl_status == "1" and $kingadmin_status == "1") {
				if (empty($skey)) {

					if($uid == LOGINDEMOID){
						$printt['inlogin']=date("Y-m-d H:i:s");
						$demoIDD=LOGINDEMOID;
						$today_date=date("Y-m-d");
						$date_con=" and date(bet_time) >= '$today_date'";
						$date_con="";
						$fetch_all_bets=$conn->query("SELECT GROUP_CONCAT(bet_id) as all_bets FROM `bet_details` where bet_status in (0,2) $date_con and user_id='$demoIDD'"); 
						$data_bets=mysqli_fetch_assoc($fetch_all_bets);
						$all_bets=$data_bets['all_bets'];
						if(!empty($all_bets)){
							$conn->query("delete from accounts where bet_id in ($all_bets) and game_type='0'");
							$conn->query("delete from accounts_temp where bet_id in ($all_bets) and game_type='0'");
						}
						$printt['delete_bet']=date("Y-m-d H:i:s");

						$fetch_all_casino_bets=$conn->query("SELECT GROUP_CONCAT(bet_id) as all_casino_bets FROM `bet_teen_details` where bet_status in (0,2) $date_con and user_id='$demoIDD'");
						$data_casino_bets=mysqli_fetch_assoc($fetch_all_casino_bets);
						$all_casino_bets=$data_casino_bets['all_casino_bets'];
						if(!empty($all_casino_bets)){
							$conn->query("delete from accounts where bet_id in ($all_casino_bets) and game_type='1'");
							$conn->query("delete from accounts_temp where bet_id in ($all_casino_bets) and game_type='1'");
						}
						$printt['delete_casio']=date("Y-m-d H:i:s");
						$conn->query("delete from exposure_details where user_id='$demoIDD'");
						$conn->query("update bet_details set bet_status=2 where user_id='$demoIDD' and bet_status in (0,1) $date_con");
						$conn->query("update bet_teen_details set bet_status=2 where user_id='$demoIDD' and bet_status in (0,1) $date_con");
						$printt['update']=date("Y-m-d H:i:s");
					}

					
					$date_time = date("Y-m-d H:i:s");
					$conn->query("insert into login_ip_address(user_id,ip_address,login_date_time,user_agent) VALUES($uid,'$login_ip_addrss','$date_time','$user_agent')");
					$printt['ipadd']=date("Y-m-d H:i:s");
					$_SESSION['CLIENT_LOGIN_STATUS'] = true;
					$_SESSION['CLIENT_LOGIN_ID'] = $uid;
					$_SESSION['CLIENT_LOGIN_NAME'] = $name;
					$_SESSION['FIRST_PASSWORD_CHANGED'] = $first_password_changed;

					$str = rand();
					$login_random_string = "";
					$_SESSION['LOGIN_ENC_ID'] = base64_encode($uid);
					$_SESSION['LOGIN_STRING'] = "$login_random_string";

					$first_two_character = substr($name, 0, 2);

					$generate_radom = generateRandomString();
					$api_auth_token = "$first_two_character" . $generate_radom;
					$api_auth_token = strtoupper($api_auth_token);

					$conn->query("UPDATE `user_login_master` SET `loginString` = '$login_random_string',api_auth_token='$api_auth_token' where Id=$uid");
					$printt['update user']=date("Y-m-d H:i:s");
					$return = array(
						"status" => $uid,
						"login_id" => base64_encode($uid),
						"login_string" => $login_random_string,
						"first_password_changed" => $first_password_changed,
						"printt" => $printt,
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
