<?php
class Session_checker{
	private $CI;
	public function __construct(){
		$this->CI	=& get_instance();
	}
	// public function my_session(){
    //     $data['userid']			=$this->CI->session->userdata('user_id');
	// 	$data['username']		=$this->CI->session->userdata('phone_no');
	// 	if($this->CI->session->userdata('validation') == FALSE){
	// 		$data['alert']		='<p class="alert alert-danger" role="alert">Session Has Expire,Pls Login To continue</p>';
	// 			$this->CI->session->set_flashdata('alert',$data['alert']);
	// 			redirect(base_url().'Login/login_user');
	// 	}else{
	// 		$user	=$this->CI->session->userdata('user_name');
	// 		return $user;
	// 	}
	// }
	public function user_ban_status(){
        $data['userid']			=$this->CI->session->userdata('user_id');
		$data['username']		=$this->CI->session->userdata('phone_no');
        $data['ban_status']     =$this->CI->session->userdata('ban_status');
		if($this->CI->session->userdata('ban_status') == 'Yes'){
			$data['alert']		='<p class="alert alert-danger" role="alert">Your Account Has been Ban, Contact Admin for Clerification </p>';
				$this->CI->session->set_flashdata('alert',$data['alert']);
				redirect(base_url().'Login/login_user');
		}else{
			$user	=$this->CI->session->userdata('user_name');
			return $user;
		}
	}
	public function my_session_2(){
		$status = $this->CI->session->userdata('user_status');
        $data['userid']			=$this->CI->session->userdata('userid');
		$data['username']		=$this->CI->session->userdata('username');
		if($this->CI->session->userdata('validation') == FALSE){
			$data['alert']		='<p class="alert alert-danger" role="alert">Session Has Expire,Pls Login To continue</p>';
				$this->CI->session->set_flashdata('alert',$data['alert']);
				redirect(base_url().'Login/manager_login');
		}
        elseif($status != 'manager'){
			$data['alert']		='<p class="alert alert-danger" role="alert">You are not a Staff</p>';
			$this->CI->session->set_flashdata('alert',$data['alert']);
			redirect(base_url().'Login/owner');
		}
		// else if($status !='store_owner'){
		// 	$data['alert']		='<p class="alert alert-danger" role="alert">You are not a Staff</p>';
		// 	$this->CI->session->set_flashdata('alert',$data['alert']);
		// 	redirect(base_url().'Login/manager_login');
		// }
		// else if($status !='sales_rep'){
		// 	$data['alert']		='<p class="alert alert-danger" role="alert">You are not a Staff</p>';
		// 	$this->CI->session->set_flashdata('alert',$data['alert']);
		// 	redirect(base_url().'Login/sales_login');
		// }
        else{
			$user	=$this->CI->session->userdata('username');
			return $user;
		}
	}
	public function owner(){
		$this->CI->session->userdata('store_owner');
        $data['userid']			=$this->CI->session->userdata('userid');
		$data['username']		=$this->CI->session->userdata('username');
		if($this->CI->session->userdata('validation') == FALSE){
			$data['alert']		='<p class="alert alert-danger" role="alert">Session Has Expire,Pls Login To continue</p>';
				$this->CI->session->set_flashdata('alert',$data['alert']);
				redirect(base_url().'Auth/login_admin');
		}
        elseif($this->CI->session->userdata('admin_status') != TRUE){
			$data['alert']		='<p class="alert alert-danger" role="alert">You are not a Staff</p>';
				$this->CI->session->set_flashdata('alert',$data['alert']);
				redirect(base_url().'Auth/login_admin');
		}
        else{
			$user	=$this->CI->session->userdata('username');
			return $user;
		}
	}

	public function auto_logout(){
		$status 		= $this->CI->session->userdata('user_status');
        $user_id		=$this->CI->session->userdata('userid');
		$user_name		=$this->CI->session->userdata('user_name');
		$last_login_timestamp		=$this->CI->session->userdata('last_login_timestamp');

		$data['alert']		='<p class="alert alert-danger" role="alert">You are Auto Logout due to inactivity</p>';
		$this->CI->session->set_flashdata('alert',$data['alert']);

		if(isset($user_name)) {  
			if((time() - $last_login_timestamp) > 900) {  
				if($status =='admin'){
					redirect(base_url().'Login/admin');
				}else if($status =='store_owner'){
					redirect(base_url().'Login/owner');
				}else if($status =='manager'){
					redirect(base_url().'Login/manager_login');
				}else if($status =='sales_rep'){
					redirect(base_url().'Login/sales_login');
				}
			}else{  

				$this->CI->session->set_userdata('last_login_timestamp', time());
			}  
		}else{
			redirect(base_url().'Login/login_option');
		}
	}
}
