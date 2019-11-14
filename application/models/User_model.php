<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    // login user
    public function login($username, $password)
    {
        return $this->db->get_where('users', ['username' => $username, 'password' => SHA1($password)])->row_array();
    }

}

/* End of file User_model.php */
