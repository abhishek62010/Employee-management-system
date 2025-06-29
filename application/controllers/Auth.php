<?php
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function login() {
        $this->load->view('login_view');
    }

    public function login_user() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->Login_model->login($username, $password);

        if ($user) {
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('role', $user->role);
            $this->session->set_userdata('user_name', $user->user_name);

            redirect('employee');
        } else {
            $this->session->set_flashdata('error', 'Invalid login credentials');
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
