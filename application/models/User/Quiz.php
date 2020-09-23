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

        public function get_questions($id){
            $questions = $this->db->select('*')
                                ->from('questions ')
                                ->where('topic_id',$id)
                                ->get();
            while($row = $questions->result()){
                $data = array(
                    'topic_id' => $row->topic_id,
                    'question_id' => $row->question_id,
                    'session_status' => '0'
                );
                $this->db->insert('sessions',$data);
            }
            
            return true;
        }
    }