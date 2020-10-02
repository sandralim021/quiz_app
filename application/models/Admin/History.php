<?php
    class History extends CI_Model{
        
        public function fetch(){
            $query = $this->db->select('history.*, users.name, topics.topic_name, scores.correct')
                            ->from('history')
                            ->join('users','history.user_id = users.user_id')
                            ->join('topics','history.topic_id = topics.topic_id')
                            ->join('scores','history.score_id = scores.score_id')
                            ->order_by('history.date desc','history.time desc')
                            ->get();

            return $query->result_array();
        }

        public function delete($id){
            $delete = $this->db->delete('history', array('history_id' => $id));
            return ($delete == true) ? true : false;
        }

    }