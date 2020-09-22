<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuizController extends CI_Controller {

	public function __construct(){
		$this->load->model('User/Quiz','qm');
	}
	public function index()
	{	
		
        $this->load->view('templates/user/header');
        $this->load->view('user/main');
        $this->load->view('templates/user/footer');
	}
}
