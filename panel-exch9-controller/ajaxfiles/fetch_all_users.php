<?php
	include "../../include/conn.php";
	/* include "../session.php";
	include "../../include/function.php";
$_GET = check_variable_for_datatable($conn, $_GET); */
	/* $user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
	$login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE']; */
	
	$searchTerm = $_GET['term'];
	/* if($login_type == 5){ */
	/* echo "select * from user_master where Email_ID LIKE '%".$searchTerm."%' or Name LIKE '%".$searchTerm."%'"; */
		$get_client_name = $conn->query("select * from user_master where (Email_ID LIKE '%".$searchTerm."%' or Name LIKE '%".$searchTerm."%') AND power != 10");
	/* }else{
		$get_client_name = null;
	} */
	
	$client_name_array = [];
	
	
	while($fetch_get_client_name  = mysqli_fetch_assoc($get_client_name)){

		$client_name_array[] = array(
            "id" => $fetch_get_client_name['Id'],
            "email" => $fetch_get_client_name['Email_ID'],
            "name" => $fetch_get_client_name['Name'],
            "usertype" => $fetch_get_client_name['power']
        );
	}
	echo json_encode($client_name_array);
?>