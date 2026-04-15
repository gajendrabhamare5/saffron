<?php
   include "../../include/conn.php";
   
   $user_id = 1; 
	$login_type = 5;
	if($login_type != 5){
		header("Location: ../logout.php");
	}
    

   $sport_type = $conn->real_escape_string($_POST['sport_type']);
   $market_id = $conn->real_escape_string($_POST['market_id']);
   $event_id = $conn->real_escape_string($_POST['event_id']);

       
$delete_sql = $conn->query("DELETE  FROM home_custom_event_list WHERE sport_type='$sport_type' AND market_id='$market_id' AND event_id='$event_id'");

if ($delete_sql) {
    echo json_encode(['status' => 'ok', 'message' => 'Events deleted successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Delete failed']);
}

exit;
   
?>