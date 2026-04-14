<?php
 include "../../include/conn.php";
     
 $data_original = $conn->real_escape_string($_POST['response']); 

$data = json_decode($data_original);
$data=(array)$data;
$eventId=$data['eventId'];
$marketId=$data['marketId'];
$remarks=$data['remarks'];
$eventType=$data['eventType'];
$marketName=$data['marketName'];
$remarks=$data['remarks'];
$response=$data_original;
$datetime=date("Y-m-d H:i:s");
if(isset($data['eventId']) && isset($data['marketId'])){
    $conn->query("insert into event_market_remarks  set `eventId`='$eventId',`eventType`='$eventType',`marketId`='$marketId',`marketName`='$marketName',`remarks`='$remarks',`response`='$response',`datetime`='$datetime'");
}
?>