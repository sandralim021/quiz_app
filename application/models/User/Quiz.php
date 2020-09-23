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
            $question_success = true;
            $score_success = true;
            $questions = $this->db->select('*')
                                ->from('questions')
                                ->where('topic_id',$id)
                                ->get();
            
            foreach($questions->result() as $row){
                $data = array(
                    'topic_id' => $row->topic_id,
                    'question_id' => $row->question_id,
                    'session_status' => '0'
                );
                $question_query = $this->db->insert('sessions',$data);
                if($question_query){
                    $question_success = true;
                }else{
                    $question_success = false;
                }
            }

            $topic_id = array(
                'topic_id' => $id
            );
            $score_query = $this->db->insert('scores',$topic_id);
            if($score_query){
                $score_success = true;
            }else{
                $score_success = false;
            }

            if($score_success && $question_success){
                return true;
            }else{
                return false;
            }
            
        }

        public function display_question($id){
            $array = array(
                'session_status' => '0',
                'topic_id' => $id
            );
            $session = $this->db->select('*')
                            ->from('sessions')
                            ->where($array)
                            ->order_by('RAND()')
                            ->limit(1)
                            ->get();
            $row = $session->row_array();
            if(isset($row)){
                $session_id = $row['session_id'];
                $question_id = $row['question_id'];
                
                $this->db->set('session_status','1');
                $this->db->where('session_id',$session_id);
                $this->db->update('sessions');

                $question_query = $this->db->select('question')
                            ->from('questions')
                            ->where('questions.question_id',$question_id)
                            ->get();
                $question_row = $question_query->row();
                $question = $question_row->question;
                if($question){
                    $choices = $this->db->select('*')
                                    ->from('choices')
                                    ->where('question_id',$question_id)
                                    ->get();
                    return array(
                        'question' => $question,
                        'choices' => $choices->result()
                    );
                }

            }
        }

    }