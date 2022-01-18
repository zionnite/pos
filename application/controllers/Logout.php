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

	// public function sales_logout(){
	// 	$data['userid']	=$this->session->userdata('userid');
	// 	$data['username']	=$this->session->userdata('username');
	// 	$data['validation']	=$this->session->userdata('validation');
	// 	if($data['validation'] == TRUE){
	// 		$array_items = array('user_name','userid','validation');
	// 		$this->session->unset_userdata($array_items);
	// 		$data['alert']		='<div class="alert alert-success">You Logout Successfully , Please Come Back Soon</div>';
	// 		$this->session->set_flashdata('alert',$data['alert']);
    //         //session_destroy();
	// 		$this->session->set_userdata('validation','');
	// 		$this->session->set_userdata('user_status','');
	// 		redirect(base_url().'Login/sales_login');
	// 	}else{
	// 		session_destroy();
	// 		$data['alert']		='<div class="alert alert-success">You Logout Successfully , Please Come Back Soon</div>';
	// 		$this->session->set_flashdata('alert',$data['alert']);
	// 		redirect(base_url().'Login/sales_login');
	// 	}
	// }

	// public function owner_logout(){
	// 	$data['userid']	=$this->session->userdata('userid');
	// 	$data['username']	=$this->session->userdata('username');
	// 	$data['validation']	=$this->session->userdata('validation');
	// 	if($data['validation'] == TRUE){
	// 		$array_items = array('user_name','userid','validation');
	// 		$this->session->unset_userdata($array_items);
	// 		$data['alert']		='<div class="alert alert-success">You Logout Successfully , Please Come Back Soon</div>';
	// 		$this->session->set_flashdata('alert',$data['alert']);
    //         //session_destroy();
	// 		$this->session->set_userdata('validation','');
	// 		$this->session->set_userdata('user_status','');
	// 		redirect(base_url().'Login/owner');
	// 	}else{
	// 		session_destroy();
	// 		$data['alert']		='<div class="alert alert-success">You Logout Successfully , Please Come Back Soon</div>';
	// 		$this->session->set_flashdata('alert',$data['alert']);
	// 		redirect(base_url().'Login/owner');
	// 	}
	// }

	// public function manager_logout(){
	// 	$data['userid']	=$this->session->userdata('userid');
	// 	$data['username']	=$this->session->userdata('username');
	// 	$data['validation']	=$this->session->userdata('validation');
	// 	if($data['validation'] == TRUE){
	// 		$array_items = array('user_name','userid','validation');
	// 		$this->session->unset_userdata($array_items);
	// 		$data['alert']		='<div class="alert alert-success">You Logout Successfully , Please Come Back Soon</div>';
	// 		$this->session->set_flashdata('alert',$data['alert']);
    //         //session_destroy();
	// 		$this->session->set_userdata('validation','');
	// 		$this->session->set_userdata('user_status','');
	// 		redirect(base_url().'Login/manager_login');
	// 	}else{
	// 		session_destroy();
	// 		$data['alert']		='<div class="alert alert-success">You Logout Successfully , Please Come Back Soon</div>';
	// 		$this->session->set_flashdata('alert',$data['alert']);
	// 		redirect(base_url().'Login/manager_login');
	// 	}
	// }

	// public function admin_logout(){
	// 	$data['userid']	=$this->session->userdata('userid');
	// 	$data['username']	=$this->session->userdata('username');
	// 	$data['validation']	=$this->session->userdata('validation');
	// 	if($data['validation'] == TRUE){
	// 		$array_items = array('user_name','userid','validation');
	// 		$this->session->unset_userdata($array_items);
	// 		$data['alert']		='<div class="alert alert-success">You Logout Successfully , Please Come Back Soon</div>';
	// 		$this->session->set_flashdata('alert',$data['alert']);
    //         //session_destroy();
	// 		$this->session->set_userdata('validation','');
	// 		$this->session->set_userdata('user_status','');
	// 		redirect(base_url().'Login/admin');
	// 	}else{
	// 		session_destroy();
	// 		$data['alert']		='<div class="alert alert-success">You Logout Successfully , Please Come Back Soon</div>';
	// 		$this->session->set_flashdata('alert',$data['alert']);
	// 		redirect(base_url().'Login/admin');
	// 	}
	// }
}
?>