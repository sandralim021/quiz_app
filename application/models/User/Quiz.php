<?php
    class Quiz extends CI_Model{
        public function get(){
            $query = $this->db->select('topics.*','COUNT(questions.question_id) as no_questions')
                            ->from('topics')
                            ->join('questions','questions.topic_id','=','topics.topic_id')
                            ->where('topics.topic_status','=','active');
        }
    }