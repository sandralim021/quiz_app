<?php
    class User extends CI_Model{

        public function login_user($email,$password){
            $query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password));
            return $query->row_array();
        }
        
        public function signup_user($data){
           $query = $this->db->insert('users',$data);
           if($query){
                return $this->db->insert_id();
            }else{
                return false;
            }
        }
    
    }