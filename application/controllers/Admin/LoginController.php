<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin/user','um');
    }

    //Login UI
    public function login_index(){
        if($this->session->userdata('admin_logged_in')){
            redirect('admin/home');
        }else{
            $this->load->view('admin/login');
        }
    }
    
    //Login User Function
    public function login_user(){
        $response = array('error' => false);
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $data = $this->um->login_user($email,$password);
        if($data){
            $session_data = array(
                'admin_name' => $data['name'],
                'admin_id' => $data['admin_id'],
                'admin_email' => $data['email'],
                'admin_password' => $data['password'],
                'admin_logged_in' => true
            );
            $this->session->set_userdata($session_data);
        }else{
            $response['error'] = true;
            $response['message'] = 'Login Invalid. Please try again';
        }

        echo json_encode($response);
    }
    //Logout User Function
    public function logout(){
         //Unset Admin Session
        $admin_session = array('admin_name','admin_id','admin_email','admin_password','admin_logged_in');
        $this->session->unset_userdata($admin_session);
        redirect('admin/login'); 
    }

}
