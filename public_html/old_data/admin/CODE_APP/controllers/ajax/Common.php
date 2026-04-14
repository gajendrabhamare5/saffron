<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

    public $layout = array();

    function index() {
        
    }

    function getuserdata() {

        $this->load->database();

        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }
        
        $userdata = $this->users->data();

        $uid = $this->input->post('id');

        $to_account_data = $this->get_account_data($uid,',Email_ID,net_exposure_limit,credit_reference,Status,bet_status,cricket_access,soccer_access,tennis_access,video_access,parent_id');
        	
		$from_account_data = $this->get_account_data($to_account_data['parent_id'],',Id,Email_ID');
		
		unset($to_account_data['parent_id']);
		
		$data = $to_account_data;
				
		$data['account_balance'] = ROUND($data['account_balance'],2);
        $data['fisrt_balance'] = ROUND($from_account_data['account_balance'],2);
        $data['fisrt_name'] = $from_account_data['Email_ID'];
        
        echo json_encode(array('result' => $data));
    }

	private function get_account_data($id = 0,$select = '') {
        $sql = "
				SELECT 
					(IFNULL((SELECT SUM(ac.amount) FROM ".ACCOUNT_DATABASE_NAME."  as ac WHERE m.Id = ac.user_id AND $id = ac.user_id AND ac.account_id > m.sync_account_id),0) + m.total_balace) as account_balance 
					$select
				FROM user_master as m
				WHERE m.Id = $id";
		return $this->db->query($sql)->row_array();
    }
    
    private function get_account_data_($id = 0) {
        $this->db->select('SUM(ac.`amount`) as account_balance');
        $this->db->where('s.Id = ' . $id . ' OR s.parentDL = ' . $id . ' OR s.parentMDL = ' . $id . ' OR s.parentSuperMDL = ' . $id . ' OR s.parentKingAdmin = ' . $id, NULL, FALSE);
        $this->db->join('user_master s', 's.Id = ac.user_id', 'LEFT');
        $user_ac_data = $this->db->get(ACCOUNT_DATABASE_NAME.' ac')->row_array();
        $user_ac_data['account_balance'] = number_format($user_ac_data['account_balance'],2,".","");
        return $user_ac_data;
    }

    public function getusers() {

        $this->load->database();

        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();

        $this->db->select('u.Email_ID as username, u.bet_status as status, u.fancy_bet_status as fstatus');
        $this->db->where('u.parent_id', $user_data['Id']);
        $users_data = $this->db->get('user_master u')->result_array();

        echo $this->print_json(array('results' => $users_data));
    }

    public function get_casino_rresult($event_id = 0, $casino_type = "") {

        $this->load->database();

        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();

        $this->db->select('event_id,result_status,cards');
        $this->db->where('event_id', $event_id);
        $this->db->where('game_type', $casino_type);
        $casino_result_data = $this->db->get('twenty_teenpatti_result')->row_array();

        echo $this->print_json(array('results' => $casino_result_data));
    }

    private function print_json($array) {
        $this->output->
                set_content_type('application/json')->
                set_output(json_encode($array));
    }

}
