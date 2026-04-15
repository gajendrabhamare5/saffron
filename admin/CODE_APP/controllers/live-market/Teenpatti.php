<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teenpatti extends CI_Controller {

    public $layout = array();

    public function index() {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Account Statement';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/list', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function t20() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - 20-20 TeenPatti';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/t20', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

     public function teenjoker() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Teenpatti - 2.0 ';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/teenjoker', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

     public function teen6() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Account Statement';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/teen6', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }


      public function teen20c() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Account Statement';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/teen20c', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

      public function teen41() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Queen Top Open Teenpatti';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/teen41', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function teen33() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Instant Teenpatti 3.0 ';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/teen33', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

      public function teen32() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Instant Teenpatti 2.0';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/teen32', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function teen42() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Jack Top Open Teenpatti';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/teen42', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function odi() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Account Statement';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/odi', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

     public function patti2() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - 2 Cards Teenpatti';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/patti2', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

     public function teenmuf() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Muflis Teenpatti';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/teenmuf', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function test() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Account Statement';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/test', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function open() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Account Statement';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/open', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function teen20b() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - 20-20 Teenpatti B ';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/teen20b', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function teen3() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Instant Teenpatti ';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/teen3', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }
    
    public function poisonteenpatti20() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Teenpatti Poison 20-20 ';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/poisonteenpatti20', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }
    
    public function poison() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Teenpatti Poison One Day ';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/poison', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }
    
    public function jokerteenpatti120() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Unlimited Joker 20-20 ';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/jokerteenpatti120', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function jokerteenpatti20() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Teenpatti Joker 20-20 ';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/jokerteenpatti20', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }
    
    public function jokerteenpatti1() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Unlimited Joker Oneday ';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/jokerteenpatti1', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }
    
    public function jokerteenpatti() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Joker Teenpatti ';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/jokerteenpatti', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function teen62() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - V VIP Teenpatti 1-day';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/teenpatti/teen62', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function active_bets($type = 't20', $event_id = '') {

        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
            
        $user_data = $this->users->data();
        $user_id = $user_data['Id'];

        $shortcodeArr = array('t20' => '2020TEENPATTI', 'odi' => 'ODITEENPATTI', 'test' => 'TESTTEENPATTI', 'open' => 'OPENTEENPATTI', 'teenjoker' => 'TEENJOKER', 'teen20c' => 'TEEN20C', 'teen41' => 'TEEN41', 'teen42' => 'TEEN42', 'teen33' => 'TEEN33', 'teen32' => 'TEEN32', 'teen6' => 'TEEN6', 'patti2' => 'PATTI2', 'teenmuf' => 'TEENMUF', 'teen20b' => 'TEEN20B', 'teen3' => 'TEEN3', 'teen62' => 'TEEN62');
        $html = '';
        if (array_key_exists($type, $shortcodeArr)) {
            
            $this->db->select('b.*,u.Email_ID as username');
			if ($user_data['power'] < 5 or $user_data['power'] == 7)			
				$this->db->where("(u.parent_id = $user_id OR u.parentDL = $user_id OR u.parentMDL = $user_id OR u.parentSuperMDL = $user_id   OR u.parentKingAdmin = $user_id )");
			
			$this->db->where('b.event_id', $event_id);
			$this->db->where(array('b.bet_status' => 1, 'b.event_type' => $shortcodeArr[$type]));
			$this->db->join('user_master u','u.Id = b.user_id','LEFT');
            $bets_data = $this->db->get('bet_teen_details b')->result_array();

            foreach ($bets_data as $bet_data) {

                $tr_type = ($bet_data['bet_type'] == 'Back') ? 'back' : 'lay';
                $html .= '<tr class="' . $tr_type . '">';
                $html .= '  <td>' . $bet_data['username'] . '</td>';
                $html .= '  <td>' . $bet_data['market_name'] . '</td>';
                $html .= '  <td>' . $bet_data['bet_odds'] . '</td>';
                $html .= '  <td class="text-right">' . $bet_data['bet_stack'] . '</td>';
                $html .= '  <td>' . $bet_data['bet_time'] . '</td>';
                // $html .= '  <td>' . $bet_data['bet_time'] . '</td>';
                $html .= '  <td>' . str_replace('PATTI', '', $bet_data['event_type']) . '</td>';
                $html .= '</tr>';
            }
            $total_bets = count($bets_data);
            if ($total_bets == 0) {
                $html = '<td colspan="100%" align="center">No record found!...</td>';
            }
        }

        return $this->print_json(array('results' => $html, 'total_bets' => $total_bets));
    }

    public function view_more_matched($game = 't20', $event_id = '') {
        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
            
        $user_data = $this->users->data();
        $user_id = $user_data['Id'];

        $client_name = $this->input->post('search-client_name', TRUE);
        $ipaddress = $this->input->post('search-ipaddress', TRUE);
        $amount_min = $this->input->post('search-amount_min', TRUE);
        $amount_max = $this->input->post('search-amount_max', TRUE);
        $bettype = $this->input->post('search-bettype', TRUE);

        $shortcodeArr = array('t20' => '2020TEENPATTI', 'odi' => 'ODITEENPATTI', 'test' => 'TESTTEENPATTI', 'open' => 'OPENTEENPATTI', 'teenjoker' => 'TEENJOKER', 'teen20c' => 'TEEN20C', 'teen41' => 'TEEN41', 'teen42' => 'TEEN42', 'teen33' => 'TEEN33', 'teen32' => 'TEEN32', 'teen6' => 'TEEN6', 'patti2' => 'PATTI2', 'teenmuf' => 'TEENMUF', 'teen20b' => 'TEEN20B', 'teen3' => 'TEEN3', 'teen62' => 'TEEN62');
        $html = '';
        if (array_key_exists($game, $shortcodeArr)) {

            $this->db->select('b.*, u.Email_ID as username');

            $this->db->where('b.event_type', $shortcodeArr[$game]);
            $this->db->where('b.bet_status', 1);
            
            if ($user_data['power'] < 5 or $user_data['power'] == 7)			
				$this->db->where("(u.parent_id = $user_id OR u.parentDL = $user_id OR u.parentMDL = $user_id OR u.parentSuperMDL = $user_id   OR u.parentKingAdmin = $user_id )");

            $this->db->where('b.event_id', $event_id);

            if ($client_name) {
                $this->db->where('b.user_id', $client_name);
            }

            if ($ipaddress) {
                $this->db->where('b.bet_ip_address', $ipaddress);
            }

            if ($amount_min) {
                $this->db->where("CONVERT(SUBSTRING_INDEX(b.bet_stack,'-',-1),UNSIGNED INTEGER) >= ", $amount_min);
            }

            if ($amount_max) {
                $this->db->where("CONVERT(SUBSTRING_INDEX(b.bet_stack,'-',-1),UNSIGNED INTEGER) <= ", $amount_max);
            }

            if ($bettype != '') {
                $this->db->where('b.bet_type LIKE "' . $bettype . '"');
            }

            $this->db->join('user_master u', 'u.Id = b.user_id', 'LEFT');
            $bets_data = $this->db->get('bet_teen_details b')->result_array();

            $sno = 0;
            foreach ($bets_data as $bet_data) {
                $sno++;

                $tr_type = ($bet_data['bet_type'] == 'Back' || $bet_data['bet_type'] == 'Yes') ? 'back' : 'lay';
                $html .= '<tr class="' . $tr_type . '">';
                $html .= '  <td>' . $sno . '</td>';
                $html .= '  <td>' . $bet_data['username'] . '</td>';
                $html .= '  <td>' . $bet_data['market_name'] . '</td>';
                // $html .= '  <td>' . $bet_data['bet_type'] . '</td>';
                $html .= '  <td class="text-right">' . $bet_data['bet_stack'] . '</td>';
                $html .= '  <td class="text-right">' . $bet_data['bet_odds'] . '</td>';
                $html .= '  <td>' . $bet_data['bet_time'] . '</td>';
                // $html .= '  <td>' . $bet_data['bet_time'] . '</td>';
                $html .= '  <td>' . $bet_data['bet_ip_address'] . '</td>';
                $html .= '  <td> <a data-toggle="tooltip" title="' . $bet_data['bet_ip_address'] . '">Details</a></td>';
                $html .= '</tr>';
            }

            $total_bets = count($bets_data);

            if ($total_bets == 0) {
                $html = '<td colspan="100%" align="center">No record found!...</td>';
            }
        }

        return $this->print_json(array('results' => $html, 'total_bets' => $total_bets));
    }

    public function market_analysis($type = 't20', $event_id = '') {

        $this->load->database();
        $this->load->library('users', $this);
        $this->load->model('common_model');

        if (!$this->users->require_power(2))
            return;
            
        $user_data = $this->users->data();
        $user_id = $user_data['Id'];

        $shortcodeArr = array('t20' => '2020TEENPATTI', 'odi' => 'ODITEENPATTI', 'test' => 'TESTTEENPATTI', 'open' => 'OPENTEENPATTI', 'teenjoker' => 'TEENJOKER', 'teen20c' => 'TEEN20C', 'teen41' => 'TEEN41', 'teen42' => 'TEEN42', 'teen33' => 'TEEN33', 'teen32' => 'TEEN32', 'teen6' => 'TEEN6', 'patti2' => 'PATTI2', 'teenmuf' => 'TEENMUF', 'teen20b' => 'TEEN20B', 'teen3' => 'TEEN3', 'teen62' => 'TEEN62');
        $market_pl = array();

        if (array_key_exists($type, $shortcodeArr)) {

            $all_markets = $this->db->select('*')->where('market_type LIKE "' . $shortcodeArr[$type] . '"')->get('event_casino_market_id')->result();

            $this->db->select('SUM(b.bet_margin_used) as total_margin, SUM(b.bet_win_amount) as total_win, b.market_name, b.bet_type,b.market_id,b.bet_odds');
            $this->db->select('b.user_id, u.parentDL, u.parentMDL, u.parentSuperMDL,u.parentKingAdmin');

//            $this->db->where(array('b.event_id' => $event_id, 'b.bet_status' => 1, 'b.event_type' => $shortcodeArr[$type]));
            $this->db->where(array('b.event_id' => $event_id, 'b.event_type' => $shortcodeArr[$type]));
            
            if ($user_data['power'] < 5 or $user_data['power'] == 7)			
				$this->db->where("(u.parent_id = $user_id OR u.parentDL = $user_id OR u.parentMDL = $user_id OR u.parentSuperMDL = $user_id   OR u.parentKingAdmin = $user_id )");

            $this->db->from('bet_teen_details b');
            $this->db->join('user_master u', 'u.Id = b.user_id', 'LEFT');

            $this->db->group_by('u.Id, b.market_name,b.bet_type');

            $bets_data = $this->db->get()->result_array();

            if ($bets_data) {

                $my_partnership = $this->common_model->get_my_partnership($user_data, $bets_data[0]);

                if ($type == 'test') {

                    foreach ($all_markets as $all_market) {
                        if (!in_array($all_market->market_id, array(11, 21, 31))) {
                            continue;
                        }

                        $pl = 0;
                        foreach ($bets_data as $bet_data) {
                            if (!in_array($bet_data['market_id'], array(11, 21, 31))) {
                                continue;
                            }

                            if ($all_market->market_id == $bet_data['market_id']) {

                                if ($bet_data['bet_type'] == 'Back') {
                                    $pl -= $bet_data['total_win'];
                                } else {
                                    $pl += $bet_data['total_margin'];
                                }
                            } else {
                                if ($bet_data['bet_type'] == 'Lay') {
                                    $pl -= $bet_data['total_win'];
                                } else {
                                    $pl += $bet_data['total_margin'];
                                }
                            }
                        }

                        $my_pl = ($pl / 100) * $my_partnership;
//                    $my_pl = $pl;

                        $market_pl[$all_market->market_id] = array('market_id' => $all_market->market_id, 'market_name' => $all_market->market_name, 'pl' => ROUND($my_pl, 2));
                    }

                    foreach ($bets_data as $bet_data) {

                        if (in_array($bet_data['market_id'], array(11, 21, 31))) {
                            continue;
                        }

                        $pl = (0 - $bet_data['total_win']);
                        $my_pl = ($pl / 100) * $my_partnership;
//                    $my_pl = $pl;

                        $market_pl[$bet_data['market_id']] = array('market_id' => $bet_data['market_id'], 'market_name' => $bet_data['market_name'], 'pl' => ROUND($my_pl, 2));
                    }
                } else if ($type == 'open' || $type == 't20' || $type == 'teen20c'|| $type == 'teen41'|| $type == 'teen42'|| $type == 'teen33'|| $type == 'teen32'|| $type == 'patti2'|| $type == 'teenmuf' || $type == 'teen20b'|| $type == 'teen3') {
                    foreach ($bets_data as $bet_data) {

                        $pl = (0 - $bet_data['total_win']);
                        $my_pl = ($pl / 100) * $my_partnership;
//                    $my_pl = $pl;

                        $market_pl[$bet_data['market_id']] = array('market_id' => $bet_data['market_id'], 'market_name' => $bet_data['market_name'], 'pl' => ROUND($my_pl, 2),'my_partnership'=>$my_partnership,'win'=>$bet_data['total_win']);
                    }
                } else {
                    foreach ($all_markets as $all_market) {
                        $pl = 0;
                        foreach ($bets_data as $bet_data) {
                            if ($all_market->market_id == $bet_data['market_id']) {


                                if ($bet_data['bet_type'] == 'Back') {
                                    $pl -= $bet_data['total_win'];
                                } else {
                                    $pl += $bet_data['total_margin'];
                                }
                            } else {
                                if ($bet_data['bet_type'] == 'Lay') {
                                    $pl -= $bet_data['total_win'];
                                } else {
                                    $pl += $bet_data['total_margin'];
                                }
                                continue;
                            }
                        }

                        $my_pl = ($pl / 100) * $my_partnership;
//                $my_pl = $pl;

                        $market_pl[$all_market->market_id] = array('market_id' => $all_market->market_id, 'market_name' => $all_market->market_name, 'pl' => ROUND($my_pl, 2));
                    }
                }
            }
        }

        return $this->print_json(array('results' => $market_pl));
    }

    private function print_json($array) {
        $this->output->
                set_content_type('application/json')->
                set_output(json_encode($array));
    }

}
