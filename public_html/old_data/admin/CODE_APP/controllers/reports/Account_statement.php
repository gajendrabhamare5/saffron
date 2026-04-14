<?php

defined('BASEPATH') or exit('No direct script access allowed');

ini_set('memory_limit', '-1');

class Account_statement extends CI_Controller
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
        $this->load->view('reports/account_statement', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function get_account_statement()
    {

        $this->load->database();
        $this->load->library('users');

        if (!$this->users->require_power(2))
            return;

        $opning_data = $this->get_account_statement_data('opning');

        $accounts_data = $this->get_account_statement_data();

        return $this->print_json(array_merge($opning_data, $accounts_data));
    }

    function get_account_statement_data($type = 'data')
    {

        $this->load->library('users');
        if (!$this->users->require_power(2))
            return;

        $limit = LIMIT;

        $userdata = $this->users->data();
        $from_date = $this->input->post('from_date', TRUE);
        $to_date = $this->input->post('to_date', TRUE);
        $report_type = $this->input->post('report_type', TRUE);
        $client_name = $this->input->post('client_name', TRUE);
        $game_name = $this->input->post('game_name', TRUE);

        $opdate = date('Y-m-d', strtotime($from_date . ' -1 day'));

        $sql_select = 'ac.account_id';

        $sql_where = '';
        if ($client_name)
            $sql_where = ' ac.user_id =' . $client_name;
        else
            $sql_where = ' ac.user_id =' . $userdata['Id'];

        $sql_groupby = '';

        if ($report_type) {
            if ($report_type != 1)
                $sql_where .= ' AND ac.bet_id ' . (($report_type == 2) ? '= 0' : '<> 0');
        }

        if ($game_name) {
            if ($game_name != 'all') {

                $parrent_ids = [];

                $search_user_data = $userdata;
                if ($client_name) {
                    $search_user_data = $this->db->select('Id,parentDL,parentMDL,parentSuperMDL,parentKingAdmin')->get_where('user_master', array('Id' => $client_name))->row_array();
                }

                if ($search_user_data['Id'] != CONTROLLER_ID && $search_user_data['Id'] != WHTELABEL_ID) {
                    $parrent_ids = [CONTROLLER_ID, WHTELABEL_ID];
                } else if ($search_user_data['Id'] == WHTELABEL_ID) {
                    $parrent_ids[] = CONTROLLER_ID;
                }

                if ($search_user_data['parentDL'] > 0) {
                    $parrent_ids[] = $search_user_data['parentDL'];
                }

                if ($search_user_data['parentMDL'] > 0) {
                    $parrent_ids[] = $search_user_data['parentMDL'];
                }

                if ($search_user_data['parentSuperMDL'] > 0) {
                    $parrent_ids[] = $search_user_data['parentSuperMDL'];
                }

                if ($search_user_data['parentKingAdmin'] > 0) {
                    $parrent_ids[] = $search_user_data['parentKingAdmin'];
                }

                if (!empty($parrent_ids)) {
                    $parrent_ids_str = implode($parrent_ids, ',');
                }

                if ($game_name == 'upper')
                    $sql_where .= ' AND ac.opp_user_id IN (' . $parrent_ids_str . ')';
                else
                    $sql_where .= ' AND ac.opp_user_id NOT IN (' . $parrent_ids_str . ')';
            }

            if ($report_type == 3 && $game_name != 'all') {
                if ($type == 'data')
                    $sql_where .= ' AND (ab1.event_type LIKE "' . $game_name . '" OR ab2.event_type LIKE "' . $game_name . '")';
            }
        }

        if ($type == 'data') {
            $sql_select = 'SUM(ac.amount) as amount, ab1.market_type, ac.game_type, ac.account_date_time as edt, ac.remark, ac.bet_id as bid';
            $sql_select .= ', IF(ab1.event_id IS NULL,ab2.event_id,ab1.event_id) as event_id';
            $sql_select .= ', IF(ab1.event_id IS NULL, IF(`ab2`.`event_id` IS NULL,`ac`.`transaction_id`,`ab2`.`event_id`), ab1.event_id) as event_group_id';
            $sql_select .= ', IF(ab1.event_name IS NULL,ab2.event_name,ab1.event_name) as event_name';
            $sql_select .= ', IF(ab1.market_name IS NULL,ab2.market_name,ab1.market_name) as market_name';
            $sql_select .= ', IF(ab1.market_id IS NULL,ab2.market_id,ab1.market_id) as market_id';
            $sql_select .= ', IF(ab1.market_type IS NULL,ab2.market_type,ab1.market_type) as market_type';
            $sql_select .= ', IF(ab1.event_type IS NULL,ab2.event_type,ab1.event_type) as type';
            $sql_select .= ', IF(ab1.bet_final_result IS NULL,ab2.bet_final_result,ab1.bet_final_result) as result';
            $sql_select .= ', fu.Email_ID as from_user';
            $sql_select .= ', tu.Email_ID as to_user';
            $sql_select .= ', IF(ac.entry_type = 9,9,0) as is_comm';
            $sql_select .= ', IF(ac.game_type = 0, ab1.market_type,ab2.event_type) as market_group';
            $sql_select .= ', IF(ac.game_type = 0,IF(ab1.market_type = "MATCH_ODDS" OR ab1.market_type = "BOOKMAKER_ODDS" OR ab1.market_type = "BOOKMAKERSMALL_ODDS", ab1.market_type, ab1.market_id),ab2.event_type) as mgp_id';
        }

        if ($type == 'opning') {
            $sql_select = ' SUM(ac.amount) as op_balance';

            $sql_where .= ' AND ac.account_date_time <= "' . $opdate . ' 23:59:59"';
        } else {
            if ($from_date) {
                $sql_where .= ' AND ac.account_date_time >= "' . $from_date . ' 00:00:00"';
            }

            if ($to_date) {
                $sql_where .= ' AND ac.account_date_time <= "' . $to_date . ' 23:59:59"';
            }
        }
        $sql_where .= ' AND ac.is_open_close<>1';

        $this->db->select($sql_select);

        $this->db->where($sql_where);
        if ($type == 'data') {

            $this->db->group_by('event_group_id');
            $this->db->group_by('market_group');
            $this->db->group_by('mgp_id');
            $this->db->group_by('is_comm');
            $this->db->order_by('edt ASC');

            $this->db->join('bet_details_old_data ab1', 'ab1.bet_id = ac.bet_id AND 0 = ac.game_type', 'LEFT');
            $this->db->join('bet_teen_details_old_data ab2', 'ab2.bet_id = ac.bet_id AND 1 = ac.game_type', 'LEFT');
            $this->db->join('user_master fu', 'fu.Id = ac.user_id', 'LEFT');
            $this->db->join('user_master tu', 'tu.Id = (CASE WHEN ac.user_id=ac.entry_by THEN ac.opp_user_id ELSE ac.entry_by END)', 'LEFT');
        }

        $this->db->from('accounts ac');
        $res_acocunt = $this->db->get();

        if ($type == 'data') {

            //           echo $this->db->last_query();
            return $res_acocunt->result_array();
        } else if ($type == 'count') {
            return $res_acocunt->num_rows();
        } else {
            // echo $this->db->last_query();
            $opning_balance=$res_acocunt->row()->op_balance;
            if(empty($opning_balance)){
                $opning_balance=0;
            }
            return array(array('amount' => $opning_balance, 'edt' => ($from_date . ' 00:00:00'), 'remark' => 'Opening'));
        }
    }

    public function get_bets()
    {

        $this->load->library('users');

        if (!$this->users->is_login()) {
            return;
        }

        $userdata = $this->users->data();
        $user_id = $userdata['Id'];
        $event_id = $this->input->post('id', TRUE);
        $game_type = $this->input->post('type', TRUE);
        $event_type = $this->input->post('event_type', TRUE);
        $market_type = $this->input->post('market_type', TRUE);
        $market_id = $this->input->post('market_id', TRUE);
        $client_name = $this->input->post('client_name', TRUE);

        $this->db->select('event_id as id, bet_time as edt, market_name as nation, bet_type as side, bet_runs as runs, bet_odds as rate, bet_stack as amount, bet_result as wl, bet_time as date, bet_ip_address as ip_address,bet_user_agent as user_agent');
        $this->db->select('(SELECT Email_ID FROM user_master WHERE user_master.Id = b.user_id) as cl_name');
        $this->db->select('(SELECT Email_ID FROM user_master WHERE user_master.Id = u.parentDL) as dl_name');
        $this->db->select('(SELECT Email_ID FROM user_master WHERE user_master.Id = u.parentMDL) as mdl_name');
        $this->db->select('(SELECT Email_ID FROM user_master WHERE user_master.Id = u.parentSuperMDL) as smdl_name');
        $this->db->select('(SELECT Email_ID FROM user_master WHERE user_master.Id = u.parentKingAdmin) as kingadmin_name');
 
        $this->db->where('event_id', $event_id);
        $this->db->where('event_type', $event_type); 
        /*  if($market_type == 'MATCH_ODDS' || $market_type == 'BOOKMAKER_ODDS' || $market_type == 'BOOKMAKERSMALL_ODDS')
            $this->db->where('market_type', $market_type);
        else if($game_type == 0)
            $this->db->where('market_id', $market_id); */
        if ($market_type == 'MATCH_ODDS' || $market_type == 'BOOKMAKER_ODDS' || $market_type == 'BOOKMAKERSMALL_ODDS') {
            $this->db->where('market_type', $market_type);
        } else if ($game_type == 0) {
            $this->db->where('market_id', $market_id);
            $this->db->where('market_type', $market_type);
        }
        
        $bet_type = $this->input->post('bet_type', TRUE);
        if (!empty($bet_type)) {
            if($bet_type == "1"){
                $this->db->where("b.bet_status = 0");
            }
            if($bet_type == "2"){
                $this->db->where("b.bet_status = 2");
            }
            
            
        }
        
        $sql_where = '';
        if ($client_name && $client_name != 1) {
            $this->db->where("(u.Id = $client_name OR u.parentDL = $client_name OR u.parentMDL = $client_name OR u.parentSuperMDL = $client_name OR u.parentKingAdmin = $client_name)");
        } else {
            if ($userdata['power'] < 5 or $userdata['power'] == 7) {
                $this->db->where("(u.parentDL = $user_id OR u.parentMDL = $user_id OR u.parentSuperMDL = $user_id OR u.parentKingAdmin = $user_id)");
            }
        }

        $this->db->join('user_master u', 'u.Id = b.user_id', 'LEFT');

        if ($game_type == 0)
            $bets_data = $this->db->get('bet_details_old_data as b')->result_array();
        else
            $bets_data = $this->db->get('bet_teen_details_old_data as b')->result_array();



        return $this->print_json(array('status' => true, 'result' => $bets_data));
    }

    private function print_json($array)
    {
        $this->output->set_content_type('application/json')->set_output(json_encode($array));
    }
}
