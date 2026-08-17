<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Assign_agent extends CI_Controller
{


     public function agent_list()
    {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;

        $this->users->pwd_change_status();


        $this->layout['title'] = PROJECTNAME . ' - Assign agent';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('assign_agent/list', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

}