<?php
    class User extends CI_Model{

        public function login_user($email,$password){
            $query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password));
            return $query->row_array();
        }
        
    }