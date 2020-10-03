<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProfileController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin_logged_in')){
			redirect('admin/login');
		}
        $this->load->model('admin/user','um');
    }
    //Profile Index
    public function profile_index(){
        $title['title'] = "PROFILE";
        $this->load->view('templates/admin/header_sidebar',$title);
        $this->load->view('admin/view_profile');
        $this->load->view('templates/admin/footer');
    }

    public function update_profile($id){
        $response = array();
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="help is-danger">','</p>');
        if($this->form_validation->run() == TRUE){
            $password = $this->input->post('password');
            if(trim($password) == ''){
                $password = $this->session->userdata('admin_password');
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
                $admin_session = array('admin_name','admin_email','admin_password');
                $this->session->unset_userdata($admin_session);
                //Set New Admin Data Session
                $session_data = array(
                    'admin_name' => $this->input->post('name'),
                    'admin_email' => $this->input->post('email'),
                    'admin_password' => $password
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