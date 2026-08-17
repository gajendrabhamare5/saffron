<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {

        $this->load->library('users', $this);
        
        $this->users->pwd_change_status();
        $this->load->view('home');
    }

    function auth() {
        $this->load->database();
        $this->load->library('users', $this);

        $this->print_json(array('is_login' => $this->users->require_power(2, true)));
    }

    private function print_json($array) {
        $this->output->
                set_content_type('application/json')->
                set_output(json_encode($array));
    }

}
