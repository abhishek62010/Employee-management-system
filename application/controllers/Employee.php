<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
        $this->load->model('Employee_model');
        $this->load->helper('url');
    }

    public function index() {
        $role = $this->session->userdata('role');
        $user_id = $this->session->userdata('user_id');
        if ($role === 'admin') {
            $data['employees'] = $this->Employee_model->get_all_employees();
        } else {
            $data['employees'] = [$this->Employee_model->get_employee_by_user_id($user_id)];
        }
        $this->load->view('employee/list', $data);
    }

    public function add() {
        if ($this->session->userdata('role') !== 'admin') redirect('employee');
        $this->load->view('employee/add');
    }

    public function insert() {
        if ($this->session->userdata('role') !== 'admin') redirect('employee');

        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']      = 2048;
        $this->load->library('upload', $config);

        $picture = '';
        if (!empty($_FILES['picture']['name']) && $this->upload->do_upload('picture')) {
            $picture = $this->upload->data('file_name');
        }

        $data = [
            'user_id'     => $this->session->userdata('user_id'),
            'name'        => $this->input->post('name'),
            'designation' => $this->input->post('designation'),
            'address'     => $this->input->post('address'),
            'salary'      => $this->input->post('salary'),
            'picture'     => $picture
        ];

        $this->Employee_model->insert_employee($data);
        $this->session->set_flashdata('success', 'Employee added successfully!');
        redirect('employee');
    }

    public function edit($id) {
        $data['emp'] = $this->Employee_model->get_employee($id);
        if (!$data['emp'] || ($this->session->userdata('role') !== 'admin'
            && $data['emp']->user_id != $this->session->userdata('user_id'))) {
            redirect('employee');
        }
        $this->load->view('employee/edit', $data);
    }

    public function update($id) {
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']      = 2048;
        $this->load->library('upload', $config);

        $picture = '';
        if (!empty($_FILES['picture']['name']) && $this->upload->do_upload('picture')) {
            $picture = $this->upload->data('file_name');
        }

        $data = [
            'name'        => $this->input->post('name'),
            'designation' => $this->input->post('designation'),
            'address'     => $this->input->post('address')
        ];

        if ($picture) {
            $data['picture'] = $picture;
        }

        $this->Employee_model->update_employee($id, $data);
        $this->session->set_flashdata('success', 'Employee updated successfully!');
        redirect('employee');
    }

    public function delete($id) {
        if ($this->session->userdata('role') !== 'admin') redirect('employee');
        $this->Employee_model->delete_employee($id);
        $this->session->set_flashdata('success', 'Employee deleted successfully!');
        redirect('employee');
    }
}
