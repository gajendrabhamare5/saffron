<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Current_bets extends CI_Controller {

    function index() {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Current Bets';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('reports/current_bets', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function get_current_bets($offset = 0) {

        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');
        $this->load->helper('common_helper');

        if (!$this->users->require_power(2))
            return;

        $bettings_data = $this->get_current_bets_data();
		$bettings_data1 = $this->get_current_bets_data_casino();
		
		$bettings_data = array_merge($bettings_data,$bettings_data1);
		$this->print_json($bettings_data);
    }

    private function get_current_bets_data() {

        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();

        $this->db->select('b.*,u.Email_ID');

        $user_id = $user_data['Id'];
        if ($user_data['power'] < 5 or $user_data['power'] == 7) {
            $this->db->where('(`u`.`parent_id` = ' . $user_id . ' OR `u`.`parentDL` = ' . $user_id . ' OR `u`.`parentMDL` = ' . $user_id . ' OR `u`.`parentSuperMDL` = ' . $user_id . ' OR `u`.`parentKingAdmin` = ' . $user_id . ')', null, false);
        }
        if ($from_date = $this->input->post('from_date', TRUE)) {
            $this->db->where('b.bet_time >= "' . $from_date . ' 00:00:00"');
        }
        if ($to_date = $this->input->post('to_date', TRUE)) {
            $this->db->where('b.bet_time <= "' . $to_date . ' 23:59:59"');
        }

        if ($this->input->post('orderby') == '') {
            $this->db->order_by('b.bet_id', 'ASC');
        } else {
            $this->db->order_by($this->input->post('orderby'));
        }

        $this->db->where('b.bet_status', 1);

        $table_name = 'bet_details';
        if ($bet_type = $this->input->post('bet_type', TRUE)) {

            switch ($bet_type) {
                case 'unmatched':
                    $table_name = 'unmatched_bet_details';
                    break;
                case 'deleted':
                    $table_name = 'unmatched_bet_details2';
                    break;
            }
        }

        $this->db->join('user_master u', 'u.Id = b.user_id', 'left');
        $result = $this->db->get($table_name . ' as b');
        return $result->result_array();
    }

	private function get_current_bets_data_casino() {

        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();

        $this->db->select('b.*,u.Email_ID');

        $user_id = $user_data['Id'];
        if ($user_data['power'] < 5 or $user_data['power'] == 7) {
            $this->db->where('(`u`.`parent_id` = ' . $user_id . ' OR `u`.`parentDL` = ' . $user_id . ' OR `u`.`parentMDL` = ' . $user_id . ' OR `u`.`parentSuperMDL` = ' . $user_id. ' OR `u`.`parentKingAdmin` = ' . $user_id . ')', null, false);
        }
        if ($from_date = $this->input->post('from_date', TRUE)) {
            $this->db->where('b.bet_time >= "' . $from_date . ' 00:00:00"');
        }
        if ($to_date = $this->input->post('to_date', TRUE)) {
            $this->db->where('b.bet_time <= "' . $to_date . ' 23:59:59"');
        }

        if ($this->input->post('orderby') == '') {
            $this->db->order_by('b.bet_id', 'ASC');
        } else {
            $this->db->order_by($this->input->post('orderby'));
        }

        $this->db->where('b.bet_status', 1);

        $table_name = 'bet_teen_details';
        if ($bet_type = $this->input->post('bet_type', TRUE)) {

            switch ($bet_type) {
                case 'unmatched':
                    $table_name = 'unmatched_bet_details';
                    break;
                case 'deleted':
                    $table_name = 'unmatched_bet_details2';
                    break;
            }
        }

        $this->db->join('user_master u', 'u.Id = b.user_id', 'left');
        $result = $this->db->get($table_name . ' as b');
        return $result->result_array();
    }
	
    private function print_json($array) {
        $this->output->
                set_content_type('application/json')->
                set_output(json_encode($array));
    }

}

?>