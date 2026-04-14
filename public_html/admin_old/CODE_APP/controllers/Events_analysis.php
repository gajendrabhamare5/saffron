<?php

defined('BASEPATH') or exit('No direct script access allowed');
/* error_reporting(E_ALL);
ini_set("display_errors",1);
ini_set("display_startup_errors",1); */
class Events_analysis extends CI_Controller
{

	public $layout = array();

	public function index($event_id = '')
	{

		$this->load->library('users', $this);

		if (!$this->users->require_power(2))
			return;

		$this->users->pwd_change_status();

		$event_id = $this->input->get('eventId');
		$marketId = $this->input->get('marketId');

		$this->layout['title'] = PROJECTNAME . ' - Account Statement';
		$this->layout['event_id'] = $event_id;
		$this->layout['marketId'] = $marketId;

		$this->load->view('header', array('handler' => $this));
		$this->load->view('events_analysis/events_analysis', array('handler' => $this));
		$this->load->view('footer', array('handler' => $this));

		/* error_reporting(E_ALL);
ini_set("display_errors",1);
ini_set("display_startup_errors",1); */
	}

	public function get_analysis($event_id = '')
	{

		/* error_reporting(E_ALL);
ini_set("display_errors",1);
ini_set("display_startup_errors",1); */
		$this->load->database();

		$this->load->library('users', $this);
		$this->load->model('common_model');

		if (!$this->users->require_power(2))
			return;

		$user_data = $this->users->data();
		$user_type = $user_data['power'];
		$login_user_type = $user_type;
		$user_id = $user_data['Id'];
		$login_user_id = $user_id;


		/* $down_ids_data = $this->db->query("SELECT * FROM user_master")->result_array();
        $user_list=array();
        foreach ($down_ids_data as $user_dat_na) {
            $useid=$user_dat_na['Id'];
            $user_list[$useid]=$user_dat_na;
        } */

		/* echo "</br>";
	  	echo "1";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */
		$where_event = '';
		if ($user_data['power'] < 5 or $user_data['power'] == 7) {
			$where_event = 'AND (u.parentDL = ' . $user_data['Id'] . ' OR u.parentMDL = ' . $user_data['Id'] . ' OR u.parentSuperMDL = ' . $user_data['Id'] . ' OR u.parentKingAdmin = ' . $user_data['Id'] . ')';
		}

		$get_all_fancy_active_user_list = $this->db->query("select u.UserID from user_login_master as u where 1=1 $where_event")->result_array();
		$user_idss = array_values(array_column($get_all_fancy_active_user_list, 'UserID'));

		/* echo "</br>";
	  	echo "2";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */

		$downline_user_list = "";
		if ($user_idss != null) {
			$downline_user_list_array = $user_idss;
			$downline_user_list = implode(",", $user_idss);
		} else {
			$downline_user_list = "0";
		}

		if ($event_id == "") {
			$sql_event_id = "SELECT b.event_id FROM bet_details b  WHERE b.bet_status = 1 and b.user_id IN ($downline_user_list) GROUP BY b.event_id";
			$event_ids_data = $this->db->query($sql_event_id)->result_array();

			$event_ids = array_values(array_column($event_ids_data, 'event_id'));

			if (empty($event_ids)) {
				exit();
			}

			$event_ids_str = implode(',', $event_ids);
		} else {
			$event_ids_str = $event_id;
		}
		/* echo "</br>";
	  	echo "3";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */
		$sql = '
                SELECT e.*
                FROM  event_market_id e 
                WHERE e.event_id IN (' . $event_ids_str . ')
                        AND e.event_id = ' . $event_id . '
                GROUP BY e.event_id, e.market_type, e.market_id
                ';
		$markets_data = $this->db->query($sql)->result();

		/* echo "</br>";
	  	echo "4";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */

		if ($user_data['power'] == 5) {
			$get_all_fancy_active_user_list123 = $this->db->query("select ulm.UserID,ulm.parentDL,ulm.parentMDL,ulm.parentSuperMDL,ulm.parentKingAdmin from   user_login_master as ulm  where 1=1 and ulm.UserID IN ($downline_user_list)   GROUP BY ulm.UserID")->result_array();
		} else {

			$get_all_fancy_active_user_list123 = $this->db->query("select ulm.UserID,ulm.parentDL,ulm.parentMDL,ulm.parentSuperMDL,ulm.parentKingAdmin from   user_login_master as ulm where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id or ulm.parentKingAdmin=$user_id) and ulm.UserID IN ($downline_user_list)   GROUP BY ulm.UserID")->result_array();
		}

		/* echo "</br>";
	  	echo "5";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */

		$self_percentage_array = array();
		$all_user_id = array();
		$master_user_data = array();

		$all_parent_ids = [];
		$all_user_id = [];
		foreach ($get_all_fancy_active_user_list123 as $downline_user) {
			$all_user_id[] = $downline_user['UserID'];

			foreach (['parentDL', 'parentMDL', 'parentSuperMDL', 'parentKingAdmin'] as $parentField) {
				if (!empty($downline_user[$parentField])) {
					$all_parent_ids[] = (int)$downline_user[$parentField];
				}
			}
		}
		$all_parent_ids = array_unique($all_parent_ids);

		// =====================================================
		// STEP 2: Fetch all master percentages in one query
		// =====================================================
		$master_user_data = [];
		if (!empty($all_parent_ids)) {
			$ids_str = implode(',', $all_parent_ids);
			$res = $this->db->query("
				SELECT Id, my_percentage 
				FROM user_master 
				WHERE Id IN ($ids_str)
			");
			$rows = $res->result_array();

			foreach ($rows as $r) {
				$master_user_data[$r['Id']] = $r['my_percentage'];
			}
		}

		foreach ($get_all_fancy_active_user_list123 as $downline_user) {
			$bet_user_id = $downline_user['UserID'];
			$all_user_id[] = $bet_user_id;
			$betting_data = array();


			$parentDL = $downline_user['parentDL'];
			$parentMDL = $downline_user['parentMDL'];
			$parentSuperMDL = $downline_user['parentSuperMDL'];
			$parentKingAdmin = $downline_user['parentKingAdmin'];

			/* if(!isset($master_user_data[$parentDL])){
					
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
				} */
			$percentage_parentDL = 0;
			$percentage_parentMDL = 0;
			$percentage_parentSuperMDL = 0;
			$percentage_parentKingAdmin = 0;
			if (isset($master_user_data[$parentDL])) {
				$percentage_parentDL = $master_user_data[$parentDL];
			}
			if (isset($master_user_data[$parentMDL])) {
				$percentage_parentMDL = $master_user_data[$parentMDL];
			}
			if (isset($master_user_data[$parentSuperMDL])) {
				$percentage_parentSuperMDL = $master_user_data[$parentSuperMDL];
			}
			if (isset($master_user_data[$parentKingAdmin])) {
				$percentage_parentKingAdmin = $master_user_data[$parentKingAdmin];
			}


			$betting_data['parentDL'] = $parentDL;
			$betting_data['parentMDL'] = $parentMDL;
			$betting_data['parentSuperMDL'] = $parentSuperMDL;
			$betting_data['parentKingAdmin'] = $parentKingAdmin;


			$self_percentage = $this->common_model->get_my_partnership_all_user($user_data, $percentage_parentDL, $percentage_parentMDL, $percentage_parentSuperMDL, $percentage_parentKingAdmin, $betting_data, 'my');
			$self_percentage_array[$bet_user_id] = $self_percentage;
		}

		/* echo "</br>";
	  	echo "6";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */
		$master_user_data = array();

		$where_bet = '';
		if ($user_data['power'] < 5 or $user_data['power'] == 7)
			$where_bet = ' AND (u.parentDL = ' . $user_data['Id'] . ' OR parentMDL = ' . $user_data['Id'] . ' OR parentSuperMDL = ' . $user_data['Id'] . ' OR parentKingAdmin = ' . $user_data['Id'] . ')';
		$sql_bet = '
                        SELECT 
                            SUM(b.bet_margin_used) as total_margin, 
                            SUM(b.bet_win_amount) as total_win, 
                            b.market_name, b.market_id, b.market_type, b.bet_type, b.event_name, 
                            b.user_id,
                            COUNT(b.bet_id) as total_bet
                        FROM bet_details b
                            
                        WHERE b.event_id = ' . $event_id . ' 
                            AND b.bet_status = 1
                            AND b.market_type != "FANCY_ODDS"
                             AND b.user_id IN (' . $downline_user_list . ')
                        GROUP BY b.user_id, b.event_id ,b.market_type, b.market_id, b.bet_type
                        ';

		$bets_data = $this->db->query($sql_bet)->result_array();
		$master_user_data = array();
		$market_pl = array();
		/* echo "</br>";
	  	echo "7";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */
		$event_name = $bets_data[0]['event_name'];
		if ($bets_data) {

			$market_pl_match = $this->get_market_exposure($markets_data, $bets_data, 'MATCH_ODDS', $user_data, $self_percentage_array);

			if ($event_id != "") {
				$market_pl_book = $this->get_market_exposure($markets_data, $bets_data, 'BOOKMAKER_ODDS', $user_data, $self_percentage_array);

				$market_pl_booksm1 = $this->get_market_exposure($markets_data, $bets_data, 'BOOKMAKERSMALL_ODDS', $user_data, $self_percentage_array);
			}
		}
		/* echo "</br>";
		echo "8";
		echo "</br>";
		echo date('Y-m-d H:i:s'); */
		/* if($event_id != ""){
		   $get_exposure_data = $this->fancy_book($event_id,$downline_user_list_array,$self_percentage_array); 
		   
		   
			$sql_fancy_bet ='
							SELECT 
								b.market_id,
								b.market_type,
								b.market_name
							FROM bet_details b
							WHERE b.event_id = ' . $event_id . ' 
								AND b.bet_status = 0
								
								 AND b.user_id IN ('.$downline_user_list.')
								AND b.market_type = "FANCY_ODDS"
							GROUP BY  b.market_id
							';
			$get_all_fancy_bet = $this->db->query($sql_fancy_bet)->result_array();
			foreach($get_all_fancy_bet as $fancy_bet){
				$market_id_fancy = $fancy_bet['market_id'];
				
			
				
				$get_exposure_data_1 = $get_exposure_data['data'][$market_id_fancy];
				
				$array_column  = $get_exposure_data_1;
				
				$min_array_column = min($array_column);
				
				 $market_pl[$fancy_bet['market_id']] = array('market_id' => $fancy_bet['market_id'], 'market_type' => $fancy_bet['market_type'], 'market_name' => $fancy_bet['market_name'], 'pl' => ROUND($min_array_column, 2));
				 
				
				
			} 
		} */
		/* echo "</br>";
	  	echo "9";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */
		if (!empty($market_pl_match)) {
			$market_pl = array_merge($market_pl, $market_pl_match);
		}

		if (!empty($market_pl_book)) {
			$market_pl = array_merge($market_pl, $market_pl_book);
		}
		if (!empty($market_pl_booksm1)) {
			$market_pl = array_merge($market_pl, $market_pl_booksm1);
		}


		$total_bet = array_sum(array_column($bets_data, 'total_bet'));

		$results = array('event_name' => $event_name, 'event_id' => $event_id, 'market_pl' => array_values($market_pl), 'total_bet' => $total_bet, 'downline_user_list' => $downline_user_list, 'self_percentage_array' => $self_percentage_array,);
		/* echo "</br>";
		echo "10";
		echo "</br>";
		echo date('Y-m-d H:i:s'); */
		return $this->print_json(array('results' => $results));
	}
	public function get_analysis_fancy($event_id = '')
	{

		$this->load->database();

		$this->load->library('users', $this);
		$this->load->model('common_model');

		if (!$this->users->require_power(2))
			return;

		$user_data = $this->users->data();
		$user_type = $user_data['power'];
		$login_user_type = $user_type;
		$user_id = $user_data['Id'];
		$login_user_id = $user_id;

		$downline_user_list = $this->input->post('downline_user_list');
		$downline_user_list_array = explode(",", $downline_user_list);
		$self_percentage_array = $this->input->post('self_percentage_array');

		$market_pl = array();
		if ($event_id != "") {
			$get_exposure_data = $this->fancy_book($event_id, $downline_user_list_array, $self_percentage_array);


			$sql_fancy_bet = '
							SELECT 
								b.market_id,
								b.market_type,
								b.market_name
							FROM bet_details b
							WHERE b.event_id = ' . $event_id . ' 
								AND b.bet_status = 1
								
								 AND b.user_id IN (' . $downline_user_list . ')
								AND b.market_type = "FANCY_ODDS"
							GROUP BY  b.market_id
							';
			$get_all_fancy_bet = $this->db->query($sql_fancy_bet)->result_array();
			foreach ($get_all_fancy_bet as $fancy_bet) {
				$market_id_fancy = $fancy_bet['market_id'];



				$get_exposure_data_1 = $get_exposure_data['data'][$market_id_fancy];

				$array_column  = $get_exposure_data_1;

				$min_array_column = min($array_column);

				$market_pl[$fancy_bet['market_id']] = array('market_id' => $fancy_bet['market_id'], 'market_type' => $fancy_bet['market_type'], 'market_name' => $fancy_bet['market_name'], 'pl' => ROUND($min_array_column, 2));
			}
		}

		$results = array('market_pl' => array_values($market_pl));
		/* echo "</br>";
		echo "10";
		echo "</br>";
		echo date('Y-m-d H:i:s'); */
		return $this->print_json(array('results' => $results, 'get_exposure_data', $get_exposure_data));
	}

	public function get_analysis__old($event_id = '')
	{

		$this->load->database();

		$this->load->library('users', $this);
		$this->load->model('common_model');

		if (!$this->users->require_power(2))
			return;

		$user_data = $this->users->data();

		$where_event = '';
		if ($user_data['power'] < 5 or $user_data['power'] == 7) {
			$where_event = 'AND (u.parentDL = ' . $user_data['Id'] . ' OR u.parentMDL = ' . $user_data['Id'] . ' OR u.parentSuperMDL = ' . $user_data['Id'] . ' OR u.parentKingAdmin = ' . $user_data['Id'] . ')';
		}

		$sql_event_id = "SELECT b.event_id FROM bet_details b LEFT JOIN user_master u ON u.Id = b.user_id WHERE b.bet_status = 1 $where_event GROUP BY b.event_id";
		$event_ids_data = $this->db->query($sql_event_id)->result_array();

		$event_ids = array_values(array_column($event_ids_data, 'event_id'));

		if (empty($event_ids)) {
			exit();
		}

		$event_ids_str = implode(',', $event_ids);

		$sql = '
                SELECT e.*
                FROM  event_market_id e 
                WHERE e.event_id IN (' . $event_ids_str . ')
                        AND e.event_id = ' . $event_id . '
                GROUP BY e.event_id, e.market_type, e.market_id
                ';

		$markets_data = $this->db->query($sql)->result();

		$where_bet = '';
		if ($user_data['power'] < 5 or $user_data['power'] == 7)
			$where_bet = ' AND (u.parentDL = ' . $user_data['Id'] . ' OR parentMDL = ' . $user_data['Id'] . ' OR parentSuperMDL = ' . $user_data['Id'] . ' OR parentKingAdmin = ' . $user_data['Id'] . ')';
		$sql_bet = '
                        SELECT 
                            SUM(b.bet_margin_used) as total_margin, 
                            SUM(b.bet_win_amount) as total_win, 
                            b.market_name, b.market_id, b.market_type, b.bet_type, b.event_name, 
                            b.user_id, u.parentDL, u.parentMDL, u.parentSuperMDL,u.parentKingAdmin,
                            COUNT(b.bet_id) as total_bet
                        FROM bet_details b
                            LEFT JOIN user_master u ON u.Id = b.user_id
                        WHERE b.event_id = ' . $event_id . ' 
                            AND b.bet_status = 1
							AND b.market_type != "FANCY_ODDS"
                             ' . $where_bet . '
                        GROUP BY u.Id, b.event_id ,b.market_type, b.market_id, b.bet_type
                        ';

		$bets_data = $this->db->query($sql_bet)->result_array();

		$market_pl = array();
		$market_pl1 = array();
		$event_name = $bets_data[0]['event_name'];
		if ($bets_data) {

			$market_pl_match = $this->get_market_exposure($markets_data, $bets_data, 'MATCH_ODDS', $user_data);
			$market_pl_book = $this->get_market_exposure($markets_data, $bets_data, 'BOOKMAKER_ODDS', $user_data);
			$market_pl_booksm1 = $this->get_market_exposure($markets_data, $bets_data, 'BOOKMAKERSMALL_ODDS', $user_data);

			$market_pl1 = array_merge($market_pl_match, $market_pl_book, $market_pl_booksm1);

			foreach ($bets_data as $bet_data) {

				if (in_array($bet_data['market_type'], array('MATCH_ODDS', 'BOOKMAKER_ODDS', 'BOOKMAKERSMALL_ODDS'))) {
					continue;
				}

				$my_partnership = $this->common_model->get_my_partnership($user_data, $bet_data);

				$pl = 0 - $bet_data['total_margin'];
				$my_pl = ($pl / 100) * $my_partnership;
				//  $my_pl = $pl;

				$market_pl[$bet_data['market_id']] = array('market_id' => $bet_data['market_id'], 'market_type' => $bet_data['market_type'], 'market_name' => $bet_data['market_name'], 'pl' => ROUND($my_pl, 2));
			}
		}

		$market_pl = array_merge($market_pl1, $market_pl);

		$total_bet = array_sum(array_column($bets_data, 'total_bet'));

		$results = array('event_name' => $event_name, 'event_id' => $event_id, 'market_pl' => array_values($market_pl), 'total_bet' => $total_bet);

		return $this->print_json(array('results' => $results));
	}

	public function get_userbook($event_id = '', $market_type = 'MATCH_ODDS', $tree_userid = 0)
	{


		$this->load->database();

		$this->load->library('users', $this);
		$this->load->model('common_model');

		if (!$this->users->require_power(2))
			return;

		$user_data = $this->users->data();

		$where_event = '';
		if ($user_data['power'] < 5 or $user_data['power'] == 7) {
			$where_event = 'AND (u.parentDL = ' . $user_data['Id'] . ' OR u.parentMDL = ' . $user_data['Id'] . ' OR u.parentSuperMDL = ' . $user_data['Id'] . ' OR u.parentKingAdmin = ' . $user_data['Id'] . ')';
		}
		$sql = '
                SELECT e.*
                FROM  event_market_id e 
                WHERE e.event_id IN (SELECT b.event_id FROM bet_details b LEFT JOIN user_master u ON u.Id = b.user_id WHERE b.bet_status = 1 AND event_id = ' . $event_id . ' AND market_type = "' . $market_type . '" ' . $where_event . ')
                    AND e.event_id = ' . $event_id . ' 
                    AND e.market_type = "' . $market_type . '" 
                GROUP BY e.event_id, e.market_type, e.market_id
                ';


		$markets_data = $this->db->query($sql)->result();

		$where_bet = '';

		/*
        $where_bet = ' AND u.parent_id = ' . $user_data['Id'];
        */


		/* $this->db->get('user_master')->result_array(); */

		if ($user_data['power'] < 5 or $user_data['power'] == 7) {
			$where_bet = ' AND (u.parent_id = ' . $user_data['Id'] . ' OR parentMDL = ' . $user_data['Id'] . ' OR parentSuperMDL = ' . $user_data['Id'] . ' OR parentKingAdmin = ' . $user_data['Id'] . ')';
		}



		$sql_bet = '
                        SELECT 
                            SUM(b.bet_margin_used) as total_margin, 
                            SUM(b.bet_win_amount) as total_win, 
                            b.market_name, b.market_id, b.market_type, b.bet_type, b.event_name, 
                            b.user_id, u.parent_id, u.parentDL, u.parentMDL, u.parentSuperMDL, u.parentKingAdmin, u.power, u.Email_ID, 
                            COUNT(b.bet_id) as total_bet
                        FROM bet_details b
                            LEFT JOIN user_master u ON u.Id = b.user_id
                        WHERE b.event_id = ' . $event_id . ' 
                            AND b.bet_status = 1 
                            AND b.market_type = "' . $market_type . '" 
                             ' . $where_bet . '
                        GROUP BY u.Id, b.event_id, b.market_type, b.market_id, b.bet_type
                        ';

		$bets_data = $this->db->query($sql_bet)->result_array();

		$market_pl = array();
		$event_name = @$bets_data[0]['event_name'];
		if ($bets_data) {
			$market_pl = $this->get_market_exposure_userwise($markets_data, $bets_data, $market_type, $user_data);
		}



		ksort($market_pl);

		$header = "";
		$extra_class = 'child_table';
		if ($tree_userid == 0) {
			$tree_userid = $user_data['Id'];
			$header = true;
			$extra_class = "";
		}

		$mainArr = array();
		$html = '<table class="table ' . $extra_class . '">';
		foreach ($market_pl as $m_id => $m_pl) {

			$temp_arr  = array_values($m_pl);

			if ($tree_userid != $temp_arr[0]['parent_id'])
				continue;


			$total_column = count($temp_arr) + 1;

			$td_with = (100 / $total_column);
			//if(!$header)
			//	$td_with = floor($td_with);

			if ($header) {
				$html .= '<tr class="header">';
				$html .= '<td width="' . $td_with . '%">Username</td>';
				foreach ($temp_arr as $value) {
					$html .= '<td width="' . $td_with . '%">' . $value['market_name'] . '</td>';
				}
				$html .= '</tr>';
				$header = false;
			}

			$user_id = $temp_arr[0]['user_id'];
			$power = $temp_arr[0]['power'];

			$down_level = '';
			if ($power > 1) {
				$down_level = 'onclick="get_down_level_book(' . $event_id . ',\'' . $market_type . '\',' . $user_id . ',this);"';
			}


			$html .= '<tr id="userbook_level' . $user_id . '">';
			$html .= '<td ' . $down_level . ' data-is_open="0" width="' . $td_with . '%">' . $temp_arr[0]['Email_Id'] . '</td>';
			foreach ($temp_arr as $value) {
				$html .= '<td width="' . $td_with . '%">' . $value['pl'] . '</td>';
			}

			$html .= '</tr>';
		}
		$html .= '</table>';

		//        echo $html;

		return $this->print_json(array('results' => $html));
	}

	public function get_market_exposure($all_markets = array(), $bets_data = array(), $market_type = 'MATCH_ODDS', $user_data = array(), $self_percentage_array = array())
	{
		$market_pl = array();
		foreach ($all_markets as $all_market) {
			if ($all_market->market_type != $market_type) {
				continue;
			}

			foreach ($bets_data as $bet_data) {
				if ($bet_data['market_type'] != $market_type) {
					continue;
				}

				/* $my_partnership = $this->common_model->get_my_partnership($user_data, $bet_data); */
				$bet_user_id = $bet_data['user_id'];
				$my_partnership = $self_percentage_array[$bet_user_id];

				$pl = 0;
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

				$my_pl = ($pl / 100) * $my_partnership;


				if (!isset($market_pl[$all_market->market_id])) {
					$market_pl[$all_market->market_id] = array('market_id' => $all_market->market_id, 'market_type' => $market_type, 'market_name' => $all_market->market_name, 'pl' => ROUND($my_pl, 2));
				} else {

					$market_pl[$all_market->market_id]['pl'] += ROUND($my_pl, 2);
				}
				$market_pl[$all_market->market_id]['pl'] = round($market_pl[$all_market->market_id]['pl'], 2);
			}
		}

		return $market_pl;
	}

	public function get_market_exposure_userwise($all_markets = array(), $bets_data = array(), $market_type = 'MATCH_ODDS', $user_data = array())
	{


		$user_data = $this->users->data();
		$user_id = $user_data['Id'];
		$market_pl = array();

		$smdl_market = array();
		$mdl_market = array();
		$dl_market = array();
		$u_market = array();


		$all_user_ids = array_column($bets_data, 'user_id');
		$all_user_ids = implode(",", $all_user_ids);

		if ($user_data['power'] == 5) {
			$get_all_fancy_active_user_list123 = $this->db->query("select * from   user_login_master as ulm  where 1=1 and ulm.UserID IN ($all_user_ids)   GROUP BY ulm.UserID")->result_array();
		} else {

			$get_all_fancy_active_user_list123 = $this->db->query("select * from   user_login_master as ulm where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id or ulm.parentKingAdmin=$user_id) and ulm.UserID IN ($all_user_ids)   GROUP BY ulm.UserID")->result_array();
		}

		$self_percentage_array = array();
		$partnerships_data = array();
		$all_user_id = array();
		$master_user_data = array();
		foreach ($get_all_fancy_active_user_list123 as $downline_user) {
			$bet_user_id = $downline_user['UserID'];
			$all_user_id[] = $bet_user_id;
			$betting_data = array();


			$parentDL = $downline_user['parentDL'];
			$parentMDL = $downline_user['parentMDL'];
			$parentSuperMDL = $downline_user['parentSuperMDL'];
			$parentKingAdmin = $downline_user['parentKingAdmin'];

			if (!isset($master_user_data[$parentDL])) {
				$res_dl_data = $this->db->query("select * from user_master where Id=$parentDL");
				$dl_data = $res_dl_data->row_array();
				if ($dl_data) {
					$master_user_data[$parentDL] = $dl_data['my_percentage'];
				}
			}

			if (!isset($master_user_data[$parentMDL])) {
				$res_mdl_data = $this->db->query("select * from user_master where Id=$parentMDL");
				$mdl_data = $res_mdl_data->row_array();
				if ($mdl_data) {
					$master_user_data[$parentMDL] = $mdl_data['my_percentage'];
				}
			}

			if (!isset($master_user_data[$parentSuperMDL])) {
				$res_smdl_data = $this->db->query("select * from user_master where Id=$parentSuperMDL");
				$smdl_data = $res_smdl_data->row_array();
				if ($smdl_data) {
					$master_user_data[$parentSuperMDL] = $smdl_data['my_percentage'];
				}
			}

			if (!isset($master_user_data[$parentKingAdmin])) {
				$res_king_data = $this->db->query("select * from user_master where Id=$parentKingAdmin");
				$king_data = $res_king_data->row_array();
				if ($king_data) {
					$master_user_data[$parentKingAdmin] = $king_data['my_percentage'];
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


			$self_percentage = $this->common_model->get_my_partnership_all_user($user_data, $percentage_parentDL, $percentage_parentMDL, $percentage_parentSuperMDL, $percentage_parentKingAdmin, $betting_data, 'all');

			if (!isset($master_user_data[$parentDL])) {
				$partnerships_data[$bet_user_id][$parentDL]['per'] = $self_percentage[$parentDL];
				$partnerships_data[$bet_user_id][$parentDL]['power'] = $dl_data['power'];
				$partnerships_data[$bet_user_id][$parentDL]['Email_ID'] = $dl_data['Email_ID'];
				$partnerships_data[$bet_user_id][$parentDL]['parent_id'] = $dl_data['parent_id'];
			}

			if (!isset($master_user_data[$parentMDL])) {
				$partnerships_data[$bet_user_id][$parentMDL]['per'] = $self_percentage[$parentMDL];
				$partnerships_data[$bet_user_id][$parentMDL]['power'] = $mdl_data['power'];
				$partnerships_data[$bet_user_id][$parentMDL]['Email_ID'] = $mdl_data['Email_ID'];
				$partnerships_data[$bet_user_id][$parentMDL]['parent_id'] = $mdl_data['parent_id'];
			}

			if (!isset($master_user_data[$parentSuperMDL])) {
				$partnerships_data[$bet_user_id][$parentSuperMDL]['per'] = $self_percentage[$parentSuperMDL];
				$partnerships_data[$bet_user_id][$parentSuperMDL]['power'] = $smdl_data['power'];
				$partnerships_data[$bet_user_id][$parentSuperMDL]['Email_ID'] = $smdl_data['Email_ID'];
				$partnerships_data[$bet_user_id][$parentSuperMDL]['parent_id'] = $smdl_data['parent_id'];
			}

			if (!isset($master_user_data[$parentKingAdmin])) {
				$partnerships_data[$bet_user_id][$parentKingAdmin]['per'] = $self_percentage[$parentKingAdmin];
				$partnerships_data[$bet_user_id][$parentKingAdmin]['power'] = $king_data['power'];
				$partnerships_data[$bet_user_id][$parentKingAdmin]['Email_ID'] = $king_data['Email_ID'];
				$partnerships_data[$bet_user_id][$parentKingAdmin]['parent_id'] = $king_data['parent_id'];
			}


			$partnerships_data[$bet_user_id][CONTROLLER_ID]['per'] = $self_percentage[CONTROLLER_ID];
			$partnerships_data[$bet_user_id][CONTROLLER_ID]['power'] = 5;
			$partnerships_data[$bet_user_id][CONTROLLER_ID]['Email_ID'] = "11Starexch";
			$partnerships_data[$bet_user_id][CONTROLLER_ID]['parent_id'] = 0;
		}
		/* if($user_id == 2 or $user_id == 3){
			echo "<pre>";
			print_r($partnerships_data);
			echo "</pre>";
		} */


		foreach ($all_markets as $all_market) {

			if ($all_market->market_type != $market_type) {
				continue;
			}

			foreach ($bets_data as $bet_data) {

				if ($bet_data['market_type'] != $market_type) {
					continue;
				}

				/*  Master Profit   */
				$pl = 0;
				$client_pl = 0;
				if ($all_market->market_id == $bet_data['market_id']) {

					if ($bet_data['bet_type'] == 'Back') {
						$pl -= $bet_data['total_win'];
						$client_pl += $bet_data['total_win'];
					} else {
						$pl += $bet_data['total_margin'];
						$client_pl -= $bet_data['total_margin'];
					}
				} else {
					if ($bet_data['bet_type'] == 'Lay') {
						$pl -= $bet_data['total_win'];
						$client_pl += $bet_data['total_win'];
					} else {
						$pl += $bet_data['total_margin'];
						$client_pl -= $bet_data['total_margin'];
					}
				}

				/* bookmaker fast book*/
				/*   */
				$partnerships_data = $this->common_model->get_partnership_with_power($user_data, $bet_data, 'all');
				/* $partnerships_data = $partnerships_data[$bet_data['user_id']]; */
				/*  if($user_id == 2 or $user_id == 3){
					echo "<pre>";
					print_r($partnerships_data);
					echo "</pre>";
				} */

				//                $my_partnership = $partnership_arr[$bet_data['Id']];

				foreach ($partnerships_data as $p_id => $partnership_data) {

					$partnership = $partnership_data['per'];
					$power = $partnership_data['power'];
					$Email_ID = $partnership_data['Email_ID'];

					$parent_id = $partnership_data['parent_id'];

					if ($power >= $user_data['power'] and $power != 7)
						continue;

					//                    var_dump($p_id .'=>'. $partnership);
					$my_pl = ($pl / 100) * $partnership;

					if (!isset($market_pl[$p_id][$all_market->market_id])) {
						$market_pl[$p_id][$all_market->market_id] = array('market_id' => $all_market->market_id, 'market_type' => $market_type, 'market_name' => $all_market->market_name, 'pl' => ROUND($my_pl, 2), 'user_id' => $p_id, 'Email_Id' => $Email_ID, 'parent_id' => $parent_id, 'power' => $power);
					} else {
						$market_pl[$p_id][$all_market->market_id]['pl'] += ROUND($my_pl, 2);
					}
				}


				/*  End of Master Profit   */


				/*  Start Client profit   */

				$user_id = $bet_data['user_id'];
				$parent_id = $bet_data['parent_id'];
				$Email_Id = $bet_data['Email_ID'];
				$power = $bet_data['power'];

				if (!isset($market_pl[$user_id][$all_market->market_id])) {
					$market_pl[$user_id][$all_market->market_id] = array('market_id' => $all_market->market_id, 'market_type' => $market_type, 'market_name' => $all_market->market_name, 'pl' => ROUND($client_pl, 2), 'user_id' => $user_id, 'Email_Id' => $Email_Id, 'parent_id' => $parent_id, 'power' => $power);
				} else {
					$market_pl[$user_id][$all_market->market_id]['pl'] += ROUND($client_pl, 2);
				}

				/*  End Client profit   */
			}
		}

		return $market_pl;
	}




	public function fancy_bet_book_master($event_id, $market_id)
	{


		$this->load->database();

		$this->load->library('users', $this);
		$this->load->model('common_model');

		if (!$this->users->require_power(2))
			return;

		$user_data = $this->users->data();

		$where_event = '';
		if ($user_data['power'] < 5) {
			$where_event = 'AND (u.parentDL = ' . $user_data['Id'] . ' OR u.parentMDL = ' . $user_data['Id'] . ' OR u.parentSuperMDL = ' . $user_data['Id'] . ' OR u.parentKingAdmin = ' . $user_data['Id'] . ')';
		}


		$sql_client_users = "SELECT Id FROM user_master u WHERE 1=1 $where_event";

		$sql_client_users_data = $this->db->query($sql_client_users)->result_array();

		$client_users_ids_arr = array_values(array_column($sql_client_users_data, 'Id'));

		$client_users_ids = implode(',', $client_users_ids_arr);
		$book_list = array();
		$percentage_data_user = array();
		if (!empty($client_users_ids_arr)) {

			$master_bets_data = $this->db->query("SELECT event_id,market_id,market_type, MIN(bet_runs) as min_run,MAX(bet_runs) as max_run,MAX(bet_runs2) as max_run2 FROM bet_details where event_id = '$event_id' and market_id=$market_id AND market_type='FANCY_ODDS' AND user_id IN ($client_users_ids) GROUP BY market_id")->result_array();

			$master_fancy_book = array();
			foreach ($master_bets_data as $master_bet_data) {

				$event_id = $master_bet_data['event_id'];
				$market_id = $master_bet_data['market_id'];
				$market_type = $master_bet_data['market_type'];

				$min_max_data = array(
					'min_run' => $master_bet_data['min_run'],
					'max_run' => $master_bet_data['max_run'],
					'max_run2' => $master_bet_data['max_run2'],
				);

				if ($event_id && $market_id && $market_type) {

					$bets_data = $this->db->query("SELECT bet_id,market_id,event_name,bet_type,bet_runs,bet_runs2,bet_margin_used,bet_win_amount,user_id FROM bet_details where event_id = '$event_id' AND market_id=$market_id AND market_type='$market_type' AND user_id IN ($client_users_ids)")->result_array();

					$run_position_arr = array();

					if ($market_type == 'KHADO_ODDS') {
						$min_run = ($min_max_data['min_run'] > 1) ? ($min_max_data['min_run'] - 1) : $min_max_data['min_run'];
						$max_run = ($min_max_data['max_run2'] + 1);

						for ($i = $min_run; $i <= $max_run; $i++) {

							$cur_run = $i;

							foreach ($bets_data as $bet_data) {
								$bet_type			= strtolower($bet_data['bet_type']);
								$bet_runs			= intval($bet_data['bet_runs']);
								$bet_runs2			= intval($bet_data['bet_runs2']);
								$bet_margin_used	= 0 - floatval($bet_data['bet_margin_used']);
								$bet_win_amount 	= floatval($bet_data['bet_win_amount']);

								if (isset($percentage_data_user[$bet_user_id])) {
									$self_percentage = $percentage_data_user[$bet_user_id];
								} else {
									$betting_data = array();
									$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

									$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
									$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
									$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
									$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];
									$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

									$percentage_data_user[$bet_user_id] = $self_percentage;
								}

								if ($bet_type == 'back')
									$bet_type = 'yes';
								else if ($bet_type == 'lay')
									$bet_type = 'no';

								if ($bet_type == 'yes') {

									if (!isset($run_position_arr[$cur_run]))
										$run_position_arr[$cur_run] = 0;

									$amount = 0;

									if ($cur_run >= $bet_runs && ($bet_runs2 + 1) > $cur_run) {
										$amount = $bet_win_amount;
									} else {
										$amount = $bet_margin_used;
									}

									$amount  = ($amount * $self_percentage) / 100;
									$run_position_arr[$cur_run] += $amount;
								}
							}
						}
					} else {

						$min_run = ($min_max_data['min_run'] > 1) ? ($min_max_data['min_run'] - 1) : $min_max_data['min_run'];
						$max_run = ($min_max_data['max_run'] + 1);

						for ($i = $min_run; $i <= $max_run; $i++) {

							$cur_run = $i;

							foreach ($bets_data as $bet_data) {
								$bet_type			= strtolower($bet_data['bet_type']);
								$bet_runs			= intval($bet_data['bet_runs']);
								$bet_margin_used	= 0 - floatval($bet_data['bet_margin_used']);
								$bet_win_amount 	= floatval($bet_data['bet_win_amount']);
								$bet_user_id 	= $bet_data['user_id'];

								if (isset($percentage_data_user[$bet_user_id])) {
									$self_percentage = $percentage_data_user[$bet_user_id];
								} else {
									$betting_data = array();
									$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

									$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
									$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
									$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
									$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];
									$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

									$percentage_data_user[$bet_user_id] = $self_percentage;
								}



								if ($bet_type == 'back')
									$bet_type = 'yes';
								else if ($bet_type == 'lay')
									$bet_type = 'no';

								if (!isset($run_position_arr[$cur_run]))
									$run_position_arr[$cur_run] = 0;

								$amount = 0;

								if ($bet_type == 'yes') {

									if ($cur_run >= $bet_runs) {
										$amount = $bet_win_amount;
									} else {
										$amount = $bet_margin_used;
									}
								} else {

									if ($cur_run < $bet_runs) {
										$amount = $bet_win_amount;
									} else {
										$amount = $bet_margin_used;
									}
								}

								$amount  = ($amount * $self_percentage) / 100;
								$run_position_arr[$cur_run] += $amount;
							}
						}
					}


					$result_array = array();

					$loop = 0;
					$count = count($run_position_arr);
					foreach ($run_position_arr as $run => $amount) {
						$amount = $amount * (-1);
						$result_array[] = $amount;

						$first_label = "";
						$last_label = "";
						if ($loop == 0) {
							$first_label = "0-";
						}
						if (($loop + 1) == $count) {
							$last_label = "+";
						}
						$book_details = array(
							"runs" => $first_label . $run . $last_label,
							"exposure" => $amount,
						);

						$book_list[] = $book_details;
						$loop++;
					}

					$master_fancy_book[$market_id] = $result_array;
				}
			}
		}





		$return = array(
			"status" => "ok",
			"data" => $book_list,
		);
		echo json_encode($return);
	}
	public function fancy_bet_book_master_old_flip_slow($event_id, $market_id)
	{


		$this->load->database();
		$this->load->library('users');
		$this->load->model('common_model');
		$user_data = $this->users->data();

		$user_type = $user_data['power'];
		$login_user_type = $user_type;
		$user_id = $user_data['Id'];
		$login_user_id = $user_id;

		if ($user_type == 5) {
			$get_all_fancy_stake = $this->db->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS'")->result_array();
		} else {
			$get_all_fancy_stake = $this->db->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS'")->result_array();
		}

		$stack_rate_array = array();
		foreach ($get_all_fancy_stake as $fetch_get_all_fancy_stake) {
			$stack_rate_array[] = $fetch_get_all_fancy_stake['bet_runs'];
		}
		$stack_rate_unique_array =  array_unique($stack_rate_array);
		sort($stack_rate_unique_array);

		$last_run_value = 0;


		$book_list = array();
		if ($stack_rate_unique_array != null) {
			$min_run = $stack_rate_unique_array[0];
			$max_run = max($stack_rate_unique_array);
			$i = 0;
			$first_label = $min_run - 1;

			$echo_first_label_runs = "0 - " . $first_label;

			if ($user_type == 5) {
				$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='Yes'")->result_array();
			} else {
				$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id)  and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='Yes'")->result_array();
			}

			$total_win_yes_amount_user = 0;
			foreach ($get_lower_yes_total as $fetch_get_lower_yes_total) {
				$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
				$bet_user_id = $fetch_get_lower_yes_total['user_id'];


				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');


				$total_self_win_amount_yes =  ($win_amount_yes * $self_percentage) / 100;
				$total_win_yes_amount_user = $total_win_yes_amount_user + $total_self_win_amount_yes;
			}



			if ($user_type == 5) {
				$get_lower_no_total = $this->db->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
			} else {
				$get_lower_no_total = $this->db->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
			}


			$total_win_no_amount_user = 0;
			foreach ($get_lower_no_total as $fetch_get_lower_no_total) {

				$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

				$bet_user_id = $fetch_get_lower_no_total['user_id'];


				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

				$total_self_win_amount_no =  ($win_amount_no * $self_percentage) / 100;
				$total_win_no_amount_user = $total_win_no_amount_user + $total_self_win_amount_no;
			}





			if ($user_type == 5) {
				$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
			} else {
				$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id)  and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
			}

			$total_loss_amount_yes_user = 0;
			foreach ($get_higher_yes_total as $fetch_get_higher_yes_total) {
				$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];
				$bet_user_id = $fetch_get_higher_yes_total['user_id'];


				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];



				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

				$total_self_loss_amount_yes =  ($loss_amount_yes * $self_percentage) / 100;

				$total_loss_amount_yes_user = $total_loss_amount_yes_user + $total_self_loss_amount_yes;
			}





			if ($user_type == 5) {
				$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='No'")->result_array();
			} else {
				$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='No'")->result_array();
			}

			$total_loss_amount_no_user = 0;
			foreach ($get_higher_no_total as $fetch_get_higher_no_total) {
				$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

				$bet_user_id = $fetch_get_higher_no_total['user_id'];


				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();



				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

				$total_self_loss_amount_no =  ($loss_amount_no * $self_percentage) / 100;

				$total_loss_amount_no_user = $total_loss_amount_no_user + $total_self_loss_amount_no;
			}







			$total_win = $total_win_yes_amount_user + $total_win_no_amount_user;



			$total_loss = $total_loss_amount_yes_user + $total_loss_amount_no_user;



			$exposure = $total_win - $total_loss;



			$exposure =  $exposure * (-1);

			$book_details = array(
				"runs" => $echo_first_label_runs,
				"exposure" => $exposure,
			);

			$book_list[] = $book_details;

			foreach ($stack_rate_unique_array as $runs) {



				if ($runs != $max_run) {



					$next_value  = $stack_rate_unique_array[$i + 1];



					$new_value = $next_value - 1;



					if ($runs == $new_value) {



						$new_run_title = "$runs";



						//$new_value = $runs;



					} else {



						$new_run_title = "$runs - $new_value";
					}



					$first_label = $new_value;


					if ($user_type == 5) {
						$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'")->result_array();
					} else {
						$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'")->result_array();
					}



					$total_win_yes_amount_user = 0;
					foreach ($get_lower_yes_total as $fetch_get_lower_yes_total) {
						$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
						$bet_user_id = $fetch_get_lower_yes_total['user_id'];


						$betting_data = array();
						$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();


						$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
						$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
						$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
						$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

						$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

						$total_self_win_amount_yes =  ($win_amount_yes * $self_percentage) / 100;
						$total_win_yes_amount_user = $total_win_yes_amount_user + $total_self_win_amount_yes;
					}


					if ($user_type == 5) {
						$get_lower_no_total = $this->db->query("select bet_win_amount as win_amount_no,user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
					} else {
						$get_lower_no_total = $this->db->query("select bet_win_amount as win_amount_no,user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
					}



					$total_win_no_amount_user = 0;
					foreach ($get_lower_no_total as $fetch_get_lower_no_total) {

						$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

						$bet_user_id = $fetch_get_lower_no_total['user_id'];


						$betting_data = array();
						$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

						$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
						$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
						$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
						$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

						$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

						$total_self_win_amount_no =  ($win_amount_no * $self_percentage) / 100;
						$total_win_no_amount_user = $total_win_no_amount_user + $total_self_win_amount_no;
					}


					if ($user_type == 5) {
						$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where  b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
					} else {
						$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
					}



					$total_loss_amount_yes_user = 0;
					foreach ($get_higher_yes_total as $fetch_get_higher_yes_total) {
						$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];
						$bet_user_id = $fetch_get_higher_yes_total['user_id'];


						$betting_data = array();
						$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

						$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
						$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
						$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
						$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

						$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

						$total_self_loss_amount_yes =  ($loss_amount_yes * $self_percentage) / 100;

						$total_loss_amount_yes_user = $total_loss_amount_yes_user + $total_self_loss_amount_yes;
					}


					if ($user_type == 5) {
						$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where  b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'")->result_array();
					} else {
						$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'")->result_array();
					}



					$total_loss_amount_no_user = 0;
					foreach ($get_higher_no_total as $fetch_get_higher_no_total) {
						$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

						$bet_user_id = $fetch_get_higher_no_total['user_id'];


						$betting_data = array();
						$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

						$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
						$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
						$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
						$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

						$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

						$total_self_loss_amount_no =  ($loss_amount_no * $self_percentage) / 100;

						$total_loss_amount_no_user = $total_loss_amount_no_user + $total_self_loss_amount_no;
					}



					$total_win = $total_win_yes_amount_user + $total_win_no_amount_user;



					$total_loss = $total_loss_amount_yes_user + $total_loss_amount_no_user;



					$exposure = $total_win - $total_loss;
					$exposure = $exposure * (-1);
					$book_details = array(
						"runs" => $new_run_title,
						"exposure" => $exposure,
					);

					$book_list[] = $book_details;
					$i++;
				}
			}

			$first_label = $max_run;
			$echo_first_label_runs =  $first_label . " + ";

			$search = $first_label - 1;


			if ($user_type == 5) {
				$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'")->result_array();
			} else {
				$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'")->result_array();
			}




			$total_win_yes_amount_user = 0;
			foreach ($get_lower_yes_total as $fetch_get_lower_yes_total) {
				$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
				$bet_user_id = $fetch_get_lower_yes_total['user_id'];


				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

				$total_self_win_amount_yes =  ($win_amount_yes * $self_percentage) / 100;
				$total_win_yes_amount_user = $total_win_yes_amount_user + $total_self_win_amount_yes;
			}


			if ($user_type == 5) {
				$get_lower_no_total = $this->db->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
			} else {
				$get_lower_no_total = $this->db->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
			}



			$total_win_no_amount_user = 0;
			foreach ($get_lower_no_total as $fetch_get_lower_no_total) {

				$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

				$bet_user_id = $fetch_get_lower_no_total['user_id'];

				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

				$total_self_win_amount_no =  ($win_amount_no * $self_percentage) / 100;
				$total_win_no_amount_user = $total_win_no_amount_user + $total_self_win_amount_no;
			}


			if ($user_type == 5) {
				$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
			} else {
				$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
			}




			$total_loss_amount_yes_user = 0;
			foreach ($get_higher_yes_total as $fetch_get_higher_yes_total) {
				$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];
				$bet_user_id = $fetch_get_higher_yes_total['user_id'];


				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

				$total_self_loss_amount_yes =  ($loss_amount_yes * $self_percentage) / 100;

				$total_loss_amount_yes_user = $total_loss_amount_yes_user + $total_self_loss_amount_yes;
			}


			if ($user_type == 5) {
				$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'")->result_array();
			} else {
				$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'")->result_array();
			}




			$total_loss_amount_no_user = 0;
			foreach ($get_higher_no_total as $fetch_get_higher_no_total) {
				$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

				$bet_user_id = $fetch_get_higher_no_total['user_id'];


				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

				$total_self_loss_amount_no =  ($loss_amount_no * $self_percentage) / 100;

				$total_loss_amount_no_user = $total_loss_amount_no_user + $total_self_loss_amount_no;
			}



			$total_win = $total_win_yes_amount_user + $total_win_no_amount_user;



			$total_loss = $total_loss_amount_yes_user + $total_loss_amount_no_user;



			$exposure = $total_win - $total_loss;



			$exposure = $exposure * (-1);

			$book_details = array(
				"runs" => $echo_first_label_runs,
				"exposure" => $exposure,
			);

			$book_list[] = $book_details;
		}


		$return = array(
			"status" => "ok",
			"data" => $book_list,
		);
		echo json_encode($return);
	}

	public function fancy_bet_book_master_master($event_id, $market_id, $self_percentage_array)
	{


		$this->load->database();
		$this->load->library('users');
		$this->load->model('common_model');
		$user_data = $this->users->data();


		$user_type = $user_data['power'];
		$login_user_type = $user_type;
		$user_id = $user_data['Id'];
		$login_user_id = $user_id;

		if ($user_type == 5) {
			$get_all_fancy_stake = $this->db->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS'")->result_array();
		} else {
			$get_all_fancy_stake = $this->db->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS'")->result_array();
		}

		$stack_rate_array = array();
		foreach ($get_all_fancy_stake as $fetch_get_all_fancy_stake) {
			$stack_rate_array[] = $fetch_get_all_fancy_stake['bet_runs'];
		}
		$stack_rate_unique_array =  array_unique($stack_rate_array);
		sort($stack_rate_unique_array);

		$last_run_value = 0;


		$book_list = array();
		if ($stack_rate_unique_array != null) {
			$min_run = $stack_rate_unique_array[0];
			$max_run = max($stack_rate_unique_array);
			$i = 0;
			$first_label = $min_run - 1;

			$echo_first_label_runs = "0 - " . $first_label;

			if ($user_type == 5) {
				$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='Yes'")->result_array();
			} else {
				$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id)  and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='Yes'")->result_array();
			}

			$total_win_yes_amount_user = 0;
			foreach ($get_lower_yes_total as $fetch_get_lower_yes_total) {
				$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
				$bet_user_id = $fetch_get_lower_yes_total['user_id'];

				$self_percentage = $self_percentage_array[$bet_user_id];


				$total_self_win_amount_yes =  ($win_amount_yes * $self_percentage) / 100;
				$total_win_yes_amount_user = $total_win_yes_amount_user + $total_self_win_amount_yes;
			}



			if ($user_type == 5) {
				$get_lower_no_total = $this->db->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
			} else {
				$get_lower_no_total = $this->db->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
			}


			$total_win_no_amount_user = 0;
			foreach ($get_lower_no_total as $fetch_get_lower_no_total) {

				$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

				$bet_user_id = $fetch_get_lower_no_total['user_id'];

				$self_percentage = $self_percentage_array[$bet_user_id];

				$total_self_win_amount_no =  ($win_amount_no * $self_percentage) / 100;
				$total_win_no_amount_user = $total_win_no_amount_user + $total_self_win_amount_no;
			}





			if ($user_type == 5) {
				$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
			} else {
				$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id)  and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
			}

			$total_loss_amount_yes_user = 0;
			foreach ($get_higher_yes_total as $fetch_get_higher_yes_total) {
				$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];
				$bet_user_id = $fetch_get_higher_yes_total['user_id'];

				$self_percentage = $self_percentage_array[$bet_user_id];

				$total_self_loss_amount_yes =  ($loss_amount_yes * $self_percentage) / 100;

				$total_loss_amount_yes_user = $total_loss_amount_yes_user + $total_self_loss_amount_yes;
			}





			if ($user_type == 5) {
				$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='No'")->result_array();
			} else {
				$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='No'")->result_array();
			}

			$total_loss_amount_no_user = 0;
			foreach ($get_higher_no_total as $fetch_get_higher_no_total) {
				$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

				$bet_user_id = $fetch_get_higher_no_total['user_id'];

				$self_percentage = $self_percentage_array[$bet_user_id];

				$total_self_loss_amount_no =  ($loss_amount_no * $self_percentage) / 100;

				$total_loss_amount_no_user = $total_loss_amount_no_user + $total_self_loss_amount_no;
			}







			$total_win = $total_win_yes_amount_user + $total_win_no_amount_user;



			$total_loss = $total_loss_amount_yes_user + $total_loss_amount_no_user;



			$exposure = $total_win - $total_loss;



			$exposure =  $exposure * (-1);

			$book_details = array(
				"runs" => $echo_first_label_runs,
				"exposure" => $exposure,
			);

			$book_list[] = $book_details;

			foreach ($stack_rate_unique_array as $runs) {



				if ($runs != $max_run) {



					$next_value  = $stack_rate_unique_array[$i + 1];



					$new_value = $next_value - 1;



					if ($runs == $new_value) {



						$new_run_title = "$runs";



						//$new_value = $runs;



					} else {



						$new_run_title = "$runs - $new_value";
					}



					$first_label = $new_value;


					if ($user_type == 5) {
						$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'")->result_array();
					} else {
						$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'")->result_array();
					}



					$total_win_yes_amount_user = 0;
					foreach ($get_lower_yes_total as $fetch_get_lower_yes_total) {
						$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
						$bet_user_id = $fetch_get_lower_yes_total['user_id'];


						$self_percentage = $self_percentage_array[$bet_user_id];

						$total_self_win_amount_yes =  ($win_amount_yes * $self_percentage) / 100;
						$total_win_yes_amount_user = $total_win_yes_amount_user + $total_self_win_amount_yes;
					}


					if ($user_type == 5) {
						$get_lower_no_total = $this->db->query("select bet_win_amount as win_amount_no,user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
					} else {
						$get_lower_no_total = $this->db->query("select bet_win_amount as win_amount_no,user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
					}



					$total_win_no_amount_user = 0;
					foreach ($get_lower_no_total as $fetch_get_lower_no_total) {

						$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

						$bet_user_id = $fetch_get_lower_no_total['user_id'];


						$self_percentage = $self_percentage_array[$bet_user_id];

						$total_self_win_amount_no =  ($win_amount_no * $self_percentage) / 100;
						$total_win_no_amount_user = $total_win_no_amount_user + $total_self_win_amount_no;
					}


					if ($user_type == 5) {
						$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where  b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
					} else {
						$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
					}



					$total_loss_amount_yes_user = 0;
					foreach ($get_higher_yes_total as $fetch_get_higher_yes_total) {
						$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];
						$bet_user_id = $fetch_get_higher_yes_total['user_id'];


						$self_percentage = $self_percentage_array[$bet_user_id];

						$total_self_loss_amount_yes =  ($loss_amount_yes * $self_percentage) / 100;

						$total_loss_amount_yes_user = $total_loss_amount_yes_user + $total_self_loss_amount_yes;
					}


					if ($user_type == 5) {
						$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where  b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'")->result_array();
					} else {
						$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'")->result_array();
					}



					$total_loss_amount_no_user = 0;
					foreach ($get_higher_no_total as $fetch_get_higher_no_total) {
						$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

						$bet_user_id = $fetch_get_higher_no_total['user_id'];


						$self_percentage = $self_percentage_array[$bet_user_id];

						$total_self_loss_amount_no =  ($loss_amount_no * $self_percentage) / 100;

						$total_loss_amount_no_user = $total_loss_amount_no_user + $total_self_loss_amount_no;
					}



					$total_win = $total_win_yes_amount_user + $total_win_no_amount_user;



					$total_loss = $total_loss_amount_yes_user + $total_loss_amount_no_user;



					$exposure = $total_win - $total_loss;
					$exposure = $exposure * (-1);
					$book_details = array(
						"runs" => $new_run_title,
						"exposure" => $exposure,
					);

					$book_list[] = $book_details;
					$i++;
				}
			}

			$first_label = $max_run;
			$echo_first_label_runs =  $first_label . " + ";

			$search = $first_label - 1;


			if ($user_type == 5) {
				$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'")->result_array();
			} else {
				$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'")->result_array();
			}




			$total_win_yes_amount_user = 0;
			foreach ($get_lower_yes_total as $fetch_get_lower_yes_total) {
				$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
				$bet_user_id = $fetch_get_lower_yes_total['user_id'];


				$self_percentage = $self_percentage_array[$bet_user_id];

				$total_self_win_amount_yes =  ($win_amount_yes * $self_percentage) / 100;
				$total_win_yes_amount_user = $total_win_yes_amount_user + $total_self_win_amount_yes;
			}


			if ($user_type == 5) {
				$get_lower_no_total = $this->db->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
			} else {
				$get_lower_no_total = $this->db->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
			}



			$total_win_no_amount_user = 0;
			foreach ($get_lower_no_total as $fetch_get_lower_no_total) {

				$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

				$bet_user_id = $fetch_get_lower_no_total['user_id'];

				$self_percentage = $self_percentage_array[$bet_user_id];

				$total_self_win_amount_no =  ($win_amount_no * $self_percentage) / 100;
				$total_win_no_amount_user = $total_win_no_amount_user + $total_self_win_amount_no;
			}


			if ($user_type == 5) {
				$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
			} else {
				$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
			}




			$total_loss_amount_yes_user = 0;
			foreach ($get_higher_yes_total as $fetch_get_higher_yes_total) {
				$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];
				$bet_user_id = $fetch_get_higher_yes_total['user_id'];


				$self_percentage = $self_percentage_array[$bet_user_id];

				$total_self_loss_amount_yes =  ($loss_amount_yes * $self_percentage) / 100;

				$total_loss_amount_yes_user = $total_loss_amount_yes_user + $total_self_loss_amount_yes;
			}


			if ($user_type == 5) {
				$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'")->result_array();
			} else {
				$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'")->result_array();
			}




			$total_loss_amount_no_user = 0;
			foreach ($get_higher_no_total as $fetch_get_higher_no_total) {
				$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

				$bet_user_id = $fetch_get_higher_no_total['user_id'];


				$self_percentage = $self_percentage_array[$bet_user_id];

				$total_self_loss_amount_no =  ($loss_amount_no * $self_percentage) / 100;

				$total_loss_amount_no_user = $total_loss_amount_no_user + $total_self_loss_amount_no;
			}



			$total_win = $total_win_yes_amount_user + $total_win_no_amount_user;



			$total_loss = $total_loss_amount_yes_user + $total_loss_amount_no_user;



			$exposure = $total_win - $total_loss;



			$exposure = $exposure * (-1);

			$book_details = array(
				"runs" => $echo_first_label_runs,
				"exposure" => $exposure,
			);

			$book_list[] = $book_details;
		}


		$return = array(
			"status" => "ok",
			"data" => $book_list,
		);
		return $return;
	}

	public function fancy_bet_book_master_master_oollld($event_id, $market_id, $self_percentage_array)
	{


		$this->load->database();
		$this->load->library('users');
		$this->load->model('common_model');
		$user_data = $this->users->data();

		$user_type = $user_data['power'];
		$login_user_type = $user_type;
		$user_id = $user_data['Id'];
		$login_user_id = $user_id;

		if ($user_type == 5) {
			$get_all_fancy_stake = $this->db->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS'")->result_array();
		} else {
			$get_all_fancy_stake = $this->db->query("select * from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS'")->result_array();
		}

		$stack_rate_array = array();
		foreach ($get_all_fancy_stake as $fetch_get_all_fancy_stake) {
			$stack_rate_array[] = $fetch_get_all_fancy_stake['bet_runs'];
		}
		$stack_rate_unique_array =  array_unique($stack_rate_array);
		sort($stack_rate_unique_array);

		$last_run_value = 0;


		$book_list = array();
		if ($stack_rate_unique_array != null) {
			$min_run = $stack_rate_unique_array[0];
			$max_run = max($stack_rate_unique_array);
			$i = 0;
			$first_label = $min_run - 1;

			$echo_first_label_runs = "0 - " . $first_label;

			if ($user_type == 5) {
				$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='Yes'")->result_array();
			} else {
				$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id)  and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='Yes'")->result_array();
			}

			$total_win_yes_amount_user = 0;
			foreach ($get_lower_yes_total as $fetch_get_lower_yes_total) {
				$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
				$bet_user_id = $fetch_get_lower_yes_total['user_id'];


				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');


				$total_self_win_amount_yes =  ($win_amount_yes * $self_percentage) / 100;
				$total_win_yes_amount_user = $total_win_yes_amount_user + $total_self_win_amount_yes;
			}



			if ($user_type == 5) {
				$get_lower_no_total = $this->db->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
			} else {
				$get_lower_no_total = $this->db->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
			}


			$total_win_no_amount_user = 0;
			foreach ($get_lower_no_total as $fetch_get_lower_no_total) {

				$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

				$bet_user_id = $fetch_get_lower_no_total['user_id'];


				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

				$total_self_win_amount_no =  ($win_amount_no * $self_percentage) / 100;
				$total_win_no_amount_user = $total_win_no_amount_user + $total_self_win_amount_no;
			}





			if ($user_type == 5) {
				$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
			} else {
				$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id)  and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
			}

			$total_loss_amount_yes_user = 0;
			foreach ($get_higher_yes_total as $fetch_get_higher_yes_total) {
				$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];
				$bet_user_id = $fetch_get_higher_yes_total['user_id'];


				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];



				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

				$total_self_loss_amount_yes =  ($loss_amount_yes * $self_percentage) / 100;

				$total_loss_amount_yes_user = $total_loss_amount_yes_user + $total_self_loss_amount_yes;
			}





			if ($user_type == 5) {
				$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='No'")->result_array();
			} else {
				$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs < $first_label and b.bet_type='No'")->result_array();
			}

			$total_loss_amount_no_user = 0;
			foreach ($get_higher_no_total as $fetch_get_higher_no_total) {
				$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

				$bet_user_id = $fetch_get_higher_no_total['user_id'];


				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();



				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

				$total_self_loss_amount_no =  ($loss_amount_no * $self_percentage) / 100;

				$total_loss_amount_no_user = $total_loss_amount_no_user + $total_self_loss_amount_no;
			}







			$total_win = $total_win_yes_amount_user + $total_win_no_amount_user;



			$total_loss = $total_loss_amount_yes_user + $total_loss_amount_no_user;



			$exposure = $total_win - $total_loss;



			$exposure =  $exposure * (-1);

			$book_details = array(
				"runs" => $echo_first_label_runs,
				"exposure" => $exposure,
			);

			$book_list[] = $book_details;

			foreach ($stack_rate_unique_array as $runs) {



				if ($runs != $max_run) {



					$next_value  = $stack_rate_unique_array[$i + 1];



					$new_value = $next_value - 1;



					if ($runs == $new_value) {



						$new_run_title = "$runs";



						//$new_value = $runs;



					} else {



						$new_run_title = "$runs - $new_value";
					}



					$first_label = $new_value;


					if ($user_type == 5) {
						$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'")->result_array();
					} else {
						$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'")->result_array();
					}



					$total_win_yes_amount_user = 0;
					foreach ($get_lower_yes_total as $fetch_get_lower_yes_total) {
						$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
						$bet_user_id = $fetch_get_lower_yes_total['user_id'];


						$betting_data = array();
						$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();


						$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
						$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
						$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
						$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

						$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

						$total_self_win_amount_yes =  ($win_amount_yes * $self_percentage) / 100;
						$total_win_yes_amount_user = $total_win_yes_amount_user + $total_self_win_amount_yes;
					}


					if ($user_type == 5) {
						$get_lower_no_total = $this->db->query("select bet_win_amount as win_amount_no,user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
					} else {
						$get_lower_no_total = $this->db->query("select bet_win_amount as win_amount_no,user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
					}



					$total_win_no_amount_user = 0;
					foreach ($get_lower_no_total as $fetch_get_lower_no_total) {

						$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

						$bet_user_id = $fetch_get_lower_no_total['user_id'];


						$betting_data = array();
						$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

						$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
						$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
						$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
						$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

						$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

						$total_self_win_amount_no =  ($win_amount_no * $self_percentage) / 100;
						$total_win_no_amount_user = $total_win_no_amount_user + $total_self_win_amount_no;
					}


					if ($user_type == 5) {
						$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where  b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
					} else {
						$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
					}



					$total_loss_amount_yes_user = 0;
					foreach ($get_higher_yes_total as $fetch_get_higher_yes_total) {
						$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];
						$bet_user_id = $fetch_get_higher_yes_total['user_id'];


						$betting_data = array();
						$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

						$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
						$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
						$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
						$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

						$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

						$total_self_loss_amount_yes =  ($loss_amount_yes * $self_percentage) / 100;

						$total_loss_amount_yes_user = $total_loss_amount_yes_user + $total_self_loss_amount_yes;
					}


					if ($user_type == 5) {
						$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where  b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'")->result_array();
					} else {
						$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'")->result_array();
					}



					$total_loss_amount_no_user = 0;
					foreach ($get_higher_no_total as $fetch_get_higher_no_total) {
						$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

						$bet_user_id = $fetch_get_higher_no_total['user_id'];


						$betting_data = array();
						$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

						$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
						$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
						$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
						$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

						$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

						$total_self_loss_amount_no =  ($loss_amount_no * $self_percentage) / 100;

						$total_loss_amount_no_user = $total_loss_amount_no_user + $total_self_loss_amount_no;
					}



					$total_win = $total_win_yes_amount_user + $total_win_no_amount_user;



					$total_loss = $total_loss_amount_yes_user + $total_loss_amount_no_user;



					$exposure = $total_win - $total_loss;
					$exposure = $exposure * (-1);
					$book_details = array(
						"runs" => $new_run_title,
						"exposure" => $exposure,
					);

					$book_list[] = $book_details;
					$i++;
				}
			}

			$first_label = $max_run;
			$echo_first_label_runs =  $first_label . " + ";

			$search = $first_label - 1;


			if ($user_type == 5) {
				$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'")->result_array();
			} else {
				$get_lower_yes_total = $this->db->query("select b.bet_win_amount as total_win_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='Yes'")->result_array();
			}




			$total_win_yes_amount_user = 0;
			foreach ($get_lower_yes_total as $fetch_get_lower_yes_total) {
				$win_amount_yes = $fetch_get_lower_yes_total['total_win_yes'];
				$bet_user_id = $fetch_get_lower_yes_total['user_id'];


				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

				$total_self_win_amount_yes =  ($win_amount_yes * $self_percentage) / 100;
				$total_win_yes_amount_user = $total_win_yes_amount_user + $total_self_win_amount_yes;
			}


			if ($user_type == 5) {
				$get_lower_no_total = $this->db->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
			} else {
				$get_lower_no_total = $this->db->query("select b.bet_win_amount as win_amount_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='No'")->result_array();
			}



			$total_win_no_amount_user = 0;
			foreach ($get_lower_no_total as $fetch_get_lower_no_total) {

				$win_amount_no = $fetch_get_lower_no_total['win_amount_no'];

				$bet_user_id = $fetch_get_lower_no_total['user_id'];

				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

				$total_self_win_amount_no =  ($win_amount_no * $self_percentage) / 100;
				$total_win_no_amount_user = $total_win_no_amount_user + $total_self_win_amount_no;
			}


			if ($user_type == 5) {
				$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
			} else {
				$get_higher_yes_total = $this->db->query("select b.bet_margin_used as total_loss_yes,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs > $first_label and b.bet_type='Yes'")->result_array();
			}




			$total_loss_amount_yes_user = 0;
			foreach ($get_higher_yes_total as $fetch_get_higher_yes_total) {
				$loss_amount_yes = $fetch_get_higher_yes_total['total_loss_yes'];
				$bet_user_id = $fetch_get_higher_yes_total['user_id'];


				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

				$total_self_loss_amount_yes =  ($loss_amount_yes * $self_percentage) / 100;

				$total_loss_amount_yes_user = $total_loss_amount_yes_user + $total_self_loss_amount_yes;
			}


			if ($user_type == 5) {
				$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'")->result_array();
			} else {
				$get_higher_no_total = $this->db->query("select b.bet_margin_used as total_loss_no,b.user_id from bet_details as b left outer join  user_login_master as ulm on ulm.UserId=b.user_id where (ulm.parentDL=$user_id or ulm.parentMDL =$user_id or ulm.parentSuperMDL=$user_id  or ulm.parentKingAdmin=$user_id) and b.bet_status =1 and b.event_id=$event_id and b.market_id=$market_id  and b.market_type='FANCY_ODDS' and b.bet_runs <= $first_label and b.bet_type='No'")->result_array();
			}




			$total_loss_amount_no_user = 0;
			foreach ($get_higher_no_total as $fetch_get_higher_no_total) {
				$loss_amount_no = $fetch_get_higher_no_total['total_loss_no'];

				$bet_user_id = $fetch_get_higher_no_total['user_id'];


				$betting_data = array();
				$fetch_get_parent_data = $this->db->query("select * from user_login_master where UserId=$bet_user_id")->result_array();

				$betting_data['parentDL'] = $fetch_get_parent_data[0]['parentDL'];
				$betting_data['parentMDL'] = $fetch_get_parent_data[0]['parentMDL'];
				$betting_data['parentSuperMDL'] = $fetch_get_parent_data[0]['parentSuperMDL'];
				$betting_data['parentKingAdmin'] = $fetch_get_parent_data[0]['parentKingAdmin'];

				$self_percentage = $this->common_model->get_my_partnership($user_data, $betting_data, 'my');

				$total_self_loss_amount_no =  ($loss_amount_no * $self_percentage) / 100;

				$total_loss_amount_no_user = $total_loss_amount_no_user + $total_self_loss_amount_no;
			}



			$total_win = $total_win_yes_amount_user + $total_win_no_amount_user;



			$total_loss = $total_loss_amount_yes_user + $total_loss_amount_no_user;



			$exposure = $total_win - $total_loss;



			$exposure = $exposure * (-1);

			$book_details = array(
				"runs" => $echo_first_label_runs,
				"exposure" => $exposure,
			);

			$book_list[] = $book_details;
		}


		$return = array(
			"status" => "ok",
			"data" => $book_list,
		);
		return $return;
	}

	public function get_active_bets($event_id = '')
	{

		$this->load->database();
		$this->load->library('users');
		$user_data = $this->users->data();
		$login_user_id = $user_data['Id'];
		$user_list = array();
		$query_print = "";
		$user_idss = array();
		$where_event1 = '';
		if ($user_data['power'] < 5 or $user_data['power'] == 7) {
			$where_event1 = ' AND (u.parentDL = ' . $user_data['Id'] . ' OR u.parentMDL = ' . $user_data['Id'] . ' OR u.parentSuperMDL = ' . $user_data['Id'] . ' OR u.parentKingAdmin = ' . $user_data['Id'] . ')';
			$get_all_fancy_active_user_list = $this->db->query("select * from user_master as u where 1=1 $where_event1")->result_array();
		} else {
			$get_all_fancy_active_user_list = $this->db->query("select * from user_master as u")->result_array();
		}
		foreach ($get_all_fancy_active_user_list as $user_data_new) {
			$useid = $user_data_new['Id'];
			$user_list[$useid] = $user_data_new;
		}
		if (false) {
			$total = $this->get_bet_data_admin($event_id, true);
			$results = $this->get_bet_data_admin($event_id);
		} else {
			/* echo "</br>";
	  	echo "1";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */
			$total = $this->get_bet_data($event_id, true);
			/* 	echo "<pre>";
			print_r($total);
			echo "</pre>"; */
			$total = $total['data'];
			/* echo "</br>";
	  	echo "2";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */
			$results = $this->get_bet_data($event_id);
			/* echo "<pre>";
			print_r($results);
			echo "</pre>";
			echo "</br>";
	  	echo "3";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */
			$query_print = $results['query_print'];
			$results = $results['data'];
		}

		$html = '';
		foreach ($results as $result) {

			$email = "";
			$bet_user_id = $result['user_id'];
			if (isset($user_list[$bet_user_id])) {
				$email = $user_list[$bet_user_id]['Email_ID'];
			}
			$gametype = $result['market_type'];
			if ($result['market_type'] == 'MATCH_ODDS')
				$gametype = 'MATCH';
			else if ($result['market_type'] == 'BOOKMAKER_ODDS')
				$gametype = 'MATCH1';
			else if ($result['market_type'] == 'BOOKMAKERSMALL_ODDS')
				$gametype = 'MATCH2';
			else if ($result['market_type'] == 'FANCY_ODDS')
				$gametype = 'FANCY';

			$tr_class = ($result['bet_type'] == 'Back' || $result['bet_type'] == 'Yes') ? 'back' : 'lay';

			$odd = $result['bet_odds'];
			$marketName = $result['market_name'];

			if ($result['market_type'] == 'BOOKMAKER_ODDS' || $result['market_type'] == 'BOOKMAKERSMALL_ODDS') {
				$odd = floatVal($odd) * 100 - 100;
				$odd = round($odd, 3);
			}
			if ($result['market_type'] == "KHADO_ODDS") {
				$odds = $result['bet_odds'];
				$marketName .= '-' . (($result['bet_runs2'] - $result['bet_runs']) + 1);
			} else if ($result['bet_runs'] != 0) {
				$odd = $result['bet_runs'];
				$marketName .= ' / ' . $result['bet_odds'];
			}

			$html .= '<tr class="' . $tr_class . '">';
			$html .= '<td>' . $email . '</td>';
			$html .= '<td>' . $marketName . '</td>';
			$html .= '<td>' . $odd . '</td>';
			$html .= '<td>' . $result['bet_stack'] . '</td>';
			$html .= '<td>' . $result['bet_time'] . '</td>';
			$html .= '<td>' . $result['bet_time'] . '</td>';
			$html .= '<td>' . $gametype . '</td>';
			$html .= '</tr>';
		}
		/* echo "</br>";
		echo "4";
		echo "</br>";
		echo date('Y-m-d H:i:s'); */
		if ($total == 0) {
			$html = '<td colspan="100%" align="center"> No record found!...</td>';
		}

		$returnArr['results'] = $html;
		$returnArr['total'] = $total;
		/*  $returnArr['user_list'] = $user_list;
        $returnArr['query_print'] = $query_print; */

		return $this->print_json($returnArr);
	}

	private function get_bet_data_admin($event_id = '', $is_count = false)
	{
		$this->load->database();
		$this->load->library('users');

		$user_data = $this->users->data();


		if ($user_data['power'] < 5 or $user_data['power'] == 7) {
			$get_downline_user_name = $this->db->query("select Id,Email_ID from user_master where (u.parentDL = " . $user_data['Id'] . " OR u.parentMDL = " . $user_data['Id'] . " OR u.parentSuperMDL = " . $user_data['Id'] . " OR u.parentKingAdmin = " . $user_data['Id'] . ") and power=1")->result_array();
		} else {
			$get_downline_user_name = $this->db->query("select Id,Email_ID from user_master where 1=1 and power=1")->result_array();
		}

		$user_ids = array_column($get_downline_user_name, 0);
		$user_names = array_column($get_downline_user_name, 1);
		echo "<pre>";
		print_r($user_ids);
		echo "</pre>";

		$this->db->select('(SELECT Email_ID FROM user_master WHERE Id = user_id ) as username');
		$this->db->select('b.bet_runs,b.event_id,b.market_id,b.event_name,b.market_name,b.market_type,b.bet_type,b.bet_odds,b.bet_stack,b.bet_time');

		$this->db->join('user_master u', 'u.Id = b.user_id', 'LEFT');
		$this->db->from('bet_details b');

		if ($user_data['power'] < 5 or $user_data['power'] == 7) {
			$this->db->where('(u.parentDL = ' . $user_data['Id'] . ' OR u.parentMDL = ' . $user_data['Id'] . ' OR u.parentSuperMDL = ' . $user_data['Id'] . ' OR u.parentKingAdmin = ' . $user_data['Id'] . ')');
		}
		$this->db->where(array('b.event_id' => $event_id, 'b.bet_status' => 1));

		$this->db->order_by('bet_id', 'DESC');

		if ($is_count)
			return $this->db->get()->num_rows();
		else {
			$this->db->limit(10);
			return $this->db->get()->result_array();
		}
	}

	private function get_bet_data($event_id = '', $is_count = false)
	{

		$this->load->database();
		$this->load->library('users');

		/* echo "</br>";
	  	echo "1_1";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */
		$user_data = $this->users->data();
		/* echo "</br>";
		echo "1_2";
		echo "</br>";
		echo date('Y-m-d H:i:s'); */
		$where_event1 = '';
		$user_idss = array();
		if ($user_data['power'] < 5 or $user_data['power'] == 7) {
			$where_event1 = ' AND (u.parentDL = ' . $user_data['Id'] . ' OR u.parentMDL = ' . $user_data['Id'] . ' OR u.parentSuperMDL = ' . $user_data['Id'] . ' OR u.parentKingAdmin = ' . $user_data['Id'] . ')';
			$get_all_fancy_active_user_list = $this->db->query("select UserID from user_login_master as u where 1=1 and UserType=1 $where_event1")->result_array();
			$user_idss = array_column($get_all_fancy_active_user_list, 'UserID');
		}
		/* $query_print=$this->db->last_query(); */
		$query_print = "";
		/* echo "</br>";
	  	echo "1_3";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */
		/* $query_print="";   */
		$user_list = array();

		/* foreach ($get_all_fancy_active_user_list as $user_data_new) {
            $useid=$user_data_new['UserID'];
            $user_list[$useid]=$user_data_new;
			if ($user_data['power'] < 5 or $user_data['power'] == 7) {
           	 	$user_idss[]=$useid;
			}
        } */

		/* echo "</br>";
	  	echo "1_4";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */


		/*  $this->db->select('(SELECT Email_ID FROM user_master WHERE Id = user_id ) as username'); */
		if ($is_count) {
			$this->db->select('count(*) as total');
		} else {

			$this->db->select('b.user_id,b.bet_runs,b.event_id,b.market_id,b.event_name,b.market_name,b.market_type,b.bet_type,b.bet_odds,b.bet_stack,b.bet_time');
		}

		/*    $this->db->join('user_master u', 'u.Id = b.user_id', 'LEFT'); */
		$this->db->from('bet_details b');

		if (count($user_idss) > 0) {
			$user_list_val = implode(',', $user_idss);
			$this->db->where('b.user_id in (' . $user_list_val . ')', NULL, FALSE);
		}
		/*   if($user_data['power'] < 5 or $user_data['power'] == 7){
            $this->db->where('(u.parentDL = ' . $user_data['Id'] . ' OR u.parentMDL = ' . $user_data['Id'] . ' OR u.parentSuperMDL = ' . $user_data['Id']. ' OR u.parentKingAdmin = ' . $user_data['Id'] . ')');
        } */
		$this->db->where(array('b.event_id' => $event_id, 'b.bet_status' => 1));

		$this->db->order_by('bet_id', 'DESC');

		if ($is_count) {
			/* echo "</br>";
	  	echo "1_5";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */
			$execute = $this->db->get()->result_array();
			/* $query_print2=$this->db->last_query();   */
			$query_print2 = "";
			$result = array(
				"query_print" => $query_print,
				"query_print2" => $query_print2,
				"szf" => $execute,
				"data" => $execute[0]['total']
			);
			/* echo "</br>";
	  	echo "1_6";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */
			return $result;
		} else {
			/* echo "</br>";
	  	echo "1_7";
	  	echo "</br>";
	  	echo date('Y-m-d H:i:s'); */
			$this->db->limit(10);

			$execute = $this->db->get()->result_array();
			/* $query_print2=$this->db->last_query(); */
			$query_print2 = "";

			$result = array(
				"query_print" => $query_print,
				"query_print2" => $query_print2,
				"data" => $execute,
			);
			/* echo "</br>";
			echo "1_8";
			echo "</br>";
			echo date('Y-m-d H:i:s'); */
			return $result;
		}
	}

	public function view_more_matched($event_id = '')
	{
		$this->load->database();
		$this->load->library('users', $this);

		if (!$this->users->require_power(2))
			return;

		$user_data = $this->users->data();
		$where_event1 = '';
		if ($user_data['power'] < 5 or $user_data['power'] == 7) {
			$where_event1 = ' AND (u.parentDL = ' . $user_data['Id'] . ' OR u.parentMDL = ' . $user_data['Id'] . ' OR u.parentSuperMDL = ' . $user_data['Id'] . ' OR u.parentKingAdmin = ' . $user_data['Id'] . ')';
		}
		$get_all_fancy_active_user_list = $this->db->query("select * from user_master as u where 1=1 $where_event1")->result_array();
		$user_list = array();
		$user_idss = array();
		foreach ($get_all_fancy_active_user_list as $user_data_new) {
			$useid = $user_data_new['Id'];
			$user_list[$useid] = $user_data_new;
			$user_idss[] = $useid;
		}
		$client_name = $this->input->post('search-client_name', TRUE);
		$ipaddress = $this->input->post('search-ipaddress', TRUE);
		$amount_min = $this->input->post('search-amount_min', TRUE);
		$amount_max = $this->input->post('search-amount_max', TRUE);
		$bettype = $this->input->post('search-bettype', TRUE);

		$html = '';

		$this->db->select('b.*');

		$this->db->where('b.bet_status', 1);

		$this->db->where('b.event_id', $event_id);
		/*  if($user_data['power'] < 5 or $user_data['power'] == 7){
            $this->db->where('(u.parentDL = ' . $user_data['Id'] . ' OR u.parentMDL = ' . $user_data['Id'] . ' OR u.parentSuperMDL = ' . $user_data['Id']. ' OR u.parentKingAdmin = ' . $user_data['Id'] . ')');
        } */
		$user_list_val = implode(',', $user_idss);
		if (!empty($user_idss)) {
			$this->db->where('b.user_id in (' . $user_list_val . ')', NULL, FALSE);
		}
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

		/*  $this->db->join('user_master u', 'u.Id = b.user_id', 'LEFT'); */

		$this->db->order_by('b.bet_id', 'DESC');
		$bets_data = $this->db->get('bet_details b')->result_array();

		$sno = 0;
		foreach ($bets_data as $bet_data) {
			$sno++;
			$email = "";
			$bet_user_id = $bet_data['user_id'];
			if (isset($user_list[$bet_user_id])) {
				$email = $user_list[$bet_user_id]['Email_ID'];
			}
			$tr_type = ($bet_data['bet_type'] == 'Back' || $bet_data['bet_type'] == 'Yes') ? 'back' : 'lay';

			$marketName = $bet_data['market_name'];
			$odds = floatval($bet_data['bet_odds']);
			if ($bet_data['bet_runs'] > 0) {
				$odds = $bet_data['bet_runs'];
				$marketName .= ' / ' . $bet_data['bet_odds'];
			}
			if ($bet_data['market_type'] == 'BOOKMAKER_ODDS' || $bet_data['market_type'] == 'BOOKMAKERSMALL_ODDS') {
				$odds = $odds * 100 - 100;
				$odds = round($odds, 3);
			}

			$bet_user_agent = ($bet_data['bet_user_agent']) ? $bet_data['bet_user_agent'] : $bet_data['bet_ip_address'];

			$html .= '<tr class="' . $tr_type . '">';
			$html .= '  <td>' . $sno . '</td>';
			$html .= '  <td>' . $email . '</td>';
			$html .= '  <td>' . $marketName . '</td>';
			$html .= '  <td>' . $bet_data['bet_type'] . '</td>';
			$html .= '  <td class="text-right">' . $bet_data['bet_stack'] . '</td>';
			$html .= '  <td class="text-right">' . $odds . '</td>';
			$html .= '  <td>' . $bet_data['bet_time'] . '</td>';
			$html .= '  <td>' . $bet_data['bet_time'] . '</td>';
			$html .= '  <td>' . $bet_data['bet_ip_address'] . '</td>';
			$html .= '  <td> <a data-toggle="tooltip" title="' . $bet_user_agent . '">Details</a></td>';
			$html .= '</tr>';
		}

		$total_bets = count($bets_data);

		if ($total_bets == 0) {
			$html = '<td colspan="100%" align="center">No record found!...</td>';
		}

		return $this->print_json(array('results' => $html, 'total' => $total_bets));
	}

	public function getusers_block_data($event_id = 0)
	{
		$this->load->database();

		$this->load->library('users', $this);

		if (!$this->users->require_power(2)) {
			return;
		}

		$user_data = $this->users->data();
		$login_user_id  = $user_data['Id'];

		$this->db->select('u.Email_ID as username,u.Id, u.bet_status as status, u.fancy_bet_status as fstatus');
		$this->db->where('u.parent_id', $user_data['Id']);
		$users_data = $this->db->get('user_master u')->result_array();
		$return_data = array();
		foreach ($users_data  as $d_user_data) {
			$username = $d_user_data['username'];
			$block_user_id = $d_user_data['Id'];

			$match_status = 0;
			$fancy_status = 0;
			$get_all_deactive_user = $this->db->query("select * from bet_block_details as b  where added_by=$login_user_id and event_id=$event_id and user_id=$block_user_id")->result_array();
			foreach ($get_all_deactive_user as $deactive_users) {
				$block_type = $deactive_users['block_type'];
				if ($block_type == 1) {
					$match_status = 1;
				} else if ($block_type == 2) {
					$fancy_status = 1;
				}
			}
			$return_data[] = array(
				"username" => $username,
				"status" => $match_status,
				"fstatus" => $fancy_status,
			);
		}


		echo $this->print_json(array('results' => $return_data));
	}

	public function get_active_bets_users($event_id = 0)
	{

		$this->load->database();

		$this->load->library('users', $this);

		if (!$this->users->require_power(2)) {
			return;
		}

		$user_data = $this->users->data();

		$field_name = 1;
		if ($this->input->get('fancy', true))
			$field_name = 2;

		$res_user = $this->db->query('SELECT (SELECT COUNT(*) FROM `bet_block_details` WHERE added_by = ' . $user_data['Id'] . ' AND `block_type` = ' . $field_name . ' and event_id=' . $event_id . ') as inactive')->row_array();

		return $this->print_json($res_user);
	}

	public function user_bet_status()
	{

		$this->load->database();
		$this->load->library('users', $this);

		if (!$this->users->require_power(2))
			return;

		$user_data = $this->users->data();


		$users = $this->input->post('users');
		$event_id = $this->input->post('event_id');

		$returnArr['msg'] = 'Error! Something wrong.';
		$returnArr['status'] = 1;
		$login_user_id  = $user_data['Id'];
		if (!empty($users) and !empty($event_id)) {
			if ($users == 'all') {
				$status = ($this->input->post('status') == 1) ? 0 : 1;

				$get_all_downline_ids = $this->db->query("select * from user_master where parent_id=$login_user_id")->result_array();
				foreach ($get_all_downline_ids as $downline_user_data) {
					$block_user_id = $downline_user_data['Id'];

					if ($status == 0) {
						$delete_query = $this->db->query("DELETE FROM  bet_block_details WHERE user_id=$block_user_id and event_id=$event_id and block_type=1 and added_by=$login_user_id");

						if ($delete_query) {
							$returnArr['msg'] = 'Success! Status has updated.';
							$returnArr['status'] = 1;
						}
					} else {
						$added_datetime = date("Y-m-d H:i:s");
						$inser_bet_block_details = array(
							"event_id" => $event_id,
							"user_id" => $block_user_id,
							"block_type" => 1,
							"added_by" => $login_user_id,
							"added_datetime" => $added_datetime,
						);
						$insert = $this->db->insert('bet_block_details', $inser_bet_block_details);

						if ($insert) {
							$returnArr['msg'] = 'Success! Status has updated.';
							$returnArr['status'] = 1;
						}
					}
				}
			} else {
				$status = ($this->input->post('status') == 1) ? 1 : 0;
				$get_block_user_data = $this->db->query("select * from user_master where Email_ID='$users'")->row();
				$block_user_id = $get_block_user_data->Id;

				if ($status == 0) {
					$delete_query = $this->db->query("DELETE FROM  bet_block_details WHERE user_id=$block_user_id and event_id=$event_id and block_type=1 and added_by=$login_user_id");

					if ($delete_query) {
						$returnArr['msg'] = 'Success! Status has updated.';
						$returnArr['status'] = 1;
					}
				} else {
					$added_datetime = date("Y-m-d H:i:s");
					$inser_bet_block_details = array(
						"event_id" => $event_id,
						"user_id" => $block_user_id,
						"block_type" => 1,
						"added_by" => $login_user_id,
						"added_datetime" => $added_datetime,
					);
					$insert = $this->db->insert('bet_block_details', $inser_bet_block_details);

					if ($insert) {
						$returnArr['msg'] = 'Success! Status has updated.';
						$returnArr['status'] = 1;
					}
				}
			}
		}

		return $this->print_json($returnArr);
	}

	public function user_fancy_bet_status()
	{

		$this->load->database();
		$this->load->library('users', $this);

		if (!$this->users->require_power(2))
			return;

		$user_data = $this->users->data();


		$users = $this->input->post('users');
		$event_id = $this->input->post('event_id');

		$returnArr['msg'] = 'Error! Something wrong.';
		$returnArr['status'] = 1;
		$login_user_id  = $user_data['Id'];
		if (!empty($users) and !empty($event_id)) {
			if ($users == 'all') {
				$status = ($this->input->post('status') == 1) ? 0 : 2;
				$get_all_downline_ids = $this->db->query("select * from user_master where parent_id=$login_user_id")->result_array();
				foreach ($get_all_downline_ids as $downline_user_data) {
					$block_user_id = $downline_user_data['Id'];

					if ($status == 0) {
						$delete_query = $this->db->query("DELETE FROM  bet_block_details WHERE user_id=$block_user_id and event_id=$event_id and block_type=2 and added_by=$login_user_id");

						if ($delete_query) {
							$returnArr['msg'] = 'Success! Status has updated.';
							$returnArr['status'] = 1;
						}
					} else {
						$added_datetime = date("Y-m-d H:i:s");
						$inser_bet_block_details = array(
							"event_id" => $event_id,
							"user_id" => $block_user_id,
							"block_type" => 2,
							"added_by" => $login_user_id,
							"added_datetime" => $added_datetime,
						);
						$insert = $this->db->insert('bet_block_details', $inser_bet_block_details);

						if ($insert) {
							$returnArr['msg'] = 'Success! Status has updated.';
							$returnArr['status'] = 1;
						}
					}
				}
			} else {
				$status = ($this->input->post('status') == 1) ? 2 : 0;
				$get_block_user_data = $this->db->query("select * from user_master where Email_ID='$users'")->row();
				$block_user_id = $get_block_user_data->Id;

				if ($status == 0) {
					$delete_query = $this->db->query("DELETE FROM  bet_block_details WHERE user_id=$block_user_id and event_id=$event_id and block_type=2 and added_by=$login_user_id");

					if ($delete_query) {
						$returnArr['msg'] = 'Success! Status has updated.';
						$returnArr['status'] = 1;
					}
				} else {
					$added_datetime = date("Y-m-d H:i:s");
					$inser_bet_block_details = array(
						"event_id" => $event_id,
						"user_id" => $block_user_id,
						"block_type" => 2,
						"added_by" => $login_user_id,
						"added_datetime" => $added_datetime,
					);
					$insert = $this->db->insert('bet_block_details', $inser_bet_block_details);

					if ($insert) {
						$returnArr['msg'] = 'Success! Status has updated.';
						$returnArr['status'] = 1;
					}
				}
			}
		}

		return $this->print_json($returnArr);
	}


	public function get_fancy_analysis($event_id = '')
	{
		$this->load->database();

		$this->load->library('users', $this);
		$this->load->model('common_model');

		if (!$this->users->require_power(2)) {
			return;
		}

		$user_data = $this->users->data();

		$this->db->select('b.event_id, b.market_id, b.market_name, SUM(bet_stack) as total_stack');
		$this->db->select('b.user_id, u.parentDL, u.parentMDL, u.parentSuperMDL,u.parentKingAdmin');

		$this->db->where('b.bet_status', 1);
		$this->db->where('b.event_id', $event_id);
		$this->db->where('b.market_type', 'FANCY_ODDS');
		$this->db->where('(u.parentDL = ' . $user_data['Id'] . ' OR parentMDL = ' . $user_data['Id'] . ' OR parentSuperMDL = ' . $user_data['Id']  . ' OR parentKingAdmin = ' . $user_data['Id'] . ')');

		$this->db->from('bet_details b');
		$this->db->join('user_master u', 'u.Id = b.user_id', 'LEFT');

		$this->db->group_by('b.user_id, b.market_id');

		$res_bets = $this->db->get()->result_array();

		$newArr = [];
		foreach ($res_bets as $betting_data) {

			$my_percentage = $this->common_model->get_my_partnership($user_data, $betting_data);
			$newArr[] = array(
				'event_id' => $betting_data['event_id'],
				'market_id' => $betting_data['market_id'],
				'market_name' => $betting_data['market_name'],
				'total_stack' => (($betting_data['total_stack'] / 100) * $my_percentage),
			);
		}
		return $this->print_json($newArr);
	}

	public function fancy_book($event_id = '', $downline_user_list = null, $self_percentage_array)
	{

		$this->load->database();

		$this->load->library('users', $this);
		$this->load->model('common_model');

		if (!$this->users->require_power(2))
			return;

		$user_data = $this->users->data();



		$client_users_ids = implode(",", $downline_user_list);
		$abc_query = array();
		if (!empty($downline_user_list)) {

			$abc_query[] = "SELECT event_id,market_id,market_type, MIN(bet_runs) as min_run,MAX(bet_runs) as max_run,MAX(bet_runs2) as max_run2 FROM bet_details where event_id = '$event_id' AND market_type='FANCY_ODDS' AND user_id IN ($client_users_ids) GROUP BY market_id";
			$master_bets_data = $this->db->query("SELECT event_id,market_id,market_type, MIN(bet_runs) as min_run,MAX(bet_runs) as max_run,MAX(bet_runs2) as max_run2 FROM bet_details where event_id = '$event_id' AND market_type='FANCY_ODDS' AND user_id IN ($client_users_ids) GROUP BY market_id")->result_array();

			$master_fancy_book = array();
			$all_first_query_array = array();
			$all_market_idss = array();
			foreach ($master_bets_data as $master_bet_data) {

				$event_id = $master_bet_data['event_id'];
				$market_id = $master_bet_data['market_id'];
				$market_type = $master_bet_data['market_type'];

				$min_max_data = array(
					'min_run' => $master_bet_data['min_run'],
					'max_run' => $master_bet_data['max_run'],
					'max_run2' => $master_bet_data['max_run2'],
					'market_type' => $master_bet_data['market_type'],
				);

				$all_market_idss[] = $market_id;
				$all_first_query_array[$market_id] =  $min_max_data;
			}
			if ($event_id && $all_market_idss != null) {

				$all_market_idss_text = implode(",", $all_market_idss);
				$abc_query[] = "SELECT bet_id,market_id,event_name,bet_type,bet_runs,bet_runs2,bet_margin_used,market_type,bet_win_amount,user_id FROM bet_details where event_id = '$event_id' AND market_id IN ($all_market_idss_text) and market_type='FANCY_ODDS' AND user_id IN ($client_users_ids)";
				$bets_data = $this->db->query("SELECT bet_id,market_id,event_name,bet_type,bet_runs,bet_runs2,bet_margin_used,market_type,bet_win_amount,user_id FROM bet_details where event_id = '$event_id' AND market_id IN ($all_market_idss_text) and market_type='FANCY_ODDS' AND user_id IN ($client_users_ids)")->result_array();

				$run_position_arr = array();

				foreach ($bets_data as $bet_data) {
					$bet_user_id			= strtolower($bet_data['user_id']);
					$market_id			= $bet_data['market_id'];
					$bet_type			= strtolower($bet_data['bet_type']);
					$bet_runs			= intval($bet_data['bet_runs']);
					$bet_runs2			= intval($bet_data['bet_runs2']);
					$bet_margin_used	= 0 - floatval($bet_data['bet_margin_used']);
					$bet_win_amount 	= floatval($bet_data['bet_win_amount']);
					$market_type 	= $bet_data['market_type'];
					$self_percentage = $self_percentage_array[$bet_user_id];

					if ($market_type == 'KHADO_ODDS') {
						$min_run = ($all_first_query_array[$market_id]['min_run'] > 1) ? ($all_first_query_array[$market_id]['min_run'] - 1) : $all_first_query_array[$market_id]['min_run'];
						$max_run = ($all_first_query_array[$market_id]['max_run2'] + 1);

						for ($i = $min_run; $i <= $max_run; $i++) {

							$cur_run = $i;

							if ($bet_type == 'back')
								$bet_type = 'yes';
							else if ($bet_type == 'lay')
								$bet_type = 'no';

							if ($bet_type == 'yes') {

								if (!isset($run_position_arr[$cur_run]))
									$run_position_arr[$cur_run] = 0;

								$amount = 0;

								if ($cur_run >= $bet_runs && ($bet_runs2 + 1) > $cur_run) {
									$amount = $bet_win_amount;
								} else {
									$amount = $bet_margin_used;
								}

								$amount  = ($amount * $self_percentage) / 100;
								$run_position_arr[$cur_run] += $amount;
							}
						}
					} else {

						$min_run = ($all_first_query_array[$market_id]['min_run'] > 1) ? ($all_first_query_array[$market_id]['min_run'] - 1) : $all_first_query_array[$market_id]['min_run'];
						$max_run = ($all_first_query_array[$market_id]['max_run'] + 1);

						for ($i = $min_run; $i <= $max_run; $i++) {

							$cur_run = $i;

							if ($bet_type == 'back')
								$bet_type = 'yes';
							else if ($bet_type == 'lay')
								$bet_type = 'no';

							if (!isset($run_position_arr[$market_id][$cur_run]))
								$run_position_arr[$market_id][$cur_run] = 0;

							$amount = 0;

							if ($bet_type == 'yes') {

								if ($cur_run >= $bet_runs) {
									$amount = $bet_win_amount;
								} else {
									$amount = $bet_margin_used;
								}
							} else {

								if ($cur_run < $bet_runs) {
									$amount = $bet_win_amount;
								} else {
									$amount = $bet_margin_used;
								}
							}

							$amount  = ($amount * $self_percentage) / 100;
							$run_position_arr[$market_id][$cur_run] += $amount;
						}
					}

					$result_array = array();
					foreach ($run_position_arr[$market_id] as $run => $amount) {
						$amount = $amount * (-1);
						$result_array[] = $amount;
					}
					$master_fancy_book[$market_id] = $result_array;
				}
			}
		}


		$return_array = array(
			"status" => 'ok',
			"abc_query" => $abc_query,
			"self_percentage_array" => $self_percentage_array,
			"data" => $master_fancy_book,
		);

		return $return_array;
	}

	public function max_limit($event_id)
	{
		$this->load->database();

		$this->load->library('users', $this);
		$this->load->model('common_model');

		if (!$this->users->require_power(5)) {
			return;
		}

		$match_max = "";
		$bookmaker_max = "";
		$status = "";
		$get_current_limit = $this->db->query("select * from event_market_limit where event_id=$event_id and status=0")->row();
		if ($get_current_limit != null) {
			$match_max = $get_current_limit->match_max;
			$status = $get_current_limit->status;
			$bookmaker_max = $get_current_limit->bookmaker_max;
		}

		$status_inactive_selected = "";
		$status_active_selected = "";
		if ($status == 1 and $status != "") {
			$status_inactive_selected = "selected='selected'";
			$status_active_selected = "";
		} else if ($status == 0 and $status != "") {
			$status_active_selected = "selected='selected'";
			$status_inactive_selected = "";
		}

		$results = '<div class="row">
                            <div class="col-md-4 col-xs-4">
                                <div class="form-group">
                                    <label for="limit_status">Limit Status:</label>
                                    <select class="form-control" name="limit_status" id="limit_status">
										<option value="">Select Status</option>
										<option value="0" ' . $status_active_selected . '> Active</option>
										<option value="1" ' . $status_inactive_selected . '> Inactive</option>
									</select>
                                </div>
                            </div>
							<div class="col-md-4 col-xs-4">
                                <div class="form-group">
                                    <label for="match_odds_limit">Match Odds Max Limit:</label>
                                    <input type="text" name="match_odds_limit" id="match_odds_limit" class="form-control" autocomplete="off" aria-required="true" value="' . $match_max . '">
                                </div>
                            </div>
							<div class="col-md-4 col-xs-4">
                                <div class="form-group">
                                    <label for="bookmaker_limit">Bookmaker Max Limit:</label>
                                    <input type="text" name="bookmaker_limit" id="bookmaker_limit" class="form-control" autocomplete="off" aria-required="true" value="' . $bookmaker_max . '">
                                </div>
                            </div>
                        </div>';
		return $this->print_json(array('results' => $results));
	}

	public function set_max_limit()
	{
		$this->load->database();

		$this->load->library('users', $this);
		$this->load->model('common_model');

		if (!$this->users->require_power(5)) {
			return;
		}

		$sport_id = $this->input->post("sport_id");
		$event_id = $this->input->post("event_id");
		$event_name = $this->input->post("event_name");
		$oddsmarketId = $this->input->post("oddsmarketId");
		$match_min = 100;
		$bookmaker_min = 100;

		$match_max = $this->input->post("match_odds_limit");
		$bookmaker_max = $this->input->post("bookmaker_limit");

		$matchdate = $this->input->post("matchdate");
		$limit_status = $this->input->post("limit_status");

		$check_already_insert = $this->db->query("select * from event_market_limit where event_id=$event_id")->row();
		if ($check_already_insert != null) {
			//update
			$update_data = array(
				"sport_id" => $sport_id,
				"event_id" => $event_id,
				"event_name" => $event_name,
				"oddsmarketId" => $oddsmarketId,
				"match_min" => $match_min,
				"bookmaker_min" => $bookmaker_min,
				"match_max" => $match_max,
				"bookmaker_max" => $bookmaker_max,
				"matchdate" => $matchdate,
				"status" => $limit_status,
			);
			$this->db->where("event_id", $event_id);
			$this->db->update("event_market_limit", $update_data);
		} else {
			//insert
			$insert = array(
				"sport_id" => $sport_id,
				"event_id" => $event_id,
				"event_name" => $event_name,
				"oddsmarketId" => $oddsmarketId,
				"match_min" => $match_min,
				"bookmaker_min" => $bookmaker_min,
				"match_max" => $match_max,
				"bookmaker_max" => $bookmaker_max,
				"matchdate" => $matchdate,
				"status" => $limit_status,
			);
			$this->db->insert("event_market_limit", $insert);
		}
		echo json_encode(array('status' => "ok", 'message' => "Added Successfully"));
		exit();
	}

	private function print_json($array)
	{
		$this->output->set_content_type('application/json')->set_output(json_encode($array));
	}
}
