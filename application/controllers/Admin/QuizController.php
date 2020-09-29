<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class QuizController extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/quiz','qm');
    }

    public function index(){
        $this->load->view('templates/admin/header_sidebar');
        $this->load->view('admin/quiz_list');
        $this->load->view('templates/admin/footer');
    }

    public function fetch(){
        $result = array('data' => array());
        $data = $this->qm->fetch();
        $i = 1;
        foreach ($data as $key => $value) {
            // button
            $buttons = '';
            $buttons .= '<a class ="button is-primary is-small mr-1" title="Manage Quizzes" href="'.base_url('admin/questions/'.$value['topic_id']).'"><i class="fas fa-tasks"></i></a>';
            $buttons .= '<button class="button is-warning is-small item-edit" title="Edit" data='.$value['topic_id'].'><i class="fas fa-edit"></i></button>';
            $buttons .= '<button class="button is-danger is-small item-delete" title="Delete" data='.$value['topic_id'].'><i class="fas fa-trash-alt"></i></button>';
            if($value['topic_status'] == 'active'){
                $status = '<span class="tag is-success">Active</span>';
            }else{
                $status = '<span class="tag is-danger">Not Active</span>';
            }
            $result['data'][$key] = array(
                $i++,
                $value['topic_name'],
                $status,
                $buttons
            );
        }   // /foreach
        echo json_encode($result); 
    }

    public function insert(){
        $response = array();

        $this->form_validation->set_rules('topic_name', 'Topic name', 'trim|required|callback_check_topic_exists');
        $this->form_validation->set_error_delimiters('<p class="help is-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'topic_name' => $this->input->post('topic_name'),
                'topic_status' => $this->input->post('topic_status')
            );
            $create = $this->qm->insert($data);
            if($create == true) {
                $response['success'] = true;
                $response['messages'] = 'Succesfully created';
            }
            else {
                $response['success'] = false;
                $response['messages'] = 'Error in the database while creating the Category information';			
            }
        }
        else {
            $response['success'] = false;
            foreach ($_POST as $key => $value) {
                $response['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($response);
    }

    public function edit($id){
        $data = $this->qm->edit($id);
        echo json_encode($data);
    }

    public function update($id){
        $topic_db = $this->qm->edit($id);
        $topic_name = $this->input->post('topic_name');
        if($topic_db->topic_name != $topic_name){
            $is_unique = 'trim|required|callback_check_topic_exists';
        }else{
            $is_unique = 'trim|required';
        }
        $response = array();

        $this->form_validation->set_rules('topic_name', 'Topic name', $is_unique);
        $this->form_validation->set_error_delimiters('<p class="help is-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'topic_name' => $this->input->post('topic_name'),
                'topic_status' => $this->input->post('topic_status')
            );
            $create = $this->qm->update($data,$id);
            if($create == true) {
                $response['success'] = true;
                $response['messages'] = 'Succesfully Updated';
            }
            else {
                $response['success'] = false;
                $response['messages'] = 'Error in the database while updating the Topic information';			
            }
        }
        else {
            $response['success'] = false;
            foreach ($_POST as $key => $value) {
                $response['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($response);
    }

    public function delete($id){
        if($id){
            $delete = $this->qm->delete($id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed";	
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the topic information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refresh the page again!!";
        }

        echo json_encode($response);
    }

    public function check_topic_exists($topic){
        $this->form_validation->set_message('check_topic_exists', 'That Topic name is taken. Please choose a different one');
        if($this->qm->check_topic_exists($topic)){
            return true;
        } else {
            return false;
        }
    }
}