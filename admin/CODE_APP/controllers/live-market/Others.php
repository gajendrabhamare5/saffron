<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Others extends CI_Controller {

    public $layout = array();

    public function index() {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Account Statement';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('live-market/others/list', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function sicbo2() {

            $this->load->library('users', $this);

            if (!$this->users->require_power(2))
                return;
            
            $this->users->pwd_change_status();
            
            $this->layout['title'] = PROJECTNAME . ' - Sic Bo 2';

            $this->load->view('header', array('handler' => $this));
            $this->load->view('live-market/others/sicbo2', array('handler' => $this));
            $this->load->view('footer', array('handler' => $this));
        }

         public function sicbo() {

            $this->load->library('users', $this);

            if (!$this->users->require_power(2))
                return;
            
            $this->users->pwd_change_status();
            
            $this->layout['title'] = PROJECTNAME . ' - Sic Bo ';

            $this->load->view('header', array('handler' => $this));
            $this->load->view('live-market/others/sicbo', array('handler' => $this));
            $this->load->view('footer', array('handler' => $this));
        }

         public function thetrap() {

            $this->load->library('users', $this);

            if (!$this->users->require_power(2))
                return;
            
            $this->users->pwd_change_status();
            
            $this->layout['title'] = PROJECTNAME . ' - The Trap ';

            $this->load->view('header', array('handler' => $this));
            $this->load->view('live-market/others/thetrap', array('handler' => $this));
            $this->load->view('footer', array('handler' => $this));
        }

        public function race17() {

            $this->load->library('users', $this);

            if (!$this->users->require_power(2))
                return;
            
            $this->users->pwd_change_status();
            
            $this->layout['title'] = PROJECTNAME . ' - Race to 17 ';

            $this->load->view('header', array('handler' => $this));
            $this->load->view('live-market/others/race17', array('handler' => $this));
            $this->load->view('footer', array('handler' => $this));
        }

         public function race2() {

            $this->load->library('users', $this);

            if (!$this->users->require_power(2))
                return;
            
            $this->users->pwd_change_status();
            
            $this->layout['title'] = PROJECTNAME . ' - Race to 2nd ';

            $this->load->view('header', array('handler' => $this));
            $this->load->view('live-market/others/race2', array('handler' => $this));
            $this->load->view('footer', array('handler' => $this));
        }

          public function trio() {

            $this->load->library('users', $this);

            if (!$this->users->require_power(2))
                return;
            
            $this->users->pwd_change_status();
            
            $this->layout['title'] = PROJECTNAME . ' - Trio';

            $this->load->view('header', array('handler' => $this));
            $this->load->view('live-market/others/trio', array('handler' => $this));
            $this->load->view('footer', array('handler' => $this));
        }

        public function notenum() {

            $this->load->library('users', $this);

            if (!$this->users->require_power(2))
                return;
            
            $this->users->pwd_change_status();
            
            $this->layout['title'] = PROJECTNAME . ' - Note Number';

            $this->load->view('header', array('handler' => $this));
            $this->load->view('live-market/others/notenum', array('handler' => $this));
            $this->load->view('footer', array('handler' => $this));
        }

         public function kbc() {

            $this->load->library('users', $this);

            if (!$this->users->require_power(2))
                return;
            
            $this->users->pwd_change_status();
            
            $this->layout['title'] = PROJECTNAME . ' - K.B.C ';

            $this->load->view('header', array('handler' => $this));
            $this->load->view('live-market/others/kbc', array('handler' => $this));
            $this->load->view('footer', array('handler' => $this));
        }

        public function teen120() {

            $this->load->library('users', $this);

            if (!$this->users->require_power(2))
                return;
            
            $this->users->pwd_change_status();
            
            $this->layout['title'] = PROJECTNAME . ' - 1 CARD 20-20  ';

            $this->load->view('header', array('handler' => $this));
            $this->load->view('live-market/others/teen120', array('handler' => $this));
            $this->load->view('footer', array('handler' => $this));
        }

         public function teen1() {

            $this->load->library('users', $this);

            if (!$this->users->require_power(2))
                return;
            
            $this->users->pwd_change_status();
            
            $this->layout['title'] = PROJECTNAME . ' - 1 CARD ONE-DAY  ';

            $this->load->view('header', array('handler' => $this));
            $this->load->view('live-market/others/teen1', array('handler' => $this));
            $this->load->view('footer', array('handler' => $this));
        }

           public function dum10() {

            $this->load->library('users', $this);

            if (!$this->users->require_power(2))
                return;
            
            $this->users->pwd_change_status();
            
            $this->layout['title'] = PROJECTNAME . ' - Dus ka Dum ';

            $this->load->view('header', array('handler' => $this));
            $this->load->view('live-market/others/dum10', array('handler' => $this));
            $this->load->view('footer', array('handler' => $this));
        }

        public function lottery() {

            $this->load->library('users', $this);

            if (!$this->users->require_power(2))
                return;
            
            $this->users->pwd_change_status();
            
            $this->layout['title'] = PROJECTNAME . ' - Lottery ';

            $this->load->view('header', array('handler' => $this));
            $this->load->view('live-market/others/lottery', array('handler' => $this));
            $this->load->view('footer', array('handler' => $this));
        }

        public function dolidana() {

            $this->load->library('users', $this);

            if (!$this->users->require_power(2))
                return;
            
            $this->users->pwd_change_status();
            
            $this->layout['title'] = PROJECTNAME . ' - dolidana ';

            $this->load->view('header', array('handler' => $this));
            $this->load->view('live-market/others/dolidana', array('handler' => $this));
            $this->load->view('footer', array('handler' => $this));
        }

         public function active_bets($type = 'sicbo2', $event_id = '') {

        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
            
        $user_data = $this->users->data();
        $user_id = $user_data['Id'];

        $shortcodeArr = array('sicbo2' => 'SICBO2','sicbo' => 'SICBO','thetrap' => 'TRAP','race17' => 'RACE17','trio' => 'TRIO','notenum' => 'NOTENUM','kbc' => 'KBC','teen120' => 'TEEN120','teen1' => 'TEEN1','race2' => 'RACE2','dum10' => 'DUM10','lottery' => 'LOTTERY','dolidana' => 'DOLIDANA');

        $html = '';
        $total_bets = '';
        if (array_key_exists($type, $shortcodeArr)) {
        
            $this->db->select('b.*,u.Email_ID as username');
			if ($user_data['power'] < 5 or $user_data['power'] == 7)			
				$this->db->where("(u.parent_id = $user_id OR u.parentDL = $user_id OR u.parentMDL = $user_id OR u.parentSuperMDL = $user_id   OR u.parentKingAdmin = $user_id )");
			
			$this->db->where('b.event_id', $event_id);
			$this->db->where(array('b.bet_status' => 1, 'b.event_type' => $shortcodeArr[$type]));
			$this->db->join('user_master u','u.Id = b.user_id','LEFT');
            $bets_data = $this->db->get('bet_teen_details b')->result_array();

            foreach ($bets_data as $bet_data) {

//  if ($type == 'race2') {
//      $tr_type = ($bet_data['bet_type'] == 'Back') ? 'back' : 'lay';
//     $html .= '<tr class="' . $tr_type . '">';
//     $html .= '  <td>' . $bet_data['username'] . '</td>';
//     $html .= '  <td>' . $bet_data['bet_odds'] . '</td>';
//     $html .= '  <td class="text-right">' . $bet_data['bet_stack'] . '</td>';
//      $html .= '</tr>';
//  }else{
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

 //}
              
            }
            $total_bets = count($bets_data);
            if ($total_bets == 0) {
                $html = '<td colspan="100%" align="center">No record found!...</td>';
            }
        }

        return $this->print_json(array('results' => $html, 'total_bets' => $total_bets));
    }

    public function view_more_matched($game = 'sicbo2', $event_id = '') {
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

        $shortcodeArr = array('sicbo2' => 'SICBO2','sicbo' => 'SICBO','thetrap' => 'TRAP','race17' => 'RACE17','trio' => 'TRIO','notenum' => 'NOTENUM','kbc' => 'KBC','teen120' => 'TEEN120','teen1' => 'TEEN1','race2' => 'RACE2','dum10' => 'DUM10','lottery' => 'LOTTERY','dolidana' => 'DOLIDANA');
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

    public function market_analysis($type = 'sicbo2', $event_id = '') {

        $this->load->database();
        $this->load->library('users', $this);
        $this->load->model('common_model');

        if (!$this->users->require_power(2))
            return;

		$user_data = $this->users->data();
        $user_id = $user_data['Id'];

        $shortcodeArr = array('sicbo2' => 'SICBO2','sicbo' => 'SICBO','thetrap' => 'TRAP','race17' => 'RACE17','trio' => 'TRIO','notenum' => 'NOTENUM','kbc' => 'KBC','teen120' => 'TEEN120','teen1' => 'TEEN1','race2' => 'RACE2','dum10' => 'DUM10','lottery' => 'LOTTERY','dolidana' => 'DOLIDANA');
        $market_pl = array();

        if (array_key_exists($type, $shortcodeArr)) {
            $all_markets = $this->db->select('*')->where('market_type LIKE "' . $shortcodeArr[$type] . '"')->get('event_casino_market_id')->result();

            $this->db->select('SUM(b.bet_margin_used) as total_margin, SUM(b.bet_win_amount) as total_win, b.market_name, b.bet_type,b.market_id,b.bet_odds');
            $this->db->select('b.user_id, u.parentDL, u.parentMDL, u.parentSuperMDL,u.parentKingAdmin');

            $this->db->where(array('b.event_id' => $event_id, 'b.bet_status' => 1, 'b.event_type' => $shortcodeArr[$type]));
			
			if ($user_data['power'] < 5 or $user_data['power'] == 7)			
				$this->db->where("(u.parent_id = $user_id OR u.parentDL = $user_id OR u.parentMDL = $user_id OR u.parentSuperMDL = $user_id   OR u.parentKingAdmin = $user_id )");
			
            $this->db->from('bet_teen_details b');
            $this->db->join('user_master u', 'u.Id = b.user_id', 'LEFT');

            $this->db->group_by('u.Id, b.market_name,b.bet_type');

            $bets_data = $this->db->get()->result_array();

            if ($bets_data) {

                $my_partnership = $this->common_model->get_my_partnership($user_data, $bets_data[0]);

                if ($type == 'sicbo2' || $type == 'sicbo' || $type == 'thetrap' || $type == 'race17' || $type == 'trio' || $type == 'notenum' || $type == 'kbc' || $type == 'teen120' || $type == 'teen1' || $type == 'race2' || $type == 'dum10'|| $type == 'lottery') {

                    foreach ($bets_data as $bet_data) {

                        $pl = (0 - $bet_data['total_win']);
                        $my_pl = ($pl / 100) * $my_partnership;
                        //  $my_pl = $pl;

                        $market_pl[$bet_data['market_id']] = array('market_id' => $bet_data['market_id'], 'market_name' => $bet_data['market_name'], 'pl' => ROUND($my_pl, 2));
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
?>