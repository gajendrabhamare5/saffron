<?php
include('../include/conn.php');
include "session.php";
$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
if($login_type != 5){
	header("Location: logout.php");
}
$customer_user_id = $_REQUEST['user_id'];

if($login_type == 5){
	$check_valid_user = $conn->query("select * from user_login_master where UserID=$customer_user_id and UserType=4");
}

$num_rows = $check_valid_user->num_rows;
if($num_rows == 0){
	//redirect
	echo "<script>window.location.href='view_user.php?msg=Invalid User&type=0'</script>";
}else{
	$update_status = $conn->query("update user_master set Status=1 where Id=$customer_user_id");
	
	if($update_status){
		echo "<script>window.location.href='view_user.php?msg=Status Changed&type=1'</script>";
	}else{
		echo "<script>window.location.href='view_user.php?msg=Something went wrong, please try again.&type=0'</script>";
	}
	
}
?>