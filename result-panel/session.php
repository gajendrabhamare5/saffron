<?php
	ini_set('session.gc_maxlifetime', 30*60);
	session_start();
	
	if(isset($_SESSION['CONTROLLER_LOGIN_STATUS']))
	{
		if(isset($_SESSION['CONTROLLER_LOGIN_ID']))
		{
			$user_id_chkk = $_SESSION['CONTROLLER_LOGIN_ID'];
			$login_key_chkk = $_SESSION['login_key_chkk'];
			$check_current_password_chkk = $conn->query("select * from user_login_master where UserID=$user_id_chkk");
			$fetch_check_current_password_chkk = mysqli_fetch_assoc($check_current_password_chkk);
			$user_password_salt_db = $fetch_check_current_password_chkk['password2_salt'];
			if($login_key_chkk != $user_password_salt_db){
				echo "<script>window.location.href='login';</script>";
			}
		}
	}
	else
	{
		echo "<script>window.location.href='login.php';</script>";
	}
?>