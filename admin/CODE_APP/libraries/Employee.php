<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee {

    protected $CI;

    public function __construct($handler = NULL) {

        if ($handler === NULL)
            $this->CI = & get_instance();
        else
            $this->CI = $handler;
    }

    public function add($data, $send_email = TRUE) {

        $this->CI->load->helper('string');

        $this->CI->load->database();


        if (!$this->CI->db->insert('employee_master', $data))
            return FALSE;

        $user_id = $this->CI->db->insert_id();
			

        return $user_id;
    }

    public function login($user_id) {

        $this->CI->load->library('session');

        $this->CI->load->database();

        $user_data = $this->data($user_id);

        $this->CI->session->set_userdata('is_login', 1);
        $this->CI->session->set_userdata('user_data', $user_data);


        return TRUE;
    }

     public function userdata($user_id = NULL, $select = '*') {

        return $this->data($user_id, $select);
    }

    public function data($user_id = NULL, $select = '*') {

        $this->CI->load->database();

        $this->CI->load->library('session');

        if ($user_id === NULL) {

            if (!$this->is_login(1)) {
                return FALSE;
            }

            $user_id = $this->CI->session->userdata('user_data')['Id'];
        }

        $this->CI->db->select($select);

        $query = $this->CI->db->get_where('user_master', array('Id' => $user_id), 1);

        if ($query->num_rows() > 0) {

            $data = $query->row_array();

            if ($this->CI->session->userdata('user_data')['Id'] == $data['Id']) {
                $this->CI->session->set_userdata('user_data', $data);
            }

            return $data;
        }

        return FALSE;
    }

    public function is_login($no_redirect = FALSE) {
        $this->CI->load->library('session');
        $this->CI->load->database();

        if ($this->CI->session->userdata('is_login')) {

            $employee_session_data = $this->CI->session->userdata('employee_data');

            if (!isset($employee_session_data['fullname']) || !isset($employee_session_data['password'])) {
                if (!$no_redirect) redirect('/');
                return FALSE;
            }

            // Validate against DB
            $query = $this->CI->db->get_where('employee_master', array(
                'client_id' => $employee_session_data['client_id'],
                'fullname' => $employee_session_data['fullname'],
                'password' => $employee_session_data['password'], // Consider hashing passwords
            ), 1);

            if ($query->num_rows() > 0) {
                $employee = $query->row_array();

                // Get privilege IDs
                $privilege_ids = array_filter(array_map('trim', explode(',', $employee['privilege_ids'])));

                // Fetch privilege codes from privileges table
                if (!empty($privilege_ids)) {
                    $this->CI->db->where_in('id', $privilege_ids);
                    $privileges_query = $this->CI->db->get('privileges');

                    $privileges = array_column($privileges_query->result_array(), 'code');
                } else {
                    $privileges = [];
                }

                // Store back into session
                $employee['privileges'] = $privileges;

                $this->CI->session->set_userdata('employee_data', $employee);

                return TRUE;
            }
        }

        if (!$no_redirect) {
            redirect('/');
        }

        return FALSE;
    }

   /*  public function login_with_credentials($username, $password)
    {
        $this->CI->load->database();

        $query = $this->CI->db->get_where('employee_master', array(
            'name' => $username,
            'pwd' => $password  // Replace with hashed password check in production
        ), 1);

        if ($query->num_rows() === 1) {
            $employee = $query->row_array();

            // Load privileges if stored as comma-separated IDs
            $privilege_ids = explode(',', $employee['privilege_ids'] ?? '');
            $privilege_ids = array_filter(array_map('trim', $privilege_ids));

            if (!empty($privilege_ids)) {
                $this->CI->db->where_in('id', $privilege_ids);
                $priv_query = $this->CI->db->get('privileges');
                $privileges = array_column($priv_query->result_array(), 'code');
            } else {
                $privileges = [];
            }

            $employee['privileges'] = $privileges;

            // Set session
            $this->CI->load->library('session');
            $this->CI->session->set_userdata('is_login', 1);
            $this->CI->session->set_userdata('employee_data', $employee);

            return TRUE;
        }

        return FALSE;
    } */



}
