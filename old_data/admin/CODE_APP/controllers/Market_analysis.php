<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Market_analysis extends CI_Controller {

    public $layout = array();

    public function index() {

        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Account Statement';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('market-analysis/list', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }
	
	  public function get_analysis() {

        $this->load->database();

        $this->load->library('users', $this);
        $this->load->model('common_model');

        if (!$this->users->require_power(2)) {
            return;
        }

		
        $user_data = $this->users->data();
		$user_type = $user_data['power'];
		$login_user_type = $user_type;
		$user_id = $user_data['Id'];
		$login_user_id = $user_id;
		
        $where_event = '';
        if ($user_data['power'] < 5 or $user_data['power'] == 7){
            $where_event = ' AND (u.parentDL = ' . $user_data['Id'] . ' OR u.parentMDL = ' . $user_data['Id'] . ' OR u.parentSuperMDL = ' . $user_data['Id'] . ' OR u.parentKingAdmin = ' . $user_data['Id'] . ')';
		}
		
			$get_all_fancy_active_user_list = $this->db->query("select u.UserID from user_login_master as u where 1=1 $where_event")->result_array();
		$user_idss = array_values(array_column($get_all_fancy_active_user_list, 'UserID'));
		
		$downline_user_list = "";
		if($user_idss != null){
			$downline_user_list_array = $user_idss;
			$downline_user_list = implode(",",$user_idss);
		}
		else{
			$downline_user_list = "0";
		}
		
		if($user_data['power'] == 5){
			$get_all_fancy_active_user_list123 = $this->db->query("select ulm.UserID,ulm.parentDL,ulm.parentMDL,ulm.parentSuperMDL,ulm.parentKingAdmin from   user_login_master as ulm  where 1=1 and ulm.UserID IN ($downline_user_list)   GROUP BY ulm.UserID")->result_array();
			
			
		}
		else{
			
			$get_all_fancy_active_user_list123 = $this->db->query("select ulm.UserID,ulm.parentDL,ulm.parentMDL,ulm.parentSuperMDL,ulm.parentKingAdmin from   user_login_master as ulm where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id or ulm.parentKingAdmin=$user_id) and ulm.UserID IN ($downline_user_list)   GROUP BY ulm.UserID")->result_array();
		}
		
		$self_percentage_array = array();
		$all_user_id = array();
		$master_user_data = array();
		foreach($get_all_fancy_active_user_list123 as $downline_user){
			$bet_user_id = $downline_user['UserID'];
			$all_user_id[] = $bet_user_id;
			$betting_data = array();
			
			
				$parentDL = $downline_user['parentDL'];
				$parentMDL = $downline_user['parentMDL'];
				$parentSuperMDL = $downline_user['parentSuperMDL'];
				$parentKingAdmin = $downline_user['parentKingAdmin'];
				
				if(!isset($master_user_data[$parentDL])){
					$res_dl_data = $this->db->query("select my_percentage from user_master where Id=$parentDL");
					$dl_data = $res_dl_data->row_array();
					if($dl_data){
						$master_user_data[$parentDL] = $dl_data['my_percentage'];
					}
				}
				
				if(!isset($master_user_data[$parentMDL])){
					$res_dl_data = $this->db->query("select my_percentage from user_master where Id=$parentMDL");
					$dl_data = $res_dl_data->row_array();
					if($dl_data){
						$master_user_data[$parentMDL] = $dl_data['my_percentage'];
					}
				}
				
				if(!isset($master_user_data[$parentSuperMDL])){
					$res_dl_data = $this->db->query("select my_percentage from user_master where Id=$parentSuperMDL");
					$dl_data = $res_dl_data->row_array();
					if($dl_data){
						$master_user_data[$parentSuperMDL] = $dl_data['my_percentage'];
					}
				}
				
				if(!isset($master_user_data[$parentKingAdmin])){
					$res_dl_data = $this->db->query("select my_percentage from user_master where Id=$parentKingAdmin");
					$dl_data = $res_dl_data->row_array();
					if($dl_data){
						$master_user_data[$parentKingAdmin] = $dl_data['my_percentage'];
					}
				}
				
				$percentage_parentDL = $master_user_data[$parentDL];
				$percentage_parentMDL = $master_user_data[$parentMDL];
				$percentage_parentSuperMDL = $master_user_data[$parentSuperMDL];
				$percentage_parentKingAdmin = $master_user_data[$parentKingAdmin];
				
			
				$betting_data['parentDL'] = $parentDL;
				$betting_data['parentMDL'] = $parentMDL;
				$betting_data['parentSuperMDL'] = $parentSuperMDL;
				$betting_data['parentKingAdmin'] = $parentKingAdmin;
				
				
				$self_percentage = $this->common_model->get_my_partnership_all_user($user_data, $percentage_parentDL,$percentage_parentMDL,$percentage_parentSuperMDL,$percentage_parentKingAdmin,$betting_data,'my');
				$self_percentage_array[$bet_user_id] = $self_percentage;
			
		}
		
		
		$sql_event_id = "SELECT b.event_id, b.event_name, b.oddsmarketId, b.event_type FROM bet_details b LEFT JOIN user_master u ON u.Id = b.user_id WHERE b.bet_status = 1 $where_event GROUP BY b.event_id";
		$event_ids_data = $this->db->query($sql_event_id)->result_array();
		
		$events_info = array();
        foreach ($event_ids_data as $event_id_data) {
            $events_info[$event_id_data['event_id']] = $event_id_data;
        }
		
		$event_ids = array_values(array_column($event_ids_data, 'event_id'));
		
		if(empty($event_ids)){
			exit();
		}
		
		$event_ids_str = implode(',',$event_ids);
		
        $sql = 'SELECT e.* FROM  event_market_id e WHERE e.event_id IN ('.$event_ids_str.') AND e.market_type LIKE "MATCH_ODDS" GROUP BY e.event_id , e.market_id';
        
        $markets_data = $this->db->query($sql)->result_array();

        $event_markets = array();
        foreach ($markets_data as $market_data) {
            $event_markets[$market_data['event_id']][] = $market_data;
        }
        
        $sql_bet = '
					SELECT 
						SUM(b.bet_margin_used) as total_margin_used, 
						SUM(b.bet_win_amount) as total_win_amount, 
						b.market_name, b.market_id, b.oddsmarketId, b.bet_type, b.event_name, 
						b.user_id,
						COUNT(b.bet_id) as total_bet,
						b.event_id
					FROM bet_details b
						
					WHERE b.event_id IN (' . $event_ids_str . ') 
						AND b.bet_status = 1
						AND b.market_type LIKE "MATCH_ODDS"
						AND b.user_id IN (' . $downline_user_list. ')
					GROUP BY b.user_id, b.event_id , b.market_id, b.bet_type
					';

		$bets_data_all = $this->db->query($sql_bet)->result_array();
		
		$bets_by_events_arr = array();
        foreach ($bets_data_all as $bet_data) {
            $bets_by_events_arr[$bet_data['event_id']][] = $bet_data;
        }

        $event_pl = array();
        foreach ($event_markets as $key => $event_market) {
            $event_id = $key;

            /*
            $where_bet = '';
            if ($user_data['power'] < 5)
                $where_bet = ' AND (u.parentDL = ' . $user_data['Id'] . ' OR parentMDL = ' . $user_data['Id'] . ' OR parentSuperMDL = ' . $user_data['Id'] . ')';
            $sql_bet = '
                        SELECT 
                            SUM(b.bet_margin_used) as total_margin_used, 
                            SUM(b.bet_win_amount) as total_win_amount, 
                            b.market_name, b.market_id, b.oddsmarketId, b.bet_type, b.event_name, 
                            b.user_id, u.parentDL, u.parentMDL, u.parentSuperMDL,
                            COUNT(b.bet_id) as total_bet
                        FROM bet_details b
                            LEFT JOIN user_master u ON u.Id = b.user_id
                        WHERE b.event_id = ' . $event_id . ' 
                            AND b.bet_status = 1
                            AND b.market_type LIKE "MATCH_ODDS"
                            ' . $where_bet . '
                        GROUP BY u.Id, b.event_id , b.market_id, b.bet_type
                        ';

            $bets_data = $this->db->query($sql_bet)->result_array();
            */
            
            $bets_data = $bets_by_events_arr[$event_id];

            $market_pl = array();
            $event_name = '';
            foreach ($event_market as $market_data) {
                $market_id = $market_data['market_id'];
                $market_name = $market_data['market_name'];

                foreach ($bets_data as $bet_data) {

					$bet_user_id = $bet_data['user_id'];
                    /* $my_partnership = $this->common_model->get_my_partnership($user_data, $bet_data); */
                    $my_partnership = $self_percentage_array[$bet_user_id];
                    
                    $event_name = $bet_data['event_name'];
                    $pl = 0;

                    if (($bet_data['bet_type'] == 'Back' && $bet_data['market_id'] == $market_id) || ($bet_data['bet_type'] == 'Lay' && $bet_data['market_id'] != $market_id)) {
                        $pl -= $bet_data['total_win_amount'];
                    } else {
                        $pl += $bet_data['total_margin_used'];
                    }
                    
                    $my_pl = ($pl / 100) * $my_partnership;
//                    $my_pl = $pl;

                    if (isset($market_pl[$market_id])) {
                        $market_pl[$market_id]['pl'] += $my_pl;
                    } else {
                        $market_pl[$market_id] = array('market_id' => $market_id, 'market_name' => $market_name, 'pl' => ROUND($my_pl, 2));
                    }
                }
            }

            $oddsmarketId = (isset($bets_data[0]) ? $bets_data[0]['oddsmarketId'] : 0);

            $total_bet = array_sum(array_column($bets_data, 'total_bet'));
            
			if($total_bet == null){
				$total_bet =0;
			}
            /*
            $res_event_name = $this->db->query('SELECT DISTINCT `event_name`,`oddsmarketId`,`event_type` FROM bet_details WHERE event_id='.$event_id)->row_array();
            */
            
            $res_event_name = $events_info[$event_id];

            $event_pl[] = array('event_type' => $res_event_name['event_type'],'event_name' => $res_event_name['event_name'], 'event_id' => $event_id, 'oddsmarketId' => $res_event_name['oddsmarketId'], 'market_pl' => array_values($market_pl), 'total_bet' => $total_bet);
        }

        return $this->print_json(array('results' => $event_pl,'ytfy'=>$event_markets));
    }

    public function get_analysis_1() {

        $this->load->database();

        $this->load->library('users', $this);
        $this->load->model('common_model');

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();

		$user_id = $user_data['Id'];
		
        $where_event = '';
        if ($user_data['power'] < 5 or $user_data['power'] == 7){
            $where_event = ' AND (u.parentDL = ' . $user_data['Id'] . ' OR u.parentMDL = ' . $user_data['Id'] . ' OR u.parentSuperMDL = ' . $user_data['Id'] . ' OR u.parentKingAdmin = ' . $user_data['Id'] . ')';
		}
		
		
		
		$get_all_fancy_active_user_list = $this->db->query("select u.UserID from user_login_master as u where 1=1 $where_event")->result_array();
		$user_idss = array_values(array_column($get_all_fancy_active_user_list, 'UserID'));
		
		$downline_user_list = "";
		if($user_idss != null){
			$downline_user_list_array = $user_idss;
			$downline_user_list = implode(",",$user_idss);
		}
		else{
			$downline_user_list = "0";
		}
		
		if($user_data['power'] == 5){
			$get_all_fancy_active_user_list123 = $this->db->query("select ulm.UserID,ulm.parentDL,ulm.parentMDL,ulm.parentSuperMDL,ulm.parentKingAdmin from   user_login_master as ulm  where 1=1 and ulm.UserID IN ($downline_user_list)   GROUP BY ulm.UserID")->result_array();
			
		}
		else{
			
			$get_all_fancy_active_user_list123 = $this->db->query("select ulm.UserID,ulm.parentDL,ulm.parentMDL,ulm.parentSuperMDL,ulm.parentKingAdmin from   user_login_master as ulm where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id or ulm.parentKingAdmin=$user_id) and ulm.UserID IN ($downline_user_list)   GROUP BY ulm.UserID")->result_array();
		}
		
		$self_percentage_array = array();
		$all_user_id = array();
		$master_user_data = array();
		foreach($get_all_fancy_active_user_list123 as $downline_user){
			$bet_user_id = $downline_user['UserID'];
			$all_user_id[] = $bet_user_id;
			$betting_data = array();
			
			
				$parentDL = $downline_user['parentDL'];
				$parentMDL = $downline_user['parentMDL'];
				$parentSuperMDL = $downline_user['parentSuperMDL'];
				$parentKingAdmin = $downline_user['parentKingAdmin'];
				
				if(!isset($master_user_data[$parentDL])){
					$res_dl_data = $this->db->query("select my_percentage from user_master where Id=$parentDL");
					$dl_data = $res_dl_data->row_array();
					if($dl_data){
						$master_user_data[$parentDL] = $dl_data['my_percentage'];
					}
				}
				
				if(!isset($master_user_data[$parentMDL])){
					$res_dl_data = $this->db->query("select my_percentage from user_master where Id=$parentMDL");
					$dl_data = $res_dl_data->row_array();
					if($dl_data){
						$master_user_data[$parentMDL] = $dl_data['my_percentage'];
					}
				}
				
				if(!isset($master_user_data[$parentSuperMDL])){
					$res_dl_data = $this->db->query("select my_percentage from user_master where Id=$parentSuperMDL");
					$dl_data = $res_dl_data->row_array();
					if($dl_data){
						$master_user_data[$parentSuperMDL] = $dl_data['my_percentage'];
					}
				}
				
				if(!isset($master_user_data[$parentKingAdmin])){
					$res_dl_data = $this->db->query("select my_percentage from user_master where Id=$parentKingAdmin");
					$dl_data = $res_dl_data->row_array();
					if($dl_data){
						$master_user_data[$parentKingAdmin] = $dl_data['my_percentage'];
					}
				}
				
				$percentage_parentDL = $master_user_data[$parentDL];
				$percentage_parentMDL = $master_user_data[$parentMDL];
				$percentage_parentSuperMDL = $master_user_data[$parentSuperMDL];
				$percentage_parentKingAdmin = $master_user_data[$parentKingAdmin];
				
			
				$betting_data['parentDL'] = $parentDL;
				$betting_data['parentMDL'] = $parentMDL;
				$betting_data['parentSuperMDL'] = $parentSuperMDL;
				$betting_data['parentKingAdmin'] = $parentKingAdmin;
				
				
				$self_percentage = $this->common_model->get_my_partnership_all_user($user_data, $percentage_parentDL,$percentage_parentMDL,$percentage_parentSuperMDL,$percentage_parentKingAdmin,$betting_data,'my');
				$self_percentage_array[$bet_user_id] = $self_percentage;
			
		}
		
		$sql_event_id = "SELECT b.event_id FROM bet_details b LEFT JOIN user_master u ON u.Id = b.user_id WHERE b.bet_status = 1 $where_event GROUP BY b.event_id";
		$event_ids_data = $this->db->query($sql_event_id)->result_array();
		
		$event_ids = array_values(array_column($event_ids_data, 'event_id'));
		
		if(empty($event_ids)){
			exit();
		}
		
		$event_ids_str = implode(',',$event_ids);
		
        $sql = 'SELECT e.* FROM  event_market_id e WHERE e.event_id IN ('.$event_ids_str.') AND e.market_type LIKE "MATCH_ODDS" GROUP BY e.event_id , e.market_id';
        
        $markets_data = $this->db->query($sql)->result_array();

        $event_markets = array();
        foreach ($markets_data as $market_data) {
            $event_markets[$market_data['event_id']][] = $market_data;
        }

        $event_pl = array();
        foreach ($event_markets as $key => $event_market) {
            $event_id = $key;

            $where_bet = '';
            if ($user_data['power'] < 5 or $user_data['power'] == 7)
                $where_bet = ' AND (u.parentDL = ' . $user_data['Id'] . ' OR parentMDL = ' . $user_data['Id'] . ' OR parentSuperMDL = ' . $user_data['Id'] . ' OR parentKingAdmin = ' . $user_data['Id'] . ')';
            $sql_bet = '
                        SELECT 
                            b.user_id, 
                            b.event_id, 
                            SUM(b.bet_margin_used) as total_margin_used, 
                            SUM(b.bet_win_amount) as total_win_amount, 
                            b.market_name, b.market_id, b.oddsmarketId, b.bet_type, b.event_name, 
                           
                            COUNT(b.bet_id) as total_bet
                        FROM bet_details b
                           
                        WHERE b.event_id = ' . $event_id . ' 
                            AND b.bet_status = 1
                            AND b.market_type LIKE "MATCH_ODDS"
                            AND b.user_id IN ('.$downline_user_list.')
                        GROUP BY b.user_id, b.event_id , b.market_id, b.bet_type
                        ';

            $bets_data = $this->db->query($sql_bet)->result_array();

            $market_pl = array();
            $event_name = '';
            foreach ($event_market as $market_data) {
                $market_id = $market_data['market_id'];
                $market_name = $market_data['market_name'];

                foreach ($bets_data as $bet_data) {

                    /* $my_partnership = $this->common_model->get_my_partnership($user_data, $bet_data); */
					
                    $bet_user_id = $bet_data['user_id'];
					$my_partnership = $self_percentage_array[$bet_user_id];
                    
                    $event_name = $bet_data['event_name'];
                    $pl = 0;

                    if (($bet_data['bet_type'] == 'Back' && $bet_data['market_id'] == $market_id) || ($bet_data['bet_type'] == 'Lay' && $bet_data['market_id'] != $market_id)) {
                        $pl -= $bet_data['total_win_amount'];
                    } else {
                        $pl += $bet_data['total_margin_used'];
                    }
                    
                    $my_pl = ($pl / 100) * $my_partnership;
//                    $my_pl = $pl;

                    if (isset($market_pl[$market_id])) {
                        $market_pl[$market_id]['pl'] += $my_pl;
                    } else {
                        $market_pl[$market_id] = array('market_id' => $market_id, 'market_name' => $market_name, 'pl' => ROUND($my_pl, 2));
                    }
                }
            }

            $oddsmarketId = (isset($bets_data[0]) ? $bets_data[0]['oddsmarketId'] : 0);

            $total_bet = array_sum(array_column($bets_data, 'total_bet'));
            
            $res_event_name = $this->db->query('SELECT DISTINCT `event_name`,`oddsmarketId`,`event_type` FROM bet_details WHERE market_type="MATCH_ODDS" and event_id='.$event_id)->row_array();

            $event_pl[] = array('event_name' => $res_event_name['event_name'], 'event_id' => $event_id, 'oddsmarketId' => $res_event_name['oddsmarketId'], 'market_pl' => array_values($market_pl),'event_type'=>$res_event_name['event_type'], 'total_bet' => $total_bet);
        }

        return $this->print_json(array('results' => $event_pl));
    }

    private function print_json($array) {
        $this->output->
                set_content_type('application/json')->
                set_output(json_encode($array));
    }

}
