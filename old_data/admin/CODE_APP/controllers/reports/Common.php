<?php

defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Common extends CI_Controller {

    public function profit_loss_market() {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        $this->layout['title'] = PROJECTNAME . ' - Manage Clients';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('below_header', array('handler' => $this));
        $this->load->view('reports/profit_loss_market', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function get_profit_loss_market($offset = 0) {

        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');
        $this->load->helper('common_helper');

        if (!$this->users->require_power(2))
            return;

        $limit = LIMIT;
        $bettings_data = $this->get_profit_loss_market_data($limit, $offset);

        $betStatusArr = array('Running', 'Client Win', 'Client Loss', 'No Result');
        $html = '';
        if (count($bettings_data) > 0) {

            foreach ($bettings_data as $key => $ul) {

                $stake = ($ul['betting_runnderType'] == 0) ? $ul['betting_amount'] : $ul['betting_profit'];
                $type = ($ul['betting_runnderType'] == 0) ? 'Back' : 'Lay';
                $marketType = 'MATCH_ODDS';
                if ($ul['betting_marketType'] !== 'MATCH_ODDS') {
                    $type = ($ul['betting_runnderType'] == 0) ? 'Yes' : 'No';
                    $marketType = 'FANCY_ODDS';
                }

                $odds = ($ul['betting_marketType'] == 'MATCH_ODDS') ? $ul['betting_rate'] : (round($ul['betting_rate'] * 100));
                $bet_detail = $marketType . ' - ' . $ul['betting_runnderName'] . ' : ' . $type;
                $html .= '<tr>'
                        . '<td>' . ($key + 1) . '</td>'
                        . '<td>' . $ul['user_username'] . '</td>'
                        . '<td>' . $ul['betting_eventName'] . '</td>'
                        . '<td>' . $bet_detail . '</td>'
                        . '<td>' . $type . '</td>'
                        . '<td>' . $stake . '</td>'
                        . '<td>' . $ul['betting_rate'] . '</td>'
                        . '<td>' . $odds . '</td>'
                        . '<td>' . $betStatusArr[$ul['betting_status']] . '</td>'
                        . '<td>' . (date('Y-m-d H:i:s', $ul['betting_add_time'])) . '</td>'
                        . '</tr>';
            }
        } else {
            $html .= '<tr><td colspan="100%">Nothing to show...</td></tr>';
        }

        $total_records = $this->get_profit_loss_market_data();


        $data['account_summary'] = $this->get_account_summary();
        $data['links'] = pagi_links(MASTER_URL . '/reports/get_profit_loss_market', $total_records, $limit, $offset);
        $data['result'] = $html;
        echo json_encode($data);
    }

    private function get_profit_loss_market_data($limit = '', $offset = '') {


        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();

        if (!empty($limit)) {
            $this->db->limit($limit, $offset);
            $this->db->select('b.*,u.user_username');
        } else {
            $this->db->select('b.betting_id');
        }


        $user_power = $user_data['user_power'];
        $user_id = $user_data['user_id'];
        $field_name = '';
        switch ($user_power) {
            case 7:
                $field_name = "parentKingAdmin";
                break;
			case 4:
                $field_name = "parentSuperMDL";
                break;
            case 3:
                $field_name = "parentMDL";
                break;
            case 2:
                $field_name = "parentDL";
                break;

            default:
                break;
        }

        $this->db->where($field_name, $user_id);

        if ($client_name = $this->input->post('client_name', TRUE)) {
            $this->db->where('u.user_username', $client_name);
        }
        if ($event_name = $this->input->post('event_name', TRUE)) {
            $this->db->like('b.betting_eventName', $event_name);
        }
        if ($event_type = $this->input->post('event_type', TRUE)) {
            $this->db->where('b.betting_eventTypeId', $event_type);
        }
        if ($from_date = $this->input->post('from_date', TRUE)) {
            $this->db->where('b.betting_add_time >= "' . strtotime($from_date . ' 00:00:00') . '"');
        }
        if ($to_date = $this->input->post('to_date', TRUE)) {
            $this->db->where('b.betting_add_time <= "' . strtotime($to_date . ' 23:59:59') . '"');
        }
        if ($this->input->post('orderby') == '') {
            $this->db->order_by('b.betting_id', 'DESC');
        } else {
            $this->db->order_by($this->input->post('orderby'));
        }

        $this->db->join('users as u', 'u.user_id = b.user_id', 'left');
        $result = $this->db->get('betting as b');

        if (!empty($limit)) {

            return $result->result_array();
        } else {

            return $result->num_rows();
        }
    }

    public function get_account_summary() {
        $this->load->database();
        $this->load->library('users', $this);

        $user_data = $this->users->data();
        $user_power = $user_data['user_power'];
        $user_id = $user_data['user_id'];
        $field_name = '';
        switch ($user_power) {
            case 7:
                $field_name = "parentKingAdmin";
                break;
			case 4:
                $field_name = "parentSuperMDL";
                break;
            case 3:
                $field_name = "parentMDL";
                break;
            case 2:
                $field_name = "parentDL";
                break;

            default:
                break;
        }

        $this->db->select(
                'SUM(IF(account_entryType = 2 AND bet_id <> 0 ,account_amount,0)) as total_debit
                ,SUM(IF(account_entryType = 1 AND bet_id <> 0 ,account_amount,0)) as total_credit
                ,SUM(IF(account_entryType = 1 AND bet_id = 0 ,account_amount,0)) as total_deposit
                ,account_entryType'
        );

        $this->db->where($field_name, $user_id);

        if ($client_name = $this->input->post('client_name', TRUE)) {
            $this->db->where('u.user_username', $client_name);
        }
        if ($event_name = $this->input->post('event_name', TRUE)) {
            $this->db->like('b.betting_eventName', $event_name);
        }
        if ($event_type = $this->input->post('event_type', TRUE)) {
            $this->db->where('b.betting_eventTypeId', $event_type);
        }
        if ($from_date = $this->input->post('from_date', TRUE)) {
            $this->db->where('b.betting_add_time >= "' . strtotime($from_date . ' 00:00:00') . '"');
        }
        if ($to_date = $this->input->post('to_date', TRUE)) {
            $this->db->where('b.betting_add_time <= "' . strtotime($to_date . ' 23:59:59') . '"');
        }

        $this->db->join('users as u', 'u.user_id = ac.user_id', 'left');
        $this->db->join('betting as b', 'b.betting_id = ac.bet_id', 'left');
        return $this->db->get('user_accounts as ac')->row_array();
    }

    public function get_clients_() {

        $search_valaue = $this->input->get('search');

        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();

        $this->db->select('u.user_username');

        $user_power = $user_data['user_power'];
        $user_id = $user_data['user_id'];
        $field_name = '';
        switch ($user_power) {
            case 7:
                $field_name = "parentKingAdmin";
                break;
            case 4:
                $field_name = "parentSuperMDL";
                break;
            case 3:
                $field_name = "parentMDL";
                break;
            case 2:
                $field_name = "parentDL";
                break;

            default:
                break;
        }

        $this->db->where($field_name, $user_id);
        $this->db->like('u.user_username', $search_valaue);

        $this->db->order_by('u.user_username', 'ASC');
        $result = $this->db->get('users as u');

        $user_data = $result->result_array();

        $clients_list = array_column($user_data, 'user_username');

        $this->print_json(array('clients_list' => $clients_list));
    }

    public function get_clients() {

        $search_valaue = $this->input->get('search');

        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();

        $this->db->select('u.Id as id,u.Email_ID as text');

        $user_power = $user_data['power'];
        $user_id = $user_data['Id'];
        $field_name = '';
        switch ($user_power) {
            case 7:
                $field_name = "parentKingAdmin";
                break;
            case 5:
                $field_name = "parent_id";
                break;
            case 4:
                $field_name = "parentSuperMDL";
                break;
            case 3:
                $field_name = "parentMDL";
                break;
            case 2:
                $field_name = "parentDL";
                break;

            default:
                break;
        }

        if ($field_name == "parent_id") {
            $this->db->where("(u.Id = $user_id OR u.parent_id = $user_id OR u.parent_id = $user_id OR u.parentKingAdmin IN (SELECT p.`Id` FROM `user_master` `p` WHERE `p`.`parent_id`= $user_id) OR u.parentSuperMDL IN (SELECT p.`Id` FROM `user_master` `p` WHERE `p`.`parent_id`= $user_id))");
        } else {
            $this->db->where("($field_name = $user_id OR u.Id = $user_id)");
        }
        $this->db->like('u.Email_ID', $search_valaue);

        $this->db->order_by('u.Email_ID', 'ASC');
        $result = $this->db->get('user_master as u');

        $user_data = $result->result_array();

        $this->print_json(array('results' => $user_data));
    }

    public function get_events() {

        $query = $this->input->get('query');

        $search_valaue = $query['term'];

        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();
        $this->db->distinct();
        $this->db->select('b.betting_eventName');
        $this->db->like('b.betting_eventName', $search_valaue);

        $this->db->order_by('b.betting_eventName', 'ASC');
        $result = $this->db->get('betting as b');

        $user_data = $result->result_array();

        $events_list = array_column($user_data, 'betting_eventName');

        $this->print_json(array('events_list' => $events_list));
    }

    private function print_json($array) {
        $this->output->
                set_content_type('application/json')->
                set_output(json_encode($array));
    }

    public function useralldetails() {
        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();

        $uid = $this->input->post('uid');

        $login_id = $user_data['Id'];

        $userTypeArr = array(1 => 'User',2 => 'Agent',3 => 'Master',4 => 'SuperMaster',5 => 'SubAdmin',7 => 'King Admin');

//        $this->db->where('Email_ID', $uid);
//        $this->db->where("(parent_id = '$login_id' OR parentDL = '$login_id' OR parentMDL = '$login_id' OR parentSuperMDL = '$login_id')", null, false);
//        $count_rows = $this->db->get('user_master')->num_rows();


        $count_rows = $this->db->where('t1.`Email_ID`', $uid)
                        ->where('(t2.parent_id = ' . $login_id . ' OR t2.Id = ' . $login_id . ')')
                        ->from('user_master t1')
                        ->join('`user_master` t2', '(t2.Id = t1.parent_id OR t2.Id = t1.parentDL OR t2.Id = t1.parentMDL OR t2.Id = t1.parentSuperMDL OR t2.Id = t1.parentKingAdmin)', 'LEFT')
                        ->get()->num_rows();

        if ($count_rows > 0) {

            /*          This is for user Lock        */
            $res_parent_ac_data = $this->db->select('t2.Email_ID,t2.power,t2.Status,t2.bet_status')
                    ->where('t1.Email_ID', $uid)
                    ->from('user_master t1')
                    ->join('user_master t2', '(t2.Id = t1.parentDL OR t2.Id = t1.parentMDL OR t2.Id = t1.parentSuperMDL OR t2.Id = t1.parentKingAdmin)', 'LEFT')
                    ->get()
                    ->result_array();

            $html_user_lock = '';
            foreach ($res_parent_ac_data as $value) {
                
                $user_type_text = (isset($userTypeArr[$value['power']]))?$userTypeArr[$value['power']]:'';
                
                $html_user_lock.=
                        '<tr>' .
                        '   <td>' . $value['Email_ID'] . '</td>' .
                        '   <td>' . $user_type_text . '</td>' .
                        '   <td>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" disabled="" '.(($value['Status'] == 1) ?'checked="checked"':'').'>
                                    <span class="checkmark"></span>
                                </label>
                        </td>' .
                        '   <td>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" disabled="" '.(($value['bet_status'] == 1) ?'checked="checked"':'').'>
                                    <span class="checkmark"></span>
                                </label>
                        </td>' .
                        '</tr>';
            }

            /*          This is for user Details        */
            $res_user_details_data = $this->db->select('u.Email_ID,u.Id,u.credit_reference,u.net_exposure_limit,SUM(ac.amount) as general')
                    ->where('u.Email_ID', $uid)
                    ->from('user_master u')
                    ->join('accounts ac', 'ac.user_id = u.Id', 'LEFT')
                    ->get()
                    ->row_array();

            $user_exposure = $this->db->select('SUM(exposure_amount) as exposure')->get_where('exposure_details',array('user_id' => $res_user_details_data['Id']))->row_array();
            
            $exposure = 0;
            if($user_exposure)
                 $exposure = ROUND((($user_exposure['exposure'] <= 0)?abs($user_exposure['exposure']):0),2);

            $html_user_details = '';
            if ($res_user_details_data) {
                $html_user_details = '<tr>' .
                        '   <td>' . $res_user_details_data['Email_ID'] . '</td>' .
                        '   <td>' . $exposure . '</td>' .
                        '   <td>' . $res_user_details_data['credit_reference'] . '</td>' .
                        '   <td>' . $res_user_details_data['net_exposure_limit'] . '</td>' .
                        '   <td>' . ROUND($res_user_details_data['general'],2) . '</td>' .
                        '</tr>';
            }

            $html = '
<div class="row">
    <div class="col-md-6 m-t-10">
        <h4 class="m-b-10 col-md-12">Game Lock</h4>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>EventName</th>
                    <th>UserName</th>
                    <th>UserActive</th>
                    <th>BetActive</th>
                    <th>FancyActive</th>
                </tr>
            </thead>
          </table>
    </div>
    <div class="col-md-6 m-t-10">
        <h4 class="m-b-10 col-md-12">User Lock</h4>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>UserName</th>
                    <th>AccountType</th>
                    <th>UserActive</th>
                    <th>BetActive</th>
                </tr>
            </thead>
            <tbody>' . $html_user_lock . '</tbody>
        </table>
    </div>
    <div class="col-md-12 m-t-10">
        <h4 class="m-b-10 col-md-12">Game Book</h4>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>Gametype</th>
                    <th>EventName</th>
                    <th>BookA</th>
                    <th>NationA</th>
                    <th>BookB</th>
                    <th>NationB</th>
                    <th>BookC</th>
                    <th>NationC</th>
                    <th>NoOfBet</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="col-md-6 m-t-10">
        <h4 class="m-b-10 col-md-12">User Details</h4>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>UserName</th>
                    <th>Exposer</th>
                    <th>Creditref</th>
                    <th>ExpoLimits</th>
                    <th>General</th>
                </tr>
            </thead>
            <tbody>' . $html_user_details . '</tbody>
        </table>
    </div>
    <div class="col-md-6 m-t-10">
        <h4 class="m-b-10 col-md-12">Fancy Book</h4>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>EventName</th>
                    <th>Book</th>
                </tr>
            </thead>
        </table>
    </div>
</div>';

            echo json_encode(array('success' => 1, 'html' => $html));
        }
    }

}

?>