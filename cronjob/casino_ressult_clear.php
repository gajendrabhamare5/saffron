<?php

include('../include/conn.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$data = date("Y-m-d", strtotime("-1 week"));

$res_twenty_teen = $conn->query("DELETE FROM `twenty_teenpatti_result` WHERE `result_time` < '$data 00:00:00'");

if ($res_twenty_teen) {
    echo "ok";
} else {
    echo 'Internal server error.';
}
?>