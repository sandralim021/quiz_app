<?php
    class User extends CI_Model{
        
        public function fetch(){
            $query = $this->db->select('*')
                        ->from('users')
                        ->get();

            return $query->result_array();
        }

        public function login_user($email,$password){
            $query = $this->db->get_where('admin', array('email'=>$email, 'password'=>$password));
            return $query->row_array();
        }

        public function update_profile($data,$id){
            $update = $this->db->where('admin_id', $id)
                                ->update('admin', $data);
            return ($update == true) ? true : false;
        }
        
    }