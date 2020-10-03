<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller{

    public function __construct(){
		parent::__construct();
		$this->load->model('user/user','um');
    }

    public function login(){
        if($this->session->userdata('logged_in')){
			redirect('main');
		}else{
            $title['title'] = "LOGIN";
            $this->load->view('templates/user/header',$title);
		    $this->load->view('user/login');
		    $this->load->view('templates/user/footer');
        }
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
        //Unset User Session
        $user_session = array('name','user_id','email','password','logged_in');
        $this->session->unset_userdata($user_session);
        redirect('login'); 
    }

    public function signup(){
        if($this->session->userdata('logged_in')){
			redirect('main');
		}else{
            $this->load->view('templates/user/header');
            $this->load->view('user/signup');
            $this->load->view('templates/user/footer');
        }
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

    public function profile(){
        $title['title'] = "PROFILE";
        $this->load->view('templates/user/header',$title);
        $this->load->view('user/profile');
        $this->load->view('templates/user/footer');
    }

    public function update_profile($id){
        $response = array();
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="help is-danger">','</p>');
        if($this->form_validation->run() == TRUE){
            $password = $this->input->post('password');
            if(trim($password) == ''){
                $password = $this->session->userdata('password');
            }else{
                $password = md5($this->input->post('password'));
            }

            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $password
            );
            $update = $this->um->update_profile($data,$id);
            if($update){
                //Unset Admin Session
                $user_session = array('name','email','password');
                $this->session->unset_userdata($user_session);
                //Set New Admin Data Session
                $session_data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => $password
                );
                $this->session->set_userdata($session_data);

                $response['success'] = true;
                $this->session->set_flashdata('success', 'Profile successfully updated');	
            }else{
                $response['success'] = false;
                $this->session->set_flashdata('error', 'Error updating profile');
            }
        }
        else{
            $response['success'] = false;
            foreach ($_POST as $key => $value) {
                $response['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($response);

    }
    
}