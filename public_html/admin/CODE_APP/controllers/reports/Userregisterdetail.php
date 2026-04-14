<?php

defined('BASEPATH') or exit('No direct script access allowed');

ini_set('memory_limit', '-1');
// error_reporting(E_ALL);
// ini_set("display_errors",1);
// ini_set("display_startup_errors",1);


class Userregisterdetail extends CI_Controller
{

    public function index()
    {

        $this->load->library('users', $this);

        if (!$this->users->is_login(TRUE)) {
            header('Location: ' . MASTER_URL . '/login');
            return;
        }


        $this->users->pwd_change_status();

        $this->layout['title'] = PROJECTNAME . ' - Account Statement';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('reports/userregisterdetail', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }
}

?>