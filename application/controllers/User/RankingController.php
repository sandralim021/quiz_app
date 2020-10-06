<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RankingController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('login');
        }
        $this->load->model('user/ranking','rm');
    }
    
    public function quiz_index(){
        $title['title'] = "RANKING";
        $data['data'] = $this->rm->fetch_quiz();
        $this->load->view('templates/user/header',$title);
        $this->load->view('user/select_quiz',$data);
        $this->load->view('templates/user/footer');
    }

    public function rank_index($id){
        $title['title'] = "RANKING";
        $query = $this->rm->fetch_rank($id);
        $data['data'] = $query['data'];
        $data['topic_name'] = $query['topic_name'];
        $this->load->view('templates/user/header',$title);
        $this->load->view('user/rank_list',$data);
        $this->load->view('templates/user/footer');
    }

}