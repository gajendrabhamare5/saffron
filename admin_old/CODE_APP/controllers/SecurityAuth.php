<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use ElephantIO\Client, ElephantIO\Engine\SocketIO\Version2X;

require __DIR__ . '/vendor/autoload.php';
class SecurityAuth extends CI_Controller {
	public $layout = array();
    public function index() {

        $this->load->library('users');
        $this->load->database();

        $userdata = $this->users->data();

        if (!$this->users->require_power(2,FALSE,TRUE,FALSE))
            return;

        $this->load->view('header', array("handler" => $this));
        $this->load->view('security_auth/securityauth', array('handler' => $this));
        $this->load->view('footer', array("handler" => $this));
    }
    public function telegram_otp_generation()
    {
        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');

        if (!$this->users->require_power(2))
            return;

        $userdata = $this->users->login_data();
        $user_id = $userdata['UserID'];

        $data = array(
        'user_id' => $user_id,
        );


        // Encode the data to JSON
        $jsonData = json_encode($data);

        // URL to which the request is sent
        $url = AUTH_CODE_URL.'verification/telegram_generate_otp';
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
            $return = array(
                "status" => 'ok',
                "message" => $response['message'],
            );
            echo json_encode($return);
            exit();
        }
    }
    public function auth_enable_verification_telegram()
    {
        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');

        if (!$this->users->require_power(2))
            return;

        $post_password = $this->input->post('password');
        $userdata = $this->users->login_data();
        $user_id = $userdata['UserID'];
        $user_password = $userdata['Password'];
        $user_password_salt = $userdata['user_password_salt'];
        $user_password_salt_key = $userdata['user_password_salt_key'];
        $salted_hash = hash('sha256', $post_password . $user_password_salt_key . $user_password_salt);

        if ($user_password == $salted_hash) {
            $data = array(
            'user_id' => $user_id,
            );


            // Encode the data to JSON
            $jsonData = json_encode($data);

            // URL to which the request is sent
            $url = AUTH_CODE_URL.'verification/enable_verification_telegram';
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
                $return = array(
                    "status" => 'ok',
                    "message" => $response['message'],
                    "verification_code" => $response['data']->verification_code,
                );
                echo json_encode($return);
                exit();
            }
        }else{
            $return = array(
                "status" => 'error',
                "message" => 'Invalid password',
            );
            echo json_encode($return);
            exit();
        }
    }
    public function auth_disable_verification()
    {
        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');

        if (!$this->users->require_power(2))
            return;

        $options = [
            'context' => [
                'ssl' => [
                    'verify_peer' => false,
                        'verify_peer_name' => false
                ]
            ]
        ];


        $client = new Client(new Version2X(SITE_IP2, $options));
        $client->initialize();
        $code = $this->input->post('code');
        $userdata = $this->users->login_data();
        $user_id = $userdata['UserID'];
            $data = array(
                'user_id' => $user_id,
                'code' => $code,
            );


            // Encode the data to JSON
            $jsonData = json_encode($data);

            // URL to which the request is sent
            $url = AUTH_CODE_URL.'verification/disable_verification';
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
                $client->emit('authDisableVerified', ["user_id"	=>	$user_id, "site_id"	=>	SITE_ID, "status"	=>	"DISABLED"]);
                $client->close();
                $return = array(
                    "status" => 'ok',
                    "message" => $response['message'],
                );
                echo json_encode($return);
                exit();
            }
    }
    public function auth_enable_verification_mobile()
    {
        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');

        if (!$this->users->require_power(2))
            return;

        
        $userdata = $this->users->login_data();
        $user_id = $userdata['UserID'];
       
        $data = array(
            'user_id' => $user_id,
        );


        // Encode the data to JSON
        $jsonData = json_encode($data);

        // URL to which the request is sent
        $url = AUTH_CODE_URL.'verification/enable_verification_mobile';
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
            $return = array(
                "status" => 'ok',
                "message" => $response['message'],
                "verification_code" => $response['data']->verification_code,
            );
            echo json_encode($return);
            exit();
        }
    }
    public function chkStatusAuth()
    {
        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');

        if (!$this->users->require_power(2))
            return;

        $auth_status = $this->input->post('auth_status');
        $user_data = $this->users->data();
        $user_verification_status = $user_data['user_verification_status'];
        $auth_status_db = true;
        if ($user_verification_status == "DISABLED") {
            $auth_status_db = false;
        }
        $refresh=false;
        if($auth_status_db != $auth_status){
            $refresh=true;
        }
        $data=array("status"=>"ok","refresh"=>$refresh);
        echo json_encode($data);
    }
}
