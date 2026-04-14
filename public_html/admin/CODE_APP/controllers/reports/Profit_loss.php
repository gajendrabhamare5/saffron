<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(E_ALL); 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
class Profit_loss extends CI_Controller {

    public function index() {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Current Bets';

        $this->load->view( 'header', array('handler' => $this));
        $this->load->view('reports/profit_loss', array('handler' => $this));
        $this->load->view( 'footer', array('handler' => $this));
    }

    public function get_profit_loss($offset = 0) {

        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');
        $this->load->helper('common_helper');

        if (!$this->users->require_power(2))
            return;

        $user_data = $this->users->data();

        $limit = LIMIT;
        $bettings_data = $this->get_profit_loss_data($limit, $offset);

        // echo "<pre>";
        // print_r($bettings_data);
        // echo "</pre>";

        $html = '';

        $SPORTS = unserialize(SPORTS);

        $pl_box = '';
        if (count($bettings_data) > 0) {

            $sports_total_amt = array();
            foreach ($bettings_data as $key => $ul) {
                $sno = $offset + $key + 1;

                // $sport_name = (isset($SPORTS[$ul['event_type']])) ? $SPORTS[$ul['event_type']] : $ul['event_type'];

                // if (strtoupper($sport_name) == '2020TEENPATTI') {
                    
                // }
                
                // $market_type = $ul['market_type'];
                // if($market_type == ''){
                // 	$market_type = $ul['event_name'];
                // }
                $html .= '<tr>'
                        . '<td>' . $sno . '</td>'
                        . '<td>' . $ul['Email_ID'] . '</td>'
                        . '<td>' . $ul['role_name'] . '</td>'
                        // . '<td> <span class="btn btn-primary market_more_details" data-market="' . $market_type . '" data-event_type="' . $ul['event_type'] . '"  title="View Details" >' . $market_type . '</span></td>'
                        . '<td>' . round($ul['casino_amount'],2) . '</td>'
                        . '<td>' . round($ul['sports_amount'],2) . '</td>'
                        . '<td>' . 0.00 . '</td>'
                        . '<td>' . round($ul['total_amount'],2) . '</td>'
                        . '</tr>';

                if (isset($sports_total_amt[$sport_name]))
                    $sports_total_amt[$sport_name] += $ul['amount'];
                else
                    $sports_total_amt[$sport_name] = $ul['amount'];
            }

            foreach ($sports_total_amt as $key => $value) {
                $pl_box .= '<span class="pl-box pl-' . (($value > 0) ? 'green' : 'red') . '">' . $key . ' : ' . round($value,2) . '</span>';
            }
        } else {
            $html .= '<tr><td colspan="100%" align="center">Nothing to show...</td></tr>';
        }

        $total_records = $this->get_profit_loss_data();

        $data['links'] = pagi_links(MASTER_URL . '/reports/get_profit_loss', $total_records, $limit, $offset);
        $data['result'] = $html;
        $data['pl_box'] = $pl_box;

        return $this->print_json($data);
    }

    private function get_profit_loss_data($limit = '', $offset = '') {

        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();
        $user_login_data = $this->users->login_data();
        $UserID = $user_login_data['UserID'];
       
        $search_text = $this->input->post('search_text', TRUE);
        if (!empty($limit)) {
            $this->db->limit($limit, $offset);
        }

        $this->db->select('u.Email_ID, u.UserType,SUM(case when ac.game_type = 0 then amount else 0 end) as sports_amount, SUM(case when ac.game_type = 1 then amount else 0 end) as casino_amount,sum(amount) as total_amount,(CASE UserType  
        WHEN 1 THEN "User"
        WHEN 2 THEN "DL"
        WHEN 3 THEN "MDL"
        WHEN 4 THEN "Super MDL"
        WHEN 5 THEN "Controller"
        WHEN 6 THEN "Result Master"
        WHEN 7 THEN "King Admin"
        ELSE "Unknown Role"
    END) AS role_name');


        $this->db->where('ac.bet_id !=', 0);
        if ($client_id = $this->input->post('client_name', TRUE)) {
            $this->db->WHERE('u.UserType', 1);
            
        }
        if($UserID !=1){

            $this->db->where("$UserID IN (u.parentDL, u.parentMDL, u.parentSuperMDL)", NULL, FALSE);
        }
        // $this->db->group_start();
        //     $this->db->where('u.parentDL', $UserID);
        //     $this->db->or_where('u.parentMDL', $UserID);
        //     $this->db->or_where('u.parentSuperMDL', $UserID);
        // $this->db->group_end();

        //  else {
        //     $this->db->where('ac.user_id', $user_data['Id']);
        // }

        // if ($from_date = $this->input->post('from_date', TRUE)) {
        //     $this->db->where('ac.account_date_time >= "' . $from_date . ' 00:00:00"');
        // }

        // if ($to_date = $this->input->post('to_date', TRUE)) {
        //     $this->db->where('ac.account_date_time <= "' . $to_date . ' 23:59:59"');
        // }

        $this->db->from('accounts as ac');
        
        $this->db->join('user_login_master as u', 'u.UserID = ac.user_id', 'LEFT');
        // $this->db->join('bet_details as b1', 'ac.bet_id = b1.bet_id AND ac.game_type = 0 AND b1.bet_status = 0', 'LEFT');
        // $this->db->join('bet_teen_details as b2', 'ac.bet_id = b2.bet_id AND ac.game_type = 1 AND b2.bet_status = 0', 'LEFT');
        if (!empty($search_text)) {
            $this->db->like('u.Email_ID', $search_text);
        }
        
        $this->db->group_by('ac.user_id');
        $result = $this->db->get();
 
        //echo $this->db->last_query(); 

        if (!empty($limit)) {
      
            return $result->result_array();
        } else {
           
            return $result->num_rows();
        }
    }

    public function market_more_details() {

        $markets_data = $this->get_markets_data();

        $html = $title = '';

        $SPORTS = unserialize(SPORTS);

        $market = $this->input->post('market', TRUE);
        $event_type = $this->input->post('event_type', TRUE);

        $sno = $closing = 0;
        foreach ($markets_data as $market_data) {
            if($market_data['sport_id'] != $event_type){
				continue;
			}
			$sno++;

            if ($sno == 1) {
                $op_bal_data = $this->get_markets_data($market_data['min_date'], $market_data['bet_id']);
                $closing = (int) $op_bal_data[0]['op_balance'];
                $html .= '<tr>';
                $html .= '  <td>' . $sno . '</td>';
                $html .= '  <td>' . $market_data['account_date_time'] . '</td>';
                $html .= '  <td></td>';
                $html .= '  <td></td>';
                $html .= '  <td>' . $closing . '</td>';
                $html .= '  <td>Opening</td>';
                $html .= '</tr>';
                $sno++;
            }

            $sport_name = strtoupper((@$SPORTS[$market_data['sport_id']]));
            if ($sno == 1) {
                $title .= $sport_name . ' - ' . $market;
            }

            $amount = $market_data['total_amount'];
            $event_name = $market_data['event_name'];
            $remark = $sport_name . ' / ' . $event_name . '</span>';

            $closing += $amount;
            $dr = $cr = 0;
            if ($amount < 0)
                $dr = $amount;
            else
                $cr = $amount;

            $html .= '<tr>';
            $html .= '  <td>' . $sno . '</td>';
            $html .= '  <td>' . $market_data['account_date_time'] . '</td>';
            $html .= '  <td>' . $cr . '</td>';
            $html .= '  <td>' . $dr . '</td>';
            $html .= '  <td>' . $closing . '</td>';
            $html .= '  <td>' . $market_data['remark'] . '</td>';
            $html .= '</tr>';
        }

        $this->print_json(array('status' => 1, 'html' => $html, 'title' => $title));
    }

    private function get_markets_data($op_balance = '', $bet_id = 0) {
        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();
        
        $sql_select = "";
        $sql_where = '1=1';
        $sql_group_by = '';
        $sql_order_by = '';

        if ($op_balance != '') {
            $sql_select .= "SUM(amount) as op_balance";
            
            $sql_where .= ' AND ac.account_date_time < "' . $op_balance . '" AND ac.bet_id <> ' . $bet_id;
        } else {
			
			$sql_select .= 'ac.bet_id,ac.account_date_time,SUM(amount) as total_amount,MIN(ac.account_date_time) min_date';
			$sql_select .= ', IF(ac.game_type = 0,b1.event_type,b2.event_type) as sport_id';
			$sql_select .= ', IF(ac.game_type = 0,b1.event_name,b2.event_name) as event_name';
			$sql_select .= ', IF(ac.game_type = 0, IF( b1.market_type = "FANCY_ODDS", CONCAT(b1.market_type," / ",b1.market_name, " / Fancy-",b1.bet_runs," / ",b1.bet_type), CONCAT(b1.market_type," / ",b1.market_name," / ",b1.bet_type) ) ,CONCAT(b2.event_type," / Rno :",b2.event_id," / ",b2.market_name)) as remark';
		
            if ($from_date = $this->input->post('from_date', TRUE)) {
                $sql_where .= ' AND ac.account_date_time >= "' . $from_date . ' 00:00:00"';
            }

            if ($to_date = $this->input->post('to_date', TRUE)) {
                
                $sql_where .= ' AND ac.account_date_time <= "' . $to_date . ' 23:59:59"';
            }

            $sql_group_by = ' GROUP BY ac.bet_id';
       		$sql_order_by = ' ORDER BY min_date';
        }

        if ($client_id = $this->input->post('client_name', TRUE)) {
             $sql_where .= ' AND ac.user_id = ' . $client_id;
        } else {
            $sql_where .= ' AND ac.user_id ='. $user_data['Id'];
        }

		$sql_where .= ' AND ac.bet_id != 0 ';

        if ($market = $this->input->post('market', TRUE)) {
            $sql_where .= ' AND (`b1`.`event_type` LIKE "' . $market . '" OR `b2`.`event_type` LIKE "' . $market . '" OR `b1`.`market_type` LIKE "' . $market . '" OR `b2`.`market_type` LIKE "' . $market . '")';
        }

        if ($op_balance != '') {
            
        } else {
            
        }
        
        $sql = '
        	SELECT 
				'.$sql_select.'
			FROM `accounts` as `ac`  
				LEFT JOIN `user_master` as `u` ON `u`.`Id` = `ac`.`user_id` 
				LEFT JOIN `bet_details` as `b1` ON `ac`.`bet_id` = `b1`.`bet_id` AND ac.game_type = 0 AND `b1`.`bet_status` = 0
				LEFT JOIN `bet_teen_details` as `b2` ON `ac`.`bet_id` = `b2`.`bet_id` AND ac.game_type = 1 AND `b2`.`bet_status` = 0
			WHERE 
				'.$sql_where.' '. $sql_group_by .' '. $sql_order_by;
        
        $result = $this->db->query($sql);

        return $result->result_array();
    }

    private function print_json($array) {
        $this->output->
                set_content_type('application/json')->
                set_output(json_encode($array));
    }

}

?>