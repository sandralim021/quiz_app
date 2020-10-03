<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserController extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin_logged_in')){
			redirect('admin/login');
		}
        $this->load->model('admin/user','um');
    }

    public function index(){
        $title['title'] = "USERS";
        $this->load->view('templates/admin/header_sidebar',$title);
        $this->load->view('admin/user_list');
        $this->load->view('templates/admin/footer');
    }

    public function fetch(){
        $result = array('data' => array());
        $data = $this->um->fetch();
        $i = 1;
        foreach ($data as $key => $value) {
            $result['data'][$key] = array(
                $i++,
                $value['name'],
                $value['email']
            );
        }   // /foreach
        echo json_encode($result); 
    }

    

}