<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends My_Controller {
    private $u_name;
    private $pass;
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['alert']			=$this->session->flashdata('alert');
		$data['content']	='auth/login';
		$this->load->view($this->auth_master,$data);
	}

    public function manager_login(){
        $data['alert']			=$this->session->flashdata('alert');
		$data['content']	='auth/login';
		$this->load->view($this->auth_master,$data);
	}

    public function login_user(){
		if($this->input->post('login')){	
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');
		
			$this->u_name	=$this->input->post('email');
			$this->pass		=$this->input->post('password');
		
			if($this->form_validation->run() == FALSE){
				$data['alert']	='<div class="alert alert-danger" role="alert">Email Or Password not Filled</div>';
				$this->session->set_flashdata('alert',$data['alert']);
                redirect('Login');
			}else{
				$login	=$this->Login_user->login_user($this->u_name,$this->pass);
					if($login	== FALSE){	
						$data['alert']	='<div class="alert alert-danger" role="alert">Invalid Login Input,Use Sign Up button to register Or Click Forget Password</div>';
						$this->session->set_flashdata('alert',$data['alert']);
                        redirect('Login');
					}else{
						/*retrieve Session data*/
						$data['phone_no']         		=$this->session->userdata('phone_no');
						$data['user_id']         		=$this->session->userdata('user_id');
						$data['user_name']         		=$this->session->userdata('user_name');
                        $data['email']                  =$this->session->userdata('email');
                        $data['store_id']               =$this->session->userdata('store_id');
                        $data['store_name']             =$this->session->userdata('store_name');
                        $data['branch_id']              =$this->session->userdata('branch_id');
                        $data['store_owner_id']         =$this->session->userdata('store_owner_id');
                        $data['user_status']            =$this->session->userdata('user_status');
						

						$data['alert']	='<div class="alert alert-success" role="alert">Welcome Again</div>';
						$this->session->set_flashdata('alert',$data['alert']);
						
						$last_activity_existed		=$this->Admin_db->check_if_user_exist_in_activity_tbl($data['email']);
						$last_activity_path			=$this->Admin_db->get_last_activity_path($data['email']);
						$last_activity_type			=$this->Admin_db->get_last_activity_type($data['email']);

						$site_email					=$this->Admin_db->get_site_email();
						if($this->Login_user->check_if_store_is_suspended($data['store_id'])){
							

							if($data['user_status']	=='store_owner'){
								$data['alert']	='<div class="alert alert-success" role="alert">';
								$data['alert']	.='One of Your Store is place under suspension,please check with the Store Admin by contacting the official email to resolve this';
								$data['alert']	.='<div><br />Offcial Email : <b style="color:red;">'.$site_email.'</b></div>';
								$data['alert']	.='</div>';
								$this->session->set_flashdata('main_alert',$data['alert']);
								redirect('Store_Owner');

							}else if($data['user_status']	=='manager'){
								$data['alert']	='<div class="alert alert-warning" role="alert">The Store you are set to manage have some complication, please contact Store-Owner to help fix it.</div>';
								$this->session->set_flashdata('alert',$data['alert']);
								redirect('Login');

							}else if($data['user_status']	=='sales_rep'){
								$data['alert']	='<div class="alert alert-warning" role="alert">Your account have some complication, please contact your manager to help fix it</div>';
								$this->session->set_flashdata('alert',$data['alert']);
								redirect('Login');
							}
							
						}else{

							if($last_activity_existed){
								if($last_activity_type =='inactivity'){
									redirect($last_activity_path);
								}else{
									if($data['user_status']	=='store_owner'){
										redirect('Store_Owner');
									}else if($data['user_status']	=='manager'){
										redirect('Manager');
									}else if($data['user_status']	=='sales_rep'){
										redirect('Pos');
									}else if($data['user_status']	=='admin'){
										redirect('Dashboard');
									}
								}
							}else{
								if($data['user_status']	=='store_owner'){
									redirect('Store_Owner');
								}else if($data['user_status']	=='manager'){
									redirect('Manager');
								}else if($data['user_status']	=='sales_rep'){
									redirect('Pos');
								}else if($data['user_status']	=='admin'){
									redirect('Dashboard');
								}
							}
						}

						
						
                        
					}
			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button to login</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Login');
		}
		
	}

    public function sales_login(){
        $data['alert']			=$this->session->flashdata('alert');
		$data['content']	='auth/login_sales';
		$this->load->view($this->auth_master,$data);
	}

    public function sales_rep(){
		if($this->input->post('login')){	
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');
		
			$this->u_name	=$this->input->post('email');
			$this->pass		=$this->input->post('password');
		
			if($this->form_validation->run() == FALSE){
				$data['alert']	='<div class="alert alert-danger" role="alert">Email Or Password not Filled</div>';
				$this->session->set_flashdata('alert',$data['alert']);
                redirect('Login/manager_login');
			}else{
				$login	=$this->Login_user->login_sales_rep($this->u_name,$this->pass);
					if($login	== FALSE){	
						$data['alert']	='<div class="alert alert-danger" role="alert">Invalid Login Input,Use Sign Up button to register Or Click Forget Password</div>';
						$this->session->set_flashdata('alert',$data['alert']);
                        redirect('Login/manager_login');
					}else{
						/*retrieve Session data*/
						$data['phone_no']         		=$this->session->userdata('phone_no');
						$data['user_id']         		=$this->session->userdata('user_id');
						$data['user_name']         		=$this->session->userdata('user_name');
                        $data['email']                  =$this->session->userdata('email');
                        $data['store_id']               =$this->session->userdata('store_id');
                        $data['store_name']             =$this->session->userdata('store_name');
                        $data['branch_id']              =$this->session->userdata('branch_id');
                        $data['store_owner_id']         =$this->session->userdata('store_owner_id');
                        $data['user_status']            =$this->session->userdata('user_status');
						
						
                        $data['alert']	='<div class="alert alert-success" role="alert">Welcome Again</div>';
						$this->session->set_flashdata('alert',$data['alert']);

						if($data['user_status'] =='sales_rep'){
							redirect('Pos');
						}
						
					}
			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button to login</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Login/manager_login');
		}
		
	}

	public function owner(){
        $data['alert']			=$this->session->flashdata('alert');
		$data['content']	='auth/owner';
		$this->load->view($this->auth_master,$data);
	}

    public function owner_login(){
		if($this->input->post('login')){	
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');
		
			$this->u_name	=$this->input->post('email');
			$this->pass		=$this->input->post('password');
		
			if($this->form_validation->run() == FALSE){
				$data['alert']	='<div class="alert alert-danger" role="alert">Email Or Password not Filled</div>';
				$this->session->set_flashdata('alert',$data['alert']);
                redirect('Login/owner');
			}else{
				$login	=$this->Login_user->login_owner($this->u_name,$this->pass);
					if($login	== FALSE){	
						$data['alert']	='<div class="alert alert-danger" role="alert">Invalid Login Input,Use Sign Up button to register Or Click Forget Password</div>';
						$this->session->set_flashdata('alert',$data['alert']);
                        redirect('Login/owner');
					}else{
						/*retrieve Session data*/
						$data['phone_no']         		=$this->session->userdata('phone_no');
						$data['user_id']         		=$this->session->userdata('user_id');
						$data['user_name']         		=$this->session->userdata('user_name');
                        $data['email']                  =$this->session->userdata('email');
                        $data['store_id']               =$this->session->userdata('store_id');
                        $data['store_name']             =$this->session->userdata('store_name');
                        $data['branch_id']              =$this->session->userdata('branch_id');
                        $data['store_owner_id']         =$this->session->userdata('store_owner_id');
                        $data['user_status']            =$this->session->userdata('user_status');
						
						
                        $data['alert']	='<div class="alert alert-success" role="alert">Welcome Again</div>';
						$this->session->set_flashdata('alert',$data['alert']);
						redirect('Office');
					}
			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button to login</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Login/owner');
		}
		
	}
	


	public function admin(){
        $data['alert']			=$this->session->flashdata('alert');
		$data['content']	='auth/admin';
		$this->load->view($this->auth_master,$data);
	}

    public function admin_login(){
		if($this->input->post('login')){	
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');
		
			$this->u_name	=$this->input->post('email');
			$this->pass		=$this->input->post('password');
		
			if($this->form_validation->run() == FALSE){
				$data['alert']	='<div class="alert alert-danger" role="alert">Email Or Password not Filled</div>';
				$this->session->set_flashdata('alert',$data['alert']);
                redirect('Login/admin');
			}else{
				$login	=$this->Login_user->login_admin($this->u_name,$this->pass);
					if($login	== FALSE){	
						$data['alert']	='<div class="alert alert-danger" role="alert">Invalid Login Input,Use Sign Up button to register Or Click Forget Password</div>';
						$this->session->set_flashdata('alert',$data['alert']);
                        redirect('Login/admin');
					}else{
						/*retrieve Session data*/
						$data['phone_no']         		=$this->session->userdata('phone_no');
						$data['user_id']         		=$this->session->userdata('user_id');
						$data['user_name']         		=$this->session->userdata('user_name');
                        $data['email']                  =$this->session->userdata('email');
                        $data['store_id']               =$this->session->userdata('store_id');
                        $data['store_name']             =$this->session->userdata('store_name');
                        $data['branch_id']              =$this->session->userdata('branch_id');
                        $data['store_owner_id']         =$this->session->userdata('store_owner_id');
                        $data['user_status']            =$this->session->userdata('user_status');
						
						
                        $data['alert']	='<div class="alert alert-success" role="alert">Welcome Again</div>';
						$this->session->set_flashdata('alert',$data['alert']);
						redirect('Dashboard');
					}
			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button to login</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Login/admin');
		}
		
	}
	
	
	public function login_option(){
        $data['alert']			=$this->session->flashdata('alert');
		$data['content']	='auth/login_option';
		$this->load->view($this->auth_master,$data);
	}
}
