<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Check if employee is logged in
        if (!$this->session->userdata('user_id') || $this->session->userdata('role') !== 'employee') {
            redirect('auth/login');
        }

        $this->load->model('Employee_model');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['employee'] = $this->Employee_model->get_employee_by_user_id($user_id);

        if (!$data['employee']) {
            $this->session->set_flashdata('error', 'Employee data not found for your account.');
        }

        $this->load->view('dashboard/employee', $data);
    }
}
