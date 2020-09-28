<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class QuizController extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('templates/admin/header_sidebar');
        $this->load->view('admin/quiz_list');
        $this->load->view('templates/admin/footer');
    }
}