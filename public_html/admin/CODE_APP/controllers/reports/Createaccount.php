<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Createaccount extends CI_Controller {

    function index() {
        $this->load->library('users', $this);

        if (!$this->users->require_power(2))
            return;
        
        $this->users->pwd_change_status();
        
        $this->layout['title'] = PROJECTNAME . ' -Create account';

        $this->load->view('header', array('handler' => $this));
        $this->load->view('reports/createaccount', array('handler' => $this));
        $this->load->view('footer', array('handler' => $this));
    }

    public function add_employees()
    {
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->library('employee', $this); // Assuming this library has add()
        $this->load->helper('security'); // For password hashing if needed
        $this->load->helper('string');   // For generating random strings if needed

        // Input values
        $client_id = trim($this->input->post('uname'));
        $fullname = trim($this->input->post('fullname'));
        $password = $this->input->post('password');
        $conf_password = $this->input->post('cpass');
        $privileges = $this->input->post('plist'); // Array expected

        // Validation rules
        $this->form_validation->set_rules(
            'uname',
            'Client ID',
            'required|is_unique[employee_master.client_id]',
            ['is_unique' => 'This Client ID is already taken. Please choose another one.']
        );

        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[password]', [
            'matches' => 'Password and Confirm Password do not match.'
        ]);

        // Custom validation for privileges
        if (empty($privileges) || !is_array($privileges)) {
            echo json_encode(['status' => 'danger', 'message' => 'Please select at least one privilege.']);
            return;
        }

        // Run validation
        if ($this->form_validation->run() == FALSE) {
            echo json_encode([
                'status' => 'danger',
                'message' => $this->form_validation->error_string()
            ]);
            return;
        }

        // Prepare data
        $user_data = [
            'added_by_id'=> 1,
            'client_id' => $client_id,
            'fullname' => $fullname,
            'password' => hash('sha256', $password), // Use secure hashing
            'privileges' => implode(',', $privileges), // Store as comma-separated string, or change as needed
        ];

        // Add user using library method
        if ($this->employee->add($user_data)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Employee added successfully.'
            ]);
        } else {
            echo json_encode([
                'status' => 'danger',
                'message' => 'Error occurred while adding employee.'
            ]);
        }
    }


   

}

?>