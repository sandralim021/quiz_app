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
            $buttons .= '<button class="button is-warning is-small item-edit mr-1" title="Edit" data='.$value['question_id'].'><i class="fas fa-edit"></i></button>';
            $buttons .= '<button class="button is-danger is-small item-delete" title="Delete" data='.$value['question_id'].'><i class="fas fa-trash-alt"></i></button>';
            $result['data'][$key] = array(
                $i++,
                $value['question'],
                $buttons
            );
        }   // /foreach
        echo json_encode($result); 
    }

    public function insert($data){
        $question = $this->input->post('question');
        $create = $this->input->insert();
    }
}