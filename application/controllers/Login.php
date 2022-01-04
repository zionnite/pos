<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends My_Controller {
    private $u_name;
    private $pass;
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['content']	='auth/login';
		$this->load->view($this->auth_master,$data);
	}

    public function manager_login(){
        $data['alert']			=$this->session->flashdata('alert');
		$data['content']	='auth/login';
		$this->load->view($this->auth_master,$data);
	}

    

    public function manager(){
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
				$login	=$this->Login_user->login_manager($this->u_name,$this->pass);
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
						redirect('Manager_Dashboard');
					}
			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button to login</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Login/manager_login');
		}
		
	}

    public function sales_login(){
        $data['alert']			=$this->session->flashdata('alert');
		$data['content']	='auth/login';
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
						redirect('Sales_Dashboard');
					}
			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button to login</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Login/manager_login');
		}
		
	}

}
