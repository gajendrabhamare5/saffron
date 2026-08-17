<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class logout extends CI_Controller {

    public $layout = array();

    public function index() {
        $this->load->library("session");
        $this->session->sess_destroy();
        header("Location: " . MASTER_URL);
    }

}
