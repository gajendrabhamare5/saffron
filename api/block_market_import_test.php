<?php
	include('../include/conn.php');
	error_reporting(E_ALL);
 	ini_set("display_errors",1);
	ini_set("display_startup_errors",1);
	
	$all_block_array = array();
	
	$dl_sport_block = array();
	$mdl_sport_block = array();
	$smdl_sport_block = array();

	$dl_sport_block_array = array();
	$mdl_sport_block_array = array();
	$smdl_sport_block_array = array();
	
	$sport_block_dl_array = "";
	$sport_block_mdl_array = "";
	$sport_block_smdl_array = "";
	
	$event_block_dl_array = "";
	$event_block_mdl_array = "";
	$event_block_smdl_array = "";
	$market_block_smdl_array =array();
	$market_block_mdl_array =array();
	$market_block_dl_array =array();
	$cricket_block_dl = array();
	$cricket_block_mdl = array();
	$cricket_block = array();
	
	$tennis_block_dl = array();
	$tennis_block_mdl = array();
	$tennis_block = array();
	
	$soccer_block_dl = array();
	$soccer_block_mdl = array();
	$soccer_block = array();
	
	$smdl_ids = array();
	$mdl_ids = array();
	$dl_ids = array();
	
	$cricket_block_ids  = array();
	$cricket_block_dl_ids = array();
	$cricket_block_mdl_ids = array();
	
	$sport_block_dl_ids = array();
	$sport_block_mdl_ids = array();	
	$sport_block_smdl_ids  = array();
	
	$dl_event_type = array();
	$mdl_event_type = array();
	$smdl_event_type = array();
	
	$cricket_market_block_smdl_ids = array();
	$cricket_market_block_smdl = array();
	
	$cricket_market_block_mdl_ids = array();
	$cricket_market_block_mdl = array();
	
	$cricket_market_block_dl_ids = array();
	$cricket_market_block_dl = array();
	
	
	$get_event_block = $conn->query("select * from block_sport GROUP BY block_by");
	while($fetch_get_event_block = mysqli_fetch_assoc($get_event_block)){
		$block_by = $fetch_get_event_block['block_by'];
		
		$get_user_type = $conn->query("select * from user_login_master where UserType=4 and UserID=$block_by");
		$num_rows_smdl = mysqli_num_rows($get_user_type);
		if($num_rows_smdl > 0){
			$get_user_type = $conn->query("select * from block_sport where block_by=$block_by");
			while($fetch_get_sport_block = mysqli_fetch_assoc($get_user_type)){
				$event_type = $fetch_get_sport_block['event_type'];
				$smdl_event_type[] = $event_type;
			}
			$sport_block_smdl_ids[] = $block_by;
			$smdl_sport_block[$block_by] = array(
										"eventType"=>$smdl_event_type
										);
			$smdl_event_type = null;
		}
		
	}
	$smdl_sport_block_array = $smdl_sport_block;
	
	
	$get_event_block = $conn->query("select * from block_sport GROUP BY block_by");
	while($fetch_get_event_block = mysqli_fetch_assoc($get_event_block)){
		$block_by = $fetch_get_event_block['block_by'];
		
		$get_user_type = $conn->query("select * from user_login_master where UserType=3 and UserID=$block_by");
		$num_rows_mdl = mysqli_num_rows($get_user_type);
		if($num_rows_mdl > 0){
			$get_user_type = $conn->query("select * from block_sport where block_by=$block_by");
			while($fetch_get_sport_block = mysqli_fetch_assoc($get_user_type)){
				$event_type = $fetch_get_sport_block['event_type'];
				$mdl_event_type[] = $event_type;
			}
			$sport_block_mdl_ids[] = $block_by;
			$mdl_sport_block[$block_by] = array(
										"eventType"=>$mdl_event_type
										);
			$mdl_event_type = null;
		}
	
	}
	$mdl_sport_block_array = $mdl_sport_block;
	
	$get_event_block = $conn->query("select * from block_sport GROUP BY block_by");
	while($fetch_get_event_block = mysqli_fetch_assoc($get_event_block)){
		$block_by = $fetch_get_event_block['block_by'];
		
		$get_user_type = $conn->query("select * from user_login_master where UserType=2 and UserID=$block_by");
		$num_rows_dl = mysqli_num_rows($get_user_type);
		if($num_rows_dl > 0){
			$get_user_type = $conn->query("select * from block_sport where block_by=$block_by");
			while($fetch_get_sport_block = mysqli_fetch_assoc($get_user_type)){
				$event_type = $fetch_get_sport_block['event_type'];
				$dl_event_type[] = $event_type;
			}
			$sport_block_dl_ids[] = $block_by;
			$dl_sport_block[$block_by] = array(
									"eventType"=>$dl_event_type
									);
			$dl_event_type = null;
		}
		
	}
	$dl_sport_block_array = $dl_sport_block;
	
	
	
	$get_event_block = $conn->query("select * from block_event_id GROUP BY block_by");
	while($fetch_get_event_block = mysqli_fetch_assoc($get_event_block)){
			$block_by = $fetch_get_event_block['block_by'];
			$get_user_type = $conn->query("select * from user_login_master where UserType=4 and UserID=$block_by");
			$num_rows_smdl = mysqli_num_rows($get_user_type);
			if($num_rows_smdl > 0){
				$get_event_block_ids = $conn->query("select * from block_event_id where block_by=$block_by");
				while($fetch_get_event_block_ids = mysqli_fetch_assoc($get_event_block_ids)){

					$event_id = $fetch_get_event_block_ids['event_id'];
					$event_type = $fetch_get_event_block_ids['event_type'];
					
					$cricket_block[] = strval($event_id);
				}
				
				
				$smdl_ids[] = $block_by;
				$cricket_block_ids[$block_by] = array("cricket"=>$cricket_block);
				$cricket_block = null;
			}
			
	}
	if($smdl_ids != null){
		//$cricket_block_ids['SMDL']=$smdl_ids;
		$event_block_smdl_array = $cricket_block_ids;
	}
	

	$get_event_block_mdl = $conn->query("select * from block_event_id GROUP BY block_by");
	while($fetch_get_event_block_mdl = mysqli_fetch_assoc($get_event_block_mdl)){
			$block_by = $fetch_get_event_block_mdl['block_by'];
			$get_user_type = $conn->query("select * from user_login_master where UserType=3 and UserID=$block_by");
			$num_rows_mdl = mysqli_num_rows($get_user_type);
			if($num_rows_mdl > 0){
				$get_event_block_ids = $conn->query("select * from block_event_id where block_by=$block_by");
				while($fetch_get_event_block_ids = mysqli_fetch_assoc($get_event_block_ids)){
					$event_id = $fetch_get_event_block_ids['event_id'];
					$event_type = $fetch_get_event_block_ids['event_type'];

					
					$cricket_block_mdl[] = strval($event_id);
				}
				
				
				$mdl_ids[] = $block_by;
				$cricket_block_mdl_ids[$block_by] = array("cricket"=>$cricket_block_mdl);
				$cricket_block_mdl = null;
			}
			
	}
	if($mdl_ids != null){
		//$cricket_block_mdl_ids['MDL']=$mdl_ids;
		$event_block_mdl_array = $cricket_block_mdl_ids;
	
	}
	
	
	$get_event_block_dl = $conn->query("select * from block_event_id GROUP BY block_by");
	while($fetch_get_event_block_dl = mysqli_fetch_assoc($get_event_block_dl)){
			$block_by = $fetch_get_event_block_dl['block_by'];
			$get_user_type = $conn->query("select * from user_login_master where UserType=2 and UserID=$block_by");
			$num_rows_dl = mysqli_num_rows($get_user_type);
			if($num_rows_dl > 0){
				$get_event_block_ids = $conn->query("select * from block_event_id where block_by=$block_by");
				while($fetch_get_event_block_ids = mysqli_fetch_assoc($get_event_block_ids)){
									
					$event_id = $fetch_get_event_block_ids['event_id'];
					$event_type = $fetch_get_event_block_ids['event_type'];

					$cricket_block_dl[] = strval($event_id);
				}
				
				
				$dl_ids[] = $block_by;
				$cricket_block_dl_ids[$block_by] = array("cricket"=>$cricket_block_dl);
				$cricket_block_dl = null;
			}
			
	}
	if($dl_ids != null){
		//$cricket_block_dl_ids['DL']=$dl_ids;
		$event_block_dl_array = $cricket_block_dl_ids;
	
	}
	
	
	$get_event_block = $conn->query("select * from block_market_id GROUP BY block_by");
	while($fetch_get_event_block = mysqli_fetch_assoc($get_event_block)){
			$block_by = $fetch_get_event_block['block_by'];
			$get_user_type = $conn->query("select * from user_login_master where UserType=4 and UserID=$block_by");
			$num_rows_smdl = mysqli_num_rows($get_user_type);
			if($num_rows_smdl > 0){
				$get_event_block_ids = $conn->query("select * from block_market_id where block_by=$block_by");
				while($fetch_get_event_block_ids = mysqli_fetch_assoc($get_event_block_ids)){
					$market_id = $fetch_get_event_block_ids['market_id'];
					
						$cricket_market_block_smdl[] = intval($market_id);
					
					}
				
				
				$cricket_market_block_smdl_ids[$block_by] = array("cricket"=>$cricket_market_block_smdl);
				$cricket_market_block_smdl = null;
			}
			
	}
	if($smdl_ids != null){
		//$cricket_block_ids['SMDL']=$smdl_ids;
		$market_block_smdl_array = $cricket_market_block_smdl_ids;
	}
	
	
	$get_event_block = $conn->query("select * from block_market_id GROUP BY block_by");
	while($fetch_get_event_block = mysqli_fetch_assoc($get_event_block)){
			$block_by = $fetch_get_event_block['block_by'];
			$get_user_type = $conn->query("select * from user_login_master where UserType=3 and UserID=$block_by");
			$num_rows_smdl = mysqli_num_rows($get_user_type);
			if($num_rows_smdl > 0){
				$get_event_block_ids = $conn->query("select * from block_market_id where block_by=$block_by");
				while($fetch_get_event_block_ids = mysqli_fetch_assoc($get_event_block_ids)){
					$market_id = $fetch_get_event_block_ids['market_id'];
					
						$cricket_market_block_mdl[] = intval($market_id);
					
					}
				
				
				$cricket_market_block_mdl_ids[$block_by] = array("cricket"=>$cricket_market_block_mdl);
				$cricket_market_block_mdl = null;
			}
			
	}
	if($mdl_ids != null){
		//$cricket_block_ids['SMDL']=$smdl_ids;
		$market_block_mdl_array = $cricket_market_block_mdl_ids;
	}
	
	
	$get_event_block = $conn->query("select * from block_market_id GROUP BY block_by");
	while($fetch_get_event_block = mysqli_fetch_assoc($get_event_block)){
			$block_by = $fetch_get_event_block['block_by'];
			$get_user_type = $conn->query("select * from user_login_master where UserType=2 and UserID=$block_by");
			$num_rows_smdl = mysqli_num_rows($get_user_type);
			if($num_rows_smdl > 0){
				$get_event_block_ids = $conn->query("select * from block_market_id where block_by=$block_by");
				while($fetch_get_event_block_ids = mysqli_fetch_assoc($get_event_block_ids)){
					$market_id = $fetch_get_event_block_ids['market_id'];
					
						$cricket_market_block_dl[] = intval($market_id);
					
					}
				
				
				$cricket_market_block_dl_ids[$block_by] = array("cricket"=>$cricket_market_block_dl);
				$cricket_market_block_dl = null;
			}
			
	}
	if($dl_ids != null){
		//$cricket_block_ids['SMDL']=$smdl_ids;
		$market_block_dl_array = $cricket_market_block_dl_ids;
	}
	
	
	$return = new stdClass();
	$return->sportByDL=$dl_sport_block_array;
	$return->sportByMDL=$mdl_sport_block_array;
	$return->sportBySMDL=$smdl_sport_block_array;
	$return->eventByDL=$event_block_dl_array;
	$return->eventByMDL=$event_block_mdl_array;
	$return->eventBySMDL=$event_block_smdl_array;
	$return->marketBySMDL=$market_block_smdl_array;
	$return->marketByMDL=$market_block_mdl_array;
	$return->marketByDL=$market_block_dl_array;
	$return->siteId=5;
	echo json_encode($return);
?>	