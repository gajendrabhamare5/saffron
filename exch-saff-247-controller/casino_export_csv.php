<?php
	include "../include/conn.php"; 
	$client_name_new=$_POST['client_name_new'];
	$master_name_new=$_POST['master_name_new'];
	$event_name=$_POST['event_name'];
	$type_name=$_POST['type_name'];
	$status_name=$_POST['status_name'];
	$start_date=$_POST['start_date'];
	$end_date=$_POST['end_date'];
	$where="";
	$user_id_all=array();

	$user_data_master_all=$conn->query("select UserID,Email_ID from user_login_master where UserType IN (2,3,4)");
	$master_user_array=array();
	$user_id_uuu=array();
	while($UserID_master_array_all=mysqli_fetch_assoc($user_data_master_all)){
		$master_userid=$UserID_master_array_all['UserID'];
		$master_Email_ID=$UserID_master_array_all['Email_ID'];
		$user_id_uuu[]=$master_userid;
		$master_user_array[$master_userid]=$master_Email_ID;
	}

	
	if(!empty($master_name_new))
	{
		$user_id_array=array();
		$master_name_new=implode("','",$master_name_new);
		$user_id_master_array=array();
		/* $user_id_uuu=array();
		$user_data_master=$conn->query("select UserID from user_login_master where UserType IN (2,3,4) and Email_ID IN ('$master_name_new')");
		while($UserID_master_array=mysqli_fetch_assoc($user_data_master))
		{
			$userid=$UserID_master_array['UserID'];
			$user_id_uuu[]=$userid;
		}
		$new_userid=implode(",",$user_id_uuu); */

		$user_data_master=$conn->query("select group_concat(UserID) as all_user_id from user_login_master where UserType IN (2,3,4) and Email_ID IN ('$master_name_new')");
		$UserID_master_array=mysqli_fetch_assoc($user_data_master);
		$userid=$UserID_master_array['all_user_id'];
		$new_userid=$userid;


		/* $user_data=$conn->query("select u1.UserID,u1.Email_ID,u2.Email_ID as master_name from user_login_master u1 inner join  user_login_master u2 on u2.UserID=u1.parentDL where u1.parentDL IN ($new_userid)");
		while($UserID_array=mysqli_fetch_assoc($user_data))
		{
			$userid=$UserID_array['UserID'];
			$Email_ID=$UserID_array['Email_ID'];
			$master_name=$UserID_array['master_name'];
			$user_id_array[$userid]['user_name']=$Email_ID;
			$user_id_array[$userid]['master_name']=$master_name;
			array_push($user_id_all,$userid);
			
		} */

		$user_data=$conn->query("select u1.UserID,u1.Email_ID,u1.parentDL from user_login_master u1  where u1.parentDL IN ($new_userid)");
		while($UserID_array=mysqli_fetch_assoc($user_data))
		{
			$userid=$UserID_array['UserID'];
			$Email_ID=$UserID_array['Email_ID'];
			$parentDL=$UserID_array['parentDL'];
			$master_name = $master_user_array[$parentDL];
			$user_id_array[$userid]['user_name']=$Email_ID;
			$user_id_array[$userid]['master_name']=$master_name;
			array_push($user_id_all,$userid);
			
		}
		
	}
	else
	{
		$condition="";
		if(!empty($client_name_new))
		{
			$client_name_new=implode("','",$client_name_new);
			$condition=" AND u1.Email_ID IN  ('$client_name_new')";
		}
			$user_id_array=array();
			/* $user_data=$conn->query("select u1.UserID,u1.Email_ID,u2.Email_ID as master_name from user_login_master u1 inner join  user_login_master u2 on u2.UserID=u1.parentDL where u1.UserType=1 $condition");
			while($UserID_array=mysqli_fetch_assoc($user_data))
			{
				$userid=$UserID_array['UserID'];
				$Email_ID=$UserID_array['Email_ID'];
				$master_name=$UserID_array['master_name'];
				$user_id_array[$userid]['user_name']=$Email_ID;
				$user_id_array[$userid]['master_name']=$master_name;
				if(!empty($client_name_new))
				{
					array_push($user_id_all,$userid);
				}
			} */

			$user_data=$conn->query("select u1.UserID,u1.Email_ID,u1.parentDL from user_login_master u1  where u1.UserType=1 $condition");
			while($UserID_array=mysqli_fetch_assoc($user_data))
			{
				$userid=$UserID_array['UserID'];
				$Email_ID=$UserID_array['Email_ID'];
				$parentDL=$UserID_array['parentDL'];
				$master_name = $master_user_array[$parentDL];
				$user_id_array[$userid]['user_name']=$Email_ID;
				$user_id_array[$userid]['master_name']=$master_name;
				if(!empty($client_name_new))
				{
					array_push($user_id_all,$userid);
				}
				
				
			}
	
	}
	
	if(count($user_id_all) > 0)
	{
		$user_id_master_all_new=implode(",",$user_id_all);
		$where.="and user_id IN ($user_id_master_all_new)";
	}
	if(!empty($event_name))
	{
		$where.="and event_name IN ('$event_name')";                                                                     
	}
	/* if(!empty($type_name))
	{
		$where.="and market_type IN ('$type_name')";
	}*/
	if(!empty($status_name) && $status_name!='hard_delete')
	{
		$where.="and bet_status IN ($status_name)";
	}
	if(!empty($start_date))
	{
		$start_date = date("Y-m-d",strtotime($start_date));
		$where.="and cast(bet_time as date) >= '$start_date'";
	}
	if(!empty($end_date))
	{
		$end_date = date("Y-m-d",strtotime($end_date));
		$where.="and cast(bet_time as date) <= '$end_date'";
	}
	/* echo "<pre>";
	print_r($user_id_array);
	echo "</pre>";
	echo "select * from `bet_details` where 1=1 $where"; */
	 header("Content-Type:text/csv; charset=utf-8");
		header("Content-Disposition:attectment;filename=export_casino.csv");
		$output=fopen("php://output","w");
		if(!empty($status_name) && $status_name=='hard_delete'){
			fputcsv($output,array('Bet Id','User Name','Master Name','Event Name','Market Name','Bet Type','Run','Odds', 'Stack','Result','Status','Time','IP Address','User Agent','Delete Time','Delete IP Address'));
			$q1=$conn->query("select * from `bet_teen_details_deleted` where 1=1 $where");
		}else{
			fputcsv($output,array('Bet Id','User Name','Master Name','Event Name','Market Name','Bet Type','Run','Odds', 'Stack','Result','Status','Time','IP Address','User Agent'));
			$q1=$conn->query("select * from `bet_teen_details` where 1=1 $where");
		}
		
		
		foreach($q1 as $i1)
		{
			$bet_id=$i1['bet_id']; 
			$bet_user_id=$i1['user_id']; 
			$user_name=$user_id_array[$bet_user_id]['user_name']; 
			$master_name=$user_id_array[$bet_user_id]['master_name']; 
			$event_name=$i1['event_name'];
			$market_name=$i1['market_name'];
			$bet_runs=$i1['bet_runs'];
			$bet_type=$i1['bet_type'];
			$bet_odds=$i1['bet_odds'];
			$bet_stack=$i1['bet_stack'];
			$bet_result=$i1['bet_result'];
			$bet_status1=$i1['bet_status'];
			if($bet_status1 == "0")
			{
				$bet_status="Settled";
			}
			if($bet_status1 == "1")
			{
				$bet_status="Active";
			}
			if($bet_status1 == "2")
			{
				$bet_status="Cancelled";
			}
			$bet_time =$i1['bet_time'];
			$bet_ip_address=$i1['bet_ip_address'];
			$bet_user_agent=$i1['bet_user_agent'];
			
			if(!empty($status_name) && $status_name=='hard_delete'){
				$deleted_time =$i1['deleted_time'];
				$deleted_ip_address =$i1['deleted_ip_address'];
				fputcsv($output,array($bet_id,$user_name,$master_name,$event_name,$market_name,$bet_type,$bet_runs,$bet_odds,$bet_stack,$bet_result,$bet_status,$bet_time,$bet_ip_address,$bet_user_agent,$deleted_time,$deleted_ip_address)); 
			}else{
				fputcsv($output,array($bet_id,$user_name,$master_name,$event_name,$market_name,$bet_type,$bet_runs,$bet_odds,$bet_stack,$bet_result,$bet_status,$bet_time,$bet_ip_address,$bet_user_agent)); 
			}
		}		
		fclose($output);  
		/* 
		$return_array = array(
        "status" => "ok",
    );
    echo json_encode($return_array);
    exit(); */
 
?>
