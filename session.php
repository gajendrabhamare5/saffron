<?php

ini_set('session.gc_maxlifetime', 30 * 60);
session_start();

if (isset($_SESSION['CLIENT_LOGIN_STATUS'])) {
   
    $user_id = (int)$_SESSION['CLIENT_LOGIN_ID'];
    $CLIENT_LOGIN_STRING = isset($_SESSION['LOGIN_STRING']) ? $_SESSION['LOGIN_STRING'] : '';

	$is_logout = 1;
	if(isset($_SESSION['IS_LOGOUT'])){
		if($_SESSION['IS_LOGOUT'] == true){
			$is_logout = 0;
		}
	}
	$login_res = $conn->query("select * from user_login_master where UserID=$user_id");
    $login_data = ($login_res && mysqli_num_rows($login_res) > 0) ? mysqli_fetch_assoc($login_res) : array();
	if($is_logout == 1 && !empty($login_data)){
			   
        if (isset($login_data['loginString']) && $CLIENT_LOGIN_STRING != $login_data['loginString']) {
            session_destroy();
            header('location: /m/login');
            exit;
        }
	}


    $check_user_active_status = $conn->query("select Status from user_master where Id=$user_id");
    $fetch_check_user_active_status = ($check_user_active_status && mysqli_num_rows($check_user_active_status) > 0) ? mysqli_fetch_assoc($check_user_active_status) : array();
    $user_status = isset($fetch_check_user_active_status['Status']) ? $fetch_check_user_active_status['Status'] : 1;

    $parentDL = isset($login_data['parentDL']) ? (int)$login_data['parentDL'] : 0;
    $parentMDL = isset($login_data['parentMDL']) ? (int)$login_data['parentMDL'] : 0;
    $parentSuperMDL = isset($login_data['parentSuperMDL']) ? (int)$login_data['parentSuperMDL'] : 0;

    $dl_status = 1;
    if ($parentDL > 0) {
        $get_parentDL_status = $conn->query("select Status from user_master where Id=$parentDL");
        if ($get_parentDL_status && mysqli_num_rows($get_parentDL_status) > 0) {
            $fetch_get_parentDL_status = mysqli_fetch_assoc($get_parentDL_status);
            $dl_status = isset($fetch_get_parentDL_status['Status']) ? $fetch_get_parentDL_status['Status'] : 1;
        }
    }

    $mdl_status = 1;
    if ($parentMDL > 0) {
        $get_parentMDL_status = $conn->query("select Status from user_master where Id=$parentMDL");
        if ($get_parentMDL_status && mysqli_num_rows($get_parentMDL_status) > 0) {
            $fetch_get_parentMDL_status = mysqli_fetch_assoc($get_parentMDL_status);
            $mdl_status = isset($fetch_get_parentMDL_status['Status']) ? $fetch_get_parentMDL_status['Status'] : 1;
        }
    }

    $smdl_status = 1;
    if ($parentSuperMDL > 0) {
        $get_parentSMDL_status = $conn->query("select Status from user_master where Id=$parentSuperMDL");
        if ($get_parentSMDL_status && mysqli_num_rows($get_parentSMDL_status) > 0) {
            $fetch_get_parentSMDL_status = mysqli_fetch_assoc($get_parentSMDL_status);
            $smdl_status = isset($fetch_get_parentSMDL_status['Status']) ? $fetch_get_parentSMDL_status['Status'] : 1;
        }
    }
 
   if ($user_status == 0 || $dl_status == 0 || $mdl_status == 0 || $smdl_status == 0) {
        session_destroy();
         header('location: /m/404');
         exit;
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