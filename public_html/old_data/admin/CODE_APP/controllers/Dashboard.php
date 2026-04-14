<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public $layout = array();

    public function index() {
        $this->load->library('session');
        $this->load->library('functions');
        $this->load->library('users');

        $user_data = $this->users->data();
        if (!$this->users->is_login(TRUE)) {
            header('Location: ' . MASTER_URL . '/login');
            return;
        }

        if ($user_data['power'] > 1 && $user_data['power'] < CONTROLLER_POWER) {
            header('Location: ' . MASTER_URL . '/login');
            return;
        }     
        
        $this->users->pwd_change_status();

        $this->layout["breadcrumb_title"] = "Dashboard";
        $this->layout['meta'] = array(
            'description' => '',
            'keywords' => ''
        );

        $this->load->view('header', array("handler" => $this));
        $this->load->view('dashboard/dashboard', array("handler" => $this));
        $this->load->view('footer', array("handler" => $this));
    }

    public function get_dashboard_data() {

        $this->load->library('session');
        $this->load->library('functions');
        $this->load->library('users');

        if (!$this->users->is_login(TRUE)) {
            header('Location: ' . MASTER_URL . '/login');
            return;
        }
        $user_data = $this->users->data();

        $res_today = $this->db->select_sum('ac.amount')
                ->where_in('ac.user_id', $user_data['Id'])
                ->where_in('ac.entry_type', array(1, 2, 5))
                ->where('ac.account_date_time BETWEEN CURDATE() AND NOW()', null, false)
                ->get('accounts ac')
                ->row_array();

        $res_weekly = $this->db->select_sum('ac.amount')
                ->where_in('ac.user_id', $user_data['Id'])
                ->where_in('ac.entry_type', array(1, 2, 5))
                ->where('ac.account_date_time BETWEEN CURDATE()-INTERVAL 1 WEEK AND NOW()', null, false)
                ->get('accounts ac')
                ->row_array();

        $res_monthly = $this->db->select_sum('ac.amount')
                ->where_in('ac.user_id', $user_data['Id'])
                ->where_in('ac.entry_type', array(1, 2, 5))
                ->where('ac.account_date_time BETWEEN CURDATE()-INTERVAL 1 MONTH AND NOW()', null, false)
                ->get('accounts ac')
                ->row_array();

        $today = ($res_today['amount'] == null) ? 0 : $res_today['amount'];
        $weekly = ($res_weekly['amount'] == null) ? 0 : $res_weekly['amount'];
        $monthly = ($res_monthly['amount'] == null) ? 0 : $res_monthly['amount'];

        $sql_pending_ressults = 'SELECT (SELECT COUNT(`bet_id`) FROM `bet_details` WHERE `bet_status` = 1) + (SELECT COUNT(`bet_id`) FROM `bet_teen_details` WHERE `bet_status` = 1) as total;';
        $res_pending_ressults = $this->db->query($sql_pending_ressults)->row_array();

        $returnArr['pending_results'] = $res_pending_ressults['total'];
        $returnArr['pl'] = array('today' => $today, 'weekly' => $weekly, 'monthly' => $monthly);

        echo json_encode($returnArr);
        return true;
    }

}
