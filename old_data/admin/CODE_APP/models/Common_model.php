<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

    function get_my_partnership($user_data = array(), $betting_data = array(),$return_type = 'my') {

        $parentDL = $betting_data['parentDL'];
        $parentMDL = $betting_data['parentMDL'];
        $parentSuperMDL = $betting_data['parentSuperMDL'];
        $parentKingAdmin = $betting_data['parentKingAdmin'];

        $level_per_arr = array();
        $dl_per = $mdl_per = $smdl_per = 0;
        if ($parentDL > 0) {
            $res_dl_data = $this->db->query("select my_percentage from user_master where Id=$parentDL");
            $dl_data = $res_dl_data->row_array();
            if ($dl_data) {
                $dl_per = $dl_data['my_percentage'];
                if ($dl_per <= 100 && $dl_per > 0) {
                    $level_per_arr[$parentDL] = $dl_per;
                }
            }
        }
        if ($parentMDL > 0) {
            $res_mdl_data = $this->db->query("select my_percentage from user_master where Id=$parentMDL");
            $mdl_data = $res_mdl_data->row_array();
            if ($mdl_data) {
                $mdl_per = $mdl_data['my_percentage'];

                if ($mdl_per <= 100 && $mdl_per > 0 && !isset($level_per_arr[$parentMDL])) {
                    $level_per_arr[$parentMDL] = $mdl_per - $dl_per;
                }
            }
        }
        if ($parentSuperMDL > 0) {
            $res_smdl_data = $this->db->query("select my_percentage from user_master where Id=$parentSuperMDL");
            $smdl_data = $res_smdl_data->row_array();
            if ($smdl_data) {
                $smdl_per = $smdl_data['my_percentage'];
                if ($smdl_per <= 100 && $smdl_per > 0 && !isset($level_per_arr[$parentSuperMDL])) {
                    $level_per_arr[$parentSuperMDL] = $smdl_per - $mdl_per;
                }
            }
        }
		
		if ($parentSuperMDL > 0) {
            $res_smdl_data = $this->db->query("select my_percentage from user_master where Id=$parentSuperMDL");
            $smdl_data = $res_smdl_data->row_array();
            if ($smdl_data) {
                $smdl_per = $smdl_data['my_percentage'];
                if ($smdl_per <= 100 && $smdl_per > 0 && !isset($level_per_arr[$parentSuperMDL])) {
                    $level_per_arr[$parentSuperMDL] = $smdl_per - $mdl_per;
                }
            }
        }
		
		if ($parentKingAdmin > 0) {
            $res_king_data = $this->db->query("select my_percentage from user_master where Id=$parentKingAdmin");
            $king_data = $res_king_data->row_array();
            if ($king_data) {
                $king_per = $king_data['my_percentage'];
                if ($king_per <= 100 && $king_per > 0 && !isset($level_per_arr[$parentKingAdmin])) {
                    $level_per_arr[$parentKingAdmin] = $king_per - $smdl_per;
                }
            }
        }

		/*	WhiteLabel	*/
		/* if ($smdl_per <= WHTELABEL_PER) {
			$level_per_arr[WHTELABEL_ID] = WHTELABEL_PER - $smdl_per;	
		} */
		/*	WhiteLabel	*/
	
		/*	Controller	*/
		/* if(WHTELABEL_PER < 100){ */
			$cn_per = 100;
			$level_per_arr[CONTROLLER_ID] = $cn_per - $king_per;	
		/* } */
		/*	Controller	*/

        if($return_type == 'all'){
            return $level_per_arr;
        }
        else{
            return $level_per_arr[$user_data['Id']];
        }
    }
    
    function get_partnership_with_power($user_data = array(), $betting_data = array(),$return_type = 'my') {

        $parentDL = $betting_data['parentDL'];
        $parentMDL = $betting_data['parentMDL'];
        $parentSuperMDL = $betting_data['parentSuperMDL'];
        $parentKingAdmin = $betting_data['parentKingAdmin'];

        $level_per_arr = array();
        $dl_per = $mdl_per = $smdl_per = $king_per = 0;
        if ($parentDL > 0) {
            $res_dl_data = $this->db->query("select my_percentage,power,Email_ID,parent_id from user_master where Id=$parentDL");
            $dl_data = $res_dl_data->row_array();
            if ($dl_data) {
                $dl_per = $dl_data['my_percentage'];
                if ($dl_per <= 100 && $dl_per >= 0) {
                    $level_per_arr[$parentDL]['per'] = $dl_per;
                    $level_per_arr[$parentDL]['power'] = $dl_data['power'];
                    $level_per_arr[$parentDL]['Email_ID'] = $dl_data['Email_ID'];
                    $level_per_arr[$parentDL]['parent_id'] = $dl_data['parent_id'];
                }
            }
        }
        if ($parentMDL > 0) {
            $res_mdl_data = $this->db->query("select my_percentage,power,Email_ID,parent_id from user_master where Id=$parentMDL");
            $mdl_data = $res_mdl_data->row_array();
            if ($mdl_data) {
                $mdl_per = $mdl_data['my_percentage'];

                if ($mdl_per <= 100 && $mdl_per >= 0 && !isset($level_per_arr[$parentMDL])) {
                    $level_per_arr[$parentMDL]['per'] = $mdl_per - $dl_per;
                    $level_per_arr[$parentMDL]['power'] = $mdl_data['power'];
                    $level_per_arr[$parentMDL]['Email_ID'] = $mdl_data['Email_ID'];
                    $level_per_arr[$parentMDL]['parent_id'] = $mdl_data['parent_id'];
                }
            }
        }
       
	   if ($parentSuperMDL > 0) {
            $res_smdl_data = $this->db->query("select my_percentage,power,Email_ID,parent_id from user_master where Id=$parentSuperMDL");
            $smdl_data = $res_smdl_data->row_array();
            if ($smdl_data) {
                $smdl_per = $smdl_data['my_percentage'];
                if ($smdl_per <= 100 && $smdl_per >= 0 && !isset($level_per_arr[$parentSuperMDL])) {
                    $level_per_arr[$parentSuperMDL]['per'] = $smdl_per - $mdl_per;
                    $level_per_arr[$parentSuperMDL]['power'] = $smdl_data['power'];
                    $level_per_arr[$parentSuperMDL]['Email_ID'] = $smdl_data['Email_ID'];
                    $level_per_arr[$parentSuperMDL]['parent_id'] = $smdl_data['parent_id'];
                }
            }
        }

		if ($parentKingAdmin > 0) {
			
            $res_king_data = $this->db->query("select my_percentage,power,Email_ID,parent_id from user_master where Id=$parentKingAdmin");
            $king_data = $res_king_data->row_array();
            if($king_data) {
                $king_per = $king_data['my_percentage'];
				
                if ($king_per <= 100 && $king_per >= 0 && !isset($level_per_arr[$parentKingAdmin])) {
                    $level_per_arr[$parentKingAdmin]['per'] = $king_per - $smdl_per;
                    $level_per_arr[$parentKingAdmin]['power'] = $king_data['power'];
                    $level_per_arr[$parentKingAdmin]['Email_ID'] = $king_data['Email_ID'];
                    $level_per_arr[$parentKingAdmin]['parent_id'] = $king_data['parent_id'];
                }
            }
        }


		/*	WhiteLabel	*/
		/* if ($smdl_per <= WHTELABEL_PER) {
			$level_per_arr[WHTELABEL_ID]['per'] = WHTELABEL_PER - $smdl_per;			
			$level_per_arr[WHTELABEL_ID]['power'] = WHTELABEL_POWER;
			$level_per_arr[WHTELABEL_ID]['Email_ID'] = WHTELABEL_EMAIL_ID;
			$level_per_arr[WHTELABEL_ID]['parent_id'] = CONTROLLER_ID;
		} */
		/*	WhiteLabel	*/
	
		/*	Controller	*/
		/* if(WHTELABEL_PER < 100){ */
			$cn_per = 100;
			$level_per_arr[CONTROLLER_ID]['per'] = $cn_per - $king_per;
			$level_per_arr[CONTROLLER_ID]['power'] = 5;
			$level_per_arr[CONTROLLER_ID]['Email_ID'] = "11Starexch";
			$level_per_arr[CONTROLLER_ID]['parent_id'] = 0;
		/* } */
		/*	Controller	*/
        
        if($return_type == 'all'){
            return $level_per_arr;
        }
        else{
            return $level_per_arr[$user_data['Id']];
        }
    }
	function get_my_partnership_all_user($user_data = array(),  $percentage_parentDL,$percentage_parentMDL,$percentage_parentSuperMDL,$percentage_parentKingAdmin,$betting_data,$return_type = 'my') {

        $parentDL = $betting_data['parentDL'];
        $parentMDL = $betting_data['parentMDL'];
        $parentSuperMDL = $betting_data['parentSuperMDL'];
        $parentKingAdmin = $betting_data['parentKingAdmin'];

        $level_per_arr = array();
        $dl_per = $mdl_per = $smdl_per = 0;
        if ($parentDL > 0) {
            
            if ($percentage_parentDL) {
                $dl_per = $percentage_parentDL;
                if ($dl_per <= 100 && $dl_per >= 0) {
                    $level_per_arr[$parentDL] = $dl_per;
                }
            }
        }
        if ($parentMDL > 0) {
            
            if ($percentage_parentMDL) {
                $mdl_per = $percentage_parentMDL;

                if ($mdl_per <= 100 && $mdl_per >= 0 && !isset($level_per_arr[$parentMDL])) {
                    $level_per_arr[$parentMDL] = $mdl_per - $dl_per;
                }
            }
        }
        if ($parentSuperMDL > 0) {
           
            if ($percentage_parentSuperMDL) {
                $smdl_per = $percentage_parentSuperMDL;
                if ($smdl_per <= 100 && $smdl_per >= 0 && !isset($level_per_arr[$parentSuperMDL])) {
                    $level_per_arr[$parentSuperMDL] = $smdl_per - $mdl_per;
                }
            }
        }
		
		if ($parentKingAdmin > 0) {
			if ($percentage_parentKingAdmin) {
                $king_per = $percentage_parentKingAdmin;
                if ($king_per <= 100 && $king_per >= 0 && !isset($level_per_arr[$parentKingAdmin])) {
                    $level_per_arr[$parentKingAdmin] = $king_per - $smdl_per;
                }
            }
        }
		/*if ($parentKingAdmin > 0) {
            $res_king_data = $this->db->query("select my_percentage from user_master where Id=$parentKingAdmin");
            $king_data = $res_king_data->row_array();
            if ($king_data) {
                $king_per = $king_data['my_percentage'];
                if ($king_per <= 100 && $king_per > 0 && !isset($level_per_arr[$parentKingAdmin])) {
                    $level_per_arr[$parentKingAdmin] = $king_per - $smdl_per;
                }
            }
        }*/

		/*	WhiteLabel	*/
		/* if ($smdl_per <= WHTELABEL_PER) {
			$level_per_arr[WHTELABEL_ID] = WHTELABEL_PER - $smdl_per;	
		} */
		/*	WhiteLabel	*/
	
		/*	Controller	*/
		/* if(WHTELABEL_PER < 100){ */
			$cn_per = 100;
			$level_per_arr[CONTROLLER_ID] = $cn_per - $king_per;	
		/* } */
		/*	Controller	*/

        if($return_type == 'all'){
            return $level_per_arr;
        }
        else{
            return $level_per_arr[$user_data['Id']];
        }
    }

}

?>