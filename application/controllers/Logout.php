<?php
class Logout extends My_Controller{
    public function __construct(){
        parent::__construct();
    }
	public function index(){
		$data['userid']	=$this->session->userdata('userid');
		$data['username']	=$this->session->userdata('username');
		$data['validation']	=$this->session->userdata('validation');
		if($data['validation'] == TRUE){
			$array_items = array('username','userid','validation');
			$this->session->unset_userdata($array_items);
			$data['alert']		='<div class="alert alert-success">You Logout Successfully , Please Come Back Soon</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            //session_destroy();
			$this->session->set_userdata('admin_status','');
			redirect(base_url().'Login/login_admin');
		}else{
			session_destroy();
			$data['alert']		='<div class="alert alert-success">You Logout Successfully , Please Come Back Soon</div>';
			$this->session->set_flashdata('alert',$data['alert']);
			redirect(base_url().'Login/login_admin');
		}
	}
}
?>