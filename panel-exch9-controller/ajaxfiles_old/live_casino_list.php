<?php
include "../../include/conn.php";
include "../session.php";
/* error_reporting(E_ALL);
ini_set('display_errors',1);
ini_set('display_startup_errors',1); */
$user_id = $_SESSION['CONTROLLER_LOGIN_ID'];
$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
if ($login_type != 5) {
    header("Location: ../logout.php");
}

$data = array();
$draw = $_REQUEST['draw'];
$offset = $_REQUEST['start'];
$length = $_REQUEST['length'];
$search1 = $_REQUEST['search'];
$searchValue = $search1['value']; // Search value


$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (game_category like '%".$searchValue."%' or game_type like '%".$searchValue."%' or game_name like '%".$searchValue."%' or game_id like '%".$searchValue."%' or game_provider like '%".$searchValue."%') ";
}
$sql_data_all = $conn->query("select * from `live_casino_list` where 1=1 $searchQuery order by id asc");
$sql_data = $conn->query("select * from `live_casino_list` where 1=1 $searchQuery order by id asc limit $length offset $offset");
$totalData = mysqli_num_rows($sql_data_all);
$totalFiltered = $totalData;
$num = 0;
while ($fetch_banner = mysqli_fetch_assoc($sql_data)) {

    $id = $fetch_banner['id'];
    $image = WEB_URL.''.$fetch_banner['image'];
    $game_type = $fetch_banner['game_type'];
    $game_name = $fetch_banner['game_name'];
    $game_id = $fetch_banner['game_id'];
    $game_provider = $fetch_banner['game_provider'];
    $game_category = $fetch_banner['game_category'];
    $num++; 

    $data1 = array(
        $num,
        '<img src="'.$image.'" style="width:40%;">',
        $game_category,
        $game_provider,
        $game_type,
        $game_name,
        $game_id,
        "<span style='font-size:20px;color: red;margin-right: 5px;cursor:pointer;' onclick='delete_banner_image($id)'><i class='fa fa-trash' aria-hidden='true'></i></span>
        <span style='font-size:20px;color: blue;cursor:pointer;' onclick='fetch_banner_data($id)'><i class='fa fa-edit' aria-hidden='true'></i></span>"

    );

    array_push($data, $data1);
}



$results = array(
    "draw" => $draw,
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data" => $data
);
/*while($row = $result->fetch_array(MYSQLI_ASSOC)){
$results["data"][] = $row ;
}*/

echo json_encode($results);
?>