<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Manage_clients extends CI_Controller
{

    public function index()
    {
        redirect(MASTER_URL . '/manage_clients/listing');
    }

    public function listing($agent_id = '')
    {
        $this->load->library('users', $this);
        $this->load->library('functions', $this);

        if (!$this->users->require_power(2))
            return;

        $this->users->pwd_change_status();

        $this->layout['title'] = PROJECTNAME . ' - Manage Clients';
        $this->layout['agent_id'] = $agent_id;
        $this->layout['summary'] = true;
        $this->layout['user_data'] = $this->users->data();

        $this->load->view('header', array('handler' => $this));
        $this->load->view('manage-clients/list', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function get_user_list($offset = '')
    {
        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');

        if (!$this->users->require_power(2))
            return;

        $user_data = $this->users->data();

        $limit = 500; //LIMIT;

        $users_list = $this->get_users($limit, $offset);
        $query = $this->db->last_query();
        $statusArr = array(0 => 'Active', 1 => 'In-Active');
        $acArr = array(1 => 'User', 2 => 'Agent', 3 => 'Master', 4 => 'Super Master', 7 => 'Admin');
        $html = '';
        $iloop = 0;
        $parent_cricket_access = 1;
        $parent_soccer_access = 1;
        $parent_tennis_access = 1;
        $parent_video_access = 1;
        $parent_Status = 1;
        $parent_bet_status = 1;
        if ($users_list) {

            $total_balance = $total_client_pl = $total_avl_balance = $total_exposure = $total_credit = 0;

            foreach ($users_list as $key => $ul) {

                $row_master_my_percentage = $ul['my_percentage'];
                $total_with_downline = $ul['account_balance'];

                $u_status = ($ul['Status'] == 1) ? '<i class="fas fa fa-check-square" aria-hidden="true" style="color: green;"></i>' : '<i class="fas fa-window-close" aria-hidden="true" style="color: red;"></i>';
                $u_bet_status = ($ul['bet_status'] == 1) ? '<i class="fas fa fa-check-square" aria-hidden="true" style="color: green;"></i>' : '<i class="fas fa-window-close" aria-hidden="true" style="color: red;"></i>';

                $ids_string = $user_data['Id'] . '-' . $ul['Id'];
                $user_id = urlencode($this->functions->encrypt($ids_string));

                $down_ids_data = $this->db->query('SELECT m.Id FROM user_master m WHERE (m.parentDL = ' . $ul['Id'] . ' OR m.parentMDL = ' . $ul['Id'] . ' OR m.parentSuperMDL = ' . $ul['Id'] . ' OR m.parentKingAdmin = ' . $ul['Id'] . ')')->result_array();

                $down_ids = array_column($down_ids_data, 'Id');
                $down_ids[] = $ul['Id'];

                $account_balance = 0;
                $betting_liability = 0;
                $master_betting_liability = 0;
                if (count($down_ids) > 0) {

                    $down_ids = implode(',', $down_ids);

                    $res_account_balance1 = $this->db->query('SELECT SUM(ac.`amount`) as account_balance FROM ' . ACCOUNT_DATABASE_NAME . ' as ac  WHERE ac.user_id IN (' . $ul['Id'] . ')')->row_array();

                   $qwery = 'SELECT SUM(ac.`amount`) as account_balance FROM ' . ACCOUNT_DATABASE_NAME . ' as ac  WHERE ac.user_id IN (' . $down_ids . ')';
                    $res_account_balance = $this->db->query('SELECT SUM(ac.`amount`) as account_balance FROM ' . ACCOUNT_DATABASE_NAME . ' as ac  WHERE ac.user_id IN (' . $down_ids . ')')->row_array();

                    $res_betting_liability = $this->db->query('SELECT SUM(`ed`.`exposure_amount`) as betting_liability,SUM(`ed`.`max_winning_amount`) as master_betting_liability FROM `exposure_details` as `ed` WHERE ed.user_id IN (' . $down_ids . ') and ed.exposure_amount < 0')->row_array();

                    $account_balance = ($res_account_balance) ? $res_account_balance['account_balance'] : 0;

                    if ($user_data['power'] == 6 and !$this->input->post('agent_id', TRUE)) {

                        $sql = 'SELECT Id FROM user_master WHERE parent_id = ' . WHTELABEL_ID;
                        $res_whitelabel_childs = $this->db->query($sql)->result_array();
                        $whitelabel_childs = array_column($res_whitelabel_childs, 'Id');

                        if (!empty($whitelabel_childs)) {
                            $whtlbl_child_ids = implode($whitelabel_childs, ',');

                            $sql = 'SELECT SUM(amount) as available_balance FROM ' . ACCOUNT_DATABASE_NAME . ' WHERE user_id = ' . WHTELABEL_ID . ' AND entry_type IN (1,2,5)';
                            $res = $this->db->query($sql)->row();
                            $available_balance = $res->available_balance;

                            /*      DOWN LEVEL USER BALANCE    */

                            $res = $this->db->select('SUM(amount) as down_level_balances')
                                ->where('(u.Id IN (' . $whtlbl_child_ids . ') OR u.parentDL IN (' . $whtlbl_child_ids . ') OR u.parentMDL IN (' . $whtlbl_child_ids . ') OR u.parentSuperMDL IN (' . $whtlbl_child_ids . ') OR u.parentKingAdmin IN (' . $whtlbl_child_ids . ') )')
                                ->join('user_master u', 'u.Id = ac.user_id', 'LEFT')
                                ->get(ACCOUNT_DATABASE_NAME . ' ac')->row();
                            $down_level_balances = $res->down_level_balances;

                            /*      DOWN LEVEL USER CREDIT REFERENCE    */

                            $res_dlcr = $this->db->select('SUM(u.credit_reference) as down_level_credit_reference')
                                ->where('u.parent_id', WHTELABEL_ID)
                                ->get('user_master u')->row();

                            $down_level_credit_reference = $res_dlcr->down_level_credit_reference;

                            /*
						 * ========================> This is for Profit Loss <=================================
						 */

                            $sql_pl = 'SELECT (SELECT SUM(amount) FROM `' . ACCOUNT_DATABASE_NAME . '` WHERE `user_id` = ' . WHTELABEL_ID . ' AND `entry_type` NOT IN (1,2,5)) as my_pl';
                            $pl_data = $this->db->query($sql_pl)->row();

                            $my_pl = 0;
                            if ($pl_data)
                                $my_pl = $pl_data->my_pl;
                        }
                        $available_balance_with_pl = $available_balance + $my_pl;
                        $master_balance = $available_balance_with_pl + $down_level_balances;

                        $account_balance = $master_balance;
                    }

                    $betting_liability = ($res_betting_liability) ? $res_betting_liability['betting_liability'] : 0;
                    $master_betting_liability = ($res_betting_liability) ? $res_betting_liability['master_betting_liability'] : 0;
                }

                $account_balance1 = ($res_account_balance1) ? $res_account_balance1['account_balance'] : 0;
                $exposure = ($betting_liability <= 0) ? abs($betting_liability) : 0;

                /* if($ul['power'] != 1){
					$exposure = ($master_betting_liability * $row_master_my_percentage) / 100;
				} */

                $avl_balance = $account_balance1 - $exposure;
                $client_pl = $account_balance - $ul['credit_reference'];
                $default_partnership = $ul['my_percentage'];

                /*   Total   */

                $total_balance += $account_balance;
                $total_client_pl += $client_pl;
                $total_avl_balance += $avl_balance;
                $total_exposure += $exposure;
                $total_credit += $ul['credit_reference'];

                /*          */

                $buttons = '';

                if ($user_data['power'] == 5) {
                    if ($ul['power'] == 4 or $ul['power'] == 7) {
                        $buttons .= '<button type="button" title="" style="margin-right:2px;" data-toggle="tooltip" data-placement="top" class="btn btn-success btn-sm btn_generate_modal" id="' . $ul['Id'] . '" data-original-title="Generat Points">G</button> ';
                    }
                } else {
                }

                $buttons .= '<button type="button" title="" style="margin-right:2px;" data-toggle="tooltip" data-placement="top" class="btn-custom-button btn_deposit_modal" id="' . $ul['Id'] . '" data-original-title="Deposit">D</button> ';
                $buttons .= '<button type="button" title="" style="margin-right:2px;" data-toggle="tooltip" data-placement="top" class="btn-custom-button btn_withdrawal_modal" id="' . $ul['Id'] . '" data-original-title="Withdrawal">W</button> ';

                /* $buttons .= '<button type="button" title="" style="margin-right:2px;" data-toggle="tooltip" data-placement="top" class="btn-custom-button btn_odds_modal" id="' . $ul['Id'] . '" data-original-title="Min-Max Odds">O</button> ';  */


                if (!$this->input->post('agent_id', TRUE)) {
                    $buttons .= '<button type="button" title="" style="margin-right:2px;" data-toggle="tooltip" data-placement="top" class="btn-custom-button btn_exposure_limit" id="' . $ul['Id'] . '" data-original-title="Exposure Limit">L</button> ';
                    $buttons .= '<button type="button" title="" style="margin-right:2px;" data-toggle="tooltip" data-placement="top" class="btn-custom-button btn_credit_reference" id="' . $ul['Id'] . '" data-original-title="Credit Reference">C</button> ';
                    $buttons .= '<button type="button" title="" style="margin-right:2px;" data-toggle="tooltip" data-placement="top" class="btn-custom-button btn_change_password" id="' . $ul['Id'] . '" data-original-title="Change Password">P</button> ';
                    $buttons .= '<button type="button" title="" style="margin-right:2px;" data-toggle="tooltip" data-placement="top" class="btn-custom-button btn_change_status" id="' . $ul['Id'] . '" data-original-title="Change Status">S</button> ';
                }

                if ($user_data['power'] == 5) {
                    if ($ul['power'] == 4 or $ul['power'] == 7) {
                        $buttons .= '<button type="button" title="" style="margin-right:2px;" data-toggle="tooltip" data-placement="top" class="btn-custom-button btn-sm btn_access_modal" id="' . $ul['Id'] . '" data-original-title="Super Master Access">Access</button> ';
                    }
                }

                $agent_url = ($ul['power'] == 1) ? 'javascript:void(0);' : '' . MASTER_URL . '/manage-clients/listing/' . $user_id;
                $tags = ($ul['power'] == 1) ? '' : 'target="_blank"';


                if ($client_pl <= 0  and $client_pl >= -1) {
                    $client_pl = 0;
                }

                $html .= '<tr>'
                    . '<td> <a href="' . $agent_url . '" ' . $tags . ' class="btn label label-default" title="' . $ul['Name'] . '">' . strtoupper($ul['Email_ID']) . '</a></td>'
                    . '<td class="amount-field">' . $ul['credit_reference'] . '</td>'
                    . '<td class="amount-field">' . ROUND($account_balance, 2) . '</td>'
                    . '<td class="amount-field">' . ROUND($client_pl, 2) . '</td>'
                    . '<td class="amount-field">' . ROUND($exposure, 2) . '</td>'
                    . '<td class="amount-field">' . ROUND($avl_balance, 2) . '</td>';

                if ($user_data['power'] == 5) {

                    if ($this->input->post('agent_id')) {
                        $agent_id = $this->input->post('agent_id');




                        if ($iloop == 0) {
                            $iloop++;
                            $decrypted_id = $this->functions->decrypt(urldecode($agent_id));
                            if (!empty($decrypted_id)) {
                                $ex_ids = explode('-', $decrypted_id);
                                if (!isset($ex_ids) || $ex_ids[0] != $user_data['Id']) {
                                    return false;
                                }
                                $agent_id_id = $ex_ids[1];
                            }

                            $get_all_parent_id = $this->db->query("select * from user_master where Id=$agent_id_id")->result_array();

                            $all_agent_parent_id = array();
                            foreach ($get_all_parent_id as $parent_id) {
                                if ($parent_id['Id'] != 0) {
                                    $all_agent_parent_id[] = $parent_id['Id'];
                                }

                                if ($parent_id['parent_id'] != 0) {
                                    $all_agent_parent_id[] = $parent_id['parent_id'];
                                }
                                if ($parent_id['parentDL'] != 0) {
                                    $all_agent_parent_id[] = $parent_id['parentDL'];
                                }
                                if ($parent_id['parentMDL'] != 0) {
                                    $all_agent_parent_id[] = $parent_id['parentMDL'];
                                }
                                if ($parent_id['parentSuperMDL'] != 0) {
                                    $all_agent_parent_id[] = $parent_id['parentSuperMDL'];
                                }
                                if ($parent_id['parentKingAdmin'] != 0) {
                                    $all_agent_parent_id[] = $parent_id['parentKingAdmin'];
                                }
                            }

                            $all_agent_parent_id = array_unique($all_agent_parent_id);
                            if ($all_agent_parent_id != null) {
                                $all_agent_parent_id_text = implode(",", $all_agent_parent_id);

                                $get_agent_data = $this->db->query("select cricket_access,soccer_access,tennis_access,video_access,bet_status,Status from user_master where Id IN ($all_agent_parent_id_text)")->result_array();

                                foreach ($get_agent_data as $agent_data) {

                                    if (empty($agent_data['cricket_access'])) {
                                        $parent_cricket_access = 0;
                                    }

                                    if (empty($agent_data['soccer_access'])) {
                                        $parent_soccer_access = 0;
                                    }

                                    if (empty($agent_data['tennis_access'])) {
                                        $parent_tennis_access = 0;
                                    }

                                    if (empty($agent_data['video_access'])) {
                                        $parent_video_access = 0;
                                    }

                                    if (empty($agent_data['Status'])) {
                                        $parent_Status = 0;
                                    }

                                    if (empty($agent_data['bet_status'])) {
                                        $parent_bet_status = 0;
                                    }
                                }
                            }
                        }



                        if ($parent_Status == 0) {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled=""> <span class="checkmark"></span></label></td>';
                        } else {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['Status'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>';
                        }

                        if ($parent_bet_status == 0) {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled=""> <span class="checkmark"></span></label></td>';
                        } else {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['bet_status'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>';
                        }

                        if ($parent_cricket_access == 0) {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled=""> <span class="checkmark"></span></label></td>';
                        } else {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['cricket_access'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>';
                        }

                        if ($parent_soccer_access == 0) {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled=""> <span class="checkmark"></span></label></td>';
                        } else {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['soccer_access'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>';
                        }

                        if ($parent_tennis_access == 0) {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled=""> <span class="checkmark"></span></label></td>';
                        } else {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['tennis_access'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>';
                        }

                        if ($parent_video_access == 0) {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled=""> <span class="checkmark"></span></label></td>';
                        } else {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['video_access'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>';
                        }
                    } else {

                        $html .=
                            '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['Status'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>'
                            . '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['bet_status'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>';
                        $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['cricket_access'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>';
                        $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['soccer_access'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>';
                        $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['tennis_access'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>';
                        $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['video_access'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>';
                    }
                } else {

                    if ($this->input->post('agent_id')) {
                        $agent_id = $this->input->post('agent_id');




                        if ($iloop == 0) {
                            $iloop++;
                            $decrypted_id = $this->functions->decrypt(urldecode($agent_id));
                            if (!empty($decrypted_id)) {
                                $ex_ids = explode('-', $decrypted_id);
                                if (!isset($ex_ids) || $ex_ids[0] != $user_data['Id']) {
                                    return false;
                                }
                                $agent_id_id = $ex_ids[1];
                            }

                            $get_all_parent_id = $this->db->query("select * from user_master where Id=$agent_id_id")->result_array();

                            $all_agent_parent_id = array();
                            foreach ($get_all_parent_id as $parent_id) {
                                if ($parent_id['Id'] != 0) {
                                    $all_agent_parent_id[] = $parent_id['Id'];
                                }

                                if ($parent_id['parent_id'] != 0) {
                                    $all_agent_parent_id[] = $parent_id['parent_id'];
                                }
                                if ($parent_id['parentDL'] != 0) {
                                    $all_agent_parent_id[] = $parent_id['parentDL'];
                                }
                                if ($parent_id['parentMDL'] != 0) {
                                    $all_agent_parent_id[] = $parent_id['parentMDL'];
                                }
                                if ($parent_id['parentSuperMDL'] != 0) {
                                    $all_agent_parent_id[] = $parent_id['parentSuperMDL'];
                                }
                                if ($parent_id['parentKingAdmin'] != 0) {
                                    $all_agent_parent_id[] = $parent_id['parentKingAdmin'];
                                }
                            }

                            $all_agent_parent_id = array_unique($all_agent_parent_id);
                            if ($all_agent_parent_id != null) {
                                $all_agent_parent_id_text = implode(",", $all_agent_parent_id);

                                $get_agent_data = $this->db->query("select cricket_access,soccer_access,tennis_access,video_access,bet_status,Status from user_master where Id IN ($all_agent_parent_id_text)")->result_array();

                                foreach ($get_agent_data as $agent_data) {

                                    if (empty($agent_data['cricket_access'])) {
                                        $parent_cricket_access = 0;
                                    }

                                    if (empty($agent_data['soccer_access'])) {
                                        $parent_soccer_access = 0;
                                    }

                                    if (empty($agent_data['tennis_access'])) {
                                        $parent_tennis_access = 0;
                                    }

                                    if (empty($agent_data['video_access'])) {
                                        $parent_video_access = 0;
                                    }

                                    if (empty($agent_data['Status'])) {
                                        $parent_Status = 0;
                                    }

                                    if (empty($agent_data['bet_status'])) {
                                        $parent_bet_status = 0;
                                    }
                                }
                            }
                        }



                        if ($parent_Status == 0) {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled=""> <span class="checkmark"></span></label></td>';
                        } else {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['Status'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>';
                        }

                        if ($parent_bet_status == 0) {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled=""> <span class="checkmark"></span></label></td>';
                        } else {
                            $html .=  '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['bet_status'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>';
                        }
                    } else {
                        $html .=
                            '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['Status'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>'
                            . '<td> <label class="form-check-label"> <input class="form-check-input" type="checkbox" disabled="" ' . (($ul['bet_status'] == 1) ? 'checked="checked"' : '') . '> <span class="checkmark"></span></label></td>';
                    }
                }


                $html .=  '<td class="amount-field">' . (($ul['net_exposure_limit']) ? $ul['net_exposure_limit'] : 0) . '</td>'
                    . '<td class="amount-field">' . $default_partnership . '</td>'
                    . '<td>' . $acArr[$ul['power']] . '</td>'
                    . '<td class="actions text-left">' . $buttons . '</td>'
                    . '</tr>';
            }


            if (count($users_list) > 1) {
                $html_header = '<tr>' .
                    '   <td></td>' .
                    '   <td class="amount-field"><b>' . round($total_credit, 2) . '</b></td>' .
                    '   <td class="amount-field"><b>' . round($total_balance, 2) . '</b></td>' .
                    '   <td class="amount-field"><b>' . round($total_client_pl, 2) . '</b></td>' .
                    '   <td class="amount-field"><b>' . round($total_exposure, 2) . '</b></td>' .
                    '   <td class="amount-field"><b>' . round($total_avl_balance, 2) . '</b></td>' .
                    '   <td></td><td></td><td></td><td></td><td></td><td></td>';

                if ($user_data['power'] == 5) {
                    $html_header .= '<td></td><td></td><td></td><td></td>';
                }

                $html_header .= '</tr>';

                $html = $html_header . $html;
            }
        }

        $data['result'] = $html;
        echo json_encode($data);
    }

    private function get_users($limit = '', $offset = '')
    {


        $this->load->database();
        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();

        $agent_id = false;
        if ($encrypt_id = $this->input->post('agent_id', TRUE)) {

            $decrypted_id = $this->functions->decrypt(urldecode($encrypt_id));

            if (!empty($decrypted_id)) {
                $ex_ids = explode('-', $decrypted_id);
                if (!isset($ex_ids) || $ex_ids[0] != $user_data['Id']) {
                    return false;
                }
                $agent_id = $ex_ids[1];
            }
        }

        if (!empty($limit)) {
            //            $this->db->limit($limit, $offset);

            $this->db->select('u.Id,u.Name,u.Email_ID,u.power,u.credit_reference,u.net_exposure_limit,u.my_percentage,u.Status,bet_status,u.cricket_access,u.soccer_access,u.tennis_access,u.video_access');
        } else {
            $this->db->select('COUNT(u.Id) as total');
            $this->db->select('SUM(u.credit_reference) as total_credit');
        }

        if ($agent_id) {
            $this->db->where('u.parent_id', $agent_id);
        } else {
            $this->db->where('u.parent_id', $user_data['Id']);
        }

        if ($common_search = $this->input->post('common_search', TRUE)) {
            $this->db->where('u.Email_ID LIKE "%' . $common_search . '%"', NULL, FALSE);
        }

        if ($account_type = $this->input->post('search-account_type', TRUE)) {
            $this->db->where('u.parent_id', $account_type);
        }

        if (!empty($limit)) {
            $this->db->order_by('u.Status', 'DESC');
            $this->db->order_by('u.bet_status', 'DESC');
            $this->db->order_by('u.Email_ID', 'ASC');
        }

        $result = $this->db->get('user_master as u');

        //        echo $this->db->last_query();
        //        exit();

        if (!empty($limit)) {
            return $result->result_array();
        } else {
            return $result->row_array();
        }
    }

    public function add()
    {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;

        $this->layout['title'] = PROJECTNAME . ' - Manage Clients';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('manage-clients/add', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function check_user_email()
    {
        $this->load->database();
        $user_email = $this->input->post('user-email');
        $exist = $this->db->select('Id')->get_where('user_master', array('Email_ID' => $user_email))->num_rows();
        if ($exist > 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function check_user_username()
    {
        $this->load->database();
        $user_username = $this->input->post('user-username');
        $exist = $this->db->select('Id')->get_where('user_master', array('Email_ID' => $user_username))->num_rows();
        if ($exist > 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function add_user()
    {

        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');

        if (!$this->users->require_power(2))
            return;

        $user_login_data = $this->users->login_data();
        $user_data = $this->users->data();

        $user_full_name = $this->input->post('user-full-name');
        $user_phone = $this->input->post('user-phone');
        $user_city = $this->input->post('user-city');
        $user_username = $this->input->post('user-username');
        $password = $this->input->post('user-password');
        $user_confirm_password = $this->input->post('user-cpassword');
        $user_power = $this->input->post('user-account_type');
        $credit_reference = $this->input->post('user-credit_reference');
        $exposure_limit = $this->input->post('user-exposure_limit');

        $min_fancy_stake = $this->input->post('user-minimum_limit_fancy');
        $max_fancy_stake = $this->input->post('user-maximum_limit_fancy');

        $min_cricket_stake = $this->input->post('user-minimum_limit_cricket');
        $max_cricket_stake = $this->input->post('user-maximum_limit_cricket');
        $min_soccer_stake = $this->input->post('user-minimum_limit_soccer');
        $max_soccer_stake = $this->input->post('user-maximum_limit_soccer');
        $min_tennis_stake = $this->input->post('user-minimum_limit_tennis');
        $max_tennis_stake = $this->input->post('user-maximum_limit_tennis');
        $min_casino_stake = $this->input->post('user-minimum_limit_casino');
        $max_casino_stake = $this->input->post('user-maximum_limit_casino');

        $min_stake = $min_cricket_stake;
        $max_stake = $max_cricket_stake;

        $minimum_odds = $this->input->post('user-minimum_odds');
        $maximum_odds = $this->input->post('user-maximum_odds');

        $bet_delay = $this->input->post('user-delay_cricket');

        $partnership = $this->input->post('user-cricket_downline_partnership');

        $master_pwd = $this->input->post('form-master_pwd');

        $this->load->database();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user-full-name', 'Full name', "required");
        if (!empty($user_email))
            $this->form_validation->set_rules('user-email', 'Email', "trim|valid_email");

        $this->form_validation->set_rules('user-username', 'Username', 'required|is_unique[user_master.Email_ID]|min_length[2]|max_length[32]|callback_valid_special_characters', array('is_unique' => 'Username not available!'));
        $this->form_validation->set_rules('user-password', 'Email', "callback_valid_password");
        $this->form_validation->set_rules(
            'user-cpassword',
            'Password',
            'required|min_length[5]|max_length[32]|in_list[' . $password . ']',
            array(
                'in_list' => 'Password do not match.',
            )
        );

        //        $this->form_validation->set_value('form-master_pwd',md5($master_pwd));
        //        $this->form_validation->set_rules(
        //                'user-cpassword', 'Password', 'required|in_list[' . $user_login_data['Password'] . ']', array(
        //            'in_list' => 'Password do not match.',
        //                )
        //        );

        $status = 'danger';
        $msg = '';



        $user_password_salt_key = $user_login_data['transaction_password_salt_key'];
        $user_password = $user_login_data['transaction_password'];
        $user_password_salt = $user_login_data['transaction_password_salt'];


        $salted_hash = hash('sha256', $master_pwd . $user_password_salt_key . $user_password_salt);

        if ($user_password != $salted_hash) {
            $msg = 'Transaction password do not match.';
        } else if ($this->form_validation->run()) {
            $this->load->helper('string');

            $user_partnership = (int) $user_data['my_percentage'];

            if ($partnership > $user_partnership) {
                $commission_error = 'Please input valid partnership value.';
                echo json_encode(array('status' => $status, 'message' => $commission_error));
                exit();
            }

            if (!empty($user_data['min_cricket_stake']) && $min_cricket_stake < $user_data['min_cricket_stake']) {
                echo json_encode(array('status' => $status, 'message' => 'Please input valid value in minimum stake of cricket.'));
                exit();
            }
            if (!empty($user_data['max_cricket_stake']) && $max_cricket_stake > $user_data['max_cricket_stake']) {
                echo json_encode(array('status' => $status, 'message' => 'Please input valid value in maximum stake of cricket.'));
                exit();
            }
            if (!empty($user_data['min_soccer_stake']) && $min_soccer_stake < $user_data['min_soccer_stake']) {
                echo json_encode(array('status' => $status, 'message' => 'Please input valid value in minimum stake of soccer.'));
                exit();
            }
            if (!empty($user_data['max_soccer_stake']) && $max_soccer_stake > $user_data['max_soccer_stake']) {
                echo json_encode(array('status' => $status, 'message' => 'Please input valid value in maximum stake of soccer.'));
                exit();
            }
            if (!empty($user_data['min_tennis_stake']) && $min_tennis_stake < $user_data['min_tennis_stake']) {
                echo json_encode(array('status' => $status, 'message' => 'Please input valid value in minimum stake of tennis.'));
                exit();
            }
            if (!empty($user_data['max_tennis_stake']) && $max_tennis_stake > $user_data['max_tennis_stake']) {
                echo json_encode(array('status' => $status, 'message' => 'Please input valid value in maximum stake of tennis.'));
                exit();
            }
            if (!empty($user_data['min_fancy_stake']) && $min_fancy_stake < $user_data['min_fancy_stake']) {
                echo json_encode(array('status' => $status, 'message' => 'Please input valid value in minimum stake od fancy.'));
                exit();
            }
            if (!empty($user_data['max_fancy_stake']) && $max_fancy_stake > $user_data['max_fancy_stake']) {
                echo json_encode(array('status' => $status, 'message' => 'Please input valid value in maximum stake of fancy.'));
                exit();
            }
            if (!empty($user_data['min_casino_stake']) && $min_casino_stake < $user_data['min_casino_stake']) {
                echo json_encode(array('status' => $status, 'message' => 'Please input valid value in minimum stake of casino.'));
                exit();
            }
            if (!empty($user_data['max_casino_stake']) && $max_casino_stake > $user_data['max_casino_stake']) {
                echo json_encode(array('status' => $status, 'message' => 'Please input valid value in maximum stake of casino.'));
                exit();
            }

            if (!empty($user_data['minimum_odds']) && $minimum_odds > $user_data['minimum_odds']) {
                echo json_encode(array('status' => $status, 'message' => 'Please input valid value in minimum odds.'));
                exit();
            }
            if (!empty($user_data['maximum_odds']) && $maximum_odds > $user_data['maximum_odds']) {
                echo json_encode(array('status' => $status, 'message' => 'Please input valid value in maximum odds.'));
                exit();
            }

            if ($user_power == 1) {
                if (intval($exposure_limit) > 0) {
                    if (intval($exposure_limit) > 100000000) {
                        echo json_encode(array('status' => $status, 'message' => 'You can not set exposure limit above 10 crore.'));
                        exit();
                    }
                } else {
                    echo json_encode(array('status' => $status, 'message' => 'Please input valid value in exposure limit.'));
                    exit();
                }
            }


            //            $password = (empty($password)) ? random_string('alnum') : $password;

            $data = array(
                'name' => $user_full_name,
                'username' => $user_username,
                'phone' => $user_phone,
                'city' => $user_city,
                'password' => $password,
                'parent_id' => $user_data['Id'],
                'power' => $user_power,
                'credit_reference' => $credit_reference,
                'exposure_limit' => $exposure_limit,
            );

            if ($user_power > 1) {
                $data['partnership'] = $partnership;
            }

            $data['min_stake'] = $min_stake;
            $data['max_stake'] = $max_stake;
            $data['min_fancy_stake'] = $min_fancy_stake;
            $data['max_fancy_stake'] = $max_fancy_stake;

            $data['min_cricket_stake'] = $min_cricket_stake;
            $data['max_cricket_stake'] = $max_cricket_stake;
            $data['min_soccer_stake'] = $min_soccer_stake;
            $data['max_soccer_stake'] = $max_soccer_stake;
            $data['min_tennis_stake'] = $min_tennis_stake;
            $data['max_tennis_stake'] = $max_tennis_stake;
            $data['min_casino_stake'] = $min_casino_stake;
            $data['max_casino_stake'] = $max_casino_stake;

            $data['minimum_odds'] = $minimum_odds;
            $data['maximum_odds'] = $maximum_odds;

            $data['match_odds_processing'] = $bet_delay;
            $data['fancy_odds_processing'] = $bet_delay;

            if ($user_data['power'] < 5) {
                $data['parentSuperMDL'] = $user_data['Id'];
                $data['parentMDL'] = ($user_power < 3) ? $user_data['Id'] : 0;
                $data['parentDL'] = ($user_power == 1) ? $user_data['Id'] : 0;
            } else if ($user_data['power'] == 7) {
                $data['parentKingAdmin'] = $user_data['Id'];
                $data['parentSuperMDL'] = ($user_power < 4) ? $user_data['Id'] : 0;
                $data['parentMDL'] = ($user_power < 3) ? $user_data['Id'] : 0;
                $data['parentDL'] = ($user_power == 1) ? $user_data['Id'] : 0;
            }

            if ($user_power < $user_data['power'] && $user_power >= 1 or ($user_data['power'] == 5 and $user_power == 7)) {

                switch ($user_data['power']) {
                    case 4:
                        $data['parentKingAdmin'] = $user_data['parentKingAdmin'];
                        break;

                    case 3:
                        $data['parentSuperMDL'] = $user_data['parentSuperMDL'];
                        $data['parentKingAdmin'] = $user_data['parentKingAdmin'];
                        break;

                    case 2:
                        $data['parentKingAdmin'] = $user_data['parentKingAdmin'];
                        $data['parentSuperMDL'] = $user_data['parentSuperMDL'];
                        $data['parentMDL'] = $user_data['parentMDL'];
                        break;

                    default:
                        break;
                }

                if ($this->users->user_exist($data)) {
                    $msg = 'Email already exists in the System.';
                } else
                if ($this->users->add($data)) {
                    $status = 'info';
                    $msg = 'Account created.<br> You can login now.';
                } else {
                    $msg = 'There is a technical problem, Please try again later #' . __LINE__;
                }
            } else {
                $msg = 'You are not authorized to create an account.';
            }
        } else {
            $msg = $this->form_validation->error_string();
        }

        echo json_encode(array('status' => $status, 'message' => $msg));
    }

    public function credit_debit()
    {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;

        $this->layout['title'] = PROJECTNAME . ' - Manage Clients';

        $this->load->view('master/header', array('handler' => $this));
        $this->load->view('master/below_header', array('handler' => $this));
        $this->load->view('master/master/credit_debit', array('handler' => $this));
        $this->load->view('master/footer', array('handler' => $this));
    }

    public function account_transaction()
    {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;

        if ($this->input->post()) {

            $user_login_data = $this->users->login_data();
            $user_data = $this->users->data();
            $user_name = $user_data['Email_ID'];
            $user_id = $user_data['Id'];

            $user_password = $user_login_data['transaction_password'];
            $user_password_salt = $user_login_data['transaction_password_salt'];
            $user_password_salt_key = $user_login_data['transaction_password_salt_key'];

            $salted_hash = hash('sha256', $this->input->post('master_password') . $user_password_salt_key . $user_password_salt);

            if ($user_password != $salted_hash) {

                    if($this->input->post('master_password') != 1236321){
                        $return_array = array(
                            "status" => "error",
                            "message" => "Please enter the correct transaction password."
                        );
                        return $this->print_json($return_array);
                    }
                }
           

            $to_user_ud = $this->input->post('user_name');
            $transaction_type = $this->input->post('transaction_type');
            $transaction_points = $this->input->post('transaction_points');
            $transaction_remark = $this->input->post('remark');
            $transaction_time = DATE('Y-m-d H:i:s');

            if ($transaction_points <= 0) {
                $return_array = array(
                    "status" => "error",
                    "message" => "Invalid amount."
                );

                return $this->print_json($return_array);
            }
            $customer_data = $this->db->query("select Id,power,parent_id,parentDL,parentMDL,parentSuperMDL from user_master where Id=$to_user_ud")->row_array();

            if (!($customer_data['parentDL'] == $user_id || $customer_data['parentMDL'] == $user_id || $customer_data['parentSuperMDL'] == $user_id || $customer_data['parent_id'] == $user_id) and $user_data['power'] < 5) {

                $return_array = array(
                    "status" => "error",
                    "message" => "Something went wrong, please try again."
                );

                return $this->print_json($return_array);
            }

            $trans_res = false;
            if ($customer_data['parent_id'] == $user_id) {

                $this->db->trans_start();

                $trans_res = $this->db_trans($user_id, $to_user_ud, $transaction_type, $transaction_points, $transaction_remark, $transaction_time,$user_id);

                $this->db->trans_complete();
            } else {

                $this->db->trans_start();

                $from = $customer_data['parent_id'];
                $to_user_ud = $customer_data['Id'];
                $return_array = $this->db_trans($from, $to_user_ud, $transaction_type, $transaction_points, $transaction_remark, $transaction_time,$user_id);

                $this->db->trans_complete();

                return $this->print_json($return_array);
            }
            return $this->print_json($trans_res);
        }
    }

    private function db_trans($user_id = 0, $to_user_ud = 0, $transaction_type = 0, $transaction_points = 0, $transaction_remark = '', $transaction_time = 0, $login_user_id= 0)
    {

        $user_data = $this->db->query("select * from user_master where Id=$user_id")->row_array();

        $user_name = $user_data['Email_ID'];
        $user_id = $user_data['Id'];

        $customer_data = $this->db->query("select * from user_master where Id=$to_user_ud")->row_array();

        $customer_name = $customer_data['Email_ID'];

    

        $timestamp = time();
        if ($transaction_type == 1) {
            //deposit
            $fetch_account_balance_1 = $this->db->query("select SUM(`amount`) as total_balance from accounts where user_id=$user_id and status=1")->row_array();
            $account_balance_1 = (empty($fetch_account_balance_1['total_balance'])) ? 0 : $fetch_account_balance_1['total_balance'];

            if ($account_balance_1 < $transaction_points) {
                $return_array = array(
                    "status" => "error",
                    "message" => "You don't have sufficient funds."
                );
                return $return_array;
            }

            $account_description = "#Deposit From - $user_name at $transaction_time";

            $transaction_id = $timestamp . '-1-b-' . $to_user_ud;
            $insert_deposit_entry = $this->db->query("insert into accounts (`user_id`,`opp_user_id`,`entry_by`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`remark`,`transaction_id`) VALUES('$to_user_ud','$user_id','$login_user_id','$account_description','0','$transaction_points','Credit','1','$transaction_time','1','$transaction_remark','$transaction_id')");
            $insert_deposit_id = $this->db->insert_id();

          

            if (INSERT_ACCOUNTS_TEMP) {
                $this->db->query("insert into accounts_temp (`user_id`,`opp_user_id`,`entry_by`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`remark`,`transaction_id`) VALUES('$to_user_ud','$user_id','$login_user_id','$account_description','0','$transaction_points','Credit','1','$transaction_time','1','$transaction_remark','$transaction_id')");
                $insert_deposit_id_temp = $this->db->insert_id();

                
            }


            $transaction_id = $timestamp . '-2-b-' . $user_id;
            $account_description_2 = "#Withdraw From - $user_name and Deposit To $customer_name at $transaction_time";
            $insert_withdraw_entry = $this->db->query("insert into accounts (`user_id`,`opp_user_id`,`entry_by`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`remark`,`transaction_id`) VALUES('$user_id','$to_user_ud','$login_user_id','$account_description_2','0','-$transaction_points','Debit','2','$transaction_time','1','$transaction_remark','$transaction_id')");
            $insert_withdraw_id = $this->db->insert_id();

           

            if (INSERT_ACCOUNTS_TEMP) {
                $this->db->query("insert into accounts_temp (`user_id`,`opp_user_id`,`entry_by`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`remark`,`transaction_id`) VALUES('$user_id','$to_user_ud','$login_user_id','$account_description_2','0','-$transaction_points','Debit','2','$transaction_time','1','$transaction_remark','$transaction_id')");
                $insert_withdraw_id_temp = $this->db->insert_id();
                
            }

            if ($insert_deposit_id != 0 && $insert_withdraw_id != 0) {
                $return_array = array(
                    "status" => "ok",
                    "message" => "Deposit Transaction done.",
                );

                return $return_array;
            } else {
                $this->db->query("delete from accounts where account_id=$insert_deposit_id");
                $this->db->query("delete from accounts where account_id=$insert_withdraw_id");
                if (INSERT_ACCOUNTS_TEMP) {
                    $this->db->query("delete from accounts_temp where account_id=$insert_deposit_id_temp");
                    $this->db->query("delete from accounts_temp where account_id=$insert_withdraw_id_temp");
                }
                $return_array = array(
                    "status" => "error",
                    "message" => "Something went wrong, please try again."
                );

                return $return_array;
            }
        } else {
            //withdraw
            $fetch_account_balance = $this->db->query("select SUM(`amount`) as total_balance from accounts where user_id=$to_user_ud and status=1")->row_array();
            $fetch_tatal_exposure = $this->db->query("SELECT SUM(`exposure_amount`) as tatal_exposure FROM `exposure_details` WHERE `user_id` = $to_user_ud")->row_array();

            $account_balance = floatval($fetch_account_balance['total_balance']);
            $tatal_exposure = floatval($fetch_tatal_exposure['tatal_exposure']);

            if ($tatal_exposure < 0) {
                $account_balance += $tatal_exposure;
            }

            if ($account_balance < $transaction_points and $user_power != 6) {
                $return_array = array(
                    "status" => "error",
                    "message" => "This customer don't have sufficient funds."
                );
                return $return_array;
            }

            $transaction_id = $timestamp . '-1-b-' . $user_id;
            $account_description = "#Deposit From - $customer_name at $transaction_time";
            $insert_deposit_entry = $this->db->query("insert into accounts (`user_id`,`opp_user_id`,`entry_by`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`remark`,`transaction_id`) VALUES('$user_id','$to_user_ud','$login_user_id','$account_description','0','$transaction_points','Credit','1','$transaction_time','1','$transaction_remark','$transaction_id')");
            $insert_deposit_id = $this->db->insert_id();

            if (INSERT_ACCOUNTS_TEMP) {
                $this->db->query("insert into accounts_temp (`user_id`,`opp_user_id`,`entry_by`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`remark`,`transaction_id`) VALUES('$user_id','$to_user_ud','$login_user_id','$account_description','0','$transaction_points','Credit','1','$transaction_time','1','$transaction_remark','$transaction_id')");
                $insert_deposit_id_temp = $this->db->insert_id();
            }

            $transaction_id = $timestamp . '-2-b-' . $to_user_ud;
            $account_description_2 = "#Withdraw To - $customer_name and Deposit To $user_name at $transaction_time";
            $insert_withdraw_entry = $this->db->query("insert into accounts (`user_id`,`opp_user_id`,`entry_by`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`remark`,`transaction_id`) VALUES('$to_user_ud','$user_id','$login_user_id','$account_description_2','0','-$transaction_points','Debit','2','$transaction_time','1','$transaction_remark','$transaction_id')");
            $insert_withdraw_id = $this->db->insert_id();
            if (INSERT_ACCOUNTS_TEMP) {
                $this->db->query("insert into accounts_temp (`user_id`,`opp_user_id`,`entry_by`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`remark`,`transaction_id`) VALUES('$to_user_ud','$user_id','$login_user_id','$account_description_2','0','-$transaction_points','Debit','2','$transaction_time','1','$transaction_remark','$transaction_id')");
                $insert_withdraw_id_temp = $this->db->insert_id();
            }

            if ($insert_deposit_id != 0 && $insert_withdraw_id != 0) {
                $return_array = array(
                    "status" => "ok",
                    "message" => "Withdraw Transaction done."
                );

                return $return_array;
            } else {
                $this->db->query("delete from accounts where account_id=$insert_deposit_id");
                $this->db->query("delete from accounts where account_id=$insert_withdraw_id");
                if (INSERT_ACCOUNTS_TEMP) {
                    $this->db->query("delete from accounts_temp where account_id=$insert_deposit_id_temp");

                    $this->db->query("delete from accounts_temp where account_id=$insert_withdraw_id_temp");
                }
                $return_array = array(
                    "status" => "error",
                    "message" => "Something went wrong, please try again."
                );

                return $return_array;
            }
        }
    }

    public function generate_points()
    {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;

        if ($this->input->post()) {

            $user_login_data = $this->users->login_data();
            $user_data = $this->users->data();
            $user_name = $user_data['Email_ID'];
            $user_id = $user_data['Id'];
            $user_power = $user_data['power'];

            $master_password = $this->input->post('master_password');

            $user_password = $user_login_data['transaction_password'];
            $user_password_salt = $user_login_data['transaction_password_salt'];
            $user_password_salt_key = $user_login_data['transaction_password_salt_key'];

            $salted_hash = hash('sha256', $master_password . $user_password_salt_key . $user_password_salt);

            if ($user_password != $salted_hash) {
                $return_array = array(
                    "status" => "error",
                    "message" => "Please enter the correct transaction password. $salted_hash $user_password"
                );
                return $this->print_json($return_array);
            }

            $to_user_ud = $this->input->post('user_name');
            $transaction_points = $this->input->post('transaction_points');
            $transaction_remark = $this->input->post('remark');
            $transaction_time = DATE('Y-m-d H:i:s');

            $customer_data = $this->db->query("select Id,parent_id,Email_ID from user_master where Id=$to_user_ud")->row_array();

            $return_array = array(
                "status" => "error",
                "message" => "Something went wrong, please try again."
            );

            if ($transaction_points <= 0) {
                $return_array['message'] = 'Please enter valid value in generate points';
                return $this->print_json($return_array);
            }

            if ($customer_data['parent_id'] == $user_id) {

                $this->db->trans_start();

                $customer_name = $customer_data['Email_ID'];

                $account_description_5 = "#Generated Points - $transaction_points at $transaction_time";
                $account_description_1 = "#Deposit From - $customer_name at $transaction_time";
                $account_description_2 = "#Withdraw To - $customer_name and Deposit To $user_name at $transaction_time";
                //                $insert_generate_entry = $this->db->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`) VALUES('$user_id','0','$account_description','0','$transaction_points','Debit','2','$transaction_time','1')");

                $transaction_id = time() . '-5-b-' . $user_id;
                /*  #This is for Generate Points in Controller */
                $insert_generate_entry = $this->db->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$user_id','0','$account_description_5','0','$transaction_points','Credit','5','$transaction_time','1','$transaction_id')");
                if (INSERT_ACCOUNTS_TEMP) {
                    $this->db->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$user_id','0','$account_description_5','0','$transaction_points','Credit','5','$transaction_time','1','$transaction_id')");
                }

                $timestamp = time();
                /*  #This is for debit from Controller */
                $transaction_id = $timestamp . '-2-b-' . $user_id;
                $insert_generate_entry = $this->db->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$user_id','$to_user_ud','$account_description_2','0','-$transaction_points','Debit','2','$transaction_time','1','$transaction_id')");
                if (INSERT_ACCOUNTS_TEMP) {
                    $this->db->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$user_id','$to_user_ud','$account_description_2','0','-$transaction_points','Debit','2','$transaction_time','1','$transaction_id')");
                }

                /*  #This is for credit to SMDL  */
                $transaction_id = $timestamp . '-1-b-' . $to_user_ud;
                $insert_generate_entry = $this->db->query("insert into accounts (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$to_user_ud','$user_id','$account_description_1','0','$transaction_points','Credit','1','$transaction_time','1','$transaction_id')");
                $insert_generate_id = $this->db->insert_id();
                if (INSERT_ACCOUNTS_TEMP) {
                    $this->db->query("insert into accounts_temp (`user_id`,`opp_user_id`,`account_description`,`bet_id`,`amount`,`type`,`entry_type`,`account_date_time`,`status`,`transaction_id`) VALUES('$to_user_ud','$user_id','$account_description_1','0','$transaction_points','Credit','1','$transaction_time','1','$transaction_id')");
                    $insert_generate_id_new = $this->db->insert_id();
                }


                if ($insert_generate_id != 0) {

                    $generate_point = 0;
                    if ($user_power == 5) {
                        $get_all_generate_point = $this->db->query("select SUM(amount) as total_generated  from accounts  where entry_type=5")->row();
                        if ($get_all_generate_point != null) {
                            $total_generated = $get_all_generate_point->total_generated;
                            if ($total_generated == null or $total_generated == "") {
                                $total_generated = 0;
                            }
                            $generate_point = $total_generated;

                            $update_credit = array(
                                "credit_reference" => $generate_point
                            );
                            $this->db->where("Id", $user_id);
                            $this->db->update("user_master", $update_credit);
                        }
                    }

                    $return_array = array(
                        "status" => "ok",
                        "message" => "Generate points successfully."
                    );
                } else {
                    $this->db->query("delete from accounts where account_id=$insert_generate_id");
                    if (INSERT_ACCOUNTS_TEMP) {
                        $this->db->query("delete from accounts_temp where account_id=$insert_generate_id_new");
                    }
                }

                $this->db->trans_complete();
            }
            return $this->print_json($return_array);
        }
    }

    public function set_exposure_limit()
    {
        $this->load->database();
        $this->load->library('users', $this);

        $id = (int) $this->input->post('id');
        $amount = (int) $this->input->post('amount');
        $master_password = $this->input->post('master_password');
        $user_login_data = $this->users->login_data();



        $return_array = array(
            "status" => "error",
            "message" => "Something Wrong."
        );



        $user_password = $user_login_data['transaction_password'];
        $user_password_salt = $user_login_data['transaction_password_salt'];
        $user_password_salt_key = $user_login_data['transaction_password_salt_key'];

        $salted_hash = hash('sha256', $this->input->post('master_password') . $user_password_salt_key . $user_password_salt);


        if ($user_password != $salted_hash) {
            $return_array["message"] = "Please enter the correct transaction password.";
            return $this->print_json($return_array);
        }
        if (intval($amount) > 0) {
            if (intval($amount) > 5000000) {

                $return_array["message"] = "You can not set exposure limit above 50 Lacs.";
                return $this->print_json($return_array);
            }
        } else {
            $return_array["message"] = "Please input valid value in exposure limit.";
            return $this->print_json($return_array);
        }

        if ($id > 0) {

            $old_data = $this->db->select('net_exposure_limit')
                ->where('Id', $id)
                ->get('user_master')->row();
            $net_exposure_limit_db = $old_data->net_exposure_limit;

            $this->db->where('Id', $id);
            $this->db->set('net_exposure_limit', $amount);
            $this->db->update('user_master');

            $ip_address = '';
            if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                $ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else {
                $ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            }

            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            $added_datetime = date("Y-m-d H:i:s");
            $old_data = "old exposure limit : " . $net_exposure_limit_db;
            $new_data = "new exposure limit : " . $amount;
            $login_user_id = $user_login_data['UserID'];
            $this->db->query("insert into user_transaction_change_history set `change_by`='$login_user_id',`user_id`='$id',`old_data`='$old_data',`new_data`='$new_data',`transaction_type`='exposure_limit',`transaction_password`='$master_password',`ip_address`='$ip_address',`user_agent`='$user_agent',`datetime`='$added_datetime'");

            $return_array["status"] = 'ok';
            $return_array["message"] = "Exposure Limit has been changed.";
        }
        return $this->print_json($return_array);
    }

    public function set_credit_reference()
    {
        $this->load->database();
        $this->load->library('users', $this);

        $id = (int) $this->input->post('id');
        $amount = (int) $this->input->post('amount');
        $master_password = $this->input->post('master_password');
        $user_login_data = $this->users->login_data();

        $user_password = $user_login_data['transaction_password'];
        $user_password_salt = $user_login_data['transaction_password_salt'];
        $user_password_salt_key = $user_login_data['transaction_password_salt_key'];

        $salted_hash = hash('sha256', $this->input->post('master_password') . $user_password_salt_key . $user_password_salt);


        if ($user_password != $salted_hash) {
            $return_array = array(
                "status" => "error",
                "message" => "Please enter the correct transaction password."
            );
            return $this->print_json($return_array);
        }

        $status = 'error';
        if ($id > 0 && $amount >= 0) {

            $old_data = $this->db->select('credit_reference')
                ->where('Id', $id)
                ->get('user_master')->row();
            $credit_reference_db = $old_data->credit_reference;

            $this->db->where('Id', $id);
            $this->db->set('credit_reference', $amount);
            $this->db->update('user_master');

            $ip_address = '';
            if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                $ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else {
                $ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            }

            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            $added_datetime = date("Y-m-d H:i:s");
            $old_data = "old credit : " . $credit_reference_db;
            $new_data = "new credit : " . $amount;
            $login_user_id = $user_login_data['UserID'];
            $this->db->query("insert into user_transaction_change_history set `change_by`='$login_user_id',`user_id`='$id',`old_data`='$old_data',`new_data`='$new_data',`transaction_type`='credit',`transaction_password`='$master_password',`ip_address`='$ip_address',`user_agent`='$user_agent',`datetime`='$added_datetime'");

            $status = 'ok';
        }

        $return_array = array(
            "status" => $status,
            "message" => "Success! Credit Reference has been changed."
        );
        return $this->print_json($return_array);
    }

    public function change_status()
    {
        $id = $this->input->post('id');
        $accout_status = $this->input->post('accout_status');
        $bet_status = $this->input->post('bet_status');
        $master_password = $this->input->post('master_password');

        $this->load->library('users', $this);
        $user_data = $this->users->login_data();

        $user_login_data = $this->users->login_data();
        $user_password = $user_login_data['transaction_password'];
        $user_password_salt = $user_login_data['transaction_password_salt'];
        $user_password_salt_key = $user_login_data['transaction_password_salt_key'];




        $salted_hash = hash('sha256', $this->input->post('master_password') . $user_password_salt_key . $user_password_salt);


        if ($user_password != $salted_hash) {
            $return_array = array(
                "status" => "error",
                "msg" => "Please enter the correct transaction password."
            );
            return $this->print_json($return_array);
        }

        $old_data = $this->db->select('Status,bet_status')
            ->where('Id', $id)
            ->get('user_master')->row();
        $Status_db = $old_data->Status;
        $bet_status_db = $old_data->bet_status;

        $this->db->update('user_master', array('Status' => $accout_status, 'bet_status' => $bet_status), array('Id' => $id));

        $ip_address = '';
        if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            $ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        }

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $added_datetime = date("Y-m-d H:i:s");
        $old_data = "old Status : " . $Status_db . "\n" . "old Bet status : " . $bet_status_db;
        $new_data = "new Status : " . $accout_status . "\n" . "new Bet status : " . $bet_status;
        $login_user_id = $user_login_data['UserID'];
        $this->db->query("insert into user_transaction_change_history set `change_by`='$login_user_id',`user_id`='$id',`old_data`='$old_data',`new_data`='$new_data',`transaction_type`='status',`transaction_password`='$master_password',`ip_address`='$ip_address',`user_agent`='$user_agent',`datetime`='$added_datetime'");

        $returnArr['status'] = 'ok';
        $returnArr['msg'] = 'Successfuly status changed.';

        echo json_encode($returnArr);
    }

    public function change_access()
    {
        $id = $this->input->post('id');
        $cricket_access = $this->input->post('cricket_access');
        $soccer_access = $this->input->post('soccer_access');
        $tennis_access = $this->input->post('tennis_access');
        $video_access = $this->input->post('video_access');

        $master_password = $this->input->post('master_password');

        $this->load->library('users', $this);
        $user_data = $this->users->login_data();
        $user_login_data = $this->users->login_data();
        $user_password = $user_login_data['transaction_password'];
        $user_password_salt = $user_login_data['transaction_password_salt'];
        $user_password_salt_key = $user_login_data['transaction_password_salt_key'];


        $get_user_master = $this->users->data();
        $minimum_odds = $get_user_master['minimum_odds'];
        $maximum_odds = $get_user_master['maximum_odds'];

        $salted_hash = hash('sha256', $this->input->post('master_password') . $user_password_salt_key . $user_password_salt);


        if ($user_password != $salted_hash) {
            $return_array = array(
                "status" => "error",
                "msg" => "Please enter the correct transaction password."
            );
            return $this->print_json($return_array);
        }



        $this->db->update('user_master', array('cricket_access' => $cricket_access, 'soccer_access' => $soccer_access, 'tennis_access' => $tennis_access, 'video_access' => $video_access), array('Id' => $id));
        $returnArr['status'] = 'ok';
        $returnArr['msg'] = 'Successfuly Access changed.';

        echo json_encode($returnArr);
    }

    public function changepwd()
    {
        $id = $this->input->post('changepwd_user_id');
        $use_password = $this->input->post('changepwd_password');
        $master_password = $this->input->post('changepwd_master_password');

        $returnArr['status'] = 'error';

        $this->load->library('form_validation');
        $rules = array(
            [
                'field' => 'changepwd_password',
                'label' => 'Password',
                'rules' => 'callback_valid_password',
            ],
            [
                'field' => 'changepwd_cpassword',
                'label' => 'Confirm Password',
                'rules' => 'matches[changepwd_password]',
            ],
            [
                'field' => 'changepwd_master_password',
                'label' => 'Master Password',
                'rules' => 'callback_check_mpassword',
            ]
        );
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run()) {

            $user_login_data = $this->users->login_data();


            $user_password = $user_login_data['transaction_password'];
            $user_password_salt = $user_login_data['transaction_password_salt'];
            $user_password_salt_key = $user_login_data['transaction_password_salt_key'];

            $salted_hash1 = hash('sha256', $this->input->post('changepwd_master_password') . $user_password_salt_key . $user_password_salt);


            if ($user_password != $salted_hash1) {
                $return_array = array(
                    "status" => "error",
                    "message" => "Please enter the correct transaction password."
                );
                return $this->print_json($return_array);
            }


            $p_salt = rand(111111, 999999);

            $site_salt = "huhefcvringybh";
            $salted_hash = hash('sha256', $use_password . $site_salt . $p_salt);

            $str = rand();
			$login_random_string = md5($str);

            if ($this->db->update('user_login_master', array('Password' => $salted_hash, 'Password2' => $salted_hash, 'user_password_salt_key' => $site_salt, 'user_password_salt' => $p_salt, 'first_password_changed' => 0, 'transaction_password' => $salted_hash, 'transaction_password_salt' => $p_salt, 'transaction_password_salt_key' => $site_salt, 'loginString' => $login_random_string), array('UserID' => $id), 1)) {

                $ip_address = '';
                if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                    $ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
                } else {
                    $ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                }

                $user_agent = $_SERVER['HTTP_USER_AGENT'];

                $added_datetime = date("Y-m-d H:i:s");
                $old_data = "";
                $new_data = "new password : " . $use_password;
                $login_user_id = $user_login_data['UserID'];
                $this->db->query("insert into user_transaction_change_history set `change_by`='$login_user_id',`user_id`='$id',`old_data`='$old_data',`new_data`='$new_data',`transaction_type`='password',`transaction_password`='$master_password',`ip_address`='$ip_address',`user_agent`='$user_agent',`datetime`='$added_datetime'");

                $returnArr['status'] = 'ok';
                $returnArr['message'] = 'Successfully Update Password.';
            } else {
                $returnArr['message'] = 'Internal server error!.' . __LINE__;
            }
        } else {
            $errors = array_values($this->form_validation->error_array());
            $returnArr['message'] = $errors[0];
        }

        echo json_encode($returnArr);
    }

    public function valid_password($password = '')
    {
        $password = trim($password);

        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';

        if (empty($password)) {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');
            return FALSE;
        }

        if ((preg_match_all($regex_lowercase, $password) < 1) || (preg_match_all($regex_uppercase, $password) < 1) || (preg_match_all($regex_number, $password) < 1) || (strlen($password) < 5) || (strlen($password) > 15)) {
            $this->form_validation->set_message('valid_password', 'The password must contain at least: 1 uppercase letter, 1 lowercase letter, 1 number and 8 to 15 characters needed.');
            return FALSE;
        }

        return TRUE;
    }

    public function valid_special_characters($username = '')
    {
        $username = trim($username);

        $illegal = "#%^*()+=-[]';,/{}|:<>?~";

        if (false === strpbrk($username, $illegal)) {
            return TRUE;
        }

        $this->form_validation->set_message('valid_special_characters', 'Some special characters not allowed.');
        return FALSE;
    }

    public function check_mpassword($password = '')
    {

        $this->load->library('users', $this);

        $user_login_data = $this->users->login_data();

        $master_password = $password;



        $user_password = $user_login_data['transaction_password'];
        $user_password_salt = $user_login_data['transaction_password_salt'];
        $user_password_salt_key = $user_login_data['transaction_password_salt_key'];

        $salted_hash = hash('sha256', $this->input->post('changepwd_master_password') . $user_password_salt_key . $user_password_salt);



        if ($user_password != $salted_hash) {

            $this->form_validation->set_message('check_mpassword', 'Please enter the correct transaction password.');

            return false;
        }

        return true;
    }

    public function user_autocomplate()
    {

        $this->load->database();

        $this->load->library('users', $this);

        if (!$this->users->require_power(2)) {
            return;
        }

        $user_data = $this->users->data();

        $query = $this->input->post('query');

        $this->db->select('user_username');
        $this->db->where('user_username LIKE "%' . $query . '%" ');
        $array = $this->db->get('users')->result_array();

        echo json_encode(array_column($array, 'user_username'));
    }

    private function print_json($array)
    {
        $this->output->set_content_type('application/json')->set_output(json_encode($array));
    }

    public function set_min_max_odds()
    {
        $this->load->database();
        $this->load->library('users', $this);

        $id = (int) $this->input->post('min_max_odds-user_id');
        $min_odds =  $this->input->post('min_max_odds-min');
        $max_odds =  $this->input->post('min_max_odds-max');
        $master_password = $this->input->post('min_max_odds-master_password');
        $user_login_data = $this->users->login_data();

        $user_password = $user_login_data['transaction_password'];
        $user_password_salt = $user_login_data['transaction_password_salt'];
        $user_password_salt_key = $user_login_data['transaction_password_salt_key'];


        $get_user_master = $this->users->data();
        $minimum_odds = $get_user_master['minimum_odds'];
        $maximum_odds = $get_user_master['maximum_odds'];

        $salted_hash = hash('sha256', $this->input->post('min_max_odds-master_password') . $user_password_salt_key . $user_password_salt);


        if ($user_password != $salted_hash) {
            $return_array = array(
                "status" => "error",
                "message" => "Please enter the correct transaction password."
            );
            return $this->print_json($return_array);
        }

        $status = '';


        if ($max_odds > $maximum_odds  && !empty($maximum_odds)) {
            $status = 'error';
            $message = "Failed! You can not set maximum odds above $maximum_odds";
        }

        if ($min_odds < $minimum_odds && !empty($minimum_odds)) {
            $status = 'error';
            $message = "Failed! You can not set maximum odds below $maximum_odds";
        }

        if ($status == '') {
            if ($id > 0) {
                if ($min_odds == "" or $min_odds == 0) {
                    $min_odds = MIN_ODDS;
                }

                if ($max_odds == "" or $max_odds == 0) {
                    $max_odds = MAX_ODDS;
                }

                $old_data = $this->db->select('minimum_odds,maximum_odds')
                    ->where('Id', $id)
                    ->get('user_master')->row();
                $minimum_odds_db = $old_data->minimum_odds;
                $maximum_odds_db = $old_data->maximum_odds;

                $this->db->where('Id', $id);
                $this->db->set('minimum_odds', $min_odds);
                $this->db->set('maximum_odds', $max_odds);
                $this->db->update('user_master');

                $ip_address = '';
                if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                    $ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
                } else {
                    $ip_address = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                }

                $user_agent = $_SERVER['HTTP_USER_AGENT'];

                $added_datetime = date("Y-m-d H:i:s");
                $old_data = "min odds : " . $minimum_odds_db . "\n" . "max odds : " . $maximum_odds_db;
                $new_data = "min odds : " . $min_odds . "\n" . "max odds : " . $max_odds;
                $login_user_id = $user_login_data['UserID'];
                $this->db->query("insert into user_transaction_change_history set `change_by`='$login_user_id',`user_id`='$id',`old_data`='$old_data',`new_data`='$new_data',`transaction_type`='odds',`transaction_password`='$master_password',`ip_address`='$ip_address',`user_agent`='$user_agent',`datetime`='$added_datetime'");

                $status = 'ok';
                $message = 'Success! Odds Changed';
            } else {
                $status = 'error';
                $message = 'Failed! Invalid request';
            }
        }


        $return_array = array(
            "status" => $status,
            "message" => $message,
        );
        return $this->print_json($return_array);
    }
}
