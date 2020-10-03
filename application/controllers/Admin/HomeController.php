<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HomeController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin_logged_in')){
			redirect('admin/login');
		}
    }

    public function index(){
        $title['title'] = "HOME";
        $this->load->view('templates/admin/header_sidebar',$title);
        $this->load->view('admin/home');
        $this->load->view('templates/admin/footer');
    }


}