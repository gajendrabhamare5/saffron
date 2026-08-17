<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public $layout = array();
    public function index() {

        $this->load->library('users');
        $this->load->database();

        $userdata = $this->users->data();

        if (!$this->users->require_power(2,FALSE,TRUE,FALSE))
            return;

        $this->load->view('header', array("handler" => $this));
        $this->load->view('account/change_password', array('handler' => $this));
        $this->load->view('footer', array("handler" => $this));
    }

    public function change_password() {

        $this->load->library('users');
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('account-password', 'Password', 'required');
        $this->form_validation->set_rules('account-new-password', 'New Password', 'required|callback_valid_password');
        $this->form_validation->set_rules('account-confirm-new-password', 'Confirm Password', 'required');

        if (!$this->form_validation->run()) {
            $this->session->set_userdata('alerts', array('error' => array(implode(',', $this->form_validation->error_array()))));
            header('Location: ' . $this->input->server('HTTP_REFERER'));
            return;
        }

        $userdata = $this->users->login_data();
		$user_password_salt_key = $userdata['transaction_password_salt_key'];
		$user_password = $userdata['transaction_password'];
		$user_password_salt = $userdata['transaction_password_salt'];
        
        
		$salted_hash = hash('sha256',$this->input->post('account-password').$user_password_salt_key.$user_password_salt);
		
		if($user_password!=$salted_hash){
			
            $this->session->set_userdata('alerts', array('error' => array('Transaction password does not valid.')));
            header('Location: ' . $this->input->server('HTTP_REFERER'));
            return;
        }

        if ($this->input->post('account-new-password') != $this->input->post('account-confirm-new-password')) {
            $this->session->set_userdata('alerts', array('error' => array('"New Password" and "New Password repeat" does not match')));
            header('Location: ' . $this->input->server('HTTP_REFERER'));
            return;
        }
	
		$new_password = $this->input->post('account-new-password');
		$p_salt = rand(111111,999999); 

		$site_salt="huhefcvringybh";
		$salted_hash = hash('sha256', $new_password.$site_salt.$p_salt);

		$transaction_password_random = rand(111111,999999);
		
			$p_salt1 = rand(111111,999999); 

			$site_salt1="huhefcvringybh";
			$salted_hash1 = hash('sha256', $transaction_password_random.$site_salt1.$p_salt1);
			
        if (!$this->users->change_db(array('Password' => $salted_hash,'user_password_salt_key'=>$site_salt,'user_password_salt'=>$p_salt,'first_password_changed' => 1,'transaction_password' => $salted_hash1,'transaction_password_salt'=>$p_salt1,'transaction_password_salt_key'=>$site_salt1))) {
			
			
			
			/* 
			
            $this->session->set_userdata('alerts', array('error' => array('Internal server error #' . __LINE__)));
            header('Location: ' . $this->input->server('HTTP_REFERER'));
            return; */
        }

        $this->session->set_userdata('alerts', array('success' => array('Information updated.')));

        header('Location: ' . MASTER_URL.'/account/transaction_password/'.$transaction_password_random);
    }

	public function transaction_password($transaction_password_random = 0) {

         $this->load->library('users');
        $this->load->database();

       /*  $userdata = $this->users->data();

        if (!$this->users->require_power(2,FALSE,TRUE,FALSE))
            return; */

		
		
		
		
		$this->layout['transaction_password'] = $transaction_password_random;
        $this->load->view('account/transaction_password', array('handler' => $this));
        
    }
    
    public function valid_password($password = '') {
        $password = trim($password);

        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';

        if (empty($password)) {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');
            return FALSE;
        }

        if ((preg_match_all($regex_lowercase, $password) < 1) || (preg_match_all($regex_uppercase, $password) < 1) || (preg_match_all($regex_number, $password) < 1) || (strlen($password) < 8) || (strlen($password) > 15)) {
            $this->form_validation->set_message('valid_password', 'The password must contain at least: 1 uppercase letter, 1 lowercase letter, 1 number and 8 to 15 characters needed.');
            return FALSE;
        }

        return TRUE;
    }

}
