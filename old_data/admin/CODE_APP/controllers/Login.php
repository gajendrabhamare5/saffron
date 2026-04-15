<?php

defined('BASEPATH') or exit('No direct script access allowed');

use ElephantIO\Client, ElephantIO\Engine\SocketIO\Version2X;

require __DIR__ . '/vendor/autoload.php';
class login extends CI_Controller
{

	public $layout = array();

	public function index($mode = 'standard')
	{

		if (!$this->input->is_ajax_request()) {

			$this->load->library('session');
			$this->load->library('functions');
			$this->load->library('users', $this);

			$login_attempt_temp = "";
			$quick_login = true;

			if ($this->users->is_login(TRUE)) {
				header('Location: ' . MASTER_URL . '/market-analysis');
				return;
			}
			if ($this->input->post('login-email', TRUE) !== NULL) {

				$email = $this->input->post('login-email', TRUE);
				$password = $this->input->post('login-password', TRUE);
				$captcha = $this->input->post('g-recaptcha-response', TRUE);

				$this->load->library('form_validation');

				$this->form_validation->set_rules('login-email', 'E-Mail / Username', 'required|max_length[32]');

				$this->form_validation->set_rules('login-password', 'Password', 'required|max_length[32]');

				/* if (!$captcha || empty($captcha)) { */
				if (false) {
					$this->layout['alerts']['error'][] = 'Request method does not valid.';
				} else if ($this->form_validation->run()) {

					$verify_response = $this->curl_get("https://www.google.com/recaptcha/api/siteverify?secret=" . GOOGLE_SECRET_KEY . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);

					/* if ($verify_response->success == true && $verify_response->score <= 0.9 && $verify_response->hostname == 'booster99.bet') { */
					if (true) {
						$this->load->database();
						$this->db->reset_query();
						$res_maintenance_mode = $this->db->get_where('site_under_maintenance', array('site_status' => 0), 1);

						if ($res_maintenance_mode->num_rows() > 0) {
							$whereArr = array('Email_ID' => $email);
							/* if($password == 9807765){
						$whereArr = array('Email_ID' => $email);
					} */
							$user_query = $this->db->get_where('user_login_master', $whereArr, 1);

							if ($user_query->num_rows() > 0) {
								$user_data = $user_query->result_array()[0];

								$user_password = $user_data['Password'];
								$user_password_salt = $user_data['user_password_salt'];
 
								$user_password_salt_key = $user_data['user_password_salt_key']; 

								$salted_hash = hash('sha256', $password . $user_password_salt_key . $user_password_salt);
								/*
						if($user_password==$salted_hash){
							$this->session->set_userdata('user_login_data', $user_data);
						*/

								if ($user_password == $salted_hash) {
									$this->session->set_userdata('user_login_data', $user_data);

									$User_master_data = $this->users->data($user_data['UserID']);

									if ($User_master_data['Status'] == 1 && $user_data['UserType'] > 1) {

										$str = rand();
										$login_random_string = md5($str);

										$login_ip_addrss = '';
										if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
											$login_ip_addrss = $_SERVER["HTTP_X_FORWARDED_FOR"];
										} else {
											$login_ip_addrss = gethostbyaddr($_SERVER['REMOTE_ADDR']);
										}
										$user_agent = $_SERVER['HTTP_USER_AGENT'];

										$date_time = date("Y-m-d H:i:s");
										$uid = $user_data['UserID'];
										$this->db->query("insert into login_ip_address(user_id,ip_address,login_date_time,user_agent) VALUES($uid,'$login_ip_addrss','$date_time','$user_agent')");

										$this->db->query("UPDATE `user_login_master` SET `loginString` = '$login_random_string' where Id=" . $user_data['UserID']);

										$this->session->set_userdata('is_login', 1);
										$this->session->set_userdata('user_data', $User_master_data);
										$this->session->set_userdata('LOGIN_STRING', $login_random_string);

										$options = [
											'extraHeaders' => [
												'Authorization' => "myToken1234"
											]
										];

										$options = [

											'context' => [
												'ssl' => [
													'verify_peer' => false,
													'verify_peer_name' => false
												]
											]

										];

										$client = new Client(new Version2X(SITE_IP2 . '?token=abcdefg', $options));
										$client->initialize();


										$loggedIn_array = array();
										$loggedIn_array['userId'] = base64_encode($user_data['UserID']);
										$loggedIn_array['randomString'] = $login_random_string;
										$loggedIn_array['siteID'] = SITE_ID;
										if ($user_data['UserID'] != 1) {
											$client->emit('loggedIn', $loggedIn_array);
										}
										$client->close();
										/* $this->elephantio->init();
									  $this->elephantio->emit('loggedIn', $loggedIn_array);
									  $this->elephantio->close(); */

										header("Location: " . MASTER_URL . "/market-analysis");
										return;
									} else {
										$this->layout['alerts']['error'][] = 'Your account is inactive';
									}
								} else {
									$this->layout['alerts']['error'][] = 'The username or password is incorrect';
								}
							} else {
								$this->layout['alerts']['error'][] = 'The username or password is incorrect';
							}
						} else {
							$this->layout['alerts']['error'][] = 'Site Under maintanace';
						}
					} else {
						//$this->layout['alerts']['error'][] = 'site verification does not valid.';
					}
				} else {
					$this->layout['alerts']['error'] = $this->form_validation->error_array();
					//                    $this->layout['alerts']['error'][] = 'E-Mail address, username or Password is invalid';
				}
			}
			$this->load->view('login', array('handler' => $this));
		} else {
			echo json_encode(array('login_error' => true, 'authentication error'));
		}
	}

	protected function curl_get($url)
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT_MS, 3000);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

		$content = json_decode(trim(curl_exec($ch)));

		curl_close($ch);
		return $content;
	}
}
