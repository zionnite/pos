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

    public function admin_login(){
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
				$login	=$this->Login_user->login_admin($this->u_name,$this->pass);
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
						redirect('Super-Admin');
					}
			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button to login</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Login');
		}
		
	}


	public function forgot_password(){
		$data['alert']			=$this->session->flashdata('alert');
		$data['content']	='auth/forgot_password';
		$this->load->view($this->auth_master,$data);
	}

	public function reset_password(){
		if($this->input->post('login')){	
			$this->form_validation->set_rules('email','Email','required');
		      
			$email	=$this->input->post('email');
		
			if($this->form_validation->run() == FALSE){
				$data['alert']	='<div class="alert alert-danger" role="alert">Email Address not Entered</div>';
				$this->session->set_flashdata('alert',$data['alert']);
                redirect('Login/forgot_password');
			}else{
				
                if($this->Login_user->check_if_email_exist_request_password_tbl($email) == FALSE){

					$user_id 		=$this->Login_user->get_user_id($email);
					$user_name 		=$this->Login_user->get_user_name($email);

					$current_domain 		= $_SERVER['SERVER_NAME'];
					$encode_email			= urldecode($email);
					
					$link           		= base_url().'/Login/confirm_reset_password/'.$user_id.'/'.$encode_email;
								
						/*==========================SEND EMAIL TO RESET PASSWORD==================*/
						$message    ='Hello, '.$user_name.' You Requested to reset your Password, Click the Link or Copy it '.$link.'  if this is not you, please Kindly Ignore';

						$get_site_name      	=$this->Admin_db->get_site_name();
						$get_site_g_name        =$this->Admin_db->get_site_g_name();
						$get_site_g_pass        =$this->Admin_db->get_site_g_pass();


						$subject    =$get_site_name.' | Confirm Password Reset';
						$to         =$email;

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

						$this->email->message($message);  

						if($this->email->send()){
							$data['alert']	='<div class="alert alert-success" role="alert">An Email has been Sent to '.$email.'</div>';
							$this->session->set_flashdata('alert',$data['alert']);
							$this->Login_user->request_password($email,$user_id);
							redirect('login/forgot_password');
						}else{
							$data['alert']	='<div class="alert alert-danger" role="alert">Email not Responding...</div>';
							$this->session->set_flashdata('alert',$data['alert']);
							$this->Login_user->request_password($email,$user_id);
							redirect('login/forgot_password');
						}
                }else{
                    $data['alert']	='<div class="alert alert-warning" role="alert">You Have already Requested for Password Reset</div>';
			        $this->session->set_flashdata('alert',$data['alert']);
                    redirect('Login/forgot_password');
                }
			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button to login</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Login/forgot_password');
		}
		//redirect('welcome');
	}
    
    public function confirm_reset_password($user_id = NULL,$email=NULL){
		$email					=urldecode($email);
        $data['alert']			=$this->session->flashdata('alert');
		$data['content']		='auth/confirm_reset_password';
		$data['alert']		=	$this->session->flashdata('alert');
        $data['reset_password'] =$this->Login_user->getRestPassword_Permission($user_id,$email);
        if($data['reset_password'] != TRUE){
            $data['alert']	='<div class="alert alert-danger" role="alert">Oops! You did not request for password Reset</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Login/forgot_password');
        }
     
        $data['user_id']  		=$user_id;
		$data['email'] 			=$email;
		$this->load->view($this->auth_master,$data);
	}
    public function confirm_reset_password2(){
		if($this->input->post('login')){	

			$this->form_validation->set_rules('pass','Password', array('required','min_length[5]','max_length[12]','alpha_numeric'));
			$this->form_validation->set_rules('repass','Confirm Password',
            array('required','matches[pass]','min_length[5]','max_length[12]','alpha_numeric'));
		      
			$pass	=$this->input->post('pass');
            $user_id      =$this->input->post('user_id');
			$email		  =$this->input->post('email');
		
			if($this->form_validation->run() == FALSE){
				$data['alert']	='<div class="alert alert-danger" role="alert">Both Field are Important<br /> Both Field MUst be Thesame</div>';
				$this->session->set_flashdata('alert',$data['alert']);
                redirect('Login/confirm_reset_password/'.$user_id);
			}else{
				$login	=$this->Login_user->confirm_reset_password($pass,$user_id,$email);
					if($login	== FALSE){	
						$data['alert']	='<div class="alert alert-danger" role="alert">Sorry, Try Another Password Or come Back Late</div>';
						$this->session->set_flashdata('alert',$data['alert']);
                        redirect('Login/confirm_reset_password/'.$user_id);
					}else{

						
						$user_name 		=$this->Login_user->get_user_name($email);
                        
                            /*==========================SEND EMAIL TO RESET PASSWORD==================*/

                        $message    ='Hello, '.$user_name.' You Password has been Reset successfully';

						$get_site_name      	=$this->Admin_db->get_site_name();
						$get_site_g_name        =$this->Admin_db->get_site_g_name();
						$get_site_g_pass        =$this->Admin_db->get_site_g_pass();

						$current_domain 		= $_SERVER['SERVER_NAME'];

                        $subject    =$get_site_name.' | Password Change';
                        $to         =$email;
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
                        $this->email->message($message);  

                        if($this->email->send()){
                            $data['alert']	='<div class="alert alert-success" role="alert">You Password has been Reset successfully</div>';
 				            $this->session->set_flashdata('alert',$data['alert']);

							 redirect('Login');
                        }else{
                            $data['alert']	='<div class="alert alert-danger" role="alert">You Password has been Reset successfully</div>';
				            $this->session->set_flashdata('alert',$data['alert']);

							redirect('Login');
                        }
					}
			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Login/confirm_reset_password/'.$user_id);
		}
		//redirect('welcome');
	}
    public function check_if_email_exist_request_password_tbl($email){
        $check      =$this->Login_user->check_if_email_exist_request_password_tbl($email);
        return $check;
    }
	
}
