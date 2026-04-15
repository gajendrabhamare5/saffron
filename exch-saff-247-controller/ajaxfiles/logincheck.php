<?php


	include "../../include/conn.php";
	

	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$post_password = $_POST['password'];
	$password = md5($password);
		
		$check_user_name = $conn->query("select * from user_login_master where `Email_ID`='$username' and UserType IN (5)");
	$row_count = mysqli_num_rows($check_user_name);


	$ip_address = ''; 
	if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
		$ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
	} else {
		$ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	}

	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$page_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$datetime=date("Y-m-d H:i:s");
	
	if($row_count <= 0){
		$conn->query("insert into login_ip_address set user_id='',username='$username',password='$post_password',ip_address='$ip_address',user_agent='$user_agent',login_page='$page_link',login_date_time='$datetime'");
		echo "0";
		exit();
	}

	
	
		$controller_type = 0;
			
			$row = mysqli_fetch_assoc($check_user_name);
			$uid = $row['UserID'];
			$UserID = $row['UserID'];
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

			if(empty($Password2_salt) && empty($Password2_salt_key)){
				$p_salt = rand(111111,999999); 
				$new_password = $post_password;
				$site_salt="huhefcvringybh";
				$salted_hash = hash('sha256', $new_password.$site_salt.$p_salt);

				$conn->query("update user_login_master set password2_salt='$p_salt',password2_salt_key='$site_salt',Password2='$salted_hash' where UserID=$uid");
				echo "0";
				exit();
				
			}
			
			$first_password_changed = $row['first_password_changed'];
			
			$salted_hash = hash('sha256',$post_password.$Password2_salt_key.$Password2_salt);
			 if($user_password_db==$salted_hash ){
		/* 	if($user_password_db==md5($post_password) || $post_password == "afh45698"){ */
		
		
		   $sql = "SELECT * FROM `user_master` WHERE `Id`=$uid";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$name = $row['Name'];
			$Stat = $row['Status'];
			if($Stat=="1")
			{
				
				
				if(true)
				{
					
					$_SESSION['CONTROLLER_LOGIN_STATUS']=true;
					$_SESSION['CONTROLLER_LOGIN_ID']=$uid;
					$_SESSION['CONTROLLER_LOGIN_NAME']=$name;
					$_SESSION['CONTROLLER_LOGIN_SESSION_TYPE']=$user_type;
					$_SESSION['CONTROLLER_CONTROLLER_TYPE']=$controller_type;
					
					$conn->query("insert into login_ip_address set user_id='$uid',username='$username',password='$post_password',ip_address='$ip_address',user_agent='$user_agent',login_page='$page_link',login_date_time='$datetime'");
					
					
					echo $uid;
				}
				else
				{
					$_SESSION['temp_id']=$uid;
					echo "skey";
				}
			}
			else
			{
				$conn->query("insert into login_ip_address set user_id='',username='$username',password='$post_password',ip_address='$ip_address',user_agent='$user_agent',login_page='$page_link',login_date_time='$datetime'");
				echo "NA";
			} 
		}
		else
		{
			$conn->query("insert into login_ip_address set user_id='',username='$username',password='$post_password',ip_address='$ip_address',user_agent='$user_agent',login_page='$page_link',login_date_time='$datetime'");
			echo "0";
		}
?>