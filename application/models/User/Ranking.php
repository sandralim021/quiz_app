<?php
    class Ranking extends CI_Model{
        public function fetch_quiz(){
            $query = $this->db->select('topics.*, COUNT(questions.question_id) as num_questions')
                            ->from('topics')
                            ->where('topics.topic_status','active')
                            ->join('questions','questions.topic_id = topics.topic_id')
                            ->group_by('topic_id')
                            ->get();
            
            return $query->result();
        }

        public function fetch_rank($id){
            $query = $this->db->select('*')
                            ->from('scores')
                            ->join('users','scores.user_id = users.user_id')
                            ->where('scores.topic_id',$id)
                            ->order_by('scores.correct','DESC')
                            ->get();

            return $query->result();
        }
    }