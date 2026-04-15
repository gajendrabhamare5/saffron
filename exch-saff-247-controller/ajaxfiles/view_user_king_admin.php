<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	error_reporting(0);
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
if($columnName == 'Email_ID'){
	$columnName = "ulm.Email_ID";
}else if($columnName == 'Status'){
	$columnName = "um.Status";
}else if($columnName == 'Email_ID1'){
	$columnName ="ulm.Email_ID";
}else if($columnName == 'Email_ID2'){
	$columnName ="ulm.Email_ID";
}else if($columnName == 'points'){
	$columnName ="ulm.Email_ID";
}else if($columnName == 'change_password'){
	$columnName ="ulm.Email_ID";
}

$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value


$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (ulm.Email_ID like '%".$searchValue."%' or 
        um.Status like '%".$searchValue."%') ";
}
	

	$sel = $conn->query("select count(*) as allcount from user_master as um left outer join user_login_master as ulm on ulm.UserId=um.Id where ulm.UserType=7");



$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];



	$sel = $conn->query("select count(*) as allcount from user_master as um left outer join user_login_master as ulm on ulm.UserId=um.Id where ulm.UserType=7 $searchQuery");

	$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];





	$empRecords = $conn->query("select * from user_master as um left outer join user_login_master as ulm on ulm.UserId=um.Id where ulm.UserType=7 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage);



$data = array();
while ($user_data = mysqli_fetch_assoc($empRecords)) {
	
	$Email_ID = $user_data['Email_ID'];
	
	$UserID = $user_data['UserID'];
	$status = $user_data['Status'];
	
	$is_usd = $user_data['is_usd'];
	
	$usd_html = "";
	if($is_usd == 1){
		$usd_html = '$';
	}
	if($status == 1){
		$status_message = "Active";
		$status_html = '<a  class="btn btn-success btn-xs" href="deactive_user.php?user_id='.$UserID.'">Active </a>';
	}else{
		$status_message = "In-Active";
		$status_html = '<a  class="btn btn-danger btn-xs" href="active_user.php?user_id='.$UserID.'">De-active  </a>';
	}
	

	$get_account_balance = $conn->query("select SUM(`amount`) as total_balance from accounts where user_id=$UserID and status=1");
	$fetch_account_balance = mysqli_fetch_assoc($get_account_balance);
	$account_balance = $fetch_account_balance['total_balance'];
	if($account_balance == null){
		$account_balance = 00;
	}	

	
		$data[] = array( 
		  "Email_ID"=>$Email_ID."<span id='active_user_$UserID' class='active_user' style='display:none;'></span> ",
		  
		  "Email_ID2"=>"<a href='#' class='btn btn-dark btn-xs' style='float: right;' id='login_as_new_user' user_type='7' user_id='$UserID'>Login as $Email_ID</a>",
		  "Email_ID3"=>"<a href='credit_debit_downline.php?user_id=$UserID' class='btn btn-success btn-xs' style='float: right;'>Credit / Debit</a>",
		  "points"=> $usd_html.number_format($account_balance,2)." Points",
		  "Status"=>$status_html,
		  "change_password"=>"<a href='change_password.php?user_id=$UserID'>Change Password </a>",
		  
	   );
}


$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecordwithFilter,
  "iTotalDisplayRecords" => $totalRecords,
  "aaData" => $data
);

echo json_encode($response);
?>