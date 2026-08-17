<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | Custom config
  |--------------------------------------------------------------------------
 */

$config['domain'] = (ENVIRONMENT == 'development') ? 'stake13.com' : 'stake13.com';
$config['base_url'] = ((ENVIRONMENT == 'development') ? 'http://' : 'https://') . $config['domain'];
$config['url_base'] = $config['base_url'];

$config['email_support'] = 'support@' . $config['domain'];
$config['email_contact'] = 'contact@' . $config['domain'];
$config['email_noreplay'] = 'noreplay@' . $config['domain'];
$config['email_bcc'] = 'bcc@' . $config['domain'];

$config['app_enc'] = array(
    // Password encryption
    array(
        'key' => '0cb7ab2b625a63876f1f21d62a5dfd8c',
        'mode' => 'ctr',
        'cipher' => 'aes-256',
    ),
);

$config['app_cron_api'] = array(
    'b1d2a97118af84c01c04a9d12885a0bd', // cpanel cron
);

$config['app_cron_timeout'] = 20; // in seconds