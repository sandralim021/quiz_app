<?php
    class Quiz extends CI_Model{
        public function fetch(){
            $query = $this->db->select('*')
                            ->from('topics')
                            ->get();
            
            return $query->result_array();
        }

        public function insert($data){
            $insert = $this->db->insert('topics', $data);
            return ($insert == true) ? true : false;
        }

        public function edit($id){
            $query = $this->db->select("*")
                            ->from("topics")
                            ->where("topic_id",$id)
                            ->get();
            if(count($query->result()) > 0){
                return $query->row();
            }else{
                return false;
            }
    
        }

        public function update($data,$id){
            $update = $this->db->update('topics', $data, array('topic_id' => $id));
            return ($update) ? true : false;
        }

        public function delete($id){
            if($id){
				$this->db->where('topic_id', $id);
				$delete = $this->db->delete('topics');
				return ($delete == true) ? true : false;
			}
        }

        public function check_topic_exists($topic){
            $query = $this->db->get_where('topics', array('topic_name' => $topic));
            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }

    }