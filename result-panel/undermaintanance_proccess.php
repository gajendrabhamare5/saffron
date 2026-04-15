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
   $ip_address = '';
if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
	$ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else{
	$ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
}
   $casino_type = $conn->real_escape_string($_POST['type']);
   
$post_data = http_build_query(array(
		"type"=>$casino_type,
		"ip_address"=>$ip_address,
	)); 
/* $opts = array('http' =>
    array( 
        'method'  => 'POST',
        'header'  => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $post_data
    )
);

$context  = stream_context_create($opts);
foreach($casino_maintanace_list_data as $domain){
	file_get_contents($domain.'result-panel/ajaxfiles/undermaintanance_proccess.php', false, $context);
} */
foreach($casino_maintanace_list_data as $domain){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $domain."result-panel/ajaxfiles/undermaintanance_proccess.php",
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
 $datetime=date("Y-m-d H:i:s");
	if($casino_type=="1")
	   {
		 $msg="Casino set as under maintanance";  
	   }
	   if($casino_type=="0")
	   {
		 $msg="Casino set as live";  
	   }
   $check_url = $conn->query("select * from casino_under_maintanance limit 1");
   $url_row_count = mysqli_num_rows($check_url);
   if($url_row_count > 0){
	   $insert_url = $conn->query("update casino_under_maintanance set type='$casino_type',ip_address='$ip_address',datetime='$datetime'");
	  
	   $return_array = array(
							"status"=>"ok",
							"casino_type"=>$casino_type,
							"message"=>$msg,
							);
			echo json_encode($return_array);
			exit();
   }
   else{
	  
	   $insert_url = $conn->query("insert into casino_under_maintanance set type='$casino_type',ip_address='$ip_address',datetime='$datetime'");
	  $return_array = array(
							"status"=>"ok",
							"casino_type"=>$casino_type,
							"message"=>$msg,
							);
			echo json_encode($return_array);
			exit();
   }
  
   
   
?>