<?php
   include "../../include/conn.php";  
  
   $casino_type = $conn->real_escape_string($_POST['type']); 
   $ip_address = $conn->real_escape_string($_POST['ip_address']);
 
 $datetime=date("Y-m-d H:i:s");
	if($casino_type=="1")
	   {
		 $msg="Casino set as undermaintanance";  
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