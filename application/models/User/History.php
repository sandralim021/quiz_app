<?php
    
    class History extends CI_Model{
    
        public function fetch(){
            $user_id = $this->session->userdata('user_id');
            $query = $this->db->select('history.*, users.name, topics.topic_name')
                            ->from('history')
                            ->join('users','history.user_id = users.user_id')
                            ->join('topics','history.topic_id = topics.topic_id')
                            ->where('history.user_id',$user_id)
                            ->order_by('date','DESC')
                            ->order_by('time','DESC')
                            ->get();

            return $query->result();
        }

    }