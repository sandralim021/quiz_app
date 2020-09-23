<?php
    class Quiz extends CI_Model{
        public function get(){
            $query = $this->db->select('topics.*, COUNT(questions.question_id) as num_questions')
                            ->from('topics')
                            ->where('topics.topic_status','active')
                            ->join('questions','questions.topic_id = topics.topic_id')
                            ->group_by('topic_id')
                            ->get();
            
            return $query->result();
        }
    }