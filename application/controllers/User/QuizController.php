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
		if($data['question_success'] && $data['score_success']){
			$this->question_index($id,$data['score_id']);
		}
	}
	
	public function question_index($id,$score_id){
		$query = $this->qm->display_question($id);
		$data['question'] = $query['question'];
		$data['choices'] = $query['choices'];
		$data['topic_id'] = $query['topic_id'];
		$data['score_id'] = $score_id;
		$this->load->view('templates/user/header');
        $this->load->view('user/question',$data);
		$this->load->view('templates/user/footer');
	}

	public function next_question(){
		$answer = array(
			'topic_id' => $this->input->post('topic_id'),
			'choice' => $this->input->post('choice'),
			'score_id' => $this->input->post('score_id')
		);
		$validate = $this->qm->validate_answer($answer);
		if($validate){
			$query = $this->qm->display_question($answer['topic_id']);
			if($query['success'] == true){
				$data['topic_id'] = $answer['topic_id'];
				$data['question'] = $query['question'];
				$data['choices'] = $query['choices'];
				$data['score_id'] = $answer['score_id'];
				$this->load->view('templates/user/header');
				$this->load->view('user/question',$data);
				$this->load->view('templates/user/footer');
			}else if($query['success'] == false){
				$data['topic_id'] = $answer['topic_id'];
				$data['score_id'] = $answer['score_id'];
				$this->score($data['topic_id'],$data['score_id']);
			}
			
		}
	}

	public function score($topic_id,$score_id){
			$data = array(
				'topic_id' => $topic_id,
				'score_id' => $score_id
			);
			$query = $this->qm->score($data);
			$result['no_question'] = $query['no_question'];
			$result['correct'] = $query['correct'];
			$result['wrong'] = $query['wrong'];
			$this->load->view('templates/user/header');
			$this->load->view('user/score',$result);
			$this->load->view('templates/user/footer');
	}
}
