<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HistoryController extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin_logged_in')){
			redirect('admin/login');
		}
        $this->load->model('admin/history','hm');
    }

    public function index(){
        $this->load->view('templates/admin/header_sidebar');
        $this->load->view('admin/history_list');
        $this->load->view('templates/admin/footer');
    }

    public function fetch(){
        $result = array('data' => array());
        $data = $this->hm->fetch();
        $i = 1;
        foreach ($data as $key => $value) {
            $date = date('F j, Y',strtotime($value['date']));
            $time = date('g:i A',strtotime($value['time']));
            $buttons = '<button class="button is-danger is-small item-delete" title="Delete History Record" data='.$value['history_id'].'><i class="fas fa-trash-alt"></i></button>';
            $result['data'][$key] = array(
                $i++,
                $value['name'],
                $value['topic_name'],
                $value['correct'],
                $value['wrong'],
                $date,
                $time,
                $buttons
            );
        }   // /foreach
        echo json_encode($result); 
    }

    public function delete($id){
        if($id){
            $delete = $this->hm->delete($id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed";	
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the history information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refresh the page again!!";
        }

        echo json_encode($response);
    }

}