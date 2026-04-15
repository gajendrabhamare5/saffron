<?php
include '../include/conn.php';
$dayAgoDate = time();

// Subtract 24 hours (86400 seconds) from the current timestamp
$timestamp24HoursAgo = $dayAgoDate - 86400;

// Format the result as a readable date and time
$datechk= date('Y-m-d H:i:s', $timestamp24HoursAgo);
/* echo "select GROUP_CONCAT(DISTINCT event_id) AS unique_event_ids from bet_teen_details where bet_status=1 and bet_time <= '$datechk'"; */
$fetch_record=$conn->query("select GROUP_CONCAT(DISTINCT event_id) AS unique_event_ids from bet_teen_details where bet_status=1 and bet_time <= '$datechk'");
if(mysqli_num_rows($fetch_record) > 0){
    $data_chk=mysqli_fetch_assoc($fetch_record);
    $unique_event_ids=$data_chk['unique_event_ids'];
    if(!empty($unique_event_ids)){
        /* echo "update bet_teen_details set bet_status='2',cancelled_by='2' where bet_status='1' and event_id in ($unique_event_ids)";
        echo "delete from exposure_details where `event_id` IN ($unique_event_ids) and event_type='0'"; */
        $conn->query("update bet_teen_details set bet_status='2',cancelled_by='2' where bet_status='1' and event_id in ($unique_event_ids)");
        $conn->query("delete from exposure_details where `event_id` IN ($unique_event_ids) and event_type='0'");
    }
}
?>