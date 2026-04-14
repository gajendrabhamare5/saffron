<?php
include('../include/conn.php');
include "../session.php";
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
$bet_id = $conn->real_escape_string($_REQUEST['bet_id']);
$questions=array(
    "Red"=>"[Q1] Red-Black",
    "Black"=>"[Q1] Red-Black",
    "Odd"=>"[Q2] Odd-Even",
    "Even"=>"[Q2] Odd-Even",
    "Up"=>"[Q3] 7 Up-7 Down",
    "Down"=>"[Q3] 7 Up-7 Down",
    "A23"=>"[Q4] 3 Card Judgement",
    "456"=>"[Q4] 3 Card Judgement",
    "8910"=>"[Q4] 3 Card Judgement",
    "JQK"=>"[Q4] 3 Card Judgement",
    "Spade"=>"[Q5] Suits",
    "Heart"=>"[Q5] Suits",
    "Club"=>"[Q5] Suits",
    "Diamond"=>"[Q5] Suits",
);
$get_account_data = $conn->query("select * from kbc_teen_bet where 1=1 and bet_id='$bet_id' and user_id=$user_id");
$sr_no  = 1;
$data=array();
$bet_type="";
while ($fetch_get_account_data = mysqli_fetch_assoc($get_account_data)) {
	$market_name = $fetch_get_account_data['market_name'];
	$bet_type = $fetch_get_account_data['bet_type'];
	$bet_final_result = $fetch_get_account_data['bet_final_result'];
    $statuss="";
    if($bet_final_result == "Win"){
        $statuss=true;
    }
    if($bet_final_result == "Loss"){
        $statuss=false;
    }
    $data[]=array(
        "qus"=>$questions[$market_name],
        "market_name"=>$market_name,
        "statuss"=>$statuss,
    );
}
$resu=array(
    "status"=>"ok",
    "bet_type"=>$bet_type,
    "data"=>$data,
);
echo json_encode($resu);
?>

