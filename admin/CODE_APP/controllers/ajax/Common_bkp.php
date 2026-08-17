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

        $this->db->select('u.Email_ID,u.net_exposure_limit,u.credit_reference,u.Status,u.bet_status,u.cricket_access,u.soccer_access,u.tennis_access,u.video_access');
        $this->db->where('u.Id', $uid);
        $personal_data = $this->db->get('user_master u')->row_array();
        $account_data = $this->get_account_data($uid);
        
        $my_bal_data = $this->db->select('SUM(amount) as my_balance')->get_where('accounts',array('user_id' => $userdata['Id']))->row();
        $login_user['fisrt_balance'] = ROUND($my_bal_data->my_balance,2);
        $login_user['fisrt_name'] = $userdata['Email_ID'];
        $data = array_merge($personal_data, $account_data, $login_user);

        echo json_encode(array('result' => $data));
    }

    private function get_account_data($id = 0) {
        $this->db->select('SUM(ac.`amount`) as account_balance');
        $this->db->where('s.Id = ' . $id . ' OR s.parentDL = ' . $id . ' OR s.parentMDL = ' . $id . ' OR s.parentSuperMDL = ' . $id, NULL, FALSE);
        $this->db->join('user_master s', 's.Id = ac.user_id', 'LEFT');
        $user_ac_data = $this->db->get('accounts ac')->row_array();
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
