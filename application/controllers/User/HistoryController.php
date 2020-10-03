<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryController extends CI_Controller {

    public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('login');
        }
        $this->load->model('user/history','hm');
    }
    
    public function index(){
        $data['data'] = $this->hm->fetch();
        $title['title'] = "HISTORY";
        $this->load->view('templates/user/header',$title);
        $this->load->view('user/history',$data);
        $this->load->view('templates/user/footer');
    }
    

}