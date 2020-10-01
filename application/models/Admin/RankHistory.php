<?php
    class RankHistory extends CI_Model{
        public function fetch_quiz(){
            $query = $this->db->select('*')
                            ->from('topics')
                            ->get();
            
            return $query->result_array();
        }

        public function get_topic($id){
            $query = $this->db->select('*')
                            ->from('topics')
                            ->where('topic_id',$id)
                            ->get();
            
            return $query->row();
        }

        public function fetch_rank($id){
            $query = $this->db->select('*')
                                ->from('scores')
                                ->join('users','scores.user_id = users.user_id')
                                ->where('scores.topic_id',$id)
                                ->order_by('scores.correct','DESC')
                                ->get();

            return $query->result_array();
        }

        public function delete_rank($id){
            $delete = $this->db->delete('scores', array('user_id' => $id));
            return ($delete == true) ? true : false;
        }
    }