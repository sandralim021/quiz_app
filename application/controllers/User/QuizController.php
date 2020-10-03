<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuizController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		$this->load->model('user/quiz','qm');
	}

	public function index()
	{
		$title['title'] = "HOME";	
		$data['data'] = $this->qm->get();
        $this->load->view('templates/user/header',$title);
        $this->load->view('user/main',$data);
        $this->load->view('templates/user/footer');
	}

	public function get_questions($id){
		$data = $this->qm->get_questions($id);
		if($data['question_success'] && $data['score_success']){
			$quiz_session = array(
				'topic_id' => $id,
				'score_id' => $data['score_id'],
				'history_id' => $data['history_id'],
				'is_quiz' => true
			);
			$this->session->set_userdata($quiz_session);
			redirect('question/'.$id);
		}
	}
	
	public function question($topic_id){
		$query = $this->qm->display_question($topic_id);
		if($query['success'] == true){
			$data['question'] = $query['question'];
			$data['choices'] = $query['choices'];
			$data['session_id'] = $query['session_id'];
			$title['title'] = "QUIZ";
			$this->load->view('templates/user/header',$title);
			$this->load->view('user/question',$data);
			$this->load->view('templates/user/footer');
		}else if($query['success'] == false){
			redirect('score/'.$topic_id);
		}
		
	}

	public function next_question(){
		$answer = array(
			'topic_id' => $this->session->userdata('topic_id'),
			'choice' => $this->input->post('choice'),
			'score_id' => $this->session->userdata('score_id'),
			'history_id' => $this->session->userdata('history_id'),
			'session_id' => $this->input->post('session_id')
		);
		$validate = $this->qm->validate_answer($answer);
		if($validate){
			redirect('question/'.$answer['topic_id']);
		}
	}

	public function score($topic_id){
			$data = array(
				'topic_id' => $topic_id,
				'score_id' => $this->session->userdata('score_id')
			);
			$query = $this->qm->score($data);
			if($query){
				$quiz_session = array('topic_id','score_id','history_id','is_quiz');
				$this->session->unset_userdata($quiz_session);
				$result['no_question'] = $query['no_question'];
				$result['correct'] = $query['correct'];
				$result['wrong'] = $query['wrong'];
				$title['title'] = "SCORE";
				$this->load->view('templates/user/header',$title);
				$this->load->view('user/score',$result);
				$this->load->view('templates/user/footer');
			}
			
	}

}
