<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
$login_type=$_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

	$marquee_data = $_REQUEST['marquee_data'];
	
	$current_date_time = date("Y-m-d H:i:s");
	$end_time = date('Y-m-d H:i:s', strtotime($current_date_time . ' +365 days'));
	
	$check_existing_marquee = $conn->query("select * from marquee_message where user_id=$user_id");
	$count_rows_marquee = mysqli_num_rows($check_existing_marquee);
	
	if($count_rows_marquee >= 1){
		$insert_marquee = $conn->query("update marquee_message set marquee_data='$marquee_data',added_time='$current_date_time',end_time='$end_time' where  user_id=$user_id");
	}else{
		$insert_marquee = $conn->query("insert into marquee_message (marquee_data,user_id,user_type,added_time,end_time) values('$marquee_data',$user_id,$login_type,'$current_date_time','$end_time')");
	}
	
	if($insert_marquee){
		
		$return = array(
				"status"=>"ok",
				"message"=>"Marquee added successfully.",
				"end_time"=>"Current Marquee End Time: ".date("d-m-Y H:i:s",strtotime($end_time)),
				);
				
	}else{
		$return = array(
				"status"=>"error",
				"message"=>"Something went wrong, please try again.",
				);
	}
	echo json_encode($return);
	
?>