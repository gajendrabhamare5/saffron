<?php
   include "../../include/conn.php";
   
   $user_id = 1; 
	$login_type = 5;
	if($login_type != 5){
		header("Location: ../logout.php");
	}
    

   $eventId = $conn->real_escape_string($_POST['eventId']);
   $sport_name = $conn->real_escape_string($_POST['sport_name']);
   $marketId = $conn->real_escape_string($_POST['marketId']);
   $eventName = $conn->real_escape_string($_POST['eventName']);

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

	   $datetime=date("Y-m-d H:i:s");
       
// $check_query = $conn->query("SELECT * FROM home_custom_event_list WHERE sport_type='$sport_name' AND market_id='$marketId' AND event_id='$eventId'");

// if ($check_query->num_rows > 0) {

//     $return_array = array(
//         "status" => "exists",
//         "message" => "Record already exists."
//     );
//     echo json_encode($return_array);
//     exit();
// }else{

    $insert_url = $conn->query("insert into home_custom_event_list set sport_type='$sport_name',market_id='$marketId',event_id='$eventId',event_name='$eventName',date='$datetime'");

	   if($insert_url){
		   $return_array = array(
							"status"=>"ok",
							"message"=>"Inserted Successffully",
							);
			
	   }
	   else{
			$return_array = array(
							"status"=>"error",
							"message"=>"Something went wrong, please try again later.",
							);
			
	   }
        echo json_encode($return_array);
    exit();
  //  }
   
?>