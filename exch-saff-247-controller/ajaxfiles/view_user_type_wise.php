<?php
	include "../../include/conn.php";
	include "../session.php";
	$user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];
	
	error_reporting(0);
	if($login_type != 5){
		header("Location: ../logout.php");
	}
	$user_type = $_REQUEST['user_type'];
	
	if($user_type == ""){
		$user_type = 4;
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
	   $searchQuery = " and um.Email_ID like '%".$searchValue."%'";
	}
	

	$sel = $conn->query("select count(*) as allcount from user_master as um left where um.power=$user_type ");
	$records = mysqli_fetch_assoc($sel);
	$totalRecords = $records['allcount'];



	$sel = $conn->query("select count(*) as allcount from user_master as um where um.power=$user_type  $searchQuery");
	$records = mysqli_fetch_assoc($sel);
	$totalRecordwithFilter = $records['allcount'];




	$empRecords = $conn->query("select * from user_master as um where um.power=$user_type  ".$searchQuery." order by um.Email_Id limit ".$row.",".$rowperpage);
	$data = array();
	while ($user_data = mysqli_fetch_assoc($empRecords)) {
		
		$Email_ID = $user_data['Email_ID'];
		
		$UserID = $user_data['Id'];
		
		$is_usd = $user_data['is_usd'];
		
		$usd_html = "";
		if($is_usd == 1){
			$usd_html = '$';
		}
		$status = $user_data['Status'];
		if($status == 1){
			$status_message = "Active";
			$status_html = '<a  class="btn btn-success btn-xs" href="deactive_user.php?user_id='.$UserID.'">Active </a>';
		}else{
			$status_message = "In-Active";
			$status_html = '<a  class="btn btn-danger btn-xs" href="active_user.php?user_id='.$UserID.'">De-active  </a>';
		}
		$total_exposure =0;
		$account_balance = 0;
		
		$view_all_other_html = "";
		if($user_type -1 != 0){
			$new_user_type = $user_type -1;
			$view_all_other_html = "<a href='view_all_other_user.php?user_id=$UserID&user_type=$new_user_type' class='btn btn-warning btn-xs'  style='float: right;'>View Sub User</a>";
		}
		$login_as_html = " <a href='#' class='btn btn-dark btn-xs' style='float: right;' id='login_as_new_user' user_type='$user_type' user_id='$UserID' >Login as $Email_ID</a>";
			$data[] = array( 
			  "Email_ID"=>$Email_ID."<span id='active_user_$UserID' class='active_user' style='display:none;'></span><span class='inactive_user' id='inactive_user_$UserID'></span> ",
			  "points"=> $usd_html.number_format($account_balance+$total_exposure,2)." Points",
			 
			  
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