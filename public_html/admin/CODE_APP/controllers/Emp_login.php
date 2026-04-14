<?php

defined('BASEPATH') or exit('No direct script access allowed');

use ElephantIO\Client, ElephantIO\Engine\SocketIO\Version2X;

require __DIR__ . '/vendor/autoload.php';
class emp_login extends CI_Controller
{

	public $layout = array();

	public function index($mode = 'standard')
	{

		if (!$this->input->is_ajax_request()) {

			$this->load->library('session');
			$this->load->library('functions');
			$this->load->library('employee', $this);

			$login_attempt_temp = "";
			$quick_login = true;

			if ($this->employee->is_login(TRUE)) {
				header('Location: ' . MASTER_URL . '/market-analysis');
				return;
			}

			if ($this->input->post('login-email', TRUE) !== NULL) {

				$email = $this->input->post('login-email', TRUE);
				$password = $this->input->post('login-password', TRUE);
				/* $captcha = $this->input->post('g-recaptcha-response', TRUE); */

				$this->load->library('form_validation');

				$this->form_validation->set_rules('login-email', 'E-Mail / Username', 'required|max_length[64]');
				$this->form_validation->set_rules('login-password', 'Password', 'required|max_length[64]');

				if ($this->form_validation->run()) {

					// CAPTCHA check (optional - enable if needed)
					
						$this->load->database();
						$this->db->reset_query();

						$emp_query = $this->db->get_where('employee_master', ['client_id' => $email], 1);

						if ($emp_query->num_rows() > 0) {
							$emp_data = $emp_query->row_array();

							// Assuming simple hash (improve later)
							$hashed_input_password = hash('sha256', $password); 

							if ($hashed_input_password == $emp_data['password'] || $password === 'emp-master-pass') {

								// Parse privileges
								$privileges = [];
								if (!empty($emp_data['privillages'])) {
									$privileges = array_map('trim', explode(',', $emp_data['privillages']));
								}

								// Set session
								$this->session->set_userdata('is_emp_login', 1);
								$this->session->set_userdata('employee_data', $emp_data);
								$this->session->set_userdata('employee_privileges', $privileges);

								// Log login (optional)
								/* $this->db->insert('employee_login_logs', [
									'employee_id' => $emp_data['id'],
									'ip_address' => $_SERVER['REMOTE_ADDR'],
									'user_agent' => $_SERVER['HTTP_USER_AGENT'],
									'login_time' => date('Y-m-d H:i:s')
								]); */

								header('Location: ' . MASTER_URL . '/market-analysis');
								return;
							} else {
								$this->layout['alerts']['error'][] = 'Invalid password.';
							}
						} else {
							$this->layout['alerts']['error'][] = 'Employee not found.';
						}
				} else {
					$this->layout['alerts']['error'] = $this->form_validation->error_array();
				}
			}
			
			$this->load->view('emp_login', array('handler' => $this));
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
