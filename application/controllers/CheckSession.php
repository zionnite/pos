<?php
class CheckSession extends My_Controller{
    public function __construct(){
        parent::__construct();

    }
    public function check_session(){

        $status 					=$this->session->userdata('user_status');
        $user_id					=$this->session->userdata('userid');
		$user_name					=$this->session->userdata('user_name');
		$last_login_timestamp		=$this->session->userdata('last_login_timestamp');

		$email						=$this->session->userdata('email');
		// $current_path				= current_url();
        $current_path               =$this->input->post('dis_current_url');

		$data['alert']		='<p class="alert alert-danger" role="alert">You are Auto Logout due to inactivity</p>';
		$this->session->set_flashdata('alert',$data['alert']);

		if(isset($user_name)) {  
			if((time() - $last_login_timestamp) > 900) {  
				$this->Admin_db->update_user_activity($email,$status,$current_path,'inactivity');
				echo 'inactivity';
			}else{
                echo 'normal';
            }
		}else{
            echo 'session_expire';
        }
    }
}