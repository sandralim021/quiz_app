<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class QuestionController extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/question','qm');
    }

    public function index($id){
        $data['topic'] = $this->qm->get_topic($id);
        $this->load->view('templates/admin/header_sidebar');
        $this->load->view('admin/question_list',$data);
        $this->load->view('templates/admin/footer');
    }

    public function fetch($id){
        $result = array('data' => array());
        $data = $this->qm->fetch($id);
        $i = 1;
        foreach ($data as $key => $value) {
            // button
            $buttons = '';
            $buttons .= '<button class="button is-warning is-small mr-1 item-edit" title="Edit" data='.$value['question_id'].'><i class="fas fa-edit"></i></button>';
            $buttons .= '<button class="button is-danger is-small item-delete" title="Delete" data='.$value['question_id'].'><i class="fas fa-trash-alt"></i></button>';
            $result['data'][$key] = array(
                $i++,
                $value['question'],
                $buttons
            );
        }   // /foreach
        echo json_encode($result); 
    }

    public function insert($id){
        $data = array(
            'topic_id' => $id,
            'question' => $this->input->post('question')
        );
        $create = $this->qm->insert_question($data);
        if($create != null){
            // Insert Options
            $choice = $this->input->post('choice');
            $answer = $this->input->post('answer');

            foreach($choice as $key => $item){
                $insert_data[] = array(
                    'question_id' => $create,
                    'choice' => $item,
                    'answer' => (!empty($answer[$key])) ? $answer[$key] : 0
                );
            }
            $create_options = $this->qm->insert_options($insert_data);
            if($create_options == true){
                $response['success'] = true;
                $response['messages'] = 'Succesfully created';
            }else{
                $response['success'] = false;
                $response['messages'] = 'Error in the database while creating the Question information';
            }
        }

        echo json_encode($response);
    }

    public function edit($id){
        $query = $this->qm->edit($id);
        $data['question'] = $query['question'];
        $data['choices'] = $query['choices'];
        echo json_encode($data);
    }
}