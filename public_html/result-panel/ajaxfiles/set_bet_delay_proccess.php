<?php
   include "../../include/conn.php";
   
   $delay_value = $conn->real_escape_string($_POST['delay_value']);
   $delay_value_id = $conn->real_escape_string($_POST['delay_value_id']);
   
	   $delay_value_id=explode(",",$delay_value_id);
	   $delay_value=explode(",",$delay_value);
	foreach($delay_value_id as $key=>$value)
	{
		$delay=$delay_value[$key];
		 $conn->query("update bet_delay_master set delay_value='$delay' where market_type_id='$value'");
	}
	  
	   $return_array = array(
							"status"=>"ok",
							"message"=>"Insert Delay Successffully",
							);
			echo json_encode($return_array);
			exit();
	  
?>