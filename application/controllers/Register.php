<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends My_Controller {
    private $u_name;
    private $pass;
	public function __construct(){
		parent::__construct();
	}

	public function index(){
        $data['alert']		=	$this->session->flashdata('alert');
		$data['content']	='auth/signup';
		$this->load->view($this->auth_master,$data);
	}


    public function register(){
		if($this->input->post('login')){	
			$this->form_validation->set_rules('email','Email','required|is_unique[store_owner.email]|valid_email', array('is_unique'=>'Email already taken, use another email'));
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('full_name','Full Name','required');
			$this->form_validation->set_rules('user_name','Username', 'required|is_unique[store_owner.user_name]|alpha_numeric', array('is_unique'=>'Username already taken, use another user name'));
			$this->form_validation->set_rules('phone','Phone', 'required|is_unique[store_owner.user_name]|numeric', array('is_unique'=>'Phone Number already taken, use another number'));
		
			$user_name	=$this->input->post('user_name');
			$pass       =$this->input->post('password');
			$email      =$this->input->post('email');
			$phone      =$this->input->post('phone');
			$full_name      =$this->input->post('full_name');
		
			if($this->form_validation->run() == FALSE){
				$data['content']	='auth/signup';
		        $this->load->view($this->auth_master,$data);
			}else{
				$login	=$this->Login_user->register($user_name,$pass,$email,$phone,$full_name);
					if($login	== FALSE){	
						$data['alert']	='<div class="alert alert-danger" role="alert">Registration Failed, please try again later</div>';
						$this->session->set_flashdata('alert',$data['alert']);
                        redirect('Register');
					}else{
						/*retrieve Session data*/
                        $data['alert']	='<div class="alert alert-success" role="alert">Registration Successful</div>';
						$this->session->set_flashdata('alert',$data['alert']);
						redirect('Login/owner');
					}
			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button to login</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Register');
		}
		
	}

	
	

}
