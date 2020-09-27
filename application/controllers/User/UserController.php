<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller{

    public function __construct(){
		parent::__construct();
		$this->load->model('user/user','um');
    }

    public function login(){
		$this->load->view('templates/user/header');
		$this->load->view('user/login');
		$this->load->view('templates/user/footer');
    }
    
    public function login_user(){
        $response = array('error' => false);
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $data = $this->um->login_user($email,$password);
        if($data){
            $session_data = array(
                'name' => $data['name'],
                'user_id' => $data['user_id'],
                'email' => $data['email'],
                'password' => $data['password'],
                'logged_in' => true
            );
            $this->session->set_userdata($session_data);
        }else{
            $response['error'] = true;
            $response['message'] = 'Login Invalid. Please try again';
        }

        echo json_encode($response);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login'); 
    }

    public function signup(){
        $this->load->view('templates/user/header');
		$this->load->view('user/signup');
		$this->load->view('templates/user/footer');
    }

    public function signup_user(){
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        );
        $response = array('error' => false);
        $query = $this->um->signup_user($data);

        if($query){
            $session_data = array(
                'name' => $data['name'],
                'user_id' => $query,
                'email' => $data['email'],
                'password' => $data['password'],
                'logged_in' => true
            );
            $this->session->set_userdata($session_data);
        }else{
            $response['error'] = true;
            $response['message'] = 'Sign up Invalid. Please try again';
        }
        
        echo json_encode($response);

    }
    
}