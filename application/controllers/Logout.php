<?php
class Logout extends My_Controller{
    public function __construct(){
        parent::__construct();
    }
	public function index(){

		$status 					=$this->session->userdata('user_status');
        $user_id					=$this->session->userdata('userid');
		$user_name					=$this->session->userdata('user_name');
		$last_login_timestamp		=$this->session->userdata('last_login_timestamp');

		$email						=$this->session->userdata('email');
		$current_path				=current_url();
		$validation					=$this->session->userdata('validation');

		if($validation == TRUE){

			$this->Admin_db->update_user_activity($email,$status,$current_path,'logout');
			$array_items = array('user_name','user_id','validation');
			$this->session->unset_userdata($array_items);
			$data['alert']		='<div class="alert alert-success">You Logout Successfully , Please Come Back Soon</div>';
			$this->session->set_flashdata('alert',$data['alert']);
			redirect(base_url().'Login');
		}else{
			$this->Admin_db->update_user_activity($email,$status,$current_path,'logout');
			session_destroy();
			$data['alert']		='<div class="alert alert-success">You Logout Successfully , Please Come Back Soon</div>';
			$this->session->set_flashdata('alert',$data['alert']);
			redirect(base_url().'Login');
		}
	}
}
?>