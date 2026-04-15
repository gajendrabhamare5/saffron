<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account_summary extends CI_Controller {

    public function index() {

        $this->load->database();
        $this->load->library('users');

        if (!$this->users->require_power(2))
            return;

        $userdata = $this->users->data();

        $user_id = $userdata['Id'];
        $user_power = $userdata['power'];
        
        if(false){
        
        	$sql = 'SELECT Id FROM user_master WHERE parent_id = ' . $user_id;
			$res_whitelabel_childs = $this->db->query($sql)->result_array();
			$whitelabel_childs = array_column($res_whitelabel_childs, 'Id');
			
			if (!empty($whitelabel_childs)) {
				$whtlbl_child_ids = implode($whitelabel_childs, ',');
				
				$sql = 'SELECT SUM(amount) as available_balance FROM '.ACCOUNT_DATABASE_NAME.' WHERE user_id = ' . $user_id . ' AND entry_type IN (1,2,5)';
				$res = $this->db->query($sql)->row();
				$available_balance = $res->available_balance;

				/*      DOWN LEVEL USER BALANCE    */
		
				$res = $this->db->select('SUM(amount) as down_level_balances')
								->where('(u.Id IN ('.$whtlbl_child_ids.') OR u.parentDL IN ('.$whtlbl_child_ids.') OR u.parentMDL IN ('.$whtlbl_child_ids.') OR u.parentSuperMDL IN ('.$whtlbl_child_ids.') OR u.parentKingAdmin IN ('.$whtlbl_child_ids.') )')
								->join('user_master u', 'u.Id = ac.user_id', 'LEFT')
								->get(ACCOUNT_DATABASE_NAME.' ac')->row();
				$down_level_balances = $res->down_level_balances;

				/*      DOWN LEVEL USER CREDIT REFERENCE    */

				$res_dlcr = $this->db->select('SUM(u.credit_reference) as down_level_credit_reference')
								->where('u.parent_id', $user_id)
								->get('user_master u')->row();

				$down_level_credit_reference = $res_dlcr->down_level_credit_reference;

				/*
				 * ========================> This is for Profit Loss <=================================
				 */

				$sql_pl = 'SELECT (SELECT SUM(amount) FROM '.ACCOUNT_DATABASE_NAME.' WHERE `user_id` = ' . $user_id . ' AND `entry_type` NOT IN (1,2,5)) as my_pl';
				$pl_data = $this->db->query($sql_pl)->row();
		
				$my_pl = 0;
				if ($pl_data)
					$my_pl = $pl_data->my_pl;
				
				}		
        }
        else{
        
			$sql = 'SELECT SUM(amount) as available_balance FROM '.ACCOUNT_DATABASE_NAME.' WHERE user_id = ' . $user_id . ' AND entry_type IN (1,2,5)';
			$res = $this->db->query($sql)->row();
			$available_balance = $res->available_balance;

			/*      DOWN LEVEL USER BALANCE    */
		
			$res = $this->db->select('SUM(amount) as down_level_balances')
							->where('(u.parentDL = ' . $user_id . ' OR u.parentMDL = ' . $user_id . ' OR u.parentSuperMDL = ' . $user_id . ' OR u.parentKingAdmin = ' . $user_id . ')')
							->join('user_master u', 'u.Id = ac.user_id', 'LEFT')
							->get(ACCOUNT_DATABASE_NAME.' ac')->row();
							
			$down_level_balances = $res->down_level_balances;

			/*      DOWN LEVEL USER CREDIT REFERENCE    */

			$res_dlcr = $this->db->select('SUM(u.credit_reference) as down_level_credit_reference')
							->where('u.parent_id', $user_id)
							->get('user_master u')->row();

			$down_level_credit_reference = $res_dlcr->down_level_credit_reference;

			/*
			 * ========================> This is for Profit Loss <=================================
			 */

			$sql_pl = 'SELECT (SELECT SUM(amount) FROM '.ACCOUNT_DATABASE_NAME.' WHERE `user_id` = ' . $user_id . ' AND `entry_type` NOT IN (1,2,5)) as my_pl';
			$pl_data = $this->db->query($sql_pl)->row();
		
			$my_pl = 0;
			if ($pl_data)
				$my_pl = $pl_data->my_pl;

			/*
			 * ========================> End of This is for Profit Loss <=================================
			 */
        }

		
		
		
        $available_balance_with_pl = $available_balance + $my_pl;
        $master_balance = $available_balance_with_pl + $down_level_balances;
        $down_pl = $down_level_credit_reference - $down_level_balances;
        $down_level_pl = $down_level_credit_reference - $down_level_balances;
        
		if($user_id == 3163){
			/*original jevu karva key tyare remove karvanu aa*/
			$available_balance = $available_balance_with_pl;
		}
        $returnArr = array();
        $returnArr['available_balance'] = ceil($available_balance);
        $returnArr['credit_reference'] = ceil($userdata['credit_reference']);

        $returnArr['down_level_balances'] = ceil($down_level_balances);
        $returnArr['up_pl'] = ceil($userdata['credit_reference'] - $master_balance);
        $returnArr['available_balance_with_pl'] = ceil($available_balance_with_pl);

        $returnArr['master_balance'] = ceil($master_balance);

        $returnArr['down_level_credit_reference'] = ceil($down_level_credit_reference);
        $returnArr['down_level_pl'] = ceil($down_level_pl);
        $returnArr['down_pl'] = ceil($down_pl);
        $returnArr['my_pl'] = ceil($my_pl);

        return $this->print_json(array('results' => $returnArr));
    }

    private function print_json($array) {
        $this->output->
                set_content_type('application/json')->
                set_output(json_encode($array));
    }

}
