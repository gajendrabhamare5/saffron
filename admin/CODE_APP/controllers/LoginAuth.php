<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use ElephantIO\Client, ElephantIO\Engine\SocketIO\Version2X;

require __DIR__ . '/vendor/autoload.php';

class LoginAuth extends CI_Controller {
	public $layout = array();
    public function index() { 

        $this->load->library('users');
        $this->load->library('session');
        $this->load->database();
        $this->layout['CLIENT_AUTH_UID'] = $this->session->userdata('CLIENT_AUTH_UID');
        $this->layout['CLIENT_AUTH_STATUS'] = $this->session->userdata('CLIENT_AUTH_STATUS');
        $userdata = $this->users->data();

        $this->load->view('loginauth', array('handler' => $this));
    }
    public function auth_verify_code()
    {
       /*  error_reporting(E_ALL);
ini_set("display_errors",1);
ini_set("display_startup_errors",1); */
        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');
        $this->load->library('session');


        $user_id="";
        if ($this->input->post('auth_login_id')) {
            if (!$this->session->userdata('CLIENT_AUTH_STATUS') && !$this->session->userdata('CLIENT_AUTH_UID')) {
                $return = array(
                    "status" => 'error',
                    "message" => "User not avilable 1",
                    "zx" => $this->session->userdata(),
                );
                echo json_encode($return);
                exit();
            }
            $user_id = $this->input->post('auth_login_id');
        } else {
            if (!$this->session->userdata('CLIENT_AUTH_STATUS') && !$this->session->userdata('CLIENT_AUTH_UID')) {
                $return = array(
                    "status" => 'error',
                    "message" => "User not avilable 2",
                );
                echo json_encode($return);
                exit();
            }
            $userdata = $this->users->login_data();
            $user_id = $userdata['UserID'];
        }
        
        $code = $this->input->post('code');
        
            $data = array(
                'user_id' => $user_id,
                'code' => $code,
            );


            // Encode the data to JSON
            $jsonData = json_encode($data);

            // URL to which the request is sent
            $url = AUTH_CODE_URL.'verification/verify_code';
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_POSTFIELDS => $jsonData,
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/json",
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            if (curl_errno($curl)) {
                $return = array(
                    "status" => 'error',
                    "message" => curl_error($curl),
                );
                echo json_encode($return);
                exit();
            }
            curl_close($curl);
            $response = (array)json_decode($response);

            if (!$response['status']) {
                $return = array(
                    "status" => 'error',
                    "message" => $response['message'],
                );
                echo json_encode($return);
                exit();
            } else {
                $this->session->unset_userdata(['CLIENT_AUTH_STATUS', 'CLIENT_AUTH_UID']);

                $whereArr = array('UserID' => $user_id);
						
				$user_query = $this->db->get_where('user_login_master', $whereArr, 1);
                $user_data = $user_query->result_array()[0];
                $User_master_data = $this->users->data($user_data['UserID']);
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
                $this->session->set_userdata('user_login_data', $user_data);

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
                $return = array(
                    "status" => 'ok',
                    "message" => "",
                );
                echo json_encode($return);
                exit();
            }
    }
    public function generateRandomString($length = 18){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
    }
}
