<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

    public function get_all_employees() {
        return $this->db->get('emp_details')->result();
    }

    public function get_employee_by_user_id($user_id) {
        return $this->db->get_where('emp_details', ['user_id' => $user_id])->row();
    }

    public function insert_employee($data) {
        return $this->db->insert('emp_details', $data);
    }

    public function get_employee($id) {
        return $this->db->get_where('emp_details', ['id' => $id])->row();
    }

    public function update_employee($id, $data) {
        return $this->db->where('id', $id)->update('emp_details', $data);
    }

    public function delete_employee($id) {
        return $this->db->where('id', $id)->delete('emp_details');
    }
}
