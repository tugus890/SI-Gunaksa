<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    public function save_verification_code($email, $code) {
        // Save verification code to the database or temporary storage
        // Example using Active Record:
        $data = array('verification_code' => $code);

        // Assuming $email is defined earlier
        $this->db->where('email', $email);
        $this->db->update('tb_user', $data);

        
    }

    public function check_verification_code($email, $code) {
        // Check if verification code matches
        $query = $this->db->get_where('tb_user', array('email' => $email, 'verification_code' => $code));
        return $query->num_rows() > 0;
    }
    
    function update_password($table, $data, $where) {
        $this->db->set('password', "MD5('$data')", false);
        $this->db->where('verification_code', $where);
        $this->db->update($table);
    }
    
    function set_null_kode($table,$where) {
        $this->db->set('verification_code', NULL);
        $this->db->where('verification_code', $where);
        $this->db->update($table);
    }
    

}

/* End of file Auth_model.php */


?>