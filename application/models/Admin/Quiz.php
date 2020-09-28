<?php
    class Quiz extends CI_Model{
        public function fetch(){
            $query = $this->db->select('*')
                            ->from('topics')
                            ->where('topics.topic_status','active')
                            ->get();
            
            return $query->result_array();
        }

    }