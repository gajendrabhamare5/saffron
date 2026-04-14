<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class General_report extends CI_Controller {

    public function index() {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' - Manage Clients';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('reports/general_report', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function get_general($offset = 0) {

        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');
        $this->load->helper('common_helper');

        if (!$this->users->require_power(2))
            return;


        /* ~~~~~~~~~~~~~~~~~~~~~~~Upper Level Total~~~~~~~~~~~~~~~~~~ */

        $userdata = $this->users->data();
        $user_id = $userdata['Id'];

        $res_ids = $this->db->select('t2.Id')
                ->where('t1.parent_id', $user_id)
                ->from('user_master t1')
                ->join('user_master t2', '(t2.Id = t1.Id OR t2.parentDL = t1.Id OR t2.parentMDL = t1.Id OR t2.parentSuperMDL = t1.Id OR t2.parentKingAdmin = t1.Id)', 'LEFT')
                ->get()
                ->result_array();

        $downline_ids = array_column($res_ids, 'Id');
        $downline_ids[] = $user_id;

        $res_ac_data = $this->db->select('SUM(amount) as bal')
                ->where_in('user_id', $downline_ids)
                ->get('accounts')
                ->row_array();

        $upper_level_total = $res_ac_data['bal'];
        /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

        $limit = LIMIT;
        $generals_data = $this->get_general_data($limit, $offset);

        $html = '';
        if (count($generals_data) > 0) {

            $plus_datas = $minus_datas = [];
            $count = 0;

            foreach ($generals_data as $ul) {
                if (($ul['amount'] > 0)) {
                    $plus_datas[] = $ul;
                } else {
                    $minus_datas[] = $ul;
                }
                $count++;
            }

            $plus_total = $minus_total = 0;
            for ($i = 0; $i < $count; $i++) {

                $plus_key = $plus_username = $plus_amount = '';
                $minus_key = $minus_username = $minus_amount = '';

                if (!empty($plus_datas[$i])) {
                    $plus_key = ($i + 1);
                    $plus_username = $plus_datas[$i]['username'];
                    $plus_amount = round($plus_datas[$i]['amount'], 2);
                    $plus_total += $plus_datas[$i]['amount'];
                }
                if (!empty($minus_datas[$i])) {
                    $minus_key = ($i + 1);
                    $minus_username = $minus_datas[$i]['username'];
                    $minus_amount = round($minus_datas[$i]['amount'], 2);
                    $minus_total += $minus_datas[$i]['amount'];
                }

                $html .= '<tr>'
                        // . '<td>' . $minus_key . '</td>'
                        // . '<td>' . $minus_username . '</td>'
                        // . '<td class="amount-field">' . $minus_amount . '</td>'
                        . '<td>' . $plus_key . '</td>'
                        . '<td>' . $plus_username . '</td>'
                        . '<td class="amount-field">' . $plus_amount . '</td>'
                        . '</tr>';
            }
            //  <tr>
            //                 <td colspan="100%"></td>
            //             </tr>
            //             <tr>
            //                 <td></td>
            //                 <td><b>Upper Level Total<b></td>
            //                 <td class="amount-field"><b>' . ( 0 - $upper_level_total) . '</b></td>

            $html .= ' <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="100%"></td>
                        </tr>
                        ';
                            // <th></th>
                            // <th>General Total</th>
                            // <th class="amount-field">'.( 0 - $upper_level_total).'</th>

            $html .= '
                        <tr>
                           
                            <th></th>
                            <th>General Total</th>
                            <th class="amount-field"><b>' . ($plus_total + $minus_total) . '</b></th>
                        </tr>';
        } else {
            $html .= '<tr><td colspan="100%">Nothing to show...</td></tr>';
        }

        $total_records = $this->get_general_data();

        $data['links'] = pagi_links(MASTER_URL . '/reports/general-report/get_general', $total_records, $limit, $offset);
        $data['result'] = $html;
        return $this->print_json($data);
    }

    private function get_general_data($limit = '', $offset = '') {


        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();
        $user_power = $user_data['power'];
        $user_id = $user_data['Id'];

        if ($this->input->post('report_type') == 'general_report') {

            $this->db->select('SUM(ac.amount) as amount');
            $this->db->select("IF(u.Id = $user_id, u.Email_ID, IF(u.parent_id = $user_id, u.Email_ID, 'Down Lavel')) as username");
            $this->db->select("IF(u.Id = $user_id, 0, IF(u.parent_id = $user_id, 1, 2)) as order_field");

            if (!empty($limit)) {
                $this->db->limit($limit, $offset);
            }


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
                $this->db->where("(u.Id = $user_id OR u.parent_id = $user_id OR u.parentSuperMDL IN (SELECT p.`Id` FROM `user_master` `p` WHERE `p`.`parent_id`= $user_id))");
            } else {
                $this->db->where("(u.Id = $user_id OR u.$field_name = $user_id)");
            }
            $this->db->order_by('order_field', 'ASC');
            $this->db->group_by('username');

            $this->db->from('accounts ac');
            $this->db->join('user_master as u', 'u.Id = ac.user_id', 'LEFT');
        } else {

            $this->db->select('SUM(u.credit_reference) as amount,u.Email_ID as username');
            $this->db->select("IF(u.Id = $user_id, 0, 1) as order_field");

            $this->db->where("(u.Id = $user_id OR u.parent_id = $user_id)");
            $this->db->where('u.credit_reference >', 0);

            $this->db->group_by('username');
            $this->db->order_by('order_field');

            $this->db->from('user_master as u');
        }


        $result = $this->db->get();

        if (!empty($limit)) {

            return $result->result_array();
        } else {

            return $result->num_rows();
        }
    }

    private function print_json($array) {
        $this->output->
                set_content_type('application/json')->
                set_output(json_encode($array));
    }

}

?>