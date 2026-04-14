<?php
include "../../include/conn.php";
if($_POST['type']=='add'){
	$selectedValues = $conn->real_escape_string($_POST['selectedValues']);
	$num=0;
	$casino_name_array=explode(",",$selectedValues);
	$delete_url = $conn->query("delete from casino_maintanance_list");
	foreach($casino_name_array as $casino_name){

		$check_url = $conn->query("select * from casino_maintanance_list where casino_name='$casino_name'");
		$url_row_count = mysqli_num_rows($check_url);
		if($url_row_count <= 0){

			$datetime=date("Y-m-d H:i:s");
			$ip_address = '';
			if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
				$ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
			}
			else{
				$ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			}
			$insert_url = $conn->query("insert into casino_maintanance_list set casino_name='$casino_name',datetime='$datetime',ip_address='$ip_address'");
			if($insert_url){
				$num++;
			}
		}
		else
		{
			$num++;
		}

	}
	if($num == count($casino_name_array)){
		$return_array = array(
				"status"=>"ok",
				"message"=>"Casino manintanance Successffully",
				);
		echo json_encode($return_array);
		exit();
	}
	else
	{
		$return_array = array(
				"status"=>"error",
				"message"=>"Something went wrong, please try again later.",
				);
		echo json_encode($return_array);
		exit();
	}
}
if($_POST['type']=='clear'){
	$delete_url = $conn->query("delete from casino_maintanance_list");

	if($delete_url){
	$return_array = array(
			"status"=>"ok",
			"message"=>"Casino manintanance clear Successffully",
			);
	echo json_encode($return_array);
	exit();
	}
	else
	{
		$return_array = array(
			"status"=>"error",
			"message"=>"Something went wrong, please try again later.",
			);
		echo json_encode($return_array);
		exit();
	}
}

?>