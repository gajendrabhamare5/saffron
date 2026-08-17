<?php
   include "../../include/conn.php";
   include "../session.php";
   $user_id =$_SESSION['CONTROLLER_LOGIN_ID']; 
   $login_type = $_SESSION['CONTROLLER_LOGIN_SESSION_TYPE'];

 
 

   if($login_type != 5){
   		header("Location: ../logout.php");
   }
   
   $url_name = $conn->real_escape_string($_POST['url_name']);
   
   if($url_name == ""){
	   $return_array = array(
						"status"=>"error",
						"message"=>"Please Enter Tv URL",
						);
		echo json_encode($return_array);
		exit();
   }
   
   $check_url = $conn->query("select * from hdmi_tv_url where url_name='$url_name'");
   $url_row_count = mysqli_num_rows($check_url);
   if($url_row_count > 0){
	    $return_array = array(
						"status"=>"error",
						"message"=>"Tv URL already exists",
						);
		echo json_encode($return_array);
		exit();
   }
   
   $insert_url = $conn->query("insert into hdmi_tv_url(url_name)values('$url_name')");
   if($insert_url > 0){
	   $return_array = array(
						"status"=>"ok",
						"message"=>"Insert Tv URL Successffully",
						);
		echo json_encode($return_array);
		exit();
   }
   else{
	    $return_array = array(
						"status"=>"error",
						"message"=>"Something went wrong, please try again later.",
						);
		echo json_encode($return_array);
		exit();
   }
   
   
?>