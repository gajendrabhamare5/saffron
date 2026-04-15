<?php

defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting(E_ALL);
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
class Game_report extends CI_Controller {

    function index() {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Current Bets';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('reports/game_report', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function get_game_report($offset = 0) {
		error_reporting(E_ALL);
		ini_set("display_errors",1);
		ini_set("display_startup_errors",1);
        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');
        $this->load->helper('common_helper');

        if (!$this->users->require_power(2))
            return;

        $user_data = $this->users->data();

        $limit = LIMIT;
        $bettings_data = $this->get_game_report_data($limit, $offset);

        $html = '';

        $plus_arr = $minus_arr = array();
        if (count($bettings_data) > 0) {

            foreach ($bettings_data as $key => $ul) {

                if ($ul['pl'] > 0) {
                    $plus_arr[] = $ul;
                } else {
                    $minus_arr[] = $ul;
                }
            }

            $plus_count = count($plus_arr);
            $minus_count = count($minus_arr);

            $n_loop = ($plus_count > $minus_count) ? $plus_count : $minus_count;
            $minus_total = $plus_total = 0;
            for ($i = 0; $i < $n_loop; $i++) {
                $minus_index = $minus_username = $minus_pl = '';
                $plus_index = $plus_username = $plus_pl = '';
                if (isset($minus_arr[$i])) {
                    $minus_index = $i + 1;
                    $minus_username = $minus_arr[$i]['Email_ID'];
                    $minus_pl = ROUND($minus_arr[$i]['pl'], 2);
                    $minus_total += $minus_pl;
                }
                if (isset($plus_arr[$i])) {
                    $plus_index = $i + 1;
                    $plus_username = $plus_arr[$i]['Email_ID'];
                    $plus_pl = ROUND($plus_arr[$i]['pl'], 2);
                    $plus_total += $plus_pl;
                }
                $html .= '<tr>
                            <td>' . $minus_index . '</td>
                            <td>' . $minus_username . '</td>
                            <td class="amount-field">' . $minus_pl . '</td>
                            <td>' . $plus_index . '</td>
                            <td>' . $plus_username . '</td>
                            <td class="amount-field">' . $plus_pl . '</td>
                        </tr>';
            }

            $html .= '
                    <tr>
                        <td colspan="100%"> &nbsp; </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><b>General Total</b></td>
                        <td class="amount-field"><b>' . ROUND($minus_total, 2) . '</b></td>
                        <td></td>
                        <td><b>General Total</b></td>
                        <td class="amount-field"><b>' . ROUND($plus_total, 2) . '</b></td>
                    </tr>';
        } else
            $html .= '<tr><td colspan="100%">Nothing to show...</td></tr>';

        $total_records = $this->get_game_report_data();

        $data['links'] = pagi_links(MASTER_URL . '/reports/get_game_report', $total_records, $limit, $offset);

        $data['html'] = $html;

        $this->print_json($data);
    }

    private function get_game_report_data($limit = '', $offset = '') {

        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();

        if (!empty($limit)) {
            $this->db->limit($limit, $offset);
        }

        $this->db->select('`ac`.`user_id`');
        $this->db->select('(SUM(`amount`) - SUM( IF((`entry_type` = 1 OR `entry_type` = 2 OR `entry_type` = 5) , `amount`, 0))) as pl');

        $where_user="";
        if ($common_search = $this->input->post('common_search', TRUE)) {
            $where_user=' and Email_ID LIKE "%' . $common_search . '%"';
        }
        
        if ($user_data['power'] == 5) {

          /*   $this->db->where('(`u`.`parent_id` = ' . $user_data['Id'] . ' OR `u`.`parentSuperMDL` IN ( SELECT `p`.`Id` FROM `user_master` `p` WHERE `p`.`parent_id` =' . $user_data['Id'] . '))', null, false); */

          $fetch_ids=$user_data['Id'];
            $down_ids_data = $this->db->query("SELECT Id,Email_ID FROM user_master WHERE (parent_id = $fetch_ids ) $where_user")->result_array();

           /*  $down_ids = array_column($down_ids_data, 'Id'); */

           
        } else {
               /*  $this->db->where('(u.parentDL =' . $user_data['Id'] . ' OR u.parentMDL =' . $user_data['Id'] . ' OR u.parentSuperMDL =' . $user_data['Id'] . ' OR u.parentKingAdmin =' . $user_data['Id'] . ' OR ac.user_id =' . $user_data['Id'] . ' )'); */
            $fetch_ids=$user_data['Id'];
           /*  echo "SELECT Id,Email_ID FROM user_master WHERE (parentDL = $fetch_ids OR parentMDL =$fetch_ids OR parentSuperMDL = $fetch_ids OR parentKingAdmin = $fetch_ids OR Id =$fetch_ids) $where_user"; */
            $down_ids_data = $this->db->query("SELECT Id,Email_ID FROM user_master WHERE (parentDL = $fetch_ids OR parentMDL =$fetch_ids OR parentSuperMDL = $fetch_ids OR parentKingAdmin = $fetch_ids OR Id =$fetch_ids) $where_user")->result_array();

            /* $down_ids = array_column($down_ids_data, 'Id'); */
        }
        $user_list=array();
        $down_ids=array();
        foreach ($down_ids_data as $user_data_new) {
            $useid=$user_data_new['Id'];
            $user_list[$useid]=$user_data_new;
            $down_ids[]=$useid;
        }
        
        /* if ($common_search = $this->input->post('common_search', TRUE)) {
            $this->db->where('u.Email_ID LIKE "%' . $common_search . '%"', NULL, FALSE);
        } */

        $bet_where="";
        if ($account_type = $this->input->post('account_type', TRUE)) {
            if ($account_type != 'all') {
                $condition = ($account_type == 'match_odds') ? 'LIKE' : 'NOT LIKE';
               /*  $this->db->where('b.market_type ' . $condition . ' "MATCH_ODDS"'); */
                $bet_where.=' and market_type ' . $condition . ' "MATCH_ODDS"';
            }
        }
        if ($search_event = $this->input->post('event', TRUE)) {

            if ($search_event != 'all') {
               /*  $this->db->where('b.event_id', $search_event); */
                $bet_where.=' and event_id = "'.$search_event.'"';
            }
        } 

        $acc_wher="";
        if(count($down_ids) > 0){
        $user_ids = implode(',', $down_ids);
            $bets_data = $this->db->query("SELECT bet_id FROM bet_details WHERE user_id IN (".$user_ids.") $bet_where")->result_array();

            $all_bets_ids = array_column($bets_data, 'bet_id');
            if(count($all_bets_ids) > 0){
				$all_bets_ids1 = implode(',',$all_bets_ids);
				$this->db->where('ac.bet_id in ('.$all_bets_ids1.')', NULL, FALSE);
            }
            else{
            	$this->db->where('1 != 1', NULL, FALSE);
            }
        }
        else{
        	exit();
        }

        $this->db->having('pl <> 0');
        $this->db->group_by('ac.user_id');

        $this->db->from('accounts as ac');
      /*   $this->db->join('user_master as u', 'u.Id = ac.user_id', 'LEFT');
        $this->db->join('bet_details as b', 'b.bet_id = ac.bet_id', 'LEFT'); */
        $result = $this->db->get();
       /*  echo $this->db->last_query(); */
        if (!empty($limit)) {
            $query_result = $result->result_array();
            foreach ($query_result as &$row) {
                $user_id = $row['user_id'];
                
                // Check if the user_id exists in user_list
                if (isset($user_list[$user_id])) {
                    // Add the Email from user_list to the query result
                    $row['Email'] = $user_list[$user_id]['Email'];
                    $row['Id'] = $user_list[$user_id]['Id'];
                }
            }
            
            return $query_result;
           /*  return $result->result_array(); */
        } else {

            return $result->num_rows();
        }
    }

    public function get_game_list() {

        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $SPORTS = unserialize(SPORTS);

        $this->db->select('b.event_id, b.event_name, b.bet_time, b.event_type');

        if ($from_date = $this->input->post('from_date', TRUE)) {
            $this->db->where('b.bet_time >= "' . $from_date . ' 00:00:00"');
        }

        if ($to_date = $this->input->post('to_date', TRUE)) {
            $this->db->where('b.bet_time <= "' . $to_date . ' 23:59:59"');
        }

        if ($account_type = $this->input->post('account_type', TRUE)) {
            if ($account_type != 'all') {
                $condition = ($account_type == 'match_odds') ? 'LIKE' : 'NOT LIKE';
                $this->db->where('b.market_type ' . $condition . ' "MATCH_ODDS"');
            }
        }

        $this->db->group_by('b.event_id');

        $this->db->from('bet_details as b', 'b.bet_id = ac.bet_id', 'LEFT');
        $result = $this->db->get();

        $option_html = '<option value="all">ALL</option>';
        foreach ($result->result_array() as $event) {
            $sports_name = @$SPORTS[$event['event_type']];
            $option_html .= '<option value="' . $event['event_id'] . '">' . $sports_name . ' / ' . $event['event_name'] . ' (' . $event['bet_time'] . ')</option>';
        }
        $this->print_json(array('option_html' => $option_html));
    }

    private function print_json($array) {
        $this->output->
                set_content_type('application/json')->
                set_output(json_encode($array));
    }

}

?>