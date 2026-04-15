<?

include "../../include/conn.php";
include "../session.php";
include('../../include/level_percentage.php');
/* error_reporting(E_ALL);
  ini_set("display_errors",1);
  ini_set("display_startup_errors",1); */

$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
if ($login_type != 5) {
	header("Location: ../logout.php");
}
 

$event_id = $_REQUEST['event_id'];
$market_id = $_REQUEST['market_id'];
$sport_id = $_REQUEST['sport_id'];

$status="error";
$remarks="";
$fetch_query=$conn->query("select * from event_market_remarks where `eventId`='$eventId' and `marketId`='$marketId' and `eventType`='$sport_id'");
if(mysqli_num_rows($fetch_query) > 0){
    $status="ok";
    $fetch_data=mysqli_fetch_assoc($fetch_query);
    $remarks=$fetch_data['remarks'];
}
$return_array = array(
    "status" => $status,
    "remarks" => $remarks,
);
echo json_encode($return_array);
?>