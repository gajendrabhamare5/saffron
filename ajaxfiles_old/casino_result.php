<?php
include('../include/conn.php');
include "../session.php";
$user_id = $_SESSION['CLIENT_LOGIN_ID'];


$data = array();
$draw = intval($_POST["sEcho"]);
$start = intval($_POST["iDisplayStart"]);
$length = intval($_POST["iDisplayLength"]);
$search =  $conn->real_escape_string($_POST['sSearch']);

$sort_column =  $conn->real_escape_string($_POST['iSortCol_0']);
$sort_dir =  $conn->real_escape_string($_POST['sSortDir_0']);

$value = str_replace("=","1!=1",$search);
	$sort_dir = str_replace("--","1!=1",$sort_dir);
	$sort_dir = str_replace(";","1!=1",$sort_dir);
	$sort_dir = str_replace("#","1!=1",$sort_dir);
	$game_date = $conn->real_escape_string($_POST['game_date']);
	$casino_type = $conn->real_escape_string($_POST['casino_type']);
	$game_date = date("Y-m-d",strtotime($game_date));

$search="";
if( !empty($value) )
{

    
	$search .= " and (event_id like '%$value%' or game_type like '%$value%')";
	
}


    $sql_data_all = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and DATE(result_time) = '$game_date' $search ORDER BY result_time DESC");
    if($length == "-1"){
        $sql_data = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and DATE(result_time) = '$game_date' $search ORDER BY result_time DESC");
    
    
    }
    else{
        $gg="select * from twenty_teenpatti_result where game_type='$casino_type' and DATE(result_time) = '$game_date' $search ORDER BY result_time DESC LIMIT $length OFFSET $start";
        
        $sql_data = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and DATE(result_time) = '$game_date' $search ORDER BY result_time DESC LIMIT $length OFFSET $start");
    
    
    }


$totalData = mysqli_num_rows($sql_data_all);
$totalFiltered = $totalData; 
$num=0;
	$data = array();
	while ($fetch_get_account_details = mysqli_fetch_assoc($sql_data)) {
        $event_id=$fetch_get_account_details['event_id'];
        $game_type=$fetch_get_account_details['game_type'];
        $result_status=$fetch_get_account_details['result_status'];
        $cards=$fetch_get_account_details['cards'];

                            $result_status_text = "";
                            if ($casino_type == "poker" || $casino_type == "poker20") {
                                $result_status_text = "Poker ".$result_status." - ";
                            } else if ($casino_type == "poker6" || $casino_type == "card32" || $casino_type ==
                                "card32eu") {
                               $result_status_text = "Player ".$result_status." - ";
                            }
							$link='<span onclick="view_casiono_result('.$event_id.')">'.$event_id.'</span>';
		$data[] = array(
            "round"=>$link,
            "winner"=>$result_status_text." ".$game_type,
        );
	}

 
    $results = array(
		"sEcho" => $draw,
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval( $totalFiltered ),
		"data"=>$data,
		"gg"=>$gg,
	); 
echo json_encode($results);

?>