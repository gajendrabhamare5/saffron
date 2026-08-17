<?php
include('../include/conn.php');
include('../session.php');
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
$auth_status = $_POST['auth_status'];

$user_auth_status = $conn->query("select * from  user_master where Id='$user_id'");
$user_auth_status_data = mysqli_fetch_assoc($user_auth_status);
$user_verification_status = $user_auth_status_data['user_verification_status'];
$auth_status_db = true;
if ($user_verification_status == "DISABLED") {
    $auth_status_db = false;
}
$refresh=false;
if($auth_status_db != $auth_status){
    $refresh=true;
}
$data=array("status"=>"ok","refresh"=>$refresh);
echo json_encode($data);
?>