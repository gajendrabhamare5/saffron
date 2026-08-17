<?php
function get_level_per($conn, $bet_user_id) {
    $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
    $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
    $parentDL = $fetch_parent_ids['parentDL'];
    $parentMDL = $fetch_parent_ids['parentMDL'];
    $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
    $parentKingAdmin = $fetch_parent_ids['parentKingAdmin'];
    $UserType = $fetch_parent_ids['UserType'];

    $level_per_arr = array();
    $dl_per = $mdl_per = $smdl_per = 0;
    if ($parentDL > 0) {
        $res_dl_data = $conn->query("select my_percentage from user_master where Id=$parentDL");
        $dl_data = mysqli_fetch_assoc($res_dl_data);
        if ($dl_data) {
            $dl_per = $dl_data['my_percentage'];
            if ($dl_per <= 100 && $dl_per > 0) {
                $level_per_arr[$parentDL] = $dl_per;
            }
        }
    }
    if ($parentMDL > 0) {
        $res_mdl_data = $conn->query("select my_percentage from user_master where Id=$parentMDL");
        $mdl_data = mysqli_fetch_assoc($res_mdl_data);
        if ($mdl_data) {
            $mdl_per = $mdl_data['my_percentage'];
            
            if ($mdl_per <= 100 && $mdl_per > 0 && !isset($level_per_arr[$parentMDL])) {
                $level_per_arr[$parentMDL] = $mdl_per - $dl_per;
            }
        }
    }
    if ($parentSuperMDL > 0) {
        $res_smdl_data = $conn->query("select my_percentage from user_master where Id=$parentSuperMDL");
        $smdl_data = mysqli_fetch_assoc($res_smdl_data);
        if ($smdl_data) {
            $smdl_per = $smdl_data['my_percentage'];
            if ($smdl_per <= 100 && $smdl_per > 0  && !isset($level_per_arr[$parentSuperMDL])) {
                $level_per_arr[$parentSuperMDL] = $smdl_per - $mdl_per;
            }
        }
    } 
	
	if ($parentKingAdmin > 0) {
        $res_kingadmin_data = $conn->query("select my_percentage from user_master where Id=$parentKingAdmin");
        $kingadmin_data = mysqli_fetch_assoc($res_kingadmin_data);
        if ($kingadmin_data) {
            $king_per = $kingadmin_data['my_percentage'];
            if ($king_per <= 100 && $king_per > 0  && !isset($level_per_arr[$parentKingAdmin])) {
                $level_per_arr[$parentKingAdmin] = $king_per - $smdl_per;
            }
        }
    }

	/*	WhiteLabel	*/
	/* if ($smdl_per <= WHTELABEL_PER) {
		$level_per_arr[WHTELABEL_ID] = WHTELABEL_PER - $king_per;	
	} */
	/*	WhiteLabel	*/
    
    /*	Controller	*/
	$cn_per = 100;
	$level_per_arr[CONTROLLER_ID] = $cn_per - $king_per;	
    /*	Controller	*/

    return $level_per_arr;
}

function get_level_per_result_new($conn, $bet_user_id,$user_list) {
    /*  $get_parent_ids = $conn->query("select * from user_login_master where UserID=$bet_user_id");
     $fetch_parent_ids = mysqli_fetch_assoc($get_parent_ids);
     $parentDL = $fetch_parent_ids['parentDL'];
     $parentMDL = $fetch_parent_ids['parentMDL'];
     $parentSuperMDL = $fetch_parent_ids['parentSuperMDL'];
     $parentKingAdmin = $fetch_parent_ids['parentKingAdmin'];
     $UserType = $fetch_parent_ids['UserType']; */
     $parentDL = $user_list[$bet_user_id]['parentDL'];
     $parentMDL = $user_list[$bet_user_id]['parentMDL'];
     $parentSuperMDL = $user_list[$bet_user_id]['parentSuperMDL'];
     $parentKingAdmin = $user_list[$bet_user_id]['parentKingAdmin'];
     $UserType = $user_list[$bet_user_id]['UserType']; 
 
     $level_per_arr = array();
     $dl_per = $mdl_per = $smdl_per = 0;
     if ($parentDL > 0) {
         $res_dl_data = $conn->query("select my_percentage from user_master where Id=$parentDL");
         $dl_data = mysqli_fetch_assoc($res_dl_data);
         /* $dl_data=$user_list[$parentDL]; */
         if ($dl_data) {
             $dl_per = $dl_data['my_percentage'];
             if ($dl_per <= 100 && $dl_per > 0) {
                 $level_per_arr[$parentDL] = $dl_per;
             }
         }
     }
     if ($parentMDL > 0) {
         $res_mdl_data = $conn->query("select my_percentage from user_master where Id=$parentMDL");
         $mdl_data = mysqli_fetch_assoc($res_mdl_data);
        /*  $mdl_data=$user_list[$parentMDL]; */
         if ($mdl_data) {
             $mdl_per = $mdl_data['my_percentage'];
             
             if ($mdl_per <= 100 && $mdl_per > 0 && !isset($level_per_arr[$parentMDL])) {
                 $level_per_arr[$parentMDL] = $mdl_per - $dl_per;
             }
         }
     }
     if ($parentSuperMDL > 0) {
         $res_smdl_data = $conn->query("select my_percentage from user_master where Id=$parentSuperMDL");
         $smdl_data = mysqli_fetch_assoc($res_smdl_data);
         /* $smdl_data=$user_list[$parentSuperMDL]; */
         if ($smdl_data) {
             $smdl_per = $smdl_data['my_percentage'];
             if ($smdl_per <= 100 && $smdl_per > 0  && !isset($level_per_arr[$parentSuperMDL])) {
                 $level_per_arr[$parentSuperMDL] = $smdl_per - $mdl_per;
             }
         }
     } 
     
     if ($parentKingAdmin > 0) {
         $res_kingadmin_data = $conn->query("select my_percentage from user_master where Id=$parentKingAdmin");
         $kingadmin_data = mysqli_fetch_assoc($res_kingadmin_data);
         /* $kingadmin_data=$user_list[$parentKingAdmin]; */
         if ($kingadmin_data) {
             $king_per = $kingadmin_data['my_percentage'];
             if ($king_per <= 100 && $king_per > 0  && !isset($level_per_arr[$parentKingAdmin])) {
                 $level_per_arr[$parentKingAdmin] = $king_per - $smdl_per;
             }
         }
     }
 
     /*	WhiteLabel	*/
     /* if ($smdl_per <= WHTELABEL_PER) {
         $level_per_arr[WHTELABEL_ID] = WHTELABEL_PER - $king_per;	
     } */
     /*	WhiteLabel	*/
     
     /*	Controller	*/
     $cn_per = 100;
     $level_per_arr[CONTROLLER_ID] = $cn_per - $king_per;	
     /*	Controller	*/
 
     return $level_per_arr;
 }

?>