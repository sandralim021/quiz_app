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

	public function get_questions($id){
		//$data = $this->qm->get_questions($id);
		$this->load->view('templates/user/header');
        $this->load->view('user/question');
        $this->load->view('templates/user/footer');
	} 
}
