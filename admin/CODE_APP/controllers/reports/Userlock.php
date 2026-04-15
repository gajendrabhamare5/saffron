<?php

defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Userlock extends CI_Controller
{

    function index()
    {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;

        $this->users->pwd_change_status();

        $this->layout['title'] = PROJECTNAME . ' - Userlock';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('reports/userlock', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function get_clients()
    {

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

    public function check_pwd()
    {
        $tpassword = $this->input->post('tpassword');
        $client_name = $this->input->post('client_name');
     

        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');

        if (!$this->users->require_power(2)){
            return;  
        }

        $user_login_data = $this->users->login_data();
        $user_data = $this->users->data();

        $status = 'ok';
        $msg = '';

        $user_password_salt_key = $user_login_data['transaction_password_salt_key'];
        $user_password = $user_login_data['transaction_password'];
        $user_password_salt = $user_login_data['transaction_password_salt'];


        $salted_hash = hash('sha256', $tpassword . $user_password_salt_key . $user_password_salt);

        if ($user_password != $salted_hash) {
            $status = 'error';
            $msg = 'Transaction code not valid';
            $casino_names = '';
            $sport_type = '';
        }else{
            
        $this->db->select('casino_name,sport_type');
         $this->db->where('UserId', $client_name);
        $query = $this->db->get('block_event');
        //   echo "FETCH QUERY: " . $this->db->last_query();

        if ($query->num_rows() > 0) {
        $result = $query->result_array();
        foreach ($result as $row) {
            $casino_names[] = $row['casino_name'];
            $sport_type[] = $row['sport_type'];
        }
    }else{
         $casino_names[] = '';
         $sport_type[] = '';
    }

        }

        echo json_encode(array('status' => $status, 'message' => $msg,'casino_names' => $casino_names,'sport_type' => $sport_type));
    }

    public function update_status()
    {

       $status = $this->input->post('status');
        $userid = $this->input->post('username');
        $casino_name = $this->input->post('child_id');
        $sport_type = $this->input->post('sport_type');

        $this->load->database();
        $this->load->library('users', $this);
        $this->load->library('functions');

        $user_login_data = $this->users->login_data();
        $UserID = $user_login_data['UserID'];
        $user_data = $this->users->data();

        $this->db->select('UserID');
        $this->db->where('UserType', 1);
        $this->db->group_start();
            $this->db->where('parentDL', $UserID);
            $this->db->or_where('parentMDL', $UserID);
            $this->db->or_where('parentSuperMDL', $UserID);
        $this->db->group_end();
        
        $users_list1 = $this->db->get('user_login_master as u');

        $users_list = $users_list1->result_array();
        $data_template = [
            'sport_type' => $sport_type,
            'casino_name' => $casino_name,
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if (empty($userid)) {

            if ($users_list) {
                foreach ($users_list as $ul) {
                    $user_id = $ul['UserID'];


                    $data = array_merge($data_template, ['UserId' => $user_id]);

                    // Check if record exists for this user
                    $query = $this->db->get_where('block_event', [
                        'UserId' => $user_id,
                        'sport_type' => $sport_type,
                        'casino_name' => $casino_name
                    ]);

                    if ($query->num_rows() > 0) {
                        
                        $this->db->where('UserId', $user_id);
                        $this->db->where('casino_name', $casino_name);
                        $this->db->where('sport_type', $sport_type);
                        $this->db->delete('block_event');
                        // echo "DELETE QUERY: " . $this->db->last_query();
                    } else {
                        // Insert new record
                        $this->db->insert('block_event', $data);
                    //   echo "INSERT QUERY1: " . $this->db->last_query();
                    }
                }
            }
        } else {

    
            $query = $this->db->get_where('block_event', [
                'UserId' => $userid,
                'casino_name' => $casino_name,
                'sport_type' => $sport_type,
            ]);

            $data = array_merge($data_template, ['UserId' => $userid]);

            if ($query->num_rows() > 0) {
                $this->db->where('UserId', $userid);
                $this->db->where('casino_name', $casino_name);
                $this->db->where('sport_type', $sport_type);
                $this->db->delete('block_event');
                // echo "DELETE QUERY: " . $this->db->last_query();
            } else {
                    $querychk = $this->db->get_where('block_event', [
                'UserId' => $userid,
                'casino_name' => 'all',
                'sport_type' => $sport_type,
            ]);

            if ($querychk->num_rows() <= 0) {
                $this->db->insert('block_event', $data);
                // echo "INSERT QUERY2: " . $this->db->last_query();
            }
        } 
        }


    }

    private function print_json($array)
    {
        $this->output->set_content_type('application/json')->set_output(json_encode($array));
    }
}
