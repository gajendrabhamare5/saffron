<?php
   include "../include/conn.php";
   include "session.php";
   /* error_reporting(E_ALL);
   ini_set("display_errors",1);
   ini_set("display_startup_errors",1); */
   $user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
   $login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

 
 

   if($login_type != 5){
   		header("Location: ../logout.php");
   }
   
   $url_name = $conn->real_escape_string($_POST['tv_url']);
   $eventId = $conn->real_escape_string($_POST['eventId']);
   $sport_name = $conn->real_escape_string($_POST['sport_name']);
   
   if(empty($sport_name)){
	   $return_array = array(
						"status"=>"error",
						"message"=>"Please select sport",
						);
		echo json_encode($return_array);
		exit();
   }
   
   if(empty($eventId)){
	   $return_array = array(
						"status"=>"error",
						"message"=>"Please select event",
						);
		echo json_encode($return_array);
		exit();
   }
   
    if(empty($url_name)){
	   $return_array = array(
						"status"=>"error",
						"message"=>"Please enter tv URL",
						);
		echo json_encode($return_array); 
		exit();
   }
   if (!filter_var($url_name, FILTER_VALIDATE_URL)) { 
		$return_array = array(
						"status"=>"error",
						"message"=>"Please enter valid tv URL",
						);
		echo json_encode($return_array); 
		exit();
   }
   
$post_data = http_build_query(array(
		"tv_url"=>$url_name,
		"eventId"=>$eventId,
		"sport_name"=>$sport_name,
	));
/* $opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $post_data
    )
);  

$context  = stream_context_create($opts);
foreach($white_list_data as $domain){
	file_get_contents($domain.'result-panel/ajaxfiles/tv_mapping_add_proccess.php', false, $context);
}
file_get_contents('http://diamondexch.org/api/tv_mapping_add_proccess.php', false, $context); */ 

foreach($white_list_data as $domain){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $domain."result-panel/ajaxfiles/tv_mapping_add_proccess.php",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_POSTFIELDS => $post_data,
		CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
}
if(count($white_list_data_mamu) > 0){
	foreach($white_list_data_mamu as $domain){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $domain."api/tv_mapping_add_proccess.php",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_POSTFIELDS => $post_data,
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
	}
}
 
   $check_url = $conn->query("select * from tv_url_master where sport_id='$sport_name' and event_id='$eventId' ");
   $url_row_count = mysqli_num_rows($check_url);
   if($url_row_count > 0){
	   $insert_url = $conn->query("update tv_url_master set url='$url_name'  where sport_id='$sport_name' and event_id='$eventId'");
	    if($insert_url){
		   $return_array = array(
							"status"=>"ok",
							"message"=>"Insert Tv URL Successffully",
							);
			echo json_encode($return_array);
			exit();
	   }
	   else{
			$return_array = array(
							"status"=>"error",
							"message"=>"Something went wrong, please try again later.",
							);
			echo json_encode($return_array);
			exit();
	   }
	    /* $return_array = array(
						"status"=>"error",
						"message"=>"Tv URL already exists",
						);
		echo json_encode($return_array);
		exit(); */
   }
   else{
	   $datetime=date("Y-m-d H:i:s");
	   $insert_url = $conn->query("insert into tv_url_master set url='$url_name',sport_id='$sport_name',event_id='$eventId',datetime='$datetime'");
	   if($insert_url){
		   $return_array = array(
							"status"=>"ok",
							"message"=>"Insert Tv URL Successffully",
							);
			echo json_encode($return_array);
			exit();
	   }
	   else{
			$return_array = array(
							"status"=>"error",
							"message"=>"Something went wrong, please try again later.",
							);
			echo json_encode($return_array);
			exit();
	   }
   }
  
   
   
?>