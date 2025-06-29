<?php
class Login_model extends CI_Model {
    public function login($username, $password) {
        $this->db->where('user_name', $username);
        $query = $this->db->get('login_details');
        $user = $query->row();

        // Check user and MD5 password match
        if ($user && md5($password) === $user->password) {
            return $user; // Contains id, user_name, name, role
        }
        return false;
    }
}
