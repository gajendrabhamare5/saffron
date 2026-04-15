<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * ElephantIO Library
 *
 * @author 		Orhan V. Gülenay <o.v.gulenay@gmail.com> 
 * @copyright 	Copyright (c) 2014, Orhan V. Gülenay, http://orveg.com
 * @version 	0.0.1
 */
require_once(__DIR__ . '/Client.php');

class ElephantIO extends Client
{

    private $CI;
    private $config_file = 'elephantio';

    public function __construct($socketIOUrl = "", $socketIOPath = 'socket.io', $protocol = 1, $read = true, $checkSslPeer = true, $debug = false)
    {
        $this->CI = & get_instance();
        $this->CI->config->load($this->config_file);
        parent::__construct($this->CI->config->item('socketIOUrl'), $this->CI->config->item('socketIOPath'), $this->CI->config->item('socketIOProtocol'), $this->CI->config->item('socketIORead'), $this->CI->config->item('socketIOcheckSslPeer'), $this->CI->config->item('socketIOdebug'));
    }

}
?>