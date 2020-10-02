<?php
    date_default_timezone_set('Asia/Manila');
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
            $user_id = $this->session->userdata('user_id');
            // Delete Previous Session
            $this->db->delete('sessions', array('user_id' => $user_id)); 
            $data = array(
                'score_success' => false,
                'question_success' => false,
                'score_id' => ''
            );
            $questions = $this->db->select('*')
                                ->from('questions')
                                ->where('topic_id',$id)
                                ->get();
            
            foreach($questions->result() as $row){
                $session_data = array(
                    'user_id' => $user_id,
                    'topic_id' => $row->topic_id,
                    'question_id' => $row->question_id,
                    'session_status' => '0'
                );
                $question_query = $this->db->insert('sessions',$session_data);
                if($question_query){
                    $data['question_success'] = true;
                }else{
                    $data['question_success']  = false;
                }
            }

            $score_data = array(
                'user_id' => $user_id,
                'topic_id' => $id
            );

            $score_query = $this->db->insert('scores',$score_data);
            if($score_query){
                $data['score_id'] = $this->db->insert_id();
                $history_data = array(
                    'user_id' => $user_id,
                    'topic_id' => $id,
                    'score_id' => $data['score_id'],
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s')
                );
                $history_query = $this->db->insert('history',$history_data);
                if($history_query == true){
                    $data['score_success'] = true;
                }else{
                    $data['score_success'] = false;
                } 
            }else{
                $data['score_success'] = false;
            }

            return $data;
            
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
                        'topic_id' => $id,
                        'session_id' => $session_id,
                        'question' => $question,
                        'choices' => $choices->result(),
                        'success' => true
                    );
                }

            }else{
                return array(
                    'success' => false
                );
            }
        }

        public function validate_answer($data){
            $topic_id = $data['topic_id'];
            $choice = $data['choice'];
            $score_id = $data['score_id'];
            $session_id = $data['session_id'];
            //Updating Session
            $this->db->set('session_status','1');
            $this->db->where('session_id',$session_id);
            $this->db->update('sessions');
            //
            $correct_answer = $this->db->select('*')
                                    ->from('choices')
                                    ->where('choice_id',$choice)
                                    ->get();
            $correct_row = $correct_answer->row()->answer;
            if($correct_row == 1){
                $correct_score = 1;
                $this->db->set("correct", "correct + $correct_score", FALSE); 
                $this->db->where("score_id", $score_id);
                $this->db->update("scores");
                return true;
            }else if($correct_row == 0){
                $wrong_score = 1;
                $this->db->set("wrong", "wrong + $wrong_score", FALSE); 
                $this->db->where("score_id", $score_id);
                $this->db->update("scores");
                return true;
            }


        }

        public function score($data){
            $score = $this->db->select('*')
                            ->from('scores')
                            ->where('score_id',$data['score_id'])
                            ->get();
            $no_questions = $this->db->select('*')
                                    ->from('questions')
                                    ->where('topic_id',$data['topic_id'])
                                    ->get();
            return array(
                'no_question' => $no_questions->num_rows(),
                'correct' => $score->row()->correct,
                'wrong' => $score->row()->wrong
            );
        }

    }