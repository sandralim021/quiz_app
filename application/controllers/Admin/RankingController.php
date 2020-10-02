<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RankingController extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/ranking','rm');
    }

    public function quiz_index(){
        $this->load->view('templates/admin/header_sidebar');
        $this->load->view('admin/select_quiz');
        $this->load->view('templates/admin/footer');
    }

    public function fetch_quiz(){
        $result = array('data' => array());
        $data = $this->rm->fetch_quiz();
        $i = 1;
        foreach ($data as $key => $value) {
            // button
            $buttons = '<a class ="button is-primary is-small" title="Select" href="'.base_url('admin/ranking/list/'.$value['topic_id']).'"><i class="fas fa-arrow-right"></i></a>';
            $result['data'][$key] = array(
                $i++,
                $value['topic_name'],
                $buttons
            );
        }   // /foreach
        echo json_encode($result); 
    }

    public function rank_index($id){
        $data['topic'] = $this->rm->get_topic($id);
        $this->load->view('templates/admin/header_sidebar');
        $this->load->view('admin/rank_list',$data);
        $this->load->view('templates/admin/footer');
    }

    public function fetch_rank($id){
        $result = array('data' => array());
        $data = $this->rm->fetch_rank($id);
        $i = 1;
        foreach ($data as $key => $value) {
            // button
            $buttons = '<a class ="button is-danger is-small item-delete" title="Delete Score Record" data='.$value['user_id'].'><i class="fas fa-trash"></i></a>';
            $result['data'][$key] = array(
                $i++,
                $value['name'],
                $value['email'],
                $value['correct'],
                $buttons
            );
        }   // /foreach
        echo json_encode($result); 
    }

    public function delete_rank($id){
        if($id){
            $delete = $this->rm->delete_rank($id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed";	
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the ranking information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refresh the page again!!";
        }

        echo json_encode($response);
    }
}