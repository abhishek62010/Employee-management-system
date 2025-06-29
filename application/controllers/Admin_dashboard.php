<?php
class Admin_dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'admin') {
            redirect('auth/login');
        }
    }

    public function index() {
        $this->load->view('dashboard/admin');
    }
}