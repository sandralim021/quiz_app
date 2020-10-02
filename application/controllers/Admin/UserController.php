<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserController extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/user','um');
    }

    public function index(){
        $this->load->view('templates/admin/header_sidebar');
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