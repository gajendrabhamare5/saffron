<?php

ini_set('session.gc_maxlifetime', 30 * 60);
session_start();

if (isset($_SESSION['CLIENT_LOGIN_STATUS'])) {
   
    $user_id = $_SESSION['CLIENT_LOGIN_ID'];
    $CLIENT_LOGIN_STRING = $_SESSION['LOGIN_STRING'];

	$is_logout = 1;
	if(isset($_SESSION['IS_LOGOUT'])){
		if($_SESSION['IS_LOGOUT'] == true){
			$is_logout = 0;
		}
	}
	 $login_res = $conn->query("select * from user_login_master where UserID=$user_id");
    $login_data = mysqli_fetch_assoc($login_res);
	if($is_logout == 1){
			   
    if ($CLIENT_LOGIN_STRING != $login_data['loginString']) {
       session_destroy();
			header('location: /m/login');
    }
	}


    $check_user_active_status = $conn->query("select Status from user_master where Id=$user_id");
    $fetch_check_user_active_status = mysqli_fetch_assoc($check_user_active_status);
    $user_status = $fetch_check_user_active_status['Status'];

    $parentDL = $login_data['parentDL'];
    $parentMDL = $login_data['parentMDL'];
    $parentSuperMDL = $login_data['parentSuperMDL'];

    $get_parentDL_status = $conn->query("select Status from user_master where Id=$parentDL");
    $fetch_get_parentDL_status = mysqli_fetch_assoc($get_parentDL_status);
    $dl_status = $fetch_get_parentDL_status['Status'];

    $get_parentMDL_status = $conn->query("select Status from user_master where Id=$parentMDL");
    $fetch_get_parentMDL_status = mysqli_fetch_assoc($get_parentMDL_status);
    $mdl_status = $fetch_get_parentMDL_status['Status'];

    $get_parentSMDL_status = $conn->query("select Status from user_master where Id=$parentSuperMDL");
    $fetch_get_parentSMDL_status = mysqli_fetch_assoc($get_parentSMDL_status);
    $smdl_status = $fetch_get_parentSMDL_status['Status'];
 
   if ($user_status == 0 || $dl_status == 0 || $mdl_status == 0 || $smdl_status == 0) {
        session_destroy();
         header('location: /m/404');
    }
    $curPageName="";
    if(isset($_REQUEST['curPageName'])){
        $curPageName=$_REQUEST['curPageName'];
    }
    if ($login_data['Password2'] != '' && $curPageName!='changepassword.php') {
        header('location: changepassword');
    }
} else {
     header('location: /m/404');
}
?>