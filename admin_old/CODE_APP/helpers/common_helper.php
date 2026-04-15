<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('sum_arr_field')) {

    function sum_arr_field($tempArr = array(), $field = '') {
        return array_sum(array_column($tempArr, $field));
    }

}

if (!function_exists('odd_type_arr')) {

    function odd_type_arr($key) {
        $arr = array(
            '1_1' => '1X2,Full Time Result',
            '1_2' => 'Asian Handicap',
            '1_3' => 'O/U,Goal Line',
            '1_4' => 'Asian Corners',
            '1_5' => '1st Half Asian Handicap',
            '1_6' => '1st Half Goal Line',
            '1_7' => '1st Half Asian Corners',
            '1_8' => 'Half Time Result',
            '18_1' => 'Money Line',
            '18_2' => 'Spread',
            '18_3' => 'Total Points',
            '3_1' => 'Match Winner 2-Way',
            '12_1' => 'Match Winner 2-Way',
            '36_1' => 'Match Winner 2-Way',
            '151_1' => 'Match Winner 2-Way',
            '3_4' => 'Draw No Bet',
        );
        return $arr[$key];
    }

}
if (!function_exists('pagi_links')) {

    function pagi_links($url = '', $total = 0, $perPage = 20, $curPage = '') {
        $CI = & get_instance();
        if (!$CI->load->is_loaded('pagination'))
            $CI->load->library('pagination');

        $config["base_url"] = $url;
        $config["total_rows"] = $total;
        $config["per_page"] = $perPage;
        if (!empty($curPage))
            $config["cur_page"] = $curPage;
        else
            $config["uri_segment"] = 6;

        /* This Application Must Be Used With BootStrap 3 *  */
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="page-item prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active page-item"><a href="" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $CI->pagination->initialize($config);
        return $CI->pagination->create_links();
    }

}

if (!function_exists('front_pagi_links')) {

    function front_pagi_links($url = '', $total = 0, $perPage = 20, $curPage = '') {
        $CI = & get_instance();
        if (!$CI->load->is_loaded('pagination'))
            $CI->load->library('pagination');

        $config["base_url"] = $url;
        $config["total_rows"] = $total;
        $config["per_page"] = $perPage;

        if (!empty($curPage))
            $config["cur_page"] = $curPage;
        else
            $config["uri_segment"] = 6;

        /* This Application Must Be Used With BootStrap 3 *  */

        $config['full_tag_open'] = '<ul class="pagination pull-right pagination-bt">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="page-item prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active page-item"><a href="" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page page-item">';
        $config['num_tag_close'] = '</li>';
        $config['anchor_class'] = 'class="page-link"';
        $CI->pagination->initialize($config);
        return $CI->pagination->create_links();
    }

}

if (!function_exists('pagination_links')) {

    function pagination_links($url = '', $total = 0, $perPage = 20) {



        $CI = & get_instance();

        if (!$CI->load->is_loaded('pagination'))
            $CI->load->library('pagination');



        $config["base_url"] = $url;

        $config["total_rows"] = $total;

        $config["per_page"] = $perPage;

        $config["uri_segment"] = 4;

        /* This Application Must Be Used With BootStrap 3 *  */

        $config['full_tag_open'] = '<div><ul class="pagination">';

        $config['full_tag_close'] = '</ul></div><!--pagination-->';

        $config['first_link'] = '&laquo; First';

        $config['first_tag_open'] = '<li class="page-item prev page">';

        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last &raquo;';

        $config['last_tag_open'] = '<li class="page-item">';

        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next';

        $config['next_tag_open'] = '<li class="page-item">';

        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&larr; Previous';

        $config['prev_tag_open'] = '<li class="page-item prev page">';

        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active page-item"><a href="" class="page-link">';

        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page page-item">';

        $config['num_tag_close'] = '</li>';

        $config['anchor_class'] = 'class="page-link"';

        $CI->pagination->initialize($config);

        return $CI->pagination->create_links();
    }

}

if (!function_exists('isMobileDevice')) {

    function isMobileDevice() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

}
