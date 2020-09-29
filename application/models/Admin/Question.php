<?php
    class Question extends CI_Model{
        public function get_topic($id){
            $query = $this->db->select('*')
                            ->from('topics')
                            ->where('topic_id',$id)
                            ->get();
            
            return $query->row();
        }

        public function fetch($id){
            $query = $this->db->select('*')
                            ->from('questions')
                            ->where('topic_id',$id)
                            ->get();
            
            return $query->result_array();
        }
    }