<?php

include('../include/conn.php');

session_start();
$user_id = $_SESSION['CLIENT_LOGIN_ID'];

$current_password = $conn->real_escape_string($_REQUEST['current_password']);
$new_password = $conn->real_escape_string($_REQUEST['new_password']);
$new_password_md5 = $new_password;
$confirm_password = $conn->real_escape_string($_REQUEST['confirm_password']);
if ($current_password == "") {
    $return_array = array(
        "status" => "error",
        "message" => "Please Enter Current Password",
    );
    echo json_encode($return_array);
    exit();
}
if ($new_password_md5 == "") {
    $return_array = array(
        "status" => "error",
        "message" => "Please Enter New Password",
    );
    echo json_encode($return_array);
    exit();
}

$check_current_password = $conn->query("select * from user_login_master where UserID=$user_id");
$fetch_check_current_password = mysqli_fetch_assoc($check_current_password);

$user_password = $fetch_check_current_password['Password'];
$user_password_salt_key = $fetch_check_current_password['user_password_salt_key'];
$user_password_salt = $fetch_check_current_password['user_password_salt'];
$post_password = $current_password;
$salted_hash = hash('sha256',$post_password.$user_password_salt_key.$user_password_salt);

if($user_password!=$salted_hash){
    $return_array = array(
        "status" => "error",
        "message" => "Current Password is wrong.",
    );
    echo json_encode($return_array);
    exit();
}

$regex_lowercase = '/[a-z]/';
$regex_uppercase = '/[A-Z]/';
$regex_number = '/[0-9]/';

if ((preg_match_all($regex_lowercase, $new_password) < 1) || (preg_match_all($regex_uppercase, $new_password) < 1) || (preg_match_all($regex_number, $new_password) < 1) || (strlen($new_password) < 5) || (strlen($new_password) > 15)) {
    $return_array = array(
        "status" => "error",
        "message" => "The password must contain at least: 1 uppercase letter, 1 lowercase letter, 1 number and 8 to 15 characters needed.",
    );
    echo json_encode($return_array);
    exit();
}

if ($confirm_password == "") {
    $return_array = array(
        "status" => "error",
        "message" => "Please Enter Confirm Password",
    );
    echo json_encode($return_array);
    exit();
}


if ($new_password_md5 != $confirm_password) {
    $return_array = array(
        "status" => "error",
        "message" => "Password and Confirm Password is not matched.",
    );
    echo json_encode($return_array);
    exit();
}


$p_salt = rand(111111,999999); 

$site_salt="huhefcvringybh";
$salted_hash = hash('sha256', $new_password.$site_salt.$p_salt);

$change_password = $conn->query("update user_login_master set Password='$salted_hash',Password2='',user_password_salt='$p_salt',user_password_salt_key='$site_salt' where UserID=$user_id");

//$_SESSION['FIRST_PASSWORD_CHANGED'] = 1;

session_destroy();
if ($change_password) {
    $return_array = array(
        "status" => "ok",
        "message" => "Password Changed.",
    );
    echo json_encode($return_array);
    exit();
} else {
    $return_array = array(
        "status" => "error",
        "message" => "Something went wrong, please try again.",
    );
    echo json_encode($return_array);
    exit();
}
?>