<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProfileController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //$this->load->model('admin/user','um');
    }

    public function login_index(){
        $this->load->view('admin/login');
    }
    //Profile Index
    public function profile_index(){
        $this->load->view('templates/admin/header_sidebar');
        $this->load->view('admin/view_profile');
        $this->load->view('templates/admin/footer');
    }

}