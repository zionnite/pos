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
				if(!$this->Login_user->check_if_user_exist_in_login_tbl($email)){
					$login	=$this->Login_user->register($user_name,$pass,$email,$phone,$full_name);
					if($login	== FALSE){	
						$data['alert']	='<div class="alert alert-danger" role="alert">Registration Failed, please try again later</div>';
						$this->session->set_flashdata('alert',$data['alert']);
						redirect('Register');
					}else{

						$title	='Welcome';
						$message    ='Hello, '.$full_name.' Welcome to '$get_site_name.', we hope you find everything you are look for!';


						$current_domain 		= $_SERVER['SERVER_NAME'];
						$link           		= $current_domain.'/Login';

						$this->send_email($email,$title,$message,$link,'Go to Website');
						/*retrieve Session data*/
						$data['alert']	='<div class="alert alert-success" role="alert">Registration Successful</div>';
						$this->session->set_flashdata('alert',$data['alert']);
						redirect('Login');
					}
				}else{
					$data['alert']	='<div class="alert alert-success" role="alert">This User aleready exist in our database</div>';
					$this->session->set_flashdata('alert',$data['alert']);
					redirect('Login');
				}
			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button to login</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Register');
		}
		
	}


	public function send_email($email,$title,$message,$link,$link_title){		

		$get_site_name      	=$this->Admin_db->get_site_name();
		$get_site_g_name        =$this->Admin_db->get_site_g_name();
		$get_site_g_pass        =$this->Admin_db->get_site_g_pass();

		$current_domain 		= $_SERVER['SERVER_NAME'];

		$subject    =$get_site_name.' | '.$title;
		$to         =$email;


		

		$data['title']			=$title;
		$data['message']		=$message;
		$data['link']			=$link;
		$data['link_title']		=$link_title;

		$this->load->library('email');
		$config =array(
			'protocol'=> 'ssmtp',
			'smtp_host'    => 'ssl://ssmtp.googlemail.com',
			'smtp_port'    => '465',
			'smtp_timeout' => '7',
			'smtp_user'    => $get_site_g_name,
			'smtp_pass'    => $get_site_g_pass,
			'charset'    => 'utf-8',
			'newline'    => "\r\n",
			'mailtype' => 'html', // or html
			'validation' => FALSE); // bool whether to validate email or not      

		$this->load->initialize($config);

		$this->email->from("no-reply@$current_domain", $get_site_name);
		$this->email->to($to); 


		$this->email->subject($subject);

		$body   =$this->load->view($this->layout_3,$data,TRUE);
		$this->email->message($body);  
		$this->email->send();
	}
	
	

}
