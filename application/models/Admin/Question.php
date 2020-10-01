<?php
    class Question extends CI_Model{
        public function get_topic($id){
            $query = $this->db->select('*')
                            ->from('topics')
                            ->where('topic_id',$id)
                            ->get();
            
            return $query->row();
        }

        public function fetch($id){
            $query = $this->db->select('*')
                            ->from('questions')
                            ->where('topic_id',$id)
                            ->get();
            
            return $query->result_array();
        }

        public function insert_question($data){
            $query = $this->db->insert('questions',$data);
            if($query){
                return $this->db->insert_id();
            }
        }

        public function insert_options($data){
            $query = $this->db->insert_batch('choices',$data);
            return ($query == true) ? true : false;
        }

        public function edit($id){
            $data = array();
            $question = $this->db->select("*")
                            ->from("questions")
                            ->where("question_id",$id)
                            ->get();
            $data['question'] = $question->row();

            $choice = $this->db->select("*")
                            ->from("choices")
                            ->where("question_id",$id)
                            ->get();

            foreach($choice->result() as $row){
                $data['choices'][] = $row;
            }
            return $data;
        }

        public function update($data,$id){
            $update = $this->db->update('questions', $data, array('question_id' => $id));
            if($update){
                $delete_choices = $this->db->delete('choices', array('question_id' => $id));
                return ($delete_choices == true) ? true : false;
            }else{
                return false;
            }
        }

        public function delete($id){
            $delete = $this->db->delete('questions', array('question_id' => $id));
            if($delete){
                $delete_choices = $this->db->delete('choices', array('question_id' => $id));
                return ($delete_choices == true) ? true : false;
            }else{
                return false;
            }
        }
    }