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
            $buttons .= '<button class="btn btn-sm btn-info mr-1 item-edit" data='.$value['topic_id'].'><i class="fas fa-edit"></i></button>';
            $buttons .= '<button class="btn btn-sm btn-danger item-delete" data='.$value['topic_id'].'><i class="fas fa-trash-alt"></i></button>';
            $result['data'][$key] = array(
                $i++,
                $value['topic_name'],
                $buttons
            );
        }   // /foreach
        echo json_encode($result); 
    }
}