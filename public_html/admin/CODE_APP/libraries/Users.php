<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class users {

    protected $CI;

    public function __construct($handler = NULL) {

        if ($handler === NULL)
            $this->CI = & get_instance();
        else
            $this->CI = $handler;
    }

    /**

      add(

      array(

      "name",

      "email",

      "password",

      "phone",

      "pin",

      "activation_key",

      "user_referral_code",

      )

      )

      returns TRUE on SUCCESS and FALSE on FAIL

     * */
    public function add($data, $send_email = TRUE) {

        $this->CI->load->helper('string');

        $this->CI->load->database();

        $user_power = 1;
        $user_criteria_id = 0;
        $user_criteria_percentage = 0.00;
        if (isset($data['power']) && !empty($data['power'])) {
            $user_power = $data['power'];
        }

        $parent_id = 0;
        if (isset($data['parent_id']) && !empty($data['parent_id'])) {
            $parent_id = $data['parent_id'];
        }

        $insert_data = array(
            'Name' => $data['name'],
            'Email_ID' => strtolower($data['username']),
            'Phone' => $data['phone'],
            'power' => $user_power,
            'parent_id' => $parent_id,
            'credit_reference' => $data['credit_reference'],
            'net_exposure_limit' => $data['exposure_limit'],
            'Join_Date' => Date('Y-m-d'),
            'DateTime' => Date('Y-m-d H:i:s'),
        );

        if (isset($data['parentSuperMDL'])) {
            $insert_data['parentSuperMDL'] = $data['parentSuperMDL'];
        }
        if (isset($data['parentMDL'])) {
            $insert_data['parentMDL'] = $data['parentMDL'];
        }
        if (isset($data['parentDL'])) {
            $insert_data['parentDL'] = $data['parentDL'];
        }

        if (isset($data['partnership'])) {
            $insert_data['my_percentage'] = $data['partnership'];
        }

        if (isset($data['min_stake'])) {
            $insert_data['min_stake'] = $data['min_stake'];
            $insert_data['max_stake'] = $data['max_stake'];
            $insert_data['min_fancy_stake'] = $data['min_fancy_stake'];
            $insert_data['max_fancy_stake'] = $data['max_fancy_stake'];

            $insert_data['match_odds_processing'] = $data['match_odds_processing'];
            $insert_data['fancy_odds_processing'] = $data['fancy_odds_processing'];
        }

		
		if (isset($data['parentKingAdmin'])) {
            $insert_data['parentKingAdmin'] = $data['parentKingAdmin'];
        }
		
        if (isset($data['min_cricket_stake'])) {
            $insert_data['min_cricket_stake'] = $data['min_cricket_stake'];
        }
        if (isset($data['max_cricket_stake'])) {
            $insert_data['max_cricket_stake'] = $data['max_cricket_stake'];
        }
        if (isset($data['min_soccer_stake'])) {
            $insert_data['min_soccer_stake'] = $data['min_soccer_stake'];
        }
        if (isset($data['max_soccer_stake'])) {
            $insert_data['max_soccer_stake'] = $data['max_soccer_stake'];
        }
        if (isset($data['min_tennis_stake'])) {
            $insert_data['min_tennis_stake'] = $data['min_tennis_stake'];
        }
        if (isset($data['max_tennis_stake'])) {
            $insert_data['max_tennis_stake'] = $data['max_tennis_stake'];
        }
        if (isset($data['min_casino_stake'])) {
            $insert_data['min_casino_stake'] = $data['min_casino_stake'];
        }
        if (isset($data['max_casino_stake'])) {
            $insert_data['max_casino_stake'] = $data['max_casino_stake'];
        }
        if (isset($data['minimum_odds'])) {
            $insert_data['minimum_odds'] = $data['minimum_odds'];
        }
        if (isset($data['maximum_odds'])) {
            $insert_data['maximum_odds'] = $data['maximum_odds'];
        }

        if (isset($data['bet_delay'])) {
            $insert_data['user_bet_delay'] = $data['bet_delay'];
        }


        $res_user = $this->CI->db->get_where('user_master', array('Email_ID' => $data['username']));
        $user_id = 0;
        if ($res_user->num_rows() > 0) {
            $user_data = $res_user->result_row();
            if($data['power'] == "5" || $data['power'] == "10"){
                $insert_data['parent_id'] = 0;
            }
            if (!$this->CI->db->update('user_master', $insert_data, array('Email_ID' => $data['username'])))
                return FALSE;

            $user_id = $user_data['Id'];
        } else {

            if (!$this->CI->db->insert('user_master', $insert_data))
                return FALSE;

            $user_id = $this->CI->db->insert_id();
			
			
			$password1 = $data['password'];
			$p_salt = rand(111111,999999); 
			$new_password = $password1;
			$site_salt="huhefcvringybh";
			$salted_hash = hash('sha256', $new_password.$site_salt.$p_salt);
				

            if (!$this->CI->db->insert('user_login_master', array(
                        'UserID' => $user_id,
                        'UserType' => $user_power,
                        'Email_ID' => $data['username'],
                        'Password' => $salted_hash,
                        'Password2' => $salted_hash,
                        'user_password_salt' => $p_salt,
                        'user_password_salt_key' => $site_salt,
						'transaction_password' => $salted_hash,
                        'transaction_password_salt' => $p_salt,
                        'transaction_password_salt_key' => $site_salt,
                        'parentDL' => isset($data['parentDL']) ? $data['parentDL'] : 0,
                        'parentMDL' => isset($data['parentMDL']) ? $data['parentMDL'] : 0,
                        'parentSuperMDL' => isset($data['parentSuperMDL']) ? $data['parentSuperMDL'] : 0,
                        'parentKingAdmin' => isset($data['parentKingAdmin']) ? $data['parentKingAdmin'] : 0,
                    ))) {
                $this->CI->db->delete('user_master', array('Id' => $user_id));
                return FALSE;
            }
        }

        return $user_id;
    }

    public function user_exist($data) {

        $this->CI->load->database();

        if (isset($data['email'])) {
            $this->CI->db->where('Email_ID', $data['email']);
        } else {
            $this->CI->db->where('Email_ID', $data['username']);
        }

        $res_user = $this->CI->db->get('user_master');

        if ($res_user->num_rows() > 0)
            return true;
        else
            return false;
    }

    public function add_notification($data, $user_id = NULL, $time = NULL) {

        $this->CI->load->database();

        if ($user_id === NULL) {

            if ($this->is_login(1) == FALSE)
                return FALSE;

            $this->CI->load->library('session');

            $user_id = $this->CI->session->userdata('user_data')['Id'];
        }

        if ($time === NULL)
            $time = time();

        $insert_data = array(
            'user_id' => $user_id,
            'user_notification_data' => $data,
            'user_notification_time' => $time,
        );

        if (!$this->CI->db->insert('user_notifications', $insert_data))
            return FALSE;

        return TRUE;
    }

    public function add_transaction($type, $amount, $data, $user_id = NULL, $time = NULL) {

        $this->CI->load->database();

        if ($user_id === NULL) {

            if ($this->is_login(1) == FALSE)
                return FALSE;

            $this->CI->load->library('session');

            $user_id = $this->CI->session->userdata('user_data')['user_id'];
        }

        if ($time === NULL)
            $time = time();

        $insert_data = array(
            'user_id' => $user_id,
            'transaction_date' => $time,
            'transaction_type' => $type,
            'transaction_amount' => $amount,
            'transaction_description' => $data,
            'user_id' => $user_id,
        );

        if (!$this->CI->db->insert('transactions', $insert_data))
            return FALSE;

        return TRUE;
    }

    public function login($user_id) {

        $this->CI->load->library('session');

        $this->CI->load->database();

        $user_data = $this->data($user_id);

        $this->CI->session->set_userdata('is_login', 1);
        $this->CI->session->set_userdata('user_data', $user_data);


        return TRUE;
    }

    public function change_password($new_password, $user_id = NULL) {

        $this->CI->load->database();

        $this->CI->load->library('functions', $this->CI);

        if ($user_id === NULL) {

            if ($this->is_login(1) == FALSE)
                return FALSE;

            $this->CI->load->library('session');

            $user_id = $this->CI->session->userdata('user_data')['Id'];
        }

		
		$p_salt = rand(111111,999999); 

		$site_salt="huhefcvringybh";
		$salted_hash = hash('sha256', $new_password.$site_salt.$p_salt);
		
        $update_data = array(
            'Password' => $salted_hash,
            'user_password_salt' => $p_salt,
            'user_password_salt_key' => $site_salt,
			'transaction_password' => $salted_hash,
            'transaction_password_salt' => $p_salt,
            'transaction_password_salt_key' => $site_salt,
        );

        if ($this->change_db($update_data, $user_id))
            return TRUE;

        return FALSE;
    }

    public function set_userdata($data, $user_id = NULL) {

        return $this->change_db($data, $user_id);
    }

    public function change_db($data, $user_id = NULL) {

        $this->CI->load->database();

        if ($user_id === NULL) {

            if ($this->is_login(1) == FALSE)
                return FALSE;

            $this->CI->load->library('session');

            $user_id = $this->CI->session->userdata('user_data')['Id'];
        }

        if ($this->CI->db->update('user_login_master', $data, array('UserID' => $user_id), 1))
            return TRUE;

        return FALSE;
    }

    public function get_settings($name, $user_id = NULL) {

        $this->CI->load->database();

        if ($user_id === NULL) {

            if ($this->is_login(1) == FALSE)
                return NULL;

            $this->CI->load->library('session');

            $user_id = $this->CI->session->userdata('user_data')['user_id'];
        }

        $data = $this->data($user_id);

        if ($data !== FALSE)
            return(isset($data[$name]) ? $data[$name] : NULL);

        return NULL;
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

    public function login_data($user_id = NULL, $select = '*') {

        $this->CI->load->database();

        $this->CI->load->library('session');

        if ($user_id === NULL) {

            if (!$this->is_login(1)) {
                return FALSE;
            }

            $user_id = $this->CI->session->userdata('user_login_data')['UserID'];
        }

        $this->CI->db->select($select);

        $query = $this->CI->db->get_where('user_login_master', array('UserID' => $user_id), 1);

        if ($query->num_rows() > 0) {

            $data = $query->row_array();

            if ($this->CI->session->userdata('user_login_data')['UserID'] == $data['UserID']) {
                $this->CI->session->set_userdata('user_login_data', $data);
            }

            return $data;
        }

        return FALSE;
    }

    public function is_login($noreditect = FALSE) {

        $this->CI->load->library('session');

        if ($this->CI->session->userdata('is_login')) {

            $this->CI->load->database();

            $Id = $this->CI->session->userdata('user_login_data')['Id'];

			if($Id == 1){
				  $query = $this->CI->db->get_where('user_login_master', array(
                'UserID' => $this->CI->session->userdata('user_login_data')['UserID'],
                'Email_ID' => $this->CI->session->userdata('user_login_data')['Email_ID'],
                'Password' => $this->CI->session->userdata('user_login_data')['Password'],
                    ), 1);
			}
			else{
				  $query = $this->CI->db->get_where('user_login_master', array(
                'UserID' => $this->CI->session->userdata('user_login_data')['UserID'],
                'Email_ID' => $this->CI->session->userdata('user_login_data')['Email_ID'],
                'Password' => $this->CI->session->userdata('user_login_data')['Password'],
                'loginString' => $this->CI->session->userdata('LOGIN_STRING'),
                    ), 1);
			}
          
            if ($query->num_rows() > 0) {

                $user_login_data = $query->result_array()[0];

                if ($user_login_data['UserType'] > 1) {
                    
                    $user_data = $this->CI->db->get_where('user_master', array('Id' => $user_login_data['UserID']), 1)->row_array();
                    
                    $check_user_active_status = $this->CI->db->query("select Status from user_master where Id=".$user_data['Id'])->row_array();
                    $user_status = $check_user_active_status['Status'];
//                    
                    $parentDL = $user_data['parentDL'];
                    $parentMDL = $user_data['parentMDL'];
                    $parentSuperMDL = $user_data['parentSuperMDL'];
                    $parentKingAdmin = $user_data['parentKingAdmin'];
                    
                    
                    
                    if ($user_status == 0) {
                        return FALSE;
                    }
                        
                    if($parentDL > 0){
                        
                        $get_parentDL_status = $this->CI->db->query("select Status from user_master where Id=$parentDL")->row_array();
                        $dl_status = $get_parentDL_status['Status'];
                        
                        if($dl_status == 0)
                            return FALSE;
                    }
                    
                    if($parentMDL > 0){
                        
                        $get_parentMDL_status = $this->CI->db->query("select Status from user_master where Id=$parentMDL")->row_array();
                        $mdl_status = $get_parentMDL_status['Status'];
                        if($mdl_status == 0)
                            return FALSE;
                    }
                    if($parentSuperMDL > 0){
                        
                        $get_parentSMDL_status = $this->CI->db->query("select Status from user_master where Id=$parentSuperMDL")->row_array();
                        $smdl_status = $get_parentSMDL_status['Status'];
                        
                        if($smdl_status == 0)
                            return FALSE;
                    }
					
					if($parentKingAdmin > 0){
                        
                        $get_parentKingAdmin_status = $this->CI->db->query("select Status from user_master where Id=$parentKingAdmin")->row_array();
                        $parentKingAdmin_status = $get_parentKingAdmin_status['Status'];
                        
                        if($parentKingAdmin_status == 0)
                            return FALSE;
                    }
    
                    $this->CI->session->set_userdata('user_login_data', $user_login_data);

                    
                    $this->CI->session->set_userdata('user_login', $user_data);

                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }

        $__ip = $this->CI->session->userdata('__ip');

        if ($__ip === NULL || $__ip != $this->CI->input->ip_address())
            $this->CI->session->set_userdata('__ip', $this->CI->input->ip_address());

        if (!$noreditect)
            header('Location: /');

        return FALSE;
    }

    public function require_power($power, $noreditect = FALSE, $only_power = TRUE) {

        $is_login = $this->is_login($noreditect);

        $this->CI->load->library('session');

        if ($this->CI->session->userdata('is_emp_login')) {
            $is_login = TRUE;
        }

        if ($is_login === FALSE) {

            if (!$noreditect) {
                if ($power > 1) {
                    header('Location: ' . MASTER_URL . '/login');
                } else {
                    header('Location: /login');
                }
            }
            return FALSE;
        }

        $userdata = $this->login_data();

        if (is_numeric($power) && $userdata['UserType'] >= $power)
            return TRUE;

        if (!$noreditect)
            header('Location: /error/404');

        return FALSE;
    }
    
    public function pwd_change_status() {
        $userdata = $this->login_data();

        if ($userdata['first_password_changed'] == 0) {
            header('Location: ' . MASTER_URL . '/account');
        }
    }

    public function add_transaction_data($particular, $amount, $type, $user_id = NULL) {

        $this->CI->load->database();

        if ($user_id === NULL) {

            if ($this->is_login(1) == FALSE)
                return FALSE;

            $this->CI->load->library('session');

            $user_id = $this->CI->session->userdata('user_data')['user_id'];
        }

        $insert_data = array(
            'user_id' => $user_id,
            'transaction_data_time' => time(),
            'transaction_data_particulars' => $particular,
            'transaction_data_amount' => $amount,
            'transaction_data_type' => $type
        );

        if (!$this->CI->db->insert('transactions_data', $insert_data))
            return FALSE;

        return TRUE;
    }

}
