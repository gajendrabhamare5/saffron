<?php

include('../include/conn.php');
include('../include/level_percentage.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
$data_original = file_get_contents("php://input");
$data = json_decode(file_get_contents("php://input"));

$result_array = $data[0];



$rdesc = $result_array->desc;

$game_type = $result_array->gtype;
$mid = $result_array->mid;
$mid = str_replace("15.","",$mid);
$bet_final_result = "";
$result = $result_array->win;
$selection_id = $result_array->sid;


$cards3 = $result_array->cards;
$cards3 = '["'.$cards3.'"]';
$cards3 = str_replace(',','","',$cards3);
$cards2 = $cards3;
$event_type = "WORLI_MATKA";


$result_time = date("Y-m-d H:i:s");
$market_id = array();


$result_status =$result;
$conn->query("insert into twenty_teenpatti_result (event_id,game_type,result_status,cards,result_time,desc_remakrs,data) VALUES('$mid','$game_type','$result_status','$cards3','$result_time','$rdesc','$data_original')");
$insert_id = $conn->insert_id;
if($insert_id <= 0){
	/* echo "already inserted"; exit()  */
}


?>