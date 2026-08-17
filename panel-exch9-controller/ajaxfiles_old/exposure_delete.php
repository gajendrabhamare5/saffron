<?php
include "../../include/conn.php";
include "../session.php";
$type = $_REQUEST['type'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

if ($login_type != 5) {
    header("Location: ../logout.php");
}


 $id = $_REQUEST['id'];
/*  echo "id = $id";
    echo "delete from exposure_details where exposure_id = '$id' ";
exit; */
    if(!empty($id)){
        $conn->query("delete from exposure_details where exposure_id = '$id' ");
        $status = 'ok';
        $message = 'Deleted Successfully.';
    }else{
        $status = 'error';
        $message = 'Something went wrong.';
    }


    $results = array(
        "status"    => $status,
        "message"   => $message,
    );

    echo json_encode($results);



?>