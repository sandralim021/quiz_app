<?php
    class User extends CI_Model{
        
        public function fetch(){
            $query = $this->db->select('*')
                        ->from('users')
                        ->get();

            return $query->result_array();
        }
    }