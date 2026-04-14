<?php 
include "include/conn.php"; 
/* $DB_host = "localhost";
$DB_user = "11starex_ashish";
$DB_pass = "Ashish@321..";
$DB_name = "11starex_ashish";


$conn = new MySQLi($DB_host, $DB_user, $DB_pass, $DB_name); */
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '30000');

$monthAgoDate = date("Y-m-d", strtotime("-30 days"));

/* $old_DB_host = "167.99.67.72";

$old_DB_user = "saffr247_old_other";
$old_DB_pass = "RzWdwF720cb7";
$old_DB_name = "saffr247_olddata"; */


$old_DB_host = "localhost";

$old_DB_user = "saffron_old_other";
$old_DB_pass = "RzWdwF720cb7";
$old_DB_name = "saffron_olddata";
$old_conn = new MySQLi($old_DB_host, $old_DB_user, $old_DB_pass, $old_DB_name);

$bet_id=array();
$get_trade_details = $conn->query("select * from bet_details where cast(bet_time as date) < '$monthAgoDate' and `bet_status` != '1'");
	while($old_data = mysqli_fetch_assoc($get_trade_details)){
		
		$columns = implode(", ",array_keys($old_data));
		$escaped_values = array_map(array($conn, 'real_escape_string'), array_values($old_data));
		$values  = implode("', '", $escaped_values);
		$insrr=$old_conn->query("INSERT INTO `bet_details_old_data`($columns) VALUES ('$values')");
		if(isset($insrr) && !empty($insrr)){
			$bet_id[] = $old_data['bet_id'];
			/* $conn->query("delete from bet_details where bet_id=$bet_id"); */
		}
		
	}
if(count($bet_id) > 0)
{
	$conn->query("DROP TRIGGER bet_details_delete1_trigger");
	$bet_id_new=implode(",",$bet_id);
	$conn->query("delete from bet_details where bet_id IN ($bet_id_new)");
	$conn->query('

	CREATE TRIGGER `bet_details_delete1_trigger` BEFORE DELETE ON `bet_details` FOR EACH ROW 

	BEGIN
		 signal sqlstate "45000" set message_text = "Invalid delete action.";
	END
	');
}


$bet_id_teen=array();
$get_bet_teen_details_details = $conn->query("select * from bet_teen_details where cast(bet_time as date) < '$monthAgoDate' and `bet_status` != '1'");
	while($old_data_teen = mysqli_fetch_assoc($get_bet_teen_details_details)){
		
		$columns_teen = implode(", ",array_keys($old_data_teen));
		$escaped_values_teen = array_map(array($conn, 'real_escape_string'), array_values($old_data_teen));
		$valuesteen  = implode("', '", $escaped_values_teen);
		$insrr_teen=$old_conn->query("INSERT INTO `bet_teen_details_old_data`($columns_teen) VALUES ('$valuesteen')");
		if(isset($insrr_teen) && !empty($insrr_teen)){
			$bet_id_teen[] = $old_data_teen['bet_id'];
			/* $conn->query("delete from bet_teen_details where bet_id=$bet_id_teen"); */
		}
		
	}
if(count($bet_id_teen) > 0)
{
	$conn->query("DROP TRIGGER bet_teen_details_delete1_trigger");
	$bet_id_teen_new=implode(",",$bet_id_teen);
	$conn->query("delete from bet_teen_details where bet_id IN ($bet_id_teen_new)");
	$conn->query('

	CREATE TRIGGER `bet_teen_details_delete1_trigger` BEFORE DELETE ON `bet_teen_details` FOR EACH ROW 

	BEGIN
		 signal sqlstate "45000" set message_text = "Invalid delete action.";
	END
	');
}	

$bet_success_id=array();
$get_bet_success_details = $conn->query("select * from bet_success_log where cast(log_time as date) < '$monthAgoDate'");
	while($old_data_bet_success = mysqli_fetch_assoc($get_bet_success_details)){
		
		$columns_login = implode(", ",array_keys($old_data_bet_success));
		$escaped_values_login = array_map(array($conn, 'real_escape_string'), array_values($old_data_bet_success));
		$valueslogin  = implode("', '", $escaped_values_login);
		$insrr_login=$old_conn->query("INSERT INTO `bet_success_log_old_data`($columns_login) VALUES ('$valueslogin')");
		if(isset($insrr_login) && !empty($insrr_login)){
			$bet_success_id[] = $old_data_bet_success['log_id'];
			/* $conn->query("delete from login_ip_address where login_ip_id=$login_ip_id"); */
		}
		
	}
if(count($bet_success_id) > 0)
{
	$bet_success_id_new=implode(",",$bet_success_id);
	$conn->query("delete from bet_success_log where log_id IN ($bet_success_id_new)");
}

$bet_rejection_id=array();
$get_bet_rejection_details = $conn->query("select * from rejection_log where cast(log_time as date) < '$monthAgoDate'");
	while($old_data_bet_rejection = mysqli_fetch_assoc($get_bet_rejection_details)){
		
		$columns_login = implode(", ",array_keys($old_data_bet_rejection));
		$escaped_values_login = array_map(array($conn, 'real_escape_string'), array_values($old_data_bet_rejection));
		$valueslogin  = implode("', '", $escaped_values_login);
		$insrr_login=$old_conn->query("INSERT INTO `rejection_log_old_data`($columns_login) VALUES ('$valueslogin')");
		if(isset($insrr_login) && !empty($insrr_login)){
			$bet_rejection_id[] = $old_data_bet_rejection['log_id'];
			/* $conn->query("delete from login_ip_address where login_ip_id=$login_ip_id"); */
		}
		
	}
if(count($bet_rejection_id) > 0)
{
	$bet_rejection_id_new=implode(",",$bet_rejection_id);
	$conn->query("delete from rejection_log where log_id IN ($bet_rejection_id_new)");
}

$bet_api_data_id=array();
$get_bet_api_details = $conn->query("select * from bet_details_api_data where cast(added_datetime as date) < '$monthAgoDate'");
	while($old_data_bet_api = mysqli_fetch_assoc($get_bet_api_details)){
		
		$columns_login = implode(", ",array_keys($old_data_bet_api));
		$escaped_values_login = array_map(array($conn, 'real_escape_string'), array_values($old_data_bet_api));
		$valueslogin  = implode("', '", $escaped_values_login);
		$insrr_login=$old_conn->query("INSERT INTO `bet_details_api_data_old_data`($columns_login) VALUES ('$valueslogin')");
		if(isset($insrr_login) && !empty($insrr_login)){
			$bet_api_data_id[] = $old_data_bet_api['bet_details_id'];
			/* $conn->query("delete from login_ip_address where login_ip_id=$login_ip_id"); */
		}
		
	}
if(count($bet_api_data_id) > 0)
{
	$bet_api_data_id_new =implode(",",$bet_api_data_id);
	$conn->query("delete from bet_details_api_data where bet_details_id IN ($bet_api_data_id_new)");
}



$login_ip_id=array();
$get_login_details = $conn->query("select * from login_ip_address where cast(login_date_time as date) < '$monthAgoDate'"); 
	while($old_data_login = mysqli_fetch_assoc($get_login_details)){
		
		$columns_login = implode(", ",array_keys($old_data_login));
		$escaped_values_login = array_map(array($conn, 'real_escape_string'), array_values($old_data_login));
		$valueslogin  = implode("', '", $escaped_values_login);
		$insrr_login=$old_conn->query("INSERT INTO `login_ip_address_old_data`($columns_login) VALUES ('$valueslogin')");
		if(isset($insrr_login) && !empty($insrr_login)){
			$login_ip_id[] = $old_data_login['login_ip_id'];
			/* $conn->query("delete from login_ip_address where login_ip_id=$login_ip_id"); */
		}
		
	}
if(count($login_ip_id) > 0)
{
	$login_ip_id_new=implode(",",$login_ip_id);
	$conn->query("delete from login_ip_address where login_ip_id IN ($login_ip_id_new)");
}


$teenpatti_result_id=array();
$get_teenpatti_result_details = $conn->query("select * from twenty_teenpatti_result where cast(result_time as date) < '$monthAgoDate'");
	while($old_data_teenpatti_result = mysqli_fetch_assoc($get_teenpatti_result_details)){
		
		$columns_teenpatti_result = implode(", ",array_keys($old_data_teenpatti_result));
		$escaped_values_teenpatti_result = array_map(array($conn, 'real_escape_string'), array_values($old_data_teenpatti_result));
		$valuesteenpatti_result  = implode("', '", $escaped_values_teenpatti_result);
		$insrr_teenpatti_result=$old_conn->query("INSERT INTO `twenty_teenpatti_result_old_data`($columns_teenpatti_result) VALUES ('$valuesteenpatti_result')");
		if(isset($insrr_teenpatti_result) && !empty($insrr_teenpatti_result)){
			$teenpatti_result_id[] = $old_data_teenpatti_result['tt_result_id'];
			/* $conn->query("delete from twenty_teenpatti_result where login_ip_id=$login_ip_id"); */
		}
		
	}
if(count($teenpatti_result_id) > 0)
{
	$teenpatti_result_new=implode(",",$teenpatti_result_id);
	$conn->query("delete from twenty_teenpatti_result where tt_result_id IN ($teenpatti_result_new)");
}	
?>