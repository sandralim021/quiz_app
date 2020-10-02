<?php
    class History extends CI_Model{
        
        public function fetch(){
            $query = $this->db->select('history.*, users.name, topics.topic_name')
                            ->from('history')
                            ->join('users','history.user_id = users.user_id')
                            ->join('topics','history.topic_id = topics.topic_id')
                            ->order_by('date','DESC')
                            ->order_by('time','DESC')
                            ->get();

            return $query->result_array();
        }

        public function delete($id){
            $delete = $this->db->delete('history', array('history_id' => $id));
            return ($delete == true) ? true : false;
        }

    }