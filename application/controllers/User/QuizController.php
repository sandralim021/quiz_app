<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuizController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user/quiz','qm');
	}

	public function index()
	{	
		$data['data'] = $this->qm->get();
        $this->load->view('templates/user/header');
        $this->load->view('user/main',$data);
        $this->load->view('templates/user/footer');
	}

	public function questions($id){
		$data = $this->qm->get_questions($id);
		if($data){
			$this->question_index($id);
		}
	}
	
	public function question_index($id){
		$query = $this->qm->display_question($id);
		$data['question'] = $query['question'];
		$data['choices'] = $query['choices'];
		$this->load->view('templates/user/header');
        $this->load->view('user/question',$data);
		$this->load->view('templates/user/footer');
	}
}
